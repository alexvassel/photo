<?php get_header();
$description = get_field('description');
$cover = get_field('cover');
?>    <div class="subitem__main-image height-full" style="background-image: url('<?php echo $cover; ?>')">
            <div class="subitem__main-image__text">
                <div class="subitem__main-image__text__inner">
                    <h2 class="subitem__main-image__title"><?php the_title(); ?></h2>
                    <div class="subitem__main-image__date"><?php echo get_field('date'); ?></div>
                </div>
            </div>
        </div>
    <!-- Blog start -->
    <section id="blog" class="module-gray">



        <div class="container">
            <div class="blog-item">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="blog-item__text">

                            <p>Быть хорошим веб-разработчиком — это не просто сидеть за монитором компьютера и кодить. Быть веб-разработчиком — значит всегда быть в курсе. Всегда читать, пробовать, искать, сравнивать, узнавать, не отставать от современных технологий.</p>

                            <p>Быть хорошим веб-разработчиком — это не просто сидеть за монитором компьютера и кодить. Быть веб-разработчиком — значит всегда быть в курсе. Всегда читать, пробовать, искать, сравнивать, узнавать, не отставать от современных технологий.</p>

                            <p>Быть хорошим веб-разработчиком — это не просто сидеть за монитором компьютера и кодить. Быть веб-разработчиком — значит всегда быть в курсе. Всегда читать, пробовать, искать, сравнивать, узнавать, не отставать от современных технологий.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">

                        <div class="blog__image-wrap">
                            <img src="assets/images/5.jpg" class="blog__image"/>
                        </div>

                        <div class="blog__image-wrap">
                            <img src="assets/images/5.jpg" class="blog__image"/>
                        </div>

                        <div class="blog__image-wrap">
                            <img src="assets/images/5.jpg" class="blog__image"/>
                        </div>

                        <div class="blog__image-wrap">
                            <img src="assets/images/5.jpg" class="blog__image"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="blog-item__text">

                            <p>Быть хорошим веб-разработчиком — это не просто сидеть за монитором компьютера и кодить. Быть веб-разработчиком — значит всегда быть в курсе. Всегда читать, пробовать, искать, сравнивать, узнавать, не отставать от современных технологий.</p>

                            <p>Быть хорошим веб-разработчиком — это не просто сидеть за монитором компьютера и кодить. Быть веб-разработчиком — значит всегда быть в курсе. Всегда читать, пробовать, искать, сравнивать, узнавать, не отставать от современных технологий.</p>

                            <p>Быть хорошим веб-разработчиком — это не просто сидеть за монитором компьютера и кодить. Быть веб-разработчиком — значит всегда быть в курсе. Всегда читать, пробовать, искать, сравнивать, узнавать, не отставать от современных технологий.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>