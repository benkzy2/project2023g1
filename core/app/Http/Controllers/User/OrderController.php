<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlang');
    }
    public function index()
    {
        $orders = ProductOrder::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.order',compact('orders'));
    }

    public function orderdetails($id)
    {
        $data = ProductOrder::findOrFail($id);
        return view('user.order_details',compact('data'));
    }
}
