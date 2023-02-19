<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicExtended as BE;
use App\Models\Language;
use App\Models\ShippingCharge;
use Validator;
use Session;

class ShopSettingController extends Controller
{
   public function index(Request $request)
   {

       $lang = Language::where('code', $request->language)->first();
        $lang_id = $lang->id;
        $data['shippings'] = ShippingCharge::where('language_id', $lang_id)->orderBy('id', 'DESC')->paginate(10);
        $data['lang_id'] = $lang_id;
       return view('admin.shipping_charge.index',$data);
   }


   public function store(Request $request)
   {
    $rules = [
        'language_id' => 'required',
        'title' => 'required',
        'text' => 'nullable|max:255',
        'charge' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        $errmsgs = $validator->getMessageBag()->add('error', 'true');
        return response()->json($validator->errors());
    }

    $input = $request->all();

    $data = new ShippingCharge;
    $data->create($input);

    Session::flash('success', 'Shipping Charge added successfully!');
    return "success";
   }

   public function edit($id)
   {
       $shipping = ShippingCharge::findOrFail($id);
       return view('admin.shipping_charge.edit',compact('shipping'));
   }

   public function update(Request $request)
   {
    $rules = [
        'language_id' => 'required',
        'title' => 'required',
        'text' => 'nullable|max:255',
        'charge' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules);
    if ($validator->fails()) {
        $errmsgs = $validator->getMessageBag()->add('error', 'true');
        return response()->json($validator->errors());
    }

    $data = ShippingCharge::findOrFail($request->shipping_id);
    $data->update($request->all());

    Session::flash('success', 'Shipping charge update successfully!');
    return "success";

   }


   public function delete(Request $request)
   {
        $data = ShippingCharge::findOrFail($request->shipping_id);
        $data->delete();
        Session::flash('success', 'Shipping charge delete successfully!');
        return back();
   }


}
