Vue.use(VeeValidate);
var get_url = $('#get_url').val();
var time_to_hide_success_msg = 1100;

const pluck_ = key => array => Array.from(new Set(array.map(obj => obj[key])));

function sort_number(a, b) {
    return a - b;
}

function read_url(input, selector) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $(selector).attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
}

function get_file_name(url)
{
    return url.replace(get_url+"/uploads/" , "");
    return url.split('/').pop().split('#')[0].split('?')[0];
}

function read_mul_url(input, selector) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $(selector).attr('src', e.target.result);
    };
    reader.readAsDataURL(input);
}

function cartesian(array) {
    function c(part, index) {
        var k = Object.keys(array[index])[0];
        array[index][k].forEach(function (a) {
            var p = Object.assign({}, part, {[k]: a});
            if (index + 1 === array.length) {
                r.push(p);
                return;
            }
            c(p, index + 1);
        });
    }

    var r = [];
    c({}, 0);
    return r;
}

function handle_response(response) {

    var status = response.status;
    var auth = response.auth;
    var success_msg = response.success_msg;
    var error_msg = response.error_msg;
    var errors = response.errors;

    if (!auth) {
        swal("Error", error_msg, "error");
        return false;
    } else if (!status) {
        vm.msg.error = error_msg;
        $('.success_msg').addClass('hidden');
        $('.error_msg').removeClass('hidden');
        setTimeout(function () {
            $('.success_msg').addClass('hidden');
            //  $('.error_msg').addClass('hidden');
        }, 1300);
        return false;
    } else {
        vm.msg.success = success_msg;
        $('.success_msg').removeClass('hidden');
        $('.error_msg').addClass('hidden');
        setTimeout(function () {
            $('.success_msg').addClass('hidden');
            //   $('.error_msg').addClass('hidden');
        }, 1300);
        return true;
    }

}

function handle_response_order_details_1(response) {

    var status = response.status;
    var auth = response.auth;
    var success_msg = response.success_msg;
    var error_msg = response.error_msg;
    var errors = response.errors;

    if (!auth) {
        swal("Error", error_msg, "error");
        return false;
    } else if (!status) {
        order_details_1.msg.error = error_msg;
        $('.success_msg').addClass('hidden');
        $('.error_msg').removeClass('hidden');
        setTimeout(function () {
            $('.success_msg').addClass('hidden');
            $('.error_msg').addClass('hidden');
        }, 2000);
        return false;
    } else {
        order_details_1.msg.success = success_msg;
        $('.success_msg').removeClass('hidden');
        $('.error_msg').addClass('hidden');
        setTimeout(function () {
            $('.success_msg').addClass('hidden');
            $('.error_msg').addClass('hidden');
        }, 2000);
        return true;
    }

}

function general_handle_response(response, selector_success, selector_error) {

    var status = response.status;
    var auth = response.auth;
    var success_msg = response.success_msg;
    var error_msg = response.error_msg;
    var errors = response.errors;

    if (!auth) {
        swal("Error", error_msg, "error");
        return false;
    } else if (!status) {
        vm.msg.error = error_msg;
        $(selector_success).addClass('hidden');
        $(selector_error).removeClass('hidden');
        setTimeout(function () {
            $(selector_success).addClass('hidden');
            $(selector_error).addClass('hidden');
        }, 1300);
        return false;
    } else {
        vm.msg.success = success_msg;
        $(selector_success).removeClass('hidden');
        $(selector_error).addClass('hidden');
        setTimeout(function () {
            $(selector_success).addClass('hidden');
            $(selector_error).addClass('hidden');
        }, 1300);
        return true;
    }

}

function general_handle_response__(response, selector_success, selector_error) {

    var status = response.status;
    var auth = response.auth;
    var success_msg = response.success_msg;
    var error_msg = response.error_msg;
    var errors = response.errors;

    if (!auth) {
        swal("Error", error_msg, "error");
        return false;
    } else if (!status) {
        vue_select_product.msg.error = error_msg;
        $(selector_success).addClass('hidden');
        $(selector_error).removeClass('hidden');
        setTimeout(function () {
            $(selector_success).addClass('hidden');
            $(selector_error).addClass('hidden');
        }, 1300);
        return false;
    } else {
        vue_select_product.msg.success = success_msg;
        $(selector_success).removeClass('hidden');
        $(selector_error).addClass('hidden');
        setTimeout(function () {
            $(selector_success).addClass('hidden');
            $(selector_error).addClass('hidden');
        }, 1300);
        return true;
    }


}

