<?php

Route::get('showcart', function() {
    return \Session::get('pos_cart');
});
Route::get('clearcart', function() {
    return \Session::forget('pos_cart');
});

Route::fallback(function () {
    return view('errors.404');
});

// demo file upload route
Route::post('/demo/submit', function () {
    return 'demo';
});

Route::post('/push','Front\PushController@store');

Route::middleware(['setlang'])->group(function () {
    Route::get('/', 'Front\FrontendController@index')->name('front.index');
    Route::get('/callwaiter', 'Front\FrontendController@callwaiter')->name('front.callwaiter');
    Route::get('/reservation/form', 'Front\FrontendController@reservationForm')->name('front.reservation');
    Route::post('/table/book', 'Front\FrontendController@tableBook')->name('front.table.book');

    Route::get('/blogs', 'Front\FrontendController@blogs')->name('front.blogs');
    Route::get('/blog-details/{slug}/{id}', 'Front\FrontendController@blogdetails')->name('front.blogdetails');

    Route::get('/contact', 'Front\FrontendController@contact')->name('front.contact');
    Route::post('/sendmail', 'Front\FrontendController@sendmail')->name('front.sendmail');
    Route::post('/subscribe', 'Front\FrontendController@subscribe')->name('front.subscribe');
    Route::get('/gallery', 'Front\FrontendController@gallery')->name('front.gallery');
    Route::get('/checkout/payment/{slug1}/{slug2}', 'Front\FrontendController@loadpayment')->name('front.load.payment');



    Route::get('/team', 'Front\FrontendController@team')->name('front.team');
    Route::get('/career', 'Front\FrontendController@career')->name('front.career');
    Route::get('/career-details/{slug}/{id}', 'Front\FrontendController@careerdetails')->name('front.careerdetails');
    Route::get('/calendar', 'Front\FrontendController@calendar')->name('front.calendar');
    Route::get('/gallery', 'Front\FrontendController@gallery')->name('front.gallery');
    Route::get('/faq', 'Front\FrontendController@faq')->name('front.faq');
    // Dynamic Page Routes
    Route::get('/{slug}/{id}/page', 'Front\FrontendController@dynamicPage')->name('front.dynamicPage');
    Route::get('/changelanguage/{lang}/{type?}', 'Front\FrontendController@changeLanguage')->name('changeLanguage');

    // Product
    Route::get('/product', 'Front\ProductController@product')->name('front.product');
    Route::get('/cart', 'Front\ProductController@cart')->name('front.cart');
    Route::get('/add-to-cart/{id}', 'Front\ProductController@addToCart')->name('add.cart');
    Route::post('/cart/update', 'Front\ProductController@updatecart')->name('cart.update');
    Route::get('/cart/item/remove/{id}', 'Front\ProductController@cartitemremove')->name('cart.item.remove');
    Route::get('/checkout', 'Front\ProductController@checkout')->name('front.checkout');
    Route::get('/checkout/{slug}', 'Front\ProductController@Prdouctcheckout')->name('front.product.checkout');
    Route::get('/timeframes', 'Front\ProductController@timeframes')->name('front.timeframes');
    Route::post('/coupon', 'Front\ProductController@coupon')->name('front.coupon');

    // review
    Route::post('product/review/submit', 'Front\ReviewController@reviewsubmit')->name('product.review.submit');
    // review end
    // Product

});


Route::get('/teams', 'Front\FrontendController@teams')->name('front.teams');

// review
Route::post('product/review/submit', 'Front\ReviewController@reviewsubmit')->name('product.review.submit');



// Product
Route::get('/items', 'Front\ProductController@items')->name('front.items');
Route::get('/menus', 'Front\ProductController@product')->name('front.product');
Route::get('/{slug}/{id}/item', 'Front\ProductController@productDetails')->name('front.product.details');
Route::get('/cart', 'Front\ProductController@cart')->name('front.cart');
Route::get('/add-to-cart/{id}', 'Front\ProductController@addToCart')->name('add.cart');
Route::post('/cart/update', 'Front\ProductController@updatecart')->name('cart.update');
Route::get('/cart/item/remove/{id}', 'Front\ProductController@cartitemremove')->name('cart.item.remove');
Route::get('/checkout', 'Front\ProductController@checkout')->name('front.checkout');
Route::get('/checkout/{slug}', 'Front\ProductController@Prdouctcheckout')->name('front.product.checkout');

// CHECKOUT SECTION
Route::get('/product/{orderNum}/payment/return', 'Payment\product\PaymentController@payreturn')->name('product.payment.return');
Route::get('/product/payment/cancle', 'Payment\product\PaymentController@paycancle')->name('product.payment.cancle');
// paypal routes
Route::post('/product/paypal/submit', 'Payment\product\PaypalController@store')->name('product.paypal.submit');
Route::get('/product/paypal/{orderId}/apiRequest', 'Payment\product\PaypalController@apiRequest')->name('product.paypal.apiRequest');
Route::get('/product/payment/notify', 'Payment\product\PaypalController@notify')->name('product.paypal.notify');
// stripe routes
Route::post('/product/stripe/submit', 'Payment\product\StripeController@store')->name('product.stripe.submit');
Route::get('/product/stripe/{orderId}/apiRequest', 'Payment\product\StripeController@apiRequest')->name('product.stripe.apiRequest');
// Offline Gateways
Route::post('/product/offline/{gatewayid}/submit', 'Payment\product\OfflineController@store')->name('product.offline.submit');
//Flutterwave Routes
Route::post('/product/flutterwave/submit', 'Payment\product\FlutterWaveController@store')->name('product.flutterwave.submit');
Route::get('/product/flutterwave/{orderId}/apiRequest', 'Payment\product\FlutterWaveController@apiRequest')->name('product.flutterwave.apiRequest');
Route::post('/product/flutterwave/notify', 'Payment\product\FlutterWaveController@notify')->name('product.flutterwave.notify');
Route::get('/product/flutterwave/notify', 'Payment\product\FlutterWaveController@success')->name('product.flutterwave.success');
//Paystack Routes
Route::post('/product/paystack/submit', 'Payment\product\PaystackController@store')->name('product.paystack.submit');
Route::get('/product/paystack/{orderId}/apiRequest', 'Payment\product\PaystackController@apiRequest')->name('product.paystack.apiRequest');
Route::get('/product/paystack/notify', 'Payment\product\PaystackController@notify')->name('product.paystack.notify');
// RazorPay
Route::post('/product/razorpay/submit', 'Payment\product\RazorpayController@store')->name('product.razorpay.submit');
Route::get('/product/razorpay/{orderId}/apiRequest', 'Payment\product\RazorpayController@apiRequest')->name('product.razorpay.apiRequest');
Route::post('/product/razorpay/notify', 'Payment\product\RazorpayController@notify')->name('product.razorpay.notify');
//Instamojo Routes
Route::post('/product/instamojo/submit', 'Payment\product\InstamojoController@store')->name('product.instamojo.submit');
Route::get('/product/instamojo/{orderId}/apiRequest', 'Payment\product\InstamojoController@apiRequest')->name('product.instamojo.apiRequest');
Route::get('/product/instamojo/notify', 'Payment\product\InstamojoController@notify')->name('product.instamojo.notify');
//PayTM Routes
Route::post('/product/paytm/submit', 'Payment\product\PaytmController@store')->name('product.paytm.submit');
Route::get('/product/paytm/{orderId}/apiRequest', 'Payment\product\PaytmController@apiRequest')->name('product.paytm.apiRequest');
Route::post('/product/paytm/notify', 'Payment\product\PaytmController@notify')->name('product.paytm.notify');
//Mollie Routes
Route::post('/product/mollie/submit', 'Payment\product\MollieController@store')->name('product.mollie.submit');
Route::get('/product/mollie/{orderId}/apiRequest', 'Payment\product\MollieController@apiRequest')->name('product.mollie.apiRequest');
Route::get('/product/mollie/notify', 'Payment\product\MollieController@notify')->name('product.mollie.notify');
// Mercado Pago
Route::post('/product/mercadopago/submit', 'Payment\product\MercadopagoController@store')->name('product.mercadopago.submit');
Route::get('/product/mercadopago/{orderId}/apiRequest', 'Payment\product\MercadopagoController@apiRequest')->name('product.mercadopago.apiRequest');
Route::post('/product/mercadopago/notify', 'Payment\product\MercadopagoController@notify')->name('product.mercadopago.notify');
// PayUmoney
Route::post('/product/payumoney/submit', 'Payment\product\PayumoneyController@store')->name('product.payumoney.submit');
Route::get('/product/payumoney/{orderId}/apiRequest', 'Payment\product\PayumoneyController@apiRequest')->name('product.payumoney.apiRequest');
Route::post('/product/payumoney/notify', 'Payment\product\PayumoneyController@notify')->name('product.payumoney.notify');
// CHECKOUT SECTION ENDS





