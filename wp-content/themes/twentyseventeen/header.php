<!DOCTYPE html>
<html lang="ru">
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alice Zed | Photographer </title>

    <?php wp_head(); ?>
    
</head>

<body class="<?php if (is_front_page()): ?>index<?php endif;?>">

<?php if (is_front_page()): ?>
    <section id="home" class="module-image height-full">
        <ul class="cb-slideshow">
                <?php
                $post_type = 'slider';
                $slider_name = 'Main';
                $posts_per_page = 1;
                $args = array( 'post_type' => $post_type, 'posts_per_page' => $posts_per_page, 'name' => $slider_name);
                $slider = get_posts($args)[0];
                $photos = get_field('photos', $slider->ID);
                foreach( $photos as $photo ): ?>
                    <li><span style="background-image: url(<?php echo $photo['url']; ?>);"></span></li>
                <?php endforeach; ?>    
        </ul>
        <!-- <div class="intro">
            <div class="hello">Привет, меня зовут Катя, и я</div>
            <h1 class="photograph">Фотограф</h1>
            <div class="who-creates">Life | Landscapes | Love</div>
        </div> -->

        <div class="intro">
            <div class="hello">Photographer</div>
            <h1 class="photograph">Ekaterina<br/> Kireeva</h1>
            <div class="who-creates">Life | Landscapes | Love</div>
        </div>

    </section>
<?php endif;?>


<!-- Home end -->

<!-- Navigation start -->

<header class="header" id="header">
    <div class="header__inner js-header <?php if (!is_front_page()): ?>fixed<?php endif;?>">
        <nav class="navbar navbar-custom" role="navigation">

            <div class="container">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Ekaterina <span class="color-red">Kireeva</span></a>
                </div>

                <div class="collapse navbar-collapse" id="custom-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="/">Главная</a></li>
                        <li class="dropdown">
                            <a href="portfolio.html" class="dropdown-toggle">Портфолио</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Love Story</a></li>
                                <li><a href="#">Свадьбы</a></li>
                                <li><a href="#">Путешествия</a></li>
                                <li><a href="#">Семейное</a></li>
                                <li><a href="#">Праздники</a></li>
                                <li><a href="#">Фотосессии</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Блог</a></li>
                        <li><a href="contacts.html">Контакты</a></li>
                    </ul>
                </div>

            </div><!-- .container -->

        </nav>
    </div>

</header>

<!-- Navigation end -->