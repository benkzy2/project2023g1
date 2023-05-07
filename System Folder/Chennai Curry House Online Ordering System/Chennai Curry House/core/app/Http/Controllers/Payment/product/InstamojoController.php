<?php

namespace App\Http\Controllers\Payment\product;

use App\Events\OrderPlaced;
use App\Http\Controllers\Payment\product\PaymentController;
use Illuminate\Http\Request;
use App\Http\Helpers\Instamojo;
use App\Models\BasicSetting;
use App\Models\Language;
use App\Models\PaymentGateway;
use App\Models\PostalCode;
use App\Models\ProductOrder;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\Exception;
use Str;

class InstamojoController extends PaymentController
{
    public function store(Request $request)
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $be = $currentLang->basic_extended;

        $bs = BasicSetting::select('postal_code')->firstOrFail();

        if ($request->serving_method == 'home_delivery') {
            if ($bs->postal_code == 0) {
                if ($request->has('shipping_charge')) {
                    $shipping = ShippingCharge::findOrFail($request->shipping_charge);
                    $shippig_charge = $shipping->charge;
                } else {
                    $shipping = NULL;
                    $shippig_charge = 0;
                }
            } else {
                $shipping = PostalCode::findOrFail($request->postal_code);
                $shippig_charge = $shipping->charge;
            }
        } else {
            $shipping = NULL;
            $shippig_charge = 0;
        }
        $total = $this->orderTotal($shippig_charge);

        if ($be->base_currency_text != "INR") {
            return redirect()->back()->with('error', __('Please Select INR Currency For This Payment.'));
        } elseif ($total < 9) {
            return redirect()->back()->with('error', __('Amount cannot be less than INR 9.00'));
        }

        if($this->orderValidation($request)) {
            return $this->orderValidation($request);
        }


        // saving datas in database
        $txnId = 'txn_' . Str::random(8) . time();
        $chargeId = 'ch_' . Str::random(9) . time();
        $order = $this->saveOrder($request, $shipping, $total, $txnId, $chargeId);
        $order_id = $order->id;

        // save ordered items
        $this->saveOrderItem($order_id);

        return $this->apiRequest($order_id);
    }


    public function apiRequest($orderId) {
        $order = ProductOrder::find($orderId);
        $bs = BasicSetting::first();

        $orderData['item_name'] = $bs->website_title . " Order";
        $orderData['item_number'] = Str::random(4) . time();
        $orderData['item_amount'] = $order->total;
        $orderData['order_id'] = $orderId;

        if ($order->type == 'website') {
            $cancel_url = action('Payment\product\PaymentController@paycancle');
        } elseif ($order->type == 'qr') {
            $cancel_url = action('Payment\product\PaymentController@qrPayCancle');
        }
        $notify_url = route('product.instamojo.notify');


        $data = PaymentGateway::whereKeyword('instamojo')->first();
        $paydata = $data->convertAutoData();
        if ($paydata['sandbox_check'] == 1) {
            $api = new Instamojo($paydata['key'], $paydata['token'], 'https://test.instamojo.com/api/1.1/');
        } else {
            $api = new Instamojo($paydata['key'], $paydata['token']);
        }

        try {

            $response = $api->paymentRequestCreate(array(
                "purpose" => $orderData['item_name'],
                "amount" => $orderData['item_amount'],
                "send_email" => false,
                "email" =>  null,
                "redirect_url" => $notify_url
            ));



            $redirect_url = $response['longurl'];

            Session::put('order_payment_id', $response['id']);
            Session::put('order_data', $orderData);

            return redirect($redirect_url);
        } catch (Exception $e) {

            return redirect($cancel_url)->with('error', 'Error: ' . $e->getMessage());
        }
    }



    public function notify(Request $request)
    {
        $order_data = Session::get('order_data');
        $orderid = $order_data["order_id"];
        $po = ProductOrder::findOrFail($orderid);

        if ($po->type == 'website') {
            $success_url = route('product.payment.return', $po->order_number);
        } elseif ($po->type == 'qr') {
            $success_url = route('qr.payment.return', $po->order_number);
        }
        if ($po->type == 'website') {
            $cancel_url = action('Payment\product\PaymentController@paycancle');
        } elseif ($po->type == 'qr') {
            $cancel_url = action('Payment\product\PaymentController@qrPayCancle');
        }

        $input_data = $request->all();
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('order_payment_id');

        if ($input_data['payment_request_id'] == $payment_id) {
            $po->payment_status = "Completed";
            $po->save();

            // send mail to buyer
            $this->mailFromAdmin($po);

            // send mail to admin
            $this->mailToAdmin($po);

            Session::forget('order_payment_id');
            Session::forget('order_data');
            Session::forget('coupon');
            Session::forget('cart');

            event(new OrderPlaced());

            return redirect($success_url);
        }
        return redirect($cancel_url);
    }
}
