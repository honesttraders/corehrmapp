@extends('service::layouts.app_install', ['title' => __('service::install.admin_setup')])

@php
$base_path = 'public/vendor/honesttraders';
@endphp
@section('content')
<div class="col-4">
    <div class="padding-left-top">
        <img src="{{ asset($base_path . '/') }}/images/Logo.png" alt="" />

        <div class="mt-5 pe-2 follow-next-step-side" step-count="1">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div>
                    <p>01.</p>
                    <h5><b>Welcome Note</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="2">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div class="col-9">
                    <p>02.</p>
                    <h5><b>Check Environment</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="3">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="border step-with-border completed  rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div class="ps-2">
                    <p>03.</p>
                    <h5><b>Licence Verification</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="4">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border completed rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/check-mark.svg" alt="" />
                </div>
                <div class="col-9">
                    <p>04.</p>
                    <h5><b>Database Setup</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="5">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border initial rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/icon-white/admin.svg" alt="" />
                </div>
                <div class="ps-2">
                    <p>05.</p>
                    <h5><b>Admin Setup</b></h5>
                </div>
            </div>
            <span class="next-step-status-line"></span>
        </div>
        <div class="pe-4 follow-next-step-side" step-count="6">
            <div class="d-flex align-items-center gap-3">
                <div
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/complete.svg" alt="" />
                </div>
                <div>
                    <p>06.</p>
                    <h5><b>Complete</b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- from section -->
<div class="col-8 from-section">
    <div class="padding-left-top">
        <div class="bg-white w-75 rounded" step-count="5">
            <div class="text-title p-3 text-center text-white">
                <h3>{{ __('service::install.admin_setup') }}</h3>
            </div>

            <form class="pb-3 content-body" method="post" action="{{ route('service.user') }}" id="content_form">
                <div class="mb-3 px-5 pt-5">
                    <label class="form-label"><b>{{ __('service::install.email') }}<span class="star">*</span></b></label>
                    <input type="email" class="form-control" name="email" id="email" required="required" placeholder="{{ __('service::install.email') }}">
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label" for="password"><b>{{ __('service::install.password') }}<span class="star">*</span></b></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('service::install.password') }}" required>

                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label" for="password_confirmation"><b>{{ __('service::install.password_confirmation') }}<span class="star">*</span></b></label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="{{ __('service::install.password_confirmation') }}" data-parsley-equalto="#password">

                </div>
                    @if(env('APP_SYNC'))
                        <div class="px-5 pb-4 d-flex align-items-center gap-2">
                            <input class="form-check-input" type="checkbox" name="seed" id="flexRadioDefault2"  />
                            <label class="form-check-label" for="flexRadioDefault2">
                                {{ __('Install With Demo Data') }}
                            </label>
                        </div>
                    @endif

                    
                    <div class="px-5 pb-4 d-flex flex-column justify-content-center align-items-start gap-3">
                    <button type="submit" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submit bc-color" >{{ __('service::install.ready_to_go') }} »</button>
                    <button type="button" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submitting bc-color" disabled style="display:none">{{ __('service::install.submitting') }} »</button>

                </div>
            </form>
        </div>
    </div>
</div>

@stop
@push('js')
    <script>
        _formValidation('content_form');
        $(document).ready(function(){
            setTimeout(function(){
                $('.preloader h2').html('Installing The System. <br> This may take some time. Be patient. Do not refresh or close your browser')
            }, 2000);
        })
    </script>
@endpush
