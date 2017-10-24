<?php
get_header(); ?>

<?php
    $description = get_field('description');
    $prev = get_adjacent_post(false,'',false);
    $next = get_adjacent_post(false,'',true);

?>

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
                <?php if($prev):?>  
                    <?php $url = get_permalink($prev->ID); ?>          
                    <div class="portfolio__nav portfolio__nav__left">
                        <a href="<?php echo $url ?>">
                            <i class="fa fa-angle-left"></i>
                            <span class="portfolio__nav__title"><span class="portfolio__nav__title__text"><?php echo $prev->post_title ?></span></span>
                        </a>
                    </div>
                <?php endif;?>

                <?php if($next) :?>     
                    <?php $url = get_permalink($next->ID); ?>         
                    <div class="portfolio__nav portfolio__nav__right">
                        <a href="<?php echo $url ?>">
                            <span class="portfolio__nav__title"><span class="portfolio__nav__title__text"><?php echo $next->post_title ?></span></span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                <?php endif;?>
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
                                src="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?>" srcset="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?> 1200w, <?php echo wp_get_attachment_image_src($image['id'], 'p800', false)[0]; ?> 800w, <?php echo wp_get_attachment_image_src($image['id'], 'p400', false)[0]; ?> 400w" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="portfolio__image" />
                        </div>
                    <?php else :?>
                        <div class="portfolio__images-wrap" style="display: none">
                            <img data-src="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?>" data-srcset="<?php echo wp_get_attachment_image_src($image['id'], 'p1400', false)[0]; ?> 1200w, <?php echo wp_get_attachment_image_src($image['id'], 'p800', false)[0]; ?> 800w, <?php echo wp_get_attachment_image_src($image['id'], 'p400', false)[0]; ?> 400w" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" class="portfolio__image js-load-image" />
                        </div>
                    <?php endif;?>
                <?php $loop_counter +=1; endforeach; ?>
                <div class="js-load-doscroll"></div>
            </div><!-- .projects-container -->

        </div><!-- .container -->
    </section>

<?php get_footer(); ?>