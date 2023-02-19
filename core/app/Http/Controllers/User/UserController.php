<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use App;
use App\Models\ProductOrder;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlang');
    }

    public function index()
    {
        $data['user'] = Auth::user();
        $data['orders'] = ProductOrder::where('user_id', Auth::user()->id)->orderby('id', 'desc')->limit(10)->get();
        return view('user.dashboard', $data);
    }



    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function profileupdate(Request $request)
    {

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required|unique:users,username,' . Auth::user()->id,
            'city' => 'required',
            'number' => 'required',
            'state' => 'required',
            'country' => 'required',
            'address' => 'required',

        ]);

        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::user();
        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/front/img/user/', $name);
            if ($data->photo != null) {
                if (file_exists(base_path('../assets/front/img/user/' . $data->photo))) {
                    unlink(base_path('../assets/front/img/user/' . $data->photo));
                }
            }
            $input['photo'] = $name;
        }
        $data->update($input);


        Session::flash('success', 'Profile Update Successfully!');
        return back();
    }

    public function resetform()
    {
        return view('user.reset');
    }

    public function reset(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirmation_password' => 'required',
        ]);
        $user = Auth::user();
        if ($request->current_password) {
            if (Hash::check($request->current_password, $user->password)) {
                if ($request->new_password == $request->confirmation_password) {
                    $input['password'] = Hash::make($request->new_password);
                } else {
                    return back()->with('err', __('Confirm password does not match.'));
                }
            } else {
                return back()->with('err', __('Current password Does not match.'));
            }
        }

        $user->update($input);

        Session::flash('success', 'Successfully change your password');
        return back();
    }


    public function shippingdetails()
    {
        $user = Auth::user();
        return view('user.shipping_details', compact('user'));
    }

    public function shippingupdate(Request $request)
    {
        $request->validate([
            "shpping_fname" => 'required',
            "shpping_lname" => 'required',
            "shpping_email" => 'required',
            "shpping_number" => 'required',
            "shpping_city" => 'required',
            "shpping_state" => 'required',
            "shpping_address" => 'required',
            "shpping_country" => 'required',
        ]);


        Auth::user()->update($request->all());

        Session::flash('success', 'Shipping Details Update Successfully.');
        return back();
    }

    public function billingdetails()
    {
        $user = Auth::user();
        return view('user.billing_details', compact('user'));
    }

    public function billingupdate(Request $request)
    {
        $request->validate([
            "billing_fname" => 'required',
            "billing_lname" => 'required',
            "billing_email" => 'required',
            "billing_number" => 'required',
            "billing_city" => 'required',
            "billing_state" => 'required',
            "billing_address" => 'required',
            "billing_country" => 'required',
        ]);

        Auth::user()->update($request->all());

        Session::flash('success', 'Billing Details Update Successfully.');
        return back();
    }
}
