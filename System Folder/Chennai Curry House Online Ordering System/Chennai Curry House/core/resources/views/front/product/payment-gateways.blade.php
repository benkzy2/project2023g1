{{-- Start: Paypal Area --}}
@if ($paypal->status == 1)
<div class="option-block">
    <div class="radio-block">
        <div class="checkbox">
            <label>
                <input name="gateway" type="radio" class="input-check" value="paypal" data-tabid="paypal" data-action="{{route('product.paypal.submit')}}">
                <span>{{__('Paypal')}}</span>
            </label>
        </div>
    </div>
</div>
@endif
{{-- End: Paypal Area --}}


{{-- Start: Stripe Area --}}
@if ($stripe->status == 1)
<div class="option-block">
    <div class="checkbox">
        <label>
            <input name="gateway" class="input-check" type="radio" value="stripe" data-tabid="stripe" data-action="{{route('product.stripe.submit')}}">
            <span>{{__('Stripe')}}</span>
        </label>
    </div>
</div>


<div class="row gateway-details" id="tab-stripe">

    <div class="col-md-6">
        <div class="field-label">{{__('Card Number')}} *</div>
        <div class="field-input">
            <input type="text" class="card-elements mb-0" name="cardNumber" placeholder="{{ __('Card Number')}}" autocomplete="off" value="{{old('cardNumber')}}" />
        </div>
        @error('cardNumber')
        <p class="text-danger">{{convertUtf8($message)}}</p>
        @enderror
        <span id="errCard" class="text-danger mb-0"></span>
    </div>
    <div class="col-md-6">
        <div class="field-label">{{__('CVC')}} *</div>
        <div class="field-input">
            <input type="text" class="card-elements mb-0" placeholder="{{ __('CVC') }}" name="cardCVC" value="{{old('cardCVC')}}">
        </div>
        @error('cardCVC')
        <p class="text-danger">{{convertUtf8($message)}}</p>
        @enderror
        <span id="errCVC text-danger mb-0"></span>
    </div>
    <div class="col-md-6 mb-4">
        <div class="field-label">{{__('Month')}} *</div>
        <div class="field-input">
            <input type="text" class="card-elements mb-0" placeholder="{{__('Month')}}" name="month" value="{{old('month')}}">
        </div>
        @error('month')
        <p class="text-danger">{{convertUtf8($message)}}</p>
        @enderror
    </div>
    <div class="col-md-6 mb-4">
        <div class="field-label">{{__('Year')}} *</div>
        <div class="field-input">
            <input type="text" class="card-elements mb-0" placeholder="{{__('Year')}}" name="year" value="{{old('year')}}">
        </div>
        @error('year')
        <p class="text-danger">{{convertUtf8($message)}}</p>
        @enderror
    </div>
</div>
@endif
{{-- End: Stripe Area --}}



{{-- Start: Offline Gateways Area --}}
@foreach ($ogateways as $ogateway)
    <div class="offline" id="offline{{$ogateway->id}}">
        <div class="option-block">
            <div class="checkbox">
                <label>
                <input name="gateway" class="input-check" type="radio" value="{{$ogateway->id}}" data-tabid="{{$ogateway->id}}" data-action="{{route('product.offline.submit', $ogateway->id)}}">
                    <span>{{$ogateway->name}}</span>
                </label>
            </div>
        </div>

        @if (!empty($ogateway->short_description))
            <p class="gateway-desc">{{$ogateway->short_description}}</p>
        @endif

        <div class="gateway-details row" id="tab-{{$ogateway->id}}">
            @if (!empty(strip_tags($ogateway->instructions)))
                <div class="col-12">
                    <div class="gateway-instruction">
                        {!! replaceBaseUrl($ogateway->instructions) !!}
                    </div>
                </div>
            @endif

            @if ($ogateway->is_receipt == 1)
                <div class="col-12 mb-4">
                    <label for="" class="d-block">{{__('Receipt')}} **</label>
                    <input type="file" name="receipt">
                    <p class="mb-0 text-warning">** {{__('Receipt image must be .jpg / .jpeg / .png')}}</p>
                </div>
            @endif
        </div>
    </div>
@endforeach


@if ($errors->has('receipt'))
    <p class="text-danger mb-4">{{$errors->first('receipt')}}</p>
@endif
{{-- End: Offline Gateways Area --}}

