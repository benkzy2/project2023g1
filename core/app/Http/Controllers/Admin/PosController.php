<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Events\OrderPlaced;
use App\Http\Controllers\Controller;
use App\Http\Helpers\MegaMailer;
use App\Models\BasicExtended;
use App\Models\BasicSetting;
use App\Models\Language;
use App\Models\OrderItem;
use App\Models\PostalCode;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\ServingMethod;
use App\Models\ShippingCharge;
use App\Models\TimeFrame;
use App\PosPaymentMethod;
use App\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Str;
use PDF;

class PosController extends Controller
{
    public function index() {
        $lang = Language::where('is_default', 1)->firstOrFail();
        $pcats = $lang->pcategories()->where('status', 1)->get();
        $data['smethods'] = ServingMethod::where('pos', 1)->get();
        $data['pmethods'] = PosPaymentMethod::where('status', 1)->get();
        $data['tables'] = Table::where('status', 1)->get();
        $data['scharges'] = $lang->shippings;
        $data['postcodes'] = PostalCode::where('language_id', $lang->id)->orderBy('serial_number', 'ASC')->get();

        $data['pcats'] = $pcats;
        $data['cart'] = Session::get('pos_cart');

        // disabled days
        $days = ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'];
        $disDays = [];
        foreach ($days as $key => $day) {
            $count = TimeFrame::where('day', $day)->count();
            if ($count == 0) {
                if ($day == 'sunday') {
                    $disDays[] = 0;
                } elseif ($day == 'monday') {
                    $disDays[] = 1;
                } elseif ($day == 'tuesday') {
                    $disDays[] = 2;
                } elseif ($day == 'wednesday') {
                    $disDays[] = 3;
                } elseif ($day == 'thursday') {
                    $disDays[] = 4;
                } elseif ($day == 'friday') {
                    $disDays[] = 5;
                } elseif ($day == 'saturday') {
                    $disDays[] = 6;
                }
            }
        }
        $data['disDays'] = $disDays;
        $data['onTable'] = ServingMethod::where('value', 'on_table')->firstOrFail();

        return view('admin.pos.index', $data);
    }

    public function addToCart($id)
    {
        $cart = Session::get('pos_cart');

        $data = explode(',,,', $id);
        $id = (int)$data[0];
        $qty = (int)$data[1];
        $total = (float)$data[2];
        $variant = json_decode($data[3], true);
        $addons = json_decode($data[4], true);

        $product = Product::findOrFail($id);

        // validations
        if ($qty < 1) {
            return response()->json(['error' => 'Quanty must be 1 or more than 1.']);
        }
        $pvariant = json_decode($product->variations, true);
        if (!empty($pvariant) && empty($variant)) {
            return response()->json(['error' => 'You must select a variant.']);
        }


        if (!$product) {
            abort(404);
        }
        $cart = Session::get('pos_cart');
        $ckey = time();

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $ckey => [
                    "id" => $id,
                    "name" => $product->title,
                    "qty" => (int)$qty,
                    "variations" => $variant,
                    "addons" => $addons,
                    "product_price" => (float)$product->current_price,
                    "total" => $total,
                    "photo" => $product->feature_image
                ]
            ];

