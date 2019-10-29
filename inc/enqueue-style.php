<?php
/**
 * Enqueue scripts and styles.
 */
function medical_scripts() {
	wp_enqueue_style( 'medical-style', get_stylesheet_uri() );
	wp_enqueue_style('medical-guide-css', get_template_directory_uri().'/assets/cssmin/medical-guide.min.css');
	wp_enqueue_style('font-awesome-css', get_template_directory_uri().'/assets/libs/fontawesome/css/all.min.css');
	wp_enqueue_style('medical-guide-icons', get_template_directory_uri().'/assets/fonts/medical-guide-icons.css');
	wp_enqueue_style('default-color-css', get_template_directory_uri().'/assets/cssmin/default-color.css');
	wp_enqueue_style('red-css', get_template_directory_uri().'/assets/cssmin/red.css');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/cssmin/bootstrap.min.css');
	wp_enqueue_style('dropmenu-css', get_template_directory_uri().'/assets/cssmin/dropmenu.min.css');
	wp_enqueue_style('sticky-header-css', get_template_directory_uri().'/assets/cssmin/sticky-header.min.css');
	wp_enqueue_style('style-css', get_template_directory_uri().'/assets/cssmin/style.min.css');
	wp_enqueue_style('settings-css', get_template_directory_uri().'/assets/cssmin/settings.min.css');
	wp_enqueue_style('extralayers-css', get_template_directory_uri().'/assets/cssmin/extralayers.min.css');
	wp_enqueue_style('accordion-css', get_template_directory_uri().'/assets/cssmin/accordion.min.css');
	wp_enqueue_style('tabs-css', get_template_directory_uri().'/assets/cssmin/tabs.min.css');
	wp_enqueue_style('owl.carousel-css', get_template_directory_uri().'/assets/cssmin/owl.carousel.min.css');
	wp_enqueue_style('jquery.mmenu.all-css', get_template_directory_uri().'/assets/cssmin/jquery.mmenu.all.min.css');
	wp_enqueue_style('demo-css', get_template_directory_uri().'/assets/cssmin/demo.min.css');
//	wp_enqueue_style('loader-css', get_template_directory_uri().'/assets/cssmin/loader.min.css');
	wp_enqueue_style('slick-css', get_template_directory_uri().'/assets/libs/slick/slick.css');
	wp_enqueue_style('magnific-css', get_template_directory_uri().'/assets/libs/magnific-popup/magnific-popup.css');
	wp_enqueue_style('custom-css', get_template_directory_uri().'/assets/cssmin/custom.css');

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri().'/assets/jsmin/jquery.min.js', [], null, true);
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script('scroll-desktop-js', get_template_directory_uri().'/assets/jsmin/scroll-desktop.min.js', ['jquery'], null, true);
	wp_enqueue_script('scroll-desktop-smooth-js', get_template_directory_uri().'/assets/jsmin/scroll-desktop-smooth.min.js', ['jquery'], null, true);
	wp_enqueue_script('jquery.themepunch.revolution.min-js', get_template_directory_uri().'/assets/jsmin/jquery.themepunch.revolution.min.js', ['jquery'], null, true);
	wp_enqueue_script('jquery.themepunch.tools.min-js', get_template_directory_uri().'/assets/jsmin/jquery.themepunch.tools.min.js', ['jquery'], null, true);
	wp_enqueue_script('classie-js', get_template_directory_uri().'/assets/jsmin/classie.min.js', ['jquery'], null, true);
	wp_enqueue_script('jquery.mmenu.min.all-js', get_template_directory_uri().'/assets/jsmin/jquery.mmenu.min.all.js', ['jquery'], null, true);
	wp_enqueue_script('jquery-ui-1.10.3.custom-js', get_template_directory_uri().'/assets/jsmin/jquery-ui-1.10.3.custom.min.js', ['jquery'], null, true);
//	wp_enqueue_script('counter-js', get_template_directory_uri().'/assets/jsmin/counter.js', ['jquery'], null, true);
	wp_enqueue_script('tabs-js', get_template_directory_uri().'/assets/jsmin/tabs.min.js', ['jquery'], null, true);
	wp_enqueue_script('banner-js', get_template_directory_uri().'/assets/jsmin/banner.min.js', ['jquery'], null, true);
	wp_enqueue_script('owl.carousel-js', get_template_directory_uri().'/assets/jsmin/owl.carousel.min.js', ['jquery'], null, true);
	wp_enqueue_script('magnific-js', get_template_directory_uri().'/assets/libs/magnific-popup/jquery.magnific-popup.min.js', ['jquery'], null, true);
	wp_enqueue_script('slick-js', get_template_directory_uri().'/assets/libs/slick/slick.min.js', ['jquery'], null, true);
	wp_enqueue_script('my-js', get_template_directory_uri().'/assets/jsmin/my.js', ['jquery'], null, true);
	wp_enqueue_script('custom-js', get_template_directory_uri().'/assets/jsmin/custom.js', ['jquery'], null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medical_scripts' );