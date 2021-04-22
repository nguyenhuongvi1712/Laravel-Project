$(document).ready(function() {
    //  SLIDER
    var slider = $('#slider-wp .section-detail');
    slider.owlCarousel({
        autoPlay: 4500,
        navigation: false,
        navigationText: false,
        paginationNumbers: false,
        pagination: true,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1000, 1], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 1], // betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });

    //  ZOOM PRODUCT DETAIL
    $("#zoom").elevateZoom({ gallery: 'list-thumb', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif' });

    //  LIST THUMB
    var list_thumb = $('#list-thumb');
    list_thumb.owlCarousel({
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1000, 5], //5 items between 1000px and 901px
        itemsDesktopSmall: [900, 5], // betweem 900px and 601px
        itemsTablet: [768, 5], //2 items between 600 and 0
        itemsMobile: true // itemsMobile disabled - inherit from itemsTablet option
    });

    //  FEATURE PRODUCT
    var feature_product = $('#feature-product-wp .list-item');
    feature_product.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

    //  SAME CATEGORY
    var same_category = $('#same-category-wp .list-item');
    same_category.owlCarousel({
        autoPlay: true,
        navigation: true,
        navigationText: false,
        paginationNumbers: false,
        pagination: false,
        stopOnHover: true,
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1000, 4], //5 items between 1000px and 901px
        itemsDesktopSmall: [800, 3], // betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0
        itemsMobile: [375, 1] // itemsMobile disabled - inherit from itemsTablet option
    });

    //  SCROLL TOP
    $(window).scroll(function() {
        if ($(this).scrollTop() != 0) {
            $('#btn-top').stop().fadeIn(150);
        } else {
            $('#btn-top').stop().fadeOut(150);
        }
    });
    $('#btn-top').click(function() {
        $('body,html').stop().animate({ scrollTop: 0 }, 800);
    });

    // CHOOSE NUMBER ORDER
    var value = parseInt($('#num-order').attr('value'));
    $('#plus').click(function() {
        value++;
        $('#num-order').attr('value', value);
        update_href(value);
    });
    $('#minus').click(function() {
        if (value > 1) {
            value--;
            $('#num-order').attr('value', value);
        }
        update_href(value);
    });

    //  MAIN MENU
    $('#category-product-wp .list-item > li').find('.sub-menu').after('<i class="fa fa-angle-right arrow" aria-hidden="true"></i>');

    //  TAB
    tab();

    //  EVEN MENU RESPON
    $('html').on('click', function(event) {
        var target = $(event.target);
        var site = $('#site');

        if (target.is('#btn-respon i')) {
            if (!site.hasClass('show-respon-menu')) {
                site.addClass('show-respon-menu');
            } else {
                site.removeClass('show-respon-menu');
            }
        } else {
            $('#container').click(function() {
                if (site.hasClass('show-respon-menu')) {
                    site.removeClass('show-respon-menu');
                    return false;
                }
            });
        }
    });

    //  MENU RESPON
    $('#main-menu-respon li .sub-menu').after('<span class="fa fa-angle-right arrow"></span>');
    $('#main-menu-respon li .arrow').click(function() {
        if ($(this).parent('li').hasClass('open')) {
            $(this).parent('li').removeClass('open');
        } else {

            //            $('.sub-menu').slideUp();
            //            $('#main-menu-respon li').removeClass('open');
            $(this).parent('li').addClass('open');
            //            $(this).parent('li').find('.sub-menu').slideDown();
        }
    });

    //Add card
    $('#list-product-wp .list-item .add-cart').on('click', function() {
        var cart = $('#cart-wp #btn-cart i');
        var imgtodrag = $(this).parents('li').find('img').eq(0);
        if (imgtodrag) {
            var imgclone = imgtodrag.clone()
                .offset({
                    top: imgtodrag.offset().top,
                    left: imgtodrag.offset().left
                })
                .css({
                    'opacity': '0.5',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '100'
                })
                .appendTo($('body'))
                .animate({
                    'top': cart.offset().top + 10,
                    'left': cart.offset().left + 10,
                    'width': 75,
                    'height': 75
                }, 1000, 'easeInOutExpo');
            setTimeout(function() {
                cart.effect("shake", {
                    times: 2
                }, 200);
            }, 1500);

            imgclone.animate({
                'width': 0,
                'height': 0
            }, function() {
                $(this).detach()
            });
        }
    });

    // Ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.num-order').change(function() {
        var id = $(this).attr('num-order-id');
        var qty = $(this).val();
        var rowId = $(this).attr('row-id');
        data = { id: id, qty: qty, rowId: rowId };
        $.ajax({
            url: 'Cart/update',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $('#sub_total' + id).text(data['sub_total']);
                $('#total-price span').text(data['total_price']);
                $('#btn-cart span#num').text(data['num']);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        })
    });
    $('.list-item .add-cart').click(function() {

        var id = $(this).attr('num-order-id');
        data = { id: id };
        $.ajax({
            url: '../../Cart/add',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $('#btn-cart span#num').text(data['num']);
                $('#dropdown ul.list-cart').html(data['string']);
                $('#dropdown .desc span').text(data['num']);
                $('#dropdown .total-price .price').text(data['total_price'])
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            },
        })
    });
    $('#s').on("keyup", function() {
        var keyWord = $(this).val();
        data = { keyWord: keyWord };
        if (keyWord != "" && keyWord.length > 1) {
            $.ajax({
                url: '../../productSearch',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(data) {
                    $('#searchList').html(data);
                    $('#searchList').fadeIn();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                },
            })
        } else {
            $('#searchList').html("");
            $('#searchList').fadeOut();
        }
    })
    $(document).on("click", "#searchList li a", function() {
        $('#s').val($(this).text());
        $('#searchList').fadeOut("fast");
    })
    $(document).on("click", function() {
            $('#s').val("");
            $('#searchList').fadeOut("fast");
        })
        // sticky header
    window.onscroll = function() { myFunction() };
    var header_body = document.getElementById("head-body");
    var sticky = header_body.offsetTop;
    // var sidebar = document.getElementById("banner-wp");
    // var sticky_sidebar = sidebar.offsetTop;

    function
    myFunction() {
        if (window.pageYOffset >= sticky) {
            header_body.classList.add("sticky")
        } else {
            header_body.classList.remove("sticky");
        }
        // if (window.pageYOffset >= sticky_sidebar) {
        //     sidebar.classList.add("sticky_sidebar")
        // } else {
        //     sidebar.classList.remove("sticky_sidebar");
        // }
    }

});


function tab() {
    var tab_menu = $('#tab-menu li');
    tab_menu.stop().click(function() {
        $('#tab-menu li').removeClass('show');
        $(this).addClass('show');
        var id = $(this).find('a').attr('href');
        $('.tabItem').hide();
        $(id).show();
        return false;
    });
    $('#tab-menu li:first-child').addClass('show');
    $('.tabItem:first-child').show();
}