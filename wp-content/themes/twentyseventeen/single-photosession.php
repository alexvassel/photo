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

            <div class="portfolio__nav">
                <div class="row">

                    <div class="col-sm-6">
                        <?php if($prev):?>
                            <a href="<?php echo get_permalink($prev) ?>"><i class="fa fa-angle-left"></i><?php echo ' '.get_the_title($prev); ?></a>
                        <?php endif;?>
                    </div>

                    <div class="col-sm-6 text-right">
<?php if($next):?>
                        <a href="<?php echo get_permalink($next) ?>"><?php echo get_the_title($next).' ' ?><i class="fa fa-angle-right"></i></a>
<?php endif;?>
                    </div>
                </div>
            </div>
            <div class="portfolio__image-container">
            <?php
            $images = get_field('gallery');
            $loop_counter = 1;
            foreach( $images as $image ): ?>
                <div class="portfolio__images-wrap">
                    <img src="<?php echo $image['url']; ?>" width="800" height="1200" class="portfolio__image"/>
                </div>
                <?php $loop_counter +=1; endforeach; ?>


            </div><!-- .projects-container -->

        </div><!-- .container -->
    </section>
<?php get_footer(); ?>