<div class="cart-total" id="orderTotal">
    <div class="shop-title-box">
        <h3>{{ __('Order Total') }}</h3>
    </div>

    <div id="cartTotal">
        <ul class="cart-total-table">
            <li>
                <span class="col-title">{{ __('Cart Total') }}</span>
                <span>
                    {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}<span
                    data="{{ cartTotal() }}" class="subtotal">{{ cartTotal() }}</span>{{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                </span>
            </li>
            <li>
                <span class="col-title">{{ __('Discount') }}</span>
                <span>
                    <i class="fas fa-minus"></i>
                    {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}<span data="{{ $discount }}">{{ $discount }}</span>
                    {{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                </span>

            </li>
            <li>
                <span class="col-title">{{ __('Cart Subtotal') }}</span>
                <span>
                {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}<span
                    data="{{ cartTotal() - $discount }}" class="subtotal"
                    id="subtotal">{{ cartTotal() - $discount }}</span>{{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                </span>
            </li>
            <li>
                <span class="col-title">{{ __('Tax') }}</span>
                <span>
                    <i class="fas fa-plus"></i>
                    {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}<span
                    data-tax="{{ tax() }}" id="tax">{{ tax() }}</span>{{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                </span>
            </li>
            <li>
                <span class="col-title">{{ __('Shipping Charge') }}</span>
                <span>
                <i class="fas fa-plus"></i>
                {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}<span
                    data="0"
                    class="shipping">0</span>{{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                </span>
            </li>
            <li>
                <span class="col-title">{{ __('Total') }}</span>
                <span>
                    {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}<span data="" class="grandTotal"></span>{{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                </span>
            </li>
        </ul>
    </div>
    <div class="coupon">
        <h4 class="mb-3">{{__('Coupon')}}</h4>
        <div class="form-group d-flex">
            <input type="text" class="form-control" name="coupon" value="">
            <button class="btn btn-primary base-btn" type="button" onclick="applyCoupon();">{{__('Apply')}}</button>
        </div>
    </div>
    <div class="payment-options">
        <h4 class="mb-4">{{ __('Pay Via') }}</h4>
        @includeIf('front.product.payment-gateways')
        @error('gateway')
        <p class="text-danger mb-0">{{ convertUtf8($message) }}</p>
        @enderror
        <div class="placeorder-button {{$rtl == 1 ? 'text-right' : 'text-left'}} mt-4">
            <button class="main-btn" type="submit" form="payment" id="placeOrderBtn"><span
                class="btn-title">{{ __('Place Order') }}</span></button>
        </div>
    </div>
</div>
