<?php
$value = date("Y-m-d");
$field_name = $field["name"];
if (isset($record)) {
    $value = $record->$field_name;
}
?>
<div class="col-md-2 form-group">
    <label for="{{$field["name"]}}">{{ $field["label"] }}</label>
</div>
<div class="col-md-4 form-group">
    <div class="input-group date">
        <input value="{{$value}}" type="text" class="form-control
                @if(in_array($field["name"], ["proceeding_date"])) hijri-date-input @else datepicker @endif"
            name="{{$field["name"]}}" id="{{$field["name"]}}">
        <div class="input-group-append">
            <span class="input-group-text">
                <i class="fa-solid fa-calendar-days"></i>
            </span>
        </div>
    </div>
    <div class="{{$field["name"]}}_error text-danger"></div>
</div>