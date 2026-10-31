@extends('admin.layout._layout')
@section('title', 'ايدي ستور')
@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ __('app.' . $parent_title) }}</h1>
    <!--end::Title-->
    <!--begin::Separator-->
    <span class="h-20px border-gray-300 border-start mx-4"></span>
    <!--end::Separator-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <!--begin::Item-->
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('admin.Dashboard.index') }}" class="text-muted text-hover-primary">{{ __('app.Dashboard') }}</a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-dark">{{ __('app.' . $parent_title) }}</li>

        <li class="breadcrumb-item">
            <span class="bullet bg-gray-300 w-5px h-2px"></span>
        </li>

        <li class="breadcrumb-item text-dark">{{ __('app.' . $title) }}</li>
    </ul>
@endsection
@section('body')

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

                                                    <input type="number" name="user_id" class="form-control mb-2"
                                                        placeholder="إسم المنتج" value="{{ auth()->user()->id }}" hidden />
                                                    <!--end::Input-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">يُشترط وجود اسم للمنتج، ويُنصح بأن يكون
                                                        فريداً.</div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                {{-- <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <!--begin::Label-->
                                                    <label class="form-label">وصف المنتج</label>
                                                    <!--end::Label-->
                                                    <textarea name="description" class="form-control mb-2" rows="6"
                                                        placeholder="أدخل وصف المنتج..." readonly></textarea>
                                                    <!--end::Editor-->
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">أضف وصفًا للمنتج لزيادة وضوحه.</div>
                                                    <!--end::Description-->
                                                    <!--end::Description-->
                                                </div> --}}
                                                <div class="mb-10 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="required form-label">السعر الأساسي</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="number" name="price"
                                                        class="form-control mb-2 price-input" placeholder="سعر المنتج"
                                                        value="" dir="ltr" style="text-align: left;" required />
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
                                                        placeholder="سعر المنتج بعد الخصم" dir="ltr"
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
                                                        class="form-control mb-2 price-input"
                                                        placeholder="سعر تكلفة المنتج" value="" dir="ltr"
                                                        style="text-align: left;" required />
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
                                                        class="form-control mb-2 price-input" value="1"
                                                        dir="ltr" style="text-align: left;" />
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
                                                        class="form-control mb-2 price-input" value="99"
                                                        dir="ltr" style="text-align: left;" />
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
                                                        class="form-control mb-2 price-input" value="99"
                                                        dir="ltr" style="text-align: left;" required />
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
                                                        class="form-select form-select-solid lh-1 py-3"
                                                        id="category_select" data-placeholder="إختر تصنيف للمنتج"
                                                        multiple="multiple">

                                                        <option></option>

                                                        @foreach ($categorie as $record)
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
                                                    <select name="brand_id" class="form-select mb-2"
                                                        data-hide-search="true" data-placeholder="Select an option"
                                                        id="kt_ecommerce_add_product_store_template" required>
                                                        <option value=""></option>
                                                        @foreach ($brands as $record)
                                                            <option value="{{ $record->id }}">
                                                                {{ $record->name }}
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
                                                            <input type="file" name="avatar"
                                                                accept=".png, .jpg, .jpeg" />
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

                                                    <input type="file" id="product_images" name="image[]"
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
                                                                        <option value="{{ $record->id }}">
                                                                            {{ $record->name }}
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
                        document.addEventListener('DOMContentLoaded', function() {

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

                                    multipleTabs.forEach(function(item) {
                                        item.classList.remove('d-none');
                                    });

                                    multiplePanes.forEach(function(item) {
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
                                    multiplePanes.forEach(function(item) {

                                        if (item.classList.contains('active')) {
                                            wasMultipleTabActive = true;
                                        }

                                    });


                                    // نخفي أزرار المنتج المتعدد
                                    multipleTabs.forEach(function(item) {
                                        item.classList.add('d-none');
                                    });


                                    // نخفي محتوى المنتج المتعدد
                                    multiplePanes.forEach(function(item) {

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
                            productType.addEventListener('change', function() {

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
        $('#has_discount').change(function() {

            if ($(this).is(':checked')) {

                $('#discount_price_box').slideDown();

            } else {

                $('#discount_price_box').slideUp();

            }

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
    <script>
        document.addEventListener("DOMContentLoaded", function() {

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

                init: function() {

                    console.log("Dropzone initialized successfully");

                    this.on("addedfile", function(file) {

                        console.log("File selected:");
                        console.log(file);

                    });

                    this.on("sending", function(file, xhr, formData) {

                        console.log("Sending image...");

                    });

                    this.on("success", function(file, response) {

                        console.log("Upload success:");
                        console.log(response);

                    });

                    this.on("error", function(file, response) {

                        console.error("Upload error:");
                        console.log(response);

                    });

                }

            });

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const area = document.getElementById('product_media_area');
            const input = document.getElementById('product_images');
            const preview = document.getElementById('images_preview');

            area.addEventListener('click', function(e) {

                if (e.target.closest('.remove-image')) {
                    return;
                }

                input.click();
            });


            input.addEventListener('change', function() {

                preview.innerHTML = '';

                let files = Array.from(this.files);

                if (files.length > 10) {
                    alert('يمكنك اختيار 10 صور فقط');
                    this.value = '';
                    return;
                }

                files.forEach(function(file) {

                    if (!file.type.startsWith('image/')) {
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const item = document.createElement('div');

                        item.style.position = 'relative';

                        item.innerHTML =
                            `
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
        $(document).ready(function() {
            $('#has_color').on('change', function() {
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
        $(document).ready(function() {

            // اللون
            $('#has_color').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#color_select_box').removeClass('d-none');
                } else {
                    $('#color_select_box').addClass('d-none');
                    $('#color_id').val('').trigger('change');
                }
            });

            // الحجم
            $('#has_size').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#size_select_box').removeClass('d-none');
                } else {
                    $('#size_select_box').addClass('d-none');
                    $('#size_id').val('').trigger('change');
                }
            });

        });

        $('#has_engraving').on('change', function() {
            if ($(this).is(':checked')) {
                $('#engraving_select_box').removeClass('d-none');
            } else {
                $('#engraving_select_box').addClass('d-none');
                $('#engraving_id').val('').trigger('change');
            }
        });

        $(document).ready(function() {
            $('[data-control="select2"]').select2();
        });

        $(document).on('shown.bs.modal', function() {
            $('[data-control="select2"]').select2();
        });
    </script>
    <script>
        $(document).ready(function() {

            let modal = $('#kt_modal_add_category'); // ← عدل هذا حسب id المودال عندك

            // تفعيل select2
            $('#color_id, #size_id, #engraving_id').select2({
                placeholder: 'اختر',
                allowClear: true,
                closeOnSelect: false,
                dropdownParent: modal
            });

            // اللون
            $('#has_color').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#color_box').removeClass('d-none');
                } else {
                    $('#color_box').addClass('d-none');
                    $('#color_id').val(null).trigger('change');
                }
            });

            // الحجم
            $('#has_size').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#size_box').removeClass('d-none');
                } else {
                    $('#size_box').addClass('d-none');
                    $('#size_id').val(null).trigger('change');
                }
            });

            // النقش
            $('#has_engraving').on('change', function() {
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
        $(document).ready(function() {
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

                return $(
                    `
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        `
                );
            }


            relatedSelect.select2({

                placeholder: 'إختر منتج مرتبط للمنتج',

                allowClear: true,

                width: '100%',

                // شكل المنتج داخل القائمة
                templateResult: formatProduct,

                // شكل المنتج بعد الاختيار
                templateSelection: formatProduct,

                escapeMarkup: function(markup) {
                    return markup;
                }

            });

        });
    </script>
    {{-- استبدل سكربتات السمات والأنواع الثلاثة الموجودة لديك بهذا السكربت الواحد --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addButton = document.getElementById('add_feature_btn');
            const featureSelect = document.getElementById('kt_ecommerce_add_features_store_template');
            const featuresContainer = document.getElementById('selected_features_container');
            const variantsWrapper = document.getElementById('variants_features_wrapper');
            const variantsCheckboxes = document.getElementById('variants_checkboxes');

            if (!addButton || !featureSelect || !featuresContainer || !variantsWrapper || !variantsCheckboxes)
                return;

            // مكان البطاقات يجب أن يكون داخل النموذج الذي يرسل بيانات المنتج
            let variantsContainer = document.getElementById('variants_container');
            if (!variantsContainer) {
                variantsContainer = document.createElement('div');
                variantsContainer.id = 'variants_container';
                variantsContainer.className = 'mt-7';
                variantsWrapper.appendChild(variantsContainer);
            }

            const originalFeatures = Array.from(featureSelect.options)
                .filter(option => option.value !== '')
                .map(option => ({
                    id: String(option.value),
                    name: option.textContent.trim()
                }));

            // عند التعديل: بيانات المنتج من controller مع علاقة variants.features
            const savedVariants = @json(isset($product)
                    ? $product->variants->mapWithKeys(fn($variant) => [
                            $variant->variant_key => ['quantity' => $variant->quantity, 'stock_status' => $variant->stock_status],
                        ]
            )
                    : collect());
            const savedFeatureIds = @json(isset($product)
                    ? $product->variants->flatMap(fn($variant) => $variant->features->pluck('feature_id'))->unique()->values()
                    : collect());
            const savedValuesByFeature = @json(isset($product)
                    ? $product->variants->flatMap(fn($variant) => $variant->features)->groupBy('feature_id')->map(fn($rows) => $rows->pluck('value_id')->unique()->values())
                    : collect());

            // دعم سجلات قديمة لها variant_key ولكن جدول product_variant_features فارغ
            Object.keys(savedVariants || {}).forEach(key => {
                key.split('|').forEach(pair => {
                    const parts = pair.split(':');
                    if (parts.length !== 2 || !/^\d+$/.test(parts[0]) || !/^\d+$/.test(parts[1]))
                        return;
                    const [featureId, valueId] = parts;
                    if (!savedValuesByFeature[featureId]) savedValuesByFeature[featureId] = [];
                    if (!savedValuesByFeature[featureId].map(String).includes(valueId))
                        savedValuesByFeature[featureId].push(valueId);
                    if (!savedFeatureIds.map(String).includes(featureId)) savedFeatureIds.push(
                        featureId);
                });
            });

            const editedVariantValues = {};
            let enabledFeatures = new Set((savedFeatureIds || []).map(String));
            let initialized = false;
            const escaped = (value) => String(value ?? '').replaceAll('&', '&amp;').replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;').replaceAll('<', '&lt;').replaceAll('>', '&gt;');

            function initializeSelect2(select, placeholder, extraOptions = {}) {
                if (!window.jQuery || !$.fn.select2) return;
                if ($(select).hasClass('select2-hidden-accessible')) $(select).select2('destroy');
                $(select).select2({
                    placeholder,
                    width: '100%',
                    dir: 'rtl',
                    allowClear: true,
                    ...extraOptions
                });
            }

            function refreshFeatureSelect() {
                const used = new Set(Array.from(featuresContainer.querySelectorAll('.feature-item')).map(row =>
                    String(row.dataset.featureId)));
                featureSelect.innerHTML = '<option value=""></option>';
                originalFeatures.forEach(feature => {
                    if (!used.has(feature.id)) featureSelect.add(new Option(feature.name, feature.id));
                });
                initializeSelect2(featureSelect, 'اختر السمة');
            }

            function imageUrl(avatar) {
                if (!avatar) return '';
                if (/^(https?:\/\/|\/)/i.test(avatar)) return avatar;
                return @json(asset('img')) + '/' + String(avatar).replace(/^\/+/, '');
            }

            function previewOption(state) {
                if (!state.id || !state.element) return state.text;
                const color = state.element.dataset.color;
                const avatar = state.element.dataset.avatar;
                const holder = $(
                    '<span style="display:inline-flex;align-items:center;gap:8px;direction:rtl"></span>');
                if (color) $('<span></span>').css({
                    width: '18px',
                    height: '18px',
                    borderRadius: '50%',
                    backgroundColor: color,
                    border: '1px solid #ddd',
                    display: 'inline-block'
                }).appendTo(holder);
                if (avatar) $('<img>').attr('src', imageUrl(avatar)).css({
                    width: '28px',
                    height: '28px',
                    objectFit: 'cover',
                    borderRadius: '5px'
                }).appendTo(holder);
                $('<span></span>').text(state.text).appendTo(holder);
                return holder;
            }

            async function addFeature(featureId, presetValueIds = []) {
                featureId = String(featureId);
                if (featuresContainer.querySelector('.feature-item[data-feature-id="' + CSS.escape(featureId) +
                        '"]')) return;
                const feature = originalFeatures.find(item => item.id === featureId);
                if (!feature) return;

                const url = @json(route('merchant.products.feature-values', ':id')).replace(':id', encodeURIComponent(featureId));
                const response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                if (!response.ok) throw new Error('HTTP ' + response.status);
                const data = await response.json();
                if (!data.status || !Array.isArray(data.values)) throw new Error('لم يتم العثور على قيم السمة');

                const row = document.createElement('div');
                row.className = 'feature-item border-top py-5';
                row.dataset.featureId = featureId;
                row.id = 'feature_row_' + featureId;
                row.innerHTML = `
            <div class="row align-items-center">
                <div class="col-md-2">
                    <label class="form-label mb-0">السمة: <strong>${escaped(feature.name)}</strong></label>
                    <input type="hidden" name="feature_ids[]" value="${escaped(featureId)}">
                </div>
                <div class="col-md-7">
                    <select class="form-select feature-values-select" multiple name="feature_values[${escaped(featureId)}][]"></select>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-danger remove-feature">إزالة</button>
                </div>
            </div>`;
                const select = row.querySelector('.feature-values-select');
                data.values.forEach(item => {
                    const option = new Option(item.name, item.id, false, presetValueIds.map(String)
                        .includes(String(item.id)));
                    if (data.feature_name === 'اللون' && item.color) option.dataset.color = item.color;
                    if (data.feature_name === 'النقش' && item.avatar) option.dataset.avatar = item
                        .avatar;
                    select.add(option);
                });
                featuresContainer.appendChild(row);
                initializeSelect2(select, 'اختر القيمة', {
                    templateResult: previewOption,
                    templateSelection: previewOption
                });
                refreshFeatureSelect();
                refreshFeatureCheckboxes();
            }

            function availableFeatures() {
                return Array.from(featuresContainer.querySelectorAll('.feature-item')).map(row => {
                    const select = row.querySelector('.feature-values-select');
                    const values = Array.from(select.selectedOptions)
                        .filter(option => option.value !== '')
                        .map(option => ({
                            id: String(option.value),
                            name: option.textContent.trim(),
                            color: option.dataset.color || '',
                            avatar: option.dataset.avatar || ''
                        }));
                    return {
                        id: String(row.dataset.featureId),
                        name: row.querySelector('label strong')?.textContent.trim() || '',
                        values
                    };
                }).filter(feature => feature.values.length);
            }

            function createCombinations(features) {
                return features.reduce((combinations, feature) => combinations.flatMap(combination => feature.values
                    .map(value => [...combination, {
                        feature,
                        value
                    }])), [
                    []
                ]);
            }

            function variantKey(combination) {
                return combination.map(item => `${item.feature.id}:${item.value.id}`).sort().join('|');
            }

            function previewCombination(combination) {
                return combination.map(item => {
                    if (item.value.color)
                        return `<span title="${escaped(item.value.name)}" style="width:18px;height:18px;border-radius:50%;background:${escaped(item.value.color)};border:2px solid #ddd;display:inline-block"></span>`;
                    if (item.value.avatar)
                        return `<img src="${escaped(imageUrl(item.value.avatar))}" title="${escaped(item.value.name)}" style="width:28px;height:28px;border-radius:5px;object-fit:cover;border:1px solid #ddd">`;
                    return '';
                }).join('');
            }

            function collectEditedValues() {
                variantsContainer.querySelectorAll('.variant-card').forEach(card => {
                    editedVariantValues[card.dataset.variantKey] = {
                        quantity: card.querySelector('.variant-quantity')?.value ?? 0,
                        stock_status: card.querySelector('.variant-status')?.value ?? 'available'
                    };
                });
            }

            function buildVariants(features) {
                collectEditedValues();
                variantsContainer.replaceChildren();
                const chosen = features.filter(feature => enabledFeatures.has(feature.id));
                if (!chosen.length) return;
                createCombinations(chosen).forEach((combination, index) => {
                    const key = variantKey(combination);
                    const previous = editedVariantValues[key] || savedVariants[key] || {};
                    const title = combination.map(item => item.value.name).join(' - ');
                    const card = document.createElement('div');
                    card.className = 'variant-card mb-5';
                    card.dataset.variantKey = key;

                    // أسماء حقول features يجب أن تكون على سطر واحد ودون مسافات زائدة
                    const hiddenFeatures = combination.map((item, featureIndex) => `
                <input type="hidden" name="variants[${index}][features][${featureIndex}][feature_id]" value="${escaped(item.feature.id)}">
                <input type="hidden" name="variants[${index}][features][${featureIndex}][value_id]" value="${escaped(item.value.id)}">
            `).join('');

                    card.innerHTML = `
                <div class="variant-header d-flex align-items-center justify-content-between px-6 py-4 cursor-pointer" style="background:#6258c9;color:#fff;min-height:54px;border-radius:6px">
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <span class="fs-2">📋</span>
                        <span class="fw-bold fs-5">النوع : ${escaped(title)}</span>
                        ${previewCombination(combination)}
                    </div>
                    <span class="variant-arrow fw-bold fs-4">▾</span>
                </div>
                <div class="variant-body border border-top-0 rounded-bottom" style="display:none">
                    <input type="hidden" name="variants[${index}][key]" value="${escaped(key)}">
                    ${hiddenFeatures}
                    <div class="row align-items-center py-4 border-bottom px-6">
                        <div class="col-md-2 text-end"><label class="form-label fw-bold mb-0">حالة المخزون:</label></div>
                        <div class="col-md-5">
                            <select class="form-select variant-status" name="variants[${index}][stock_status]">
                                <option value="available" ${previous.stock_status !== 'unavailable' ? 'selected' : ''}>متوفر في المخزون</option>
                                <option value="unavailable" ${previous.stock_status === 'unavailable' ? 'selected' : ''}>غير متوفر في المخزون</option>
                            </select>
                        </div>
                    </div>
                    <div class="row align-items-center py-4 border-bottom px-6">
                        <div class="col-md-2 text-end"><label class="form-label fw-bold mb-0">كمية المخزون:</label></div>
                        <div class="col-md-5"><input type="number" min="0" class="form-control variant-quantity" name="variants[${index}][quantity]" value="${escaped(previous.quantity ?? '')}" placeholder="كمية المخزون"></div>
                    </div>
                </div>`;
                    variantsContainer.appendChild(card);
                });
            }

            function refreshFeatureCheckboxes() {
                const features = availableFeatures();
                enabledFeatures = new Set([...enabledFeatures].filter(id => features.some(feature => feature.id ===
                    id)));
                variantsCheckboxes.replaceChildren();
                variantsWrapper.style.display = features.length ? 'block' : 'none';
                features.forEach(feature => {
                    const wrapper = document.createElement('div');
                    wrapper.className = 'form-check form-check-custom form-check-solid me-5 mb-3';
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.className = 'form-check-input variant-feature-checkbox';
                    checkbox.value = feature.id;
                    checkbox.id = 'variant_feature_' + feature.id;
                    checkbox.checked = enabledFeatures.has(feature.id);
                    const label = document.createElement('label');
                    label.className = 'form-check-label fw-semibold text-gray-800';
                    label.htmlFor = checkbox.id;
                    label.textContent = feature.name;
                    wrapper.append(checkbox, label);
                    variantsCheckboxes.appendChild(wrapper);
                });
                buildVariants(features);
            }

            addButton.addEventListener('click', async function() {
                if (!featureSelect.value) return alert('اختر سمة أولاً');
                try {
                    await addFeature(featureSelect.value);
                } catch (error) {
                    console.error(error);
                    alert('حدث خطأ أثناء جلب قيم السمة');
                }
            });

            featuresContainer.addEventListener('click', function(event) {
                const button = event.target.closest('.remove-feature');
                if (!button) return;
                const row = button.closest('.feature-item');
                const select = row?.querySelector('.feature-values-select');
                if (select && window.jQuery && $(select).hasClass('select2-hidden-accessible')) $(select)
                    .select2('destroy');
                row?.remove();
                refreshFeatureSelect();
                refreshFeatureCheckboxes();
            });

            $(featuresContainer).on('change', '.feature-values-select', refreshFeatureCheckboxes);
            variantsCheckboxes.addEventListener('change', function(event) {
                if (!event.target.classList.contains('variant-feature-checkbox')) return;
                if (event.target.checked) enabledFeatures.add(String(event.target.value));
                else enabledFeatures.delete(String(event.target.value));
                refreshFeatureCheckboxes();
            });
            variantsContainer.addEventListener('click', function(event) {
                const header = event.target.closest('.variant-header');
                if (!header) return;
                const body = header.closest('.variant-card')?.querySelector('.variant-body');
                if (!body) return;
                const opening = body.style.display === 'none';
                body.style.display = opening ? 'block' : 'none';
                header.querySelector('.variant-arrow').textContent = opening ? '▴' : '▾';
                header.style.borderRadius = opening ? '6px 6px 0 0' : '6px';
            });

            async function loadExistingFeatures() {
                const ids = Object.keys(savedValuesByFeature || {});
                for (const featureId of ids) {
                    try {
                        await addFeature(featureId, savedValuesByFeature[featureId] || []);
                    } catch (error) {
                        console.error('فشل استرجاع السمة', featureId, error);
                    }
                }
                refreshFeatureCheckboxes();
            }

            refreshFeatureSelect();
            loadExistingFeatures();
        });
    </script>

@endsection
