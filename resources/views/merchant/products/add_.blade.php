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
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    <form id="kt_ecommerce_add_product_form" action="{{ route('merchant.Products.store') }}" method="post"
                        enctype="multipart/form-data" class="form d-flex flex-column flex-lg-row"
                        data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html">
                        @csrf
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">حدد نوع المنتج</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select mb-2" id="kt_ecommerce_add_product_store_template"
                                    name="type_id">

                                    <option value="1" selected>منتج بسيط</option>
                                    <option value="2">منتج متعدد</option>

                                </select>
                            </div>
                            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_general">عام</a>
                                </li>
                                <!--end:::Tab item-->
                                <!--begin:::Tab item-->
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_advanced">المخزون</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_category">التصنيفات والماركات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_relproduct">المنتجات المرتبطة</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_image">صورة المنتج</a>
                                </li>

                                <li class="nav-item multiple-product-tab d-none">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_variations">
                                        السمات
                                    </a>
                                </li>

                                <li class="nav-item multiple-product-tab d-none">
                                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                        href="#kt_ecommerce_add_product_variants">
                                        الأنواع
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                    role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::General options-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>عام</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">إسم المنتج</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="product_name" class="form-control mb-2"
                                                        placeholder="إسم المنتج" value="" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">يُشترط وجود اسم للمنتج، ويُنصح بأن يكون
                                                        فريداً.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <!--begin::Label-->
                                                    <label class="form-label">وصف المنتج</label>
                                                    <!--end::Label-->
                                                    <textarea name="description" class="form-control mb-2" rows="6"
                                                        placeholder="أدخل وصف المنتج..." required></textarea>
                                                    <!--end::Editor-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">أضف وصفًا للمنتج لزيادة وضوحه.</div>
                                                    <!--end::Description-->
                                                    <!--end::Description-->
                                                </div>
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">السعر الأساسي</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="price" class="form-control mb-2 price-input"
                                                        placeholder="سعر المنتج" value="" dir="ltr"
                                                        style="text-align: left;" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">حدد سعر المنتج.</div>
                                                    <!--end::Description-->
                                                </div>

                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">السعر بعد الخصم</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="price_after"
                                                        class="form-control mb-2 price-input"
                                                        placeholder="سعر المنتج بعد الخصم" value="" dir="ltr"
                                                        style="text-align: left;" value="0" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">حدد سعر المنتج بعد الخصم.</div>
                                                    <!--end::Description-->
                                                </div>

                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">سعر تكلفة المنتج</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="cost_price"
                                                        class="form-control mb-2 price-input" placeholder="سعر تكلفة المنتج"
                                                        value="" dir="ltr" style="text-align: left;" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">حدد سعر تكلفة المنتج .</div>
                                                    <!--end::Description-->
                                                </div>

                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">الحد الأدنى من الكمية</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="min_quantity"
                                                        class="form-control mb-2 price-input" value="1" dir="ltr"
                                                        style="text-align: left;" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">حدد الحد الأدنى لتوفر المنتج.</div>
                                                    <!--end::Description-->
                                                </div>

                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">الحد الأعلى من الكمية</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="max_quantity"
                                                        class="form-control mb-2 price-input" value="99" dir="ltr"
                                                        style="text-align: left;" />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">حدد الحد الأعلى من المنتج.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Card header-->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>المخزون</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">SKU</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" name="sku" class="form-control mb-2"
                                                        placeholder="رمز المنتج" value="0" readonly />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">أدخل رمز المنتج (SKU).</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">حالة المخزون</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="stock_status" class="form-select mb-2"
                                                        data-hide-search="true" data-placeholder="Select an option"
                                                        id="kt_ecommerce_add_product_store_template" required>
                                                        <option value="1" selected="selected">متوفر في المخزون
                                                        </option>
                                                        <option value="2">غير متوفر في المخزون</option>
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">كمية المخزون</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="quantity"
                                                        class="form-control mb-2 price-input" value="99" dir="ltr"
                                                        style="text-align: left;" required />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">أدخل كمية المنتج.</div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_category" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>التصنيفات والماركات</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <select name="category[]"
                                                        class="form-select form-select-solid lh-1 py-3" id="category_select"
                                                        data-placeholder="إختر تصنيف للمنتج" multiple="multiple">

                                                        <option></option>

                                                        @foreach ($categories as $record)
                                                            <option value="{{ $record->id }}"
                                                                data-image="{{ asset('img/' . $record->photo_cover) }}">
                                                                {{ $record->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <!--end::Select2-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7 mb-7">أضف تصنيف للمنتج.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">الماركة</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="brand" class="form-select mb-2" data-hide-search="true"
                                                        data-placeholder="Select an option"
                                                        id="kt_ecommerce_add_product_store_template" required>
                                                        <option value=""></option>
                                                        @foreach ($categories as $record)
                                                            <option value="{{ $record->id }}"
                                                                data-image="{{ asset('img/' . $record->photo_cover) }}">
                                                                {{ $record->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_relproduct" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>المنتجات المرتبطة</h2>
                                                </div>
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">منتجات يوصى بها</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select class="form-select form-select-solid lh-1 py-3"
                                                        id="related_select" name="related_id[]"
                                                        data-placeholder="إختر منتج مرتبط للمنتج" multiple="multiple">
                                                        @foreach ($products as $record)
                                                            <option value="{{ $record->id }}"
                                                                data-image="{{ asset('img/' . $record->avatar) }}">
                                                                {{ $record->product_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <!--end::Card header-->
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_ecommerce_add_product_image" role="tab-panel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->

                                            <div class="card card-flush py-4">
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>صورة مصغرة</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body text-center pt-0">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-empty image-input-outline mb-3"
                                                        data-kt-image-input="true"
                                                        style="background-image: url({{ asset('img/blank-image.svg') }})">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-150px h-150px"></div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Label-->
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="إختيار صورة">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Cancel-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="إلغاء الصورة">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">قم بتعيين صورة مصغرة للمنتج. يُقبل فقط
                                                        ملفات الصور بصيغة
                                                        *.png و *.jpg و *.jpeg</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Card body-->
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">

                                            <div class="fv-row mb-2">

                                                <div id="product_media_area" class="dropzone" style="cursor:pointer;">

                                                    <input type="file" id="product_images" name="images[]"
                                                        accept="image/jpeg,image/png,image/jpg,image/webp" multiple hidden>

                                                    <div class="dz-message needsclick">

                                                        <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>

                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bolder text-gray-900 mb-1">
                                                                أسقط الملفات هنا أو انقر للتحميل.
                                                            </h3>

                                                            <span class="fs-7 fw-bold text-gray-400">
                                                                حمّل ما يصل إلى 10 صور
                                                            </span>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div id="images_preview" class="d-flex flex-wrap gap-3 mt-5">
                                                </div>

                                            </div>

                                            <div class="text-muted fs-7">
                                                قم بإعداد معرض صور المنتج.
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade multiple-product-pane d-none"
                                    id="kt_ecommerce_add_product_variations" role="tabpanel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <div class="card card-flush py-4">
                                                <div class="card-header">
                                                    <div class="card-title">
                                                        <h2>سمة المنتج</h2>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <!--begin::Image input-->
                                                    <div class="mb-10">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-1">
                                                                <label class="required form-label mb-0">
                                                                    السمات :
                                                                </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <select class="form-select"
                                                                    id="kt_ecommerce_add_features_store_template"
                                                                    name="features">
                                                                    <option></option>
                                                                    @foreach ($features as $record)
                                                                        <option value="{{ $record->id }}">{{ $record->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <button type="button" class="btn btn-primary"
                                                                    id="add_feature_btn">
                                                                    إضافة
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="selected_features_container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade multiple-product-pane d-none"
                                    id="kt_ecommerce_add_product_variants" role="tabpanel">
                                    <div class="d-flex flex-column gap-7 gap-lg-10">
                                        <!--begin::Inventory-->
                                        <div class="card card-flush py-4">
                                            <!--begin::Card header-->

                                            <div class="card card-flush py-4">
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>الأنواع</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body text-center pt-0">
                                                    <div id="variants_features_wrapper" style="display:none;">
                                                        <div class="mb-7">
                                                            <label class="form-label fw-bold fs-6 mb-4">
                                                                اختر السمات المستخدمة في الأنواع
                                                            </label>
                                                            <div id="variants_checkboxes" class="d-flex flex-wrap gap-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="variants_container"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('merchant.Products.store') }}" id="kt_ecommerce_add_product_cancel"
                                    class="btn btn-light me-5"
                                    style=" background-color: #ffb822;border-color: #ffb822;color: #111;">إضافة كمسودة</a>
                                <button type="submit" id="" class="btn btn-primary">
                                    <span class="indicator-label">إضافة</span>
                                    <span class="indicator-progress">الرجاء الإنتظار...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {

                            const productType = document.getElementById(
                                'kt_ecommerce_add_product_store_template'
                            );

                            const multipleTabs = document.querySelectorAll(
                                '.multiple-product-tab'
                            );

                            const multiplePanes = document.querySelectorAll(
                                '.multiple-product-pane'
                            );


                            if (!productType) {
                                return;
                            }


                            function changeProductType() {

                                // ============================
                                // منتج متعدد
                                // ============================
                                if (productType.value === '2') {

                                    multipleTabs.forEach(function (item) {
                                        item.classList.remove('d-none');
                                    });

                                    multiplePanes.forEach(function (item) {
                                        item.classList.remove('d-none');
                                    });

                                }


                                // ============================
                                // منتج بسيط
                                // ============================
                                else {

                                    let wasMultipleTabActive = false;


                                    // نتحقق هل المستخدم موجود حالياً داخل
                                    // إحدى نوافذ المنتج المتعدد
                                    multiplePanes.forEach(function (item) {

                                        if (item.classList.contains('active')) {
                                            wasMultipleTabActive = true;
                                        }

                                    });


                                    // نخفي أزرار المنتج المتعدد
                                    multipleTabs.forEach(function (item) {
                                        item.classList.add('d-none');
                                    });


                                    // نخفي محتوى المنتج المتعدد
                                    multiplePanes.forEach(function (item) {

                                        item.classList.add('d-none');
                                        item.classList.remove('show');
                                        item.classList.remove('active');

                                    });


                                    // ====================================
                                    // إذا كان المستخدم داخل Tab متعدد
                                    // ننقله تلقائياً إلى "عام"
                                    // ====================================
                                    if (wasMultipleTabActive) {

                                        const generalButton = document.querySelector(
                                            '[href="#kt_ecommerce_add_product_general"]'
                                        );

                                        const generalPane = document.getElementById(
                                            'kt_ecommerce_add_product_general'
                                        );


                                        if (generalButton) {

                                            // Bootstrap / Metronic
                                            const generalTab =
                                                bootstrap.Tab.getOrCreateInstance(generalButton);

                                            generalTab.show();

                                        } else if (generalPane) {
                                            generalPane.classList.add('show');
                                            generalPane.classList.add('active');

                                        }

                                    }

                                }

                            }


                            // عند تحميل الصفحة
                            changeProductType();


                            // عند تغيير نوع المنتج
                            productType.addEventListener('change', function () {

                                changeProductType();

                            });

                        });
                    </script>
                </div>
            </div>
        </div>
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
        document.addEventListener("DOMContentLoaded", function () {

            console.log("Dropzone type:", typeof Dropzone);

            if (typeof Dropzone === "undefined") {

                console.error("Dropzone library is NOT loaded");

                return;
            }

            Dropzone.autoDiscover = false;

            let element = document.querySelector("#kt_ecommerce_add_product_media");

            if (!element) {
                console.error("Dropzone element not found");
                return;
            }

            // إذا Metronic قام بتشغيله مسبقاً
            if (element.dropzone) {
                element.dropzone.destroy();
            }

            let myDropzone = new Dropzone(element, {

                url: "",

                method: "post",

                paramName: "image",

                clickable: true,

                maxFiles: 10,

                maxFilesize: 5,

                acceptedFiles: "image/jpeg,image/png,image/jpg,image/webp",

                addRemoveLinks: true,

                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },

                init: function () {

                    console.log("Dropzone initialized successfully");

                    this.on("addedfile", function (file) {

                        console.log("File selected:");
                        console.log(file);

                    });

                    this.on("sending", function (file, xhr, formData) {

                        console.log("Sending image...");

                    });

                    this.on("success", function (file, response) {

                        console.log("Upload success:");
                        console.log(response);

                    });

                    this.on("error", function (file, response) {

                        console.error("Upload error:");
                        console.log(response);

                    });

                }

            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const area = document.getElementById('product_media_area');
            const input = document.getElementById('product_images');
            const preview = document.getElementById('images_preview');

            area.addEventListener('click', function (e) {

                if (e.target.closest('.remove-image')) {
                    return;
                }

                input.click();
            });


            input.addEventListener('change', function () {

                preview.innerHTML = '';

                let files = Array.from(this.files);

                if (files.length > 10) {
                    alert('يمكنك اختيار 10 صور فقط');
                    this.value = '';
                    return;
                }

                files.forEach(function (file) {

                    if (!file.type.startsWith('image/')) {
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function (e) {

                        const item = document.createElement('div');

                        item.style.position = 'relative';

                        item.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="${e.target.result}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width:100px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height:100px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            object-fit:cover;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border-radius:8px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border:1px solid #e4e6ef;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                `;

                        preview.appendChild(item);
                    };

                    reader.readAsDataURL(file);
                });

            });

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
    <script>
        $(document).ready(function () {
            const relatedSelect = $('#related_select');
            if (relatedSelect.hasClass('select2-hidden-accessible')) {
                relatedSelect.select2('destroy');
            }
            function formatProduct(product) {
                if (!product.id) {
                    return product.text;
                }
                let image = $(product.element).attr('data-image');
                if (!image) {
                    return product.text;
                }

                return $(`
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <div class="d-flex align-items-center gap-3">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <img src="${image}"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         style="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            width: 45px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            height: 45px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            object-fit: cover;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border-radius: 6px;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            border: 1px solid #e4e6ef;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         ">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <span>${product.text}</span>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            `);
            }


            relatedSelect.select2({

                placeholder: 'إختر منتج مرتبط للمنتج',

                allowClear: true,

                width: '100%',

                // شكل المنتج داخل القائمة
                templateResult: formatProduct,

                // شكل المنتج بعد الاختيار
                templateSelection: formatProduct,

                escapeMarkup: function (markup) {
                    return markup;
                }

            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addButton = document.getElementById('add_feature_btn');
            const featureSelect = document.getElementById(
                'kt_ecommerce_add_features_store_template'
            );
            const container = document.getElementById(
                'selected_features_container'
            );
            const originalFeatures = [];
            Array.from(featureSelect.options).forEach(function (option) {
                if (option.value !== '') {
                    originalFeatures.push({
                        id: option.value,
                        name: option.text.trim()
                    });
                }
            });
            function refreshFeatureSelect() {
                const usedFeatureIds = [];
                container
                    .querySelectorAll('.feature-item')
                    .forEach(function (row) {
                        usedFeatureIds.push(
                            String(row.dataset.featureId)
                        );
                    });
                if ($(featureSelect).hasClass('select2-hidden-accessible')) {
                    $(featureSelect).select2('destroy');
                }
                featureSelect.innerHTML = '';
                const emptyOption = document.createElement('option');
                emptyOption.value = '';
                emptyOption.textContent = '';
                featureSelect.appendChild(emptyOption);
                originalFeatures.forEach(function (feature) {
                    if (!usedFeatureIds.includes(String(feature.id))) {
                        const option = document.createElement('option');
                        option.value = feature.id;
                        option.textContent = feature.name;
                        featureSelect.appendChild(option);
                    }
                });
                $(featureSelect).select2({
                    placeholder: 'اختر السمة',
                    width: '100%',
                    dir: 'rtl',
                    allowClear: true
                });
            }
            addButton.addEventListener('click', function () {
                const featureId = featureSelect.value;
                if (!featureId) {
                    alert('اختر سمة أولاً');
                    return;
                }
                const selectedFeature = originalFeatures.find(
                    function (feature) {
                        return String(feature.id) === String(featureId);
                    }
                );
                if (!selectedFeature) {
                    return;
                }
                $.ajax({
                    url: "{{ route('merchant.products.feature-values', ':id') }}"
                        .replace(':id', featureId),
                    type: "GET",
                    success: function (response) {
                        if (!response.status) {
                            alert('لم يتم العثور على قيم السمة');
                            return;
                        }
                        let options = `
                                                                                                                                                                                                                                                                <option value="">
                                                                                                                                                                                                                                                                    اختر القيمة
                                                                                                                                                                                                                                                                </option>
                                                                                                                                                                                                                                                            `;

                        response.values.forEach(function (item) {

                            let extraData = '';

                            // اللون
                            if (response.feature_name === 'اللون') {
                                extraData = `data-color="${item.color ?? ''}"`;
                            }

                            // النقش
                            if (response.feature_name === 'النقش') {
                                extraData = `data-avatar="${item.avatar ?? ''}"`;
                            }

                            options += `
                                                                                                                                                                                                                                                                    <option
                                                                                                                                                                                                                                                                        value="${item.id}"
                                                                                                                                                                                                                                                                        ${extraData}
                                                                                                                                                                                                                                                                    >
                                                                                                                                                                                                                                                                        ${item.name}
                                                                                                                                                                                                                                                                    </option>
                                                                                                                                                                                                                                                                `;
                        });
                        const featureRow =
                            document.createElement('div');
                        featureRow.id =
                            'feature_row_' + featureId;
                        featureRow.className =
                            'feature-item border-top py-5';
                        featureRow.dataset.featureId =
                            featureId;
                        featureRow.innerHTML = `
                                                                                                                                                                                                                                                                                                    <div class="row align-items-center">
                                                                                                                                                                                                                                                                                                        <div class="col-md-2">
                                                                                                                                                                                                                                                                                                            <label class="form-label mb-0">
                                                                                                                                                                                                                                                                                                                السمة:
                                                                                                                                                                                                                                                                                                                <strong>
                                                                                                                                                                                                                                                                                                                    ${selectedFeature.name}
                                                                                                                                                                                                                                                                                                                </strong>
                                                                                                                                                                                                                                                                                                            </label>
                                                                                                                                                                                                                                                                                                            <input
                                                                                                                                                                                                                                                                                                                type="hidden"
                                                                                                                                                                                                                                                                                                                name="feature_ids[]"
                                                                                                                                                                                                                                                                                                                value="${featureId}"
                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                        <div class="col-md-7">
                                                                                                                                                                                                                                                                                                            <select
                                                                                                                                                                                                                                                                                                                class="form-select feature-values-select"
                                                                                                                                            multiple                                                                                                                                                                 name="feature_values[${featureId}]"
                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                ${options}
                                                                                                                                                                                                                                                                                                            </select>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                        <div class="col-md-3">
                                                                                                                                                                                                                                                                                                            <button
                                                                                                                                                                                                                                                                                                                type="button"
                                                                                                                                                                                                                                                                                                                class="btn btn-danger remove-feature"
                                                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                                                                إزالة
                                                                                                                                                                                                                                                                                                            </button>
                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                `;
                        container.appendChild(featureRow);
                        const valueSelect = $(featureRow)
                            .find('.feature-values-select');
                        valueSelect.select2({
                            placeholder: 'اختر القيمة',
                            width: '100%',
                            dir: 'rtl',
                            allowClear: true,
                            templateResult: function (state) {
                                if (!state.id) {
                                    return state.text;
                                }
                                const option = state.element;
                                const color = option.dataset.color;
                                const avatar = option.dataset.avatar;
                                if (color) {
                                    return $(`
                                                                                                                                                                                                                                                                        <div
                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                display:flex;
                                                                                                                                                                                                                                                                                align-items:center;
                                                                                                                                                                                                                                                                                gap:10px;
                                                                                                                                                                                                                                                                                direction:rtl;
                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                    width:18px;
                                                                                                                                                                                                                                                                                    height:18px;
                                                                                                                                                                                                                                                                                    border-radius:50%;
                                                                                                                                                                                                                                                                                    background:${color};
                                                                                                                                                                                                                                                                                    border:1px solid #ddd;
                                                                                                                                                                                                                                                                                    display:inline-block;
                                                                                                                                                                                                                                                                                    flex-shrink:0;
                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                            ></span>
                                                                                                                                                                                                                                                                            <span>
                                                                                                                                                                                                                                                                                ${state.text}
                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                    `);
                                }
                                if (avatar) {

                                    return $(`
                                                                                                                                                                                                                                                                        <div
                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                display:flex;
                                                                                                                                                                                                                                                                                align-items:center;
                                                                                                                                                                                                                                                                                gap:10px;
                                                                                                                                                                                                                                                                                direction:rtl;
                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                            <img
                                                                                                                                                                                                                                                                                src="{{ asset('img/${avatar}') }}"
                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                    width:30px;
                                                                                                                                                                                                                                                                                    height:30px;
                                                                                                                                                                                                                                                                                    border-radius:5px;
                                                                                                                                                                                                                                                                                    object-fit:cover;
                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                            <span>
                                                                                                                                                                                                                                                                                ${state.text}
                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                    `);
                                }
                                return state.text;
                            },
                            templateSelection: function (state) {
                                if (!state.id) {
                                    return state.text;
                                }
                                const option = state.element;
                                const color = option.dataset.color;
                                const avatar = option.dataset.avatar;
                                if (color) {
                                    return $(`
                                                                                                                                                                                                                                                                        <div
                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                display:flex;
                                                                                                                                                                                                                                                                                align-items:center;
                                                                                                                                                                                                                                                                                gap:8px;
                                                                                                                                                                                                                                                                                direction:rtl;
                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                            <span
                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                    width:15px;
                                                                                                                                                                                                                                                                                    height:15px;
                                                                                                                                                                                                                                                                                    border-radius:50%;
                                                                                                                                                                                                                                                                                    background:${color};
                                                                                                                                                                                                                                                                                    border:1px solid #ddd;
                                                                                                                                                                                                                                                                                    display:inline-block;
                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                            ></span>
                                                                                                                                                                                                                                                                            <span>
                                                                                                                                                                                                                                                                                ${state.text}
                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                    `);
                                }
                                if (avatar) {
                                    return $(`
                                                                                                                                                                                                                                                                        <div
                                                                                                                                                                                                                                                                            style="
                                                                                                                                                                                                                                                                                display:flex;
                                                                                                                                                                                                                                                                                align-items:center;
                                                                                                                                                                                                                                                                                gap:8px;
                                                                                                                                                                                                                                                                                direction:rtl;
                                                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                                                            <img
                                                                                                                                                                                                                                                                                src="{{ asset('img/${avatar}') }}"
                                                                                                                                                                                                                                                                                style="
                                                                                                                                                                                                                                                                                    width:25px;
                                                                                                                                                                                                                                                                                    height:25px;
                                                                                                                                                                                                                                                                                    border-radius:4px;
                                                                                                                                                                                                                                                                                    object-fit:cover;
                                                                                                                                                                                                                                                                                "
                                                                                                                                                                                                                                                                            >
                                                                                                                                                                                                                                                                            <span>
                                                                                                                                                                                                                                                                                ${state.text}
                                                                                                                                                                                                                                                                            </span>
                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                    `);
                                }
                                return state.text;
                            },
                            escapeMarkup: function (markup) {
                                return markup;
                            }
                        });
                        refreshFeatureSelect();
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('حدث خطأ أثناء جلب قيم السمة');
                    }
                });
            });
            container.addEventListener('click', function (e) {
                const button =
                    e.target.closest('.remove-feature');
                if (!button) {
                    return;
                }
                const row =
                    button.closest('.feature-item');
                if (!row) {
                    return;
                }
                const valueSelect =
                    row.querySelector('.feature-values-select');
                if (
                    valueSelect &&
                    $(valueSelect).hasClass('select2-hidden-accessible')
                ) {
                    $(valueSelect).select2('destroy');
                }
                row.remove();
                refreshFeatureSelect();
            });
            refreshFeatureSelect();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const featuresContainer =
                document.getElementById('selected_features_container');

            const variantsWrapper =
                document.getElementById('variants_features_wrapper');

            const variantsCheckboxes =
                document.getElementById('variants_checkboxes');


            if (
                !featuresContainer ||
                !variantsWrapper ||
                !variantsCheckboxes
            ) {
                return;
            }
            function refreshVariants() {
                variantsCheckboxes.innerHTML = '';
                const features = [];
                featuresContainer
                    .querySelectorAll('.feature-item')
                    .forEach(function (row) {
                        const select =
                            row.querySelector(
                                '.feature-values-select'
                            );
                        if (!select) {
                            return;
                        }
                        const featureNameElement =
                            row.querySelector(
                                'label strong'
                            );
                        const featureName =
                            featureNameElement
                                ? featureNameElement.textContent.trim()
                                : '';
                        let selectedOptions = [];
                        if (select.multiple) {
                            selectedOptions =
                                Array.from(
                                    select.selectedOptions
                                );
                        } else {
                            const selectedOption =
                                select.options[
                                select.selectedIndex
                                ];
                            if (
                                selectedOption &&
                                selectedOption.value
                            ) {
                                selectedOptions.push(
                                    selectedOption
                                );
                            }
                        }
                        if (!selectedOptions.length) {
                            return;
                        }
                        const values =
                            selectedOptions.map(function (option) {
                                return {
                                    id: option.value,
                                    name:
                                        option.textContent.trim(),
                                    color:
                                        option.dataset.color || '',
                                    avatar:
                                        option.dataset.avatar || ''
                                };
                            });
                        features.push({

                            id: row.dataset.featureId,

                            name: featureName,

                            values: values

                        });

                    });
                if (!features.length) {

                    variantsWrapper.style.display =
                        'none';
                    return;
                }
                variantsWrapper.style.display =
                    'block';
                const combinations =
                    createCombinations(features);


                /*
                |--------------------------------------------------------------------------
                | إنشاء Checkboxes
                |--------------------------------------------------------------------------
                */

                combinations.forEach(
                    function (combination, index) {

                        const checkboxItem =
                            document.createElement('div');

                        checkboxItem.className =
                            'variant-checkbox-item';


                        const names =
                            combination.map(
                                item => item.value.name
                            );


                        const ids =
                            combination.map(
                                item => {
                                    return {
                                        feature_id:
                                            item.feature.id,

                                        value_id:
                                            item.value.id
                                    };
                                }
                            );


                        checkboxItem.innerHTML = `

                                                                                                                                                                                                                                <label
                                                                                                                                                                                                                                    class="
                                                                                                                                                                                                                                        d-flex
                                                                                                                                                                                                                                        align-items-center
                                                                                                                                                                                                                                        gap-3
                                                                                                                                                                                                                                        border
                                                                                                                                                                                                                                        border-gray-300
                                                                                                                                                                                                                                        rounded
                                                                                                                                                                                                                                        px-4
                                                                                                                                                                                                                                        py-3
                                                                                                                                                                                                                                        cursor-pointer
                                                                                                                                                                                                                                    "
                                                                                                                                                                                                                                >

                                                                                                                                                                                                                                    <input
                                                                                                                                                                                                                                        class="
                                                                                                                                                                                                                                            form-check-input
                                                                                                                                                                                                                                            variant-checkbox
                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                        type="checkbox"

                                                                                                                                                                                                                                        name="selected_variants[]"

                                                                                                                                                                                                                                        value="${index}"

                                                                                                                                                                                                                                        data-variant='${JSON.stringify(ids)}'
                                                                                                                                                                                                                                    >


                                                                                                                                                                                                                                    <div
                                                                                                                                                                                                                                        class="
                                                                                                                                                                                                                                            d-flex
                                                                                                                                                                                                                                            align-items-center
                                                                                                                                                                                                                                            gap-2
                                                                                                                                                                                                                                            flex-wrap
                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                    >

                                                                                                                                                                                                                                        ${createVariantPreview(
                            combination
                        )}

                                                                                                                                                                                                                                        <span
                                                                                                                                                                                                                                            class="
                                                                                                                                                                                                                                                fw-semibold
                                                                                                                                                                                                                                                text-gray-800
                                                                                                                                                                                                                                            "
                                                                                                                                                                                                                                        >
                                                                                                                                                                                                                                            ${names.join(' - ')}
                                                                                                                                                                                                                                        </span>

                                                                                                                                                                                                                                    </div>

                                                                                                                                                                                                                                </label>

                                                                                                                                                                                                                            `;


                        variantsCheckboxes
                            .appendChild(
                                checkboxItem
                            );

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | عمل جميع التركيبات
            |--------------------------------------------------------------------------
            */

            function createCombinations(features) {

                let result = [[]];


                features.forEach(
                    function (feature) {

                        const temp = [];


                        result.forEach(
                            function (current) {

                                feature.values.forEach(
                                    function (value) {

                                        temp.push([

                                            ...current,

                                            {
                                                feature:
                                                    feature,

                                                value:
                                                    value
                                            }

                                        ]);

                                    }
                                );

                            }
                        );


                        result = temp;

                    }
                );


                return result;

            }


            /*
            |--------------------------------------------------------------------------
            | اللون / الصورة بجانب النوع
            |--------------------------------------------------------------------------
            */

            function createVariantPreview(
                combination
            ) {

                let html = '';


                combination.forEach(
                    function (item) {

                        /*
                        |--------------------------------------------------------------------------
                        | اللون
                        |--------------------------------------------------------------------------
                        */

                        if (item.value.color) {

                            html += `

                                                                                                                                                                                                                                    <span
                                                                                                                                                                                                                                        title="${item.value.name}"
                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                            width:18px;
                                                                                                                                                                                                                                            height:18px;
                                                                                                                                                                                                                                            border-radius:50%;
                                                                                                                                                                                                                                            background:${item.value.color};
                                                                                                                                                                                                                                            border:1px solid #ddd;
                                                                                                                                                                                                                                            display:inline-block;
                                                                                                                                                                                                                                            flex-shrink:0;
                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                    ></span>

                                                                                                                                                                                                                                `;

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | صورة النقش
                        |--------------------------------------------------------------------------
                        */

                        if (item.value.avatar) {

                            html += `

                                                                                                                                                                                                                                    <img
                                                                                                                                                                                                                                        src="${item.value.avatar}"
                                                                                                                                                                                                                                        title="${item.value.name}"
                                                                                                                                                                                                                                        style="
                                                                                                                                                                                                                                            width:28px;
                                                                                                                                                                                                                                            height:28px;
                                                                                                                                                                                                                                            border-radius:5px;
                                                                                                                                                                                                                                            object-fit:cover;
                                                                                                                                                                                                                                            border:1px solid #e4e6ef;
                                                                                                                                                                                                                                        "
                                                                                                                                                                                                                                    >

                                                                                                                                                                                                                                `;

                        }

                    }
                );


                return html;

            }


            /*
            |--------------------------------------------------------------------------
            | عند تغيير قيمة أي سمة
            |--------------------------------------------------------------------------
            */

            $(document).on(
                'change',
                '.feature-values-select',
                function () {

                    refreshVariants();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | عند حذف سمة
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function (e) {

                    if (
                        e.target.closest(
                            '.remove-feature'
                        )
                    ) {

                        setTimeout(
                            function () {

                                refreshVariants();

                            },
                            50
                        );

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | أول تشغيل
            |--------------------------------------------------------------------------
            */

            refreshVariants();

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const featuresContainer =
                document.getElementById('selected_features_container');

            const variantsWrapper =
                document.getElementById('variants_features_wrapper');

            const variantsCheckboxes =
                document.getElementById('variants_checkboxes');

            // مكان ظهور الأنواع
            let variantsContainer =
                document.getElementById('variants_container');


            if (!variantsContainer && variantsWrapper) {

                variantsContainer =
                    document.createElement('div');

                variantsContainer.id =
                    'variants_container';

                variantsContainer.className =
                    'mt-7';

                variantsWrapper.parentNode.appendChild(
                    variantsContainer
                );
            }


            if (
                !featuresContainer ||
                !variantsWrapper ||
                !variantsCheckboxes ||
                !variantsContainer
            ) {
                return;
            }

            let enabledFeatures = [];

            function refreshFeatureCheckboxes() {

                variantsCheckboxes.innerHTML = '';

                const featureRows =
                    featuresContainer.querySelectorAll(
                        '.feature-item'
                    );
                if (!featureRows.length) {

                    variantsWrapper.style.display =
                        'none';

                    variantsContainer.innerHTML =
                        '';

                    enabledFeatures = [];

                    return;
                }
                const availableFeatures = [];


                featureRows.forEach(function (row) {

                    const featureId =
                        String(row.dataset.featureId);


                    const nameElement =
                        row.querySelector(
                            'label strong'
                        );


                    const featureName =
                        nameElement
                            ? nameElement.textContent.trim()
                            : '';


                    const select =
                        row.querySelector(
                            '.feature-values-select'
                        );

                    if (!select) {
                        return;
                    }

                    const selectedOptions =
                        Array.from(
                            select.selectedOptions
                        ).filter(function (option) {

                            return option.value !== '';

                        });

                    if (!selectedOptions.length) {
                        return;
                    }


                    const values =
                        selectedOptions.map(
                            function (option) {

                                return {

                                    id:
                                        String(
                                            option.value
                                        ),

                                    name:
                                        option.textContent.trim(),

                                    color:
                                        option.dataset.color || '',

                                    avatar:
                                        option.dataset.avatar || ''

                                };

                            }
                        );


                    availableFeatures.push({

                        id:
                            featureId,

                        name:
                            featureName,

                        values:
                            values

                    });

                });

                if (!availableFeatures.length) {

                    variantsWrapper.style.display =
                        'none';

                    variantsContainer.innerHTML =
                        '';

                    enabledFeatures = [];

                    return;
                }

                variantsWrapper.style.display =
                    'block';

                enabledFeatures =
                    enabledFeatures.filter(
                        function (id) {

                            return availableFeatures.some(
                                function (feature) {

                                    return String(
                                        feature.id
                                    ) === String(id);

                                }
                            );

                        }
                    );

                availableFeatures.forEach(
                    function (feature) {

                        const wrapper =
                            document.createElement('div');


                        wrapper.className =
                            'form-check form-check-custom form-check-solid me-5 mb-3';


                        const checked =
                            enabledFeatures.includes(
                                String(feature.id)
                            );


                        wrapper.innerHTML = `

                                                                                                                                                                                    <input
                                                                                                                                                                                        class="
                                                                                                                                                                                            form-check-input
                                                                                                                                                                                            variant-feature-checkbox
                                                                                                                                                                                        "
                                                                                                                                                                                        type="checkbox"
                                                                                                                                                                                        value="${feature.id}"
                                                                                                                                                                                        id="variant_feature_${feature.id}"
                                                                                                                                                                                        ${checked ? 'checked' : ''}
                                                                                                                                                                                    >

                                                                                                                                                                                    <label
                                                                                                                                                                                        class="
                                                                                                                                                                                            form-check-label
                                                                                                                                                                                            fw-semibold
                                                                                                                                                                                            text-gray-800
                                                                                                                                                                                        "
                                                                                                                                                                                        for="variant_feature_${feature.id}"
                                                                                                                                                                                    >
                                                                                                                                                                                        ${feature.name}
                                                                                                                                                                                    </label>

                                                                                                                                                                                `;


                        variantsCheckboxes.appendChild(
                            wrapper
                        );

                    }
                );

                buildVariants(
                    availableFeatures
                );

            }
            variantsCheckboxes.addEventListener(
                'change',
                function (e) {

                    if (
                        !e.target.classList.contains(
                            'variant-feature-checkbox'
                        )
                    ) {
                        return;
                    }


                    const featureId =
                        String(e.target.value);


                    if (e.target.checked) {

                        if (
                            !enabledFeatures.includes(
                                featureId
                            )
                        ) {

                            enabledFeatures.push(
                                featureId
                            );

                        }

                    } else {

                        enabledFeatures =
                            enabledFeatures.filter(
                                function (id) {

                                    return String(id) !==
                                        featureId;

                                }
                            );

                    }


                    refreshFeatureCheckboxes();

                }
            );

            function buildVariants(
                availableFeatures
            ) {


                const oldValues =
                    collectExistingVariantValues();


                variantsContainer.innerHTML =
                    '';

                if (!enabledFeatures.length) {

                    return;

                }
                const selectedFeatures =
                    availableFeatures.filter(
                        function (feature) {

                            return enabledFeatures.includes(
                                String(feature.id)
                            );

                        }
                    );


                if (!selectedFeatures.length) {

                    return;

                }
                const combinations =
                    createCombinations(
                        selectedFeatures
                    );


                combinations.forEach(
                    function (
                        combination,
                        index
                    ) {

                        createVariantCard(
                            combination,
                            index,
                            oldValues
                        );

                    }
                );

            }
            function createCombinations(
                features
            ) {

                let result = [[]];


                features.forEach(
                    function (feature) {

                        const temp = [];


                        result.forEach(
                            function (
                                currentCombination
                            ) {

                                feature.values.forEach(
                                    function (value) {

                                        temp.push([

                                            ...currentCombination,

                                            {

                                                feature:
                                                    feature,

                                                value:
                                                    value

                                            }

                                        ]);

                                    }
                                );

                            }
                        );


                        result = temp;

                    }
                );


                return result;

            }
            function getVariantKey(
                combination
            ) {

                return combination
                    .map(
                        function (item) {

                            return (
                                item.feature.id +
                                ':' +
                                item.value.id
                            );

                        }
                    )
                    .sort()
                    .join('|');

            }
            function createVariantCard(
                combination,
                index,
                oldValues
            ) {

                const key =
                    getVariantKey(
                        combination
                    );


                const title =
                    combination
                        .map(
                            function (item) {

                                return item.value.name;

                            }
                        )
                        .join(' - ');
                const valuesData =
                    combination.map(
                        function (item) {
                            return {
                                feature_id:
                                    item.feature.id,
                                value_id:
                                    item.value.id
                            };
                        }
                    );
                const previous =
                    oldValues[key] || {};
                const card =
                    document.createElement('div');
                card.className =
                    'variant-card mb-5';
                card.dataset.variantKey =
                    key;
                card.innerHTML = `

                                                                                                                                                                            <!-- ========================================================= -->
                                                                                                                                                                            <!-- Header -->
                                                                                                                                                                            <!-- ========================================================= -->

                                                                                                                                                                            <div
                                                                                                                                                                                class="
                                                                                                                                                                                    variant-header
                                                                                                                                                                                    d-flex
                                                                                                                                                                                    align-items-center
                                                                                                                                                                                    justify-content-between
                                                                                                                                                                                    px-6
                                                                                                                                                                                    py-4
                                                                                                                                                                                    cursor-pointer
                                                                                                                                                                                "
                                                                                                                                                                                style="
                                                                                                                                                                                    background:#6258c9;
                                                                                                                                                                                    color:#fff;
                                                                                                                                                                                    min-height:54px;
                                                                                                                                                                                    border-radius:6px;
                                                                                                                                                                                "
                                                                                                                                                                            >

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        d-flex
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        gap-3
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <span
                                                                                                                                                                                        class="fs-2"
                                                                                                                                                                                    >
                                                                                                                                                                                        📋
                                                                                                                                                                                    </span>

                                                                                                                                                                                    <span
                                                                                                                                                                                        class="
                                                                                                                                                                                            fw-bold
                                                                                                                                                                                            fs-5
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        النوع : ${title}

                                                                                                                                                                                    </span>

                                                                                                                                                                                    ${createVariantPreview(
                    combination
                )}

                                                                                                                                                                                </div>


                                                                                                                                                                                <span
                                                                                                                                                                                    class="
                                                                                                                                                                                        variant-arrow
                                                                                                                                                                                        fw-bold
                                                                                                                                                                                        fs-4
                                                                                                                                                                                    "
                                                                                                                                                                                >
                                                                                                                                                                                    ▾
                                                                                                                                                                                </span>

                                                                                                                                                                            </div>


                                                                                                                                                                            <!-- ========================================================= -->
                                                                                                                                                                            <!-- Body -->
                                                                                                                                                                            <!-- ========================================================= -->

                                                                                                                                                                            <div
                                                                                                                                                                                class="
                                                                                                                                                                                    variant-body
                                                                                                                                                                                    border
                                                                                                                                                                                    border-top-0
                                                                                                                                                                                    rounded-bottom
                                                                                                                                                                                "
                                                                                                                                                                                style="display:none;"
                                                                                                                                                                            >

                                                                                                                                                                                <input
                                                                                                                                                                                    type="hidden"
                                                                                                                                                                                    name="variants[${index}][key]"
                                                                                                                                                                                    value="${key}"
                                                                                                                                                                                >


                                                                                                                                                                                ${createHiddenFeatureValues(
                    combination,
                    index
                )}


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- السعر -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            السعر:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            step="0.01"
                                                                                                                                                                                            min="0"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][price]"
                                                                                                                                                                                            value="${escapeValue(previous.price)}"
                                                                                                                                                                                            placeholder="السعر"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- السعر بعد الخصم -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            السعر بعد الخصم:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            step="0.01"
                                                                                                                                                                                            min="0"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][price_after]"
                                                                                                                                                                                            value="${escapeValue(previous.price_after)}"
                                                                                                                                                                                            placeholder="السعر بعد الخصم"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-3">

                                                                                                                                                                                        <button
                                                                                                                                                                                            type="button"
                                                                                                                                                                                            class="
                                                                                                                                                                                                btn
                                                                                                                                                                                                btn-link
                                                                                                                                                                                                p-0
                                                                                                                                                                                                me-5
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            جدولة
                                                                                                                                                                                        </button>


                                                                                                                                                                                        <button
                                                                                                                                                                                            type="button"
                                                                                                                                                                                            class="
                                                                                                                                                                                                btn
                                                                                                                                                                                                btn-link
                                                                                                                                                                                                p-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            إلغاء الجدولة
                                                                                                                                                                                        </button>

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- سعر التكلفة -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            سعر التكلفة:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            step="0.01"
                                                                                                                                                                                            min="0"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][cost_price]"
                                                                                                                                                                                            value="${escapeValue(previous.cost_price)}"
                                                                                                                                                                                            placeholder="سعر التكلفة"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- حالة المخزون -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            حالة المخزون:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <select
                                                                                                                                                                                            class="form-select"
                                                                                                                                                                                            name="variants[${index}][stock_status]"
                                                                                                                                                                                        >

                                                                                                                                                                                            <option
                                                                                                                                                                                                value="available"
                                                                                                                                                                                                ${previous.stock_status ===
                        'available' ||
                        !previous.stock_status
                        ? 'selected'
                        : ''
                    }
                                                                                                                                                                                            >
                                                                                                                                                                                                متوفر في المخزون
                                                                                                                                                                                            </option>

                                                                                                                                                                                            <option
                                                                                                                                                                                                value="unavailable"
                                                                                                                                                                                                ${previous.stock_status ===
                        'unavailable'
                        ? 'selected'
                        : ''
                    }
                                                                                                                                                                                            >
                                                                                                                                                                                                غير متوفر في المخزون
                                                                                                                                                                                            </option>

                                                                                                                                                                                        </select>

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- SKU -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            SKU:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="text"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][sku]"
                                                                                                                                                                                            value="${escapeValue(previous.sku)}"
                                                                                                                                                                                            placeholder="SKU"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- كمية المخزون -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            كمية المخزون:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            min="0"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][quantity]"
                                                                                                                                                                                            value="${escapeValue(previous.quantity)}"
                                                                                                                                                                                            placeholder="كمية المخزون"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- الوزن -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            الوزن (kg):
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            step="0.01"
                                                                                                                                                                                            min="0"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][weight]"
                                                                                                                                                                                            value="${escapeValue(previous.weight)}"
                                                                                                                                                                                            placeholder="الوزن"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- الأبعاد -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            الأبعاد:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-6">

                                                                                                                                                                                        <div class="input-group">

                                                                                                                                                                                            <input
                                                                                                                                                                                                type="number"
                                                                                                                                                                                                step="0.01"
                                                                                                                                                                                                min="0"
                                                                                                                                                                                                class="form-control"
                                                                                                                                                                                                name="variants[${index}][length]"
                                                                                                                                                                                                value="${escapeValue(previous.length)}"
                                                                                                                                                                                                placeholder="الطول"
                                                                                                                                                                                            >

                                                                                                                                                                                            <input
                                                                                                                                                                                                type="number"
                                                                                                                                                                                                step="0.01"
                                                                                                                                                                                                min="0"
                                                                                                                                                                                                class="form-control"
                                                                                                                                                                                                name="variants[${index}][width]"
                                                                                                                                                                                                value="${escapeValue(previous.width)}"
                                                                                                                                                                                                placeholder="العرض"
                                                                                                                                                                                            >

                                                                                                                                                                                            <input
                                                                                                                                                                                                type="number"
                                                                                                                                                                                                step="0.01"
                                                                                                                                                                                                min="0"
                                                                                                                                                                                                class="form-control"
                                                                                                                                                                                                name="variants[${index}][height]"
                                                                                                                                                                                                value="${escapeValue(previous.height)}"
                                                                                                                                                                                                placeholder="الارتفاع"
                                                                                                                                                                                            >

                                                                                                                                                                                        </div>

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- الحد الأدنى -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            الحد الأدنى من الكمية:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            min="1"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][min_quantity]"
                                                                                                                                                                                            value="${previous.min_quantity !== undefined &&
                        previous.min_quantity !== ''
                        ? escapeValue(
                            previous.min_quantity
                        )
                        : 1
                    }"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>


                                                                                                                                                                                <!-- ========================== -->
                                                                                                                                                                                <!-- الحد الأعلى -->
                                                                                                                                                                                <!-- ========================== -->

                                                                                                                                                                                <div
                                                                                                                                                                                    class="
                                                                                                                                                                                        row
                                                                                                                                                                                        align-items-center
                                                                                                                                                                                        py-4
                                                                                                                                                                                        border-bottom
                                                                                                                                                                                        px-6
                                                                                                                                                                                    "
                                                                                                                                                                                >

                                                                                                                                                                                    <div
                                                                                                                                                                                        class="
                                                                                                                                                                                            col-md-2
                                                                                                                                                                                            text-end
                                                                                                                                                                                        "
                                                                                                                                                                                    >

                                                                                                                                                                                        <label
                                                                                                                                                                                            class="
                                                                                                                                                                                                form-label
                                                                                                                                                                                                fw-bold
                                                                                                                                                                                                mb-0
                                                                                                                                                                                            "
                                                                                                                                                                                        >
                                                                                                                                                                                            الحد الأعلى من الكمية:
                                                                                                                                                                                        </label>

                                                                                                                                                                                    </div>


                                                                                                                                                                                    <div class="col-md-5">

                                                                                                                                                                                        <input
                                                                                                                                                                                            type="number"
                                                                                                                                                                                            min="1"
                                                                                                                                                                                            class="form-control"
                                                                                                                                                                                            name="variants[${index}][max_quantity]"
                                                                                                                                                                                            value="${previous.max_quantity !== undefined &&
                        previous.max_quantity !== ''
                        ? escapeValue(
                            previous.max_quantity
                        )
                        : 99
                    }"
                                                                                                                                                                                        >

                                                                                                                                                                                    </div>

                                                                                                                                                                                </div>

                                                                                                                                                                            </div>

                                                                                                                                                                        `;
                variantsContainer.appendChild(
                    card
                );
            }
            function createHiddenFeatureValues(
                combination,
                variantIndex
            ) {
                let html = '';
                combination.forEach(
                    function (
                        item,
                        featureIndex
                    ) {
                        html += `
                                                                                                                                                                                    <input
                                                                                                                                                                                        type="hidden"
                                                                                                                                                                                        name="
                                                                                                                                                                                            variants[
                                                                                                                                                                                                ${variantIndex}
                                                                                                                                                                                            ][features][
                                                                                                                                                                                                ${featureIndex}
                                                                                                                                                                                            ][feature_id]
                                                                                                                                                                                        "
                                                                                                                                                                                        value="${item.feature.id}"
                                                                                                                                                                                    >
                                                                                                                                                                                    <input
                                                                                                                                                                                        type="hidden"
                                                                                                                                                                                        name="
                                                                                                                                                                                            variants[
                                                                                                                                                                                                ${variantIndex}
                                                                                                                                                                                            ][features][
                                                                                                                                                                                                ${featureIndex}
                                                                                                                                                                                            ][value_id]
                                                                                                                                                                                        "
                                                                                                                                                                                        value="${item.value.id}"
                                                                                                                                                                                    >
                                                                                                                                                                                `;
                    }
                );
                return html;
            }
            function createVariantPreview(
                combination
            ) {
                let html = '';
                combination.forEach(
                    function (item) {
                        if (item.value.color) {
                            html += `
                                                                                                                                                                                        <span
                                                                                                                                                                                            title="${item.value.name}"
                                                                                                                                                                                            style="
                                                                                                                                                                                                width:18px;
                                                                                                                                                                                                height:18px;
                                                                                                                                                                                                border-radius:50%;
                                                                                                                                                                                                background:${item.value.color};
                                                                                                                                                                                                display:inline-block;
                                                                                                                                                                                                border:2px solid rgba(255,255,255,.8);
                                                                                                                                                                                                flex-shrink:0;
                                                                                                                                                                                            "
                                                                                                                                                                                        ></span>
                                                                                                                                                                                    `;
                        }
                        if (item.value.avatar) {
                            html += `
                                                                                                                                                                                        <img
                                                                                                                                                                                            src="{{ asset('img/${item.value.avatar}') }}"
                                                                                                                                                                                            title="${item.value.name}"
                                                                                                                                                                                            style="
                                                                                                                                                                                                width:28px;
                                                                                                                                                                                                height:28px;
                                                                                                                                                                                                border-radius:5px;
                                                                                                                                                                                                object-fit:cover;
                                                                                                                                                                                                border:2px solid #fff;
                                                                                                                                                                                            "
                                                                                                                                                                                        >

                                                                                                                                                                                    `;

                        }

                    }
                );
                return html;
            }
            variantsContainer.addEventListener(
                'click',
                function (e) {
                    const header =
                        e.target.closest(
                            '.variant-header'
                        );
                    if (!header) {
                        return;
                    }
                    const card =
                        header.closest(
                            '.variant-card'
                        );
                    if (!card) {
                        return;
                    }
                    const body =
                        card.querySelector(
                            '.variant-body'
                        );
                    const arrow =
                        header.querySelector(
                            '.variant-arrow'
                        );
                    if (!body) {
                        return;
                    }
                    if (
                        body.style.display ===
                        'none'
                    ) {
                        body.style.display =
                            'block';
                        if (arrow) {
                            arrow.textContent =
                                '▴';
                        }
                        header.style.borderRadius =
                            '6px 6px 0 0';
                    }
                    else {
                        body.style.display =
                            'none';
                        if (arrow) {
                            arrow.textContent =
                                '▾';
                        }
                        header.style.borderRadius =
                            '6px';
                    }
                }
            );
            function collectExistingVariantValues() {
                const data = {};
                variantsContainer
                    .querySelectorAll(
                        '.variant-card'
                    )
                    .forEach(
                        function (card) {
                            const key =
                                card.dataset.variantKey;
                            if (!key) {
                                return;
                            }
                            data[key] = {};
                            card
                                .querySelectorAll(
                                    'input, select, textarea'
                                )
                                .forEach(
                                    function (field) {
                                        const name =
                                            field.name;
                                        if (!name) {
                                            return;
                                        }
                                        const match =
                                            name.match(
                                                /\]\[([^\]]+)\]$/
                                            );
                                        if (!match) {
                                            return;
                                        }
                                        const fieldName =
                                            match[1];
                                        data[key][fieldName] =
                                            field.value;
                                    }
                                );
                        }
                    );
                return data;
            }
            function escapeValue(value) {
                if (
                    value === undefined ||
                    value === null
                ) {
                    return '';
                }
                return String(value)
                    .replaceAll('&', '&amp;')
                    .replaceAll('"', '&quot;')
                    .replaceAll('<', '&lt;')
                    .replaceAll('>', '&gt;');
            }
            $(document).on(
                'change',
                '.feature-values-select',
                function () {
                    refreshFeatureCheckboxes();
                }
            );
            const observer =
                new MutationObserver(
                    function () {
                        refreshFeatureCheckboxes();
                    }
                );
            observer.observe(
                featuresContainer,
                {
                    childList: true,
                    subtree: false
                }
            );
            document.addEventListener(
                'click',
                function (e) {
                    if (
                        e.target.closest(
                            '.remove-feature'
                        )
                    ) {
                        setTimeout(
                            function () {
                                refreshFeatureCheckboxes();
                            },
                            100
                        );

                    }

                }
            );
            refreshFeatureCheckboxes();
        });
    </script>

@endsection