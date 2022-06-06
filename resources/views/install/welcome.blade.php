@extends('service::layouts.app_install', ['title' => __('lms::install.welcome')])

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
                    class="p-3 step-with-border initial rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/icon-white/welcome.svg" alt="" />
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
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/enviroment.svg" alt="" />
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
                    class="border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/verification.svg" alt="" />
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
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/database.svg" alt="" />
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
                    class="p-3 border step-with-border rounded-circle d-flex flex-column justify-content-center align-items-center image-icon tab-button">
                    <img src="{{ asset($base_path . '/') }}/images/Icon/admin.svg" alt="" />
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
        <div class="bg-white w-75 rounded show-section tab-section" step-count="1">
            <div class="text-title p-3 text-center text-white">
                <h3>{{ __('service::install.welcome_title') }}</h3>
            </div>
            <div
                class="px-5 py-4 d-flex flex-column justify-content-center align-items-center gap-3 content-body">
                <img src="{{ asset($base_path . '/') }}/images/illustration.png" alt="" />
                <p class="text-center mb-3">
                    {{ __('service::install.welcome_description') }}
                </p>
                {{-- <button type="button"
                    class="btn color btn-primary px-5 py-3 mb-3 align-items-center follow-next-step">
                    <b>GET STARTED »</b>
                </button> --}}
                <a href="{{ route('service.preRequisite') }}" class="btn color btn-primary px-5 py-3 mb-3 align-items-center follow-next-step">
                    {{ __('service::install.get_started') }} »</a>
            </div>
        </div>
        {{-- <div class="bg-white w-75 rounded tab-section" step-count="2">
            <div class="text-title p-3 text-center text-white">
                <h3>Let's Check Your Enviroment For App</h3>
            </div>
            <div class="row p-5">
                <h3>Serviver Requirements</h3>
                <hr />
                <!-- section-1 -->
                <div class="col">
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Installation directary is valid.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Fileinfo PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>JSON PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Tokenizer PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Zip archive PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>CURL is installed.</p>
                    </div>
                </div>
                <!-- section-2 -->
                <div class="col">
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Min PHP version 7.2.0 (Current Version 7.4.19)</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>C-Type PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>OpenSSL PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Mbstring PHP extension enabled.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>PDO is installed.</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Allow_url_fopen is on.</p>
                    </div>
                </div>
            </div>

            <div class="row px-5">
                <h3>Folder Requirements</h3>
                <hr />
                <!-- section-1 -->
                <div class="col">
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>File.env writable</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Folder /storage/logs is writable</p>
                    </div>
                </div>
                <!-- section-2 -->
                <div class="col">
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Folder /storage/framework is writable</p>
                    </div>
                    <div class="list-item">
                        <img src="images/check.svg" alt="" />
                        <p>Folder /boostrap/cache is writable</p>
                    </div>
                </div>
            </div>
            <div class="px-5 py-4 d-flex flex-column justify-content-center align-items-center gap-3">
                <div class="py-3 rounded text-center px-5 btn-with-opacity">
                    <p class="px-5 all-the">
                        <b>All the Requirements look;s Fine. Let;s Dig in</b>
                    </p>
                </div>
                <button type="button"
                    class="btn mb-3 color btn-primary px-5 py-3 align-items-center follow-next-step">
                    <b>LET'S GO NEXT »</b>
                </button>
            </div>
        </div>
        <div class="bg-white w-75 rounded tab-section" step-count="3">
            <div class="text-title p-3 text-center text-white">
                <h3>Let's Check Your Enviroment For App</h3>
            </div>
            <form class="pb-3">
                <div class="mb-3 px-5 pt-5">
                    <label class="form-label"><b>Purchase Code<span class="star">*</span></b></label>
                    <input type="text" class="form-control" placeholder="Enter code here" />
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label"><b>Email Account Email<span class="star">*</span></b></label>
                    <input type="email" class="form-control" placeholder="Type e-mail address" />
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label"><b>Installation Domain<span class="star">*</span></b></label>
                    <input type="text" class="form-control"
                        placeholder="http://192.168.1.105/hrm_installer/install" />
                </div>
                <div class="px-5 pb-4 d-flex flex-column justify-content-center align-items-start gap-3">
                    <button type="button"
                        class="btn color btn-primary px-5 py-3 align-items-start follow-next-step">
                        <b>LET'S GO NEXT »</b>
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white w-75 rounded tab-section" step-count="4">
            <div class="text-title p-3 text-center text-white">
                <h3>Check Your Database</h3>
            </div>
            <div class="px-5 pt-5">
                <h3><b>Database Setup</b></h3>
                <hr class="hori-rule" />
            </div>
            <form class="pb-3">
                <div class="mb-3 px-5">
                    <label class="form-label"><b>Hostname<span class="star">*</span></b></label>
                    <input type="text" class="form-control" placeholder="Localhost" />
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label"><b>Database Part<span class="star">*</span></b></label>
                    <input type="text" class="form-control" placeholder="xxxx-xxxx" />
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label"><b>Database Name<span class="star">*</span></b></label>
                    <input type="text" class="form-control" placeholder="Enter database name" />
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label"><b>Database Username<span class="star">*</span></b></label>
                    <input type="text" class="form-control" placeholder="Enter database username" />
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label"><b>Database Password<span class="star">*</span></b></label>
                    <input type="password" class="form-control" placeholder="xxxxxxxxx" />
                </div>
                <div class="px-5 pb-4 d-flex align-items-center gap-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                        checked />
                    <label class="form-check-label" for="flexRadioDefault2">
                        I agree with the terms and conditions.
                    </label>
                </div>

                <div class="px-5 pb-4 d-flex flex-column justify-content-center align-items-start gap-3">
                    <button type="button"
                        class="btn color btn-primary px-5 py-3 align-items-start follow-next-step">
                        <b>LET'S GO NEXT »</b>
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white w-75 rounded tab-section" step-count="5">
            <div class="text-title p-3 text-center text-white">
                <h3>Admin Setup</h3>
            </div>

            <form class="pb-3 content-body">
                <div class="mb-3 px-5 pt-5">
                    <label class="form-label"><b>Email<span class="star">*</span></b></label>
                    <input type="text" class="form-control" placeholder="Type e-mail address" />
                </div>
                <div class="mb-3 px-5">
                    <label class="form-label"><b>Password<span class="star">*</span></b></label>
                    <input type="password" class="form-control" placeholder="xxxxxxxx" />
                </div>
                <div class="mb-3 px-5 pb-3">
                    <label class="form-label"><b>Re-enter Password<span class="star">*</span></b></label>
                    <input type="password" class="form-control" placeholder="xxxxxxxxx" />
                </div>

                <div class="px-5 pb-4 d-flex flex-column justify-content-center align-items-start gap-3">
                    <button type="button" id="submitBtn"
                        class="btn color btn-primary px-5 py-3 align-items-start follow-next-step">
                        <b>READY TO GO »</b>
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white w-75 rounded tab-section" step-count="6">
            <div class="text-title p-3 text-center text-white">
                <h3>Congratulations</h3>
            </div>
            <div
                class="px-5 py-4 d-flex flex-column justify-content-center align-items-center gap-3 content-body">
                <img src="images/illustration.png" alt="" />
                <p class="text-center pb-3">
                    Congratulations! You successfully installed HRM. Login to use
                    our servises.
                </p>
                <a href="/" class="btn color mb-3 btn-primary px-5 py-3 align-items-center"><b>LOGIN</b></a>
            </div>
        </div> --}}
    </div>
</div>

@stop
