<?php

if( ! defined('ABSPATH') ) exit;

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('specialist', array(
		'label'  => null,
		'labels' => array(
		'name'               => __( 'Specialist', 'medical' ),
		'singular_name'      => __( 'Specialist', 'medical' ),
		'add_new'            => __( 'Add specialist', 'medical' ),
		'add_new_item'       => __( 'Add specialist', 'medical' ),
		'edit_item'          => __( 'Edit an specialist', 'medical' ),
		'new_item'           => __( 'Add specialist', 'medical' ),
		'view_item'          => __( 'View an specialist', 'medical' ),
		'search_items'       => __( 'Find an specialist', 'medical' ),
		'not_found'          => __( 'Nothing', 'medical' ),
		'not_found_in_trash' => __( 'Nothing', 'medical' ),
		'parent_item_colon'  => __( 'Parent Singular Name:', 'medical' ),
		'menu_name'          => __( 'Specialist', 'medical' ),
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null, 
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array('title','editor', 'excerpt'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}