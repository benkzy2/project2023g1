<?php

namespace App\Http\Controllers\Payment\product;

use App\Events\OrderPlaced;
use App\Http\Controllers\Payment\product\PaymentController;
use App\Models\BasicSetting;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use App\Models\Language;
use App\Models\PostalCode;
use App\Models\ProductOrder;
use App\Models\ShippingCharge;
use Illuminate\Support\Facades\Session;
use Softon\Indipay\Exceptions\IndipayParametersMissingException;
use Str;

class PayumoneyController extends PaymentController
{
    public function __construct()
    {
        \Config::set('indipay.payumoney.successUrl', 'product/payumoney/notify');
        \Config::set('indipay.payumoney.failureUrl', 'product/payumoney/notify');
    }

    public function store(Request $request)
    {
        $available_currency = array(
            'INR',
        );

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $be = $currentLang->basic_extended;

        if (!in_array($be->base_currency_text, $available_currency)) {
            return redirect()->back()->with('error', __('Invalid Currency For PayUmoney.'));
        }

        if($this->orderValidation($request)) {
            return $this->orderValidation($request);
        }

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

        // saving datas in database
        $txnId = 'txn_' . Str::random(8) . time();
        $chargeId = 'ch_' . Str::random(9) . time();
        $order = $this->saveOrder($request, $shipping, $total, $txnId, $chargeId);
        $order_id = $order->id;

        // save ordered items
        $this->saveOrderItem($order_id);

        Session::put('request', $request->only('payumoney_first_name','payumoney_last_name','payumoney_phone'));

        return $this->apiRequest($order_id);
    }

    public function apiRequest($orderId) {
        $order = ProductOrder::find($orderId);
        $bs = BasicSetting::first();
        $request = Session::get('request');

        $orderData['item_name'] = $bs->website_title . " Order";
        $orderData['item_number'] = Str::random(4) . time();
        $orderData['item_amount'] = $order->total;
        $orderData['order_id'] = $orderId;

        Session::put('order_data', $orderData);

        $parameters = [
            'txnid' => $orderData['item_number'],
            'order_id' => $orderData['order_id'],
            'amount' => $orderData['item_amount'],
            'firstname' => $request["payumoney_first_name"],
            'lastname' => $request["payumoney_last_name"],
            'email' => $order->billing_email,
            'phone' => $request["payumoney_phone"],
            'productinfo' => $orderData['item_name'],
            'service_provider' => ''
        ];

        $order = Indipay::prepare($parameters);
        return Indipay::process($order);
    }

    public function notify(Request $request)
    {
        $order_data = Session::get('order_data');
        $po = ProductOrder::findOrFail($order_data["order_id"]);

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

        // For default Gateway
        $response = Indipay::response($request);

        if ($response['status'] == 'success' && $response['unmappedstatus'] == 'captured') {
            $po->payment_status = "Completed";
            $po->save();

            // send mail to buyer
            $this->mailFromAdmin($po);
            // send mail to admin
            $this->mailToAdmin($po);

            Session::forget('order_data');
            Session::forget('coupon');
            Session::forget('cart');
            Session::forget('request');

            event(new OrderPlaced());

            return redirect($success_url);
        } else {
            Session::flash("error", $response["error_Message"]);
            return redirect($cancel_url);
        }
    }
}
