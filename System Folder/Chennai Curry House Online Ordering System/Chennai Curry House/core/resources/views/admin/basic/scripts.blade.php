@extends('admin.layout')
@section('content')
<div class="page-header">
   <h4 class="page-title">Scripts</h4>
   <ul class="breadcrumbs">
      <li class="nav-home">
         <a href="{{route('admin.dashboard')}}">
         <i class="flaticon-home"></i>
         </a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Settings</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Scripts</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-lg-12">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Pusher Setup</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.pusher.update')}}" method="POST" id="pusherForm">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Pusher App ID</label>
                                 <input class="form-control" name="pusher_app_id" value="{{$be->pusher_app_id}}">
                                 @if ($errors->has('pusher_app_id'))
                                 <p class="mb-0 text-danger">{{$errors->first('pusher_app_id')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Pusher App key</label>
                                 <input class="form-control" name="pusher_app_key" value="{{$be->pusher_app_key}}">
                                 @if ($errors->has('pusher_app_key'))
                                 <p class="mb-0 text-danger">{{$errors->first('pusher_app_key')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Pusher App Secret</label>
                                 <input class="form-control" name="pusher_app_secret" value="{{$be->pusher_app_secret}}">
                                 @if ($errors->has('pusher_app_secret'))
                                 <p class="mb-0 text-danger">{{$errors->first('pusher_app_secret')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Pusher App Cluster</label>
                                 <input class="form-control" name="pusher_app_cluster" value="{{$be->pusher_app_cluster}}">
                                 @if ($errors->has('pusher_app_cluster'))
                                 <p class="text-danger">{{$errors->first('pusher_app_cluster')}}</p>
                                 @endif
                                 <p class="text-warning mb-0">Pusher credentials needed for Realtime notificaion after <strong class="text-danger">new order & call waiter</strong> in Admin panel with sound</p>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button type="submit" form="pusherForm" class="btn btn-success">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Facebook Login</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.fblogin.update')}}" id="fbLoginForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_facebook_login" value="1" class="selectgroup-input" {{$be->is_facebook_login == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_facebook_login" value="0" class="selectgroup-input" {{$be->is_facebook_login == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_facebook_login'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_facebook_login')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Facebook App ID</label>
                                 <input class="form-control" name="facebook_app_id" value="{{$be->facebook_app_id}}">
                                 @if ($errors->has('facebook_app_id'))
                                 <p class="text-danger">{{$errors->first('facebook_app_id')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Facebook App Secret</label>
                                 <input class="form-control" name="facebook_app_secret" value="{{$be->facebook_app_secret}}">
                                 @if ($errors->has('facebook_app_secret'))
                                 <p class="text-danger">{{$errors->first('facebook_app_secret')}}</p>
                                 @endif
                                 <p class="text-warning mb-0">Facebook App ID & App Secret are required for Facebook Login.</p>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button class="btn btn-success" type="submit" form="fbLoginForm">Update</button>
                  </div>
               </div>
            </div>

            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Google Login</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.googlelogin.update')}}" method="POST" id="googleLoginForm">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_google_login" value="1" class="selectgroup-input" {{$be->is_google_login == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_google_login" value="0" class="selectgroup-input" {{$be->is_google_login == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_google_login'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_google_login')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Google Client ID</label>
                                 <input class="form-control" name="google_client_id" value="{{$be->google_client_id}}">
                                 @if ($errors->has('google_client_id'))
                                 <p class="text-danger">{{$errors->first('google_client_id')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Google Client Secret</label>
                                 <input class="form-control" name="google_client_secret" value="{{$be->google_client_secret}}">
                                 @if ($errors->has('google_client_secret'))
                                 <p class="text-danger">{{$errors->first('google_client_secret')}}</p>
                                 @endif
                                 <p class="text-warning mb-0">Goole Client ID & Client Secret are required for Google Login.</p>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button type="submit" class="btn btn-success" form="googleLoginForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Twilio Credentials</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.twilio.update')}}" id="twilioForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                              <div class="form-group">
                                 <label>Account SID</label>
                                 <input class="form-control" name="twilio_sid" value="{{$abex->twilio_sid}}">
                                 @if ($errors->has('twilio_sid'))
                                 <p class="text-danger">{{$errors->first('twilio_sid')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Auth token</label>
                                 <input class="form-control" name="twilio_token" value="{{$abex->twilio_token}}">
                                 @if ($errors->has('twilio_token'))
                                 <p class="text-danger">{{$errors->first('twilio_token')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Phone Number (with country code)</label>
                                 <input class="form-control" name="twilio_phone_number" value="{{$abex->twilio_phone_number}}">
                                 @if ($errors->has('twilio_phone_number'))
                                 <p class="text-danger">{{$errors->first('twilio_phone_number')}}</p>
                                 @endif
                                 <p class="text-warning mb-0">Notifications will be sent from this phone number</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>

               <div class="card-footer text-center">
                  <button type="submit" form="twilioForm" class="btn btn-success">Update</button>
               </div>
            </div>
         </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="card-title">WhatsApp Chat Button</div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.whatsapp.update')}}" method="POST" id="waForm">
                        @csrf
                        <div class="form-group">
                           <label>Status</label>
                           <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                              <input type="radio" name="is_whatsapp" value="1" class="selectgroup-input" {{$bs->is_whatsapp == 1 ? 'checked' : ''}}>
                              <span class="selectgroup-button">Active</span>
                              </label>
                              <label class="selectgroup-item">
                              <input type="radio" name="is_whatsapp" value="0" class="selectgroup-input" {{$bs->is_whatsapp == 0 ? 'checked' : ''}}>
                              <span class="selectgroup-button">Deactive</span>
                              </label>
                           </div>
                           <p class="text-warning mb-0">If you enable WhatsApp, then Tawk.to must be disabled.</p>
                        </div>
                        <div class="form-group">
                           <label>WhatsApp Number</label>
                           <input class="form-control" type="text" name="whatsapp_number" value="{{$bs->whatsapp_number}}">
                           <p class="text-warning mb-0">Enter Phone number with Country Code</p>
                        </div>
                        <div class="form-group">
                           <label>WhatsApp Header Title</label>
                           <input class="form-control" type="text" name="whatsapp_header_title" value="{{$bs->whatsapp_header_title}}">
                           @if ($errors->has('whatsapp_header_title'))
                           <p class="mb-0 text-danger">{{$errors->first('whatsapp_header_title')}}</p>
                           @endif
                        </div>
                        <div class="form-group">
                           <label>WhatsApp Popup Message</label>
                           <textarea class="form-control" name="whatsapp_popup_message" rows="2">{{$bs->whatsapp_popup_message}}</textarea>
                           @if ($errors->has('whatsapp_popup_message'))
                           <p class="mb-0 text-danger">{{$errors->first('whatsapp_popup_message')}}</p>
                           @endif
                        </div>
                        <div class="form-group">
                           <label>Popup</label>
                           <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                              <input type="radio" name="whatsapp_popup" value="1" class="selectgroup-input" {{$bs->whatsapp_popup == 1 ? 'checked' : ''}}>
                              <span class="selectgroup-button">Active</span>
                              </label>
                              <label class="selectgroup-item">
                              <input type="radio" name="whatsapp_popup" value="0" class="selectgroup-input" {{$bs->whatsapp_popup == 0 ? 'checked' : ''}}>
                              <span class="selectgroup-button">Deactive</span>
                              </label>
                           </div>
                           @if ($errors->has('whatsapp_popup'))
                           <p class="mb-0 text-danger">{{$errors->first('whatsapp_popup')}}</p>
                           @endif
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button type="submit" class="btn btn-success" form="waForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Tawk.to</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.tawk.update')}}" id="tawkForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Tawk.to Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_tawkto" value="1" class="selectgroup-input" {{$bs->is_tawkto == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_tawkto" value="0" class="selectgroup-input" {{$bs->is_tawkto == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 <p class="mb-0 text-warning">If you enable Tawk.to, then WhatsApp must be disabled.</p>
                                 @if ($errors->has('is_tawkto'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_tawkto')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Tawk.to Script</label>
                                 <textarea class="form-control" name="tawk_to_script" rows="5">{{$bs->tawk_to_script}}</textarea>
                                 @if ($errors->has('tawk_to_script'))
                                 <p class="mb-0 text-danger">{{$errors->first('tawk_to_script')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button class="btn btn-success" form="tawkForm" type="submit">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Disqus</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.disqus.update')}}" id="disqusForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Disqus Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_disqus" value="1" class="selectgroup-input" {{$bs->is_disqus == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_disqus" value="0" class="selectgroup-input" {{$bs->is_disqus == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_disqus'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_disqus')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Disqus Script</label>
                                 <textarea class="form-control" name="disqus_script" rows="5">{{$bs->disqus_script}}</textarea>
                                 @if ($errors->has('disqus_script'))
                                 <p class="mb-0 text-danger">{{$errors->first('disqus_script')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button class="btn btn-success" type="submit" form="disqusForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Google Analytics</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.ga.update')}}" method="POST" id="gaForm">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Google Analytics Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_analytics" value="1" class="selectgroup-input" {{$bs->is_analytics == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_analytics" value="0" class="selectgroup-input" {{$bs->is_analytics == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_analytics'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_analytics')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Google Analytics Script</label>
                                 <textarea class="form-control" name="google_analytics_script" rows="5">{{$bs->google_analytics_script}}</textarea>
                                 @if ($errors->has('google_analytics_script'))
                                 <p class="mb-0 text-danger">{{$errors->first('google_analytics_script')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button class="btn btn-success" type="submit" form="gaForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Appzi Feedback</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.appzi.update')}}" id="appziForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Appzi Feedback Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_appzi" value="1" class="selectgroup-input" {{$bs->is_appzi == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_appzi" value="0" class="selectgroup-input" {{$bs->is_appzi == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_appzi'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_appzi')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Appzi Feedback Script</label>
                                 <textarea class="form-control" name="appzi_script" rows="5">{{$bs->appzi_script}}</textarea>
                                 @if ($errors->has('appzi_script'))
                                 <p class="mb-0 text-danger">{{$errors->first('appzi_script')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button class="btn btn-success" type="submit" form="appziForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">AddThis</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.addthis.update')}}" id="addForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>AddThis Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_addthis" value="1" class="selectgroup-input" {{$bs->is_addthis == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_addthis" value="0" class="selectgroup-input" {{$bs->is_addthis == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_addthis'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_addthis')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>AddThis Script</label>
                                 <textarea class="form-control" name="addthis_script" rows="5">{{$bs->addthis_script}}</textarea>
                                 @if ($errors->has('addthis_script'))
                                 <p class="mb-0 text-danger">{{$errors->first('addthis_script')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button type="submit" class="btn btn-success" form="addForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Google Recaptcha</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.recaptcha.update')}}" id="grForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Google Recaptcha Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_recaptcha" value="1" class="selectgroup-input" {{$bs->is_recaptcha == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_recaptcha" value="0" class="selectgroup-input" {{$bs->is_recaptcha == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_recaptcha'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_recaptcha')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Google Recaptcha Site key</label>
                                 <input class="form-control" name="google_recaptcha_site_key" value="{{$bs->google_recaptcha_site_key}}">
                                 @if ($errors->has('google_recaptcha_site_key'))
                                 <p class="mb-0 text-danger">{{$errors->first('google_recaptcha_site_key')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Google Recaptcha Secret key</label>
                                 <input class="form-control" name="google_recaptcha_secret_key" value="{{$bs->google_recaptcha_secret_key}}">
                                 @if ($errors->has('google_recaptcha_secret_key'))
                                 <p class="mb-0 text-danger">{{$errors->first('google_recaptcha_secret_key')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button class="btn btn-success" type="submit" form="grForm">Update</button>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="card-title">Facebook Pexel</div>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <form action="{{route('admin.pixel.update')}}" id="pixelForm" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label>Facebook Pexel Status</label>
                                 <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_facebook_pexel" value="1" class="selectgroup-input" {{$be->is_facebook_pexel == 1 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                    <input type="radio" name="is_facebook_pexel" value="0" class="selectgroup-input" {{$be->is_facebook_pexel == 0 ? 'checked' : ''}}>
                                    <span class="selectgroup-button">Deactive</span>
                                    </label>
                                 </div>
                                 @if ($errors->has('is_facebook_pexel'))
                                 <p class="mb-0 text-danger">{{$errors->first('is_facebook_pexel')}}</p>
                                 @endif
                              </div>
                              <div class="form-group">
                                 <label>Facebook Pexel Script</label>
                                 <textarea class="form-control" name="facebook_pexel_script" rows="5">{{$be->facebook_pexel_script}}</textarea>
                                 @if ($errors->has('facebook_pexel_script'))
                                 <p class="mb-0 text-danger">{{$errors->first('facebook_pexel_script')}}</p>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="card-footer text-center">
                     <button type="submit" class="btn btn-success" form="pixelForm">Update</button>
                  </div>
               </div>
            </div>
         </div>
   </div>

</div>
@endsection
