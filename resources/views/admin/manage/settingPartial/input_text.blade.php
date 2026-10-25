<?php
$value = "";
$field_name = $field["name"];
if (isset($record))
    $value = $record->$field_name;
?>
<div class="row mb-6">
    <!--begin::Label-->
    <label for="{{$field["name"]}}" class="col-lg-4 col-form-label required fw-bold fs-6">{{$field["label"]}}</label>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-6 fv-row">
                <input type="text" id="{{$field["name"]}}" name="{{$field["name"]}}"
                       class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="{{$field["label"]}}"
                       @if($field["is_readonly"])
                           readonly
                       @endif
                       @if($field["is_required"])
                           required
                       @endif value="{{$value}}"/>
            </div>
        </div>
    </div>
</div>
