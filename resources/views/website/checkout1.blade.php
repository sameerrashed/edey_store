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
		        @include('website.partial.sections.checkout_header')



        <div class="content_innerPage pay">
			<div class="container">
                <h2 class="title_page">أدخل عنوان الشحن الخاص بك</h2>
                <p class="title_page_pa">لن يتم تحصيل رسوم منك حتى تقوم بمراجعة هذا الطلب في الصفحة التالية</p>
                <div class="block_cn_pay">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="payment-method">
                            <div class="kind-of-payments">
                                <div id="accordion">
                                    <div class="choice">
                                        <div class="custom-control custom-radio">
        
                                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" data-toggle="collapse" href="#bankTransfare">
                                            <label class="custom-control-label" for="customRadio1">البطاقة المصرفية
                                                <div class="method_img">
                                                    <img src="img/visa.svg" alt="">
                                                    <img src="img/master.svg" alt="">
                                                </div>    
                                            </label>
        
                                        </div>
                                        <div class="description collapse" id="bankTransfare" data-parent="#accordion">
                                           <form class="form_st1" action="">
                                            <div class="pay-form">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label >الاسم على البطاقة</label>
                                                            <input type="text" class="form-control" placeholder="الاسم على البطاقة">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-end">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label >رقم البطاقة</label>
                                                            <input type="text" class="form-control" placeholder="رقم البطاقة (أقصى قيمة 16 رقم)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label >تاريخ الانتهاء</label>
                                                            <select class="form-control js-select" data-placeholder="الشهر">
                                                                <option></option>
                                                                <option>الشهر</option>
                                                                <option>الشهر</option>
                                                                <option>الشهر</option>
                                                                <option>الشهر</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label ></label>
                                                            <select class="form-control js-select" data-placeholder="السنة">
                                                                <option></option>
                                                                <option>السنة</option>
                                                                <option>السنة</option>
                                                                <option>السنة</option>
                                                                <option>السنة</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label >رمز التحقق من البطاقة (CVC)</label>
                                                            <input type="text" class="form-control" placeholder="أقصى قيمة 3 أرقام">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="label_check">
                                                        <input type="checkbox" class="checkbox_st">
                                                        <div class="check_txt">عنوان إرسال الفواتير الخاص بي هو نفسه عنوان الشحن الخاص بي</div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="label_check">
                                                        <input type="checkbox" class="checkbox_st">
                                                        <div class="check_txt">تعيين كافتراضي</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <a href="checkout2.html" class="btn btn-block btn_prim">تابع للدفع</a>
                                                </div>
                                            </div>
                                           </form>
                                        </div>
                                    </div>
                                    <div class="choice">
                                        <div class="custom-control custom-radio">
        
                                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" data-toggle="collapse" href="#directPay">
                                            <label class="custom-control-label" for="customRadio2">حوالة مصرفية
                                                <div class="method_img">
                                                    <img src="img/cash.svg" alt="">
                                                </div>   
                                            </label>
        
                                        </div>
                                        <div class="description collapse" id="directPay" data-parent="#accordion">
                                            شرح عن طريقة الدفع، هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد
                                            هذا
                                            النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص
                                            الأخرى
                                            إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                        </div>
                                    </div>
                                    <div class="choice">
                                        <div class="custom-control custom-radio">
        
                                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" data-toggle="collapse" href="#debitPay">
                                            <label class="custom-control-label" for="customRadio3">بطاقة مدى
                                                <div class="method_img">
                                                    <img src="img/mada.svg" alt="">
                                                </div>
                                            </label>
        
                                        </div>
                                        <div class="description collapse" id="debitPay" data-parent="#accordion">
                                            شرح عن طريقة الدفع، هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد
                                            هذا
                                            النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص
                                            الأخرى
                                            إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                        </div>
                                    </div>
                                    <div class="choice">
                                        <div class="custom-control custom-radio">
        
                                            <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" data-toggle="collapse" href="#debitPay">
                                            <label class="custom-control-label" for="customRadio4">بطاقة آبل باي
                                                <div class="method_img">
                                                    <img src="img/apple-pay.svg" alt="">
                                                </div>

                                            </label>
        
                                        </div>
                                        <div class="description collapse" id="debitPay" data-parent="#accordion">
                                            شرح عن طريقة الدفع، هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                            توليد
                                            هذا
                                            النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص
                                            الأخرى
                                            إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                                        </div>
                                    </div>
        
                                </div>
                                
                            </div>
                          </div>
                        </div>
                    </div>
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
    <script src="js/select2.full.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>	 