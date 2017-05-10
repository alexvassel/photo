<?php get_header();
$description = get_field('description');
$cover = get_field('cover');
$allImages = [];
?>

    <div id="preloader" class="js-preloader">
        <div id="status" class="js-status">
            <div class="status-mes"></div>
        </div>
    </div>

    <div class="subitem__main-image height-full" style="background-image: url('<?php echo $cover; ?>')">
        <div class="subitem__main-image__text">
            <div class="subitem__main-image__text__inner">
                <h2 class="subitem__main-image__title"><?php the_title(); ?></h2>
                <div class="subitem__main-image__date"><?php echo $description; ?></div>
            </div>
        </div>
    </div>

    <section id="portfolio" class="module-gray">
        <div class="container module">
            <div class="portfolio-items-container row">
                <?php
                $post_type = 'photosession';
                $post_custom_field = 'description';
                $loop_counter = 1;
                //Unlimited count of categories
                $posts_per_page = -1;
                $category_id = get_the_ID();
                $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page,
                    'orderby' => 'added', 'order'   => 'DESC', 'meta_key' => 'portfolio', 'meta_value' => $category_id);
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();
                $photosession_cover = get_field('cover');
                $description = get_field('description');

                echo '<div class="col-md-4 col-sm-6 portfolio-item">';
                ?>

                <figure>
                    <img src="<?php echo wp_get_attachment_image_src($photosession_cover, 'p400', false)[0]; ?>" alt="">
                    <figcaption>
                        <h3 class="portfolio-item-title"><?php the_title(); ?></h3>
                        <p><?php echo $description; ?></p>
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
            $images = get_field('gallery');
            foreach( $images as $image ):
                array_push($allImages, $image);
            endforeach;
            endwhile;
            ?>
        </div>
        </div>
    </section>



    <section class="module">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="module-header ">
                        <h2 class="module-title">Feed</h2>
                        <div class="module-line"></div>
                    </div>
                </div>
            </div>
            <div class="portfolio-item-single_wrap js-portfolio-feed-wrap">

                <?php shuffle($allImages);
                $allImages = array_slice($allImages, 0, 30);
                foreach( $allImages as $image ):?>
                    <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                        <figure>
                            <a class="js-portfolio-popup" href="<?php echo $image['url']; ?>">
                                <img src="<?php echo $image['url']; ?>" alt="">
                            </a>
                        </figure>
                    </div>
                <?php endforeach; ?>


            </div>
        </div><!-- .projects-container -->

    </section>

<?php get_footer(); ?>