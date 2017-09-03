(function($){

    var $scrollUpButton = $('.js-scroll-up'),
        $fullHeightBlock = $('.js-height-full'),
        $header = $('.js-header'),
        indexPage = false,
        scrollTop = 0,
        $instagram = $('.js-instagram');

    function init(){
        if ($('#home').length > 0) {
            indexPage = true;
        }

        bindEvents();
        //getInstagram();
    }

    function bindEvents(){
        /* preloader  */
        $(window).load(function() {
            if ($('.js-portfolio-feed-wrap').length > 0 ){
                setTimeout(function(){
                    $('.js-portfolio-feed-wrap').masonry({
                        itemSelector: '.js-portfolio-feed'
                    });
                }, 0);
            }

            initPopup();

            if ( $('.js-preloader').length > 0 ) {
                $('.js-status').fadeOut();
                $('.js-preloader').delay(350).fadeOut('slow');
            }
        });

        /* scrollToTop */
        $('a[href*=#]').on('click', function(e){
            e.preventDefault();
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top
            }, 1000);
        });

        $(window).on('scroll', function() {
            scrollTop = $(this).scrollTop();

            if (scrollTop > 100) {
                $scrollUpButton.fadeIn();
            } else {
                $scrollUpButton.fadeOut();
            }

            if (indexPage) {
                stickyNavbar();
            }
        });
    }

    function initPopup(){
        if ($('.js-portfolio-popup').length > 0) {
            $('.js-portfolio-feed-wrap').magnificPopup({
                delegate: 'a',
                type:'image',
                tLoading: 'Загрузка...',
                //disableOn: 640,
                gallery: {
                    enabled: true,
                    tCounter: '%curr% из %total%'
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't foget to change the duration also in CSS
                },
                image: {
                    tError: 'Извините, <a href="%url%">изображение</a> не может быть загружено', // Error message when image could not be loaded
                    titleSrc: function(item) {
                        return '<a href="' + item.el.attr('data-link') + '">' + item.el.attr('data-title') + '</a>';
                    }
                },
                ajax: {
                  settings: null,
                  tError: 'Извините, <a href="%url%">контент</a> не может быть загружен'
                },
                fixedContentPos: true
            });
        }
    }

    function stickyNavbar(){
        if (scrollTop > $(window).height()) {
            $header.addClass('fixed');
        } else {
            $header.removeClass('fixed');
        }
    }

    /*function getInstagram(){
        if ($instagram.length > 0) {
            $instagram.pongstgrm({
                accessId: '1750728055',
                accessToken: '1750728055.1677ed0.87365971f9734ad385c4e0c46f827d41',
                button: 'js-button-success btn btn-custom-2',
                show: 'recent',
                effects: '',
                buttontext: 'Загрузить еще',
                column: 'pongstagrm__thumbnail js-instagram-item',
                comments: false,
                likes: false,
                timestamp: false,
                count: 16,
            });
        }
    }*/

    init();

})(jQuery);