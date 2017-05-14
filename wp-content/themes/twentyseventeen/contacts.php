<?php get_header(); ?>

    <!-- Contact start -->

    <section id="contact" class="module module-gray">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="module-header">
                        <h2 class="module-title">Контакты</h2>
                        <div class="module-line"></div>
                        <div class="module-subtitle">
                            Хотите модную фотосессию, современный сайт или логотип? <br/>
                            Расскажите мне о ваших желаниях! Это доступнее, чем вы думаете.
                        </div>
                        <div class="module-line"></div>
                    </div>

                </div>

            </div><!-- .row -->

            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <?php echo do_shortcode( '[contact-form-7 id="870" title="Контакты"]' ); ?>

                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </section>

    <!-- Contact end -->


<?php get_footer();
