<?php

if( ! defined('ABSPATH') ) exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'cb_specialist_post_meta' );
function cb_specialist_post_meta() {
	Container::make('post_meta', __('Specialist settings', 'medical'))
		->where( 'post_type', '=', 'specialist' )
		->add_fields(array(
			Field::make('text', 'crb_specialist_study', __('Study', 'medical')),
			Field::make('text', 'crb_specialist_experience', __('Experience', 'medical')),
			Field::make( 'select', 'crb_specialist_week', __( 'Work Days', 'medical' ) )
			->add_options( array(
		        'Luni-Vineri' => __( 'Monday Friday', 'medical' ),
		        'Luni-Simbata' => __( 'Monday Saturday', 'medical' ),
		    ) ),
			Field::make('text', 'crb_specialist_facebook', __('Facebook', 'medical'))
			->set_attribute( 'placeholder', 'http://facebook.com' ),
			Field::make('text', 'crb_specialist_twitter', 'Twitter')
			->set_attribute( 'placeholder', 'https://twitter.com/' ),
			Field::make('text', 'crb_specialist_google', 'Google')
			->set_attribute( 'placeholder', 'https://google.com/' ),
			Field::make( 'image', 'crb_category_specialist_im', __( 'Image', 'medical' ) )
			->set_help_text('Demensions 470x400')
			->set_required()
		));
}

