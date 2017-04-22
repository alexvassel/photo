<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>



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
        </div>

        <?php
        $post_type = 'category';
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

        <div class="portfolio-items-container row">

            <div class="col-md-4 col-sm-6 portfolio-item">
                <figure>
                    <img src="<?php echo $cover; ?>" alt="">
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
            $loop_counter++;
            endwhile;
            ?>

        </div><!-- .projects-container -->
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
