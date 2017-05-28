<?php get_header(); ?>

    <section id="portfolio" class="module module-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header wow fadeInUp">
                        <h2 class="module-title">Портфолио</h2>
                        <div class="module-line"></div>
                    </div>
                </div>
            </div>


            <div class="portfolio-items-container row">

            <?php
                $post_type = 'portfolio';
                $post_custom_field = 'description';
                $loop_counter = 1;
                //Unlimited count of categories
                $posts_per_page = -1;
                $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page,
                               'orderby' => 'position', 'order'   => 'ASC');
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();
                $cover = get_field('cover');
                $category_id = get_the_ID();
            ?>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <figure>
                            <img src="<?php echo wp_get_attachment_image_src($cover, 'p800', false)[0]; ?>" alt="">
                            <figcaption>
                                <h3 class="portfolio-item-title"><?php the_title(); ?></h3>
                                <p><?php echo get_field($post_custom_field); ?></p>
                                <a href="<?php the_permalink(); ?>">Посмотреть</a>
                            </figcaption>
                        </figure>
                    </div>
                <?php
                    if ($loop_counter % 2 == 0 and $loop_counter != $loop->found_posts)
                        echo '<div class="clearfix visible-sm-block"></div>';

                    if ($loop_counter % 3 == 0 and $loop_counter != $loop->found_posts)
                        echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
                        $loop_counter++;
                endwhile;
                ?>

            </div><!-- .projects-container -->
        </div>
    </section>

    <section id="instagram" class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header">
                        <h2 class="module-title">Instagram</h2>
                        <div class="module-line"></div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="js-instagram"></div>
                <div class="js-instagram-loading"></div>
            </div>

        </div><!-- .container -->
    </section>

<?php get_footer();
