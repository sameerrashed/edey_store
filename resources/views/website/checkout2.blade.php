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



        <div class="content_innerPage pay_laststep">
			<div class="container">
                <h2 class="title_page">مراجعة وتنفيذ الطلب</h2>
                <p class="title_page_pa">لن يتم تحصيل رسوم منك حتى تقوم بمراجعة هذا الطلب في الصفحة التالية</p>
                <div class="row">
					<div class="col-md-8">
						
						<div class="block_table_details_order">
							<div class="table-responsive">
								<table class="table table_order">
									<thead>
										<tr>
											<th> المنتج</th>
											<th>السعر</th>
                                            <th class="c-b">الإجمالي</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="order_itm_tb clearfix">
													<a href="#" class="thumb_order_tb">
														<img src="img/prod2.png" alt="">
													</a>
													<div class="txt_order_tb">
														<h2><a href="#">اسم المنتج هنا بالكامل (سطرين)</a></h2>
														<p>499 ر.س</p>
													</div>
												</div>
											</td>
											<td>
												200 ر.س
											</td>
											<td class="c-b">
												998 ر.س
											</td>
										</tr>
										<tr>
											<td>
												<div class="order_itm_tb clearfix">
													<a href="#" class="thumb_order_tb">
														<img src="img/prod1.png" alt="">
													</a>
													<div class="txt_order_tb">
														<h2><a href="#">اسم المنتج هنا بالكامل (سطرين)</a></h2>
														<p>499 ر.س</p>
													</div>
												</div>
											</td>
											<td>
												200 ر.س
											</td>
											<td class="c-b">
												998 ر.س
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
                        <div class="bill_skin_box d-flex">
							<div class="grp_bill">
								<h2>عنوان التوصيل</h2>
								<p>الشارع، الجادة، الشقة</p>
								<p>0123-456-789</p>
								<p>support@AhmedDesigner.com</p>
								<p>MAHMOUD KHELLA</p>
								<p>KUWAIT</p>
								<p>00000000000</p>
							</div>
							<div class="grp_bill">
								<h2>طريقة الدفع</h2>
								<p><img src="img/visa.svg" alt="">
                                    <img src="img/master.svg" alt=""></p>
							</div>
						</div>

					</div>
					<div class="col-md-4">
                        <div class="total_order">
                            <div class="block_table_details_order">
                                <h2 class="title_page">إجمالي الطلب</h2>
                                <div class="table-responsive">
                                    <table class="table table_order">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    إجمالي سعر المنتج/المنتجات
                                                </td>
                                                <td>
                                                    998
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    قيمة الكوبون
                                                </td>
                                                <td>
                                                    998
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    السعر الإجمالي
                                                </td>
                                                <td>
                                                    998
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="order_total d-flex align-items-center">
                                <h3>الإجمالي</h3>
                                <p class="mr-auto">499 ر.س</p>
                            </div>
                            <a href="{{ route('cart.checkout2') }}"  class="btn btn-block btn_prim btn-lg">إدفع الآن</a>
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