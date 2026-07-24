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
                    <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb_title }}</li>
                </ol>
            </div>
        </div>
        <div class="content_innerPage">
            <div class="container">
                <div class="cart_empty_block cart">
                    <img src="{{ asset('img/bag.svg') }}" alt="bag">
                    <p>عذرا، لا يوجد منتجات في عربة التسوق</p>
                    <a href="{{ route('index') }}" class="btn m_pro_addCart"><i class="fal fa-shopping-cart"></i>تسوق
                        الآن</a>
                </div>
            </div>
        </div>
        <!--Subscribe section start-->
        <div class="subscribe">
            @include('website.partial.sections.subscribe_section')
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
                    <a href="{{ route('cart.checkout') }}" type="submit" class="btn btn_prim btn_dt">إتمام الطلب
                        كزائر</a>
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
                                    <a href="#forget_password" data-toggle="modal" class="forget_password">هل نسيت
                                        كلمة
                                        المرور؟</a>
                                </div>
                            </div>
                            <div class="password_input">
                                <input type="password" class="form-control pwd" placeholder="كلمة المرور">
                                <span class="fr_icon show_pass"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <a href="{{ route('cart.checkout') }}" type="submit" class="btn btn_main btn_dt">متابعة</a>
                        <a href="{{ route('signup') }}" type="submit" class="btn btn_main_prim btn_dt">تسجيل حساب
                            جديد</a>
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
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/lightslider.min.js') }}"></script>
    <script src="{{ asset('js/lightgallery.js') }}"></script>
    <script src="{{ asset('js/lg-thumbnail.min.js') }}"></script>
    <script src="{{ asset('js/lg-fullscreen.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(document).ready(function () {

            $(document).off('click', '.jsQuantityIncrease');
            $(document).off('click', '.jsQuantityDecrease');

            function updateQuantityAjax(id, quantity) {
                $.ajax({
                    url: "{{ route('cart.updateQuantity') }}",
                    type: "POST",
                    data: {
                        id: id,
                        quantity: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        console.log('تم تحديث الكمية:', response);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('حدث خطأ أثناء تحديث الكمية');
                    }
                });
            }

            function getNumber(value) {
                value = value.toString()
                    .replace('ر.س', '')
                    .replace('%', '')
                    .replace(',', '')
                    .trim();

                return parseFloat(value) || 0;
            }

            function updateStoreTotal(storeBox) {
                let storeTotal = 0;

                storeBox.find('.total-price').each(function () {
                    storeTotal += getNumber($(this).text());
                });

                let couponPercent = getNumber(storeBox.find('.coupon-value').text());

                let discountValue = (storeTotal * couponPercent) / 100;
                let finalTotal = storeTotal - discountValue;

                if (finalTotal < 0) {
                    finalTotal = 0;
                }

                storeBox.find('.store-subtotal').html(storeTotal.toFixed(2));
                storeBox.find('.checkout-total').html(finalTotal.toFixed(2) + ' <span>ر.س</span>');
            }

            $(document).on('click', '.jsQuantityIncrease', function () {
                let quantityBox = $(this).closest('.quantity');
                let row = $(this).closest('tr');
                let storeBox = $(this).closest('.store-box');

                let id = quantityBox.data('id');

                let input = quantityBox.find('.jsQuantity');
                let quantity = parseInt(input.val()) || 1;

                quantity++;

                input.val(quantity);

                quantityBox.find('.jsQuantityDecrease').removeClass('disabled');

                let price = getNumber(row.find('.product-price').text());
                let total = price * quantity;

                row.find('.total-price').html(total.toFixed(2) + ' <span>ر.س</span>');

                updateStoreTotal(storeBox);

                updateQuantityAjax(id, quantity);
            });

            $(document).on('click', '.jsQuantityDecrease', function () {
                let quantityBox = $(this).closest('.quantity');
                let row = $(this).closest('tr');
                let storeBox = $(this).closest('.store-box');

                let id = quantityBox.data('id');

                let input = quantityBox.find('.jsQuantity');
                let quantity = parseInt(input.val()) || 1;

                if (quantity <= 1) {
                    $(this).addClass('disabled');
                    return;
                }

                quantity--;

                input.val(quantity);

                if (quantity <= 1) {
                    $(this).addClass('disabled');
                }

                let price = getNumber(row.find('.product-price').text());
                let total = price * quantity;

                row.find('.total-price').html(total.toFixed(2) + ' <span>ر.س</span>');

                updateStoreTotal(storeBox);

                updateQuantityAjax(id, quantity);
            });

        });
    </script>
    <script>
        $(document).off('click', '.jsQuantityIncrease');
        $(document).off('click', '.jsQuantityDecrease');

        function getNumber(value) {
            value = value.toString();

            value = value
                .replace('ر.س', '')
                .replace('%', '')
                .replace(',', '')
                .trim();

            return parseFloat(value) || 0;
        }

        function updateStoreTotal(storeBox) {
            let storeTotal = 0;

            // جمع إجمالي المنتجات داخل نفس المتجر فقط
            storeBox.find('.total-price').each(function () {
                let itemTotal = getNumber($(this).text());
                storeTotal += itemTotal;
            });

            // جلب نسبة الكوبون
            let couponPercent = getNumber(storeBox.find('.coupon-value').text());

            // حساب قيمة الخصم
            let discountValue = (storeTotal * couponPercent) / 100;

            // الإجمالي بعد الخصم
            let finalTotal = storeTotal - discountValue;

            if (finalTotal < 0) {
                finalTotal = 0;
            }

            // عرض السعر قبل الخصم
            storeBox.find('.store-subtotal').html(storeTotal.toFixed(2));

            // عرض الإجمالي النهائي بعد الخصم
            storeBox.find('.checkout-total').html(finalTotal.toFixed(2) + ' <span>ر.س</span>');
        }

        $(document).on('click', '.jsQuantityIncrease', function () {
            let row = $(this).closest('tr');
            let storeBox = $(this).closest('.store-box');

            let input = row.find('.jsQuantity');
            let quantity = parseInt(input.val()) || 1;

            let price = getNumber(row.find('.product-price').text());

            quantity++;

            input.val(quantity);

            let total = quantity * price;

            row.find('.total-price').html(total.toFixed(2) + ' <span>ر.س</span>');

            updateStoreTotal(storeBox);
        });

        $(document).on('click', '.jsQuantityDecrease', function () {
            let row = $(this).closest('tr');
            let storeBox = $(this).closest('.store-box');

            let input = row.find('.jsQuantity');
            let quantity = parseInt(input.val()) || 1;

            let price = getNumber(row.find('.product-price').text());

            if (quantity > 1) {
                quantity--;
            }

            input.val(quantity);

            let total = quantity * price;

            row.find('.total-price').html(total.toFixed(2) + ' <span>ر.س</span>');

            updateStoreTotal(storeBox);
        });

        // عند فتح الصفحة يحسب الإجمالي لكل متجر مباشرة
        $(document).ready(function () {
            $('.store-box').each(function () {
                updateStoreTotal($(this));
            });
        });
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "حسناً"
            });
        @endif

        @if (session('error'))
            Swal.fire({
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "حسناً"
            });
        @endif
    </script>
</body>

</html>