<?php

if( ! defined('ABSPATH') ) exit;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function medical_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer widgets', 'medical' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Adaugati widgete pentru sidebar', 'medical' ),
		'before_widget' => '<div class="col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title"><h5>',
		'after_title'   => '</h5></div>',
	) );
}
add_action( 'widgets_init', 'medical_widgets_init' );