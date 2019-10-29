<?php

if( ! defined('ABSPATH') ) exit;

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
	register_taxonomy('profession', array('specialist'), array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => __('Profession', 'medical'),
			'singular_name'     => __('Profession', 'medical'),
			'search_items'      => __('Find a profession', 'medical'),
			'all_items'         => __('All professions', 'medical'),
			'view_item '        => __('View a profession', 'medical'),
			'parent_item'       => 'Parent Genre',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => __('Edit a profession', 'medical'),
			'update_item'       => __('Update profession', 'medical'),
			'add_new_item'      => __('Add a profession', 'medical'),
			'new_item_name'     => __('Add a profession', 'medical'),
			'menu_name'         => __('Professions', 'medical'),
		),
		'description'           => '', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_in_menu'          => true, // равен аргументу show_ui
		'show_tagcloud'         => true, // равен аргументу show_ui
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		'hierarchical'          => false,
		//'update_count_callback' => '_update_post_term_count',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	) );
}
