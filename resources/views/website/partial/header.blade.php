<div class="msg_header">
    <div class="container">
        <p class="msg_top">اطلب من الصين الى الكويت بجودة عالية وأسعار خيالية</p>
    </div>
</div>
<div class="middle_header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo_site">
                <a href="{{ route('index') }}"><img src="{{asset('img/logo.png')}}" alt="إيدي ستور"></a>
            </div>
            <div class="haeder_widget">
                <div class="search_head">
                    <form class="form_search_head" action="#">
                        <input type="text" class="form-control" placeholder="ابحث هنا عن المنتج أو التاجر">
                        <span class="search_icon"><i class="far fa-search"></i></span>
                        <div class="itm_us search_drop dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span>التصنيف</span>
                            </a>
                            <ul class="dropdown-menu dropdown_profile cat">
                                @foreach ($categories as $category)
                                    <li><a href="#">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="clearfix">
                    <div class="user_action_head clearfix">
                        <div class="itm_us gru_search">
                            <div class="header_search-button"></div>
                        </div>
                        <div class="itm_us fav dropdown notifications_list">
                            <a href="#" class="btn_user_profile " data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="{{asset('img/noti_icon.svg')}}" alt="notifications">
                                <span class="budge_cart">2</span>
                            </a>
                            <ul class="dropdown-menu dropdown_profile">
                                <li>
                                    <div class="single_noti">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="noti_icon">
                                                    <img src="{{asset('img/noti.svg')}}" alt="..">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="noti_content">
                                                    <h5><span>طلب جديد ,</span> هناك حقيقة مثبتة منذ زمن طويل
                                                        وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز
                                                        على الشكل الخارجي للنص</h5>
                                                    <span><img src="{{asset('img/noti3.svg')}}" alt=""> 12/21/2020
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single_noti">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="noti_icon">
                                                    <img src="{{asset('img/noti2.svg')}}" alt="..">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="noti_content">
                                                    <h5><span>رسالة من الإدارة ,</span> هناك حقيقة مثبتة منذ زمن
                                                        طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن
                                                        التركيز على الشكل الخارجي للنص</h5>
                                                    <span><img src="{{asset('img/noti3.svg')}}" alt=""> 12/21/2020
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <a href="notifications.html">شاهد كل الاشعارات</a>
                            </ul>
                        </div>

                        @if(isset(auth()->user()->first_name))
                            <div class="itm_us gru_cart">
                                <a href="{{ route('products.cart', auth()->user()->id) }}" class="btn_cart">
                                    <img src="{{asset('img/cart.svg')}}" alt="السلة">
                                    <span class="budge_cart">{{ $cart_user }}</span>
                                </a>
                            </div>
                        @else
                            <div class="itm_us gru_cart">
                                <a href="#" class="btn_cart">
                                    <img src="{{asset('img/cart.svg')}}" alt="السلة">
                                    <span class="budge_cart">7</span>
                                </a>
                            </div>
                        @endif
                        @if(isset(auth()->user()->first_name))
                            <div class="itm_us gru_cart">
                                <a href="{{ route('products.favorites', auth()->user()->id) }}" class="btn_cart">
                                    <i class="far fa-heart"></i>
                                    <span class="budge_cart">{{ $fav->count() }}</span>
                                </a>
                            </div>
                        @else
                            <div class="itm_us gru_cart">
                                <a href="#" class="btn_cart">
                                    <i class="far fa-heart"></i>
                                    <span class="budge_cart">3</span>
                                </a>
                            </div>
                        @endif
                        <div class="itm_us gru_profile_mobile dropdown">
                            <a href="#" class="btn_user_profile dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('img/feather-user.svg')}}" alt="بروفايل">
                                <span>الملف الشخصي</span>
                            </a>
                            <ul class="dropdown-menu dropdown_profile">
                                @if(isset(auth()->user()->first_name))
                                    <li><a href="{{route('account.index')}}"><i class="fas fa-clipboard-list"></i>المعلومات
                                            الشخصية</a>
                                    <li><a href="orders.html"><i class="fas fa-clipboard-list"></i>قائمة الطلبات</a>
                                @else
                                        <li><a href="login.html"><i class="far fa-sign-in"></i>تسجيل دخول</a></li>
                                        <li><a href="{{route('signup')}}" target="_blank"><i class="fas fa-user"></i>حساب
                                                جديد</a></li>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="itm_us gru_profile dropdown">
                            <a href="#" class="btn_user_profile dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="profile-avatar-wrap">
                                    <img src="{{ isset($record->image) ? asset('img/' . $record->image) : asset('img/profilePicture.svg') }}"
                                        alt="بروفايل" class="profile-avatar">
                                </div>
                                <div class="gru_profile_sec">
                                    <h6>
                                        @if(isset(auth()->user()->first_name))
                                            {{auth()->user()->first_name}} {{auth()->user()->last_name}}
                                        @else
                                            اسم المستخدم
                                        @endif

                                    </h6>
                                    <span>
                                        @if(isset(auth()->user()->email))
                                            {{auth()->user()->email}}
                                        @else
                                            email.com
                                        @endif

                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown_profile">
                                @if(isset(auth()->user()->first_name))
                                    <li>
                                        <a href="{{route('account.index')}}"><i class="fas fa-clipboard-list"></i>المعلومات
                                            الشخصية</a>
                                    </li>
                                    @if (auth()->user()->role->name == 'تاجر')
                                        <li>
                                            <a href="{{route('merchant.Dashboard.index')}}" target="_blank"><i
                                                    class="far fa-sign-in"></i>الدخول الى لوحة التاجر
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="orders.html"><i class="fas fa-clipboard-list"></i>قائمة الطلبات</a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout.post')}}"><i class="fas fa-clipboard-list"></i>تسجيل
                                            خروج</a>
                                    </li>
                                @else
                                    <li><a href="{{route('website.login')}}" target="_blank"><i
                                                class="far fa-sign-in"></i>تسجيل دخول</a></li>
                                    <li><a href="{{route('signup')}}" target="_blank"><i class="fas fa-user"></i>حساب
                                            جديد</a></li>
                                @endif


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="msg_header2">
    <div class="container">
        <p class="msg_top">التوصيل مجاني يبدأ من 199 ريال وسيصلك من 3 الى 7 أيام عمل</p>
    </div>
</div>