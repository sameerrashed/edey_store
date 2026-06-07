"use strict";
var KTUsersUpdateDetails = function () {
    const t = document.getElementById("kt_modal_update_details"), e = t.querySelector("#kt_modal_update_merchant_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", function (event) {
                    event.preventDefault();

                    Swal.fire({
                        text: "هل أنت متأكد من رغبتك في الإغلاق؟",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "نعم، قم بإغلاقه!",
                        cancelButtonText: "لا، ارجع",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then(function (result) {

                        if (result.isConfirmed) {
                            e.reset();
                            n.hide();
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                text: "تم إلغاء العملية",
                                icon: "info",
                                buttonsStyling: false,
                                confirmButtonText: "حسناً",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }

                    });
                }),
                    t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t => {
                        t.preventDefault(), Swal.fire({
                            text: "هل أنت متأكد من رغبتك في الإلغاء؟",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "نعم، قم بإلغائه!",
                            cancelButtonText: "لا، ارجع",
                            customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
                        }).then((function (t) {
                            t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                                text: "لم يتم إلغاء طلبك!",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "حسناً، فهمت!",
                                customClass: {confirmButton: "btn btn-primary"}
                            })
                        }))
                    }));
                const o = t.querySelector('[data-kt-users-modal-action="submit"]');
                o.addEventListener("click", function (t) {
                    t.preventDefault();

                    o.setAttribute("data-kt-indicator", "on");
                    o.disabled = true;

                    var form = document.getElementById('kt_modal_update_merchant_form');
                    var formData = new FormData(form);



                    $.ajax({
                        type: "POST",

                        url: window.updateUrl,

                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function (data) {
                            o.removeAttribute("data-kt-indicator");
                            o.disabled = false;

                            if (data.status === 'error') {
                                Swal.fire({
                                    text: data.message ?? 'حدث خطأ',
                                    icon: 'error',
                                    confirmButtonText: 'حسناً'
                                });
                            } else {
                                form.reset();

                                Swal.fire({
                                    text: data.message ?? 'تم الحفظ بنجاح',
                                    icon: 'success',
                                    confirmButtonText: 'حسناً'
                                }).then(function () {
                                    // اغلاق المودال
                                    var modal = bootstrap.Modal.getInstance(document.getElementById('kt_modal_update_merchant'));
                                    modal.hide();
                                });
                            }
                        },

                        error: function () {
                            o.removeAttribute("data-kt-indicator");
                            o.disabled = false;

                            Swal.fire({
                                text: 'حدث خطأ في الإرسال',
                                icon: 'error',
                                confirmButtonText: 'حسناً'
                            });
                        }
                    });
                });
            })()
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTUsersUpdateDetails.init()
}));
