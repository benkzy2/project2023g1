<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting as BS;
use App\Models\BasicExtended;
use App\Models\Language;
use Validator;
use Session;
use Purifier;

class FooterController extends Controller
{
    public function index(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;

        $data['abs'] = $lang->basic_setting;
        $data['abe'] = $lang->basic_extended;

        return view('admin.footer.logo-text', $data);
    }



    public function update(Request $request, $langid)
    {
        $img = $request->file('file');
        $fbimg = $request->file('footer_bottom_img');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
            'footer_text' => 'required|max:255',
            'copyright_text' => 'required',
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],

            'footer_bottom_img' => [
                function ($attribute, $value, $fail) use ($fbimg, $allowedExts) {
                    if (!empty($fbimg)) {
                        $ext = $fbimg->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }

        $bs = BS::where('language_id', $langid)->firstOrFail();

        if ($request->hasFile('file')) {

            @unlink('assets/front/img/' . $bs->footer_logo);
            $filename = uniqid() .'.'. $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);
            $bs->footer_logo = $filename;
        }
        if ($request->hasFile('footer_bottom_img')) {
            $be = BasicExtended::where('language_id', $langid)->firstOrFail();
            @unlink('assets/front/img/' . $be->footer_bottom_img);
            $filename = uniqid() .'.'. $fbimg->getClientOriginalExtension();
            $fbimg->move('assets/front/img/', $filename);
            $be->footer_bottom_img = $filename;
            $be->save();
        }

        $bs->footer_text = $request->footer_text;
        $bs->copyright_text = Purifier::clean($request->copyright_text);
        $bs->save();

        Session::flash('success', 'Footer text updated successfully!');
        return "success";
    }
}
