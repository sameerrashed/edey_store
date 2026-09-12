<style>
    <style>
    /* ============================= */
    /* القسم العلوي */
    /* ============================= */

    .dashboard-stats .row>div>div {
        padding: 25px 30px !important;
    }

    /* العنوان */
    .dashboard-stats .fs-4 {
        font-size: 18px !important;
        font-weight: 600 !important;
    }

    /* النص الصغير */
    .dashboard-stats .fs-7 {
        font-size: 14px !important;
        margin-top: 5px;
    }

    /* الرقم */
    .dashboard-stats .fs-2 {
        font-size: 22px !important;
    }

    /* تكبير الأيقونة */
    .dashboard-stats .symbol {
        width: 50px !important;
        height: 50px !important;
    }


    /* ============================= */
    /* القسم السفلي */
    /* ============================= */

    .order-stats .row>div>div {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }

    /* زيادة المسافة بين كل خانة */
    .order-stats .d-flex.py-5 {
        padding-top: 22px !important;
        padding-bottom: 22px !important;
    }

    /* أسماء حالات الطلب */
    .order-stats .fs-6 {
        font-size: 16px !important;
        font-weight: 500 !important;
    }

    /* الأرقام */
    .order-stats .fs-4 {
        font-size: 18px !important;
        font-weight: 600 !important;
    }

    /* تكبير مربعات الأيقونات */
    .order-stats .symbol {
        width: 46px !important;
        height: 46px !important;
    }

    .order-column {
        padding: 10px 35px;
        min-height: 290px;
        border-left: 1px solid #e9edf1;
    }

    .order-column.no-border {
        border-left: 0;
    }


    /* كل صف */
    .order-item {
        display: flex;
        align-items: center;
        justify-content: space-between;

        min-height: 85px;

        padding: 15px 5px;

        border-bottom: 1px dashed #e4e6ef;
    }

    .order-item:last-child {
        border-bottom: 0;
    }


    /* الأيقونة + الاسم */
    .order-info {
        display: flex;
        align-items: center;

        gap: 18px;

        flex: 1;
    }


    /* اسم الحالة */
    .order-title {
        font-size: 16px;
        font-weight: 500;
        color: #3f4254;

        white-space: nowrap;
    }


    /* الرقم */
    .order-number {
        font-size: 18px;
        font-weight: 700;

        min-width: 40px;

        text-align: center;
        margin-right: 20px;
    }


    /* الأيقونة */
    .order-info .symbol {
        flex-shrink: 0;
    }


    /* للشاشات الأصغر */
    @media (max-width: 1199px) {

        .order-column {
            border-left: 0;
            border-bottom: 1px solid #e9edf1;

            padding: 10px 20px;
            min-height: auto;
        }

        .order-column.no-border {
            border-bottom: 0;
        }

    }
</style>
@extends('admin.layout._layout')
@section('title', 'ايدي ستور')
@section('breadcrumb')
    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{__('app.' . $title)}}</h1>
    <!--end::Title-->
    <!--begin::Separator-->
    <span class="h-20px border-gray-300 border-start mx-4"></span>
    <!--end::Separator-->
