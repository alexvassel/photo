<?php
/**
 * Created by PhpStorm.
 * User: av
 * Date: 26/04/17
 * Time: 20:45
 */
get_header(); ?>

    <section id="blog" class="module module-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header wow fadeInUp">
                        <h2 class="module-title">Блог</h2>
                        <div class="module-line"></div>
                    </div>
                </div>
            </div>

            <div class="row blog">
                <?php
                $post_type = 'blog';
                $post_custom_field = 'description';
                $loop_counter = 1;
                //Unlimited count of items
                $posts_per_page = -1;
                $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page,
                               'meta_key' => 'date', 'orderby' => 'meta_value_num', 'order' => 'DESC');
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();
                    $cover = get_field('cover');
                    ?>
                        <div class="col-sm-6 wow fadeInUp">
                            <a href="<?php the_permalink(); ?>" class="blog__item">
                                <span class="blog__image-wrap">
                                    <img src="<?php echo wp_get_attachment_image_src($cover, 'p800', false)[0]; ?>" class="blog__image"/>
                                </span>
                                <span class="blog__text">
                                    <span class="blog__title"><?php the_title(); ?></span>
                                    <span class="blog__date"><?php
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

                    <?php
                    if ($loop_counter % 2 == 0 and $loop_counter != $loop->found_posts)
                        echo '<div class="clearfix visible-md-block"></div>';
                    $loop_counter++;
                endwhile;
                ?>

            </div><!-- .row -->

        </div><!-- .container -->
    </section>

    <!-- Blog end -->

<?php get_footer();
