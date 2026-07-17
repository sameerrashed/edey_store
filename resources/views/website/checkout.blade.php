<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <title>إيدي ستور</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                <div class="block_cn_pay">
                    <form class="form_st1" action="{{ route('cart.checkout1') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">البريد الالكتروني</label>
                                    <input name="email" type="email" class="form-control " required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">تأكيد البريد الالكتروني</label>
                                    <input type="email" class="form-control " required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">الاسم كاملاً</label>
                                    <input name="full_name" type="text" class="form-control"
                                        placeholder="اسم صاحب الحساب" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">الدولة</label>
                                    <select name="country_id" id="country_id" class="form-control js-select "
                                        data-placeholder="المملكة العربية السعودية" required>
                                        <option>اختر الدولة</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">المحافظة</label>
                                    <select name="province_id" id="province_id" class="form-control js-select "
                                        data-placeholder="اختر المحافظة" required>
                                        <option value="">اختر الدولة أولاً</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="fr_label">المدينة</label>
                                    <select name="city_id" id="city_id" class="form-control js-select "
                                        data-placeholder="اسم المدينة" required>
                                        <option value="">اختر الدولة أولاً</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="fr_label">عنوان الشارع</label>
                                    <input name='street_address' type="text" class="form-control"
                                        placeholder="عنوان الشارع" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <input type="submit" class="btn btn-block btn_prim" value="تابع للدفع">
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
                        <p>جميع الحقوق محفوظة لمتجر إيدي © 2026</p>
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

    <script>
        $(document).ready(function () {

            $('#country_id').on('change', function () {

                let countryId = $(this).val();

                let provinceSelect = $('#province_id');
                let citySelect = $('#city_id');

                provinceSelect
                    .empty()
                    .append('<option value="">جاري تحميل المحافظات...</option>')
                    .prop('disabled', true)
                    .trigger('change');

                citySelect
                    .empty()
                    .append('<option value="">جاري تحميل المدن...</option>')
                    .prop('disabled', true)
                    .trigger('change');

                if (!countryId) {
                    provinceSelect
                        .empty()
                        .append('<option value="">اختر الدولة أولاً</option>')
                        .prop('disabled', true)
                        .trigger('change');

                    citySelect
                        .empty()
                        .append('<option value="">اختر الدولة أولاً</option>')
                        .prop('disabled', true)
                        .trigger('change');

                    return;
                }

                $.ajax({
                    url: "{{ url('/locations') }}/" + countryId,
                    type: "GET",
                    dataType: "json",

                    success: function (response) {

                        provinceSelect
                            .empty()
                            .append('<option value="">اختر المحافظة</option>');

                        if (response.provinces.length > 0) {
                            $.each(response.provinces, function (index, province) {
                                provinceSelect.append(
                                    '<option value="' + province.id + '">' +
                                    province.name +
                                    '</option>'
                                );
                            });

                            provinceSelect.prop('disabled', false);
                        } else {
                            provinceSelect.append(
                                '<option value="">لا توجد محافظات لهذه الدولة</option>'
                            );
                        }

                        citySelect
                            .empty()
                            .append('<option value="">اختر المدينة</option>');

                        if (response.cities.length > 0) {
                            $.each(response.cities, function (index, city) {
                                citySelect.append(
                                    '<option value="' + city.id + '">' +
                                    city.name +
                                    '</option>'
                                );
                            });

                            citySelect.prop('disabled', false);
                        } else {
                            citySelect.append(
                                '<option value="">لا توجد مدن لهذه الدولة</option>'
                            );
                        }

                        provinceSelect.trigger('change');
                        citySelect.trigger('change');
                    },

                    error: function () {
                        provinceSelect
                            .empty()
                            .append('<option value="">حدث خطأ أثناء تحميل المحافظات</option>')
                            .prop('disabled', true)
                            .trigger('change');

                        citySelect
                            .empty()
                            .append('<option value="">حدث خطأ أثناء تحميل المدن</option>')
                            .prop('disabled', true)
                            .trigger('change');
                    }
                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>