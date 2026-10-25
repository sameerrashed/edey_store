<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('website.partial.links')
</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <div class="floating">
                <img src="{{ asset('img/logo.png') }}" alt="إيدي ستور" class="img-responsive">
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
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">المفضلة</li>
                </ol>
            </div>
        </div>
        <div class="content_innerPage">
            <div class="container">
                <div class="list_favorite_products">
                    <div class="row">
                        @foreach ($product as $record)
                            <div class="col-lg-2  col-sm-3 col-6">
                                <div class="product_item">
                                    <div class="cn_product_thumb">
                                        <a href="{{ route('product.details', $record->product->id) }}"
                                            class="thumb_pro img-hover">
                                            <img src="{{ asset('img/' . $record->product->avatar) }}" alt="">
                                        </a>
                                        @if ($record->product->price_after > 0)
                                            <div class="label_pro">{{  $record->product->discount }}%</div>
                                        @endif
                                    </div>
                                    <div class="cn_product_txt">
                                        <h2><a
                                                href="{{ route('product.details', $record->product->id) }}">{{  $record->product->product_name }}</a>
                                        </h2>
                                        <div class="seller_info">
                                            <img src="{{  asset('img/' . $record->product->user->image) }}" alt="...">
                                            <span class="seller_name">{{  $record->product->user->first_name }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="pro_evaluate">

                                                <i class="fas fa-star checked"></i>
                                                <p class="ev_rate">4.7</p>
                                            </div>
                                            <div class="sale_pro d-flex justify-content-between">
                                                @if ($record->product->price_after > 0)
                                                    <div class="sale_old">
                                                        <p><span>{{ $record->product->price_after }}</span>ر.س</p>
                                                    </div>
                                                    <div class="sale_new">
                                                        <p><span>{{ $record->product->price }}</span>ر.س</p>
                                                    </div>
                                                @else
                                                    <div class="sale_new">
                                                        <p><span>{{ $record->product->price }}</span>ر.س</p>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Subscribe section start-->
            <div class="subscribe">
                @include('website.partial.sections.subscribe_section')
            </div>
        </div>
    </div>
    <!--Subscribe section start-->
    <footer>
        @include('website.partial.footer')
    </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade modal_st" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close_modal" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-times"></i></button>
                <div class="modal_head">
                    <h2 class="modal_title">متابعة إلى الدفع</h2>
                </div>
                <div class="modal_body">
                    <a href="checkout.html" type="submit" class="btn btn_prim btn_dt">إتمام الطلب كزائر</a>
                    <h2>أو تسجيل الدخول</h2>
                    <form class="form_st1" action="#">
                        <div class="form-group">
                            <label class="fr_label">البريد الالكتروني</label>
                            <input type="email" class="form-control" placeholder="البريد الالكتروني">
                        </div>
                        <div class="form-group">
                            <div class="cn_label  d-flex align-items-center">
                                <label class="fr_label">كلمة المرور</label>
                                <div class="pass_left mr-auto">
                                    <a href="#forget_password" data-toggle="modal" class="forget_password">هل نسيت كلمة
                                        المرور؟</a>
                                </div>
                            </div>
                            <div class="password_input">
                                <input type="password" class="form-control pwd" placeholder="كلمة المرور">
                                <span class="fr_icon show_pass"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <a href="checkout.html" type="submit" class="btn btn_main btn_dt">متابعة</a>
                        <a href="Register.html" type="submit" class="btn btn_main_prim btn_dt">تسجيل حساب جديد</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_st" id="forget_password" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close_modal" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-times"></i></button>
                <div class="modal_head">
                    <h2 class="modal_title">نسيت كلمة المرور</h2>
                </div>
                <div class="modal_body">
                    <h2>أدخل البريد الالكتروني المستخدم في عملية التسجيل</h2>
                    <form class="form_st1" action="#">
                        <div class="form-group">
                            <label class="fr_label">البريد الالكتروني</label>
                            <input type="email" class="form-control" placeholder="البريد الالكتروني">
                        </div>
                        <button href="Register.html" type="submit" class="btn btn_main btn_dt">إرسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/lightslider.min.js')}}"></script>
    <script src="{{asset('js/lightgallery.js')}}"></script>
    <script src="{{asset('js/lg-thumbnail.min.js')}}"></script>
    <script src="{{asset('js/lg-fullscreen.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
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
</body>

</html>