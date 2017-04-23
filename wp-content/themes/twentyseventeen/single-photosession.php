<?php
get_header(); ?>

<?php
$post_custom_field = 'cropped_main_page_picture';
$description = get_field('description');
$next = get_field('next');
$prev = get_field('prev');
    ?>

    <section id="portfolio" class="module module-gray">
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

            <div class="portfolio__image-container portfolio__image-container_single">
               

                <?php
                $images = get_field('gallery');
                $loop_counter = 1;

                foreach( $images as $image ): ?>
                    <?php if($loop_counter == 1):?>

                        <div class="portfolio__images-wrap">
                            <img src="<?php echo $image['url']; ?>" class="portfolio__image"/>
                        </div>

                    <?php else :?>

                        <div class="portfolio__images-wrap">
                            <img
                                src="<?php echo $image['url']; ?>"
                                data-sizes="auto"
                                srcset="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                data-srcset="
                                    <?php echo $image['url']; ?> 1200w,
                                    assets/images/portfolio/love_story/valya_vasya/web-14.jpg 700w,
                                    assets/images/portfolio/love_story/valya_vasya/web-104.jpg 340w
                                "
                                class="lazyload" />
                        </div>

                    <?php endif;?>

                <?php $loop_counter +=1; endforeach; ?>


            </div><!-- .projects-container -->

        </div><!-- .container -->
    </section>

<?php get_footer(); ?>