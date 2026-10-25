<?php
$value = "";
$field_name = $field["name"];
if (isset($record))
    $value = $record->$field_name;
?>
<div class="fv-row mb-7">
    <select name="category_id" aria-label="Select a Country" data-control="select2"
            data-placeholder="Select a country..."
            class="form-select form-select-solid form-select-lg fw-bold">
        <option value="">{{$field["label"]}}</option>
        @foreach($data as $record)
            <option value="{{$record->id}}">{{$record->name}}</option>
        @endforeach
    </select>
</div>

