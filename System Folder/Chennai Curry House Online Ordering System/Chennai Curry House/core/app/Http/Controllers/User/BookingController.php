<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TableBook;
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
        $orders = TableBook::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('user.booking',compact('booking'));
    }

    public function orderdetails($id)
    {
        $data = TableBook::findOrFail($id);
        // if the order has no user_id (guest checkout), then no check
        if (!empty($data->user_id)) {
            if (Auth::check() && Auth::user()->id != $data->user_id) {
                return back();
            }
        }
        return view('user.booking_details',compact('data'));
    }
}
