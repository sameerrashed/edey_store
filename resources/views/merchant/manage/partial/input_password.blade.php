<?php
$value = "";
$field_name = $field["name"];
if (isset($record))
    $value = $record->$field_name;
?>
<div class="fv-row mb-7">
    <!--end::Label-->
    <label  for="{{$field["name"]}}" class="fs-5 fw-bold mb-5 @if($field["is_required"])
               required
        @endif">{{$field["label"]}}</label>
    <!--end::Label-->
    <!--end::Input-->
    <input type="password" id="{{$field["name"]}}" style="background-color: #edf0f2;" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" name="{{$field["name"]}}"
           @if($field["is_readonly"])
               readonly
           @endif
           @if($field["is_required"])
               required
           @endif value="{{$value}}"/>
    <!--end::Input-->
</div>

