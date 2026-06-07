$(window).on('load',function(){
    $("#preloader").fadeOut();
    wow = new WOW(
    {
        animateClass: 'animated',
        offset:       50
    }
    );
    wow.init();
});
// $(document).ready(function(){
//     /*header-fixed*/
//     $(window).scroll(function(){
            
//         if ($(window).scrollTop() >= 220) {
//             $('body').addClass('fixed-header');
//         }
//         else {
//             $('body').removeClass('fixed-header');
//         }
              
//     });

//     $(".dropdown_profile.cat a").click(function(){
//         var key = $(this).find('span').text();
//         $(".btn_filter:first-child").text(key);
//         $(".btn_filter:first-child").val(key);
      
//         $('.dropdown_profile.cat').removeClass('show');
//         $('.label_key').removeClass('show');
//         return false;
//    });


    $(".js-select").each(function(i,v){
        var that = $(this);
        var placeholder = $(that).attr("data-placeholder");
        $(that).select2({
            placeholder:placeholder,
            minimumResultsForSearch: Infinity,
        });
    });

    $(".file_st").change(function () {
        var filename = $(this).val().split('\\').pop();
        if(filename != ''){
            $(".box_file_upload p").html(filename);
        }else{
            $(".box_file_upload p").html('صورة من الحوالة');

        }
    });
 

//     $('.favorite_icon').click(function(){
//         $(this).closest('div.col-lg-3').remove();
//     })
    
//     $('.dropdown-submenu a.dropdown-toggle').on("click", function(e){
//         $(this).next('ul').toggle();
//         e.stopPropagation();
//         e.preventDefault();
//     });

//     $('.dropdown-submenu a.dropdown-toggle').on("click", function(e){
//         $(this).next('ul').toggle();
//         e.stopPropagation();
//         e.preventDefault();
//     });

//     $('.menu_xs .dropdown-submenu a.dropdown-toggle').on("click", function(e){
//         $(this).next('ul').toggle();
//         e.stopPropagation();
//         e.preventDefault();
//     });

    $('.btn_tb_remove').click(function(){
        $(this).closest('tr').remove();
    })
    $('.btn_remove').click(function(){
        $(this).closest('li').remove();
    })


    $('.header_search-button').click(function(){
        var search = $('.block_search_mobile')
        var thisclick = $('.header_search-button')
        var thisparent = $(this).parent()
        if(thisclick.hasClass('active') != true){
            thisclick.addClass('active');
            search.slideToggle();
            thisparent.addClass('open_search')
            }
            else{
                 thisclick.removeClass('active');
                 search.slideToggle();
                 thisparent.removeClass('open_search')
                }
        
    });
//     /*open filter*/
    $(".filter_btn").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".filter_btn").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".filter_btn").removeClass('active');
    });
    $(".fillter_btn").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".filter_btn").addClass('active');
    });

    $(".show_pass").click(function() {
        var eye_icon = $(this).find('i');
        eye_icon.removeClass("fa-eye");
        eye_icon.addClass("fa-eye-slash");

        var input = $(this).closest('div.password_input').find('.pwd');
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
            eye_icon.removeClass("fa-eye-slash");
            eye_icon.addClass("fa-eye");
        }
    });

    
	$("#home_banner_slider").owlCarousel({
        loop:true,
        margin:30,
        rtl:true,
        items:1,
        responsiveClass:true,
        dots:true,
        nav:false,
        autoplay:false,
    })

	$("#special_slider").owlCarousel({
        loop:true,
        center: true,
        margin:30,
        rtl:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            575:{
                items:1,
            },
            768:{
                items:1,
            },
            992:{
                items:2,
            },
            1200:{
                items:2,
            }

        },
        dots:true,
        nav:true,
        autoplay:false,
        navText:['<i class="fal fa-angle-right"></i>',
            '<i class="fal fa-angle-left"></i>'],
    })

    $("#color_cate_slider").owlCarousel({
        loop:false,
        margin:5,
        rtl:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:6,
            },
            575:{
                items:10,
            },
            768:{
                items:4,
            },
            992:{
                items:5,
            }

        },
        dots:false,
        nav:false,
        autoplay:false,
        navText:['<i class="fal fa-angle-right"></i>',
            '<i class="fal fa-angle-left"></i>'],
    })

    $(".owl_products").owlCarousel({
        loop:true,
        margin:15,
        rtl:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                // stagePadding: 20,
            },
            375:{
                items:2,
                // stagePadding: 50,
            },
            450:{
                items:2,
                // stagePadding: 100,
            },
            575:{
                items:2,
                // stagePadding: 50,
            },
            768:{
                items:4,
                // stagePadding: 50,
            },
            992:{
                items:5,
                // stagePadding: 30,
            },
            1200:{
                items:6,
                // stagePadding: 60,
            }

        },
        dots:true,
        nav:true,
        autoplay:false,
        // navText:['<i class="far fa-long-arrow-alt-right"></i>',
        //     '<i class="far fa-long-arrow-alt-left"></i>'],
    })

    
//     /*Decrease & Increase*/    
    var minimum_quanitiy=$(".jsQuantityDecrease").attr("minimum"),
    productQuantity=minimum_quanitiy;
    $(document).on("click",".jsQuantityDecrease",function(){
        var quantity = $(this).parent().find('input[name="count-quat1"]').val();
        quantity = quantity * 1;
        var newQuantity = quantity - 1;
        $(this).parent().find('input[name="count-quat1"]').val(newQuantity);
        if (newQuantity <2) {
            $(this).parent().find(".jsQuantityDecrease").addClass("disabled");
            $(this).closest('.product_item_box').find(".dec").removeClass("disabled").removeClass("jsQuantityDecrease").addClass('removeQuantity');

        } else{
             $(this).parent().find(".jsQuantityDecrease").removeClass("disabled").removeClass("removeQuantity");
             $(this).closest('.product_item_box').find(".dec").removeClass("disabled").addClass("jsQuantityDecrease").removeClass('removeQuantity');

        }
    }),

    $(document).on("click",".jsQuantityIncrease",function(){
        var quantity = $(this).parent().find('input[name="count-quat1"]').val();
        quantity = quantity * 1;
        var newQuantity = quantity + 1;
        $(this).parent().find('input[name="count-quat1"]').val(newQuantity);
        if (newQuantity >=2) {
            $(this).parent().find(".jsQuantityDecrease").removeClass("disabled");
            $(this).closest('.product_item_box').find(".dec").removeClass("disabled").addClass("jsQuantityDecrease").removeClass('removeQuantity');

        } else{
             $(this).parent().find(".jsQuantityDecrease").addClass("disabled");
             $(this).closest('.product_item_box').find(".dec").removeClass("disabled").removeClass("jsQuantityDecrease").addClass('removeQuantity');

        }
        
    })
// })