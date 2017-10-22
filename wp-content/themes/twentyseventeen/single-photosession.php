<?php
get_header(); ?>

<?php
$description = get_field('description');
$next = get_field('next');
$prev = get_field('prev');
    ?>

    <div id="preloader" class="js-preloader">
        <div id="status" class="js-status">
            <div class="status-mes"></div>
        </div>
    </div>

    <section id="portfolio" class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header">
                        <h2 class="module-title"><? the_title(); ?></h2>
                        <div class="module-date"><?php echo $description ?></div>
                        <div class="module-line"></div>
                    </div>
                </div>
            </div>

            <div class="portfolio__nav-block">
                <div class="portfolio__nav portfolio__nav__left">
                    <?php if($prev):?>
                    <a href="<?php echo get_permalink($prev) ?>">
                        <i class="fa fa-angle-left"></i>
                        <span class="portfolio__nav__title"><?php echo ' '.get_the_title($prev); ?></span>
                    </a>
                    <?php endif;?>
                </div>
                <div class="portfolio__nav portfolio__nav__right">
                    <?php if($next):?>
                    <a href="<?php echo get_permalink($next) ?>">
                        <i class="fa fa-angle-right"></i>
                        <span class="portfolio__nav__title"><?php echo get_the_title($next).' ' ?></span>
                    </a>
                    <?php endif;?>
                </div>
            </div>

            <div class="portfolio__text-container">
                <?php the_content(); ?>
            </div>

            <div class="portfolio__image-container portfolio__image-container_single">
                <?php
                $images = get_field('gallery');
                $loop_counter = 1;

                foreach( $images as $image ): ?>
                    <?php if ($loop_counter <= 5):?>
                        <div class="portfolio__images-wrap">
                            <img
                                src="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?>" srcset="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?> 1200w, <?php echo wp_get_attachment_image_src($image['id'], 'p800', false)[0]; ?> 800w, <?php echo wp_get_attachment_image_src($image['id'], 'p400', false)[0]; ?> 400w" class="portfolio__image" />
                        </div>
                    <?php else :?>
                        <div class="portfolio__images-wrap" style="display: none">
                            <img data-src="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?>" data-srcset="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?> 1200w, <?php echo wp_get_attachment_image_src($image['id'], 'p800', false)[0]; ?> 800w, <?php echo wp_get_attachment_image_src($image['id'], 'p400', false)[0]; ?> 400w" class="portfolio__image js-load-image" />
                        </div>
                    <?php endif;?>
                <?php $loop_counter +=1; endforeach; ?>
                <div class="js-load-doscroll"></div>
            </div><!-- .projects-container -->

        </div><!-- .container -->
    </section>

<?php get_footer(); ?>