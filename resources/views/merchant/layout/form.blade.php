@extends('admin.layout._layout')
@section('title','ايدي ستور')
@section("body")
    <form action="
    @if(isset($record))
    {{route("admin.".$parent_title.".update",$record->id)}}
    @else
    {{route("admin.".$parent_title.".store")}}
    @endif" class="form form-wrapper mb-15" method="post" id="kt_contact_form"
          style="">
        @csrf
        @if(isset($record))
            @method("PATCH")
        @endif
        <!--begin::Input group-->
        <div class="row mb-5">
            @foreach($fields as $field)
                @switch($field["type"])
                    @case("text")
                        @include("admin.manage.partial.input_text",["field" => $field])
                        @break
                    @case("file")
                        @include("admin.manage.partial.input_file",["field" => $field])
                        @break
                @endswitch
            @endforeach
        </div>
        <!--begin::Submit-->
        <button type="submit" class="btn btn-primary" id="kt_contact_submit_button">
            <!--begin::Indicator-->
            <span class="indicator-label">Save</span>
            <span class="indicator-progress">Please wait...
														<span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            <!--end::Indicator-->
        </button>
        <!--end::Submit-->
    </form>
@endsection
