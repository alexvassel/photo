<?php get_header();
$description = get_field('description');
$cover = get_field('cover');
?>    <div class="subitem__main-image height-full" style="background-image: url('<?php echo wp_get_attachment_image_src($cover, full, false)[0]; ?>')">
            <div class="subitem__main-image__text">
                <div class="subitem__main-image__text__inner">
                    <h2 class="subitem__main-image__title"><?php the_title(); ?></h2>
                    <div class="subitem__main-image__date"><?php echo get_field('date'); ?></div>
                </div>
            </div>
        </div>
    <!-- Blog start -->
    <section id="blog" class="module-gray">

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

<?php get_footer(); ?>