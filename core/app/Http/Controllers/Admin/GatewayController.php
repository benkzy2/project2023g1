<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Session;

class GatewayController extends Controller
{
    public function index() {
        $data['paypal'] = PaymentGateway::find(15);
        $data['stripe'] = PaymentGateway::find(14);

        return view('admin.gateways.index', $data);
    }

    public function paypalUpdate(Request $request) {
        $paypal = PaymentGateway::find(15);
        $paypal->status = $request->status;

        $information = [];
        $information['client_id'] = $request->client_id;
        $information['client_secret'] = $request->client_secret;
        $information['sandbox_check'] = $request->sandbox_check;
        $information['text'] = "Pay via your PayPal account.";

        $paypal->information = json_encode($information);

        $paypal->save();

        $request->session()->flash('success', "Paypal informations updated successfully!");

        return back();
    }

    public function stripeUpdate(Request $request) {
        $stripe = PaymentGateway::find(14);
        $stripe->status = $request->status;

        $information = [];
        $information['key'] = $request->key;
        $information['secret'] = $request->secret;
        $information['text'] = "Pay via your Credit account.";

        $stripe->information = json_encode($information);

        $stripe->save();

        $request->session()->flash('success', "Stripe informations updated successfully!");

        return back();
    }
}
