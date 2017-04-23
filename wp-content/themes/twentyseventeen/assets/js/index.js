(function($){

    var $scrollUpButton = $('.js-scroll-up'),
        $fullHeightBlock = $('.js-height-full'),
        $header = $('.js-header'),
        indexPage = false,
        scrollTop = 0,
        $lazyImage = $('img.lazy'),
        $instagram = $('.js-instagram');

    function init(){
        if ($('#home').length > 0) {
            indexPage = true;
        }

        bindEvents();
        initLazyLoad();
        resizeMainImage();
        getInstagram();
    }

    function bindEvents(){
        /* preloader  */
        $(window).load(function() {
            if ( $('.js-preloader').length > 0 ) {
                $('.js-status').fadeOut();
                $('.js-preloader').delay(350).fadeOut('slow');
            }
        });

        /* scrollToTop */
        $('a[href*=#]').on('click', function(e){
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top
            }, 1000);
            e.preventDefault();
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

        $(window).resize(function(){
            resizeMainImage();
        });
    }

    function initLazyLoad(){
        if ($lazyImage.length > 0) {
            $lazyImage.filter(':not(:hidden)').lazyload({
                effect: 'fadeIn',
                threshold: 200,
                skip_invisible: true
            });

            $lazyImage.filter(':hidden[data-mobile]').attr('width','').attr('height','').show().lazyload({
                effect: 'fadeIn',
                data_attribute: 'mobile'
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

    function resizeMainImage(){
        if ($fullHeightBlock.length > 0){
            $fullHeightBlock.height( $(window).height() );
        }
    }

    function getInstagram(){
        if ($instagram.length > 0) {
            $instagram.pongstgrm({
                accessId: '1750728055',
                accessToken: '1750728055.1677ed0.87365971f9734ad385c4e0c46f827d41',
                button: 'js-button-success btn btn-custom-2',
                show: 'recent',
                effects: '',
                buttontext: 'Загрузить еще',
                column: 'col-xs-6 col-sm-3 col-md-3 col-lg-3',
                comments: false,
                likes: false,
                timestamp: false,
                count: 16
            });
        }
    }

    init();

})(jQuery);