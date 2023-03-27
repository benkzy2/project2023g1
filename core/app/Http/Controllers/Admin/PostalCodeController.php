<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostalCode;
use App\Models\Language;
use Validator;
use Session;

class PostalCodeController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->first();

        $lang_id = $lang->id;
        $data['postcodes'] = PostalCode::where('language_id', $lang_id)->orderBy('id', 'DESC')->get();

        $data['lang_id'] = $lang_id;

        return view('admin.postcodes.index', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'language_id.required' => 'The language field is required'
        ];

        $rules = [
            'language_id' => 'required',
            'title' => 'nullable|max:255',
            'postcode' => 'required',
            'charge' => 'required|numeric',
            'serial_number' => 'required'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $postalCode = new PostalCode;
        $postalCode->language_id = $request->language_id;
        $postalCode->title = $request->title;
        $postalCode->postcode = $request->postcode;
        $postalCode->charge = $request->charge;
        $postalCode->serial_number = $request->serial_number;
        $postalCode->save();

        Session::flash('success', 'Postal Code added successfully!');
        return "success";
    }

    public function update(Request $request)
    {
        $rules = [
            'title' => 'nullable|max:255',
            'postcode' => 'required',
            'charge' => 'required|numeric',
            'serial_number' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $postalCode = PostalCode::findOrFail($request->postcode_id);
        $postalCode->title = $request->title;
        $postalCode->postcode = $request->postcode;
        $postalCode->charge = $request->charge;
        $postalCode->serial_number = $request->serial_number;
        $postalCode->save();

        Session::flash('success', 'Postal code updated successfully!');
        return "success";
    }

    public function delete(Request $request)
    {

        $postalCode = PostalCode::findOrFail($request->postcode_id);
        $postalCode->delete();

        Session::flash('success', 'Postal Code deleted successfully!');
        return back();
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $postalCode = PostalCode::findOrFail($id);
            $postalCode->delete();
        }

        Session::flash('success', 'Postal Codes deleted successfully!');
        return "success";
    }
}
