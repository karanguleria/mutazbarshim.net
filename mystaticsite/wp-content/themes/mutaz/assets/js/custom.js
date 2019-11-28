jQuery(document).ready(function () {
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.scrollup').fadeIn();
        } else {
            jQuery('.scrollup').fadeOut();
        }
    });
    jQuery('.scrollup').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    jQuery('#murtza_products ul > .product_wrap').each(function (i) {
        jQuery(this).addClass('product' + i);
    });
});
jQuery(document).ready(function () {
    jQuery('.sponsers').owlCarousel({
        center: true,
        loop: true,
        autoplay: true,
        nav: true,
        arrow: true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2,
                center: false,
            },
            768: {
                items: 3
            },
            992: {
                items: 3
            }
        }
    });
});
jQuery(document).ready(function () {
    jQuery('.gallary').owlCarousel({
        loop: true,
        autoplay: true,
        nav: false,
        arrow: false,
        dots: false,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
});

jQuery(document).ready(function () {
    jQuery('.grounds-slider').owlCarousel({
        margin: 10,
        loop: true,
        nav: false,
        arrow: true,
        dots: false,
        autoplay: true,
        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1440: {
                items: 4
            }
        }
    });
});

jQuery(document).ready(function () {
    jQuery(".header_section").mousemove(function (e) {
        parallax(this, e, 25);
    });
    jQuery(".banner_image").mousemove(function (e) {
        parallax(this, e, 75);
    });
    // $(".main_heading").mousemove(function(e){
    //     parallax(this, e, 125);
    // });
    /*Parallax function*/
    function parallax(obj, e, factor) {
        var width = factor / $(obj).width();
        var height = factor / $(obj).height();
        var pageX = e.pageX - ($(window).width() / 2);
        var pageY = e.pageY - ($(window).height() / 2) - $(window).scrollTop();
        var newvalueX = width * pageX * -1 - 25;
        var newvalueY = height * pageY * -1 - 25;
        $(obj).css("background-position", newvalueX + "px " + newvalueY + "px");
        // $(obj).css("transform", newvalueX + "px " + newvalueY + "px");
    }
});
var firsRdio = jQuery('.product_wrap').find('input[type=radio]:last').attr('checked', true);

jQuery('.btn-secondary.cart').click(function (e) {
    e.preventDefault();
    var form = jQuery(this).closest('form');
    var product = form.find('.stProduct').val();
    var qty = form.find('.stQuantity').val();
    //console.log(qty);
    var variation = form.find('.color_box input:checked').val();
    // jQuery('#myModal').addClass('nProccessing');
    //  setTimeout(function(){ 
    //     jQuery('#myModal').removeClass('nProccessing');
    //     }, 5000); 
    jQuery('#myModal').modal('show');
    jQuery.post('https://mutazbarshim.net/mystaticsite/api/cart/add/', {stProduct: product, stQuantity: qty, stVariation: variation}, function (data, status) {
        var obj = JSON.parse(data);
        if ($("input[name='cart[" + obj.key + "][qty]']").length)
        {
            $("input[name='cart[" + obj.key + "][qty]']").val(obj.quantity);
        }
        jQuery('.woocommerce-cart-form').find(':input[name="update_cart"]').prop("disabled", false);
        jQuery('.woocommerce-cart-form').find(':input[name="update_cart"]').trigger('click');
        //console.log(data);
        //console.log(status);
    });
});

jQuery('.btn-secondary.buy').click(function (e) {
    e.preventDefault();
    var form = jQuery(this).closest('form');
    var product = form.find('.stProduct').val();
    var qty = form.find('.stQuantity').val();
    var variation = form.find('.color_box input:checked').val();
     jQuery('#checkModal').modal('show');
    jQuery.post('https://mutazbarshim.net/mystaticsite/api/cart/buy/', {stProduct: product, stQuantity: qty, stVariation: variation}, function (data, status) {
        console.log(data);
        var obj = JSON.parse(data);
        if ($("input[name='cart[" + obj.key + "][qty]']").length)
        {
            $("input[name='cart[" + obj.key + "][qty]']").val(obj.quantity);
        }
        jQuery('.woocommerce-cart-form').find(':input[name="update_cart"]').prop("disabled", false);
        jQuery('.woocommerce-cart-form').find(':input[name="update_cart"]').trigger('click');
        //   jQuery('#checkModal').modal('show');

       console.log(data);
        console.log(status);
    });
});
jQuery(function () {
    //jQuery(".cart_item .product-quantity").append('<div class="inc button">+</div><div class="dec button">-</div>');
    //jQuery(".cart_item").on("click",'.button', function() {
    //var $button = jQuery(this);
    //var oldValue = $button.parent().find("input").val();
    // if ($button.text() == "+") {
    // var newVal = parseFloat(oldValue) + 1;
    //	} else {
    // Don't allow decrementing below zero
    // if (oldValue > 0) {
    // var newVal = parseFloat(oldValue) - 1;
    // } else {
    //  newVal = 0;
    // }
    // }
    // $button.parent().find("input").val(newVal);
    //});
//   jQuery('.product_wrap').find('input[type=radio]').change(function(){

// });
    jQuery('.color_box input').change(function () {
        var itemImage = jQuery(this).data('item-image');
        jQuery(this).closest('.product_wrap').find('img').attr('src', itemImage);

        jQuery(this).closest('.product_wrap').find('.v_price').html(' ');
        var elClass = jQuery(this).attr('class');
        var elPrice = jQuery(this).attr('data-price');
        console.log(elClass);
        console.log(elPrice);
        jQuery(this).closest('.product_wrap').find('.price_tag').attr('class', "price_tag " + elClass);
        jQuery(this).closest('.product_wrap').find('.v_price').append('<sub>$</sub>' + ' ' + elPrice + '<div></div>');

    });
});
jQuery(document).ready(function () {

    jQuery('body').on('click', '.checkout-button', function (e) {
        e.preventDefault();
        jQuery('#myModal').modal('hide');
        jQuery('#checkModal').modal('show');
    });

});
jQuery(document).ready(function () {

    jQuery('body').on('click', '.inc', function () {
        var qty = jQuery(this).closest('.product-quantity').find('.qty').val();
        jQuery(this).closest('.product-quantity').find('.qty').val(parseInt(qty) + 1);
        jQuery('.woocommerce-cart-form').find(':input[name="update_cart"]').prop("disabled", false);
    });
    jQuery('body').on('click', '.dec', function () {
        var qty = jQuery(this).closest('.product-quantity').find('.qty').val();
        jQuery(this).closest('.product-quantity').find('.qty').val(parseInt(qty) - 1);
        jQuery('.woocommerce-cart-form').find(':input[name="update_cart"]').prop("disabled", false);
    });

    jQuery('a').click(function (event) {
        event.preventDefault();
        var target = jQuery(this).attr('href');
        target = target.split("#")[1];
        if (typeof target !== 'undefined' && target.length && jQuery('#' + target).length) {
            event.preventDefault();
            target = jQuery('#' + target);
            console.log(target);
            jQuery('html, body').animate({scrollTop: target.offset().top}, 1000, 'linear');


        }

    });
});



  