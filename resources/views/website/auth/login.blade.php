<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <title>إيدي ستور</title>
    <style>
        .login-error-message {
            width: 100%;
            margin-top: 18px;
            padding: 12px 16px;

            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;

            background: #fff5f5;
            border: 1px solid #f2caca;
            border-radius: 14px;

            color: #b84b4b;
            font-size: 14px;
            font-weight: 500;

            direction: rtl;
            text-align: right;
        }

        .login-error-message .error-icon {
            width: 22px;
            height: 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;
            background: #e57373;
            color: #fff;

            font-size: 13px;
            font-weight: bold;

            flex-shrink: 0;
        }
    </style>
    <!-- Stylesheets -->
    @include('website.partial.links')
</head>

<body>
    <!-- preloader -->
    <div id="preloader">
        <div id="spinner">
            <div class="floating">
                <img src="img/logo.png" alt="إيدي ستور" class="img-responsive">
            </div>
        </div>
    </div>
    <div class="login_layout">
        <div class="row">
            <div class="col-md-6">
                <div class="login_slider">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"
                        data-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="img/collection.png" alt="collection">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/collection.png" alt="collection">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="img/collection.png" alt="collection">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="cn_sign_layout">
                    <div class="logo">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="login_msg">
                        <h1>أهلاً بك في متجر إيدي</h1>
                    </div>
                    <form class="form_st1" method="post" action="{{route('login.post')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">البريد الالكتروني</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">كلمة المرور</label>
                                    <div class="password_input">
                                        <input type="password" name="password" class="form-control pwd">
                                        <span class="fr_icon show_pass"><i class="fas fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="label_check">
                                <input type="checkbox" class="checkbox_st">
                                <div class="check_txt">أوافق على شروط الخصوصية</div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn_prim btn_dt">تسجيل الدخول</button>
                        <div class="note_sign">
                            <p>هل تريد ان تكون عضواً ؟ قم <a href="{{route('signup')}}">بإنشاء حساب</a></p>
                        </div>
                        @if(session('error'))
                            <div class="login-error-message">
                                <span class="error-icon">!</span>
                                <span>{{ session('error') }}</span>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>