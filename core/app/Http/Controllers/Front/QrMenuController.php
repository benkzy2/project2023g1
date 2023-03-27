<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\OfflineGateway;
use App\Models\PaymentGateway;
use App\Models\Pcategory;
use App\Models\PostalCode;
use App\Models\ServingMethod;
use App\Models\TimeFrame;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class QrMenuController extends Controller
{
    public function qrMenu(Request $request) {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $itemsCount = 0;
        $cartTotal = 0;
        $cart = session()->get('cart');
        if(!empty($cart)){
            foreach($cart as $p){
                $itemsCount += $p['qty'];
                $cartTotal += (float)$p['total'];
            }
        }

        $data['cart'] = $cart;
        $data['itemsCount'] = $itemsCount;
        $data['cartTotal'] = $cartTotal;
        $data['categories'] = Pcategory::where('status', 1)->where('language_id', $currentLang->id)->get();
        $data['currentLang'] = $currentLang;

        if (!empty($request->table)) {
            Session::put('table', $request->table);
        }

        return view('front.qrmenu.menu', $data);
    }

    public function qtyChange(Request $request) {

        $cart = session()->get('cart');
        $key = $request->key;
        $qty = (int)$request->qty;
        if ($qty <= 0) {
            return;
        }

        // changing qty & total for the item
        $cart["$key"]['qty'] = $qty;
        $cart["$key"]['total'] = $qty * (float)$cart["$key"]["product_price"];

        session()->put('cart', $cart);
        $cart = session()->get('cart');
        return response()->json(['cart' => $cart, 'key' => $key]);
    }

    public function remove(Request $request) {
        $key = $request->key;
        $cart = session()->get('cart');
        unset($cart["$key"]);

        session()->put('cart', $cart);
        return response()->json($cart);
    }

    public function login() {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $itemsCount = 0;
        $cartTotal = 0;
        $cart = session()->get('cart');
        if(!empty($cart)){
            foreach($cart as $p){
                $itemsCount += $p['qty'];
                $cartTotal += (float)$p['total'];
            }
        }

        $data['cart'] = $cart;
        $data['itemsCount'] = $itemsCount;
        $data['cartTotal'] = $cartTotal;
        $data['currentLang'] = $currentLang;

        session()->put('link', route('front.qrmenu.checkout'));

        return view('front.qrmenu.login', $data);
    }

    public function checkout(Request $request) {
        if ($request->type != 'guest' && !Auth::check()) {
            session()->put('link', route('front.qrmenu.checkout'));
            return redirect()->route('front.qrmenu.login');
        }

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $itemsCount = 0;
        $cartTotal = 0;
        $cart = session()->get('cart');
        if(!empty($cart)){
            foreach($cart as $p){
                $itemsCount += $p['qty'];
                $cartTotal += (float)$p['total'];
            }
        }

        $data['scharges'] = $currentLang->shippings;
        $data['smethods'] = ServingMethod::where('qr_menu', 1)->orderBy('serial_number', 'ASC')->get();

        $data['cart'] = $cart;
        $data['itemsCount'] = $itemsCount;
        $data['cartTotal'] = $cartTotal;
        $data['currentLang'] = $currentLang;

        $data['postcodes'] = PostalCode::where('language_id', $currentLang->id)->orderBy('serial_number', 'ASC')->get();
        $data['ogateways'] = OfflineGateway::where('status', 1)->orderBy('serial_number')->get();
        $data['stripe'] = PaymentGateway::find(14);
        $data['paypal'] = PaymentGateway::find(15);
        $data['paystackData'] = PaymentGateway::whereKeyword('paystack')->first();
        $data['paystack'] = $data['paystackData']->convertAutoData();
        $data['flutterwave'] = PaymentGateway::find(6);
        $data['razorpay'] = PaymentGateway::find(9);
        $data['instamojo'] = PaymentGateway::find(13);
        $data['paytm'] = PaymentGateway::find(11);
        $data['mollie'] = PaymentGateway::find(17);
        $data['mercadopago'] = PaymentGateway::find(19);
        $data['payumoney'] = PaymentGateway::find(18);

        $data['discount'] = session()->has('coupon') && !empty(session()->get('coupon')) ? session()->get('coupon') : 0;
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

        return view('front.qrmenu.checkout', $data);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('front.qrmenu.login');
    }
}
