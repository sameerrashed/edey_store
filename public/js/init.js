function update_product_attributes() {
    vm.product_attributes.forEach(function (t) {
        $(".m_select_attribute_values_form_" + t.id).empty();
        t.attribute_values.forEach(function (t2) {
            var selected = false;

            t.selected.forEach(function (t3) {
                if (t3 == t2.id) {
                    selected = true;
                }
            });

            $(".m_select_attribute_values_form_" + t.id).append(new Option(t2.name, t2.id, selected, selected));
        });

    });
}

function add_product_attributes(attribute_id, attribute, get_selected =[]) {
    $(".m_select_attribute_values_form_" + attribute_id).select2({placeholder: "اختار القيمة/القيم"});
    attribute.attribute_values.forEach(function (t) {
        let set_selected = false;
        if (get_selected.includes(t.id)) {
            set_selected = true;
        }
        $(".m_select_attribute_values_form_" + attribute_id).append(new Option(t.name, t.id, set_selected, set_selected));
    });

    $(".m_select_attribute_values_form_" + attribute_id).change(function () {
        var attribute_id = $(this).parent().parent().find('.attribute_id').val();
        var get_index = -1;
        vm.product_attributes.forEach(function (t, index) {
            if (t.id == attribute_id) {
                get_index = index;
            }
        });

        vm.product_attributes[get_index].selected = $(this).val();

        var checked = [];
        $.each($("input[name='selected_attributes']:checked"), function () {
            checked.push($(this).val());
        });

        if (checked.includes(attribute_id + "") || checked.includes(attribute_id)) {
            $.each($("input[name='selected_attributes']:checked"), function () {
                $(this).prop('checked', false);

            });

            vm.get_variations();
        }

        Vue.nextTick(function () {

        });


    });

}

function init_dropzones(get_random_id) {
    //  const result = vm.attribute_value_variations.find((random_id) => random_id === get_random_id);
    let result = vm.attribute_value_variations.find(x => x.random_id === get_random_id
)
    ;
    var id = "#mDropzoneProductImagesV" + get_random_id;
    new Dropzone(id, {
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 5,
        maxFilesize: 10000,
        addRemoveLinks: true,
        accept: function (e, o) {
            // alert(e.name + " : 1");
            result.product_variation.images.push(e);
            // vm.files.push(e);
            "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
        },
        removedfile: function (file) {
            result.product_variation.images.splice(result.product_variation.images.indexOf(file), 1);
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        },
        success: function (file, response) {

            // vm.files.push(file);
        },
    });
}

function init_dropzones_edit(get_random_id, get_product_variation_images) {
    //destroy_dropzones(get_random_id);
    //  const result = vm.attribute_value_variations.find((random_id) => random_id === get_random_id);
    let result = vm.attribute_value_variations.find(x => x.random_id === get_random_id
)
    ;
    var id = "#mDropzoneProductImagesV" + get_random_id;
    let myDropzoneEdit = new Dropzone(id, {
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 5,
        maxFilesize: 10000,
        addRemoveLinks: true,
        accept: function (e, o) {
            // alert(e.name + " : 1");
            result.product_variation.images.push(e);
            // vm.files.push(e);
            "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
        },
        removedfile: function (file) {
            if (file instanceof File) {
                // console.log('file');
            } else {

                vm.edit_images_removed.push(get_file_name(file.name));
                // console.log('not file');
            }
            result.product_variation.images.splice(result.product_variation.images.indexOf(file), 1);
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        },
        success: function (file, response) {

            // vm.files.push(file);
        },
    });

    get_product_variation_images.forEach(function (t) {
        var mockFile = {name: t.image, size: 0};
        myDropzoneEdit.emit("addedfile", mockFile);
        myDropzoneEdit.options.thumbnail.call(myDropzoneEdit, mockFile, t.image);
        myDropzoneEdit.emit("complete", mockFile);
    });


}

function destroy_dropzones(get_random_id) {
    var id = "#mDropzoneProductImagesV" + get_random_id;
    try {
        Dropzone.forElement(id).removeAllFiles(true);
        Dropzone.forElement(id).destroy();
    } catch (err) {

    }

    $('#buttonmDropzoneProductImagesV' + get_random_id).removeClass('hidden');
    $('#mDropzoneProductImagesV' + get_random_id).addClass('hidden');


}

