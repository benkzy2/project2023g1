<div class="cart-sidebar">
    <div id="refreshDiv">
    <div class="cart-sidebar-loader-container show">
        <div class="cart-sidebar-loader"></div>
    </div>
    <div class="cart-header">
       <h3>{{__('Cart')}}</h3>
       <span class="close">
        <i class="fas fa-times"></i>
       </span>
    </div>
    <div class="cart-body">

            @if($cart != null)
            @foreach ($cart as $key => $item)
            @php
            $id = $item["id"];
            $product = App\Models\Product::findOrFail($id);
            @endphp
            <div class="cart-item">
               <div class="thumb">
                  <img src="{{asset('assets/front/img/product/featured/'.$item['photo'])}}" alt="Item Image" />
               </div>
               <div class="details">
                  <h4 class="title mb-0">
                     <a>{{convertUtf8($item['name'])}}</a>
                  </h4>
                  @if (!empty($item["variations"]))
                     <p class="mb-0"><strong>{{__("Variation")}}:</strong> {{$item["variations"]["name"]}}</p>
                 @endif
                 @if (!empty($item["addons"]))
                     <p class="mb-0">
                         <strong>{{__("Add On's")}}:</strong>
                         @php
                             $addons = $item["addons"];
                         @endphp
                         @foreach ($addons as $addon)
                             {{$addon["name"]}}
                             @if (!$loop->last)
                             ,
                             @endif
                         @endforeach
                     </p>
                 @endif
                  <div class="details-footer">
                     <span class="qty-price">
                         {{$item['qty']}}
                         X
                         {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}<span>{{$item['product_price']}}</span>{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                         =
                         {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}<span>{{$item['total']}}</span>{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                     </span>
                     <div class="qty">
                        <span class="qty-sub" data-key="{{$key}}"><i class="fas fa-minus"></i></span>
                        <input type="text" value="{{$item['qty']}}" readonly />
                        <span class="qty-add" data-key="{{$key}}"><i class="fas fa-plus"></i></span>
                     </div>
                  </div>
               </div>
               <span class="close" data-key="{{$key}}">
                <i class="fas fa-times"></i>
               </span>
            </div>
            @endforeach
            @else
            <div class="py-4 text-center bg-light d-block m-2">
                {{__('Cart is empty!')}}
            </div>
            @endif

    </div>
    <div class="cart-total">
       <strong>{{__('Total')}}</strong>
       <strong class="total">
        {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}<span>{{$cartTotal}}</span>{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
       </strong>
    </div>
    <div class="cart-footer">
       <a href="{{route('front.qrmenu')}}" class="cart-button cart">{{__('Menu')}}</a>
       <a href="{{route('front.qrmenu.checkout')}}" class="cart-button checkout">{{__('Checkout')}}</a>
    </div>
    </div>
 </div>
 <div class="cart-sidebar-overlay"></div>
