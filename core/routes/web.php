<?php
Route::fallback(function () {
    return view('errors.404');
});

// demo file upload route
Route::post('/demo/submit', function() {
    return 'demo';
});

Route::middleware(['setlang'])->group(function () {
    Route::get('/', 'Front\FrontendController@index')->name('front.index');
    Route::get('/reservation/form', 'Front\FrontendController@reservationForm')->name('front.reservation');
    Route::post('/table/book', 'Front\FrontendController@tableBook')->name('front.table.book');

    Route::get('/blogs', 'Front\FrontendController@blogs')->name('front.blogs');
    Route::get('/blog-details/{slug}/{id}', 'Front\FrontendController@blogdetails')->name('front.blogdetails');

    Route::get('/contact', 'Front\FrontendController@contact')->name('front.contact');
    Route::post('/sendmail', 'Front\FrontendController@sendmail')->name('front.sendmail');
    Route::post('/subscribe', 'Front\FrontendController@subscribe')->name('front.subscribe');
    Route::get('/gallery', 'Front\FrontendController@gallery')->name('front.gallery');
    Route::get('/checkout/payment/{slug1}/{slug2}', 'Front\FrontendController@loadpayment')->name('front.load.payment');


    Route::get('/package-order/{id}', 'Front\FrontendController@packageorder')->name('front.packageorder.index');
    Route::post('/package-order', 'Front\FrontendController@submitorder')->name('front.packageorder.submit');
    Route::get('/order-confirmation/{packageid}/{packageOrderId}', 'Front\FrontendController@orderConfirmation')->name('front.packageorder.confirmation');
    Route::get('/payment/{packageid}/cancle', 'Front\FrontendController@paycancle')->name('front.payment.cancle');
    Route::post('/paypal/submit', 'Payment\PaypalController@store')->name('front.paypal.submit');
    Route::get('/paypal/{packageid}/notify', 'Payment\PaypalController@notify')->name('front.paypal.notify');
  


    Route::get('/team', 'Front\FrontendController@team')->name('front.team');
    Route::get('/career', 'Front\FrontendController@career')->name('front.career');
    Route::get('/career-details/{slug}/{id}', 'Front\FrontendController@careerdetails')->name('front.careerdetails');
    Route::get('/calendar', 'Front\FrontendController@calendar')->name('front.calendar');
    Route::get('/gallery', 'Front\FrontendController@gallery')->name('front.gallery');
    Route::get('/faq', 'Front\FrontendController@faq')->name('front.faq');
    // Dynamic Page Routes
    Route::get('/{slug}/{id}/page', 'Front\FrontendController@dynamicPage')->name('front.dynamicPage');
    Route::get('/changelanguage/{lang}', 'Front\FrontendController@changeLanguage')->name('changeLanguage');

    // Product
    Route::get('/product', 'Front\ProductController@product')->name('front.product');
    Route::get('/product/{slug}', 'Front\ProductController@productDetails')->name('front.product.details');
    Route::get('/cart', 'Front\ProductController@cart')->name('front.cart');
    Route::get('/add-to-cart/{id}', 'Front\ProductController@addToCart')->name('add.cart');
    Route::post('/cart/update', 'Front\ProductController@updatecart')->name('cart.update');
    Route::get('/cart/item/remove/{id}', 'Front\ProductController@cartitemremove')->name('cart.item.remove');
    Route::get('/checkout', 'Front\ProductController@checkout')->name('front.product.checkout');
    Route::get('/checkout/{slug}', 'Front\ProductController@Prdouctcheckout')->name('front.product.checkout');

    // review
    Route::post('product/review/submit', 'Front\ReviewController@reviewsubmit')->name('product.review.submit');

    // review end

    // CHECKOUT SECTION
    Route::get('/product/payment/return', 'Payment\product\PaymentController@payreturn')->name('product.payment.return');
    Route::get('/product/payment/cancle', 'Payment\product\PaymentController@paycancle')->name('product.payment.cancle');
    Route::get('/product/payment/notify', 'Payment\product\PaymentController@notify')->name('product.payment.notify');
    Route::post('/product/paypal/submit', 'Payment\product\PaymentController@store')->name('product.paypal.submit');
    Route::post('/product/stripe/submit', 'Payment\product\StripeController@store')->name('product.stripe.submit');
    // CHECKOUT SECTION ENDS

    // Product

});
Route::get('/changelanguage/{lang}', 'Front\FrontendController@changeLanguage')->name('changeLanguage');
Route::get('/teams', 'Front\FrontendController@teams')->name('front.teams');

