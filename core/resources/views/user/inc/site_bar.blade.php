<div class="col-lg-3">
    <div class="user-sidebar">
        <ul class="links">
            <li><a class="@if(request()->path() == 'user/dashboard') active @endif" href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a></li>
            <li><a class="
                @if(request()->path() == 'user/orders') active
                @elseif(request()->is('user/order/*')) active
                 @endif"
                 href="{{route('user-orders')}}">{{__('My Orders')}} </a></li>

         
            <li><a class=" @if(request()->path() == 'user/profile') active @endif" href="{{route('user-profile')}}">{{__('Edit Profile')}} </a></li>
            <li><a class=" @if(request()->path() == 'user/shipping/details') active @endif" href="{{route('shpping-details')}}">{{__('Shipping Details')}} </a></li>
            <li><a class=" @if(request()->path() == 'user/billing/details') active @endif" href="{{route('billing-details')}}">{{__('Billing Details')}} </a></li>
            <li><a class=" @if(request()->path() == 'user/reset') active @endif" href="{{route('user-reset')}}">{{__('Change Password')}} </a></li>
            <li><a href="{{route('user-logout')}}">{{__('Logout')}} </a></li>
        </ul>
    </div>
</div>