function init_date_range_picker(get_random_id, discount_start_at, discount_end_at) {
    //  const result = vm.attribute_value_variations.find((random_id) => random_id === get_random_id);
    let result = vm.attribute_value_variations.find(x => x.random_id === get_random_id
)
    ;
    var id = "#m_daterangepicker_variations" + get_random_id;
    $(id).daterangepicker({
        buttonClasses: "m-btn btn",
        applyClass: "btn-primary",
        cancelClass: "btn-secondary",
        timePicker: true,
        locale: {
            format: 'YYYY-MM-DD hh:mm A'
        }
    }, function (a, t, n) {

        $(id + " .form-control").val(a.format("YYYY-MM-DD hh:mm A") + " / " + t.format("YYYY-MM-DD hh:mm A"));
        result.product_variation.discount_start_at = a.format("YYYY-MM-DD hh:mm A");
        result.product_variation.discount_end_at = t.format("YYYY-MM-DD hh:mm A");
    });
    if (discount_start_at) {
        $(id + " .form-control").val(discount_start_at + " / " + discount_end_at);
        $(id).data('daterangepicker').setStartDate(discount_start_at);
        $(id).data('daterangepicker').setEndDate(discount_end_at);
    }


}

Dropzone.autoDiscover = false;
$(document).ready(function () {
    $("#m_select_remote_recommended_products").select2({
        placeholder: "ابحث عن المنتجات",
        allowClear: !0,
        ajax: {
            // url: "https://api.github.com/search/repositories",
            url: get_url + "/admin/get-remote-ajax-products",
            dataType: "json",
            delay: 250,

            data: function (e) {
                return {q: e.term, page: e.page}
            },
            processResults: function (e, t) {
                return t.page = t.page || 1, {results: e.items, pagination: {more: e.incomplete_results}}
            },
            cache: !0
        },
        escapeMarkup: function (e) {
            return e
        },
        minimumInputLength: 3,
        language: {
            inputTooShort: function () {
                return 'الرجاء إدخال 3 أحرف أو أكثر';
            }
        },
        templateResult: function (e) {
            if (e.loading) return e.name;
            return e.name || e.text;
        },
        templateSelection: function (e) {
            return e.name || e.text;
        },
    });
    $("#m_select_remote_marketing_products").select2({
        placeholder: "ابحث عن المنتجات",
        allowClear: !0,
        ajax: {
            // url: "https://api.github.com/search/repositories",
            url: get_url + "/admin/get-remote-ajax-products",
            dataType: "json",
            delay: 250,

            data: function (e) {
                return {q: e.term, page: e.page}
            },
            processResults: function (e, t) {
                return t.page = t.page || 1, {results: e.items, pagination: {more: e.incomplete_results}}
            },
            cache: !0
        },
        escapeMarkup: function (e) {
            return e
        },
        minimumInputLength: 3,
        language: {
            inputTooShort: function () {
                return 'الرجاء إدخال 3 أحرف أو أكثر';
            }
        },
        templateResult: function (e) {
            if (e.loading) return e.name;
            return e.name || e.text;
        },
        templateSelection: function (e) {
            return e.name || e.text;
        },
    });
    $("#m_select_remote_sub_products").select2({
        placeholder: "ابحث عن المنتجات",
        allowClear: !0,
        ajax: {
            // url: "https://api.github.com/search/repositories",
            url: get_url + "/admin/get-remote-ajax-products",
            dataType: "json",
            delay: 250,

            data: function (e) {
                return {q: e.term, page: e.page}
            },
            processResults: function (e, t) {
                return t.page = t.page || 1, {results: e.items, pagination: {more: e.incomplete_results}}
            },
            cache: !0
        },
        escapeMarkup: function (e) {
            return e
        },
        minimumInputLength: 3,
        language: {
            inputTooShort: function () {
                return 'الرجاء إدخال 3 أحرف أو أكثر';
            }
        },
        templateResult: function (e) {
            if (e.loading) return e.name;
            return e.name || e.text;
        },
        templateSelection: function (e) {
            return e.name || e.text;
        },
    });


    $(".m_select_attribute_values_form").select2({placeholder: "اختار القيمة/القيم"});
    $("#select_categories").select2({
        placeholder: "اختار الصنف/التصنيفات",

    });
    $("#select_brands").select2({placeholder: "اختار الماركة"});
    $("#select_countries").select2({placeholder: "اختار الدول"});
    $("#select_excluded_countries").select2({placeholder: "اختار الدول"});

    var myDropzone1 = new Dropzone("#mDropzoneProductImages", {
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 5,
        maxFilesize: 10000,
        addRemoveLinks: true,
        accept: function (e, o) {
            vm.images.push(e);
            "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
        },
        removedfile: function (file) {
            if (file instanceof File) {

            } else {
                vm.edit_product_images_removed.push(get_file_name(file.name));
                // console.log(vm.edit_images_removed);
            }
            vm.images.splice(vm.images.indexOf(file), 1);
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        },
        success: function (file, response) {

            // vm.files.push(file);
        },
    });

    $("input[name='select_if_country']").change(function () {

        var value = $(this).val();
        if (value == 1) {
            $("#select_countries").val(null).trigger('change');
            $('.select_country_data').addClass('hidden');
        } else {
            $('.select_country_data').removeClass('hidden');
        }

    });


    /*  date range picker  */
    $("#m_daterangepicker_general").daterangepicker({
        buttonClasses: "m-btn btn",
        applyClass: "btn-primary",
        cancelClass: "btn-secondary",
        timePicker: true,
        locale: {
            format: 'YYYY-MM-DD hh:mm A'
        }
    }, function (a, t, n) {

        $("#m_daterangepicker_general .form-control").val(a.format("YYYY-MM-DD hh:mm A") + " / " + t.format("YYYY-MM-DD hh:mm A"));
        vm.product.discount_start_at = a.format("YYYY-MM-DD hh:mm A");
        vm.product.discount_end_at = t.format("YYYY-MM-DD hh:mm A");
    });
    $("#m_daterangepicker_general_2").daterangepicker({
        buttonClasses: "m-btn btn",
        applyClass: "btn-primary",
        cancelClass: "btn-secondary",
        timePicker: true,
        locale: {
            format: 'YYYY-MM-DD hh:mm A'
        }
    }, function (a, t, n) {

        $("#m_daterangepicker_general_2 .form-control").val(a.format("YYYY-MM-DD hh:mm A") + " / " + t.format("YYYY-MM-DD hh:mm A"));
        vm.product.discount_start_at = a.format("YYYY-MM-DD hh:mm A");
        vm.product.discount_end_at = t.format("YYYY-MM-DD hh:mm A");
    });

    var m_datetimepicker_5 = $("#m_datetimepicker_5").datetimepicker({
        format: "yyyy-mm-dd HH:ii P",
        showMeridian: !0,
        todayHighlight: !0,
        autoclose: !0,
        pickerPosition: "bottom-left",

    });
    m_datetimepicker_5.on('change', function (ev) {
        vm.product.date_of_publication = $('#m_datetimepicker_5').val();
    });

    /* ****************  */
    //console.log(Dropzone.forElement("#mDropzoneProductImages"));
    /*
    var myDropzone2 = new Dropzone("#mDropzoneProductImages2" , {
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 5,
        maxFilesize: 10000,
        addRemoveLinks: true,
        accept: function (e, o) {
            alert(e.name + " : 2");
            //  vm.files.push(e);
            "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
        },
        removedfile: function (file) {
            // vm.files.splice(vm.files.indexOf(file), 1);
             var _ref;
             return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        },
        success: function (file, response) {

            // vm.files.push(file);
        },
    });
*/

    /*
    var myDropzone3 = new Dropzone("#mDropzoneProductImages3" , {
        autoProcessQueue: false,
        paramName: "file",
        maxFiles: 5,
        maxFilesize: 10000,
        addRemoveLinks: true,
        accept: function (e, o) {
            alert(e.name + " : 3");
            //  vm.files.push(e);
            "justinbieber.jpg" == e.name ? o("Naha, you don't.") : o()
        },
        removedfile: function (file) {
            // vm.files.splice(vm.files.indexOf(file), 1);
             var _ref;
             return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;

        },
        success: function (file, response) {

            // vm.files.push(file);
        },
    });
    $('#remove_test').click(function () {
        var mockFile = { name: "logo-2.png", size: 12345678  };
        myDropzone1.emit("addedfile", mockFile);
        myDropzone1.options.thumbnail.call(myDropzone1, mockFile, 'http://67.205.145.165/uploads/admins/L0QK9NKirDO7nxNIlQPl2TvMIYXIoBoaPD57e6Kb1572794237.png');


        var mockFile = { name: "logo-1.png", size: 12345678  };
        myDropzone1.emit("addedfile", mockFile);
        myDropzone1.options.thumbnail.call(myDropzone1, mockFile, 'http://67.205.145.165/admin_assets/assets/demo/default/media/img/logo/logo-2.png');

        // Make sure that there is no progress bar, etc...
        myDropzone1.emit("complete", mockFile);

        
       // Dropzone.forElement("#mDropzoneProductImages").removeAllFiles(true);

    });
    myDropzone3.destroy();
    */


});