function full_general_handle_response(response , vue_obj , show_msg = false) {

    var status = response.status;
    var auth = response.auth;
    var success_msg = response.success_msg;
    var error_msg = response.error_msg;
    var errors = response.errors;

    if (!auth) {
        swal("Error", error_msg, "error");
        return false;
    } else if (!status) {
        if(show_msg) {
            vue_obj.msg.error = error_msg;
            $('.success_msg').addClass('hidden');
            $('.error_msg').removeClass('hidden');
            setTimeout(function () {
                $('.success_msg').addClass('hidden');
                //  $('.error_msg').addClass('hidden');
            }, 1500);
        }

        return false;
    } else {
        if(show_msg) {
            vue_obj.msg.success = success_msg;
            $('.success_msg').removeClass('hidden');
            $('.error_msg').addClass('hidden');
            setTimeout(function () {
                $('.success_msg').addClass('hidden');
                //   $('.error_msg').addClass('hidden');
            }, 1300);
        }

        return true;
    }

}

function handle_product_response(response) {

    var status = response.status;
    var auth = response.auth;
    var success_msg = response.success_msg;
    var error_msg = response.error_msg;
    var errors = response.errors;
    var data = response.data;

    if (!auth) {
        swal("Error", error_msg, "error");
        return false;
    } else if (!status) {
        vm.msg.error = error_msg;
        $('.success_msg').addClass('hidden');
        $('.error_msg').removeClass('hidden');

        var a_error_tab_id = "#a" + data['error_tab_id'];
        var m_error_tab_id = "#m" + data['error_tab_id'];

        var random_id = data['random_id'];
        if(random_id) {
            var get_m_accordion = '.get_m_accordion'+random_id;
            $('.m-accordion__item-head').addClass('collapsed');
            $('.m-accordion__item-head').prop("aria-expanded","false");
            $('.m-accordion__item-head').addClass('collapsed');
            $('.m-accordion__item-body').removeClass('show');


            $(get_m_accordion).find('.m-accordion__item-head').removeClass('collapsed');
            $(get_m_accordion).find('.m-accordion__item-head').prop("aria-expanded","true");
            $(get_m_accordion).find('.m-accordion__item-body').addClass('show');

        }
        $('.m-tabs__link').removeClass('active');
        $('.m-tabs__link').removeClass('show');

        $('.tab-pane').removeClass('active');
        $('.tab-pane').removeClass('show');


        $(a_error_tab_id).addClass('active');
        $(a_error_tab_id).addClass('show');

        $(m_error_tab_id).addClass('active');
        $(m_error_tab_id).addClass('show');

        setTimeout(function () {
            $('.success_msg').addClass('hidden');
            //  $('.error_msg').addClass('hidden');
        }, 2000);

        return false;
    } else {
        vm.msg.success = success_msg;
        $('.success_msg').removeClass('hidden');
        $('.error_msg').addClass('hidden');
        setTimeout(function () {
            $('.success_msg').addClass('hidden');
            //   $('.error_msg').addClass('hidden');
        }, 1300);
        return true;
    }

}


function hide_success_message(selector) {
    $(selector).addClass('hidden');
}

function scroll_to_div(selector) {
    $("html, body").animate({
        scrollTop: $(selector).offset().top
    }, 700);
}

function makeid(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function padValue(value) {
    return (value < 10) ? "0" + value : value;
}
function formatDate(dateVal) {
    var newDate = new Date(dateVal);

    var sMonth = padValue(newDate.getMonth() + 1);
    var sDay = padValue(newDate.getDate());
    var sYear = newDate.getFullYear();
    var sHour = newDate.getHours();
    var sMinute = padValue(newDate.getMinutes());
    var sAMPM = "AM";

    var iHourCheck = parseInt(sHour);

    if (iHourCheck > 12) {
        sAMPM = "PM";
        sHour = iHourCheck - 12;
    }
    else if (iHourCheck === 0) {
        sHour = "12";
    }

    sHour = padValue(sHour);

    return sYear  + "-" + sMonth + "-" +  sDay  + " " + sHour + ":" + sMinute + " " + sAMPM;
}


$(document).ready(function () {

    $('.show_hidden').removeClass('hidden');

    try {
        $('.multi_select_').select2();
    }catch (err) {

    }

});
