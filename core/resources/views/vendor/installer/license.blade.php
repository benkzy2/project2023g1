@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.license.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-key fa-fw" aria-hidden="true"></i>
    {!! trans('installer_messages.license.title') !!}
@endsection

@section('container')
    <div class="tabs tabs-full">



        <form method="post" action="{{ route('LaravelInstaller::licenseCheck') }}" class="tabs-wrap">
            @if(session()->has('license_error'))
                <div class="alert alert-danger" id="error_alert">
                    <button type="button" class="close" id="close_alert" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-close" aria-hidden="true"></i>
                    </button>
                    <p class="mrb-0">{{session()->get('license_error')}}</p>
                </div>
            @endif

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div>
            

                <div class="buttons">
                    <a class="button btn-danger" href="https://bom.to/C4f2wslVqfaZPU" target="_bank" style="background:red;">
                        <i class="fa fa-youtube" aria-hidden="true"></i> Subcribe to our Youtube Channel
                    </a>
                </div>

                <div class="buttons">
                    <button class="button verify-btn" type="submit">
                        Verify
                        <i class="fa fa-angle-right fa-fw" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

        </form>

    </div>
@endsection

