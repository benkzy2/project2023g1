<?php

namespace App\Http\Controllers\Admin;

use App\BasicExtended;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting;
use App\Models\Language;
use Session;
use Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->language)) {
            $data['lang_id'] = 0;
            $data['abs'] = BasicSetting::firstOrFail();
            $data['abe'] = BasicExtended::firstOrFail();
        } else {
            $lang = Language::where('code', $request->language)->firstOrFail();
            $data['lang_id'] = $lang->id;
            $data['abs'] = $lang->basic_setting;
            $data['abe'] = $lang->basic_extended;
        }
        return view('admin.contact', $data);
    }

    public function update(Request $request, $langid)
    {
        $request->validate([
            'contact_form_title' => 'required|max:255',
            'contact_info_title' => 'required|max:255',
            'contact_text' => 'required|max:255',
            'contact_address' => 'required',
            'contact_number' => 'required',
            'contact_mails' => 'required',
            'longitude' => 'required|max:255',
            'latitude' => 'required|max:255',
            'map_zoom' => 'nullable|max:255',
        ]);


        $bs = BasicSetting::where('language_id', $langid)->firstOrFail();


        $bs->contact_form_title = $request->contact_form_title;
        $bs->contact_info_title = $request->contact_info_title;
        $bs->contact_text = $request->contact_text;
        $bs->contact_address = $request->contact_address;
        $bs->contact_number = $request->contact_number;
        $bs->contact_mails = $request->contact_mails;
        $bs->latitude = $request->latitude;
        $bs->longitude = $request->longitude;
        $bs->map_zoom = $request->map_zoom ? $request->map_zoom : 0;

        $bs->save();

        Session::flash('success', 'Contact page updated successfully!');
        return back();
    }
}
