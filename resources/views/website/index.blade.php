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
        .dropdown_profile li a {
            display: flex;
            align-items: center;
            gap: 10px;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div id="spinner">
            <div class="floating">
                <img src="img/logo.png" alt="إيدي ستور" class="img-responsive">
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
        <div class="sec_block_content_home">
            <div class="sec_block_home wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.1s">
                @include('website.partial.sections.home_section')
                <div class="sec_services">
                    @include('website.partial.sections.features_section')
                </div>
                @foreach($categories as $category)
                    @if($category->products->count() > 0)
                        <div class="sec_block_products">
                            <div class="container">
                                <div class="head_sec_pro d-flex align-items-center clearfix wow fadeInUp"
                                    data-wow-duration="1000ms" data-wow-delay="0.1s">
                                    <h2 class="title_block_pro">{{ $category->category_name }}</h2>
                                </div>
                                <div class="sc_warpper wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.2s">
                                    <div class="owl-carousel dots_owl owl_products">
                                        @foreach($category->products as $record)
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
                                                                class="seller_name">{{ $record->user->first_name . ' ' . $record->user->first_name}}</span>
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
                    @endif
                @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="special_products">
            @include('website.partial.sections.special_products_section')
        </div>
        <div class="sec_statistic">
            @include('website.partial.sections.statistic_section')
        </div>

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
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>