/*=======================================================
******************** QR Menu Routes **********************
=======================================================*/
// QR Order Checkout Section
Route::get('/qr/{orderNum}/payment/return', 'Payment\product\PaymentController@qrPayReturn')->name('qr.payment.return');
Route::get('/qr/payment/cancle', 'Payment\product\PaymentController@qrPayCancle')->name('qr.payment.cancle');

Route::prefix('qr-menu')->middleware(['setlang'])->group(function() {
    Route::get('/', 'Front\QrMenuController@qrMenu')->name('front.qrmenu');
    Route::post('/qty-change', 'Front\QrMenuController@qtyChange')->name('front.qr.qtyChange');
    Route::post('/remove', 'Front\QrMenuController@remove')->name('front.qr.remove');
    Route::get('/checkout', 'Front\QrMenuController@checkout')->name('front.qrmenu.checkout');
});

Route::prefix('qr-menu')->middleware(['setlang', 'guest'])->group(function() {
    Route::get('/login', 'Front\QrMenuController@login')->name('front.qrmenu.login');
});

Route::middleware(['setlang', 'auth'])->group(function() {
    Route::get('/qr-menu/logout', 'Front\QrMenuController@logout')->name('front.qrmenu.logout');
});





/*=======================================================
******************** User Routes **********************
=======================================================*/


Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'User\LoginController@login')->name('user.login.submit');

    Route::get('/login/facebook', 'User\LoginController@redirectToFacebook')->name('front.facebook.login');
    Route::get('/login/facebook/callback', 'User\LoginController@handleFacebookCallback')->name('front.facebook.callback');

    Route::get('/login/google', 'User\LoginController@redirectToGoogle')->name('front.google.login');
    Route::get('/login/google/callback', 'User\LoginController@handleGoogleCallback')->name('front.google.callback');

    Route::get('/register', 'User\RegisterController@registerPage')->name('user-register');
    Route::post('/register/submit', 'User\RegisterController@register')->name('user-register-submit');
    Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
    Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
    Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
	Route::get('/forgot/verify/{token}', 'User\ForgetController@token')->name('user-forgot-token');
});


Route::group(['prefix' => 'user', 'middleware' => ['auth', 'userstatus']], function () {
    Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');
    Route::get('/reset', 'User\UserController@resetform')->name('user-reset');
    Route::post('/reset', 'User\UserController@reset')->name('user-reset-submit');
    Route::get('/profile', 'User\UserController@profile')->name('user-profile');
    Route::post('/profile', 'User\UserController@profileupdate')->name('user-profile-update');
    Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
    Route::get('/shipping/details', 'User\UserController@shippingdetails')->name('shpping-details');
    Route::post('/shipping/details/update', 'User\UserController@shippingupdate')->name('user-shipping-update');
    Route::get('/billing/details', 'User\UserController@billingdetails')->name('billing-details');
    Route::post('/billing/details/update', 'User\UserController@billingupdate')->name('billing-update');
    Route::get('/orders', 'User\OrderController@index')->name('user-orders');
    Route::get('/order/{id}', 'User\OrderController@orderdetails')->name('user-orders-details');
	Route::get('/booking', 'User\BookingController@index')->name('user-booking');
	Route::get('/booking/{id}', 'User\BookingController@bookingdetails')->name('user-booking-details');
   
});






