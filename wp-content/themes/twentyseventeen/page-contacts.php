<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Edin
 */

get_header(); ?>

    <!-- Contact start -->

    <section id="contact" class="module module-gray">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">

                    <div class="module-header">
                        <h2 class="module-title"><? the_title() ?></h2>
                        <div class="module-date"><?php echo get_field('phone'); ?></div>
                        <div class="module-line"></div>
                        <ul class="social-links dark">
                            <?php
                            $post_type = 'social_button';
                            //Unlimited count of items
                            $posts_per_page = -1;
                            $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page);
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                                ?>
                                <li><a href="<?php echo get_field('href'); ?>" target="_blank" class="" title="<?php echo get_field('title'); ?>"><i class="<?php echo get_field('class'); ?>"></i></a></li>
                            <?php endwhile;?>
                            <?php wp_reset_query(); ?>
                        </ul>
                    </div>

                </div>

            </div><!-- .row -->

            <div class="row">
                <div class="col-sm-4">
                    <div class="portfolio__images-wrap">
                        <?php $image = get_field('image'); ?>
                        <img src="<?php echo wp_get_attachment_image_src($image, 'p800', false)[0]; ?>" width="800" height="1200" class="portfolio__image"/>
                    </div>
                </div>
                <div class="col-sm-8">
                    <? the_content(); ?>
                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </section>

    <!-- Contact end -->


<?php get_footer(); ?>