// review
Route::post('product/review/submit', 'Front\ReviewController@reviewsubmit')->name('product.review.submit');



// Product
Route::get('/items', 'Front\ProductController@items')->name('front.items');
Route::get('/items/{slug}/{id}', 'Front\ProductController@itemsDetails')->name('front.items.details');
Route::get('/menus', 'Front\ProductController@product')->name('front.product');
Route::get('/menu/{slug}/{id}', 'Front\ProductController@productDetails')->name('front.product.details');
Route::get('/cart', 'Front\ProductController@cart')->name('front.cart');
Route::get('/add-to-cart/{id}', 'Front\ProductController@addToCart')->name('add.cart');
Route::post('/cart/update', 'Front\ProductController@updatecart')->name('cart.update');
Route::get('/cart/item/remove/{id}', 'Front\ProductController@cartitemremove')->name('cart.item.remove');
Route::get('/checkout', 'Front\ProductController@checkout')->name('front.checkout');
Route::get('/checkout/{slug}', 'Front\ProductController@Prdouctcheckout')->name('front.product.checkout');

// CHECKOUT SECTION
Route::get('/product/payment/return', 'Payment\product\PaymentController@payreturn')->name('product.payment.return');
Route::get('/product/payment/cancle', 'Payment\product\PaymentController@paycancle')->name('product.payment.cancle');
Route::get('/product/payment/notify', 'Payment\product\PaymentController@notify')->name('product.payment.notify');
Route::post('/product/paypal/submit', 'Payment\product\PaymentController@store')->name('product.paypal.submit');
Route::post('/product/stripe/submit', 'Payment\product\StripeController@store')->name('product.stripe.submit');
// CHECKOUT SECTION ENDS




/*=======================================================
******************** User Routes **********************
=======================================================*/


