<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicSetting;
use App\Models\BasicExtended;
use App\Models\Language;
use App\Models\Timezone;
use Session;
use Validator;
use Artisan;
use Purifier;

class BasicController extends Controller
{
    public function favicon(Request $request)
    {
        return view('admin.basic.favicon');
    }

    public function updatefav(Request $request)
    {
        $img = $request->file('favicon');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
            'favicon' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors' => $validator->errors(), 'id' => 'favicon']);
        }

        if ($request->hasFile('favicon')) {
            $filename = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);

            $bss = BasicSetting::all();

            foreach ($bss as $key => $bs) {

                @unlink('assets/front/img/' . $bs->favicon);
                $bs->favicon = $filename;
                $bs->save();
            }
        }
        Session::flash('success', 'Favicon update successfully.');
        return back();
    }

    public function logo(Request $request)
    {
        return view('admin.basic.logo');
    }

    public function updatelogo(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
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
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors' => $validator->errors(), 'id' => 'logo']);
        }

        if ($request->hasFile('file')) {
            $bss = BasicSetting::all();

            $filename = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);

            foreach ($bss as $key => $bs) {
                // only remove the the previous image, if it is not the same as default image or the first image is being updated
                @unlink('assets/front/img/' . $bs->logo);
                $bs->logo = $filename;
                $bs->save();
            }
        }
        Session::flash('success', 'Logo update successfully.');
        return back();
    }

    public function preloader(Request $request)
    {
        return view('admin.basic.preloader');
    }

    public function updatepreloader(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg', 'gif');

        $rules = [
            'preloader_status' => 'required',
            'file' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only gif, png, jpg, jpeg image is allowed");
                        }
                    }
                },
            ],
        ];

        $request->validate($rules);

        $bss = BasicSetting::all();

        if ($request->hasFile('file')) {
            $filename = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);
        }

        foreach ($bss as $key => $bs) {
            $bs->preloader_status = $request->preloader_status;
            if ($request->hasFile('file')) {
                @unlink('assets/front/img/' . $bs->preloader);
                $bs->preloader = $filename;
            }
            $bs->save();
        }
        Session::flash('success', 'Preloader updated successfully.');
        return back();
    }


    public function basicinfo(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;
        $data['abe'] = $lang->basic_extended;
        $data['timezones'] = Timezone::all();
        return view('admin.basic.basicinfo', $data);
    }

    public function updatebasicinfo(Request $request, $langid)
    {
        $request->validate([
            'website_title' => 'required',
            'base_color' => 'required',
            'office_time' => 'required',
            'base_currency_symbol' => 'required',
            'base_currency_symbol_position' => 'required',
            'base_currency_text' => 'required',
            'base_currency_text_position' => 'required',
            'base_currency_rate' => 'required|numeric',
            'home_version' => 'required'
        ]);

        $bss = BasicSetting::all();
        foreach ($bss as $key => $bs) {
            $bs->website_title = $request->website_title;
            $bs->base_color = $request->base_color;
            $bs->office_time = $request->office_time;
            $bs->home_version = $request->home_version;
            $bs->save();
        }

        $bes = BasicExtended::all();
        foreach ($bes as $key => $be) {
            $be->base_currency_symbol = $request->base_currency_symbol;
            $be->base_currency_symbol_position = $request->base_currency_symbol_position;
            $be->base_currency_text = $request->base_currency_text;
            $be->base_currency_text_position = $request->base_currency_text_position;
            $be->base_currency_rate = $request->base_currency_rate;
            if (!empty($request->timezone)) {
                $be->timezone = $request->timezone;
            }
            $be->save();
        }

        // set timezone in .env
        $arr = ['TIMEZONE' => $request->timezone];
        setEnvironmentValue($arr);
        \Artisan::call('config:clear');


        Session::flash('success', 'Basic informations updated successfully!');
        return back();
    }


    public function updateslider(Request $request, $lang)
    {
        $be = BasicExtended::where('language_id', $lang)->firstOrFail();


        if ($request->hasFile('slider_shape_img')) {
            @unlink('assets/front/img/' . $be->slider_shape_img);
            $filename = uniqid() . '.' . $request->slider_shape_img->getClientOriginalExtension();
            $request->slider_shape_img->move('assets/front/img/', $filename);
            $be->slider_shape_img = $filename;
        }

        if ($request->hasFile('slider_bottom_img')) {
            @unlink('assets/front/img/' . $be->slider_bottom_img);
            $filename = uniqid() . '.' . $request->slider_bottom_img->getClientOriginalExtension();
            $request->slider_bottom_img->move('assets/front/img/', $filename);
            $be->slider_bottom_img = $filename;
        }

        $be->save();
        Session::flash('success', 'Slider data updated successfully!');
        return back();
    }

    public function support(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;

        return view('admin.basic.support', $data);
    }

    public function updatesupport(Request $request, $langid)
    {
        $request->validate([
            'support_email' => 'required|email|max:100',
            'support_phone' => 'required|max:30',
        ]);

        $bs = BasicSetting::where('language_id', $langid)->firstOrFail();
        $bs->support_email = $request->support_email;
        $bs->support_phone = $request->support_phone;
        $bs->save();

        Session::flash('success', 'Support Informations updated successfully!');
        return back();
    }

    public function breadcrumb(Request $request)
    {
        return view('admin.basic.breadcrumb');
    }

    public function updatebreadcrumb(Request $request)
    {
        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
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
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors' => $validator->errors(), 'id' => 'breadcrumb']);
        }


        if ($request->hasFile('file')) {

            $filename = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move('assets/front/img/', $filename);

            $bss = BasicSetting::all();
            foreach ($bss as $key => $bs) {
                @unlink('assets/front/img/' . $bs->breadcrumb);
                $bs->breadcrumb = $filename;
                $bs->save();
            }
        }
        Session::flash('success', 'Breadcrumb update successfully.');
        return back();
    }

    public function heading(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;
        $data['abe'] = $lang->basic_extended;
        return view('admin.basic.headings', $data);
    }

    public function updateheading(Request $request, $langid)
    {
        $request->validate([
            'menu_title' => 'required',
            'items_title' => 'required',
            'menu_details_title' => 'required',
            'blog_details_title' => 'required',
            'contact_title' => 'required',
            'career_title' => 'required',
            'career_details_title' => 'required',
            'gallery_title' => 'required',
            'faq_title' => 'required',
            'team_title' => 'required',
            'blog_title' => 'required',
            'error_title' => 'required',
            'cart_title' => 'required',
            'checkout_title' => 'required',
            'reservation_title' => 'required'
        ]);

        $bs = BasicSetting::where('language_id', $langid)->firstOrFail();
        $bs->menu_title = $request->menu_title;
        $bs->items_title = $request->items_title;
        $bs->menu_details_title = $request->menu_details_title;
        $bs->blog_details_title = $request->blog_details_title;
        $bs->error_title = $request->error_title;
        $bs->gallery_title = $request->gallery_title;
        $bs->team_title = $request->team_title;
        $bs->contact_title = $request->contact_title;
        $bs->blog_title = $request->blog_title;
        $bs->cart_title = $request->cart_title;
        $bs->checkout_title = $request->checkout_title;
        $bs->reservation_title = $request->reservation_title;

        $bs->save();

        $be = BasicExtended::where('language_id', $langid)->firstOrFail();
        $be->faq_title = $request->faq_title;
        $be->career_title = $request->career_title;
        $be->career_details_title = $request->career_details_title;
        $be->save();

        Session::flash('success', 'Page title & subtitles updated successfully!');
        return back();
    }


    public function script()
    {
        return view('admin.basic.scripts');
    }

    public function updatescript(Request $request)
    {

        $bss = BasicSetting::all();

        foreach ($bss as $bs) {
            $bs->tawk_to_script = $request->tawk_to_script;
            $bs->is_tawkto = $request->is_tawkto;
            $bs->is_disqus = $request->is_disqus;
            $bs->disqus_script = $request->disqus_script;
            $bs->google_analytics_script = $request->google_analytics_script;
            $bs->is_analytics = $request->is_analytics;
            $bs->appzi_script = $request->appzi_script;
            $bs->is_appzi = $request->is_appzi;
            $bs->addthis_script = $request->addthis_script;
            $bs->is_addthis = $request->is_addthis;
            $bs->is_recaptcha = $request->is_recaptcha;
            $bs->google_recaptcha_site_key = $request->google_recaptcha_site_key;
            $bs->google_recaptcha_secret_key = $request->google_recaptcha_secret_key;

            $bs->is_whatsapp = $request->is_whatsapp;
            $bs->whatsapp_number = $request->whatsapp_number;
            $bs->whatsapp_header_title = $request->whatsapp_header_title;
            $bs->whatsapp_popup_message = $request->whatsapp_popup_message;
            $bs->whatsapp_popup = $request->whatsapp_popup;

            $bs->save();
        }


        $bes = BasicExtended::all();
        foreach ($bes as $key => $be) {
            $be->facebook_pexel_script = $request->facebook_pexel_script;
            $be->is_facebook_pexel = $request->is_facebook_pexel;

            $be->pusher_app_id = $request->pusher_app_id;
            $be->pusher_app_key = $request->pusher_app_key;
            $be->pusher_app_secret = $request->pusher_app_secret;
            $be->pusher_app_cluster = $request->pusher_app_cluster;

            $be->is_facebook_login = $request->is_facebook_login;
            $be->facebook_app_id = $request->facebook_app_id;
            $be->facebook_app_secret = $request->facebook_app_secret;

            $be->is_google_login = $request->is_google_login;
            $be->google_client_id = $request->google_client_id;
            $be->google_client_secret = $request->google_client_secret;

            $be->save();
        }

        $arr = ['PUSHER_APP_ID' => $request->pusher_app_id, 'PUSHER_APP_KEY' => $request->pusher_app_key, 'PUSHER_APP_SECRET' => $request->pusher_app_secret, 'PUSHER_APP_CLUSTER' => $request->pusher_app_cluster];
        setEnvironmentValue($arr);
        \Artisan::call('config:clear');

        Session::flash('success', 'Scripts updated successfully!');
        return back();
    }


    public function maintainance()
    {
        return view('admin.basic.maintainance');
    }

    public function updatemaintainance(Request $request)
    {
        $bss = BasicSetting::all();

        $img = $request->file('file');
        $allowedExts = array('jpg', 'png', 'jpeg');

        $rules = [
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
        ];


        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json(['errors' => $validator->errors(), 'id' => 'maintainance_img']);
        }

        if ($request->hasFile('file')) {
            @unlink("assets/front/img/maintainance.png");
            $request->file('file')->move('assets/front/img/', 'maintainance.png');
        }



        foreach ($bss as $bs) {
            $bs->maintainance_text = Purifier::clean($request->maintainance_text);
            $bs->maintainance_mode = $request->maintainance_mode;
            $bs->ips = $request->ips;
            $bs->save();
        }

        $down = "down";
        if ($request->filled('ips')) {
            $ips = explode(",", $request->ips);
            foreach ($ips as $key => $ip) {
                $down .= " --allow=" . $ip;
            }
        }
        // return $down;

        if ($request->maintainance_mode == 1) {
            @unlink('core/storage/framework/down');
            Artisan::call($down);
        } else {
            Artisan::call('up');
        }

        Session::flash('success', 'Maintanance mode & page updated successfully!');
        return back();
    }


    public function sections(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abs'] = $lang->basic_setting;

        return view('admin.basic.sections', $data);
    }

    public function updatesections(Request $request, $langid)
    {
        $bs = BasicSetting::where('language_id', $langid)->firstOrFail();
        $bs->update($request->all());

        Session::flash('success', 'Sections customized successfully!');
        return back();
    }


    public function cookiealert(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;
        $data['abe'] = $lang->basic_extended;

        return view('admin.basic.cookie', $data);
    }

    public function updatecookie(Request $request, $langid)
    {
        $request->validate([
            'cookie_alert_status' => 'required',
            'cookie_alert_text' => 'required',
            'cookie_alert_button_text' => 'required|max:25',
        ]);

        $be = BasicExtended::where('language_id', $langid)->firstOrFail();
        $be->cookie_alert_status = $request->cookie_alert_status;
        $be->cookie_alert_text = Purifier::clean($request->cookie_alert_text);
        $be->cookie_alert_button_text = $request->cookie_alert_button_text;
        $be->save();

        Session::flash('success', 'Cookie alert updated successfully!');
        return back();
    }

    public function callwaiter(Request $request)
    {
        return view('admin.basic.callwaiter');
    }

    public function updateCallwaiter(Request $request)
    {

        $rules = [
            'website_call_waiter' => 'required',
            'qr_call_waiter' => 'required',
        ];

        $request->validate($rules);

        $bss = BasicSetting::all();

        foreach ($bss as $key => $bs) {
            $bs->website_call_waiter = $request->website_call_waiter;
            $bs->qr_call_waiter = $request->qr_call_waiter;
            $bs->save();
        }
        Session::flash('success', 'Status updated successfully.');
        return back();
    }


    public function menusection(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;

        $data['abs'] = $lang->basic_setting;
        $data['lang_id'] = $lang->id;
        $data['abe'] = $lang->basic_extended;
        return view('admin.home.menusection', $data);
    }

    public function menusectionUpdate(Request $request, $langid)
    {
        $img = $request->file('menu_section_img');
        $allowedExts = array('jpg', 'png', 'jpeg');
        $rules = [
            'menu_version' => 'required',
            'menu_section_subtitle' => 'required|max:255',
            'menu_section_title' => 'required|max:255',
            'menu_section_img' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
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


        $be = BasicExtended::where('language_id', $langid)->firstOrFail();

        if ($request->hasFile('menu_section_img')) {
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $request->file('menu_section_img')->move('assets/front/img/', $filename);
            @unlink('assets/front/img/' . $be->menu_section_img);
            $be->menu_section_img = $filename;
        }


        $be->menu_version = $request->menu_version;
        $be->menu_section_subtitle = $request->menu_section_subtitle;
        $be->menu_section_title = $request->menu_section_title;
        $be->save();

        Session::flash('success', 'Texts updated successfully!');
        return "success";
    }


    public function tablesection(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;

        $data['abs'] = $lang->basic_setting;
        $data['lang_id'] = $lang->id;
        $data['abe'] = $lang->basic_extended;

        return view('admin.home.tablesection', $data);
    }

    public function tablesectionUpdate(Request $request, $langid)
    {

        $img = $request->file('table_section_img');
        $allowedExts = array('jpg', 'png', 'jpeg');
        $rules = [
            'table_section_subtitle' => 'required|max:255',
            'table_section_title' => 'required|max:255',
            'table_section_img' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
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


        $be = BasicExtended::where('language_id', $langid)->firstOrFail();

        if ($request->hasFile('table_section_img')) {
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $request->file('table_section_img')->move('assets/front/img/', $filename);
            @unlink('assets/front/img/' . $be->table_section_img);
            $be->table_section_img = $filename;
        }


        $be->table_section_subtitle = $request->table_section_subtitle;
        $be->table_section_title = $request->table_section_title;
        $be->save();

        Session::flash('success', 'Texts updated successfully!');
        return "success";
    }


    public function instagramsection(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;

        $data['abs'] = $lang->basic_setting;
        $data['lang_id'] = $lang->id;
        $data['abe'] = $lang->basic_extended;

        return view('admin.home.instagram_section', $data);
    }

    public function instagramsectionUpdate(Request $request, $langid)
    {


        $rules = [
            'instagram_section_subtitle' => 'required|max:255',
            'instagram_section_title' => 'required|max:255',

        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errmsgs = $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
        }


        $be = BasicExtended::where('language_id', $langid)->firstOrFail();



        $be->instagram_section_subtitle = $request->instagram_section_subtitle;
        $be->instagram_section_title = $request->instagram_section_title;
        $be->save();

        Session::flash('success', 'Texts updated successfully!');
        return "success";
    }



    public function specialsection(Request $request)
    {
        $lang = Language::where('code', $request->language)->firstOrFail();
        $data['lang_id'] = $lang->id;

        $data['abs'] = $lang->basic_setting;
        $data['lang_id'] = $lang->id;
        $data['abe'] = $lang->basic_extended;

        return view('admin.home.specialsection', $data);
    }

    public function specialsectionUpdate(Request $request, $langid)
    {
        $img = $request->file('special_section_bg');
        $allowedExts = array('jpg', 'png', 'jpeg');
        $rules = [
            'special_section_subtitle' => 'required|max:255',
            'special_section_title' => 'required|max:255',
            'special_section_bg' => [
                function ($attribute, $value, $fail) use ($img, $allowedExts) {
                    if (!empty($img)) {
                        $ext = $img->getClientOriginalExtension();
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

        $be = BasicExtended::where('language_id', $langid)->firstOrFail();

        if ($request->hasFile('special_section_bg')) {
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $request->file('special_section_bg')->move('assets/front/img/', $filename);
            @unlink('assets/front/img/' . $be->special_section_bg);
            $be->special_section_bg = $filename;
        }

        $be->special_section_subtitle = $request->special_section_subtitle;
        $be->special_section_title = $request->special_section_title;
        $be->save();

        Session::flash('success', 'Texts updated successfully!');
        return "success";
    }

    public function removeImage(Request $request)
    {
        $type = $request->type;
        $langid = $request->language_id;

        $be = BasicExtended::where('language_id', $langid)->firstOrFail();

        if ($type == "menu_background") {
            @unlink("assets/front/img/" . $be->menu_section_img);
            $be->menu_section_img = NULL;
            $be->save();
        } elseif ($type == "table_background") {
            @unlink("assets/front/img/" . $be->table_section_img);
            $be->table_section_img = NULL;
            $be->save();
        }

        $request->session()->flash('success', 'Image removed successfully!');
        return "success";
    }
}
