@php
$default = \App\Models\Language::where('is_default', 1)->first();
$admin = Auth::guard('admin')->user();
if (!empty($admin->role)) {
    $permissions = $admin->role->permissions;
    $permissions = json_decode($permissions, true);
}
@endphp

<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    @if (!empty(Auth::guard('admin')->user()->image))
                        <img src="{{ asset('assets/admin/img/propics/' . Auth::guard('admin')->user()->image) }}"
                            alt="..." class="avatar-img rounded">
                    @else
                        <img src="{{ asset('assets/admin/img/propics/blank_user.jpg') }}" alt="..."
                            class="avatar-img rounded">
                    @endif
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::guard('admin')->user()->first_name }}
                            @if (empty(Auth::guard('admin')->user()->role))
                                <span class="user-level">Owner</span>
                            @else
                                <span class="user-level">{{ Auth::guard('admin')->user()->role->name }}</span>
                            @endif
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('admin.editProfile') }}">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.changePass') }}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.logout') }}">
                                    <span class="link-collapse">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <div class="row mb-2">
                    <div class="col-12">
                        <form action="">
                            <div class="form-group py-0">
                                <input name="term" type="text" class="form-control sidebar-search" value=""
                                    placeholder="Search Menu Here...">
                            </div>
                        </form>
                    </div>
                </div>

                @if (empty($admin->role) || (!empty($permissions) && in_array('Dashboard', $permissions)))
                    {{-- Dashboard --}}
                    <li class="nav-item @if (request()->path() == 'admin/dashboard') active @endif">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="la flaticon-paint-palette"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endif


                {{-- POS --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('POS', $permissions)))
                    {{-- POS --}}
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/pos') active
          @elseif(request()->path() == 'admin/pos/payment-methods') active @endif">
                        <a data-toggle="collapse" href="#pos">
                            <i class="fas fa-cart-plus"></i>
                            <p>POS</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/pos') show
            @elseif(request()->path() == 'admin/pos/payment-methods') show @endif"
                            id="pos">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/pos') active @endif">
                                    <a href="{{ route('admin.pos') }}">
                                        <span class="sub-item">POS</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/pos/payment-methods') active @endif">
                                    <a href="{{ route('admin.pos.pmethod.index') }}">
                                        <span class="sub-item">Payment Methods</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Order Management', $permissions)))
                    {{-- Order Management --}}
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/product/orders') active
          @elseif(request()->path() == 'admin/order/settings') active
          @elseif(request()->is('admin/product/orders/detais/*')) active
          @elseif(request()->is('admin/product/order/serving-methods')) active
          @elseif(request()->routeIs('admin.postalcode.index')) active
          @elseif(request()->path() == 'admin/shipping') active
          @elseif(request()->routeIs('admin.shipping.edit')) active
          @elseif(request()->path() == 'admin/coupon') active
          @elseif(request()->routeIs('admin.coupon.edit')) active
          @elseif(request()->path() == 'admin/ordertime') active
          @elseif(request()->path() == 'admin/deliverytime') active
          @elseif(request()->path() == 'admin/timeframes') active @endif">
                        <a data-toggle="collapse" href="#orderManagement">
                            <i class="fas fa-box"></i>
                            <p>Order Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/product/orders') show
            @elseif(request()->path() == 'admin/order/settings') show
            @elseif(request()->is('admin/product/orders/detais/*')) show
            @elseif(request()->is('admin/product/order/serving-methods')) show
            @elseif(request()->routeIs('admin.postalcode.index')) show
            @elseif(request()->path() == 'admin/shipping') show
            @elseif(request()->routeIs('admin.shipping.edit')) show
            @elseif(request()->path() == 'admin/coupon') show
            @elseif(request()->routeIs('admin.coupon.edit')) show
            @elseif(request()->path() == 'admin/ordertime') show
            @elseif(request()->path() == 'admin/deliverytime') show
            @elseif(request()->path() == 'admin/timeframes') show @endif"
                            id="orderManagement">
                            <ul class="nav nav-collapse">
                                <li class="
                @if (request()->path() == 'admin/order/settings') active @endif">
                                    <a href="{{ route('admin.order.settings') }}">
                                        <span class="sub-item">Settings</span>
                                    </a>
                                </li>

                                <li
                                    class="
                @if (request()->path() == 'admin/product/orders') active
                @elseif(request()->is('admin/product/orders/detais/*')) active @endif">
                                    <a href="{{ route('admin.product.orders') }}">
                                        <span class="sub-item">Orders</span>
                                    </a>
                                </li>

                                <li class="
                @if (request()->is('admin/product/order/serving-methods')) active @endif">
                                    <a href="{{ route('admin.product.servingMethods') }}">
                                        <span class="sub-item">Serving Methods</span>
                                    </a>
                                </li>

                                <li class="
                @if (request()->routeIs('admin.postalcode.index')) active @endif">
                                    <a href="{{ route('admin.postalcode.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Postal Codes</span>
                                    </a>
                                </li>

                                <li
                                    class="
                @if (request()->path() == 'admin/shipping') active
                @elseif(request()->routeIs('admin.shipping.edit')) active @endif">
                                    <a href="{{ route('admin.shipping.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Shipping Charges</span>
                                    </a>
                                </li>

                                <li
                                    class="
                @if (request()->path() == 'admin/coupon') active
                @elseif(request()->routeIs('admin.coupon.edit')) active @endif">
                                    <a href="{{ route('admin.coupon.index') }}">
                                        <span class="sub-item">Coupons</span>
                                    </a>
                                </li>

                                <li class="
                @if (request()->path() == 'admin/ordertime') active @endif">
                                    <a href="{{ route('admin.ordertime') }}">
                                        <span class="sub-item">Order Time Management</span>
                                    </a>
                                </li>

                                <li
                                    class="
                @if (request()->path() == 'admin/deliverytime') active
                @elseif(request()->path() == 'admin/timeframes') active @endif">
                                    <a href="{{ route('admin.deliverytime') }}">
                                        <span class="sub-item">Delivery Time Frames Management</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                {{-- Customers --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('Customers', $permissions)))
                    <li
                        class="nav-item
        @if (request()->path() == 'admin/register/users') active
        @elseif(request()->routeIs('register.user.view')) active
        @elseif(request()->path() == 'admin/customers') active
        @elseif(request()->routeIs('register.user.changePass')) active @endif">
                        <a data-toggle="collapse" href="#customers">
                            <i class="la flaticon-users"></i>
                            <p>Customers</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
          @if (request()->path() == 'admin/register/users') show
          @elseif(request()->routeIs('register.user.view')) show
          @elseif(request()->path() == 'admin/customers') show
          @elseif(request()->routeIs('register.user.changePass')) show @endif"
                            id="customers">
                            <ul class="nav nav-collapse">
                                <li
                                    class="@if (request()->path() == 'admin/register/users') active
                @elseif(request()->routeIs('register.user.view')) active
                @elseif(request()->routeIs('register.user.changePass')) active @endif">
                                    <a href="{{ route('admin.register.user') }}">
                                        <span class="sub-item">Registered Customers</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/customers') active @endif">
                                    <a href="{{ route('admin.customer.index') }}">
                                        <span class="sub-item">Customers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Product Management', $permissions)))
                    {{-- Product --}}
                    <li
                        class="nav-item
                        @if (request()->path() == 'admin/category') active
                        @elseif (request()->path() == 'admin/subcategory') active
                        @elseif(request()->path() == 'admin/product') active
                        @elseif(request()->path() == 'admin/product/create') active
                        @elseif(request()->is('admin/product/*/edit')) active
                        @elseif(request()->is('admin/category/*/edit')) active >
                        @elseif(request()->is('admin/subcategory/*/edit')) active @endif">
                        <a data-toggle="collapse" href="#category">
                            <i class="fas fa-hamburger"></i>
                            <p>Items Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
                        @if (request()->path() == 'admin/category') show
                        @elseif (request()->path() == 'admin/subcategory') show
                        @elseif(request()->path() == 'admin/product/create') show
                        @elseif(request()->is('admin/category/*/edit')) show
                        @elseif(request()->is('admin/subcategory/*/edit')) show
                        @elseif(request()->path() == 'admin/product') show
                        @elseif(request()->is('admin/product/*/edit')) show @endif"
                            id="category">
                            <ul class="nav nav-collapse">
                                <li
                                    class="
                @if (request()->path() == 'admin/category') active
                @elseif(request()->is('admin/category/*/edit')) active @endif">
                                    <a href="{{ route('admin.category.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Category & Tax</span>
                                    </a>
                                </li>
                                <li
                                    class=" @if (request()->path() == 'admin/subcategory') active  @elseif(request()->is('admin/subcategory/*/edit')) active @endif">
                                    <a href="{{ route('admin.subcategory.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Subcategories</span>
                                    </a>
                                </li>

                                <li
                                    class="
                @if (request()->path() == 'admin/product') active
                @elseif(request()->is('admin/product/*/edit')) active
                @elseif(request()->path() == 'admin/product/create') active @endif">
                                    <a href="{{ route('admin.product.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Items</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                {{-- QR Code Builder --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('QR Code Builder', $permissions)))
                    <li class="nav-item
         @if (request()->path() == 'admin/qr-code') active @endif">
                        <a href="{{ route('admin.qrcode') }}">
                            <i class="fas fa-qrcode"></i>
                            <p>QR Code Builder</p>
                        </a>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Payment Gateways', $permissions)))
                    {{-- Payment Gateways --}}
                    <li
                        class="nav-item
        @if (request()->path() == 'admin/gateways') active
        @elseif(request()->path() == 'admin/offline/gateways') active @endif">
                        <a data-toggle="collapse" href="#gateways">
                            <i class="la flaticon-paypal"></i>
                            <p>Payment Gateways</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
          @if (request()->path() == 'admin/gateways') show
          @elseif(request()->path() == 'admin/offline/gateways') show @endif"
                            id="gateways">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/gateways') active @endif">
                                    <a href="{{ route('admin.gateway.index') }}">
                                        <span class="sub-item">Online Gateways</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/offline/gateways') active @endif">
                                    <a href="{{ route('admin.gateway.offline') . '?language=' . $default->code }}">
                                        <span class="sub-item">Offline Gateways</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif



                @if (empty($admin->role) || (!empty($permissions) && in_array('Reservation Settings', $permissions)))
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/reservations/visibility') active
          @elseif(request()->path() == 'admin/reservation/form') active
          @elseif(request()->is('admin/reservation/*/inputEdit')) active
          @elseif(request()->path() == 'admin/table/section') active @endif">
                        <a data-toggle="collapse" href="#reservSet">
                            <i class="fas fa-utensils"></i>
                            <p>Reservation Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/reservations/visibility') show
            @elseif(request()->path() == 'admin/reservation/form') show
            @elseif(request()->is('admin/reservation/*/inputEdit')) show
            @elseif(request()->path() == 'admin/table/section') show @endif"
                            id="reservSet">
                            <ul class="nav nav-collapse">
                                <li class="
                @if (request()->path() == 'admin/reservations/visibility') active @endif">
                                    <a href="{{ route('admin.reservations.visibility') }}">
                                        <span class="sub-item">Visibility</span>
                                    </a>
                                </li>
                                <li class="
                @if (request()->path() == 'admin/table/section') active @endif">
                                    <a
                                        href="{{ route('admin.tablesection.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Text & Image</span>
                                    </a>
                                </li>
                                <li
                                    class="
                @if (request()->path() == 'admin/reservation/form') active
                @elseif(request()->is('admin/reservation/*/inputEdit')) active @endif">
                                    <a href="{{ route('admin.reservation.form') . '?language=' . $default->code }}">
                                        <span class="sub-item">Form Builder</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Table Reservation', $permissions)))
                    <li class="nav-item  @if (request()->is('admin/table/resevations/*')) active @endif">
                        <a data-toggle="collapse" href="#table">
                            <i class="fas fa-utensils"></i>
                            <p>Table Reservations</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse  @if (request()->is('admin/table/resevations/*')) show @endif" id="table">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/table/resevations/create') active @endif">
                                    <a href="{{ route('admin.table.resevations.new') . '?language=' . $default->code  }}">
                                        <span class="sub-item">New Reservation</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/table/resevations/all') active @endif">
                                    <a href="{{ route('admin.all.table.resevations') }}">
                                        <span class="sub-item">All Resevations</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/table/resevations/pending') active @endif">
                                    <a href="{{ route('admin.pending.table.resevations') }}">
                                        <span class="sub-item">Pending Resevations</span>
                                    </a>
                                </li>

                                <li class="@if (request()->path() == 'admin/table/resevations/accepted') active @endif">
                                    <a href="{{ route('admin.accepted.table.resevations') }}">
                                        <span class="sub-item">Accepted Resevations</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/table/resevations/rejected') active @endif">
                                    <a href="{{ route('admin.rejected.table.resevations') }}">
                                        <span class="sub-item">Rejected Resevations</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                {{-- Tables --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('Tables & QR Builder', $permissions)))
                    <li class="nav-item
            @if (request()->path() == 'admin/tables') active @endif">
                        <a href="{{ route('admin.table.index') }}">
                            <i class="fas fa-table"></i>
                            <p>Tables & QR Builder</p>
                        </a>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Menu Builder', $permissions)))
                    {{-- Menu Builder --}}
                    <li class="nav-item
            @if (request()->path() == 'admin/menu-builder') active @endif">
                        <a href="{{ route('admin.menu_builder.index') . '?language=' . $default->code }}">
                            <i class="fas fa-bars"></i>
                            <p>Drag & Drop Menu Builder</p>
                        </a>
                    </li>
                @endif


                {{-- Website Pages --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('Website Pages', $permissions)))
                    @includeIf('admin.partials.website-pages')
                @endif


                {{-- Announcement Popup --}}
                @if (empty($admin->role) || (!empty($permissions) && in_array('Announcement Popup', $permissions)))
                    <li
                        class="nav-item
        @if (request()->path() == 'admin/popup/create') active
        @elseif(request()->path() == 'admin/popup/types') active
        @elseif(request()->is('admin/popup/*/edit')) active
        @elseif(request()->path() == 'admin/popups') active @endif">
                        <a data-toggle="collapse" href="#announcementPopup">
                            <i class="fas fa-bullhorn"></i>
                            <p>Announcement Popup</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/popup/create') show
            @elseif(request()->path() == 'admin/popup/types') show
            @elseif(request()->path() == 'admin/popups') show
            @elseif(request()->is('admin/popup/*/edit')) show @endif"
                            id="announcementPopup">
                            <ul class="nav nav-collapse">
                                <li
                                    class="@if (request()->path() == 'admin/popup/types') active
                        @elseif(request()->path() == 'admin/popup/create') active @endif">
                                    <a href="{{ route('admin.popup.types') }}">
                                        <span class="sub-item">Add Popup</span>
                                    </a>
                                </li>
                                <li
                                    class="@if (request()->path() == 'admin/popups') active
                        @elseif(request()->is('admin/popup/*/edit')) active @endif">
                                    <a href="{{ route('admin.popup.index') . '?language=' . $default->code }}">
                                        <span class="sub-item">Popups</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Push Notification', $permissions)))
                    {{-- Push Notification --}}
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/pushnotification/settings') active
          @elseif(request()->path() == 'admin/pushnotification/send') active @endif">
                        <a data-toggle="collapse" href="#pushNotification">
                            <i class="far fa-bell"></i>
                            <p>Push Notification</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/pushnotification/settings') show
            @elseif(request()->path() == 'admin/pushnotification/send') show @endif"
                            id="pushNotification">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/pushnotification/settings') active @endif">
                                    <a href="{{ route('admin.pushnotification.settings') }}">
                                        <span class="sub-item">Settings</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/pushnotification/send') active @endif">
                                    <a href="{{ route('admin.pushnotification.send') }}">
                                        <span class="sub-item">Send Notification</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions)))
                    {{-- Subscribers --}}
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/subscribers') active
          @elseif(request()->path() == 'admin/mailsubscriber') active @endif">
                        <a data-toggle="collapse" href="#subscribers">
                            <i class="la flaticon-envelope"></i>
                            <p>Subscribers</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/subscribers') show
            @elseif(request()->path() == 'admin/mailsubscriber') show @endif"
                            id="subscribers">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/subscribers') active @endif">
                                    <a href="{{ route('admin.subscriber.index') }}">
                                        <span class="sub-item">Subscribers</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/mailsubscriber') active @endif">
                                    <a href="{{ route('admin.mailsubscriber') }}">
                                        <span class="sub-item">Mail to Subscribers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif



                @if (empty($admin->role) || (!empty($permissions) && in_array('Basic Settings', $permissions)))
                    {{-- Basic Settings --}}
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/favicon') active
          @elseif(request()->path() == 'admin/logo') active
          @elseif(request()->path() == 'admin/preloader') active
          @elseif(request()->path() == 'admin/basicinfo') active
          @elseif(request()->path() == 'admin/support') active
          @elseif(request()->path() == 'admin/social') active
          @elseif(request()->is('admin/social/*')) active
          @elseif(request()->path() == 'admin/breadcrumb') active
          @elseif(request()->path() == 'admin/heading') active
          @elseif(request()->path() == 'admin/script') active
          @elseif(request()->path() == 'admin/seo') active
          @elseif(request()->path() == 'admin/pwa') active
          @elseif(request()->path() == 'admin/maintainance') active
          @elseif(request()->path() == 'admin/cookie-alert') active
          @elseif(request()->path() == 'admin/callwaiter') active
          @elseif(request()->path() == 'admin/mail-from-admin') active
          @elseif(request()->path() == 'admin/mail-to-admin') active
          @elseif(request()->path() == 'admin/email-templates') active
          @elseif(request()->routeIs('admin.product.tags')) active
          @elseif(request()->routeIs('admin.email.editTemplate')) active @endif">
                        <a data-toggle="collapse" href="#basic">
                            <i class="la flaticon-settings"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/favicon') show
            @elseif(request()->path() == 'admin/logo') show
            @elseif(request()->path() == 'admin/preloader') show
            @elseif(request()->path() == 'admin/basicinfo') show
            @elseif(request()->path() == 'admin/support') show
            @elseif(request()->path() == 'admin/social') show
            @elseif(request()->is('admin/social/*')) show
            @elseif(request()->path() == 'admin/breadcrumb') show
            @elseif(request()->path() == 'admin/heading') show
            @elseif(request()->path() == 'admin/script') show
            @elseif(request()->path() == 'admin/seo') show
            @elseif(request()->path() == 'admin/pwa') show
            @elseif(request()->path() == 'admin/maintainance') show
            @elseif(request()->path() == 'admin/cookie-alert') show
            @elseif(request()->path() == 'admin/callwaiter') show
            @elseif(request()->path() == 'admin/mail-from-admin') show
            @elseif(request()->path() == 'admin/mail-to-admin') show
            @elseif(request()->path() == 'admin/email-templates') show
            @elseif(request()->routeIs('admin.product.tags')) show
            @elseif(request()->routeIs('admin.email.editTemplate')) show @endif"
                            id="basic">
                            <ul class="nav nav-collapse">
                                <li class="@if (request()->path() == 'admin/favicon') active @endif">
                                    <a href="{{ route('admin.favicon') }}">
                                        <span class="sub-item">Favicon</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/logo') active @endif">
                                    <a href="{{ route('admin.logo') }}">
                                        <span class="sub-item">Logo</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/preloader') active @endif">
                                    <a href="{{ route('admin.preloader') }}">
                                        <span class="sub-item">Preloader</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/basicinfo') active @endif">
                                    <a href="{{ route('admin.basicinfo') . '?language=' . $default->code }}">
                                        <span class="sub-item">General Settings</span>
                                    </a>
                                </li>

                                <li class="submenu">
                                    <a data-toggle="collapse" href="#emailset"
                                        aria-expanded="{{ request()->path() == 'admin/mail-from-admin' ||request()->path() == 'admin/mail-to-admin' ||request()->path() == 'admin/email-templates' ||request()->routeIs('admin.email.editTemplate')? 'true': 'false' }}">
                                        <span class="sub-item">Email Settings</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse {{ request()->path() == 'admin/mail-from-admin' ||request()->path() == 'admin/mail-to-admin' ||request()->path() == 'admin/email-templates' ||request()->routeIs('admin.email.editTemplate')? 'show': '' }}"
                                        id="emailset">
                                        <ul class="nav nav-collapse subnav">
                                            <li class="@if (request()->path() == 'admin/mail-from-admin') active @endif">
                                                <a href="{{ route('admin.mailFromAdmin') }}">
                                                    <span class="sub-item">Mail from Admin</span>
                                                </a>
                                            </li>
                                            <li class="@if (request()->path() == 'admin/mail-to-admin') active @endif">
                                                <a href="{{ route('admin.mailToAdmin') }}">
                                                    <span class="sub-item">Mail to Admin</span>
                                                </a>
                                            </li>
                                            <li
                                                class="@if (request()->path() == 'admin/email-templates') active
                        @elseif(request()->routeIs('admin.email.editTemplate')) active @endif">
                                                <a href="{{ route('admin.email.templates') }}">
                                                    <span class="sub-item">Email Templates</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="@if (request()->path() == 'admin/callwaiter') active @endif">
                                    <a href="{{ route('admin.callwaiter') }}">
                                        <span class="sub-item">Call Waiter</span>
                                    </a>
                                </li>

                                <li class="@if (request()->path() == 'admin/support') active @endif">
                                    <a href="{{ route('admin.support') . '?language=' . $default->code }}">
                                        <span class="sub-item">Support Informations</span>
                                    </a>
                                </li>
                                <li
                                    class="@if (request()->path() == 'admin/social') active
                @elseif(request()->is('admin/social/*')) active @endif">
                                    <a href="{{ route('admin.social.index') }}">
                                        <span class="sub-item">Social Links</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/breadcrumb') active @endif">
                                    <a href="{{ route('admin.breadcrumb') }}">
                                        <span class="sub-item">Breadcrumb</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/heading') active @endif">
                                    <a href="{{ route('admin.heading') . '?language=' . $default->code }}">
                                        <span class="sub-item">Page Headings</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/pwa') active @endif">
                                    <a href="{{ route('admin.pwa') }}">
                                        <span class="sub-item">PWA Settings</span>
                                    </a>
                                </li>

                                <li class="@if (request()->path() == 'admin/script') active @endif">
                                    <a href="{{ route('admin.script') }}">
                                        <span class="sub-item">Plugins</span>
                                    </a>
                                </li>

                                <li class="@if (request()->path() == 'admin/maintainance') active @endif">
                                    <a href="{{ route('admin.maintainance') }}">
                                        <span class="sub-item">Maintainance Mode</span>
                                    </a>
                                </li>
                                <li class="@if (request()->path() == 'admin/cookie-alert') active @endif">
                                    <a href="{{ route('admin.cookie.alert') . '?language=' . $default->code }}">
                                        <span class="sub-item">Cookie Alert</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Language Management', $permissions)))
                    {{-- Language Management Page --}}
                    <li
                        class="nav-item
         @if (request()->path() == 'admin/languages') active
         @elseif(request()->is('admin/language/*/edit')) active
         @elseif(request()->is('admin/language/*/edit/keyword')) active @endif">
                        <a href="{{ route('admin.language.index') }}">
                            <i class="la flaticon-chat-8"></i>
                            <p>Language Management</p>
                        </a>
                    </li>
                @endif



                @if (empty($admin->role) || (!empty($permissions) && in_array('Admins Management', $permissions)))
                    {{-- Admins Management --}}
                    <li
                        class="nav-item
          @if (request()->path() == 'admin/roles') active
          @elseif(request()->is('admin/role/*/permissions/manage')) active
          @elseif(request()->path() == 'admin/users') active
          @elseif(request()->is('admin/user/*/edit')) active @endif">
                        <a data-toggle="collapse" href="#adminsManagement">
                            <i class="fas fa-users-cog"></i>
                            <p>Admins Management</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse
            @if (request()->path() == 'admin/roles') show
            @elseif(request()->is('admin/role/*/permissions/manage')) show
            @elseif(request()->path() == 'admin/users') show
            @elseif(request()->is('admin/user/*/edit')) show @endif"
                            id="adminsManagement">
                            <ul class="nav nav-collapse">
                                <li
                                    class="
                @if (request()->path() == 'admin/roles') active
                @elseif(request()->is('admin/role/*/permissions/manage')) active @endif">
                                    <a href="{{ route('admin.role.index') }}">
                                        <span class="sub-item">Role Management</span>
                                    </a>
                                </li>
                                <li
                                    class="
                @if (request()->path() == 'admin/users') active
                @elseif(request()->is('admin/user/*/edit')) active @endif">
                                    <a href="{{ route('admin.user.index') }}">
                                        <span class="sub-item">Admins</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif



                @if (empty($admin->role) || (!empty($permissions) && in_array('Sitemap', $permissions)))
                    {{-- Sitemap --}}
                    <li class="nav-item
            @if (request()->path() == 'admin/sitemap') active @endif">
                        <a href="{{ route('admin.sitemap.index') . '?language=' . $default->code }}">
                            <i class="fa fa-sitemap"></i>
                            <p>Sitemap</p>
                        </a>
                    </li>
                @endif



                @if (empty($admin->role) || (!empty($permissions) && in_array('Backup', $permissions)))
                    {{-- Backup Database --}}
                    <li class="nav-item
         @if (request()->path() == 'admin/backup') active @endif">
                        <a href="{{ route('admin.backup.index') }}">
                            <i class="la flaticon-down-arrow-3"></i>
                            <p>Database Backup</p>
                        </a>
                    </li>
                @endif


                {{-- Cache Clear --}}
                <li class="nav-item">
                    <a href="{{ route('admin.cache.clear') }}">
                        <i class="la flaticon-close"></i>
                        <p>Clear Cache</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
