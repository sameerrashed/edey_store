@extends("merchant.layout._layout")
@section('title', 'ايدي ستور')
@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{__('app.' . $title)}}</h1>
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
        <li class="breadcrumb-item text-dark">{{__('app.' . $title)}}</li>
    </ul>
@endsection
@section("body")
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="البحث عن تصنيف" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{ route('merchant.Products.create') }}" class="btn btn-primary">

                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">

                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="currentColor" />

                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                            </svg>
                        </span>

                        إضافة منتج
                    </a>
                </div>
            </div>
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">#</th>
                                <th class="min-w-125px">المنتج</th>
                                <th class="min-w-125px">السعر</th>
                                <th class="min-w-125px">الكمية</th>
                                <th class="min-w-125px">التقييم</th>
                                <th class="min-w-125px">اسم التاجر</th>
                                <th class="min-w-125px">اسم الصنف</th>
                                <th class="text-end min-w-100px">الاجراءات</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold">
                            <!--begin::Table row-->
                            @foreach($records as $key => $record)
                                <tr>
                                    <td>
                                        {{($key + 1)}}
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="">
                                                <div class="symbol-label">
                                                    <img src="{{asset('img/' . $record->avatar)}}" alt="Emma Smith"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href=""
                                                class="text-gray-800 text-hover-primary mb-1">{{$record->product_name}}</a>
                                        </div>
                                    </td>
                                    <td>{{toArabicNumber($record->price)}}</td>
                                    <td>{{toArabicNumber($record->count)}}</td>
                                    <td>{{toArabicNumber($record->rate)}}</td>
                                    <td>{{$record->user->first_name}} {{$record->user->last_name}}</td>
                                    <td>
                                        @foreach ($record->categories as $category)
                                            <span class="badge badge-light-primary me-1 mb-1">
                                                {{ $category->category_name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">الاجراءات
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{route('merchant.Products.edit', $record->id)}}"
                                                    class="menu-link px-3">تعديل</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                    data-kt-users-table-filter="delete_row">حذف</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @endforeach
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                            <ul class="pagination">

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>

@endsection
@section('script')
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