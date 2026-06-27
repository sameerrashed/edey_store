<!DOCTYPE html>
<html lang="ar">
<head>
	<meta charset="utf-8">
	<title>إيدي ستور</title>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery-1.12.2.min.js"></script>
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
    <div class="main-wrapper checkout">
		<header id="header">
            <div class="middle_header">
				<div class="container">
					<div class="d-flex align-items-center states_mo">
						<div class="logo_site">
							<a href="index.html"><img src="img/logo.png" alt="إيدي ستور"></a>
						</div>
                        <div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" class="first  current">
                                    <a id="steps-uid-0-t-0" href="#steps-uid-0-h-0">
                                        <span class="number"></span>
                                        <span class="step-order">معلومات الشحن</span>
                                    </a>
                                </li>
                                <li role="tab" class="disabled">
                                    <a id="steps-uid-0-t-1" href="#steps-uid-0-h-1">
                                        <span class="number"></span>
                                        <span class="step-order">معلومات الدفع</span>
                                    </a>
                                </li>
                                <li role="tab" class="disabled last">
                                    <a id="steps-uid-0-t-3" href="#steps-uid-0-h-3">
                                        <span class="number"></span>
                                        <span class="step-order">مراجعة الطلب</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="safe_pay mr-auto">
                              <h4><img src="img/lock.svg" alt=""> دفع آمن ومحمي </h4>
                        </div>
					</div>
				</div>
			</div>
        </header>


        <div class="content_innerPage pay">
			<div class="container">
                <h2 class="title_page">أدخل عنوان الشحن الخاص بك</h2>
                <div class="block_cn_pay">
                    <form class="form_st1" action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">البريد الالكتروني</label>
                                    <input type="email" class="form-control " >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">تأكيد البريد الالكتروني</label>
                                    <input type="email" class="form-control " >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">الدولة</label>
                                    <select class="form-control js-select " data-placeholder="المملكة العربية السعودية" >
                                        <option ></option>
                                        <option>المملكة العربية السعودية</option>
                                        <option>المملكة العربية السعودية</option>
                                        <option>المملكة العربية السعودية</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">الاسم كاملاً</label>
                                    <input type="text" class="form-control" placeholder="اسم صاحب الحساب">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">عنوان الشارع</label>
                                    <input type="text" class="form-control" placeholder="اسم صاحب الحساب">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">المحافظة</label>
                                    <select class="form-control js-select " data-placeholder="الرياض" >
                                        <option ></option>
                                        <option>الرياض</option>
                                        <option>الرياض</option>
                                        <option>الرياض</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">المدينة</label>
                                    <select class="form-control js-select " data-placeholder="اسم المدينة" >
                                        <option ></option>
                                        <option>اسم المدينة</option>
                                        <option>اسم المدينة</option>
                                        <option>اسم المدينة</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <a  href="{{ route('cart.checkout1') }}" class="btn btn-block btn_prim">تابع للدفع</a>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>

			<footer>
				<div class="pay_footer">
					<div class="container d-flex justify-content-center">
						<div class="copy_right">
							<p>جميع الحقوق محفوظة لمتجر إيدي © 2020</p>
						</div>
						<div class="footer_nav ">
                            <ul>
                                <li><a href="">الخصوصية</a></li>
                                <li><a href="">قوانين الاستخدام</a></li>
                                <li><a href="">الدعم المباشر</a></li>
                            </ul>
                        </div>
					</div>
				</div>
			</footer>
	</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
	<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>	 