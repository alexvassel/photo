<?php get_header(); 
    $description = get_field('description');
    $cover = get_field('cover');
    ?>
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
                    $cover = get_field('cover');
                    $description = get_field('description');

                    echo '<div class="col-md-4 col-sm-6 portfolio-item">';
                ?>

                    <figure>
                        <img src="<?php echo $cover; ?>" alt="">
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
            endwhile; ?>
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

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <a href="assets/images/portfolio/love_story/valya_vasya/web-62.jpg"><img src="assets/images/portfolio/love_story/valya_vasya/web-62.jpg" alt=""></a>
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <a href="assets/images/2.jpg"><img src="assets/images/2.jpg" alt=""></a>
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/122.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/vert2.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <a href="assets/images/vert.jpg"><img src="assets/images/vert.jpg" alt=""></a>
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/portfolio/love_story/valya_vasya/web-62.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/2.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/vert.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/2.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/vert2.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/portfolio/love_story/valya_vasya/web-62.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/vert.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/2.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/122.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/vert2.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/portfolio/love_story/valya_vasya/web-62.jpg" alt="">
                    </figure>
                </div>

                <div class="portfolio-item portfolio-item-single js-portfolio-feed">
                    <figure>
                        <img src="assets/images/2.jpg" alt="">
                    </figure>
                </div>
            </div>
        </div><!-- .projects-container -->

    </section>

<?php get_footer(); ?>