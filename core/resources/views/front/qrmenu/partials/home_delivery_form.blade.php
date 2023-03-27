
    <div class="row">
       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
          <div class="form shipping-info">
             <div class="shop-title-box">
                <h3>{{__('Shipping Address')}}</h3>
             </div>
             <div class="row">
                <div class="col-md-12">
                   <div class="field-label">{{__('Country')}} *</div>
                   <div class="field-input">
                        @php
                            $scountry = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $scountry = Auth::user()->shpping_country;
                                }
                            } else {
                                $scountry = old('shpping_country');
                            }
                        @endphp
                      <input type="text" name="shpping_country" value="{{$scountry}}">
                      @error('shpping_country')
                      <p class="text-danger mb-0">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="field-label">{{__('First Name')}} *</div>
                   <div class="field-input">
                        @php
                            $sfname = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $sfname = Auth::user()->shpping_fname;
                                }
                            } else {
                                $sfname = old('shpping_fname');
                            }
                        @endphp
                      <input type="text" name="shpping_fname" value="{{$sfname}}">
                      @error('shpping_fname')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="field-label">{{__('Last Name')}} *</div>
                   <div class="field-input">
                        @php
                            $slname = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $slname = Auth::user()->shpping_lname;
                                }
                            } else {
                                $slname = old('shpping_lname');
                            }
                        @endphp
                      <input type="text" name="shpping_lname" value="{{$slname}}">
                      @error('shpping_lname')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Address')}} *</div>
                   <div class="field-input">
                        @php
                            $saddress = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $saddress = Auth::user()->shpping_address;
                                }
                            } else {
                                $saddress = old('shpping_address');
                            }
                        @endphp
                      <input type="text" name="shpping_address" value="{{$saddress}}">
                      @error('shpping_address')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Town / City')}} *</div>
                   <div class="field-input">
                        @php
                            $scity = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $scity = Auth::user()->shpping_city;
                                }
                            } else {
                                $scity = old('shpping_city');
                            }
                        @endphp
                      <input type="text" name="shpping_city" value="{{$scity}}">
                      @error('shpping_city')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Contact Email')}} *</div>
                   <div class="field-input">
                        @php
                            $smail = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $smail = Auth::user()->shpping_email;
                                }
                            } else {
                                $smail = old('shpping_email');
                            }
                        @endphp
                      <input type="text" name="shpping_email" value="{{$smail}}">
                      @error('shpping_email')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Phone')}} *</div>
                   <div class="field-input">
                        @php
                            $snumber = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $snumber = Auth::user()->shpping_number;
                                }
                            } else {
                                $snumber = old('shpping_number');
                            }
                        @endphp
                      <input type="text" name="shpping_number" value="{{$snumber}}">
                      @error('shpping_number')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>

                @if ($bs->postal_code == 0 && count($scharges) > 0)
                    <div class="col-md-12 mb-4">
                        <div id="shippingCharges">
                            <div class="field-label mb-2">{{__('Shipping Charges')}} *</div>
                            @foreach ($scharges as $scharge)
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="radio" data="{{$scharge->charge}}" name="shipping_charge" id="scharge{{$scharge->id}}" value="{{$scharge->id}}" {{$loop->first ? 'checked' : ''}}>
                                    <label class="form-check-label" for="scharge{{$scharge->id}}">{{$scharge->title}}</label>
                                    +
                                    <strong>
                                        {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{$scharge->charge}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                    </strong>
                                </div>
                                <p class="mb-0 text-secondary pl-3 mb-1"><small>{{$scharge->text}}</small></p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                  <div class="form-check form-check-inline mb-3">
                      <input name="same_as_shipping" class="form-check-input ml-0 mr-2" type="checkbox" id="sameAsSHipping" value="1"
                      @guest
                          @if(empty(old()))
                            checked
                          @elseif(old('same_as_shipping') == 1)
                            checked
                          @endif
                      @endguest

                      @auth
                        @if(old('same_as_shipping') == 1)
                            checked
                        @endif
                      @endauth
                      >
                      <label class="form-check-label" for="sameAsSHipping">{{__('Billing Address will be Same as Shipping Address')}}</label>
                  </div>
                </div>


             </div>
          </div>
       </div>
       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" id="billingAddress" style="display: {{empty(old()) || old('same_as_shipping') == 1 ? 'none' : 'block'}};">
          <div class="form billing-info">
             <div class="shop-title-box">
                <h3>{{__('Billing Address')}}</h3>
             </div>
             <div class="row">
                <div class="col-md-12">
                   <div class="field-label">{{__('Country')}} *</div>
                   <div class="field-input">
                        @php
                            $bcountry = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $bcountry = Auth::user()->billing_country;
                                }
                            } else {
                                $bcountry = old('billing_country');
                            }
                        @endphp
                      <input type="text" name="billing_country" value="{{$bcountry}}">
                      @error('billing_country')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="field-label">{{__('First Name')}} *</div>
                   <div class="field-input">
                        @php
                            $bfname = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $bfname = Auth::user()->billing_fname;
                                }
                            } else {
                                $bfname = old('billing_fname');
                            }
                        @endphp
                      <input type="text" name="billing_fname" value="{{$bfname}}">
                      @error('billing_fname')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-6">
                   <div class="field-label">{{__('Last Name')}} *</div>
                   <div class="field-input">
                        @php
                            $blname = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $blname = Auth::user()->billing_lname;
                                }
                            } else {
                                $blname = old('billing_lname');
                            }
                        @endphp
                      <input type="text" name="billing_lname" value="{{$blname}}">
                      @error('billing_lname')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Address')}} *</div>
                   <div class="field-input">
                        @php
                            $baddress = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $baddress = Auth::user()->billing_address;
                                }
                            } else {
                                $baddress = old('billing_address');
                            }
                        @endphp
                      <input type="text" name="billing_address" value="{{$baddress}}">
                      @error('billing_address')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Town / City')}} *</div>
                   <div class="field-input">
                        @php
                            $bcity = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $bcity = Auth::user()->billing_city;
                                }
                            } else {
                                $bcity = old('billing_city');
                            }
                        @endphp
                      <input type="text" name="billing_city" value="{{$bcity}}">
                      @error('billing_city')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Contact Email')}} *</div>
                   <div class="field-input">
                        @php
                            $bmail = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $bmail = Auth::user()->billing_email;
                                }
                            } else {
                                $bmail = old('billing_email');
                            }
                        @endphp
                      <input type="text" name="billing_email" value="{{$bmail}}">
                      @error('billing_email')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
                <div class="col-md-12">
                   <div class="field-label">{{__('Phone')}} *</div>
                   <div class="field-input">
                        @php
                            $bnumber = '';
                            if(empty(old())) {
                                if (Auth::check()) {
                                    $bnumber = Auth::user()->billing_number;
                                }
                            } else {
                                $bnumber = old('billing_number');
                            }
                        @endphp
                      <input type="text" name="billing_number" value="{{$bnumber}}">
                      @error('billing_number')
                      <p class="text-danger">{{convertUtf8($message)}}</p>
                      @enderror
                   </div>
                </div>
             </div>
          </div>
       </div>


    </div>

    @if ($bs->postal_code == 1)
        <div class="row">
            <div class="col-md-12">
                <div class="field-label">{{__('Postal Code')}} ({{__('Delivery Area')}}) *</div>
                <div class="field-input">
                    @php
                        $snumber = '';
                        if(empty(old())) {
                            if (Auth::check()) {
                                $snumber = Auth::user()->shpping_number;
                            }
                        } else {
                            $snumber = old('shpping_number');
                        }
                    @endphp
                    <select name="postal_code" class="select2">
                        <option value="" selected disabled>Select a postal code</option>
                        @foreach ($postcodes as $postcode)
                            <option value="{{$postcode->id}}" data="{{$postcode->charge}}">
                                @if (!empty($postcode->title))
                                    {{$postcode->title}} -
                                @endif
                                {{$postcode->postcode}}

                                (Delivery Charge - {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{$postcode->charge}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}})

                            </option>
                        @endforeach
                    </select>
                    @error('postal_code')
                    <p class="text-danger">{{convertUtf8($message)}}</p>
                    @enderror
                </div>
            </div>
        </div>
    @endif
    @if ($be->delivery_date_time_status == 1)
    <div class="row">
        <div class="col-md-6">
            <div class="field-label">{{ __('Delivery Date') }} {{$be->delivery_date_time_required == 1 ? '*' : ''}}</div>
            <div class="field-input cross {{!empty(old('delivery_date')) ? 'cross-show' : ''}}">
                <input class="form-control delivery-datepicker" type="text" name="delivery_date" autocomplete="off" value="{{old('delivery_date')}}">
                <i class="far fa-times-circle"></i>
                @error('delivery_date')
                <p class="text-danger">{{convertUtf8($message)}}</p>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="field-label">{{ __('Delivery Time') }} {{$be->delivery_date_time_required == 1 ? '*' : ''}}</div>
            <div class="field-input">
                <select id="deliveryTime" class="form-control" name="delivery_time" disabled>
                    <option value="" selected disabled>Select a time frame</option>
                </select>
                @error('delivery_time')
                <p class="text-danger">{{convertUtf8($message)}}</p>
                @enderror
            </div>
        </div>
    </div>
    @endif
