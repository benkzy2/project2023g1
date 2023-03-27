<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BasicExtended;
use App\Models\Guest;
use App\Models\User;
use App\Notifications\PushDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Notification;
use Validator;

class PushController extends Controller
{
    public function settings() {
        return view('admin.pushnotification.settings');
    }

    public function updateSettings(Request $request) {
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

        $request->validate($rules);

        if ($request->hasFile('file')) {
            @unlink("assets/front/img/pushnotification_icon.png");
            $request->file('file')->move('assets/front/img/', 'pushnotification_icon.png');
        }

        session()->flash('success', 'Push Notification icon updated!');
        return back();
    }

    public function generateKeys() {
        \Artisan::call('webpush:vapid');
        \Artisan::call('config:clear');

        session()->flash('success', 'VAPID keys generated');
        return back();
    }

    public function send() {
        return view('admin.pushnotification.send');
    }

    public function push(Request $request){
        $request->validate([
            'title' => 'required',
            'button_url' => 'required',
            'button_text' => 'required'
        ]);

        $title = $request->title;
        $message = $request->message;
        $buttonText = $request->button_text;
        $buttonURL = $request->button_url;

        Notification::send(Guest::all(),new PushDemo($title, $message, $buttonText, $buttonURL));

        $request->session()->flash('success', 'Push notification sent');
        return redirect()->route('admin.pushnotification.send');
    }
}
