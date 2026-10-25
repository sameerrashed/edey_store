<?php

use App\Models\requestUpgradeMerchant;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ايدي ستور</title>
    @include('website.partial.links')
    <style>
        .itm_us.gru_profile .btn_user_profile {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: flex-start;
            gap: 10px;
            padding: 0;
            text-decoration: none;
            white-space: nowrap;
        }

        .itm_us.gru_profile .profile-avatar-wrap {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }

        .itm_us.gru_profile .profile-avatar {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
            display: block;
        }

        .itm_us.gru_profile .gru_profile_sec {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 0;
            line-height: 1.3;
        }

        .itm_us.gru_profile .gru_profile_sec h6 {
            margin: 0;
            font-size: 14px;
            font-weight: 700;
        }

        .itm_us.gru_profile .gru_profile_sec span {
            margin: 0;
            font-size: 12px;
            color: #777;
        }

        .disabled-link {
            pointer-events: none;
            cursor: not-allowed;
            opacity: 0.5;
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
                                <li class="active"><a href="{{route('account.index')}}">المعلومات الشخصية</a></li>
                                <li class=""><a href="account2.html">معلومات التوصيل والشحن</a></li>
                                @php($val = 1)
                                @foreach ($requests as $request)

                                @if ($request->user_id == $record->id)
                                <li class="d-flex flex-column">
                                    @if (requestUpgradeMerchant::status[$request->status] == 'Accepted')
                                        <a class="disabled-link" href="{{route('account.upgrade')}}">ترقية لحساب
                                            تاجر/متجر</a>
                                        <span class="text-danger fs-7 mt-1">
                                            انت مصنف كتاجر لا يمكنك تقديم طلب اخر
                                        </span>
                                    @elseif (requestUpgradeMerchant::status[$request->status] == 'Pending')
                                        <a class="disabled-link" href="{{route('account.upgrade')}}">ترقية لحساب
                                            تاجر/متجر</a>
                                        <span class="text-danger fs-7 mt-1">
                                            لا يمكنك تقديم طلب اخر حتى قبول او رفض الطلب المرسل اولا
                                        </span>
                                    @else
                                        <a href="{{route('account.upgrade')}}">ترقية لحساب
                                            تاجر/متجر</a>
                                    @endif

                                </li>
                                @php($val = 0)
                                @endif

                                @endforeach

                                @if ($val)
                                    <li class=""><a href="{{route('account.upgrade')}}">ترقية لحساب تاجر/متجر</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 ">
                        <div class="block_cn_account">
                            <form class="form_st1" action="{{route('account.update')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <h2 class="title_page"> المعلومات الشخصية</h2>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="img_info">
                                            <h4>الصورة الشخصية</h4>
                                            <p>يجب أن يكون ملف أصغر من 10 ميجابايت و 400 × 400 بكسل على الأقل</p>
                                        </div>
                                        <div class="circle upload-button">
                                            <!-- User Profile Image -->
                                            <img class="profile-pic" src=" {{asset('img/' . $record->image)}}">
                                        </div>

                                        <input name="image" id="profile_image" class="file-upload" type="file"
                                            accept="image/*" value="{{asset('img/' . $record->image)}}" />

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">الأسم الاول</label>
                                            <input name="first_name" type="text" class="form-control"
                                                value="{{$record->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">اسم العائلة</label>
                                            <input name="last_name" type="text" class="form-control "
                                                value="{{$record->last_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">رقم الجوال</label>
                                            <input name="phone" type="text" class="form-control "
                                                value="{{$record->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="fr_label">البريد الالكتروني</label>
                                            <input name="email" type="email" class="form-control "
                                                value="{{$record->email}}">
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


    </div>
    <script>
        $(document).ready(function () {


            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.profile-pic').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function () {
                readURL(this);
            });

            $(".upload-button").on('click', function () {
                $(".file-upload").click();
            });
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