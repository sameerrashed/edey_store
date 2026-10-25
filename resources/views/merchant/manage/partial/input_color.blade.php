<?php
$value = "#646c9a";
$field_name = $field["name"];
if (isset($record))
    $value = $record->$field_name
?>
<div class="mb-7" id="category_select_box">

    <label class="required fw-semibold fs-6 mb-2">
        {{ $field["label"] }}
    </label>

    <input style="background-color: #edf0f2;" class="form-control form-control-solid mb-3 mb-lg-0" type="color"
        name="{{$field_name}}" id="{{$field_name}}" @if($field["is_required"]) required @endif>
</div>