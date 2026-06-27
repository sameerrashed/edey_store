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
                @foreach ($groupedProducts as $storeId => $products)
                                <div class="store-box">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="seller_head">
                                                <div class="seller_img">
                                                    <img src="{{ asset('img/' . $products->first()->product->user->image) }}"
                                                        alt="seller_img">
                                                </div>
                                                <div class="mcategory_seller">
                                                    <h3> التاجر : {{ $products->first()->product->user->first_name }} /
                                                        المتجر : {{ $products->first()->product->user->store->name }}</h3>
                                                    <div class="mn_eva">
                                                        <p>المبيعات 20 </p>
                                                    </div>
                                                    <div class="sn_eva"><span>التقييم</span> <i class="fas fa-star"></i>4.5</div>

                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table_st1">
                                                    <thead class="hide_xs">
                                                        <tr>
                                                            <th>المنتج</th>
                                                            <th>السعر</th>
                                                            <th>الكمية</th>
                                                            <th class="c-b">الإجمالي</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach ($products as $record)
                                                            <tr>
                                                                <td>
                                                                    <div class="tb_product clearfix">
                                                                        <a href="{{ route('product.details', $record->product->id) }}"
                                                                            class="ppt_thumb">
                                                                            <img src="{{ asset('img/' . $record->product->avatar) }}"
                                                                                alt="صورة المنتج">
                                                                        </a>
                                                                        <div class="tb_txt">
                                                                            <h2><a
                                                                                    href="{{ route('product.details', $record->product->id) }}">{{ $record->product->product_name }}</a>
                                                                            </h2>
                                                                            <div class="tb_sale hid_lg">
                                                                                {{ $record->product->price }}<span>ر.س</span>
                                                                            </div>
                                                                            <button
                                                                                onclick="window.location.href='{{ route('products.favorites.delete', $record->id) }}'"
                                                                                class="btn_tb_remove"><i
                                                                                    class="fal fa-times"></i>إزالة</button>
                                                                        </div>

                                                                    </div>
                                                                    <div class="hid_lg">
                                                                        <div class="quantity_remove_mo">
                                                                            <div class="quantity" data-id="{{ $record->id }}">
                                                                                <input type="text" name="quantity"
                                                                                    value="{{ $record->quantity }}"
                                                                                    class="jsQuantity count-quat">
                                                                                <div class="btn button-count inc jsQuantityIncrease">
                                                                                    <i class="far fa-plus"></i>
                                                                                </div>
                                                                                <div
                                                                                    class="btn button-count dec jsQuantityDecrease disabled">
                                                                                    <i class="far fa-minus"></i>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn_tb_remove"><i
                                                                                    class="fal fa-times"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="hide_xs">

                                                                    <div class="tb_sale">

                                                                        <span class="product-price">
                                                                            {{ $record->product->price }}
                                                                        </span>

                                                                        <span>ر.س</span>

                                                                    </div>

                                                                </td>

                                                                <td class="hide_xs">

                                                                    <div class="quantity" data-id="{{ $record->id }}">

                                                                        <input type="text" value="{{ $record->quantity }}"
                                                                            class="jsQuantity count-quat">

                                                                        <div class="btn button-count inc jsQuantityIncrease">
                                                                            <i class="far fa-plus"></i>
                                                                        </div>

                                                                        <div class="btn button-count dec jsQuantityDecrease">
                                                                            <i class="far fa-minus"></i>
                                                                        </div>

                                                                    </div>

                                                                </td>

                                                                <td class="hide_xs">

                                                                    <div class="c-b total-price">
                                                                        {{ $record->quantity * $record->product->price }}
                                                                        <span>ر.س</span>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <form class="form_copon" id="copon_form" action="{{ route('products.cart', auth()->id()) }}"
                                                method="get" enctype="multipart/form-data">
                                                @csrf
                                                <input type="text" name="copon_code" class="form-control" placeholder="كود الخصم">
                                                <input type="number" name="store_id"
                                                    value="{{ $products->first()->product->user->store->id }}" class="form-control"
                                                    hidden>
                                                <input type="submit" value="تأكيد" class="btn btn_copon">
                                            </form>
                                            <div class="box_bill">
                                                <label class="fr_label">اختر طريقة الدفع</label>
                                                <div class="row">
                                                    @foreach($products->first()->product->user->store->paymentMethods ?? [] as $paymentMethod)
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="box_check_itm">

                                                                    <input type="radio" class="radio_st store_check"
                                                                        name="payment_method_id{{ $products->first()->product->user->store->id }}"
                                                                        value="{{ $paymentMethod->id }}" @if($loop->first) checked @endif>

                                                                    <div class="box_check_itm_cn clearfix">
                                                                        <div class="icon_check">
                                                                            <img src="{{ asset('img/' . $paymentMethod->image) }}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="bill_details">
                                                    <div class="itm_rw_bill d-flex align-items-center">
                                                        <h3>السعر</h3>
                                                        <p class="mr-auto store-subtotal">
                                                            {{ $products->sum(function ($item) {
                        return $item->quantity * $item->product->price;
                    }) }}
                                                        </p>
                                                    </div>
                                                    <div class="itm_rw_bill d-flex align-items-center">
                                                        <h3>قيمة الكوبون</h3>
                                                        <p class="mr-auto">
                                                            @if ($products->first()->product->user->store->id == session('store_id'))
                                                                @if (session('discount_percentage'))
                                                                    <p class="coupon-value">{{ session('discount_percentage') }}%</p>
                                                                @endif
                                                            @else
                                                            <p>0%</p>
                                                        @endif

                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="bill_ft">

                                                    <div class="total_rw_bill d-flex align-items-center">

                                                        <h3>الإجمالي</h3>

                                                        <p class="mr-auto checkout-total">
                                                            {{ $products->sum(function ($item) {
                        return $item->quantity * $item->product->price;
                    }) }}
                                                            <span>ر.س</span>
                                                        </p>

                                                    </div>

                                                </div>
                                                <a href="#login" data-toggle="modal" class="btn btn-block btn_prim btn-lg">إدفع
                                                    الآن</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                @endforeach
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
                    <a href="{{ route('cart.checkout') }}" type="submit" class="btn btn_prim btn_dt">إتمام الطلب كزائر</a>
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
                        <a href="{{ route('signup') }}" type="submit" class="btn btn_main_prim btn_dt">تسجيل حساب جديد</a>
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