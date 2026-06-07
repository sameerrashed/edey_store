<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>إيدي ستور</title>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}"/>
    <link rel="stylesheet" href="{{asset('css/plugins.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.bundle.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.bundle.rtl.css') }}" rel="stylesheet">
</head>
<body id="kt_body" class="bg-body">
<div class="d-flex flex-column flex-root">
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url({{asset('img/14.png')}}">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <a href="../../demo1/dist/index.html" class="mb-12">
                <img alt="Logo" src="{{asset('img/logo.png')}}" class="h-40px"/>
            </a>
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                <form method="post" action="{{route('merchant.checkLogin')}}" class="form w-100" id="kt_sign_in_form">
                    @csrf

                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">
                            تسجيل الدخول إلى لوحة تحكم التاجر
                        </h1>
                    </div>

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">الإيميل</label>

                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                               autocomplete="off"
                               value="" required autofocus/>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">كلمة المرور</label>
                            <!--end::Label-->

                            <!--begin::Link-->
                            @if (Route::has('password.request'))
                                <a href="" class="link-primary fs-6 fw-bolder">
                                    هل نسيب كلمة المرور ؟
                                </a>
                            @endif
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                               autocomplete="off" value="" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="remember"/>
                            <span class="form-check-label fw-bold text-gray-700 fs-6 ms-3">تذكرني

            </span>
                        </label>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            @include('admin.partials._button-indicator', ['label' => __('إستمر')])
                        </button>
                        <!--end::Submit button-->

                        <!--begin::Separator-->
                        <div class="text-center text-muted text-uppercase fw-bolder mb-5">أو</div>
                        <!--end::Separator-->

                        <!--begin::Google link-->
                        <a href="{{ url('/auth/redirect/google') }}?redirect_uri={{ url()->previous() }}"
                           class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo" src="{{asset('img/google-icon.svg')}}" class="h-20px me-3 ms-3"/>
                            {{ __('سجل الدخول عن طريق جوجل      ') }}
                        </a>
                        <!--end::Google link-->

                        <!--begin::Facebook link-->
                        <a href="{{ url('/auth/redirect/facebook') }}?redirect_uri={{ url()->previous() }}"
                           class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo" src="{{asset('img/facebook-4.svg')}}" class="h-20px me-3 ms-3"/>
                            {{ __('سجل الدخول عن طريق فيس بوك') }}
                        </a>
                        <!--end::Facebook link-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    @if(session('success'))
    Swal.fire({
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonText: "حسناً"
    });
    @endif

    @if(session('error'))
    Swal.fire({
        text: "{{ session('error') }}",
        icon: "error",
        confirmButtonText: "حسناً"
    });
    @endif
</script>

<link rel="stylesheet" href="{{asset('js/plugins.bundle.js')}}">
<link rel="stylesheet" href="{{asset('js/scripts.bundle.js')}}">
<link rel="stylesheet" href="{{asset('js/general.js')}}">
</body>
</html>