@endsection
@section("body")
    <div class="row g-5 g-xl-10 justify-content-center">

        <div class="col-12 col-xl-11 col-xxl-11">
            <div class="card mb-10">
                <div class="card-body py-8 dashboard-stats">
                    <div class="row g-0">

                        <!-- المستخدمين -->
                        <div class="col-xl-3 col-md-6">
                            <div class="px-5 py-4 border-end border-gray-200 h-100">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-4 fw-bold text-gray-800 mb-1">
                                            المستخدمين
                                        </div>

                                        <div class="fs-7 text-gray-500">
                                            عدد المستخدمين
                                        </div>
                                    </div>

                                    <div class="symbol symbol-45px">
                                        <div class="symbol-label bg-light-primary">
                                            <i class="ki-duotone ki-profile-user fs-2 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <span class="fs-2 fw-bold text-primary">
                                        125
                                    </span>
                                </div>

                                <div class="progress h-4px mt-4">
                                    <div class="progress-bar bg-primary" style="width: 65%"></div>
                                </div>

                            </div>
                        </div>


                        <!-- المنتجات -->
                        <div class="col-xl-3 col-md-6">
                            <div class="px-5 py-4 border-end border-gray-200 h-100">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-4 fw-bold text-gray-800 mb-1">
                                            المنتجات
                                        </div>

                                        <div class="fs-7 text-gray-500">
                                            عدد المنتجات المضافة
                                        </div>
                                    </div>

                                    <div class="symbol symbol-45px">
                                        <div class="symbol-label bg-light-info">
                                            <i class="ki-duotone ki-cube-2 fs-2 text-info">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <span class="fs-2 fw-bold text-info">
                                        320
                                    </span>
                                </div>

                                <div class="progress h-4px mt-4">
                                    <div class="progress-bar bg-info" style="width: 50%"></div>
                                </div>

                            </div>
                        </div>


                        <!-- الطلبات -->
                        <div class="col-xl-3 col-md-6">
                            <div class="px-5 py-4 border-end border-gray-200 h-100">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-4 fw-bold text-gray-800 mb-1">
                                            الطلبات
                                        </div>

                                        <div class="fs-7 text-gray-500">
                                            عدد الطلبات
                                        </div>
                                    </div>

                                    <div class="symbol symbol-45px">
                                        <div class="symbol-label bg-light-danger">
                                            <i class="ki-duotone ki-delivery-3 fs-2 text-danger">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <span class="fs-2 fw-bold text-danger">
                                        85
                                    </span>
                                </div>

                                <div class="progress h-4px mt-4">
                                    <div class="progress-bar bg-danger" style="width: 40%"></div>
                                </div>

                            </div>
                        </div>


                        <!-- الطلبات المكتملة -->
                        <div class="col-xl-3 col-md-6">
                            <div class="px-5 py-4 h-100">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fs-4 fw-bold text-gray-800 mb-1">
                                            الطلبات المكتملة
                                        </div>

                                        <div class="fs-7 text-gray-500">
                                            عدد الطلبات المكتملة
                                        </div>
                                    </div>

                                    <div class="symbol symbol-45px">
                                        <div class="symbol-label bg-light-success">
                                            <i class="ki-duotone ki-check-circle fs-2 text-success">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <span class="fs-2 fw-bold text-success">
                                        60
                                    </span>
                                </div>

                                <div class="progress h-4px mt-4">
                                    <div class="progress-bar bg-success" style="width: 75%"></div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body py-8 order-stats">

                    <div class="row g-0">

                        <!-- ===================================== -->
                        <!-- العمود الأول -->
                        <!-- ===================================== -->
                        <div class="col-xl-4 col-md-12">
                            <div class="order-column">

                                <!-- بانتظار الدفع -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-warning">
                                                <i class="ki-duotone ki-wallet fs-2 text-warning">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات بانتظار الدفع
                                        </span>
                                    </div>

                                    <span class="order-number text-primary">
                                        12
                                    </span>

                                </div>


                                <!-- قيد المعالجة -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-info">
                                                <i class="ki-duotone ki-setting-2 fs-2 text-info">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات قيد المعالجة
                                        </span>
                                    </div>

                                    <span class="order-number text-primary">
                                        18
                                    </span>

                                </div>


                                <!-- قيد الشحن -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-primary">
                                                <i class="ki-duotone ki-delivery fs-2 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات قيد الشحن
                                        </span>
                                    </div>

                                    <span class="order-number text-primary">
                                        9
                                    </span>

                                </div>

                            </div>
                        </div>


                        <!-- ===================================== -->
                        <!-- العمود الثاني -->
                        <!-- ===================================== -->
                        <div class="col-xl-4 col-md-12">
                            <div class="order-column">

                                <!-- قيد الانتظار -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-info">
                                                <i class="ki-duotone ki-time fs-2 text-info">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات قيد الانتظار
                                        </span>
                                    </div>

                                    <span class="order-number text-primary">
                                        7
                                    </span>

                                </div>


                                <!-- ملغية -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-danger">
                                                <i class="ki-duotone ki-cross-circle fs-2 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات ملغية
                                        </span>
                                    </div>

                                    <span class="order-number text-danger">
                                        5
                                    </span>

                                </div>


                                <!-- مستردة -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-danger">
                                                <i class="ki-duotone ki-arrow-left fs-2 text-danger"></i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات مستردة
                                        </span>
                                    </div>

                                    <span class="order-number text-danger">
                                        3
                                    </span>

                                </div>

                            </div>
                        </div>


                        <!-- ===================================== -->
                        <!-- العمود الثالث -->
                        <!-- ===================================== -->
                        <div class="col-xl-4 col-md-12">
                            <div class="order-column no-border">

                                <!-- فاشلة -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-danger">
                                                <i class="ki-duotone ki-information-5 fs-2 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات فاشلة
                                        </span>
                                    </div>

                                    <span class="order-number text-danger">
                                        4
                                    </span>

                                </div>


                                <!-- مكتملة -->
                                <div class="order-item">

                                    <div class="order-info">
                                        <div class="symbol symbol-45px">
                                            <div class="symbol-label bg-light-success">
                                                <i class="ki-duotone ki-check-circle fs-2 text-success">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                        </div>

                                        <span class="order-title">
                                            طلبات مكتملة
                                        </span>
                                    </div>

                                    <span class="order-number text-success">
                                        60
                                    </span>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- ============================================== -->
            <!-- قسم المبيعات -->
            <!-- ============================================== -->

            <div class="card mt-10">

                <div class="card-body py-8">

                    <div class="row g-0">

                        <!-- ====================================== -->
                        <!-- الرسم البياني -->
                        <!-- ====================================== -->
                        <div class="col-xl-8">

                            <div class="pe-xl-8">

                                <div class="text-center mb-5">
                                    <span class="fw-bold fs-5 text-gray-800">
                                        المبيعات
                                    </span>
                                </div>

                                <div style="height: 420px;">
                                    <canvas id="sales_chart"></canvas>
                                </div>

                            </div>

                        </div>


                        <!-- ====================================== -->
                        <!-- ملخص المبيعات -->
                        <!-- ====================================== -->
                        <div class="col-xl-4">

                            <div class="ps-xl-8 border-start border-gray-200 h-100">

                                <!-- المبيعات -->
                                <div
                                    class="d-flex justify-content-between align-items-center py-5 border-bottom border-gray-200 border-dashed">

                                    <span class="fs-5 fw-semibold text-gray-800">
                                        المبيعات
                                    </span>

                                    <span class="fs-4 fw-bold text-primary">
                                        12,500 ر.س
                                    </span>

                                </div>


                                <!-- تكلفة شحن الطلبات -->
                                <div
                                    class="d-flex justify-content-between align-items-center py-5 border-bottom border-gray-200 border-dashed">

                                    <span class="fs-5 fw-semibold text-gray-800">
                                        تكلفة شحن الطلبات
                                    </span>

                                    <span class="fs-4 fw-bold text-warning">
                                        1,200 ر.س
                                    </span>

                                </div>


                                <!-- تكلفة الضرائب -->
                                <div
                                    class="d-flex justify-content-between align-items-center py-5 border-bottom border-gray-200 border-dashed">

                                    <span class="fs-5 fw-semibold text-gray-800">
                                        تكلفة الضرائب
                                    </span>

                                    <span class="fs-4 fw-bold text-success">
                                        850 ر.س
                                    </span>

                                </div>


                                <!-- قيمة القسائم الشرائية -->
                                <div class="d-flex justify-content-between align-items-center py-5">

                                    <span class="fs-5 fw-semibold text-gray-800">
                                        قيمة القسائم الشرائية
                                    </span>

                                    <span class="fs-4 fw-bold text-danger">
                                        650 ر.س
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row g-5 g-xl-8 mt-5">

                <!-- ========================================== -->
                <!-- منتجات قاربت على النفاد -->
                <!-- ========================================== -->
                <div class="col-xl-4">

                    <div class="card h-100">

                        <div class="card-header border-0 pt-7">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 text-gray-800">
                                    منتجات قاربت على النفاد
                                </span>

                                <span class="text-muted mt-1 fw-semibold fs-7">
                                    المنتجات ذات الكمية المنخفضة
                                </span>
                            </h3>
                        </div>


                        <div class="card-body pt-3">

                            <!-- المنتج 1 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        هاتف بدون فتحة رجالي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 3 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    3
                                </span>

                            </div>


                            <!-- المنتج 2 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة حلق نص كم رجالي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 5 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    5
                                </span>

                            </div>


                            <!-- المنتج 3 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        منتج تجريبي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي قطعتان
                                    </span>
                                </div>

                                <span class="badge badge-light-danger fs-7">
                                    2
                                </span>

                            </div>


                            <!-- المنتج 4 -->
                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة دائرية نص كم
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 4 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    4
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة دائرية نص كم
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 4 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    4
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة دائرية نص كم
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 4 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    4
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة دائرية نص كم
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 4 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    4
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-warning">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-warning">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">
                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة دائرية نص كم
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        متبقي 4 قطع
                                    </span>
                                </div>

                                <span class="badge badge-light-warning fs-7">
                                    4
                                </span>

                            </div>

                            <div class="text-center pt-5">
                                <a href="#" class="btn btn-sm btn-light-primary">
                                    عرض المزيد
                                </a>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- ========================================== -->
                <!-- منتجات نفدت -->
                <!-- ========================================== -->
                <div class="col-xl-4">

                    <div class="card h-100">

                        <div class="card-header border-0 pt-7">
                            <h3 class="card-title align-items-start flex-column">

                                <span class="card-label fw-bold fs-3 text-gray-800">
                                    منتجات نفدت
                                </span>

                                <span class="text-muted mt-1 fw-semibold fs-7">
                                    المنتجات غير المتوفرة حاليًا
                                </span>

                            </h3>
                        </div>


                        <div class="card-body pt-3">

                            <!-- المنتج 1 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        هاتف بناتي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        هاتف بناتي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        هاتف بناتي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        هاتف بناتي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        هاتف بناتي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>

                            <!-- المنتج 2 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        ثوب سعودي رجالي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>


                            <!-- المنتج 3 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        تي شيرت رجالي ملون
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>


                            <!-- المنتج 4 -->
                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-danger">
                                        <i class="ki-duotone ki-cube-2 fs-2 text-danger">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة ولادي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        المخزون نفد
                                    </span>

                                </div>

                                <span class="badge badge-light-danger">
                                    0
                                </span>

                            </div>


                            <div class="text-center pt-5">
                                <a href="#" class="btn btn-sm btn-light-danger">
                                    عرض المزيد
                                </a>
                            </div>

                        </div>

                    </div>
                </div>


                <!-- ========================================== -->
                <!-- المنتجات الأكثر طلباً -->
                <!-- ========================================== -->
                <div class="col-xl-4">

                    <div class="card h-100">

                        <div class="card-header border-0 pt-7">

                            <h3 class="card-title align-items-start flex-column">

                                <span class="card-label fw-bold fs-3 text-gray-800">
                                    المنتجات الأكثر طلباً
                                </span>

                                <span class="text-muted mt-1 fw-semibold fs-7">
                                    المنتجات الأعلى مبيعاً
                                </span>

                            </h3>

                        </div>


                        <div class="card-body pt-3">
                            <!-- المنتج 1 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        PROMAN ELITE
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        145 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    145
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        PROMAN ELITE
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        145 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    145
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        PROMAN ELITE
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        145 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    145
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        PROMAN ELITE
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        145 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    145
                                </span>

                            </div>

                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        PROMAN ELITE
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        145 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    145
                                </span>

                            </div>


                            <!-- المنتج 2 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        PROMAN BASIC
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        120 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    120
                                </span>

                            </div>


                            <!-- المنتج 3 -->
                            <div class="d-flex align-items-center mb-7">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        سروال طويل رجالي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        98 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    98
                                </span>

                            </div>


                            <!-- المنتج 4 -->
                            <div class="d-flex align-items-center mb-5">

                                <div class="symbol symbol-55px me-5">
                                    <span class="symbol-label bg-light-success">
                                        <i class="ki-duotone ki-chart-simple fs-2 text-success">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </span>
                                </div>

                                <div class="d-flex flex-column flex-grow-1">

                                    <span class="text-gray-800 fw-bold fs-6 mb-1">
                                        فانيلة ولادي
                                    </span>

                                    <span class="text-muted fw-semibold fs-7">
                                        87 طلب
                                    </span>

                                </div>

                                <span class="badge badge-light-success">
                                    87
                                </span>

                            </div>


                            <div class="text-center pt-5">
                                <a href="#" class="btn btn-sm btn-light-success">
                                    عرض المزيد
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const canvas = document.getElementById('sales_chart');

            if (!canvas) {
                return;
            }

            const ctx = canvas.getContext('2d');

            new Chart(ctx, {

                type: 'line',

                data: {

                    labels: [
                        '1',
                        '2',
                        '3',
                        '4',
                        '5',
                        '6',
                        '7',
                        '8',
                        '9',
                        '10',
                        '11',
                        '12'
                    ],

                    datasets: [

                        {
                            label: 'المبيعات',

                            data: [
                                1200,
                                1600,
                                1400,
                                2200,
                                1900,
                                2800,
                                2500,
                                3100,
                                2900,
                                3500,
                                3200,
                                4000
                            ],

                            borderColor: '#009ef7',
                            backgroundColor: '#009ef7',

                            borderWidth: 2,

                            tension: 0.4,

                            pointRadius: 3,

                            pointHoverRadius: 5
                        },


                        {
                            label: 'تكلفة شحن الطلبات',

                            data: [
                                200,
                                250,
                                220,
                                300,
                                280,
                                350,
                                330,
                                390,
                                370,
                                420,
                                400,
                                450
                            ],

                            borderColor: '#ffc700',
                            backgroundColor: '#ffc700',

                            borderWidth: 2,

                            tension: 0.4,

                            pointRadius: 3
                        },


                        {
                            label: 'تكلفة الضرائب',

                            data: [
                                100,
                                150,
                                130,
                                170,
                                160,
                                210,
                                200,
                                240,
                                230,
                                270,
                                260,
                                300
                            ],

                            borderColor: '#50cd89',
                            backgroundColor: '#50cd89',

                            borderWidth: 2,

                            tension: 0.4,

                            pointRadius: 3
                        },


                        {
                            label: 'قيمة القسائم الشرائية',

                            data: [
                                50,
                                80,
                                70,
                                120,
                                90,
                                140,
                                100,
                                160,
                                130,
                                180,
                                150,
                                200
                            ],

                            borderColor: '#f1416c',
                            backgroundColor: '#f1416c',

                            borderWidth: 2,

                            tension: 0.4,

                            pointRadius: 3
                        }

                    ]

                },


                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    interaction: {
                        mode: 'index',
                        intersect: false
                    },

                    plugins: {

                        legend: {
                            display: true,

                            position: 'top',

                            labels: {
                                usePointStyle: false,
                                boxWidth: 40,
                                padding: 20
                            }
                        }

                    },


                    scales: {

                        x: {

                            title: {
                                display: true,
                                text: 'اليوم'
                            },

                            grid: {
                                display: false
                            }

                        },


                        y: {

                            beginAtZero: true,

                            title: {
                                display: true,
                                text: 'القيمة'
                            },

                            grid: {
                                color: '#eff2f5'
                            }

                        }

                    }

                }

            });

        });
    </script>
@endsection