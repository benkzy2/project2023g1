<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\Models\Language;
use Config;
use App\Models\BasicSetting as BS;
use App\Models\BasicExtended as BE;
use App\Models\User;
use Socialite;
use Redirect;

use function GuzzleHttp\json_decode;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
        $this->middleware('setlang');
        $bs = BS::first();
        $be = BE::first();

        Config::set('captcha.sitekey', $bs->google_recaptcha_site_key);
        Config::set('captcha.secret', $bs->google_recaptcha_secret_key);

        Config::set('services.facebook.client_id', $be->facebook_app_id);
        Config::set('services.facebook.client_secret', $be->facebook_app_secret);
        Config::set('services.facebook.redirect', url('login/facebook/callback'));

        Config::set('services.google.client_id', $be->google_client_id);
        Config::set('services.google.client_secret', $be->google_client_secret);
        Config::set('services.google.redirect', url('login/google/callback'));
    }

    public function showLoginForm()
    {
        if (strpos(session()->get('link'), 'qr-menu') !== false) {
            session()->forget('link');
        }

        return view('user.login');
    }

    public function login(Request $request)
    {
        //--- Validation Section
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $bs = $currentLang->basic_setting;
        $be = $currentLang->basic_extended;

        $rules = [
            'email'   => 'required|email',
            'password' => 'required'
        ];

        if ($bs->is_recaptcha == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }
        $messages = [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];
        $request->validate($rules, $messages);
        //--- Validation Section Ends

        if (Session::has('link')) {
            $redirectUrl = Session::get('link');
            Session::forget('link');
        } else {
            $redirectUrl = route('user-dashboard');
        }

        // Attempt to log the user in
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            // Check If Email is verified or not
            if (Auth::guard('web')->user()->email_verified == 'no' || Auth::guard('web')->user()->email_verified == 'No') {
                Auth::guard('web')->logout();

                return back()->with('err', __('Your Email is not Verified!'));
            }
            if (Auth::guard('web')->user()->status == '0') {
                Auth::guard('web')->logout();

                return back()->with('err', __('Your account has been banned'));
            }
            return redirect($redirectUrl);
        }
        // if unsuccessful, then redirect back to the login with the form data
        return back()->with('err', __("Credentials Doesn\'t Match !"));
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        return $this->authUserViaProvider('facebook');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        return $this->authUserViaProvider('google');
    }

    public function authUserViaProvider($provider) {
        if (Session::has('link')) {
            $redirectUrl = Session::get('link');
            Session::forget('link');
        } else {
            $redirectUrl = route('user-dashboard');
        }

        $user = Socialite::driver($provider)->user();
        if ($provider == 'facebook') {
            $user = json_decode(json_encode($user), true);
        } elseif ($provider == 'google') {
            $user = json_decode(json_encode($user), true)['user'];
        }


        if ($provider == 'facebook') {
            $fname = $user['name'];
            $photo = $user['avatar'];
        } elseif ($provider == 'google') {
            $fname = $user['given_name'];
            $lname = $user['family_name'];
            $photo = $user['picture'];
        }
        $email = $user['email'];
        $provider_id = $user['id'];


        // retrieve user via the email
        $user = User::where('email', $email)->first();

        // if doesn't exist, store the new user's info (email, name, avatar, provider_name, provider_id)
        if (empty($user)) {
            $user = new User;
            $user->email = $email;
            $user->fname = $fname;
            if ($provider == 'google') {
                $user->lname = $lname;
            }
            $user->photo = $photo;
            $user->provider_id = $provider_id;
            $user->provider = $provider;
            $user->status = 1;
            $user->email_verified = 'Yes';
            $user->save();
        }


        // authenticate the user
        Auth::login($user);

        // if user is banned
        if ($user->status == 0) {
            Auth::guard('web')->logout();

            if (strpos($redirectUrl, 'qr-menu') !== false) {
                return redirect(route('front.qrmenu.login'))->with('err', __('Your account has been banned'));
            } else {
                return redirect(route('user.login'))->with('err', __('Your account has been banned'));
            }
        }

        // if logged in successfully
        return redirect($redirectUrl);

    }
}
