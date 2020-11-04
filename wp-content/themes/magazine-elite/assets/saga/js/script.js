(function (e) {
    "use strict";
    var n = window.SAGA_JS || {};
    var iScrollPos = 0;

    /*Used for ajax loading posts*/
    var loadType, loadButton, loader, pageNo, loading, morePost, scrollHandling;
    /**/

    n.stickyMenu = function () {
        e(window).scrollTop() > 350 ? e("body").addClass("nav-affix") : e("body").removeClass("nav-affix")
    },
        n.mobileMenu = {
            init: function () {
                this.toggleMenu(), this.menuMobile(), this.menuArrow()
            },
            toggleMenu: function () {
                e('#saga-header').on('click', '.toggle-menu', function (event) {
                    var ethis = e('.main-navigation .menu .menu-mobile');
                    if (ethis.css('display') == 'block') {
                        ethis.slideUp('300');
                        e("#saga-header").removeClass('mmenu-active');
                    } else {
                        ethis.slideDown('300');
                        e("#saga-header").addClass('mmenu-active');
                    }
                    e('.ham').toggleClass('exit');
                });
                e('#saga-header .main-navigation ').on('click', '.menu-mobile a i', function (event) {
                    event.preventDefault();
                    var ethis = e(this),
                        eparent = ethis.closest('li'),
                        esub_menu = eparent.find('> .sub-menu');
                    if (esub_menu.css('display') == 'none') {
                        esub_menu.slideDown('300');
                        ethis.addClass('active');
                    } else {
                        esub_menu.slideUp('300');
                        ethis.removeClass('active');
                    }
                    return false;
                });
            },
            menuMobile: function () {
                if (e('.main-navigation .menu > ul').length) {
                    var ethis = e('.main-navigation .menu > ul'),
                        eparent = ethis.closest('.main-navigation'),
                        pointbreak = eparent.data('epointbreak'),
                        window_width = window.innerWidth;
                    if (typeof pointbreak == 'undefined') {
                        pointbreak = 991;
                    }
                    if (pointbreak >= window_width) {
                        ethis.addClass('menu-mobile').removeClass('menu-desktop');
                        e('.main-navigation .toggle-menu').css('display', 'block');
                    } else {
                        ethis.addClass('menu-desktop').removeClass('menu-mobile').css('display', '');
                        e('.main-navigation .toggle-menu').css('display', '');
                    }
                }
            },
            menuArrow: function () {
                if (e('#saga-header .main-navigation div.menu > ul').length) {
                    e('#saga-header .main-navigation div.menu > ul .sub-menu').parent('li').find('> a').append('<i class="ion-ios-arrow-down">');
                }
            }
        },

        n.SagaSearch = function () {
            e(".search-button").click(function (event) {
                event.preventDefault();
                e(this).toggleClass('active');
                e(".search-box").slideToggle("500");
            });
        },

        n.SagePreloader = function () {
            e(window).load(function(){
                e("body").addClass("page-loaded");
            });
        },

        n.SageSlider = function () {
            e(".saga-slide").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                autoplay: true,
                autoplaySpeed: 8000,
                infinite: true,
                dots: false,
                nextArrow: '<i class="navcontrol-icon slide-next ion-ios-arrow-right"></i>',
                prevArrow: '<i class="navcontrol-icon slide-prev ion-ios-arrow-left"></i>',
                asNavFor: '.slider-nav'
            });


            e('.slider-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.saga-slide',
                dots: false,
                arrows: false,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            /*Single Column Gallery*/
            n.SingleColGallery('gallery-columns-1');
            /**/

        },

        n.SingleColGallery = function (gal_selector) {
            if(e.isArray(gal_selector)){
                e.each(gal_selector, function (index, value) {
                    e("#"+value).find('.gallery-columns-1').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        infinite: false,
                        nextArrow: '<i class="navcontrol-icon slide-next ion-ios-arrow-right"></i>',
                        prevArrow: '<i class="navcontrol-icon slide-prev ion-ios-arrow-left"></i>'
                    });
                });
            }else{
                e("."+gal_selector).slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false,
                    infinite: false,
                    nextArrow: '<i class="navcontrol-icon slide-next ion-ios-arrow-right"></i>',
                    prevArrow: '<i class="navcontrol-icon slide-prev ion-ios-arrow-left"></i>'
                });
            }
        },

        n.DataBackground = function () {
            var pageSection = e(".data-bg");
            pageSection.each(function (indx) {

                if (e(this).attr("data-background")) {
                    e(this).css("background-image", "url(" + e(this).data("background") + ")");
                }
            });

            e('.bg-image').each(function () {
                var src = e(this).children('img').attr('src');
                e(this).css('background-image', 'url(' + src + ')');
            });
        },

        n.show_hide_scroll_top = function () {
            if (e(window).scrollTop() > e(window).height() / 2) {
                e(".scroll-up").fadeIn(300);
            } else {
                e(".scroll-up").fadeOut(300);
            }
        },

        n.scroll_up = function () {
            e("#scroll-up").on("click", function () {
                e("html, body").animate({
                    scrollTop: 0
                }, 700);
                return false;
            });
        },

        n.ms_masonry = function () {
            if( e('.masonry-grid').length > 0 ){
                //e('.masonry-grid article').hide();
                var $grid = e('.masonry-grid').imagesLoaded( function() {
                    //e('.masonry-grid article').fadeIn();
                    $grid.masonry({
                        itemSelector: 'article',
                        horizontalOrder: true,
                        hiddenStyle: {
                            transform: 'scale(0.5)',
                            opacity: 0
                        },
                        visibleStyle: {
                            transform: 'scale(1)',
                            opacity: 1
                        }
                    });
                });
            }
        },

        n.saga_reveal = function () {
            e('#saga-reveal').on('click', function(event) {
                e('body').toggleClass('reveal-box');
            });
            e('.close-popup').on('click', function(event) {
                e('body').removeClass('reveal-box');
            });
        },

        n.SidrNav = function () {
            e('#widgets-nav').sidr({
                name: 'sidr-nav',
                side: 'right'
            });

            e('.sidr-class-sidr-button-close').click(function (event) {
                event.preventDefault();
                e.sidr('close', 'sidr-nav');
            });
        },

        n.setLoadPostDefaults = function () {
            if(  e('.load-more-posts').length > 0 ){
                loadButton = e('.load-more-posts');
                loader = e('.load-more-posts .ajax-loader');
                loadType = loadButton.attr('data-load-type');
                pageNo = 2;
                loading = false;
                morePost = true;
                scrollHandling = {
                    allow: true,
                    reallow: function() {
                        scrollHandling.allow = true;
                    },
                    delay: 400
                };
            }
        },

        n.fetchPostsOnScroll = function () {
            if(  e('.load-more-posts').length > 0 && 'scroll' === loadType ){
                var iCurScrollPos = e(window).scrollTop();
                if( iCurScrollPos > iScrollPos ){
                    if( ! loading && scrollHandling.allow && morePost ) {
                        scrollHandling.allow = false;
                        setTimeout(scrollHandling.reallow, scrollHandling.delay);
                        var offset = e(loadButton).offset().top - e(window).scrollTop();
                        if( 2000 > offset ) {
                            loading = true;
                            n.ShowPostsAjax();
                        }
                    }
                }
                iScrollPos = iCurScrollPos;
            }
        },

        n.fetchPostsOnClick = function () {
            if( e('.load-more-posts').length > 0 && 'click' === loadType ){
                e('.load-more-posts a').on('click',function (event) {
                    event.preventDefault();
                    loading = true;
                    n.ShowPostsAjax();
                });
            }
        },

        n.ShowPostsAjax = function () {
            e.ajax({
                type : 'GET',
                url : magazineElite.ajaxurl,
                data : {
                    action : 'magazine_elite_load_more',
                    nonce: magazineElite.nonce,
                    page: pageNo,
                    post_type: magazineElite.post_type,
                    search: magazineElite.search,
                    cat: magazineElite.cat,
                    taxonomy: magazineElite.taxonomy,
                    author: magazineElite.author,
                    year: magazineElite.year,
                    month: magazineElite.month,
                    day: magazineElite.day
                },
                dataType:'json',
                beforeSend: function() {
                    loader.addClass('ajax-loader-enabled');
                },
                success : function( response ) {
                    if(response.success){

                        var gallery = false;
                        var gal_selectors = [];
                        var $content_join = response.data.content.join('');

                        if ($content_join.indexOf("gallery-columns-1") >= 0){
                            gallery = true;
                            /*Push the post ids having galleries so that new gallery instance can be created*/
                            e($content_join).find('.entry-gallery').each(function(){
                                gal_selectors.push(e(this).closest('article').attr('id'));
                            });
                        }

                        if( e('.masonry-grid').length > 0 ){
                            var $content = e( $content_join );
                            $content.hide();
                            var $grid = e('.masonry-grid');
                            $grid.append( $content );
                            $grid.imagesLoaded(function () {
                                $content.show();

                                /*Init new Gallery*/
                                if ( true === gallery ){
                                    n.SingleColGallery(gal_selectors);
                                }
                                /**/

                                $grid.masonry('appended', $content).masonry();

                                loader.removeClass('ajax-loader-enabled');
                            });
                        }else{
                            e('.magazine-elite-posts-lists').append( response.data.content );
                            /*Init new Gallery*/
                            if ( true === gallery ){
                                n.SingleColGallery(gal_selectors);
                            }
                            /**/
                            loader.removeClass('ajax-loader-enabled');
                        }

                        pageNo++;
                        loading = false;
                        if(!response.data.more_post){
                            morePost = false;
                            loadButton.fadeOut();
                        }

                        /*For audio and video to work properly after ajax load*/
                        e('video, audio').mediaelementplayer({ alwaysShowControls: true });
                        /**/

                    }else{
                        loadButton.fadeOut();
                    }
                }
            });
        },

        e(document).ready(function () {
            n.mobileMenu.init(), n.SagaSearch(), n.SagePreloader(), n.SageSlider(), n.DataBackground(), n.scroll_up(), n.saga_reveal(), n.SidrNav(), n.ms_masonry(), n.setLoadPostDefaults(), n.fetchPostsOnClick();
        }),
        e(window).scroll(function () {
            n.stickyMenu(), n.show_hide_scroll_top(),  n.fetchPostsOnScroll();
        }),
        e(window).resize(function () {
            n.mobileMenu.menuMobile();
        })
})(jQuery);