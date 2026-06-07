<!doctype html>
<html lang="en">

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
                    <li class="breadcrumb-item active" aria-current="page">تفاصيل المنتج</li>
                </ol>
            </div>
        </div>
        <div class="content_innerPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="demo">
                            <ul id="imageGallery">
                                <li data-thumb="{{ asset('img/' . $product->avatar) }}"
                                    data-src="{{ asset('img/' . $product->avatar) }}"
                                    style="width: 470px; margin-left: 10px;">
                                    <img src="{{ asset('img/' . $product->avatar) }}" />
                                    <span class="pro_bThumb_fancy"><i class="far fa-expand-arrows-alt"></i></span>
                                </li>
                                @foreach ($slider as $record)
                                    <li data-thumb="{{ asset('img/' . $record->image) }}"
                                        data-src="{{ asset('img/' . $record->image) }}"
                                        style="width: 470px; margin-left: 10px;">
                                        <img src="{{ asset('img/' . $record->image) }}" />
                                        <span class="pro_bThumb_fancy"><i class="far fa-expand-arrows-alt"></i></span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="details_mproduct">
                            <div class="mcategory_seller">
                                <h3>{{ $product->user->first_name . ' ' . $product->user->last_name}}</h3>
                                <div class="mn_eva">
                                    <p>المبيعات 20 </p>
                                </div>
                                <div class="sn_eva"><span>التقييم</span> <i class="fas fa-star"></i>4.5</div>

                            </div>
                            <div class="mproduct_head">
                                <h2>{{ $product->product_name }}</h2>
                                <div class="mproduct_evaluate">
                                    <div class="sn_eva"><i class="fas fa-star"></i>4.5</div>
                                    <div class="mn_eva">
                                        <p>0 التقييمات</p>
                                        <div class="box_eva">
                                            <form action="#">
                                                <div class="srate rate-input">
                                                    <span class="rating">
                                                        <input type="radio" name="rating" id="star5" value="5">
                                                        <label for="star5"><span class="fas fa-star"></span></label>

                                                        <input type="radio" name="rating" id="star4" value="4">
                                                        <label for="star4"><span class="fas fa-star"></span></label>

                                                        <input type="radio" name="rating" id="star3" value="3" checked>
                                                        <label for="star3"><span class="fas fa-star"></span></label>

                                                        <input type="radio" name="rating" id="star2" value="2">
                                                        <label for="star2"><span class="fas fa-star"></span></label>

                                                        <input type="radio" name="rating" id="star1" value="1">
                                                        <label for="star1"><span class="fas fa-star"></span></label>
                                                    </span>
                                                </div>
                                                <button type="submit" class="btn_submit_evaluate">قيم الآن</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="rw_sale_sku d-flex align-items-center">
                                    <div class="mproduct_sale">
                                        @if ($product->price_after > 0)
                                            <p>{{ $product->price_after }} د.ك</p>
                                            <p class="mold_sale price-item active" data-price="{{ $product->price }}">
                                                {{ $product->price }} د.ك
                                            </p>
                                        @else
                                            <p class="price-item active" data-price="{{ $product->price }}">
                                                {{ $product->price }} د.ك
                                            </p>
                                        @endif
                                    </div>
                                    <div class="mp_sku mr-auto">SKU : {{ $product->sku }}</div>
                                </div>
                                <div class="mproduct_description">
                                    <h3>وصف المنتج :</h3>
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="mproduct_check">
                                    <div class="rw_check_list">
                                        <h3>إختر اللون :</h3>
                                        <div class="list_type_check checks_group">
                                            @foreach ($product->colors as $color)
                                                <div class="itm_check_tp color-item" data-id="{{ $color->id }}">
                                                    <input type="radio" class="radio_sty" name="color_id">
                                                    <div class="label_title_ch ch_color"
                                                        style="width:100%;display: block;text-align: center;">
                                                        {{ $color->name }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="rw_check_list">
                                        <h3>إختر النقش :</h3>
                                        <div class="inscriptions_list checks_group">
                                            @foreach ($product->engravings as $engraving)
                                                <div class="inscriptions_itm engraving-item" data-id="{{ $engraving->id }}">
                                                    <input type="radio" class="radio_sty" name="engraving_id" checked="">
                                                    <div class="inscription_label">
                                                        <img src="{{asset('img/' . $engraving->avatar) }}" alt="">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="rw_check_list">
                                        <h3>إختر الحجم :</h3>
                                        <div class="list_type_check checks_group">
                                            @foreach ($product->sizes as $size)
                                                <div class="itm_check_tp size-item" data-id="{{ $size->id }}">
                                                    <input type="radio" class="radio_sty" name="size_id">
                                                    <div class="label_title_ch ch_size"
                                                        style="width:100%;display: block;text-align: center;">
                                                        {{ $size->name }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mproduct_note">
                                    <h3>ملاحظات مع المنتج</h3>
                                    <div class="form-group">
                                        <textarea class="form-control"
                                            placeholder="أدخل ملاحظاتك الإضافية على المنتج"></textarea>
                                    </div>
                                </div>
                                <div class="mproduct_action">
                                    <div class="quantity_avalible">الكمية المتوفرة :{{ $product->count }}</div>
                                    <div class="m_product_action_list clearfix">
                                        <div class="ac_itm quantity_acp">
                                            <div class="quantity">
                                                <input type="text" name="quantity" value="1" max="{{ $product->count }}"
                                                    class="jsQuantity available-count count-quat">
                                                <div class="btn button-count inc jsQuantityIncrease">
                                                    <i class="far fa-plus"></i>
                                                </div>

                                                <div class="btn button-count dec jsQuantityDecrease">
                                                    <i class="far fa-minus"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ac_itm addCart_acp">
                                            <a href="{{ route('products.cart.store', $product->id) }}"
                                                data-id="{{ $product->id }}" class="btn m_pro_addCart addToCartBtn"><i
                                                    class="fal fa-shopping-cart"></i>أضف لعربة
                                                التسوق</a>
                                        </div>
                                        <div class="grro_xs ac_itm">
                                            <div class="ac_itm add_fav_acp">
                                                <a href="{{ route('product.addFavorites', $product->id) }}"
                                                    class="btn btn_add_fav"><i class="far fa-heart"></i></a>
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
        <div class="cn_related_block pb-0 skin_bg">
            <div class="container">
                <div class="sec_block_products">
                    <div class="head_sec_pro d-flex align-items-center clearfix">
                        <h2 class="title_block_pro">المزيد من التاجر</h2>

                    </div>
                    <div class="sc_warpper">
                        <div class="owl-carousel dots_owl owl_products">
                            @foreach ($products as $record)
                                <div class="item">
                                    <div class="product_item">
                                        <div class="cn_product_thumb">
                                            <a href="{{ route('product.details', $record->id) }}"
                                                class="thumb_pro img-hover">
                                                <img src="{{ asset('img/' . $record->avatar) }}" alt=""
                                                    style="width: 220px;height: 220px;object-fit: cover;">
                                            </a>
                                            <div class="label_pro">50%</div>
                                        </div>
                                        <div class="cn_product_txt">
                                            <h2><a href="#">{{ $record->product_name }}</a></h2>
                                            <div class="seller_info">
                                                <img src="{{asset('img/' . $record->user->image)  }}" alt="...">
                                                <span
                                                    class="seller_name">{{ $record->user->first_name . ' ' . $record->user->last_name}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="pro_evaluate">

                                                    <i class="fas fa-star checked"></i>
                                                    <p class="ev_rate">4.7</p>
                                                </div>
                                                <div class="sale_pro d-flex justify-content-between">
                                                    @if ($record->price_after > 0)
                                                        <div class="sale_old">
                                                            <p><span>{{ $record->price }}</span>ر.س</p>
                                                        </div>
                                                        <div class="sale_new">
                                                            <p><span>{{ $record->price_after }}</span>ر.س</p>
                                                        </div>
                                                    @else
                                                        <div class="sale_new">
                                                            <p><span>{{ $record->price }}</span>ر.س</p>
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
            </div>
            <div class="sec_block_products white">
                <div class="container">
                    <div class="head_sec_pro d-flex align-items-center clearfix">
                        <h2 class="title_block_pro">منتجات ذات صلة</h2>

                    </div>
                    <div class="sc_warpper">
                        <div class="owl-carousel dots_owl owl_products">
                            @foreach ($product->relateds as $record)
                                <div class="item">
                                    <div class="product_item">
                                        <div class="cn_product_thumb">
                                            <a href="{{ route('product.details', $record->id) }}"
                                                class="thumb_pro img-hover">
                                                <img src="{{ asset('img/' . $record->avatar) }}" alt=""
                                                    style="width: 220px;height: 220px;object-fit: cover;">
                                            </a>
                                            <div class="label_pro">50%</div>
                                        </div>
                                        <div class="cn_product_txt">
                                            <h2><a href="#">{{ $record->product_name }}</a></h2>
                                            <div class="seller_info">
                                                <img src="{{asset('img/' . $record->user->image)  }}" alt="...">
                                                <span
                                                    class="seller_name">{{ $record->user->first_name . ' ' . $record->user->last_name}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="pro_evaluate">

                                                    <i class="fas fa-star checked"></i>
                                                    <p class="ev_rate">4.7</p>
                                                </div>
                                                <div class="sale_pro d-flex justify-content-between">
                                                    @if ($record->price_after > 0)
                                                        <div class="sale_old">
                                                            <p><span>{{ $record->price }}</span>ر.س</p>
                                                        </div>
                                                        <div class="sale_new">
                                                            <p><span>{{ $record->price_after }}</span>ر.س</p>
                                                        </div>
                                                    @else
                                                        <div class="sale_new">
                                                            <p><span>{{ $record->price }}</span>ر.س</p>
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
            </div>
        </div>

        <!--Subscribe section start-->
        <div class="subscribe">
            @include('website.partial.sections.subscribe_section')
        </div>
        <footer>
            @include('website.partial.footer')
        </footer>
    </div>

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

        // اختيار اللون
        $(document).on('click', '.color-item', function () {

            $('.color-item').removeClass('active');

            $(this).addClass('active');

        });


        // اختيار الحجم
        $(document).on('click', '.size-item', function () {

            $('.size-item').removeClass('active');

            $(this).addClass('active');

        });


        // اختيار النقش
        $(document).on('click', '.engraving-item', function () {

            $('.engraving-item').removeClass('active');

            $(this).addClass('active');

        });



        // زر اضافة للسلة
        $(document).on('click', '.addToCartBtn', function (e) {

            e.preventDefault();
            let product_id = $(this).data('id');
            let color_id = $('.color-item.active').data('id');
            let size_id = $('.size-item.active').data('id');
            let engraving_id = $('.engraving-item.active').data('id');
            let price = $('.price-item.active').data('price');
            let quantity = $(this).closest('.mproduct_action').find('.jsQuantity').val();


            let url =
                '/cart/add/' + product_id +
                '?color_id=' + color_id +
                '&size_id=' + size_id +
                '&engraving_id=' + engraving_id +
                '&price=' + price +
                '&quantity=' + quantity;


            window.location.href = url;

        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                keyPress: true,
                rtl: true,
                auto: true,
                speed: 1000,
                pause: 4000,
                thumbItem: 6,
                slideMargin: 10,
                galleryMargin: -72,
                thumbMargin: 10,
                enableDrag: false,
                currentPagerPosition: 'middle',
                onSliderLoad: function (el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>
    <script>
        $(document).off('click', '.jsQuantityIncrease');
        $(document).off('click', '.jsQuantityDecrease');
        $(document).on('click', '.jsQuantityIncrease', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            let input = $(this).closest('.quantity').find('.jsQuantity');

            let current = parseInt(input.val()) || 1;
            let max = parseInt(input.attr('max')) || 20;

            if (current < max) {
                input.val(current + 1);
            } else {
                input.val(max);
            }
        });
        $(document).on('click', '.jsQuantityDecrease', function (e) {

            e.preventDefault();
            e.stopImmediatePropagation();

            let input = $(this).closest('.quantity').find('.jsQuantity');

            let current = parseInt(input.val()) || 1;

            let min = 1;

            if (current > min) {
                input.val(current - 1);
            } else {
                input.val(min);
            }

        });
    </script>
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