<?php

if( ! defined('ABSPATH') ) exit;

if(is_category()){
	vardump(get_the_excerpt());

	add_filter( 'excerpt_length', function(){
		return 30;
	} );

	add_filter('excerpt_more', function($more) {
		return '';
	});
}