Route::group(['middleware' => 'web'], function () {
    Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
    Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
    Route::get('/register', 'User\RegisterController@registerPage')->name('user-register');
    Route::post('/register/submit', 'User\RegisterController@register')->name('user-register-submit');
    Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
    Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
    Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
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


    Route::group(['middleware' => 'checkpermission:Basic Settings'], function () {
        // Admin Favicon Routes
        Route::get('/favicon', 'Admin\BasicController@favicon')->name('admin.favicon');
        Route::post('/favicon/post', 'Admin\BasicController@updatefav')->name('admin.favicon.update');


        // Admin Logo Routes
        Route::get('/logo', 'Admin\BasicController@logo')->name('admin.logo');
        Route::post('/logo/post', 'Admin\BasicController@updatelogo')->name('admin.logo.update');

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


        // Admin Support Routes
        Route::get('/support', 'Admin\BasicController@support')->name('admin.support');
        Route::post('/support/{langid}/post', 'Admin\BasicController@updatesupport')->name('admin.support.update');

        // Admin Breadcrumb Routes
        Route::get('/breadcrumb', 'Admin\BasicController@breadcrumb')->name('admin.breadcrumb');
        Route::post('/breadcrumb/update', 'Admin\BasicController@updatebreadcrumb')->name('admin.breadcrumb.update');

        // Admin Slider Routes
        Route::post('/slider/{langid}/update', 'Admin\BasicController@updateslider')->name('admin.slider.image.update');
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

        // Admin Offer Banner Routes
        Route::get('/announcement', 'Admin\BasicController@announcement')->name('admin.announcement');
        Route::post('/announcement/{langid}/update', 'Admin\BasicController@updateannouncement')->name('admin.announcement.update');
        Route::post('/announcement/{langid}/upload', 'Admin\BasicController@uploadannouncement')->name('admin.announcement.upload');


        // Admin Section Customization Routes
        Route::get('/sections', 'Admin\BasicController@sections')->name('admin.sections.index');
        Route::get('/page/sections', 'Admin\BasicController@pagesections')->name('admin.page.sections.index');
        Route::post('/sections/{langid}/update', 'Admin\BasicController@updatesections')->name('admin.sections.update');
        Route::post('/page/sections/{langid}/update', 'Admin\BasicController@updatepagesections')->name('admin.page.sections.update');


        // Admin Cookie Alert Routes
        Route::get('/cookie-alert', 'Admin\BasicController@cookiealert')->name('admin.cookie.alert');
        Route::post('/cookie-alert/{langid}/update', 'Admin\BasicController@updatecookie')->name('admin.cookie.update');
    });


    Route::group(['middleware' => 'checkpermission:Table Reservation'], function () {

        // Admin Quote Form Builder Routes
        Route::get('/reservations/visibility', 'Admin\ResevationsController@visibility')->name('admin.reservations.visibility');
        Route::post('/reservations/visibility/update', 'Admin\ResevationsController@updateVisibility')->name('admin.reservations.visibility.update');

        // Admin Table
        Route::get('/table/resevations/all', 'Admin\ResevationsController@all')->name('admin.all.table.resevations');
        Route::get('/table/resevations/pending', 'Admin\ResevationsController@pending')->name('admin.pending.table.resevations');
        Route::get('/table/resevations/accepted', 'Admin\ResevationsController@accepted')->name('admin.accepted.table.resevations');
        Route::get('/table/resevations/rejected', 'Admin\ResevationsController@rejected')->name('admin.rejected.table.resevations');
        Route::post('/table/resevations/status', 'Admin\ResevationsController@status')->name('admin.status.table.resevations');
        Route::post('/table/resevations/delete', 'Admin\ResevationsController@delete')->name('admin.delete.table.resevations');
        Route::post('/table/resevations/bulk/delete', 'Admin\ResevationsController@bulkTableDelete')->name('admin.bulk.delete.table.resevations');
    });




    Route::group(['middleware' => 'checkpermission:Subscribers'], function () {
        // Admin Subscriber Routes
        Route::get('/subscribers', 'Admin\SubscriberController@index')->name('admin.subscriber.index');
        Route::get('/mailsubscriber', 'Admin\SubscriberController@mailsubscriber')->name('admin.mailsubscriber');
        Route::post('/subscribers/sendmail', 'Admin\SubscriberController@subscsendmail')->name('admin.subscribers.sendmail');
    });


    Route::group(['middleware' => 'checkpermission:Home Page'], function () {


        // Admin Hero Section (Slider Version) Routes
        Route::get('/herosection/sliders', 'Admin\SliderController@index')->name('admin.slider.index');
        Route::post('/herosection/slider/store', 'Admin\SliderController@store')->name('admin.slider.store');
        Route::get('/herosection/slider/{id}/edit', 'Admin\SliderController@edit')->name('admin.slider.edit');
        Route::post('/herosection/slider/update', 'Admin\SliderController@update')->name('admin.slider.update');
        Route::post('/herosection/slider/delete', 'Admin\SliderController@delete')->name('admin.slider.delete');


        // Admin Feature Routes
        Route::get('/features', 'Admin\FeatureController@index')->name('admin.feature.index');
        Route::post('/feature/store', 'Admin\FeatureController@store')->name('admin.feature.store');
        Route::get('/feature/{id}/edit', 'Admin\FeatureController@edit')->name('admin.feature.edit');
        Route::post('/feature/update', 'Admin\FeatureController@update')->name('admin.feature.update');
        Route::post('/feature/delete', 'Admin\FeatureController@delete')->name('admin.feature.delete');

        // Admin Intro Section Routes
        Route::get('/introsection', 'Admin\IntrosectionController@index')->name('admin.introsection.index');
        Route::post('/introsection/{langid}/upload', 'Admin\IntrosectionController@upload')->name('admin.introsection.upload');
        Route::post('/introsection/{langid}/update', 'Admin\IntrosectionController@update')->name('admin.introsection.update');



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

        // Admin Menu Section Routes
        Route::get('/table/section', 'Admin\BasicController@tablesection')->name('admin.tablesection.index');
        Route::post('/table/section/{langid}/update', 'Admin\BasicController@tablesectionUpdate')->name('admin.tablesection.update');


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
    });




    Route::group(['middleware' => 'checkpermission:Pages'], function () {
        // Menu Manager Routes
        Route::get('/pages', 'Admin\PageController@index')->name('admin.page.index');
        Route::get('/page/create', 'Admin\PageController@create')->name('admin.page.create');
        Route::post('/page/store', 'Admin\PageController@store')->name('admin.page.store');
        Route::get('/page/{menuID}/edit', 'Admin\PageController@edit')->name('admin.page.edit');
        Route::post('/page/update', 'Admin\PageController@update')->name('admin.page.update');
        Route::post('/page/delete', 'Admin\PageController@delete')->name('admin.page.delete');
        Route::post('/page/bulk-delete', 'Admin\PageController@bulkDelete')->name('admin.page.bulk.delete');
        Route::get('/page/paren/link', 'Admin\PageController@parentLink')->name('admin.page.parent.link');
        Route::post('/page/paren/link/update', 'Admin\PageController@parentLinkUpdate')->name('admin.page.parent.link.update');
    });



    Route::group(['middleware' => 'checkpermission:Footer'], function () {
        // Admin Footer Logo Text Routes
        Route::get('/footers', 'Admin\FooterController@index')->name('admin.footer.index');
        Route::post('/footer/{langid}/update', 'Admin\FooterController@update')->name('admin.footer.update');



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
    });


    Route::group(['middleware' => 'checkpermission:Product Management'], function () {
        Route::get('/category', 'Admin\ProductCategory@index')->name('admin.category.index');
        Route::post('/category/store', 'Admin\ProductCategory@store')->name('admin.category.store');
        Route::get('/category/{id}/edit', 'Admin\ProductCategory@edit')->name('admin.category.edit');
        Route::post('/category/update', 'Admin\ProductCategory@update')->name('admin.category.update');
        Route::post('/category/delete', 'Admin\ProductCategory@delete')->name('admin.category.delete');
        Route::post('/category/bulk-delete', 'Admin\ProductCategory@bulkDelete')->name('admin.pcategory.bulk.delete');
        // Feature Check Routes
        Route::get('/pcategory/feature/check/{id}', 'Admin\ProductCategory@FeatureCheck');

        Route::get('/shipping', 'Admin\ShopSettingController@index')->name('admin.shipping.index');
        Route::post('/shipping/store', 'Admin\ShopSettingController@store')->name('admin.shipping.store');
        Route::get('/shipping/{id}/edit', 'Admin\ShopSettingController@edit')->name('admin.shipping.edit');
        Route::post('/shipping/update', 'Admin\ShopSettingController@update')->name('admin.shipping.update');
        Route::post('/shipping/delete', 'Admin\ShopSettingController@delete')->name('admin.shipping.delete');


        Route::get('/product', 'Admin\ProductController@index')->name('admin.product.index');
        Route::get('/product/create', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store');
        Route::get('/product/{id}/edit', 'Admin\ProductController@edit')->name('admin.product.edit');
        Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::post('/product/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
        // Feature Check Routes
        Route::get('/product/feature/check/{id}', 'Admin\ProductController@FeatureCheck');
        // Special Check Routes
        Route::get('/product/special/check/{id}', 'Admin\ProductController@SpecialCheck');


        Route::post('/product/sliderstore', 'Admin\ProductController@sliderstore')->name('admin.product.sliderstore');
        Route::post('/product/sliderrmv', 'Admin\ProductController@sliderrmv')->name('admin.product.sliderrmv');
        Route::get('product/{id}/getcategory', 'Admin\ProductController@getCategory')->name('admin.product.getcategory');
        Route::post('/product/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
        Route::post('/product/bulk-delete', 'Admin\ProductController@bulkDelete')->name('admin.product.bulk.delete');
        Route::post('/product/sliderupdate', 'Admin\ProductController@sliderupdate')->name('admin.product.sliderupdate');
        Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
        Route::get('/product/{id}/images', 'Admin\ProductController@images')->name('admin.product.images');



        // Product Order
        Route::get('/product/all/orders', 'Admin\ProductOrderController@all')->name('admin.all.product.orders');
        Route::get('/product/pending/orders', 'Admin\ProductOrderController@pending')->name('admin.pending.product.orders');
        Route::get('/product/processing/orders', 'Admin\ProductOrderController@processing')->name('admin.processing.product.orders');
        Route::get('/product/completed/orders', 'Admin\ProductOrderController@completed')->name('admin.completed.product.orders');
        Route::get('/product/rejected/orders', 'Admin\ProductOrderController@rejected')->name('admin.rejected.product.orders');
        Route::post('/product/orders/status', 'Admin\ProductOrderController@status')->name('admin.product.orders.status');
        Route::get('/product/orders/detais/{id}', 'Admin\ProductOrderController@details')->name('admin.product.details');
        Route::post('/product/order/delete', 'Admin\ProductOrderController@orderDelete')->name('admin.product.order.delete');
        Route::post('/product/order/bulk-delete', 'Admin\ProductOrderController@bulkOrderDelete')->name('admin.product.order.bulk.delete');
        // Product Order end
    });



    Route::group(['middleware' => 'checkpermission:Users'], function () {
        // Register User start
        Route::get('register/users', 'Admin\RegisterUserController@index')->name('admin.register.user');
        Route::post('register/users/ban', 'Admin\RegisterUserController@userban')->name('register.user.ban');
        Route::get('register/user/details/{id}', 'Admin\RegisterUserController@view')->name('register.user.view');
        //Register User end

    });

    Route::group(['middleware' => 'checkpermission:Gallery Management'], function () {
        // Admin Gallery Routes
        Route::get('/gallery', 'Admin\GalleryController@index')->name('admin.gallery.index');
        Route::post('/gallery/store', 'Admin\GalleryController@store')->name('admin.gallery.store');
        Route::get('/gallery/{id}/edit', 'Admin\GalleryController@edit')->name('admin.gallery.edit');
        Route::post('/gallery/update', 'Admin\GalleryController@update')->name('admin.gallery.update');
        Route::post('/gallery/delete', 'Admin\GalleryController@delete')->name('admin.gallery.delete');
        Route::post('/gallery/bulk-delete', 'Admin\GalleryController@bulkDelete')->name('admin.gallery.bulk.delete');
    });


    Route::group(['middleware' => 'checkpermission:Blogs'], function () {
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
    });


    Route::group(['middleware' => 'checkpermission:Contact Page'], function () {
        // Admin Contact Routes
        Route::get('/contact', 'Admin\ContactController@index')->name('admin.contact.index');
        Route::post('/contact/{langid}/post', 'Admin\ContactController@update')->name('admin.contact.update');
    });



    Route::group(['middleware' => 'checkpermission:Payment Gateways'], function () {
        // Admin Roles Routes
        Route::get('/gateways', 'Admin\GatewayController@index')->name('admin.gateway.index');
        Route::post('/stripe/update', 'Admin\GatewayController@stripeUpdate')->name('admin.stripe.update');
        Route::post('/paypal/update', 'Admin\GatewayController@paypalUpdate')->name('admin.paypal.update');
    });



    Route::group(['middleware' => 'checkpermission:Role Management'], function () {
        // Admin Roles Routes
        Route::get('/roles', 'Admin\RoleController@index')->name('admin.role.index');
        Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
        Route::post('/role/update', 'Admin\RoleController@update')->name('admin.role.update');
        Route::post('/role/delete', 'Admin\RoleController@delete')->name('admin.role.delete');
        Route::get('role/{id}/permissions/manage', 'Admin\RoleController@managePermissions')->name('admin.role.permissions.manage');
        Route::post('role/permissions/update', 'Admin\RoleController@updatePermissions')->name('admin.role.permissions.update');
    });



    Route::group(['middleware' => 'checkpermission:Users Management'], function () {
        // Admin Users Routes
        Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
        Route::post('/user/upload', 'Admin\UserController@upload')->name('admin.user.upload');
        Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
        Route::get('/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
        Route::post('/user/update', 'Admin\UserController@update')->name('admin.user.update');
        Route::post('/user/{id}/uploadUpdate', 'Admin\UserController@uploadUpdate')->name('admin.user.uploadUpdate');
        Route::post('/user/delete', 'Admin\UserController@delete')->name('admin.user.delete');
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
});
