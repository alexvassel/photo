<!-- Footer start -->
<footer id="footer">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <ul class="social-links">
                    <?php
                        $post_type = 'social_button';
                        //Unlimited count of items
                        $posts_per_page = -1;
                        $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page);
                        $loop = new WP_Query( $args );
                        while ( $loop->have_posts() ) : $loop->the_post();
                    ?>
                    <li><a href="<?php echo get_field('href'); ?>" target="_blank" class="" title="<?php echo get_field('title'); ?>"><i class="<?php echo get_field('class'); ?>"></i></a></li>
                    <?php endwhile;?>
                </ul>

                <p class="copyright">
                    Copyright © Alice Zed, Все права защищены
                </p>

            </div>

        </div><!-- .row -->
    </div><!-- .container -->
</footer>

<!-- Footer end -->

<!-- Scroll-up -->

<div class="scroll-up js-scroll-up">
    <a href="#header"><i class="fa fa-angle-double-up"></i></a>
</div>
<?php wp_footer(); ?>

</body>
</html>