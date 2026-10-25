var vm = new Vue({
    el: '#app',
    data: {

        attr_name: 'image',
        selector_id_image: 'image1',
        default_image: JSON.parse(JSON.stringify(default_image)),
        shock_event: '',
        obj: '',
        shock_multi_image_event: '',

        product: {
            name_ar: '',
            name_en: '',
            cost_price: '',
            regular_price: '',
            discount_price: '',
            tax_status_id: 1,
            stock_status_id: 1,
            stock_quantity: '',
            sku: '',
            remain_product_count_in_low_stock: 2,
            description_en: '',
            description_ar: '',
            min_quantity: 1,
            max_quantity: 99,
            weight: '',
            length: '',
            width: '',
            height: '',
            image: '',
            discount_start_at: '',
            discount_end_at: '',
            publication_status: '',
            date_of_publication: '',

        },
        images: [],
        product_attributes: [],
        msg: {
            success: '',
            error: ''
        },
        add: true,
        edit_id: '',

        loading: false,
        import_loading: false,
        delete_loading: false,

        edit_row: '',

        /*  data */
        tax_status: tax_status,
        stock_status: stock_status,
        attributes: attributes,
        categories: categories,
        brands: brands,
        main_categories: main_categories,
        get_categories_with_children: get_categories_with_children,
        main_category: '',
        countries: countries,
        /* variations */
        product_type: 1,
        selected_attributes: [],
        attribute_value_variations: [],
        files: [],

        edit_images_removed: [],
        edit_product_images_removed: [],
        edit_product_variations: [],
    },


    created: function () {

    },

    computed: {
        product_variation: function () {
            var get_product = {
                cost_price: this.product.cost_price,
                regular_price: this.product.regular_price,
                discount_price: this.product.discount_price,
                stock_status_id: this.product.stock_status_id,
                stock_quantity: this.product.stock_quantity,
                sku: this.product.sku,
                remain_product_count_in_low_stock: this.product.remain_product_count_in_low_stock,
                description_en: '',
                description_ar: '',
                min_quantity: this.product.min_quantity,
                max_quantity: this.product.max_quantity,
                weight: this.product.weight,
                length: this.product.length,
                width: this.product.width,
                height: this.product.height,
                images: [],
                discount_start_at: this.product.discount_start_at,
                discount_end_at: this.product.discount_end_at,
                publication_status: this.product.publication_status,
                date_of_publication: this.product.date_of_publication,

            };
            return get_product;
        },
        hide_variation: function () {
            if (!this.add && this.product_type == 2) {
                return false;
            } else {
                return true;
            }
        }
    },
    methods: {

        setData: function (add, data) {
            this.default_image = add ? JSON.parse(JSON.stringify(default_image)) : data.image;
            this.shock_event = makeid(32);
        },

        set_product_varition_data: function (product_varition) {
            var get_product = {

                cost_price: product_varition.cost_price,
                regular_price: product_varition.regular_price,
                discount_price: product_varition.discount_price,
                stock_status_id: product_varition.stock_status_id,
                stock_quantity: product_varition.stock_quantity,
                sku: product_varition.sku,
                remain_product_count_in_low_stock: product_varition.remain_product_count_in_low_stock,
                description_en: product_varition.description_en,
                description_ar: product_varition.description_ar,
                min_quantity: product_varition.min_quantity,
                max_quantity: product_varition.max_quantity,
                weight: product_varition.product_shipping ? product_varition.product_shipping.weight : 0,
                length: product_varition.product_shipping ? product_varition.product_shipping.length : 0,
                width: product_varition.product_shipping ? product_varition.product_shipping.width : 0,
                height: product_varition.product_shipping ? product_varition.product_shipping.height : 0,
                images: product_varition.images,
                discount_start_at: product_varition.discount_start_at,
                discount_end_at: product_varition.discount_end_at
            };
            return get_product;
        },
        validateForm: function (event, publication_status) {

            if (vm.add) {
                vm.add_product(publication_status);
            } else {

                vm.update_product(publication_status);
            }
            return;
            vm.$validator.validateAll().then(function (valid) {
                if (valid) {
                    if (vm.add) {
                        vm.add_product();
                    } else {

                        vm.update_product();
                    }

                }
            });
        },

        empty_category: function () {
            this.add = true;
            var empty_product = {};

            this.product = empty_product;
        },

        reset_validation: function () {
            vm.$validator.reset();
        },

        add_product: function (publication_status) {

            var checked = [];
            $.each($("input[name='selected_attributes']:checked"), function () {
                checked.push($(this).val());
            });

            var formData = new FormData();

            this.loading = true;
            this.product.description_ar = $('#description_ar').summernote('code');
            this.product.description_en = $('#description_en').summernote('code');


            Object.keys(this.product).forEach(function (key) {
                formData.append(key, vm.product[key]);
            });
            formData.append('images', JSON.stringify(vm.images));

            this.attribute_value_variations.forEach(function (value, index) {
                let file_name = "image_" + value.random_id;
                value.product_variation.images.forEach(function (t, index_) {
                    formData.append(file_name + '[' + index_ + ']', t);
                });

            });

            var in_day_deal = $('#in_day_deal').is(':checked') ? 1 : 0;
            var is_exclusive = $('#is_exclusive').is(':checked') ? 1 : 0;
            var in_offer = $('#in_offer').is(':checked') ? 1 : 0;


            var product_attributes = JSON.stringify(this.product_attributes);
            var attribute_value_variations = JSON.stringify(this.attribute_value_variations);
            var categories = $('#select_categories').val();
            var brand_id = $('#select_brands').val();
            var recommended_products = $('#m_select_remote_recommended_products').val();
            var marketing_products = $('#m_select_remote_marketing_products').val();
            var sub_products = $('#m_select_remote_sub_products').val();


            formData.append('publication_status', publication_status);
            formData.append('product_type', this.product_type);
            formData.append('product_attributes', product_attributes);
            formData.append('attribute_value_variations', attribute_value_variations);
            formData.append('categories', categories);
            formData.append('brand_id', brand_id);
            formData.append('recommended_products', recommended_products);
            formData.append('marketing_products', marketing_products);
            formData.append('sub_products', sub_products);

            formData.append('checked_variations', JSON.stringify(checked));

            formData.append('select_country', $("input[name='select_if_country']:checked").val());
            formData.append('countries', $("#select_countries").val());
            formData.append('excluded_countries', $("#select_excluded_countries").val());

            formData.append('in_day_deal', in_day_deal);
            formData.append('is_exclusive', is_exclusive);
            formData.append('in_offer', in_offer);


            axios.post(get_url + "/admin/products/add", formData).then(function (res) {

                vm.loading = false;
                var get_res = handle_product_response(res.data);

                scroll_to_div('.m-dropdown__wrapper');
                if (get_res) {
                    setTimeout(function () {
                        window.location = "";
                    }, 2000);

                }
            }).catch(function (err) {
                vm.loading = false;
            });

        },
        update_product: function (publication_status) {

            var checked = [];
            $.each($("input[name='selected_attributes']:checked"), function () {
                checked.push($(this).val());
            });

            var formData = new FormData();

            this.loading = true;
            this.product.description_ar = $('#description_ar').summernote('code');
            this.product.description_en = $('#description_en').summernote('code');

            Object.keys(this.product).forEach(function (key) {
                formData.append(key, vm.product[key]);
            });

            formData.append('images', JSON.stringify(vm.images));
            // this.images.forEach(function (value, index) {
            //     formData.append('images[' + index + ']', value);
            // });

            this.attribute_value_variations.forEach(function (value, index) {
                let file_name = "image_" + value.random_id;
                value.product_variation.images.forEach(function (t, index_) {
                    formData.append(file_name + '[' + index_ + ']', t);
                });

            });

            var in_day_deal = $('#in_day_deal').is(':checked') ? 1 : 0;
            var is_exclusive = $('#is_exclusive').is(':checked') ? 1 : 0;
            var in_offer = $('#in_offer').is(':checked') ? 1 : 0;


            var product_attributes = JSON.stringify(this.product_attributes);
            var attribute_value_variations = JSON.stringify(this.attribute_value_variations);
            var categories = $('#select_categories').val();
            var brand_id = $('#select_brands').val();
            var recommended_products = $('#m_select_remote_recommended_products').val();
            var marketing_products = $('#m_select_remote_marketing_products').val();
            var sub_products = $('#m_select_remote_sub_products').val();

            vm.product.publication_status = publication_status;
            formData.append('id', product.id);
            formData.append('publication_status', publication_status);
            formData.append('product_type', this.product_type);
            formData.append('product_attributes', product_attributes);
            formData.append('attribute_value_variations', attribute_value_variations);
            formData.append('categories', categories);
            formData.append('brand_id', brand_id);
            formData.append('recommended_products', recommended_products);
            formData.append('marketing_products', marketing_products);
            formData.append('sub_products', sub_products);

            formData.append('edit_images_removed', JSON.stringify(this.edit_images_removed));
            formData.append('edit_product_images_removed', JSON.stringify(this.edit_product_images_removed));
            formData.append('checked_variations', JSON.stringify(checked));

            formData.append('select_country', $("input[name='select_if_country']:checked").val());
            formData.append('countries', $("#select_countries").val());
            formData.append('excluded_countries', $("#select_excluded_countries").val());

            formData.append('in_day_deal', in_day_deal);
            formData.append('is_exclusive', is_exclusive);
            formData.append('in_offer', in_offer);


            axios.post(get_url + "/admin/products/update", formData).then(function (res) {

                console.log(res.data);
                vm.loading = false;

                //   return;

                var get_res = handle_product_response(res.data);

                scroll_to_div('.m-dropdown__wrapper');
                if (get_res) {

                }
            }).catch(function (err) {
                vm.loading = false;
            });

        },
        show_delete: function () {

            swal({
                title: translations['sure_delete'],
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: translations['yes_delete'],
                cancelButtonText: translations['no_delete'],
                reverseButtons: !0
            }).then(function (e) {
                if (e.value) {
                    vm.delete_product(product);
                } else {
                    e.dismiss && swal(translations['cancelled_delete'], translations['didnt_delete'], "error")
                }

            });
        },
        delete_product: function (product) {

            swal({
                title: translations['pending_delete'],
                showConfirmButton: false,
                onOpen: function () {
                    // swal.showLoading()
                }
            })

            axios.post(get_url + "/admin/products/delete",
                {
                    id: product.id
                }
            ).then(function (res) {

                var get_res = handle_response(res.data);
                if (get_res) {
                    swal(translations['success_delete'], translations['done_delete'], "success");
                    setTimeout(function () {
                        window.location = "/admin/products";
                    }, 1000)
                }

            }).catch(function (err) {

            });

        },
        get_file: function (event, selector) {
            var file = event.target.files[0];
            if (file) {
                this.product['image'] = file;
                read_url(event.target, selector);
            } else {
                this.product['image'] = '';
            }

        },


        /*  attributes */
        add_new_attribute: function () {
            var attribute_id = $('#select_attribute').val();

            var found = this.product_attributes.some(function (el) {
                return el.id == attribute_id;
            });
            if (!found && attribute_id != null) {
                var attribute = '';
                this.attributes.forEach(function (t) {
                    if (t.id == attribute_id) {
                        attribute = t;
                    }
                });
                attribute.selected = [];
                this.product_attributes.push(attribute);

                Vue.nextTick(function () {
                    add_product_attributes(attribute_id, attribute);
                });
            }


        },
        delete_product_attribute: function (index, attribute_id) {

            this.product_attributes.splice(index, 1);
            Vue.nextTick(function () {
                update_product_attributes();

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

                /*
                $.each($("input[name='selected_attributes']"), function () {
                    $(this).prop('checked', false);
                    if($(this).val() == attribute_id) {
                        $.each($("input[name='selected_attributes']"), function () {
                            $(this).prop('checked', false);
                        });
                    }


                });
                vm.get_variations();
                */

            });


        },
        check_attributes_used: function (attribute_id) {
            var found = this.product_attributes.some(function (el) {
                return el.id == attribute_id;
            });
            return found;
        },

        /*  in edit product  */
        set_attribute: function (product_attributes) {

            product_attributes.forEach(function (value) {

                var attribute = '';
                this.attributes.forEach(function (t) {

                    if (t.id == value.attribute_id) {
                        attribute = t;
                    }
                });


                let get_attribute_value_ids = pluck_('attribute_value_id');
                let get_attribute_values_selected = get_attribute_value_ids(value.attribute_values);

                attribute.selected = get_attribute_values_selected;
                vm.product_attributes.push(attribute);

                Vue.nextTick(function () {
                    add_product_attributes(value.attribute_id, attribute, get_attribute_values_selected);

                });
            });


        },
        edit_product: function (product) {


            this.add = false;
            this.product.name_ar = product.name_ar;
            this.product.name_en = product.name_en;
            this.product.tax_status_id = product.tax_status_id;
            this.product.publication_status = product.publication_status;
            this.product.date_of_publication = product.date_of_publication;

            this.product.cost_price = product.variation.cost_price;
            this.product.regular_price = product.variation.regular_price;
            this.product.discount_price = product.variation.discount_price;
            this.product.min_quantity = product.variation.min_quantity;
            this.product.max_quantity = product.variation.max_quantity;
            this.product.sku = product.variation.sku;
            this.product.stock_status_id = product.variation.stock_status_id;
            this.product.stock_quantity = product.variation.stock_quantity;
            this.product.remain_product_count_in_low_stock = product.variation.remain_product_count_in_low_stock;

            this.product.weight = product.variation.product_shipping ? product.variation.product_shipping.weight : 0;
            this.product.length = product.variation.product_shipping ? product.variation.product_shipping.length : 0;
            this.product.width = product.variation.product_shipping ? product.variation.product_shipping.width : 0;
            this.product.height = product.variation.product_shipping ? product.variation.product_shipping.height : 0;

            this.product.image = product.image;
            this.images = product.images;

            // console.log(this.images);
            this.product_type = product.is_variation == 0 ? 1 : 2;
            let get_category_ids = pluck_('id');
            let get_categories_selected = get_category_ids(product.categories);

            $('#select_categories').val(get_categories_selected).trigger('change');
            $('#select_brands').val(product.brand_id).trigger('change');


            $('#description_ar').summernote('code', product.description_ar);
            $('#description_en').summernote('code', product.description_en);


            product.recommended_products.forEach(function (t) {
                $('#m_select_remote_recommended_products').append(new Option(t.name, t.id, true, true));
            });
            product.marketing_products.forEach(function (t) {
                $('#m_select_remote_marketing_products').append(new Option(t.name, t.id, true, true));
            });
            product.sub_products.forEach(function (t) {
                $('#m_select_remote_sub_products').append(new Option(t.name, t.id, true, true));
            });

            var sDate = new Date(Date.parse(product.date_of_publication, "yyyy-mm-dd HH:ii P"));
            if (product.date_of_publication) {
                $("#m_datetimepicker_5").val(formatDate(product.date_of_publication))
            }

            let discount_start_at = product.variation.discount_start_at ? product.variation.discount_start_at : "";
            let discount_end_at = product.variation.discount_end_at ? product.variation.discount_end_at : "";

            if (product.variation.discount_start_at) {
                $("#m_daterangepicker_general_2 .form-control").val(discount_start_at + " / " + discount_end_at);
                $("#m_daterangepicker_general_2").data('daterangepicker').setStartDate(discount_start_at);
                $("#m_daterangepicker_general_2").data('daterangepicker').setEndDate(discount_end_at);

                $("#m_daterangepicker_general .form-control").val(discount_start_at + " / " + discount_end_at);
                $("#m_daterangepicker_general").data('daterangepicker').setStartDate(discount_start_at);
                $("#m_daterangepicker_general").data('daterangepicker').setEndDate(discount_end_at);
            } else {
                $("#m_daterangepicker_general .form-control").val("");
                $("#m_daterangepicker_general_2 .form-control").val("");
            }


            product.in_day_deal == 1 ? $('#in_day_deal').prop('checked', true) : $('#in_day_deal').prop('checked', false);
            product.is_exclusive == 1 ? $('#is_exclusive').prop('checked', true) : $('#is_exclusive').prop('checked', false);
            product.in_offer == 1 ? $('#in_offer').prop('checked', true) : $('#in_offer').prop('checked', false);

            vm.setData(false, product);
            mApp.unblock("#product-block", {});
        },
        get_edit_attribute_variations: function (attributes) {

            var attrinutes = [];
            this.product_attributes.forEach(function (t, index) {
                if (t.selected.length > 0) {
                    attrinutes.push({id: t.id, name: t.name, attribute_index: index});
                }
            });
            this.selected_attributes = attrinutes;
            Vue.nextTick(function () {
                $("input[name='selected_attributes']").change(function () {
                    //vm.get_variations();
                    vm.get_edit_variations(vm.edit_product_variations);
                    // console.log(vm.edit_product_variations);
                });
            });

            var get_variation_attributes = attributes.filter(el => el.is_variation == 1
                )
            ;
            let get_attribute_ids = pluck_('attribute_id');
            let get_attribute_selected = get_attribute_ids(get_variation_attributes);

            Vue.nextTick(function () {
                var checked = [];
                $.each($("input[name='selected_attributes']"), function () {
                    var value = $(this).val();

                    if (get_attribute_selected.find(el => el == value)) {
                        $(this).prop('checked', true);
                    }

                });

            });
        },
        get_product_variations_db: function () {
            axios.get(get_url + "/admin/get-product-variations/" + product.id).then(function (res) {

                vm.get_edit_variations(res.data['all_variations']);
                vm.edit_product_variations = res.data['all_variations'];
                // console.log(res.data['all_variations']);
                // vm.get_variations();
            }).catch(function (err) {

            });
        },
        get_edit_variations: function (product_varitions) {


            mApp.block("#m_product_tab_8", {});
            /* this.attribute_value_variations.forEach(function (t) {
                 destroy_dropzones(t.random_id);
             });*/

            var checked = [];
            $.each($("input[name='selected_attributes']:checked"), function () {
                checked.push($(this).val());
            });

            var values = [];
            if (checked.length > 0) {
                this.selected_attributes.forEach(function (t) {

                    if (checked.includes(t.id + "") || checked.includes(t.id)) {
                        var product_attributes = vm.product_attributes[t.attribute_index];
                        var get_product_attribute = "";
                        var get_product_attribute_values = [];
                        vm.product_attributes[t.attribute_index].attribute_values.forEach(function (t2) {
                            if (product_attributes.selected.includes(t2.id + "") || product_attributes.selected.includes(t2.id)) {
                                get_product_attribute_values.push(t2);
                            }

                        });
                        var obj = {};
                        obj[t.id] = get_product_attribute_values;
                        values.push(obj);
                    }

                });

                var cartesian_values = cartesian(values);

                var attribute_values = [];
                cartesian_values.forEach(function (t) {
                    var temp = [];
                    var temp_text = "";
                    var arr_key = [];
                    for (const [key, value] of Object.entries(t)) {
                        temp.push(value);
                        temp_text = temp_text + " - " + value.name;
                        arr_key.push(value.id);
                    }
                    var random_id = makeid(25);
                    arr_key = arr_key.sort(sort_number);
                    var key = arr_key.join('-');


                    var get_product_varition_data = product_varitions.find(el => el.key == key);
                    var set_product_variation_data = [];
                    if (get_product_varition_data) {
                        set_product_variation_data = vm.set_product_varition_data(get_product_varition_data);
                    } else {
                        set_product_variation_data = JSON.parse(JSON.stringify(vm.product_variation))
                    }

                    attribute_values.push(
                        {
                            product_variation: set_product_variation_data,
                            values: temp,
                            values_text: temp_text,
                            random_id: random_id,
                            key: key,
                            is_selected: 0,
                        }
                    );

                });

                var set_attribute_value_variations = [];
                attribute_values.forEach(function (t) {
                    let key = t.key;
                    var check_attribute_value_variations = vm.attribute_value_variations.find(el => el.key == key
                        )
                    ;
                    if (!check_attribute_value_variations) {
                        destroy_dropzones(t.random_id);
                        t.is_selected = 0;
                        set_attribute_value_variations.push(t);
                    } else {
                        set_attribute_value_variations.push(check_attribute_value_variations);
                    }
                });
                if (set_attribute_value_variations.length > 0) {
                    set_attribute_value_variations[0].is_selected = 1;
                }

                this.attribute_value_variations = set_attribute_value_variations;
            } else {
                this.attribute_value_variations = [];
            }

            mApp.unblock("#m_product_tab_8");
            if (is_view == 1) {
                Vue.nextTick(function () {
                    $('#m_product_tab_8').find('input, textarea, button, select').attr('disabled', 'disabled');
                });
            }
            console.log(this.attribute_value_variations);
        },
        /*  variations */
        get_attribute_variations: function () {

            var attrinutes = [];
            $('.m-selected-attribute').innerHTML = "";
            this.product_attributes.forEach(function (t, index) {
                if (t.selected.length > 0) {
                    attrinutes.push({id: t.id, name: t.name, attribute_index: index});
                }
            });

            this.selected_attributes = attrinutes;
            Vue.nextTick(function () {
                $("input[name='selected_attributes']").change(function () {
                    // vm.get_variations();
                    vm.get_edit_variations(vm.edit_product_variations);

                });
            });
        },
        get_variations: function () {
            mApp.block("#m_product_tab_8", {});
            /* this.attribute_value_variations.forEach(function (t) {
                 destroy_dropzones(t.random_id);
             });*/

            var checked = [];
            $.each($("input[name='selected_attributes']:checked"), function () {
                checked.push($(this).val());
            });

            var values = [];
            if (checked.length > 0) {
                this.selected_attributes.forEach(function (t) {

                    if (checked.includes(t.id + "") || checked.includes(t.id)) {
                        var product_attributes = vm.product_attributes[t.attribute_index];
                        var get_product_attribute = "";
                        var get_product_attribute_values = [];
                        vm.product_attributes[t.attribute_index].attribute_values.forEach(function (t2) {
                            if (product_attributes.selected.includes(t2.id + "") || product_attributes.selected.includes(t2.id)) {
                                get_product_attribute_values.push(t2);
                            }

                        });
                        var obj = {};
                        obj[t.id] = get_product_attribute_values;
                        values.push(obj);
                    }

                });

                var cartesian_values = cartesian(values);
                var attribute_values = [];
                cartesian_values.forEach(function (t) {
                    var temp = [];
                    var temp_text = "";
                    var arr_key = [];
                    for (const [key, value] of Object.entries(t)) {
                        temp.push(value);
                        temp_text = temp_text + " - " + value.name;
                        arr_key.push(value.id);
                    }
                    var random_id = makeid(25);
                    arr_key = arr_key.sort(sort_number);
                    var key = arr_key.join('-');

                    attribute_values.push(
                        {
                            product_variation: JSON.parse(JSON.stringify(vm.product_variation)),
                            values: temp,
                            values_text: temp_text,
                            random_id: random_id,
                            key: key,
                            is_selected: 0,
                        }
                    );


                });

                var set_attribute_value_variations = [];
                attribute_values.forEach(function (t) {
                    let key = t.key;
                    var check_attribute_value_variations = vm.attribute_value_variations.find(el => el.key == key
                        )
                    ;
                    if (!check_attribute_value_variations) {
                        destroy_dropzones(t.random_id);
                        t.is_selected = 0;
                        set_attribute_value_variations.push(t);
                    } else {
                        set_attribute_value_variations.push(check_attribute_value_variations);
                    }
                });
                if (set_attribute_value_variations.length > 0) {
                    set_attribute_value_variations[0].is_selected = 1;
                }

                this.attribute_value_variations = set_attribute_value_variations;
            } else {
                this.attribute_value_variations = [];
            }


            mApp.unblock("#m_product_tab_8");
            console.log(this.attribute_value_variations);
        },
        init_dropzone: function (random) {

            if (!this.add) {
                let get_product_variation = this.attribute_value_variations.find(el => el.random_id == random);
                let get_product_variation_ = this.edit_product_variations.find(el => el.key == get_product_variation.key);

                $('#mDropzoneProductImagesV' + random).removeClass('hidden');

                if (get_product_variation_) {
                    init_dropzones_edit(random, get_product_variation_.images);
                } else {
                    init_dropzones_edit(random, []);
                }

                $('#buttonmDropzoneProductImagesV' + random).addClass('hidden');

            } else {
                $('#mDropzoneProductImagesV' + random).removeClass('hidden');
                init_dropzones(random);
                $('#buttonmDropzoneProductImagesV' + random).addClass('hidden');
            }


        },
        init_date_range_picker: function (random) {

            if (!this.add) {
                let get_product_variation = this.attribute_value_variations.find(el => el.random_id == random);
                let get_product_variation_ = this.edit_product_variations.find(el => el.key == get_product_variation.key);

                $('#m_daterangepicker_variations' + random).removeClass('hidden');

                let discount_start_at = get_product_variation_ ? get_product_variation_.discount_start_at : '';
                let discount_end_at = get_product_variation_ ? get_product_variation_.discount_end_at : '';
                init_date_range_picker(random, discount_start_at, discount_end_at);
                $('#ButtonScheduling' + random).addClass('hidden');


            } else {
                let get_product_variation = this.attribute_value_variations.find(el => el.random_id == random);

                $('#m_daterangepicker_variations' + random).removeClass('hidden');
                let discount_start_at = get_product_variation ? get_product_variation.product_variation.discount_start_at : '';
                let discount_end_at = get_product_variation ? get_product_variation.product_variation.discount_end_at : '';
                init_date_range_picker(random, discount_start_at, discount_end_at);
                $('#ButtonScheduling' + random).addClass('hidden');
            }

        },

        disable_general_init_date_range_picker: function () {
            var id = "#m_daterangepicker_general";
            $(id + " .form-control").val("");
            $(id).data('daterangepicker').setStartDate(moment());
            $(id).data('daterangepicker').setEndDate(moment());

            var id2 = "#m_daterangepicker_general_2";
            $(id2 + " .form-control").val("");
            $(id2).data('daterangepicker').setStartDate(moment());
            $(id2).data('daterangepicker').setEndDate(moment());

            this.product.discount_start_at = "";
            this.product.discount_end_at = "";
        },

        disable_init_date_range_picker: function (random) {
            var id = "#m_daterangepicker_variations" + random;
            $(id + " .form-control").val("");
            $(id).data('daterangepicker').setStartDate(moment());
            $(id).data('daterangepicker').setEndDate(moment());

            let result = vm.attribute_value_variations.find(x => x.random_id === random);
            result.product_variation.discount_start_at = "";
            result.product_variation.discount_end_at = "";
        },

        show_update_product_variation_modal: function () {
            $('#m_modal_1').modal('show');
        },
        updateProductForAllVariations: function () {
            var formData = new FormData();
            var updated_data = ['regular_price', 'discount_price', 'discount_start_at', 'discount_end_at', 'cost_price'];
            this.loading = true;
            $('.update-product-for-all-variations-success-msg').addClass('hidden');
            $('.update-product-for-all-variations-error-msg').addClass('hidden');

            Object.keys(this.product).forEach(function (key) {
                if (updated_data.includes(key)) {
                    formData.append(key, vm.product[key]);
                }
            });
            formData.append('id', product.id);

            axios.post(get_url + "/admin/update-product-for-all-variations", formData).then(function (res) {
                vm.loading = false;

                if (res.data['status']) {
                    $('.update-product-for-all-variations-success-msg').removeClass('hidden');
                    $('.update-product-for-all-variations-success-msg').text(res.data['success_msg']);
                    setTimeout(function () {
                        window.location = '';
                    }, 1000);

                } else {
                    $('.update-product-for-all-variations-error-msg').removeClass('hidden');
                    $('.update-product-for-all-variations-error-msg').text(res.data['error_msg']);
                }

            }).catch(function (err) {
                vm.loading = false;
            });
        },

        // remove image
        remove_image_from_images: function (index, image) {
            this.images.splice(index, 1);
            if (image.hasOwnProperty('image')) {
                this.edit_product_images_removed.push(get_file_name(image.image));
            }
        },
        remove_image_from_product_variation_images: function (index, index_2, image) {

            this.attribute_value_variations[index].product_variation.images.splice(index_2, 1);
            if (image.hasOwnProperty('image')) {
                this.edit_images_removed.push(image.id);
            }
        },
    },
    watch: {
        main_category: function (value) {
            var get_children = this.get_categories_with_children.find(el => el.id == value);
            let children = [];
            if (get_children) {
                children = get_children.children;
            }
            $("#select_categories").empty();
            vm.categories.forEach(function (t) {
                if (children.includes(t.id) || children.includes(t.id + "")) {
                    $("#select_categories").append(new Option(t.name, t.id, false, false));
                }

            });

            // update_categories();
            //  console.log(get_children.children);
        }
    }
});
