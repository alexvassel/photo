<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'alicezed' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// REMOVE OTHER LINKS
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');


function ggl_load_styles() {

  if (!is_admin()) {
    wp_register_style('googleFont', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto+Condensed:700,400,300');
    wp_enqueue_style('ggl', get_stylesheet_uri(), array('googleFont') );
  }
}

add_action('wp_enqueue_scripts', 'ggl_load_styles');


/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
    # Add custom CSS
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/bootstrap/css/bootstrap.min.css' ), '', array(), 'screen');
    wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), '', array(), 'screen');
    wp_enqueue_style( 'popup', get_theme_file_uri( '/assets/css/vendor/magnific-popup.css'), '', array(), 'screen');
    wp_enqueue_style( 'index', get_theme_file_uri( '/assets/css/index.css'), '', array(), 'screen');

    # Add custom js

    wp_enqueue_script( 'bootstrap', get_theme_file_uri('/assets/bootstrap/js/bootstrap.min.js'), array(), '1.0', true  );
    wp_enqueue_script( 'popup', get_theme_file_uri('/assets/js/vendor/jquery.magnific-popup.js'), array(), '1.0', true  );
    wp_enqueue_script( 'pongstarg', get_theme_file_uri('/assets/js/vendor/pongstagr.am.js'), array(), '1.0', true  );
    wp_enqueue_script( 'masonry', get_theme_file_uri('/assets/js/vendor/masonry.pkgd.min.js'), array(), '1.0', true  );
    wp_enqueue_script( 'index', get_theme_file_uri('/assets/js/index.js'), array(), '1.0', true  );

}

add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );


function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.11.3' );
	}
}

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 96vw, (max-width: 767px) 100vw, (max-width: 960px) 100vw, 1200px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 706px) 96vw, (max-width: 767px) 100vw, (max-width: 960px) 100vw, 1200px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );


function filter_ptags_on_images($content){
    return preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

function add_responsive_class($content){

        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        if($content != ''){
	        $document = new DOMDocument();
	        libxml_use_internal_errors(true);
	        $document->loadHTML(utf8_decode($content));

	        $imgs = $document->getElementsByTagName('img');
	        $loop_counter = 1;

	        foreach ($imgs as $img) {
	        	if ($loop_counter > 5){           
		            $img->setAttribute('class', 'js-load-blog-image');

		            $img->setAttribute('data-src', $img->getAttribute('src'));
		            $img->removeAttribute('src');

		            $img->setAttribute('data-srcset', $img->getAttribute('srcset'));
		            $img->removeAttribute('srcset');
		        }

	            $loop_counter +=1;
	        }


	        $html = $document->saveHTML();
	        return $html;   
        }
        
}

add_filter('the_content', 'add_responsive_class');

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );
