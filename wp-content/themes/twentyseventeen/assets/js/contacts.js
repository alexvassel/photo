(function($){

	var $scrollUpButton = $('.js-scroll-up'),
		$fullHeightBlock = $('.js-height-full');

    function init(){
        bindEvents();
        sendContactForm();
    }

    function bindEvents(){
        /* preloader  */
        $(window).load(function() {
            $('.js-status').fadeOut();
            $('.js-preloader').delay(350).fadeOut('slow');
        });

        /* scrollToTop */
        $('a[href*=#]').bind("click", function(e){
            var anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $(anchor.attr('href')).offset().top
            }, 1000);
            e.preventDefault();
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $scrollUpButton.fadeIn();
            } else {
                $scrollUpButton.fadeOut();
            }
        });
    }

    function sendContactForm(){
    	var $form = $('#contact-form');

    	$form.submit(function(e) {

            e.preventDefault();

            var c_name = $('#c_name').val();
            var c_email = $('#c_email').val();
            var c_message = $('#c_message ').val();
            var responseMessage = $form.find('.ajax-response');

            if (( c_name== '' || c_email == '' || c_message == '') || (!checkEmailValidation(c_email) )) {
                responseMessage.fadeIn(500);
                responseMessage.html('<i class="fa fa-warning"></i> Пожалуйста, исправьте ошибки и попробуйте ещё раз');
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'assets/php/contactForm.php',
                    dataType: 'json',
                    data: {
                        c_email: c_email,
                        c_name: c_name,
                        c_message: c_message
                    },
                    beforeSend: function(result) {
                        $form.find('button').empty().append('<i class="fa fa-cog fa-spin"></i> Подождите...');
                    },
                    success: function(result) {
                        if(result.sendstatus == 1) {
                        	$form.find('.ajax-hidden').fadeOut(500);
                            responseMessage.html(result.message).fadeIn(500);
                        } else {
                            $form.find('button').empty().append('<i class="fa fa-retweet"></i> Попробуйте еще раз.');
                            responseMessage.html(result.message).fadeIn(1000);
                        }
                    }
                });
            }

            return false;

        });
    }

    function checkEmailValidation(emailAddress){
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
    }

    init();

})(jQuery);