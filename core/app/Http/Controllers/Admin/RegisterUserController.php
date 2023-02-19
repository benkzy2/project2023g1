<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;

class RegisterUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.register_user.index',compact('users'));
    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders()->orderBy('id', 'DESC')->paginate(10);
        return view('admin.register_user.details',compact('user', 'orders'));

    }


    public function userban(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->update([
            'status' => $request->status,
        ]);
        Session::flash('success', 'Status update successfully!');
        return back();

    }
}
