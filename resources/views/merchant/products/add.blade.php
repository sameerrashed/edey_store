@extends("merchant.layout._layout")
@section('title', 'ايدي ستور')
@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{__('app.' . $parent_title)}}</h1>
    <!--end::Title-->
    <!--begin::Separator-->
    <span class="h-20px border-gray-300 border-start mx-4"></span>
    <!--end::Separator-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{route('admin.Dashboard.index')}}" class="text-muted text-hover-primary">{{__('app.Dashboard')}}</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">{{__('app.' . $parent_title)}}</li>

        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-dark">{{__('app.' . $title)}}</li>
    </ul>
@endsection
@section("body")

    <div class="row g-7">

        <div class="col-xl-12">
            <!--begin::Contacts-->
            <div class="card card-flush h-lg-100" id="kt_contacts_main">
                <!--begin::Card header-->
                <div class="card-header pt-7" id="kt_chat_contacts_header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                        <span class="svg-icon svg-icon-1 me-2">
                            {!! file_get_contents(public_path('img/Products.svg')) !!}
                        </span>
                        <h2>إضافة منتج جديد</h2>
                    </div>
                </div>
                <div class="card-body pt-5">
                    <form id="kt_ecommerce_settings_general_form" class="form"
                        action="{{ route('merchant.Products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-7">
                            <label class="fs-6 fw-bold mb-3">
                                <span class="required">إضافة صورة غلاف</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="الإمتدادات المسموح بها: png, jpg, jpeg."></i>
                            </label>
                            <div class="mt-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <div class="image-input-wrapper w-100px h-100px"
                                        style="background-image: url('assets/media/svg/avatars/blank.svg')"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="إضافة صورة">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="avatar" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="إلغاء الصورة">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="إلغاء الصورة">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-7">
                            <label class="fs-6 fw-bold mb-3">
                                <span>صور إضافية للمنتج</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="الإمتدادات المسموح بها: png, jpg, jpeg."></i>
                            </label>
                            <div class="mt-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <div class="image-input-wrapper w-100px h-100px"
                                        style="background-image: url('assets/media/svg/avatars/blank.svg')"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="إضافة صورة">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="image[]" accept=".png, .jpg, .jpeg" multiple />
                                        <input type="hidden" name="image_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="إلغاء الصورة">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">إسم المنتج</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="إختر إسم للمنتج."></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="product_name"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span>التصنييف</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="إختر تصنيف للمنتج."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="w-100">
                                            <div class="form-floating border rounded">
                                                <!--begin::Select2-->
                                                <select id="category_select" class="form-select form-select-solid lh-1 py-3"
                                                    name="category[]" data-kt-ecommerce-settings-type="select2_flags"
                                                    data-placeholder="إختر تصنييف" multiple>
                                                    <option></option>
                                                    @foreach ($categories as $record)
                                                        <option value="{{ $record->id }}"
                                                            data-image="{{ asset('img/' . $record->photo_cover) }}">
                                                            {{ $record->category_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <!--end::Select2-->
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>اللون</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="إختر لون للمنتج."></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="w-100">
                                        <div class="form-floating border rounded">
                                            <!--begin::Select2-->
                                            <select id="color_select" class="form-select form-select-solid lh-1 py-3"
                                                name="color_id[]" data-kt-ecommerce-settings-type="select2_flags"
                                                data-placeholder="إختر اللون" multiple>
                                                <option></option>
                                                @foreach ($colors as $record)
                                                    <option value="{{ $record->id }}" data-color="{{ $record->color }}">
                                                        {{ $record->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!--end::Select2-->
                                        </div>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>الحجم</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="إختر حجم للمنتج."></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::Select2-->
                                        <select id="size_select" class="form-select form-select-solid lh-1 py-3"
                                            name="size_id[]" data-kt-ecommerce-settings-type="select2_flags"
                                            data-placeholder="إختر الحجم" multiple>
                                            <option></option>
                                            @foreach ($sizes as $record)
                                                <option value="{{ $record->id }}" data-category="{{ $record->category_id }}">
                                                    {{ $record->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>النقش</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="إختر نقش للمنتج."></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="w-100">
                                        <div class="form-floating border rounded">
                                            <!--begin::Select2-->
                                            <select id="engraving_select" class="form-select form-select-solid lh-1 py-3"
                                                name="engraving_id[]" data-kt-ecommerce-settings-type="select2_flags"
                                                data-placeholder="إختر النقش" multiple>
                                                <option></option>
                                                @foreach ($engravings as $record)
                                                    <option value="{{ $record->id }}"
                                                        data-image="{{ asset('img/' . $record->avatar) }}">
                                                        {{ $record->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!--end::Select2-->
                                        </div>
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>

                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">الكمية المتاحة
                                        </span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="أكتب الكمية المتوفرة من المنتج."></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" name="count" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->

                            <!--end::Col-->
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span>وصف المنتج</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="أضف وصف للمنتج (اختياري)."></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="description"
                                        value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold form-label mt-3">
                                        <span class="required">سعر المنتج</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="number" class="form-control form-control-solid" name="price" required />
                                </div>

                                <div class="form-check form-check-solid mb-5">
                                    <input class="form-check-input" type="checkbox" id="has_discount">

                                    <label class="form-check-label" for="has_discount">
                                        يوجد سعر بعد الخصم
                                    </label>
                                </div>

                                <!-- حقل السعر بعد الخصم -->
                                <div id="discount_price_box" style="display:none;">

                                    <div class="fv-row mb-7">

                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span>السعر بعد الخصم</span>
                                        </label>

                                        <input type="number" class="form-control form-control-solid" name="price_after">

                                    </div>

                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold form-label mt-3">
                                    <span>منتجات ذات صلة</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="إختر المنتجات."></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="w-100">
                                    <div class="form-floating border rounded">
                                        <!--begin::Select2-->
                                        <select id="product_select" class="form-select form-select-solid lh-1 py-3"
                                            name="related_id[]" data-kt-ecommerce-settings-type="select2_flags"
                                            data-placeholder="إختر المنتجات" multiple>
                                            <option></option>
                                            @foreach ($products as $record)
                                                <option value="{{ $record->id }}"
                                                    data-image="{{ asset('img/' . $record->avatar) }}">
                                                    {{ $record->product_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!--end::Select2-->
                                    </div>
                                </div>
                                <!--end::Input-->
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator mb-6"></div>
                        <!--end::Separator-->
                        <!--begin::Action buttons-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">إلغاء</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                <span class="indicator-label">تأكيد</span>
                                <span class="indicator-progress">يرجى الإنتظار...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Action buttons-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Contacts-->
        </div>
        <!--end::Content-->
    </div>
@endsection
@section('script')
    <script>

        $('#has_discount').change(function () {

            if ($(this).is(':checked')) {

                $('#discount_price_box').slideDown();

            } else {

                $('#discount_price_box').slideUp();

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
    <script>

        $('#color_select').select2({

            templateResult: formatColor,
            templateSelection: formatColor,

        });

        function formatColor(color) {

            if (!color.id) {
                return color.text;
            }

            let colorCode = $(color.element).data('color');

            return $(`
                                                                                                                                                                                                                                                                                                                <span style="display:flex;align-items:center;gap:10px;">

                                                                                                                                                                                                                                                                                                                    <span style="
                                                                                                                                                                                                                                                                                                                        width:18px;
                                                                                                                                                                                                                                                                                                                        height:18px;
                                                                                                                                                                                                                                                                                                                        border-radius:50%;
                                                                                                                                                                                                                                                                                                                        background:${colorCode};
                                                                                                                                                                                                                                                                                                                        border:1px solid #ccc;
                                                                                                                                                                                                                                                                                                                        display:inline-block;
                                                                                                                                                                                                                                                                                                                    "></span>

                                                                                                                                                                                                                                                                                                                    <span>${color.text}</span>

                                                                                                                                                                                                                                                                                                                </span>
                                                                                                                                                                                                                                                                                                            `);
        }

        $('#size_select').select2({

            templateResult: formatSize,
            templateSelection: formatSize,

            escapeMarkup: function (markup) {
                return markup;
            }

        });

        function formatSize(size) {

            if (!size.id) {
                return size.text;
            }

            return `
                                                                                                                                                                                                                <div style="
                                                                                                                                                                                                                    display:flex;
                                                                                                                                                                                                                    align-items:center;
                                                                                                                                                                                                                    justify-content:center;
                                                                                                                                                                                                                    font-weight:600;
                                                                                                                                                                                                                    padding:5px;
                                                                                                                                                                                                                ">
                                                                                                                                                                                                                    ${size.text}
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            `;
        }



        $('#category_select').select2({

            templateResult: formatCategory,
            templateSelection: formatCategory,

            escapeMarkup: function (markup) {
                return markup;
            }

        });

        function formatCategory(category) {

            if (!category.id) {
                return category.text;
            }

            let image = $(category.element).data('image');

            return `
                                                                                                                                                                    <div style="
                                                                                                                                                                        display:flex;
                                                                                                                                                                        align-items:center;
                                                                                                                                                                        gap:10px;
                                                                                                                                                                    ">

                                                                                                                                                                        <img src="${image}"
                                                                                                                                                                             style="
                                                                                                                                                                                width:35px;
                                                                                                                                                                                height:35px;
                                                                                                                                                                                border-radius:8px;
                                                                                                                                                                                object-fit:cover;
                                                                                                                                                                             ">

                                                                                                                                                                        <span>${category.text}</span>

                                                                                                                                                                    </div>
                                                                                                                                                                `;
        }

        $(document).ready(function () {

            $('#engraving_select').select2({

                templateResult: formatState,
                templateSelection: formatState

            });

            function formatState(state) {

                if (!state.id) {
                    return state.text;
                }

                let image = $(state.element).data('image');

                return $(`
                                                                                                                                                                                                                                                                                                                                                                    <span class="d-flex align-items-center gap-3 py-2">

                                                                                                                                                                                                                                                                                                                                                                        <img 
                                                                                                                                                                                                                                                                                                                                                                            src="${image}" 
                                                                                                                                                                                                                                                                                                                                                                            width="30" 
                                                                                                                                                                                                                                                                                                                                                                            height="30"
                                                                                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                                                                                object-fit: cover;
                                                                                                                                                                                                                                                                                                                                                                                border-radius: 8px;
                                                                                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                                                                                        >

                                                                                                                                                                                                                                                                                                                                                                        <span style="
                                                                                                                                                                                                                                                                                                                                                                            font-size: 16px;
                                                                                                                                                                                                                                                                                                                                                                            font-weight: 600;
                                                                                                                                                                                                                                                                                                                                                                        ">
                                                                                                                                                                                                                                                                                                                                                                            ${state.text}
                                                                                                                                                                                                                                                                                                                                                                        </span>

                                                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                                                `);

            }

        });


        $(document).ready(function () {

            $('#product_select').select2({

                templateResult: formatState,
                templateSelection: formatState

            });

            function formatState(state) {

                if (!state.id) {
                    return state.text;
                }

                let image = $(state.element).data('image');

                return $(`
                                                                                                                                                                                                                                                                                                                                                                    <span class="d-flex align-items-center gap-3 py-2">

                                                                                                                                                                                                                                                                                                                                                                        <img 
                                                                                                                                                                                                                                                                                                                                                                            src="${image}" 
                                                                                                                                                                                                                                                                                                                                                                            width="30" 
                                                                                                                                                                                                                                                                                                                                                                            height="30"
                                                                                                                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                                                                                                                object-fit: cover;
                                                                                                                                                                                                                                                                                                                                                                                border-radius: 8px;
                                                                                                                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                                                                                                                        >

                                                                                                                                                                                                                                                                                                                                                                        <span style="
                                                                                                                                                                                                                                                                                                                                                                            font-size: 16px;
                                                                                                                                                                                                                                                                                                                                                                            font-weight: 600;
                                                                                                                                                                                                                                                                                                                                                                        ">
                                                                                                                                                                                                                                                                                                                                                                            ${state.text}
                                                                                                                                                                                                                                                                                                                                                                        </span>

                                                                                                                                                                                                                                                                                                                                                                    </span>
                                                                                                                                                                                                                                                                                                                                                                `);

            }

        });
    </script>
    <script>
        $(document).ready(function () {
            $('#has_color').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#color_select_box').removeClass('d-none');
                } else {
                    $('#color_select_box').addClass('d-none');
                    $('#color_id').val('').trigger('change');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {

            // اللون
            $('#has_color').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#color_select_box').removeClass('d-none');
                } else {
                    $('#color_select_box').addClass('d-none');
                    $('#color_id').val('').trigger('change');
                }
            });

            // الحجم
            $('#has_size').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#size_select_box').removeClass('d-none');
                } else {
                    $('#size_select_box').addClass('d-none');
                    $('#size_id').val('').trigger('change');
                }
            });

        });

        $('#has_engraving').on('change', function () {
            if ($(this).is(':checked')) {
                $('#engraving_select_box').removeClass('d-none');
            } else {
                $('#engraving_select_box').addClass('d-none');
                $('#engraving_id').val('').trigger('change');
            }
        });

        $(document).ready(function () {
            $('[data-control="select2"]').select2();
        });

        $(document).on('shown.bs.modal', function () {
            $('[data-control="select2"]').select2();
        });


    </script>

    <script>
        $(document).ready(function () {

            let modal = $('#kt_modal_add_category'); // ← عدل هذا حسب id المودال عندك

            // تفعيل select2
            $('#color_id, #size_id, #engraving_id').select2({
                placeholder: 'اختر',
                allowClear: true,
                closeOnSelect: false,
                dropdownParent: modal
            });

            // اللون
            $('#has_color').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#color_box').removeClass('d-none');
                } else {
                    $('#color_box').addClass('d-none');
                    $('#color_id').val(null).trigger('change');
                }
            });

            // الحجم
            $('#has_size').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#size_box').removeClass('d-none');
                } else {
                    $('#size_box').addClass('d-none');
                    $('#size_id').val(null).trigger('change');
                }
            });

            // النقش
            $('#has_engraving').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#engraving_box').removeClass('d-none');
                } else {
                    $('#engraving_box').addClass('d-none');
                    $('#engraving_id').val(null).trigger('change');
                }
            });

        });
    </script>

@endsection