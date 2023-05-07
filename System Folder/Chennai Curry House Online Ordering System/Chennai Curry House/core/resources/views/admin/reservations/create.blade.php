@extends('admin.layout')

@section('content')
    <div class="page-header">
        <h4 class="page-title">
            Table Resevations
        </h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Table Resevations</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">
                    New
                </a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    New Table Reservation
                </div>
                <div class="card-body">
                    <form action="{{ route('front.table.book') }}" method="POST">
                        @csrf
                        <input type="hidden" value="1" name="admin">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 mt-3">
                                <div class="input-box mt-20">
                                    <label>{{ __('Full Name') }} <span>**</span></label>
                                    <input class="form-control" type="text" placeholder="{{ __('Full Name') }}"
                                        name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="text-danger">{{ convertUtf8($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-3 mt-3">
                                <div class="input-box mt-20">
                                    <label>{{ __('Email Address') }} <span>**</span></label>
                                    <input class="form-control" type="text" placeholder="{{ __('Email Address') }}"
                                        name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger">{{ convertUtf8($message) }}</p>
                                    @enderror
                                </div>
                            </div>
                            @foreach ($inputs as $input)
                                <div class="col-lg-6 offset-lg-3 mt-3">
                                    <div class="input-box mt-20">
                                        @if ($input->type == 1)
                                            <label>{{ convertUtf8($input->label) }} @if ($input->required == 1)
                                                    <span>**</span>
                                                @endif
                                            </label>
                                            <input class="form-control" name="{{ $input->name }}" type="text"
                                                value="{{ old("$input->name") }}"
                                                placeholder="{{ convertUtf8($input->placeholder) }}">
                                        @endif
                                        @if ($input->type == 2)
                                            <label>{{ convertUtf8($input->label) }} @if ($input->required == 1)
                                                    <span>**</span>
                                                @endif
                                            </label>
                                            <select name="{{ $input->name }}">
                                                <option value="" selected disabled>
                                                    {{ convertUtf8($input->placeholder) }}</option>
                                                @foreach ($input->quote_input_options as $option)
                                                    <option value="{{ convertUtf8($option->name) }}"
                                                        {{ old("$input->name") == convertUtf8($option->name) ? 'selected' : '' }}>
                                                        {{ convertUtf8($option->name) }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                        @if ($input->type == 3)
                                            <div class="form-group">
                                                <label for="">{{ $input->label }} @if ($input->required == 1)
                                                        <span>**</span>
                                                    @elseif($input->required == 0)
                                                        (Optional)
                                                    @endif
                                                </label>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        @foreach ($input->reservation_input_options as $key => $option)
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox"
                                                                    id="customCheckboxInline{{ $option->id }}"
                                                                    name="{{ $input->name }}[]"
                                                                    {{ is_array(old("$input->name")) && in_array(convertUtf8($option->name), old("$input->name")) ? 'checked' : '' }}
                                                                    value="{{ convertUtf8($option->name) }}"
                                                                    class="custom-control-input">
                                                                <label class="custom-control-label"
                                                                    for="customCheckboxInline{{ $option->id }}">{{ convertUtf8($option->name) }}</label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($input->type == 4)
                                            <label>{{ convertUtf8($input->label) }} @if ($input->required == 1)
                                                    <span>**</span>
                                                @endif
                                            </label>
                                            <textarea name="{{ $input->name }}" id="" cols="30" rows="10"
                                                placeholder="{{ convertUtf8($input->placeholder) }}">{{ old("$input->name") }}</textarea>
                                        @endif

                                        @if ($input->type == 5)
                                            <label>{{ convertUtf8($input->label) }} @if ($input->required == 1)
                                                    <span>**</span>
                                                @endif
                                            </label>
                                            <input class="form-control datepicker" name="{{ $input->name }}" type="text"
                                                value="{{ old("$input->name") }}"
                                                placeholder="{{ convertUtf8($input->placeholder) }}" autocomplete="off">
                                        @endif

                                        @if ($input->type == 6)
                                            <label>{{ convertUtf8($input->label) }} @if ($input->required == 1)
                                                    <span>**</span>
                                                @endif
                                            </label>
                                            <input class="form-control timepicker" name="{{ $input->name }}" type="text"
                                                value="{{ old("$input->name") }}"
                                                placeholder="{{ convertUtf8($input->placeholder) }}" autocomplete="off">
                                        @endif

                                        @if ($input->type == 7)
                                            <label>{{ convertUtf8($input->label) }} @if ($input->required == 1)
                                                    <span>**</span>
                                                @endif
                                            </label>
                                            <input class="form-control" name="{{ $input->name }}" type="number"
                                                value="{{ old("$input->name") }}"
                                                placeholder="{{ convertUtf8($input->placeholder) }}" autocomplete="off">
                                        @endif

                                        @if ($errors->has("$input->name"))
                                            <p class="text-danger mb-0">{{ $errors->first("$input->name") }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach


                            @if ($bs->is_recaptcha == 1)
                                <div class="col-lg-12 mt-20 text-center">
                                    <div data-sitekey="{{ $bs->google_recaptcha_site_key }}"
                                        class="g-recaptcha d-inline-block"></div>

                                    @if ($errors->has('g-recaptcha-response'))
                                        @php
                                            $errmsg = $errors->first('g-recaptcha-response');
                                        @endphp
                                        <p class="text-danger mb-0">{{ __("$errmsg") }}</p>
                                    @endif
                                </div>
                            @endif
                            <div class="col-lg-12 mt-50 p-5">
                                <div class="book-btn text-center ">
                                    <button class="btn btn-success  mt-50" type="submit">{{ __('Book Table') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
@endsection
