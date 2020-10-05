var couponmessage = '';
jQuery(function($){
    var mob = 0,scrollPos = 0;
    if(screen.width > 767){
        mob = 1; 
    }
    var windowLength = get_viewport_size();

    var navText = ['<svg id="navLeft" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6,10.1 1,6.1 6,2.1"/></svg>','<svg id="navRight" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="1,2 6,6 1,10"/></svg>'];

    var navArrows = ['<svg id="ltd-arrow-rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;fill:#4D4D4D;" xml:space="preserve"><path d="M8.6,16c-0.3,0-0.5-0.1-0.7-0.3l-5.4-5c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.6,0.3-0.7l5.4-5C8.3,3.9,8.9,4,9.3,4.3c0.4,0.4,0.3,1-0.1,1.4L4.6,10l4.6,4.2c0.4,0.4,0.4,1,0.1,1.4C9.1,15.8,8.8,16,8.6,16z"/><path d="M16.9,11.1H4.1c-0.6,0-1-0.4-1-1s0.5-1,1-1h12.7c0.6,0,1,0.4,1,1S17.4,11.1,16.9,11.1z"/></svg>','<svg id="rtd-arrow-rounded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;fill:#4D4D4D" xml:space="preserve"><path d="M11.4,4c0.3,0,0.5,0.1,0.7,0.3l5.4,5c0.2,0.2,0.3,0.5,0.3,0.7s-0.1,0.6-0.3,0.7l-5.4,5 c-0.4,0.4-1.1,0.3-1.4-0.1c-0.4-0.4-0.3-1,0.1-1.4l4.6-4.2l-4.6-4.2c-0.4-0.4-0.4-1-0.1-1.4C10.9,4.2,11.2,4,11.4,4z"/><path d="M3.1,9h12.7c0.6,0,1,0.4,1,1s-0.5,1-1,1H3.1c-0.6,0-1-0.4-1-1S2.6,9,3.1,9z"/></svg>'];

    var bannerSliderOptions = {
        items:1,
        loop:true,
        margin:0,
        nav: false,
        dots: false,
        smartSpeed: 500,
        autoplaySpeed: 500,
        autoplay:false,
        autoplayTimeout:8000,
        autoplayHoverPause:false
    }

    var prodSliderOptions = {
        nav:true,
        loop:false,
        margin:0,
        dots:false,
        center:false,
        autoplay: false,
        mergeFit:true,
        navText: navText,
        responsive:{
            0:{
                items:1
            },
            767:{
                items:2
            },
            992:{
                items:3
            },
            1199:{
                items:4
            }
        }
    }

    var recipeSliderOptions = {
        items:1,
        loop:true,
        navText: navText,
        margin:0,
        nav: true,
        dots: false,
        autoplay:false
    }

    var testimonialSliderOptions = {
        nav:true,
        loop:true,
        margin:0,
        dots:false,
        center:false,
        autoplay: false,
        mergeFit:false,
        navText: navText,
        responsive:{
            0:{
                items:1
            },
            767:{
                items:2
            },
            992:{
                items:3
            }
        }
    }

    /*var festivalBannerSliderOptions = {
        nav:true,
        loop:true,
        dots:false,
        center:true,
        startPosition: 1,
        autoplay: false,
        mergeFit:true,
        navText: navText,
        items:3,
    }*/
    
    var cultureRecipeSliderOptions = {
        nav:true,
        loop:true,
        dots:false,
        center:false,
        autoplay: false,
        mergeFit:true,
        navText: navText,
        items:3,
		responsive:{
                0:{
                    items:2		
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }	
        }

    $(window).on('scroll',function(){
        stop = Math.round($(window).scrollTop());
        if(stop > 1){
            if(stop > scrollPos){
                $('.navbar').addClass('dark down');
                $('#page').addClass('scroll down');
            } else {
                $('.navbar').addClass('dark').removeClass('down');
                $('#page').addClass('scroll').removeClass('down');
            }
        } else {
            $('.navbar').removeClass('dark');
            $('#page').removeClass('scroll');
        }
        scrollPos = stop;
    }).on('resize', function(){
        setRecipeHeight();
    });
    
    function onLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function() {
                if (oldonload) {
                    oldonload();
                }
                func();
            }
        }
    }
    
    onLoadEvent(onloadActions());

    /*$('input, textarea').focus(function(){
        var x = $(this).attr('placeholder');
        $(this).data('placeholder', x).attr('placeholder', '').parent().addClass('focus');
    }).blur(function(){
        var x = $(this).data('placeholder');
        $(this).attr('placeholder', x).data('placeholder', '').parent().removeClass('focus');
    });*/

    $(document).ready(function(){
        $('.navbar-collapse').on('show.bs.collapse', function() {$('.navbar').addClass('change');});
        $('.navbar-collapse').on('hide.bs.collapse', function(){$('.navbar').removeClass('change');});

        if(window.location.hash) {
            var target = $(window.location.hash);
            target = target.length ? target : '';
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - 100
                }, 500);
            }
        }
                
        if($('.regionMenu-item button').length){
            urlReference();
            $('.regionMenu-item button').click(function(e){
                e.preventDefault();
                populatePage($(this).data('href'));
                $('html,body').animate({scrollTop: 0}, 500);
                $('.regionlistoption').html($(this).html());
                $(this).parent('li').addClass('active').siblings('.active').removeClass('active');
            });
            
            if(screen.width < 767){
                listToDropdown();
            }
        }
        
        if($('.prodSlider').length){
            $('.prodSlider').each(function(){
                $(this).owlCarousel(prodSliderOptions);
            });
        }
    });

    function get_viewport_size(){
        if(typeof(window.innerWidth) == 'number'){
            my_width = window.innerWidth;
            my_height = window.innerHeight;
        }else if(document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)){
            my_width = document.documentElement.clientWidth;
            my_height = document.documentElement.clientHeight;
        }else if(document.body && (document.body.clientWidth || document.body.clientHeight)){
            my_width = document.body.clientWidth;
            my_height = document.body.clientHeight;
        }
        return {width: my_width, height: my_height};
    }

    function onloadActions(){
        console.log('window loaded');
        stop = Math.round($(window).scrollTop());
        if(stop > 1){
            $('.navbar').addClass('dark')
        } else {
            $('.navbar').removeClass('dark');
        }

        if($('.relatedRecipeSlider').length){
            $('.relatedRecipeSlider').owlCarousel(prodSliderOptions);
        }

        if($('.testimonialSlider').length){
            $('.testimonialSlider').owlCarousel(testimonialSliderOptions);
        }

        if($('.festivalBannerSlider').length){
            $('.festivalBannerSlider').owlCarousel(bannerSliderOptions);
        }

        if($('.bannerSlider').length){
            $('.bannerSlider').owlCarousel(bannerSliderOptions);
        }

        if($('.offerSlider').length){
            $('.offerSlider').owlCarousel(bannerSliderOptions);
        }

        if($('.recipeSlider').length){
            $('.recipeSlider').owlCarousel(recipeSliderOptions);
        }

        if($('.recipeShortSlider').length){
            $('.recipeShortSlider').owlCarousel(cultureRecipeSliderOptions);
        }

        if($('.recipelistbanner').length){
            if(window.innerWidth > 991 || window.innerWidth < 768){
                setRecipeBannerHeight();
            }
        }

        if($('.faqSec1row1').length){
            if(window.innerWidth > 991 || window.innerWidth < 768){
                setFaqBannerHeight();
            }
        }

        if(window.innerWidth > 991 || window.innerWidth < 768){
            setHeight();
        }

        setRecipeHeight();

        prod_add_to_cart_actions();

        if(window.innerWidth > 992){
            $('.cart-btn').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).slideDown(300);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).slideUp(300);
            });
        }

        $('#page_loader').delay(350).fadeOut('slow');
        $('body').addClass('loaded');

        if($('#customer_details').length){
            $('html,body').animate({scrollTop: 0}, 100);
        }

        if($('.recipeShareSec').length){
            $('#shareRecipeBtn').click(function(){
                $(this).parents('.recipeActionsSec').addClass('active');
            });

            $(document).mouseup(function (e) {
                var container = $('.recipeShareSec');
                var button = $('#shareRecipeBtn');
                if (!container.is($(e.target)) && container.has($(e.target)).length === 0){
                    container.parents('.recipeActionsSec').removeClass('active');
                }
            });
        }

        if($('#likeRecipeBtn').length){
            recipeLikes();
        }

        if($('#buyIngredients').length){
            get_selected_ingredients();
        }

        if($('.products-container').length){
            gridWidth($('.products-grid'), $('.prodSlide'));
        }

        if($('.posts-container').length){
            gridWidth($('.posts-grid'), $('.postSlide'));
        }
        
        if($('#changePasswordCheckbox').length){
            $('#changePasswordCheckbox').on('change',function(){
                if(this.checked){
                    $('.passwordRow').show();
                } else {
                    $('.passwordRow').hide();
                }
            });
        }
        
        if($('#wishlistLoader').length){
            var loaderSec = $('#page_loader img').attr('src');
            $('#wishlistLoader').attr('src', loaderSec);
        }
        console.log('scripts ended');
    }

    function setHeight(){
        if(screen.width > 992){
            var menuHeight = 90;
            var secHeight = $('.bannerRow').innerHeight();
            var bannerHeight = windowLength.height - menuHeight;
            $('.bannerSlide').not('.offerSlide').each(function(){
                var ele = $(this);
                if(ele.innerHeight() < bannerHeight){
                    ele.css('height',bannerHeight);
                }
            });
            $('.offerSlide').each(function(){
                var ele = $(this);
                if(ele.innerHeight() < bannerHeight){
                    ele.css('height',bannerHeight-100);
                }
            });
            $('#faqSec1').css('height',bannerHeight);
        }
    }
    
    function setRecipeBannerHeight(){
        var menuHeight = 90;
        var bottomHeight = $('.recipecatlist').innerHeight();
        var bannerHeight = windowLength.height - menuHeight - bottomHeight;
        $('.recipelistbanner').each(function(){
            var ele = $(this);
            if(ele.innerHeight() < bannerHeight){
                ele.css('height',bannerHeight);
            }
        });
    }
    
    function setFaqBannerHeight(){
        var menuHeight = 90;
        var bottomHeight = $('.faqSec1row2').innerHeight();
        var bannerHeight = windowLength.height - menuHeight - bottomHeight;
        $('.faqSec1row1').each(function(){
            var ele = $(this);
            if(ele.innerHeight() < bannerHeight){
                ele.css('height',bannerHeight);
            }
        });
    }

    function setRecipeHeight(){    
        if($('#sec4 .recipeSlider').length){
            var sliderHeight = $('.recipeSlider').innerHeight();
            $('.recepieSlide').each(function(){
                var ele = $(this);
                if(ele.innerHeight() < sliderHeight){
                    ele.css('height',sliderHeight);
                }
            });
        }
    }

    function shortNote(message, type){
        var txt = '<div class="countMessage alert-success" style="display: block;">'+message+'</div>';
        $('.countMessageContainer').append(txt);
        var ele = $('.countMessageContainer div:last-child');
        ele.hide();
        ele.attr('class', 'countMessage alert-'+type+'').slideDown(300);
        setTimeout(function(){ ele.slideUp(500).remove(); }, 10000);
    }

    function shortNoteClear(message, type){
        var txt = '<div class="countMessage alert-success" style="display: block;">'+message+'</div>';
        $('.countMessageContainer').html(txt);
        var ele = $('.countMessageContainer');
        ele.hide();
        ele.attr('class', 'countMessage alert-'+type+'').slideDown(300);
        setTimeout(function(){ ele.slideUp(500).remove(); }, 10000);
    }

    function prod_add_to_cart_actions(){

        $('.variableOptionsList li').click(function(){
            var ele = $(this);
            var cartBtn = ele.parents('.prodTile').find('.add_to_cart_button');
            $('.variableOptionsList .selected').removeClass('selected');

            cartBtn.data('attribute', ele.data('attribute')).data('variation', ele.data('variation')).data('variation_id', ele.data('variation_id'));

            ele.addClass('selected').parents('.dropdown').find('.dropdown-toggle').html(ele.html());
        });

        $('.custom_alpha').on( 'click', function(e) {
            e.preventDefault();
            var $thisbutton = $(this),
                item = {},
                attrName = $thisbutton.data('attribute'),
                attrValue = $thisbutton.data('variation');

            item[attrName] = attrValue;

            var data = {
                    action: "woocommerce_add_to_cart_variable_rc",
                    product_id: $thisbutton.data('product_id'),
                    quantity: $thisbutton.data('quantity'),
                    variation_id: $thisbutton.data('variation_id'),
                    variation: item
                };

            $('body').trigger('adding_to_cart',[$thisbutton,data]);

            $.post( wc_add_to_cart_params.ajax_url, data, function( response ) {

                if (!response){
                    return;
                }

                if ( response.error && response.product_url ) {
                    window.location = response.product_url;
                    return;
                }

                var this_page = window.location.toString();

                this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );

                if ( response.error && response.product_url ) {
                    window.location = response.product_url;
                    return;
                }

                if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
                    window.location = wc_add_to_cart_params.cart_url;
                    return;
                } else {
                    $thisbutton.removeClass( 'loading' );
                    var fragments = response.fragments;
                    var cart_hash = response.cart_hash;
                    // Block fragments class
                    if ( fragments ) {
                        $.each( fragments, function( key ) {
                            $( key ).addClass( 'updating' );
                        });
                    }

                    // Block widgets and fragments
                    $( '.shop_table.cart, .updating, .cart_totals' ).fadeTo( '400', '0.6' ).block({
                        message: null,
                        overlayCSS: {
                            opacity: 0.6
                        }
                    });

                    // Changes button classes
                    $thisbutton.addClass( 'added' );

                    // View cart text
                    if ( ! wc_add_to_cart_params.is_cart && $thisbutton.parent().find( '.added_to_cart' ).size() === 0 ) {
                        $thisbutton.after( ' <a href="' + wc_add_to_cart_params.cart_url + '" class="added_to_cart wc-forward" title="' +
                            wc_add_to_cart_params.i18n_view_cart + '">' + wc_add_to_cart_params.i18n_view_cart + '</a>' );
                    }

                    // Replace fragments
                    if ( fragments ) {
                        $.each( fragments, function( key, value ) {
                            $( key ).replaceWith( value );
                        });
                    }

                    // Unblock
                    $( '.widget_shopping_cart, .updating' ).stop( true ).css( 'opacity', '1' ).unblock();

                    // Cart page elements
                    $( '.shop_table.cart' ).load( this_page + ' .shop_table.cart:eq(0) > *', function() {

                        $( '.shop_table.cart' ).stop( true ).css( 'opacity', '1' ).unblock();

                        $( document.body ).trigger( 'cart_page_refreshed' );
                    });

                    $( '.cart_totals' ).load( this_page + ' .cart_totals:eq(0) > *', function() {
                        $( '.cart_totals' ).stop( true ).css( 'opacity', '1' ).unblock();
                    });

                    // Trigger event so themes can refresh other areas
                    $( document.body ).trigger( 'added_to_cart', [ fragments, cart_hash, $thisbutton ] );
                }
            });
        });

        $('<div class="quantity-nav"><div class="quantity-button quantity-up"></div><div class="quantity-button quantity-down"></div></div>').insertAfter('.quantity input[type="number"]');
        $('.quantity').each(function() {
            var ele = $(this),
                input = ele.find('input[type="number"]'),
                btnUp = ele.find('.quantity-up'),
                btnDown = ele.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

            btnUp.click(function() {
                var oldValue = parseFloat(input.val());
                if (max != '' && oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                ele.find("input").val(newVal);
                ele.find("input").trigger("change");
            });

            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                ele.find("input").val(newVal);
                ele.find("input").trigger("change");
            });
        });

        $('.productQuantity').on('input blur change',function(){
            var ele = $(this);
            ele.parents('.prodTile').find('.add_to_cart_button').data('quantity',ele.val());
        });

        $('body').on('adding_to_cart', function(e,ele,obj){
            ele.addClass('loading');
        }).on('added_to_cart',function(e,fragments,cart_hash,ele){
            ele.removeClass('loading').addClass('added').html('View Cart').attr('href',fragments['cart_link']).off();
        });

        $('body').on('click', '.continueBtn, .backBtn', function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : '';
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 100
                    }, 500);
                    return false;
                }
            }
        });

        $('body').on('click', '.woocommerce-error, .woocommerce-message', function() {
            $(this).slideUp();
        });
        
        $( document.body ).on( 'updated_cart_totals', function() { 
            console.log( 'cart updated' );
            console.log( couponmessage );
            $('#couponSecError').html(couponmessage);
            $('<div class="quantity-nav"><div class="quantity-button quantity-up"></div><div class="quantity-button quantity-down"></div></div>').insertAfter('.cartTableSec .quantity input[type="number"]');
            $('.cartTableSec .quantity').each(function() {
                var ele = $(this),
                    input = ele.find('input[type="number"]'),
                    btnUp = ele.find('.quantity-up'),
                    btnDown = ele.find('.quantity-down'),
                    min = input.attr('min'),
                    max = input.attr('max');

                btnUp.click(function() {
                    var oldValue = parseFloat(input.val());
                    if (max != '' && oldValue >= max) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue + 1;
                    }
                    ele.find("input").val(newVal);
                    ele.find("input").trigger("change");
                });

                btnDown.click(function() {
                    var oldValue = parseFloat(input.val());
                    if (oldValue <= min) {
                        var newVal = oldValue;
                    } else {
                        var newVal = oldValue - 1;
                    }
                    ele.find("input").val(newVal);
                    ele.find("input").trigger("change");
                });
            });
        } );
    }

    function get_selected_ingredients(){
        $('#buyIngredients').click(function(){
            var selected = '', ele = $('.recipe_ingredient_checkbox_table');
            ele.find('input[type="checkbox"]').each(function(){
                if($(this).is( ':checked' )){
                    selected += $(this).val() + ',';
                }
            });

            if(selected != ''){
                $('#page_loader').fadeIn('fast');
                selected = selected.substring(0, selected.length - 1);
                var data = {
                    'action': 'send_selected_ingredients',
                    'security' : im_ajax.security,
                    'selected': selected
                };

                jQuery.post(im_ajax.ajaxurl, data, function(response){
                    $('#products-container').html(response).parent().show();
                    $('#page_loader').fadeOut('slow');
                    $('html,body').animate({
                        scrollTop: $('#products-container').offset().top - 200
                    }, 500);
                    prod_add_to_cart_actions();
                });
            } else {
                var noteMessage = "Please select ingredients";
                shortNote(noteMessage, 'info');
            }
        });
    }

    function recipeLikes(){
        $("#likeRecipeBtn").click(function(){
            var ele = $(this);
            var post_id = ele.data("post_id");
            
            ele.prop("disabled", true);    

            if(ele.is('.like')){
                var post_like = 0;
            } else {
                var post_like = 1;
            }

            // Ajax call
            jQuery.ajax({
                type: "post",
                url: im_ajax.ajaxurl,
                data: "action=post-like&security="+im_ajax.security+"&post_like="+post_like+"&post_id="+post_id,
                success: function(count){
                    if(count != "already"){
                        ele.toggleClass("like dislike");
                        $('.likesCount').html(count + ' Likes');
                    }
                }
            });

            return false;
        })
    }
    
    
    function gridWidth(ele, cEle){
        var childWidth = cEle.outerWidth(true),
            eleWidth = ele.innerWidth(),
            cols = (eleWidth/childWidth),
            cEleSelector = cEle.attr('class').replace(/\s/g, '.').replace (/^/,'.');
        cols = Math.floor(cols);
        ele.innerWidth((cols*childWidth) + 5);
        $(cEleSelector+':nth-child('+cols+'n)').after('<div class="clear"></div>');
    }

    function urlReference(){
        var pageRef = $.urlParam('region');
        if(pageRef && $('.regionMenu-item button[data-href="' + pageRef + '.php"]').length){
            $('.regionMenu-item button[data-href="' + pageRef + '.php"]').parent('li').addClass('active');
        } else {
            pageRef = 'northindia';
            $('.regionMenu-item button[data-href="' + pageRef + '.php"]').parent('li').addClass('active');
        }
        $('.regionlistoption').html($('.regionMenu-item button[data-href="' + pageRef + '.php"]').html());
    }
    
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
           return null;
        } else {
           return decodeURI(results[1]) || 0;
        }
    }
    
    $('body').on('wpcf7mailsent', function(event){
        if(event.detail.contactFormId == '1600'){
            $('.subscribeAnimation').hide();
            $('.subscribeSuccess').show();
        }
    });
    
    $('body').on('wpcf7mailfailed invalid spam', function(event){
        if(event.detail.contactFormId == '1600'){
            $('.subscribeAnimation').hide();
            $('.subscribeFail').show();
        }
    });
    
    
    
    function populatePage(href){        
        var navText = ['<svg id="navLeft" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="6,10.1 1,6.1 6,2.1"/></svg>','<svg id="navRight" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 7 12" enable-background="new 0 0 7 12" xml:space="preserve" fill="none"><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="1,2 6,6 1,10"/></svg>'];
        
        var cultureRecipeSliderOptions = {
            nav:true,
            loop:true,
            dots:false,
            center:false,
            autoplay: false,
            mergeFit:true,
            navText: navText,
            items:3,
			responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1000:{
							items:3
						}
					}	
					}
        
        $('#page_loader').fadeIn('fast');
        
        var url = href.split('?')[0];
        url = url.split('/');
        href = url[url.length - 1];
        href = href.split('.')[0];
        
        var data = {
            'action': 'region-post',
            'security' : im_ajax.security,
            'region': href
        };
        
        jQuery.ajax({
            url: im_ajax.ajaxurl,
            cache: false,
            data: data,
            method: 'POST',
            success: function(response) {
                $("#regionSec1").html(response);
                $(".recipeShortSlider").owlCarousel(cultureRecipeSliderOptions);
            },
            error: function(error){
                console.log(error);
            },
            complete: function(){
                $('#page_loader').delay(300).fadeOut('slow');
                timelineAnimation();
                secElementsAnimation();
            }
        });
    }
    
    if(!jQuery.isFunction(timelineAnimation)){
        function timelineAnimation(){
            var controller = new ScrollMagic.Controller(), tween = new TimelineMax();
            $('path.orange_path').each(function(){
                var ele = $(this);
                tween.add(TweenMax.to(ele, 0.16, {strokeDashoffset: 0, ease:Linear.easeNone}))
            });
            var scene = new ScrollMagic.Scene({
                triggerElement: "#regionSec1",
                duration: $('#regionSec1').innerHeight() - window.innerHeight,
                offset: 350,
                tweenChanges: true}).setTween(tween).addTo(controller);
        }
    }

    if(!jQuery.isFunction(secElementsAnimation)){
        function secElementsAnimation(){
            var controller = new ScrollMagic.Controller();
            $('.animateElement').each(function(){
                var ele = $(this);
                var triggerClass = ele.parents('.row').attr('class');
                triggerClass = triggerClass.replace(" row", "");
                triggerClass = '.'+triggerClass;
                var scene = new ScrollMagic.Scene({triggerElement: triggerClass, duration: "100%"})
                .addTo(controller).on("enter", function (e) {
                    ele.addClass('active');
                });
            });
        }
    }
});