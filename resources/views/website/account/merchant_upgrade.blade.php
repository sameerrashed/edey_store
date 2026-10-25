<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ايدي ستور</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('website.partial.links')
    <style>
        .circle_upload-button {
            cursor: pointer;
            display: inline-block;
        }

        #icon_preview {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
        }

        #banner_preview {
            width: 350px;
            height: 160px;
            object-fit: cover;
            border-radius: 10px;
        }

        .profile-avatar-wrap {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile-avatar {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }
    </style>

</head>

<body>
    <div id="preloader">
        <div id="spinner">
            <div class="floating">
                <img src="{{asset('img/logo.png')}}" alt="إيدي ستور" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <header id="header">
            @include('website.partial.header')
        </header>
        <div class="block_search_mobile">
            <div class="container">
                <div class="search_head">
                    <form class="form_search_head" action="#">
                        <input type="text" class="form-control" placeholder="ابحث عن منتج">
                        <span class="search_icon"><i class="far fa-search"></i></span>
                        <button type="submit" class="btn btn_search">بحث الآن</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="block_breadcrumb">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">حسابي</li>
                </ol>
            </div>
        </div>
        <div class="content_innerPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="side_menu_account">
                            <ul class="menu_account">
                                <li><a href="{{route('account.index')}}">المعلومات الشخصية</a></li>
                                <li class=""><a href="account2.html">معلومات التوصيل والشحن</a></li>
                                <li class="active"><a href="{{route('account.upgrade')}}">ترقية لحساب تاجر/متجر</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="block_cn_account">
                            <form class="form_st1" action="{{route('account.upgrade.post')}}" method="post"
                                enctype="multipart/form-data">
                                <h2 class="title_page">ترقية لحساب تاجر/متجر</h2>
                                {{-- {{ session('success') }}--}}
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="img_info">
                                            <h4>أيقونة المتجر</h4>
                                            <p>يجب أن يكون ملف .jpg أو .gif أو .png أصغر من 10 ميجابايت و 400 × 400 بكسل
                                                على
                                                الأقل</p>
                                        </div>

                                        <div class="circle_upload-button mb-3 mt-3" id="icon_button">
                                            <img id="icon_preview" src="{{ asset('img/profil_pic.svg') }}" alt="icon">
                                        </div>

                                        <input id="icon_input" name="icon" type="file" accept="image/*"
                                            style="display: none;">

                                    </div>
                                    <div class="col-md-6 banner_shop">
                                        <div class="img_info">
                                            <h4>بانر المتجر</h4>
                                            <p>يجب أن يكون ملف .jpg أو .gif أو .png أصغر من 10 ميجابايت </p>
                                        </div>
                                        <div class="circle_upload-button mb-3 mt-3" id="banner_button">
                                            <img id="banner_preview" src="{{ asset('img/shop_banner.png') }}"
                                                alt="banner">
                                        </div>

                                        <input id="banner_input" name="banner" type="file" accept="image/*"
                                            style="display: none;">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">اسم المتجر</label>
                                            <input name="store_name" type="text" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">رقم جوال المتجر</label>
                                            <input name="store_phone" type="text" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">رقم الواتس آب</label>
                                            <input name="whatsApp_number" type="text" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">حسابك في فيسبوك</label>
                                            <input name="facebook_link" type="text" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">حسابك في تويتر</label>
                                            <input name="X_link" type="text" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">حسابك في انستغرام</label>
                                            <input name="instagram_link" type="text" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="title_page">معلومات التاجر</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">الاسم الاول</label>
                                            <input name="merchant_first_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">اسم العائلة</label>
                                            <input name="merchant_last_name" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">رقم الجوال</label>
                                            <input name="merchant_phone" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">الهوية</label>
                                            <input name="merchant_identity" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fr_label">نبذة عن التاجر</label>
                                            <input name="about_merchant" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">السجل التجاري (اختياري)</label>
                                            <input name="commercial_register" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">رقم معروف (اختياري)</label>
                                            <input name="known_number" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="title_page">معلومات الحساب البنكي</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">اسم الحساب البنكي</label>
                                            <input name="bank_account_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">اسم البنك</label>
                                            <select name="bank_name" class="form-control js-select"
                                                data-placeholder="اختر البنك">
                                                <option>اختر البنك....</option>
                                                <option>بنك فلسطين</option>
                                                <option>بنك القاهرة عمان</option>
                                                <option>البنك العربي الاسلامي</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="fr_label">رقم الايبان <img
                                                    src="img/information-circle-outline.svg" alt=""></label>
                                            <input name="iban" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h2 class="title_page">موقع المتجر</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">الدولة</label>
                                            <select name="country" id="country" class="form-control js-select"
                                                data-placeholder="الدولة">
                                                <option>قم بإختيار الدولة</option>
                                                <option value="فلسطين">فلسطين</option>
                                                <option value="مصر">مصر</option>
                                                <option value="قطر">قطر</option>
                                                <option value="المملكة العربية السعودية">المملكة العربية السعودية
                                                </option>
                                                <option value="الجزائر">الجزائر</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">المدينة</label>
                                            <select name="city" id="city" class="form-control js-select"
                                                data-placeholder="المدينة">
                                                <option value="">قم باختيار المدينة</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">المنطقة</label>
                                            <select name="area" id="area" class="form-control js-select"
                                                data-placeholder="المنطفة">
                                                <option value="">قم بإختيار المنطقة</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">العنوان</label>
                                            <input name="address" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">الشارع</label>
                                            <input name="street" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">أقرب معلم (اختياري)</label>
                                            <input name="nearest_landmark" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <button type="submit" class="btn btn-block btn_prim">حفظ المعلومات</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="subscribe">
            @include('website.partial.sections.subscribe_section')
        </div>
        <footer>
            @include('website.partial.footer')
        </footer>

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

        @if($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'يرجى تصحيح الحقول التالية',
                        html: `
                        <div style="
                            direction: rtl;
                            text-align: right;
                            background: #fff5f5;
                            border: 1px solid #f3c2c2;
                            border-radius: 12px;
                            padding: 15px;
                            margin-top: 15px;
                            max-height: 320px;
                            overflow-y: auto;
                            box-shadow: inset 0 0 10px rgba(0,0,0,0.03);
                        ">
                            @foreach ($errors->all() as $error)
                                                    <div style="
                                                        padding: 8px 10px;
                                                        margin-bottom: 8px;
                                                        background: #ffffff;
                                                        border-radius: 8px;
                                                        border-right: 4px solid #ef4444;
                                                        color: #444;
                                                        font-size: 16px;
                                                    ">
                                {{ $error }}
                                                    </div>
                            @endforeach
                        </div>
                    `,
                        confirmButtonText: 'حسناً',
                        confirmButtonColor: '#7c6cf2',
                        width: '650px'
                    });
                });
            </script>
        @endif

    </div>
    <script>
        $(document).ready(function () {

            // عند الضغط على أيقونة المتجر
            $('#icon_button').on('click', function () {
                $('#icon_input').click();
            });

            // عند اختيار صورة الأيقونة
            $('#icon_input').on('change', function () {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#icon_preview').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });

            // عند الضغط على بانر المتجر
            $('#banner_button').on('click', function () {
                $('#banner_input').click();
            });

            // عند اختيار صورة البانر
            $('#banner_input').on('change', function () {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();

                    reader.onload = function (e) {
                        $('#banner_preview').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(this.files[0]);
                }
            });

        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        const data = {
            "فلسطين": {
                "غزة": ["الرمال", "النصر", "الشيخ رضوان"],
                "نابلس": ["رفيديا", "المخفية", "الجامعة"]
            },
            "مصر": {
                "القاهرة": ["مدينة نصر", "المعادي", "حلوان"],
                "الإسكندرية": ["سيدي جابر", "سموحة", "العجمي"]
            },
            "قطر": {
                "الدوحة": ["الوكرة", "الريان", "المرخية"]
            }
        };

        $('#country').on('change', function () {
            let country = $(this).val();
            let citySelect = $('#city');
            let areaSelect = $('#area');

            citySelect.html('<option value="">قم باختيار المدينة</option>');
            areaSelect.html('<option value="">قم باختيار المنطقة</option>');

            if (country && data[country]) {
                $.each(data[country], function (city, areas) {
                    citySelect.append(`<option value="${city}">${city}</option>`);
                });
            }
        });

        $('#city').on('change', function () {
            let country = $('#country').val();
            let city = $(this).val();
            let areaSelect = $('#area');

            areaSelect.html('<option value="">قم باختيار المنطقة</option>');

            if (country && city && data[country][city]) {
                $.each(data[country][city], function (index, area) {
                    areaSelect.append(`<option value="${area}">${area}</option>`);
                });
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>