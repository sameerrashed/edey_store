<div class="container">
    <div class="row">
        <div class="col-md-3 col-6">
            <div class="services_box">
                <div class="serv_icon">
                    <img src="img/users.svg" alt="..">
                </div>
                <div class="serv_name">
                    <h3>{{ $all_users->count() }}</h3>
                </div>
                <div class="serv_desc">
                    <p>
                        مستخدم سعيد
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="services_box">
                <div class="serv_icon">
                    <img src="img/productx.svg" alt="..">
                </div>
                <div class="serv_name">
                    <h3>{{ $products->count() }}</h3>
                </div>
                <div class="serv_desc">
                    <p>
                        منتج
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="services_box">
                <div class="serv_icon">
                    <img src="img/seller_icon.svg" alt="..">
                </div>
                <div class="serv_name">
                    <h3>{{ $all_merchants->count() }}</h3>
                </div>
                <div class="serv_desc">
                    <p>
                        تاجر نشط
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="services_box">
                <div class="serv_icon">
                    <img src="img/cat.svg" alt="..">
                </div>
                <div class="serv_name">
                    <h3>{{ $all_categories->count() }}</h3>
                </div>
                <div class="serv_desc">
                    <p>
                        تصنيفات مميزة
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>