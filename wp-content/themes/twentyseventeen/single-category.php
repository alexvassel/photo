<?php
get_header(); ?>
    <section id="portfolio" class="module-gray">
        <div class="portfolio-items-container row">
<?php
$post_type = 'photosession';
$post_custom_field = 'description';
$loop_counter = 1;
//Unlimited count of categories
$posts_per_page = -1;
$category_id = get_the_ID();
$args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page,
    'orderby' => 'position', 'order'   => 'ASC', 'meta_key' => 'category', 'meta_value' => $category_id);
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();
    $cover = get_field('cover');
    $description = get_field('description');


    echo '<div class="col-md-4 col-sm-6 portfolio-item">';
                                                       $loop_counter++;


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

endwhile;
?>
    </div></section>
<?php get_footer(); ?>