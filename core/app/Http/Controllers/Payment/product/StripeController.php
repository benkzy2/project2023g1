<?php

namespace App\Http\Controllers\Payment\product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Validator;
use App\Models\PaymentGateway;
use App\Models\Language;
use App\Models\ProductOrder;
use App\Models\OrderItem;
use App\Models\ShippingCharge;
use App\Models\Product;
use Auth;
use DB;
use PDF;
use Carbon\Carbon;
use Session;

class StripeController extends Controller
{
    public function __construct()
    {
        //Set Spripe Keys
        $stripe = PaymentGateway::findOrFail(14);
        $stripeConf = json_decode($stripe->information, true);
        Config::set('services.stripe.key', $stripeConf["key"]);
        Config::set('services.stripe.secret', $stripeConf["secret"]);
    }


    public function store(Request $request)
    {


        if (!Session::has('cart')) {
            return view('errors.404');
        }


        $cart = Session::get('cart');

        $total = 0;
        foreach ($cart as $id => $item) {
            $product = Product::findOrFail($id);
            if ($product->stock < $item['qty']) {
                Session::flash('stock_error', $product->title . ' stock not available');
                return back();
            }
            $total  += $product->current_price * $item['qty'];
        }

        $shipping_method = '';
        if ($request->shipping_charge != 0) {
            $shipping = ShippingCharge::findOrFail($request->shipping_charge);
            $shippig_charge = $shipping->charge;
            $shipping_method = $shipping->title;
        } else {
            $shippig_charge = 0;
        }


        // Validation Starts
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $be = $currentLang->basic_extended;

        $total = round($total + $shippig_charge, 2);
        $usdTotal = round(($total / $be->base_currency_rate), 2);

        $title = 'Product Checkout';
        $success_url = action('Payment\product\PaymentController@payreturn');

        $request->validate([
            'cardNumber' => 'required',
            'cardCVC' => 'required',
            'month' => 'required',
            'year' => 'required',
            'billing_fname' => 'required',
            'billing_lname' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
            'billing_number' => 'required',
            'billing_email' => 'required',
            'shpping_fname' => 'required',
            'shpping_lname' => 'required',
            'shpping_address' => 'required',
            'shpping_city' => 'required',
            'shpping_country' => 'required',
            'shpping_number' => 'required',
            'shpping_email' => 'required',
        ]);


        $stripe = Stripe::make(Config::get('services.stripe.secret'));
        try {

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->cardNumber,
                    'exp_month' => $request->month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cardCVC,
                ],
            ]);

            if (!isset($token['id'])) {
                return back()->with('error', 'Token Problem With Your Token.');
            }

            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' =>  'USD',
                'amount' => $usdTotal,
                'description' => $title,
            ]);



            if ($charge['status'] == 'succeeded') {

                $order = new ProductOrder;
                $order->user_id = Auth::user()->id;
                $order->billing_fname = $request->billing_fname;
                $order->billing_lname = $request->billing_lname;
                $order->billing_email = $request->billing_email;
                $order->billing_address = $request->billing_address;
                $order->billing_city = $request->billing_city;
                $order->billing_country = $request->billing_country;
                $order->billing_number = $request->billing_number;
                $order->shpping_fname = $request->shpping_fname;
                $order->shpping_lname = $request->shpping_lname;
                $order->shpping_email = $request->shpping_email;
                $order->shpping_address = $request->shpping_address;
                $order->shpping_city = $request->shpping_city;
                $order->shpping_country = $request->shpping_country;
                $order->shpping_number = $request->shpping_number;

                $order->total = $total;
                $order->shipping_method = $shipping_method;
                $order->shipping_charge = round($shippig_charge, 2);
                $order->method = 'Stripe';
                $order->currency_code = $be->base_currency_text;
                $order->currency_code_position = $be->base_currency_text_position;
                $order->currency_symbol = $be->base_currency_symbol;
                $order->currency_symbol_position = $be->base_currency_symbol_position;
                $order->order_number = Str::random(4) . time();
                $order->payment_status = 'Completed';
                $order['txnid'] = $charge['balance_transaction'];
                $order['charge_id'] = $charge['id'];




                $order->save();
                $order_id = $order->id;

                $carts = Session::get('cart');
                $products = [];
                $qty = [];
                foreach ($carts as $id => $item) {
                    $qty[] = $item['qty'];
                    $products[] = Product::findOrFail($id);
                }


                foreach ($products as $key => $product) {
                    if (!empty($product->category)) {
                        $category = $product->category->name;
                    } else {
                        $category = '';
                    }
                    OrderItem::insert([
                        'product_order_id' => $order_id,
                        'product_id' => $product->id,
                        'user_id' => Auth::user()->id,
                        'title' => $product->title,
                        'qty' => $qty[$key],
                        'category' => $category,
                        'price' => $product->current_price,
                        'previous_price' => $product->previous_price,
                        'image' => $product->feature_image,
                        'summary' => $product->summary,
                        'description' => $product->description,
                        'created_at' => Carbon::now()
                    ]);
                }


                foreach ($cart as $id => $item) {
                    $product = Product::findOrFail($id);
                    $stock = $product->stock - $item['qty'];
                    Product::where('id', $id)->update([
                        'stock' => $stock
                    ]);
                }


                $fileName = Str::random(5) . '.pdf';
                $path = 'assets/front/invoices/product/' . $fileName;
                $data['order']  = $order;
                $pdf = PDF::loadView('pdf.product', $data)->save($path);

                ProductOrder::where('id', $order_id)->update([
                    'invoice_number' => $fileName
                ]);


                // Send Mail to Buyer
                $mail = new PHPMailer(true);
                $user = Auth::user();

                if ($be->is_smtp == 1) {
                    try {
                        $mail->isSMTP();
                        $mail->Host       = $be->smtp_host;
                        $mail->SMTPAuth   = true;
                        $mail->Username   = $be->smtp_username;
                        $mail->Password   = $be->smtp_password;
                        $mail->SMTPSecure = $be->encryption;
                        $mail->Port       = $be->smtp_port;

                        //Recipients
                        $mail->setFrom($be->from_mail, $be->from_name);
                        $mail->addAddress($user->email, $user->fname);

                        // Attachments
                        $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = "Order placed for Product";
                        $mail->Body    = 'Hello <strong>' . $user->fname . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                        $mail->send();
                    } catch (Exception $e) {
                        // die($e->getMessage());
                    }
                } else {
                    try {

                        //Recipients
                        $mail->setFrom($be->from_mail, $be->from_name);
                        $mail->addAddress($user->email, $user->fname);

                        // Attachments
                        $mail->addAttachment('assets/front/invoices/product/' . $fileName);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = "Order placed for Product";
                        $mail->Body    = 'Hello <strong>' . $user->fname . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                        $mail->send();
                    } catch (Exception $e) {
                        // die($e->getMessage());
                    }
                }

                Session::forget('cart');

                return redirect($success_url);
            }
        } catch (Exception $e) {
            return back()->with('unsuccess', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
            return back()->with('unsuccess', $e->getMessage());
        } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
            return back()->with('unsuccess', $e->getMessage());
        }

        // return back()->with('unsuccess', 'Please Enter Valid Credit Card Informations.');
    }
}
