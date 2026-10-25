<?php

use App\Models\requestUpgradeMerchant;

?>
@extends("admin.layout._layout")
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
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14" placeholder="البحث عن طلب جديد" />
                </div>
            </div>
        </div>
        <div class="card-body py-4">
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">#</th>
                                <th class="min-w-125px">الأيقونة</th>
                                <th class="min-w-125px">إسم المستخدم</th>
                                <th class="min-w-125px">إسم المتجر</th>
                                <th class="min-w-125px">عن التاجر</th>
                                <th class="min-w-125px">اسم الحساب البنكي</th>
                                <th class="min-w-125px">المدينة</th>
                                <th class="min-w-125px">حالة الطلب</th>
                                <th class="text-end min-w-100px">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                            @foreach($records as $key => $record)
                                <tr>
                                    <td>
                                        {{($key + 1)}}
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="">
                                                <div class="symbol-label">
                                                    <img src="{{asset('img/' . $record->store->icon)}}" alt="Emma Smith"
                                                        class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{route('admin.update_to_merchant.view', $record->id)}}"
                                                class="text-gray-800 text-hover-primary mb-1">{{$record->user->first_name}}
                                                {{$record->user->last_name}}</a>
                                        </div>
                                    </td>
                                    <td>{{$record->user->first_name}} {{$record->user->last_name}}</td>
                                    <td>{{$record->store->name}}</td>
                                    <td>{{$record->user->info}}</td>
                                    <td>{{$record->store->bank_account_name}}</td>
                                    <td>{{$record->store->country}}</td>
                                    <td>{{requestUpgradeMerchant::status[$record->status]}}</td>
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
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            @if(requestUpgradeMerchant::status[$record->status] == 'Pending')
                                                <div class="menu-item px-3">
                                                    <a class="accept-btn menu-link text-success px-3">قبول الترقية</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a id="ignore" class="ignore-btn menu-link text-danger px-3"
                                                        data-kt-users-table-filter="delete_row">رفض
                                                        الترقية</a>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('script')
    <script>

        $(document).ready(function () {
            $(document).on('click', '#ignore', function (e) {



                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    icon: 'warning',
                    html: `
                                                                                                                                            <input type="text" name="reason" id="reason" class="form-control mb-3" placeholder="سبب الرفض">
                                                                                                                                `,
                    showCancelButton: true,
                    confirmButtonText: 'نعم',
                    cancelButtonText: 'لا إلغاء',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-secondary"
                    },
                    buttonsStyling: false,

                    preConfirm: () => {
                        return {
                            reason: document.getElementById('reason').value,
                        }
                    }

                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '{{route('admin.update_to_merchant.destroy', $record->id)}}', // 👈 الراوت
                            type: 'GET',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                id: {{ $record->id }},
                                reason: result.value.reason,
                                rejected_at: new Date().toISOString().slice(0, 19).replace('T', ' '),
                            },
                            success: function (res) {

                                Swal.fire({
                                    text: "تم الرفض بنجاح",
                                    icon: "success",
                                    confirmButtonText: "حسناً"
                                }).then(() => {
                                    location.reload(); // تحديث الجدول
                                });

                            },
                            error: function () {
                                Swal.fire("خطأ", "حدث خطأ", "error");
                            }
                        });

                    }
                });

            });
        })
        $(document).ready(function () {
            $(document).on('click', '.accept-btn', function (e) {

                Swal.fire({
                    title: 'تأكيد القبول',
                    icon: 'question',
                    html: `
                                                                                                                                                                                                                                                                                    <input type="text" name="reason" id="reason" class="form-control mb-3" placeholder="ملاحظات">
                                                                                                                                                                                                                                                                        `,
                    showCancelButton: true,
                    confirmButtonText: 'نعم',
                    cancelButtonText: 'لا إلغاء',
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-secondary"
                    },
                    buttonsStyling: false,

                    preConfirm: () => {
                        return {
                            reason: document.getElementById('reason').value,
                        }
                    }

                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: '{{route('admin.update_to_merchant.update', $record->id)}}',
                            type: 'GET',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                id: {{ $record->id }},
                                reason: result.value.reason,
                                rejected_at: new Date().toISOString().slice(0, 19).replace('T', ' '),
                            },
                            success: function (res) {

                                Swal.fire({
                                    text: "تم قبول الطلب بنجاح",
                                    icon: "success",
                                    confirmButtonText: "حسناً"
                                }).then(() => {
                                    location.reload();
                                });

                            },
                            error: function () {
                                Swal.fire("خطأ", "حدث خطأ", "error");
                            }
                        });

                    }
                });

            });
        }, true)

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
        $(document).on('submit', '#kt_modal_add_category', function (e) {

            e.preventDefault();
            e.stopPropagation();

            var formData = new FormData(this);

            jQuery.ajax({
                type: "POST",
                url: "{{\Illuminate\Support\Facades\URL::to('admin/products/store')}}",
                data: formData,
                processData: false,
                contentType: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function (data, status, xhr) {
                    if (data.status === 'error') {
                        Swal.fire({
                            text: data.message ?? 'حدث خطأ',
                            icon: 'error',
                            confirmButtonText: 'حسناً'
                        });
                    } else {
                        Swal.fire({
                            text: data.message ?? 'تم الحفظ بنجاح',
                            icon: 'success',
                            confirmButtonText: 'حسناً'
                        })
                        $('#kt_modal_add_category')[0].reset();
                    }
                    console.log(status);
                },
                error: function (xhr, status, error) {
                    Swal.fire({
                        text: 'حدث خطأ في الإرسال',
                        icon: 'error',
                        confirmButtonText: 'حسناً'
                    });
                    console.log(error);
                    console.log(xhr.responseText);
                    console.log("error");
                }
            })
        });

        $('#btnClose').on('click', function () {
            var modal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_add_user'));
            modal.hide();
            $('#kt_modal_add_user').hide().removeClass('show').removeAttr('role').removeAttr('aria-modal').attr('aria-hidden', 'true').modal('hide');
            $('.modal-backdrop').remove();
            $('body').removeClass('modal-open').css({ 'overflow': '', 'padding': '' });

        });

        $('#kt_modal_add_user').on('click', function () {
            $('.modal-backdrop').addClass('show');
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