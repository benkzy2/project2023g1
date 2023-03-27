<?php

namespace App\Http\Controllers\Payment\Product;

use App\Events\OrderPlaced;
use App\Http\Controllers\Payment\product\PaymentController;
use Illuminate\Http\Request;
use App\Models\BasicExtended;
use App\Models\BasicSetting;
use App\Models\PaymentGateway;
use App\Models\PostalCode;
use App\Models\ProductOrder;
use App\Models\ShippingCharge;
use Str;
use Session;


class PaystackController extends PaymentController
{
    public $secret_key;

    public function __construct()
    {
        $data = PaymentGateway::whereKeyword('paystack')->first();
        $paydata = $data->convertAutoData();
        $this->secret_key = $paydata['key'];
    }

    /**
     * Redirect the User to Paystack Payment Page
     * @return
     */
    public function store(Request $request)
    {
        $be = BasicExtended::first();
        if ($be->base_currency_text != "NGN") {
            return back()->with('error', 'Currency must be NGN for Paystack');
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


        return $this->apiRequest($order_id);
    }


    public function apiRequest($orderId) {
        $order = ProductOrder::find($orderId);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount' => $order->total * 100,
                'email' => $order->billing_email,
                'callback_url' => route('product.paystack.notify', ['order_id' => $orderId])
            ]),
            CURLOPT_HTTPHEADER => [
                "authorization: Bearer " . $this->secret_key, //replace this with your own test key
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        if ($err) {
            return back()->with('error', $err);
        }

        $tranx = json_decode($response, true);

        if (!$tranx['status']) {
            return back()->with('error', $tranx['message']);
        }
        return redirect($tranx['data']['authorization_url']);
    }


    public function notify(Request $request)
    {
        $po = ProductOrder::findOrFail($request["order_id"]);

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

        if ($request['trxref'] === $request['reference']) {
            $po->payment_status = "Completed";
            $po->save();

            // send mail to buyer
            $this->mailFromAdmin($po);
            // send mail to admin
            $this->mailToAdmin($po);
            Session::forget('coupon');
            Session::forget('cart');
            event(new OrderPlaced());

            return redirect($success_url);

        } else {
            return redirect($cancel_url);
        }
    }

}