/*=======================================================
******************** Admin Routes **********************
=======================================================*/

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/', 'Admin\LoginController@login')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@authenticate')->name('admin.auth');

    Route::get('/mail-form', 'Admin\ForgetController@mailForm')->name('admin.forget.form');
    Route::post('/sendmail', 'Admin\ForgetController@sendmail')->name('admin.forget.mail');
});


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'checkstatus']], function () {

    // RTL check
    Route::get('/rtlcheck/{langid}', 'Admin\LanguageController@rtlcheck')->name('admin.rtlcheck');

    // Summernote image upload
    Route::post('/summernote/upload', 'Admin\SummernoteController@upload')->name('admin.summernote.upload');

    // Admin logout Route
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => 'checkpermission:Dashboard'], function () {
        // Admin Dashboard Routes
        Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
    });


    // Admin Profile Routes
    Route::get('/changePassword', 'Admin\ProfileController@changePass')->name('admin.changePass');
    Route::post('/profile/updatePassword', 'Admin\ProfileController@updatePassword')->name('admin.updatePassword');
    Route::get('/profile/edit', 'Admin\ProfileController@editProfile')->name('admin.editProfile');
    Route::post('/profile/update', 'Admin\ProfileController@updateProfile')->name('admin.updateProfile');



    Route::group(['middleware' => 'checkpermission:POS'], function () {
        // Admin POS Routes
        Route::get('/pos', 'Admin\PosController@index')->name('admin.pos');
        Route::get('/add-to-cart/{id}', 'Admin\PosController@addToCart')->name('admin.add.cart');
        Route::get('/updateQty/{key}/{qty}', 'Admin\PosController@updateQty')->name('admin.cart.quantity');
        Route::get('/cart/item/remove/{id}', 'Admin\PosController@cartitemremove')->name('admin.cart.item.remove');
        Route::get('/cart/clear', 'Admin\PosController@cartClear')->name('admin.cart.clear');
        Route::get('/print/customer-copy', 'Admin\PosController@customerCopy')->name('admin.customer.copy');
        Route::get('/print/kitchen-copy', 'Admin\PosController@kitchenCopy')->name('admin.kitchen.copy');
        Route::get('/print/token-no', 'Admin\PosController@tokenNo')->name('admin.token.no');
        Route::get('/load/{phone}/customer-name', 'Admin\PosController@customerName')->name('admin.customer.name');
        Route::post('/pos/placeorder', 'Admin\PosController@placeOrder')->name('admin.pos.placeOrder');
        Route::get('/pos/shipping-charge', 'Admin\PosController@shippingCharge')->name('admin.pos.shippingCharge');

        // Admin POS Payment Method Routes
        Route::get('/pos/payment-methods', 'Admin\PosController@paymentMethods')->name('admin.pos.pmethod.index');
        Route::post('/pos/payment-method/store', 'Admin\PosController@paymentMethodStore')->name('admin.pos.pmethod.store');
        Route::post('/pos/payment-method/update', 'Admin\PosController@paymentMethodUpdate')->name('admin.pos.pmethod.update');
        Route::post('/pos/payment-method/delete', 'Admin\PosController@paymentMethodDelete')->name('admin.pos.pmethod.delete');
    });


    Route::group(['middleware' => 'checkpermission:Basic Settings'], function () {
        // Admin Favicon Routes
        Route::get('/favicon', 'Admin\BasicController@favicon')->name('admin.favicon');
        Route::post('/favicon/post', 'Admin\BasicController@updatefav')->name('admin.favicon.update');


        // Admin Logo Routes
        Route::get('/logo', 'Admin\BasicController@logo')->name('admin.logo');
        Route::post('/logo/post', 'Admin\BasicController@updatelogo')->name('admin.logo.update');


        // Admin Preloader Routes
        Route::get('/preloader', 'Admin\BasicController@preloader')->name('admin.preloader');
        Route::post('/preloader/post', 'Admin\BasicController@updatepreloader')->name('admin.preloader.update');


        // Image Upload Progressbar route /
        Route::post('progress/image/upload', 'Admin\BasicController@progressView')->name('admin.image.progress');

        // Admin Basic Information Routes
        Route::get('/basicinfo', 'Admin\BasicController@basicinfo')->name('admin.basicinfo');
        Route::post('/basicinfo/{langid}/post', 'Admin\BasicController@updatebasicinfo')->name('admin.basicinfo.update');


        // Admin Email Settings Routes
        Route::get('/mail-from-admin', 'Admin\EmailController@mailFromAdmin')->name('admin.mailFromAdmin');
        Route::post('/mail-from-admin/update', 'Admin\EmailController@updateMailFromAdmin')->name('admin.mailfromadmin.update');
        Route::get('/mail-to-admin', 'Admin\EmailController@mailToAdmin')->name('admin.mailToAdmin');
        Route::post('/mail-to-admin/update', 'Admin\EmailController@updateMailToAdmin')->name('admin.mailtoadmin.update');
        Route::get('/email-templates', 'Admin\EmailController@templates')->name('admin.email.templates');
        Route::get('/email-template/{id}/edit', 'Admin\EmailController@editTemplate')->name('admin.email.editTemplate');
        Route::post('/emailtemplate/{id}/update', 'Admin\EmailController@templateUpdate')->name('admin.email.templateUpdate');



        // Admin Support Routes
        Route::get('/support', 'Admin\BasicController@support')->name('admin.support');
        Route::post('/support/{langid}/post', 'Admin\BasicController@updatesupport')->name('admin.support.update');

        // Admin Breadcrumb Routes
        Route::get('/breadcrumb', 'Admin\BasicController@breadcrumb')->name('admin.breadcrumb');
        Route::post('/breadcrumb/update', 'Admin\BasicController@updatebreadcrumb')->name('admin.breadcrumb.update');


        // Admin Page Heading Routes
        Route::get('/heading', 'Admin\BasicController@heading')->name('admin.heading');
        Route::post('/heading/{langid}/update', 'Admin\BasicController@updateheading')->name('admin.heading.update');

        // Admin Scripts Routes
        Route::get('/script', 'Admin\BasicController@script')->name('admin.script');
        Route::post('/script/update', 'Admin\BasicController@updatescript')->name('admin.script.update');


        // Admin Social Routes
        Route::get('/social', 'Admin\SocialController@index')->name('admin.social.index');
        Route::post('/social/store', 'Admin\SocialController@store')->name('admin.social.store');
        Route::get('/social/{id}/edit', 'Admin\SocialController@edit')->name('admin.social.edit');
        Route::post('/social/update', 'Admin\SocialController@update')->name('admin.social.update');
        Route::post('/social/delete', 'Admin\SocialController@delete')->name('admin.social.delete');


        // Admin Maintanance Mode Routes
        Route::get('/maintainance', 'Admin\BasicController@maintainance')->name('admin.maintainance');
        Route::post('/maintainance/update', 'Admin\BasicController@updatemaintainance')->name('admin.maintainance.update');


        // Admin Cookie Alert Routes
        Route::get('/cookie-alert', 'Admin\BasicController@cookiealert')->name('admin.cookie.alert');
        Route::post('/cookie-alert/{langid}/update', 'Admin\BasicController@updatecookie')->name('admin.cookie.update');


        // Admin Preloader Routes
        Route::get('/callwaiter', 'Admin\BasicController@callwaiter')->name('admin.callwaiter');
        Route::post('/callwaiter/post', 'Admin\BasicController@updateCallwaiter')->name('admin.callwaiter.update');
    });


    Route::group(['middleware' => 'checkpermission:Reservation Settings'], function() {
        // Admin Quote Form Builder Routes
        Route::get('/reservations/visibility', 'Admin\ResevationsController@visibility')->name('admin.reservations.visibility');
        Route::post('/reservations/visibility/update', 'Admin\ResevationsController@updateVisibility')->name('admin.reservations.visibility.update');

        // Admin Tables Section Routes
        Route::get('/table/section', 'Admin\BasicController@tablesection')->name('admin.tablesection.index');
        Route::post('/table/section/{langid}/update', 'Admin\BasicController@tablesectionUpdate')->name('admin.tablesection.update');
        Route::post('/table/section/remove/image', 'Admin\BasicController@removeImage')->name('admin.tablesection.rmv.img');


        // Admin Table Reservation Form Builder
        Route::get('/reservation/form', 'Admin\ReservationFormController@form')->name('admin.reservation.form');
        Route::post('/reservation/form/store', 'Admin\ReservationFormController@formstore')->name('admin.reservation.form.store');
        Route::post('/reservation/inputDelete', 'Admin\ReservationFormController@inputDelete')->name('admin.reservation.inputDelete');
        Route::get('/reservation/{id}/inputEdit', 'Admin\ReservationFormController@inputEdit')->name('admin.reservation.inputEdit');
        Route::get('/reservation/{id}/options', 'Admin\ReservationFormController@options')->name('admin.reservation.options');
        Route::post('/reservation/inputUpdate', 'Admin\ReservationFormController@inputUpdate')->name('admin.reservation.inputUpdate');
        Route::post('/reservation/orderUpdate', 'Admin\ReservationFormController@orderUpdate')->name('admin.reservation.orderUpdate');
    });


    Route::group(['middleware' => 'checkpermission:Table Reservation'], function () {

        // Admin Table Reservation
        Route::get('/table/resevations/all', 'Admin\ResevationsController@all')->name('admin.all.table.resevations');
        Route::get('/table/resevations/pending', 'Admin\ResevationsController@pending')->name('admin.pending.table.resevations');
        Route::get('/table/resevations/accepted', 'Admin\ResevationsController@accepted')->name('admin.accepted.table.resevations');
        Route::get('/table/resevations/rejected', 'Admin\ResevationsController@rejected')->name('admin.rejected.table.resevations');
        Route::post('/table/resevations/status', 'Admin\ResevationsController@status')->name('admin.status.table.resevations');
        Route::post('/table/resevations/delete', 'Admin\ResevationsController@delete')->name('admin.delete.table.resevations');
        Route::post('/table/resevations/bulk/delete', 'Admin\ResevationsController@bulkTableDelete')->name('admin.bulk.delete.table.resevations');

    });


    Route::group(['middleware' => 'checkpermission:Push Notification'], function () {
        // Admin Push Notification Routes
        Route::get('/pushnotification/settings', 'Admin\PushController@settings')->name('admin.pushnotification.settings');
        Route::get('/pushnotification/generate-keys', 'Admin\PushController@generateKeys')->name('admin.pushnotification.generateKeys');
        Route::post('/pushnotification/update/settings', 'Admin\PushController@updateSettings')->name('admin.pushnotification.updateSettings');
        Route::get('/pushnotification/send', 'Admin\PushController@send')->name('admin.pushnotification.send');
        Route::post('/push', 'Admin\PushController@push')->name('admin.pushnotification.push');
    });


    Route::group(['middleware' => 'checkpermission:Subscribers'], function () {
        // Admin Subscriber Routes
        Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin.subscriber.index');
        Route::get('/mailsubscriber', 'Admin\SubscriberController@mailsubscriber')->name('admin.mailsubscriber');
        Route::post('/subscribers/sendmail', 'Admin\SubscriberController@subscsendmail')->name('admin.subscribers.sendmail');
        Route::post('/subscriber/delete', 'Admin\SubscriberController@delete')->name('admin.subscriber.delete');
        Route::post('/subscriber/bulk-delete', 'Admin\SubscriberController@bulkDelete')->name('admin.subscriber.bulk.delete');
    });


    Route::group(['middleware' => 'checkpermission:Menu Builder'], function () {
        Route::get('/menu-builder', 'Admin\MenuBuilderController@index')->name('admin.menu_builder.index');
        Route::post('/menu-builder/update', 'Admin\MenuBuilderController@update')->name('admin.menu_builder.update');
    });


    Route::group(['middleware' => 'checkpermission:Website Pages'], function () {

        // Admin Hero Section (Sliders) Routes
        Route::get('/herosection/sliders', 'Admin\SliderController@index')->name('admin.slider.index');
        Route::post('/herosection/slider/store', 'Admin\SliderController@store')->name('admin.slider.store');
        Route::get('/herosection/slider/{id}/edit', 'Admin\SliderController@edit')->name('admin.slider.edit');
        Route::post('/herosection/slider/update', 'Admin\SliderController@update')->name('admin.slider.update');
        Route::post('/herosection/slider/delete', 'Admin\SliderController@delete')->name('admin.slider.delete');
        Route::post('/slider/{langid}/update', 'Admin\BasicController@updateslider')->name('admin.slider.image.update');
        Route::post('/slider/rmvimg', 'Admin\SliderController@removeImage')->name('admin.slider.image.remove');


        // Admin Hero Section Image & Text Routes
        Route::get('/herosection/imgtext', 'Admin\HerosectionController@imgtext')->name('admin.herosection.imgtext');
        Route::post('/herosection/remove/image', 'Admin\HerosectionController@removeImage')->name('admin.herosection.rmvimg');
        Route::post('/herosection/{langid}/update', 'Admin\HerosectionController@update')->name('admin.herosection.update');

        // Admin Hero Section (Video Link) Routes
        Route::get('/herosection/video', 'Admin\HerosectionController@video')->name('admin.herosection.video');
        Route::post('/hero/video/update', 'Admin\HerosectionController@videoupdate')->name('admin.herosection.video.update');


        // Admin Feature Routes
        Route::get('/features', 'Admin\FeatureController@index')->name('admin.feature.index');
        Route::post('/feature/store', 'Admin\FeatureController@store')->name('admin.feature.store');
        Route::get('/feature/{id}/edit', 'Admin\FeatureController@edit')->name('admin.feature.edit');
        Route::post('/feature/update', 'Admin\FeatureController@update')->name('admin.feature.update');
        Route::post('/feature/delete', 'Admin\FeatureController@delete')->name('admin.feature.delete');
        Route::post('/feature/remove/image', 'Admin\FeatureController@removeImage')->name('admin.feature.rmv.img');

        // Admin Intro Section Routes
        Route::get('/introsection', 'Admin\IntrosectionController@index')->name('admin.introsection.index');
        Route::post('/introsection/{langid}/update', 'Admin\IntrosectionController@update')->name('admin.introsection.update');
        Route::post('/introsection/remove/image', 'Admin\IntrosectionController@removeImage')->name('admin.introsection.img.rmv');



        // Admin Testimonial Routes
        Route::get('/testimonials', 'Admin\TestimonialController@index')->name('admin.testimonial.index');
        Route::get('/testimonial/create', 'Admin\TestimonialController@create')->name('admin.testimonial.create');
        Route::post('/testimonial/store', 'Admin\TestimonialController@store')->name('admin.testimonial.store');
        Route::get('/testimonial/{id}/edit', 'Admin\TestimonialController@edit')->name('admin.testimonial.edit');
        Route::post('/testimonial/update', 'Admin\TestimonialController@update')->name('admin.testimonial.update');
        Route::post('/testimonial/delete', 'Admin\TestimonialController@delete')->name('admin.testimonial.delete');
        Route::post('/testimonialtext/{langid}/update', 'Admin\TestimonialController@textupdate')->name('admin.testimonialtext.update');

        // Admin Blog Section Routes
        Route::get('/blogsection', 'Admin\BlogsectionController@index')->name('admin.blogsection.index');
        Route::post('/blogsection/{langid}/update', 'Admin\BlogsectionController@update')->name('admin.blogsection.update');


        // Admin instagram Section Routes
        Route::get('/instagram/section', 'Admin\BasicController@instagramsection')->name('admin.instagramsection.index');
        Route::post('/instagram/section/{langid}/update', 'Admin\BasicController@instagramsectionUpdate')->name('admin.instagramsection.update');
        // Admin Menu Section Routes
        Route::get('/menu/section', 'Admin\BasicController@menusection')->name('admin.menusection.index');
        Route::post('/menu/section/{langid}/update', 'Admin\BasicController@menusectionUpdate')->name('admin.menusection.update');
        Route::post('/menu/section/remove/image', 'Admin\BasicController@removeImage')->name('admin.menusection.rmv.img');


        // Admin Special Section Routes
        Route::get('/special/section', 'Admin\BasicController@specialsection')->name('admin.specialsection.index');
        Route::post('/special/section/{langid}/update', 'Admin\BasicController@specialsectionUpdate')->name('admin.specialsection.update');


        // Admin Menu Section Routes
        Route::get('/menu/section', 'Admin\BasicController@menusection')->name('admin.menusection.index');
        Route::post('/menu/section/{langid}/update', 'Admin\BasicController@menusectionUpdate')->name('admin.menusection.update');

        // Admin Member Routes
        Route::get('/members', 'Admin\MemberController@index')->name('admin.member.index');
        Route::post('/team/{langid}/upload', 'Admin\MemberController@teamUpload')->name('admin.team.upload');
        Route::post('/member/upload', 'Admin\MemberController@upload')->name('admin.member.upload');
        Route::get('/member/create', 'Admin\MemberController@create')->name('admin.member.create');
        Route::post('/member/store', 'Admin\MemberController@store')->name('admin.member.store');
        Route::get('/member/{id}/edit', 'Admin\MemberController@edit')->name('admin.member.edit');
        Route::post('/member/update', 'Admin\MemberController@update')->name('admin.member.update');
        Route::post('/member/{id}/uploadUpdate', 'Admin\MemberController@uploadUpdate')->name('admin.member.uploadUpdate');
        Route::post('/member/delete', 'Admin\MemberController@delete')->name('admin.member.delete');
        Route::post('/teamtext/{langid}/update', 'Admin\MemberController@textupdate')->name('admin.teamtext.update');
        Route::post('/member/feature', 'Admin\MemberController@feature')->name('admin.member.feature');


        // Admin Footer Logo Text Routes
        Route::get('/footers', 'Admin\FooterController@index')->name('admin.footer.index');
        Route::post('/footer/{langid}/update', 'Admin\FooterController@update')->name('admin.footer.update');
        Route::post('/footer/remove/image', 'Admin\FooterController@removeImage')->name('admin.footer.rmvimg');



        // Admin Ulink Routes
        Route::get('/ulinks', 'Admin\UlinkController@index')->name('admin.ulink.index');
        Route::get('/ulink/create', 'Admin\UlinkController@create')->name('admin.ulink.create');
        Route::post('/ulink/store', 'Admin\UlinkController@store')->name('admin.ulink.store');
        Route::get('/ulink/{id}/edit', 'Admin\UlinkController@edit')->name('admin.ulink.edit');
        Route::post('/ulink/update', 'Admin\UlinkController@update')->name('admin.ulink.update');
        Route::post('/ulink/delete', 'Admin\UlinkController@delete')->name('admin.ulink.delete');

        // Admin Bottom Routes
        Route::get('/bottom/links', 'Admin\BlinkController@index')->name('admin.blink.index');
        Route::get('/bottom/link/create', 'Admin\BlinkController@create')->name('admin.blink.create');
        Route::post('/bottom/link/store', 'Admin\BlinkController@store')->name('admin.blink.store');
        Route::get('/bottom/link/{id}/edit', 'Admin\BlinkController@edit')->name('admin.blink.edit');
        Route::post('/bottom/link/update', 'Admin\BlinkController@update')->name('admin.blink.update');
        Route::post('/bottom/link/delete', 'Admin\BlinkController@delete')->name('admin.blink.delete');


        // Admin Gallery Routes
        Route::get('/gallery', 'Admin\GalleryController@index')->name('admin.gallery.index');
        Route::post('/gallery/store', 'Admin\GalleryController@store')->name('admin.gallery.store');
        Route::get('/gallery/{id}/edit', 'Admin\GalleryController@edit')->name('admin.gallery.edit');
        Route::post('/gallery/update', 'Admin\GalleryController@update')->name('admin.gallery.update');
        Route::post('/gallery/delete', 'Admin\GalleryController@delete')->name('admin.gallery.delete');
        Route::post('/gallery/bulk-delete', 'Admin\GalleryController@bulkDelete')->name('admin.gallery.bulk.delete');

        // Admin FAQ Routes
        Route::get('/faqs', 'Admin\FaqController@index')->name('admin.faq.index');
        Route::get('/faq/create', 'Admin\FaqController@create')->name('admin.faq.create');
        Route::post('/faq/store', 'Admin\FaqController@store')->name('admin.faq.store');
        Route::post('/faq/update', 'Admin\FaqController@update')->name('admin.faq.update');
        Route::post('/faq/delete', 'Admin\FaqController@delete')->name('admin.faq.delete');
        Route::post('/faq/bulk-delete', 'Admin\FaqController@bulkDelete')->name('admin.faq.bulk.delete');


        // Admin Blog Category Routes
        Route::get('/bcategorys', 'Admin\BcategoryController@index')->name('admin.bcategory.index');
        Route::post('/bcategory/store', 'Admin\BcategoryController@store')->name('admin.bcategory.store');
        Route::post('/bcategory/update', 'Admin\BcategoryController@update')->name('admin.bcategory.update');
        Route::post('/bcategory/delete', 'Admin\BcategoryController@delete')->name('admin.bcategory.delete');
        Route::post('/bcategory/bulk-delete', 'Admin\BcategoryController@bulkDelete')->name('admin.bcategory.bulk.delete');



        // Admin Blog Routes
        Route::get('/blogs', 'Admin\BlogController@index')->name('admin.blog.index');
        Route::post('/blog/upload', 'Admin\BlogController@upload')->name('admin.blog.upload');
        Route::post('/blog/store', 'Admin\BlogController@store')->name('admin.blog.store');
        Route::get('/blog/{id}/edit', 'Admin\BlogController@edit')->name('admin.blog.edit');
        Route::post('/blog/update', 'Admin\BlogController@update')->name('admin.blog.update');
        Route::post('/blog/{id}/uploadUpdate', 'Admin\BlogController@uploadUpdate')->name('admin.blog.uploadUpdate');
        Route::post('/blog/delete', 'Admin\BlogController@delete')->name('admin.blog.delete');
        Route::post('/blog/bulk-delete', 'Admin\BlogController@bulkDelete')->name('admin.blog.bulk.delete');
        Route::get('/blog/{langid}/getcats', 'Admin\BlogController@getcats')->name('admin.blog.getcats');


        // Admin Job Category Routes
        Route::get('/jcategorys', 'Admin\JcategoryController@index')->name('admin.jcategory.index');
        Route::post('/jcategory/store', 'Admin\JcategoryController@store')->name('admin.jcategory.store');
        Route::get('/jcategory/{id}/edit', 'Admin\JcategoryController@edit')->name('admin.jcategory.edit');
        Route::post('/jcategory/update', 'Admin\JcategoryController@update')->name('admin.jcategory.update');
        Route::post('/jcategory/delete', 'Admin\JcategoryController@delete')->name('admin.jcategory.delete');
        Route::post('/jcategory/bulk-delete', 'Admin\JcategoryController@bulkDelete')->name('admin.jcategory.bulk.delete');

        // Admin Jobs Routes
        Route::get('/jobs', 'Admin\JobController@index')->name('admin.job.index');
        Route::get('/job/create', 'Admin\JobController@create')->name('admin.job.create');
        Route::post('/job/store', 'Admin\JobController@store')->name('admin.job.store');
        Route::get('/job/{id}/edit', 'Admin\JobController@edit')->name('admin.job.edit');
        Route::post('/job/update', 'Admin\JobController@update')->name('admin.job.update');
        Route::post('/job/delete', 'Admin\JobController@delete')->name('admin.job.delete');
        Route::post('/job/bulk-delete', 'Admin\JobController@bulkDelete')->name('admin.job.bulk.delete');
        Route::get('/job/{langid}/getcats', 'Admin\JobController@getcats')->name('admin.job.getcats');


        // Admin Contact Routes
        Route::get('/contact', 'Admin\ContactController@index')->name('admin.contact.index');
        Route::post('/contact/{langid}/post', 'Admin\ContactController@update')->name('admin.contact.update');


        // Menu Manager Routes
        Route::get('/pages', 'Admin\PageController@index')->name('admin.page.index');
        Route::get('/page/create', 'Admin\PageController@create')->name('admin.page.create');
        Route::post('/page/store', 'Admin\PageController@store')->name('admin.page.store');
        Route::get('/page/{menuID}/edit', 'Admin\PageController@edit')->name('admin.page.edit');
        Route::post('/page/update', 'Admin\PageController@update')->name('admin.page.update');
        Route::post('/page/delete', 'Admin\PageController@delete')->name('admin.page.delete');
        Route::post('/page/bulk-delete', 'Admin\PageController@bulkDelete')->name('admin.page.bulk.delete');


        // Admin Section Customization Routes
        Route::get('/sections', 'Admin\BasicController@sections')->name('admin.sections.index');
        Route::post('/sections/{langid}/update', 'Admin\BasicController@updatesections')->name('admin.sections.update');
    });


    Route::group(['middleware' => 'checkpermission:Product Management'], function () {
        Route::get('/category', 'Admin\ProductCategory@index')->name('admin.category.index');
        Route::post('/category/store', 'Admin\ProductCategory@store')->name('admin.category.store');
        Route::get('/category/{id}/edit', 'Admin\ProductCategory@edit')->name('admin.category.edit');
        Route::post('/category/update', 'Admin\ProductCategory@update')->name('admin.category.update');
        Route::post('/category/delete', 'Admin\ProductCategory@delete')->name('admin.category.delete');
        Route::post('/category/bulk-delete', 'Admin\ProductCategory@bulkDelete')->name('admin.pcategory.bulk.delete');
        Route::post('/category/remove/image', 'Admin\ProductCategory@removeImage')->name('admin.pcategory.rmv.img');
        // Feature Check Routes
        Route::post('/pcategory/feature', 'Admin\ProductCategory@FeatureCheck')->name('admin.pcategory.feature');


        Route::get('/product', 'Admin\ProductController@index')->name('admin.product.index');
        Route::get('/product/create', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::get('/product/{id}/variants', 'Admin\ProductController@variants')->name('admin.product.variants');
        Route::get('/product/{id}/addons', 'Admin\ProductController@addons')->name('admin.product.addons');
        Route::get('/product/{id}/edit', 'Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::post('/product/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
        // Feature Check Routes
        Route::post('/product/feature', 'Admin\ProductController@FeatureCheck')->name('admin.product.feature');
        // Special Check Routes
        Route::post('/product/special', 'Admin\ProductController@SpecialCheck')->name('admin.product.special');


        Route::post('/product/sliderstore', 'Admin\ProductController@sliderstore')->name('admin.product.sliderstore');
        Route::post('/product/sliderrmv', 'Admin\ProductController@sliderrmv')->name('admin.product.sliderrmv');
        Route::get('product/{id}/getcategory', 'Admin\ProductController@getCategory')->name('admin.product.getcategory');
        Route::post('/product/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
        Route::post('/product/bulk-delete', 'Admin\ProductController@bulkDelete')->name('admin.product.bulk.delete');
        Route::post('/product/sliderupdate', 'Admin\ProductController@sliderupdate')->name('admin.product.sliderupdate');
        Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::get('/product/{id}/images', 'Admin\ProductController@images')->name('admin.product.images');
    });


    Route::group(['middleware' => 'checkpermission:Order Management'], function () {
        // Serving Methods
        Route::get('/product/order/serving-methods', 'Admin\ProductOrderController@servingMethods')->name('admin.product.servingMethods');
        Route::get('/product/order/serving-methods', 'Admin\ProductOrderController@servingMethods')->name('admin.product.servingMethods');
        Route::post('/product/order/serving-method/status', 'Admin\ProductOrderController@servingMethodStatus')->name('admin.product.servingMethodStatus');
        Route::post('/product/order/serving-method/gateways', 'Admin\ProductOrderController@servingMethodGateways')->name('admin.product.servingMethodGateways');
        Route::post('/product/order/serving-method/qrpayment', 'Admin\ProductOrderController@qrPayment')->name('admin.product.qrPayment');
        Route::post('/product/order/serving-method/update', 'Admin\ProductOrderController@servingMethodUpdate')->name('admin.product.servingMethodUpdate');
        // Serving Methods End


        // Admin Coupon Routes
        Route::get('/coupon', 'Admin\CouponController@index')->name('admin.coupon.index');
        Route::post('/coupon/store', 'Admin\CouponController@store')->name('admin.coupon.store');
        Route::get('/coupon/{id}/edit', 'Admin\CouponController@edit')->name('admin.coupon.edit');
        Route::post('/coupon/update', 'Admin\CouponController@update')->name('admin.coupon.update');
        Route::post('/coupon/delete', 'Admin\CouponController@delete')->name('admin.coupon.delete');
        // Admin Coupon Routes End


        // Admin Order Time Routes
        Route::post('/orderclose', 'Admin\ProductOrderController@orderclose')->name('admin.orderclose');
        Route::get('/ordertime', 'Admin\ProductOrderController@ordertime')->name('admin.ordertime');
        Route::post('/ordertime/update', 'Admin\ProductOrderController@updateOrdertime')->name('admin.ordertime.update');
        // Admin Order Time Routes End


        // Admin Order Time Routes
        Route::get('/deliverytime', 'Admin\ProductOrderController@deliverytime')->name('admin.deliverytime');
        Route::post('/deliverytime/status', 'Admin\ProductOrderController@deliveryStatus')->name('admin.deliveryStatus');

        Route::get('/timeframes', 'Admin\ProductOrderController@timeframes')->name('admin.timeframes');
        Route::post('/timeframe/store', 'Admin\ProductOrderController@timeframeStore')->name('admin.timeframe.store');
        Route::post('/timeframe/update', 'Admin\ProductOrderController@timeframeUpdate')->name('admin.timeframe.update');
        Route::post('/timeframe/delete', 'Admin\ProductOrderController@timeframeDelete')->name('admin.timeframe.delete');
        // Admin Order Time Routes End


        // Product Order
        Route::get('/product/orders', 'Admin\ProductOrderController@index')->name('admin.product.orders');
        Route::get('/order/settings', 'Admin\ProductOrderController@settings')->name('admin.order.settings');
        Route::post('/order/update/settings', 'Admin\ProductOrderController@updateSettings')->name('admin.order.update.settings');
        Route::post('/reset/token', 'Admin\ProductOrderController@resetToken')->name('admin.reset.token');
        Route::post('/product/order/completed', 'Admin\ProductOrderController@completed')->name('admin.product.order.completed');
        Route::post('/product/order/payment', 'Admin\ProductOrderController@payment')->name('admin.product.order.payment');
        Route::post('/product/orders/status', 'Admin\ProductOrderController@status')->name('admin.product.orders.status');
        Route::get('/product/orders/detais/{id}', 'Admin\ProductOrderController@details')->name('admin.product.details');
        Route::post('/product/order/delete', 'Admin\ProductOrderController@orderDelete')->name('admin.product.order.delete');
        Route::post('/product/order/bulk-delete', 'Admin\ProductOrderController@bulkOrderDelete')->name('admin.product.order.bulk.delete');
        Route::post('/product/order/qrprint', 'Admin\ProductOrderController@qrPrint')->name('admin.product.order.qrprint');
        // Product Order end

        // Admin Postal Codes Routes
        Route::get('/postalcodes', 'Admin\PostalCodeController@index')->name('admin.postalcode.index');
        Route::get('/postalcode/create', 'Admin\PostalCodeController@create')->name('admin.postalcode.create');
        Route::post('/postalcode/store', 'Admin\PostalCodeController@store')->name('admin.postalcode.store');
        Route::post('/postalcode/update', 'Admin\PostalCodeController@update')->name('admin.postalcode.update');
        Route::post('/postalcode/delete', 'Admin\PostalCodeController@delete')->name('admin.postalcode.delete');
        Route::post('/postalcode/bulk-delete', 'Admin\PostalCodeController@bulkDelete')->name('admin.postalcode.bulk.delete');


        // Admin Shipping Charges Routes
        Route::get('/shipping', 'Admin\ShopSettingController@index')->name('admin.shipping.index');
        Route::post('/shipping/store', 'Admin\ShopSettingController@store')->name('admin.shipping.store');
        Route::get('/shipping/{id}/edit', 'Admin\ShopSettingController@edit')->name('admin.shipping.edit');
        Route::post('/shipping/update', 'Admin\ShopSettingController@update')->name('admin.shipping.update');
        Route::post('/shipping/delete', 'Admin\ShopSettingController@delete')->name('admin.shipping.delete');
    });



    Route::group(['middleware' => 'checkpermission:Customers'], function () {
        // Register User start
        Route::get('register/users', 'Admin\RegisterUserController@index')->name('admin.register.user');
        Route::post('register/users/ban', 'Admin\RegisterUserController@userban')->name('register.user.ban');
        Route::post('register/users/email', 'Admin\RegisterUserController@emailStatus')->name('register.user.email');
        Route::get('register/user/details/{id}', 'Admin\RegisterUserController@view')->name('register.user.view');
        Route::post('register/user/delete', 'Admin\RegisterUserController@delete')->name('register.user.delete');
        Route::post('register/user/bulk-delete', 'Admin\RegisterUserController@bulkDelete')->name('register.user.bulk.delete');
        Route::get('register/user/{id}/changePassword', 'Admin\RegisterUserController@changePass')->name('register.user.changePass');
        Route::post('register/user/updatePassword', 'Admin\RegisterUserController@updatePassword')->name('register.user.updatePassword');
        //Register User end

        // Customers start
        Route::get('customers', 'Admin\CustomerController@index')->name('admin.customer.index');
        Route::post('customer/store', 'Admin\CustomerController@store')->name('admin.customer.store');
        Route::post('customer/update', 'Admin\CustomerController@update')->name('admin.customer.update');
        Route::post('customer/delete', 'Admin\CustomerController@delete')->name('admin.customer.delete');
        Route::post('/customer/bulk-delete', 'Admin\CustomerController@bulkDelete')->name('admin.customer.bulk.delete');
        //Customers end

    });



    Route::group(['middleware' => 'checkpermission:Announcement Popup'], function () {
        Route::get('popups', 'Admin\PopupController@index')->name('admin.popup.index');
        Route::get('popup/types', 'Admin\PopupController@types')->name('admin.popup.types');
        Route::get('popup/{id}/edit', 'Admin\PopupController@edit')->name('admin.popup.edit');
        Route::get('popup/create', 'Admin\PopupController@create')->name('admin.popup.create');
        Route::post('popup/store', 'Admin\PopupController@store')->name('admin.popup.store');
        Route::post('popup/delete', 'Admin\PopupController@delete')->name('admin.popup.delete');
        Route::post('popup/bulk-delete', 'Admin\PopupController@bulkDelete')->name('admin.popup.bulk.delete');
        Route::post('popup/status', 'Admin\PopupController@status')->name('admin.popup.status');
        Route::post('popup/update', 'Admin\PopupController@update')->name('admin.popup.update');
    });


    Route::group(['middleware' => 'checkpermission:Sitemap'], function () {

        Route::get('/sitemap', 'Admin\SitemapController@index')->name('admin.sitemap.index');
        Route::post('/sitemap/store', 'Admin\SitemapController@store')->name('admin.sitemap.store');
        Route::get('/sitemap/{id}/update', 'Admin\SitemapController@update')->name('admin.sitemap.update');
        Route::post('/sitemap/{id}/delete', 'Admin\SitemapController@delete')->name('admin.sitemap.delete');
        Route::post('/sitemap/download', 'Admin\SitemapController@download')->name('admin.sitemap.download');
    });



    Route::group(['middleware' => 'checkpermission:Payment Gateways'], function () {
        // Admin Online Gateways Routes
        Route::get('/gateways', 'Admin\GatewayController@index')->name('admin.gateway.index');
        Route::post('/stripe/update', 'Admin\GatewayController@stripeUpdate')->name('admin.stripe.update');
        Route::post('/paypal/update', 'Admin\GatewayController@paypalUpdate')->name('admin.paypal.update');
        Route::post('/paystack/update', 'Admin\GatewayController@paystackUpdate')->name('admin.paystack.update');
        Route::post('/paytm/update', 'Admin\GatewayController@paytmUpdate')->name('admin.paytm.update');
        Route::post('/flutterwave/update', 'Admin\GatewayController@flutterwaveUpdate')->name('admin.flutterwave.update');
        Route::post('/instamojo/update', 'Admin\GatewayController@instamojoUpdate')->name('admin.instamojo.update');
        Route::post('/mollie/update', 'Admin\GatewayController@mollieUpdate')->name('admin.mollie.update');
        Route::post('/razorpay/update', 'Admin\GatewayController@razorpayUpdate')->name('admin.razorpay.update');
        Route::post('/mercadopago/update', 'Admin\GatewayController@mercadopagoUpdate')->name('admin.mercadopago.update');
        Route::post('/payumoney/update', 'Admin\GatewayController@payumoneyUpdate')->name('admin.payumoney.update');

        // Admin Offline Gateway Routes
        Route::get('/offline/gateways', 'Admin\GatewayController@offline')->name('admin.gateway.offline');
        Route::post('/offline/gateway/store', 'Admin\GatewayController@store')->name('admin.gateway.offline.store');
        Route::post('/offline/gateway/update', 'Admin\GatewayController@update')->name('admin.gateway.offline.update');
        Route::post('/offline/status', 'Admin\GatewayController@status')->name('admin.offline.status');
        Route::post('/offline/gateway/delete', 'Admin\GatewayController@delete')->name('admin.offline.gateway.delete');
    });



    Route::group(['middleware' => 'checkpermission:Admins Management'], function () {
        // Admin Users Routes
        Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
        Route::post('/user/upload', 'Admin\UserController@upload')->name('admin.user.upload');
        Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
        Route::get('/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
        Route::post('/user/update', 'Admin\UserController@update')->name('admin.user.update');
        Route::post('/user/{id}/uploadUpdate', 'Admin\UserController@uploadUpdate')->name('admin.user.uploadUpdate');
        Route::post('/user/delete', 'Admin\UserController@delete')->name('admin.user.delete');

        // Admin Roles Routes
        Route::get('/roles', 'Admin\RoleController@index')->name('admin.role.index');
        Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
        Route::post('/role/update', 'Admin\RoleController@update')->name('admin.role.update');
        Route::post('/role/delete', 'Admin\RoleController@delete')->name('admin.role.delete');
        Route::get('role/{id}/permissions/manage', 'Admin\RoleController@managePermissions')->name('admin.role.permissions.manage');
        Route::post('role/permissions/update', 'Admin\RoleController@updatePermissions')->name('admin.role.permissions.update');
    });


    Route::group(['middleware' => 'checkpermission:Language Management'], function () {
        // Admin Language Routes
        Route::get('/languages', 'Admin\LanguageController@index')->name('admin.language.index');
        Route::get('/language/{id}/edit', 'Admin\LanguageController@edit')->name('admin.language.edit');
        Route::get('/language/{id}/edit/keyword', 'Admin\LanguageController@editKeyword')->name('admin.language.editKeyword');
        Route::post('/language/store', 'Admin\LanguageController@store')->name('admin.language.store');
        Route::post('/language/upload', 'Admin\LanguageController@upload')->name('admin.language.upload');
        Route::post('/language/{id}/uploadUpdate', 'Admin\LanguageController@uploadUpdate')->name('admin.language.uploadUpdate');
        Route::post('/language/{id}/default', 'Admin\LanguageController@default')->name('admin.language.default');
        Route::post('/language/{id}/delete', 'Admin\LanguageController@delete')->name('admin.language.delete');
        Route::post('/language/update', 'Admin\LanguageController@update')->name('admin.language.update');
        Route::post('/language/{id}/update/keyword', 'Admin\LanguageController@updateKeyword')->name('admin.language.updateKeyword');
    });


    Route::group(['middleware' => 'checkpermission:Backup'], function () {
        // Admin Backup Routes
        Route::get('/backup', 'Admin\BackupController@index')->name('admin.backup.index');
        Route::post('/backup/store', 'Admin\BackupController@store')->name('admin.backup.store');
        Route::post('/backup/{id}/delete', 'Admin\BackupController@delete')->name('admin.backup.delete');
        Route::post('/backup/download', 'Admin\BackupController@download')->name('admin.backup.download');
    });


    // Admin Cache Clear Routes
    Route::get('/cache-clear', 'Admin\CacheController@clear')->name('admin.cache.clear');


    Route::group(['middleware' => 'checkpermission:Tables & QR Builder'], function () {
        // Admin Table Routes
        Route::get('/tables', 'Admin\TableController@index')->name('admin.table.index');
        Route::post('/table/store', 'Admin\TableController@store')->name('admin.table.store');
        Route::post('/table/update', 'Admin\TableController@update')->name('admin.table.update');
        Route::post('/table/delete', 'Admin\TableController@delete')->name('admin.table.delete');
        Route::get('/table/{tableid}/qrbuilder', 'Admin\TableController@qrBuilder')->name('admin.table.qrbuilder');
        Route::post('/table/qrgenerate', 'Admin\TableController@qrGenerate')->name('admin.table.qrgenerate');
    });


    Route::group(['middleware' => 'checkpermission:QR Code Builder'], function () {
        // Admin QR Code
        Route::get('/qr-code', 'Admin\QrController@qrCode')->name('admin.qrcode');
        Route::post('/qr-code/generate', 'Admin\QrController@generate')->name('admin.qrcode.generate');
    });



});
