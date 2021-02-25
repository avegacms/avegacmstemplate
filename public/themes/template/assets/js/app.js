"use strict";

var appClass = function ()
{
    var self = this;

    self.events = function ()
    {
        self.InitFixedHeader();
        self.BLazyLoad();
        self.InitObjectFitImages();
        self.InitSwiper();
        self.InitFancyBox();
        self.InitScrollTop();
    }

    self.InitFixedHeader = function ()
    {
        var header_top_height = $('.header_top').outerHeight();

        $(window).scroll(function ()
        {
            var header_height = $('.header').outerHeight();

            if ( $(this).scrollTop() > header_height )
            {
                $('.header').css('padding-top', header_top_height);

                $('.header_top').addClass('header-fixed shadow-sm').css('top', -header_top_height ).animate({top: 0}, 500);
            }
            else if ( $(this).scrollTop() < header_height )
            {
                $('.header_top').removeClass('header-fixed shadow-sm').clearQueue();

                $('.header').css('padding-top', 0);
            }
        });
    }

    self.BLazyLoad = function()
    {
        var bLazy = new Blazy({
            success: function(element){
                setTimeout(function(){
                    var parent = element.parentNode;
                    parent.className = parent.className.replace(/\bloading\b/,'');
                }, 200);
            }
        });
    }

    self.InitObjectFitImages = function ()
    {
        objectFitImages();
    }

    self.InitSwiper = function ()
    {
        if ( $('.slider_main').length > 0 )
        {
            var mySwiperSliderMain = new Swiper ('.slider_main .swiper-container', {
                spaceBetween: 0,
                slidesPerView: 1,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                loop: true,
                loopedSlides: 5,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                preloadImages: false,
                lazy: true,
                fadeEffect: {
                    crossFade: true
                },
                pagination: {
                    el: '.slider_main .swiper-pagination',
                    clickable: true
                },
            });
        }
    }

    self.InitFancyBox = function()
    {
        $( '.viewContentImage, .ra-certificate-img, .ra-projects-item, .viewProductImage' ).fancybox({
            prevEffect		: 'none',
            nextEffect		: 'none',
            closeBtn		: true,
            helpers		: {
                title	: { type : 'inside' },
                buttons	: {}
            },
            beforeLoad  : function(){
                var url= $(this.element).attr("href");
                url = url.replace("watch?v=", "embed/");
                url += '?fs=1&autoplay=1';
                this.href = url
            }
        });
    }

    self.InitScrollTop = function ()
    {
        if ( $('.js-scroll-top').length > 0 )
        {
            $('.js-scroll-top').on('click', function (e)
            {
                e.preventDefault();

                if ( $('html').scrollTop() > 0 )
                {
                    $('html, body').animate({ scrollTop: 0 }, 1200).clearQueue();
                }
            });
        }
    }
}

var app = new appClass();

$(document).ready(function(){
    app.events();
});