<?php get_header();
$description = get_field('description');
$cover = get_field('cover');
?>    
    
<!--<div id="preloader" class="js-preloader">
    <div id="status" class="js-status">
        <div class="status-mes"></div>
    </div>
</div>-->

<div class="subitem__main-image height-full" style="background-image: url('<?php echo wp_get_attachment_image_src($cover, full, false)[0]; ?>')">
            <div class="subitem__main-image__text">
                <div class="subitem__main-image__text__inner">
                    <h2 class="subitem__main-image__title"><?php the_title(); ?></h2>
                    <div class="subitem__main-image__date">
                        <?php
                            $date = get_field('date', false, false);
                            $date = new DateTime($date);
                            echo $date->format('j.m.Y');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <!-- Blog start -->
    <section id="blog">

        <div class="container subitem">
            <div class="row">
                <div class="col-sm-12">
                    <div class="subitem__text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="other" class="module module-gray">

        <div class="container">
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header">
                        <h3 class="module-title">Еще и такое есть:</h3>
                    </div>
                </div>
            </div>
            <div class="row blog">
                <?php
                $current_item_id = get_the_ID();
                $post_type = 'blog';
                $post_custom_field = 'description';
                //Unlimited count of items
                $posts_per_page = 3;
                $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page,
                               'post__not_in' => array($current_item_id));
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();
                    $cover = get_field('cover');
                    ?>
                <div class="col-sm-4">
                    <a href="<?php the_permalink();?>" class="blog__item">
                        <span class="blog__image-wrap">
                            <img src="<?php echo wp_get_attachment_image_src($cover, 'p800', false)[0]; ?>" class="blog__image"/>
                        </span>
                        <span class="blog__text">
                            <span class="blog__title"><?php the_title(); ?></span>
                            <span class="blog__date">
                                <?php
                                    $date = get_field('date', false, false);
                                    $date = new DateTime($date);
                                    echo $date->format('j.m.Y');
                                ?>
                            </span>
                            <span class="blog__desc">
                                <?php echo get_field($post_custom_field); ?>
                            </span>
                        </span>
                    </a>
                </div>

               
                <?php endwhile; ?>
            </div><!-- .row -->
        </div>
    </section>

<?php get_footer(); ?>