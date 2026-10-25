<?php
$value = "";
$field_name = $field["name"];
if (isset($record))
    $value = $record->$field_name;
?>
<div class="fv-row col-md-6 mb-7">
    <!--begin::Label-->
    <label class="d-block fw-bold fs-6 mb-5 @if($field["is_required"])
               required
        @endif">{{$field["label"]}}</label>
    <!--end::Label-->
    <!--begin::Image input-->
    <div class="image-input image-input-outline" data-kt-image-input="true"
         style="background-image: url({{asset('img/blank.svg')}})">
        <!--begin::Preview existing avatar-->
        <div class="image-input-wrapper w-125px h-125px"
             style="background-image: url('{{ isset($value) && $value ? asset('img/' . $value) : asset('img/profilepic.jpg') }}')"></div>
        <!--end::Preview existing avatar-->
        <!--begin::Label-->
        <label
            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change" data-bs-toggle="tooltip"
            title="تغيير {{ $field["label"]}}">
            <i class="bi bi-pencil-fill fs-7"></i>
            <!--begin::Inputs-->
            <input type="file" value="{{asset('img/' . $value)}}" name="{{$field["name"]}}" accept=".png, .jpg, .jpeg"/>
            <input type="hidden" value="{{asset('img/' . $value)}}" name="{{$field["name"]}}"/>
            <!--end::Inputs-->
        </label>
        <!--end::Label-->
        <!--begin::Cancel-->
        <span
            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
            title="حذف {{ $field["label"]}}">
            <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Cancel-->
        <!--begin::Remove-->
        <span
            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
            title="Remove {{__("app." . $field["name"])}}">
            <i class="bi bi-x fs-2"></i>
        </span>
        <!--end::Remove-->
    </div>
    <!--end::Image input-->
    <!--begin::Hint-->
    <div class="form-text">أنواع الملفات المسموح بها: png، jpg، jpeg.</div>
    <!--end::Hint-->
</div>