            Session::put('pos_cart', $cart);
            return response()->json(['message' => 'Product added to cart successfully!']);
        }

        // if cart not empty then check if this product (with same variation) exist then increment quantity
        foreach ($cart as $key => $cartItem) {
            if ($cartItem["id"] == $id && $variant == $cartItem["variations"] && $addons == $cartItem["addons"]) {
                $cart[$key]['qty'] = (int)$cart[$key]['qty'] + $qty;
                $cart[$key]['total'] = (float)$cart[$key]['total'] + $total;
                Session::put('pos_cart', $cart);
                return response()->json(['message' => 'Product added to cart successfully!']);
            }
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$ckey] = [
            "id" => $id,
            "name" => $product->title,
            "qty" => (int)$qty,
            "variations" => $variant,
            "addons" => $addons,
            "product_price" => (float)$product->current_price,
            "total" => $total,
            "photo" => $product->feature_image
        ];


        Session::put('pos_cart', $cart);


        return response()->json(['message' => 'Product added to cart successfully!']);
    }

    public function updateQty($key, $qty) {
        $cart = Session::get('pos_cart');

        $total = 0;
        $cart["$key"]["qty"] = (int)$qty;

        // calculate total
        $addons = $cart["$key"]["addons"];
        if (is_array($addons)) {
            foreach ($addons as $addKey => $addon) {
                $total += (float)$addon["price"];
            }
        }
        if (is_array($cart["$key"]["variations"])) {
            $total += (float)$cart["$key"]["variations"]["price"];
        }
        $total += (float)$cart["$key"]["product_price"];
        $total = $total * $qty;

        // save total in the cart item
        $cart["$key"]["total"] = $total;

        Session::put('pos_cart', $cart);

        return 'success';
    }

    public function cartitemremove($id)
    {
        if ($id) {
            $cart = Session::get('pos_cart');
            unset($cart[$id]);
            Session::put('pos_cart', $cart);

            return response()->json(['message' => 'Item removed successfully']);
        }
    }

    public function cartClear()
    {
        // return 1;
        Session::forget('pos_cart');
        Session::flash('success', 'Cart has been cleared!');
        return "success";
    }

    public function customerCopy() {
        $data['cart'] = Session::get('pos_cart');
        return view('admin.pos.partials.customer-copy', $data);
    }

    public function kitchenCopy() {
        $data['cart'] = Session::get('pos_cart');
        return view('admin.pos.partials.kitchen-copy', $data);
    }

    public function tokenNo() {
        return view('admin.pos.partials.token-no');
    }

    public function paymentMethods() {
        $data['pmethods'] = PosPaymentMethod::all();
        return view('admin.pos.payment-methods', $data);
    }

    public function paymentMethodStore(Request $request) {
        $rules = [
            'status' => 'required',
            'name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $pm = new PosPaymentMethod;
        $pm->status = $request->status;
        $pm->name = $request->name;
        $pm->save();

        Session::flash('success', 'Payment Method added successfully!');
        return "success";
    }

    public function paymentMethodUpdate(Request $request)
    {
        $rules = [
            'status' => 'required',
            'name' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $pm = PosPaymentMethod::findOrFail($request->pm_id);
        $pm->status = $request->status;
        $pm->name = $request->name;
        $pm->save();

        Session::flash('success', 'Payment Method updated successfully!');
        return "success";
    }

    public function paymentMethodDelete(Request $request)
    {
        $pm = PosPaymentMethod::findOrFail($request->pm_id);
        $pm->delete();

        Session::flash('success', 'Payment Method deleted successfully!');
        return back();
    }

    public function customerName($phone) {
        $customer = Customer::where('phone', $phone)->first();
        return response()->json($customer);
    }

    public function placeOrder(Request $request) {
        if (empty(Session::get('pos_cart'))) {
            return back()->with('warning', 'No item added to cart!');
        }

        if ($request->has('delivery_time') && $request->filled('delivery_time')) {
            $tf = TimeFrame::find((int)$request->delivery_time);
            // if maximum orders limit is not unlimited
            if (!empty($tf) && $tf->max_orders != 0) {
                $orderCount = ProductOrder::where('order_status', '<>', 'cancelled')->where('delivery_time_start', $tf->start)->where('delivery_time_end', $tf->end)->count();
                if ($orderCount >= $tf->max_orders) {
                    return back()->with('warning', "Number of orders in this time frame has reached to its limit!");
                }
            }
        }

        $be = BasicExtended::first();
        $bs = BasicSetting::first();
        // store in `product_orders`
        $po = new ProductOrder;
        $po->order_number = Str::random(4) . '-' . time();
        $po->billing_fname = $request->customer_name;
        $po->billing_number = $request->customer_phone;
        $po->serving_method = $request->serving_method;
        $po->method = $request->payment_method;
        $po->payment_status = $request->payment_status;

        if ($request->serving_method == 'on_table') {
            $po->token_no = $bs->token_no + 1;
            $bs->token_no = $po->token_no;
            $bs->save();

            Session::put('pos_token_no', $po->token_no);

            $po->table_number = $request->table_no;
        } elseif ($request->serving_method == 'pick_up') {
            $po->pick_up_date = $request->pick_up_date;
            $po->pick_up_time = $request->pick_up_time;
        } elseif ($request->serving_method == 'home_delivery') {
            $po->delivery_date = $request->delivery_date;
            if ($be->delivery_date_time_status == 1) {
                if ($request->has('delivery_time') && $request->filled('delivery_time')) {
                    $po->delivery_time_start = $tf->start;
                    $po->delivery_time_end = $tf->end;
                }
            }

            if ($bs->postal_code == 0) {
                if ($request->has('shipping_charge')) {
                    $shipping = ShippingCharge::findOrFail($request->shipping_charge);
                    $po->shipping_method = $shipping->title;
                    $po->shipping_charge = posShipping();
                }
            } else {
                $postalCode = PostalCode::findOrFail($request->postal_code);
                $po->shipping_charge = posShipping();

                $title = '';
                if (!empty($postalCode->title)) {
                    $title = $postalCode->title . ' - ';
                }
                $po->postal_code = $title . $postalCode->postcode;
                $po->postal_code_status = 1;
            }
        }

        $po->currency_code = $be->base_currency_text;
        $po->currency_code_position = $be->base_currency_text_position;
        $po->currency_symbol = $be->base_currency_symbol;
        $po->currency_symbol_position = $be->base_currency_symbol_position;
        $po->tax = posTax();
        $po->total = posCartSubTotal() + posTax() + posShipping();
        $po->type = 'pos';

        $po->save();
        $orderId = $po->id;

        // store in `customers`
        $customer = Customer::where('phone', $request->customer_phone);

        if ($customer->count() == 0) {
            $customer = new Customer;
        } else {
            $customer = $customer->first();
        }
        $customer->name = $request->customer_name;
        $customer->phone = $request->customer_phone;
        $customer->save();

        // store in `order_items`
        $cart = Session::get('pos_cart');

        foreach ($cart as $key => $cartItem) {

            $addonTotal = 0.00;
            if (!empty($cartItem["addons"])) {
                foreach ($cartItem["addons"] as $key => $addon) {
                    $addonTotal += (float)$addon["price"];
                }
                $addonTotal = $addonTotal * (int)$cartItem["qty"];
            }
            $vprice = !empty($cartItem["variations"]) ? (float)$cartItem["variations"]["price"] * (int)$cartItem["qty"] : 0.00;
            $pprice = (float)$cartItem["product_price"] * (int)$cartItem["qty"];

            OrderItem::insert([
                'product_order_id' => $orderId,
                'product_id' => $cartItem["id"],
                'title' => $cartItem["name"],
                'variations' => json_encode($cartItem["variations"]),
                'addons' => json_encode($cartItem["addons"]),
                'variations_price' => $vprice,
                'addons_price' => $addonTotal,
                'product_price' => $pprice,
                'total' => $pprice + $vprice + $addonTotal,
                'qty' => $cartItem["qty"],
                'image' => $cartItem["photo"],
                'created_at' => Carbon::now()
            ]);
        }


        // clear cart
        Session::forget('pos_cart');
        Session::forget('pos_shipping_charge');
        Session::forget('pos_serving_method');

        // fire sound notification
        event(new OrderPlaced());

        // redirect back
        Session::flash('previous_serving_method', $request->serving_method);
        Session::flash('success', 'Order placed successfully');
        return back();
    }

    public function shippingCharge(Request $request) {
        $sm = ServingMethod::where('value', $request->serving_method)->first();
        Session::put('pos_serving_method', $sm->name);
        Session::put('pos_shipping_charge', $request->shipping_charge);
    }
}
