<?php

if( ! defined('ABSPATH') ) exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_category_stationar_post_meta' );
function crb_category_stationar_post_meta() {
	Container::make('post_meta', __('Categories posts settings', 'medical'))
	->where( 'post_term', '=', array(
		'field' => 'id',
		'value' => 6,
		'taxonomy' => 'category',
	) )
	->or_where( 'post_term', '=', array(
		'field' => 'id',
		'value' => 20,
		'taxonomy' => 'category',
	) )
	->add_fields(array(
		Field::make( 'image', 'crb_category_amb_stat_posts_img', __( 'Image', 'medical' ) )
		->set_help_text(__('Dimensions 570x425', 'medical')),
	));
}


