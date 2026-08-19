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
                                                        placeholder="إسم المنتج" value="" />
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
                                                    <!--begin::Editor-->
                                                    <div id="kt_ecommerce_add_product_description" name="description"
                                                        class="min-h-200px mb-2"></div>
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
                                                        style="text-align: left;" />
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
                                                        style="text-align: left;" />
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
                                                        value="" dir="ltr" style="text-align: left;" />
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
                                                        placeholder="رمز المنتج" value="" />
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
                                                        id="kt_ecommerce_add_product_store_template">
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
                                                        style="text-align: left;" />
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
                                                        id="kt_ecommerce_add_product_store_template">
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
                                            <!--begin::Card header-->

                                            <div class="card card-flush py-4">
                                                <!--begin::Card header-->
                                                <div class="card-header">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>سمة المنتج</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0">
                                                    <!--begin::Image input-->
                                                    <div class="mb-10">
                                                        <div class="row align-items-center">

                                                            <!-- السمات -->
                                                            <div class="col-md-1">
                                                                <label class="required form-label mb-0">
                                                                    السمات :
                                                                </label>
                                                            </div>

                                                            <!-- Select -->
                                                            <div class="col-md-8">
                                                                <select class="form-select"
                                                                    id="kt_ecommerce_add_product_store_template"
                                                                    name="features">
                                                                    <option value="1" selected>منتج بسيط</option>
                                                                    <option value="2">منتج متعدد</option>
                                                                </select>
                                                            </div>

                                                            <!-- زر الإضافة -->
                                                            <div class="col-md-3">
                                                                <button type="button" class="btn btn-primary">
                                                                    إضافة
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--end::Description-->
                                                </div>
                                                <!--end::Card body-->
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
                            </div>
                            <!--end::Tab content-->
                            <div class="d-flex justify-content-center">
                                <!--begin::Button-->
                                <a href="../../demo1/dist/apps/ecommerce/catalog/products.html"
                                    id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5"
                                    style=" background-color: #ffb822;border-color: #ffb822;color: #111;">إضافة كمسودة</a>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                    <span class="indicator-label">إضافة</span>
                                    <span class="indicator-progress">الرجاء الإنتظار...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>

                        </div>
                        <!--end::Main column-->
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

                                            // حل احتياطي
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
                    <!--end::Form-->
                </div>
                <!--end::Container-->
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

            // منع التعارض إذا كان Select2 يعمل مسبقاً
            if (relatedSelect.hasClass('select2-hidden-accessible')) {
                relatedSelect.select2('destroy');
            }

            function formatProduct(product) {

                // في حالة الـ placeholder
                if (!product.id) {
                    return product.text;
                }

                let image = $(product.element).attr('data-image');

                // إذا لم توجد صورة
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
@endsection