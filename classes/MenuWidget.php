<?php

if( ! defined('ABSPATH') ) exit;

// Класс виджета
class MenuWidget extends WP_Widget {

	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Menu Widget',
			array('description' => 'Menu')
		);

		// стили скрипты виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_my_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_my_widget_style' ) );
		}
	}

	// Вывод виджета
	function widget($args, $instance ) {
		$args['before_widget'] = '<div class="col-md-4"><div class="useful-links">';
		$args['after_widget'] = '</div></div>';

		$title = apply_filters( 'widget_title', $instance['title'] );
		$count = $instance['count'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$html = '';

		$html .= '<div class="detail"><ul>';
		$menu_name = 'primary_menu';
		$locations = get_nav_menu_locations();
		$menu_id = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu_id, ['order'=>'ASC',] );
		$menu_count = count($menu_items);
//		vardump($menu_items);

		foreach ($menu_items as $key=>$item) {
//		    vardump($item->classes);
//		    vardump(in_array( 'pll-parent-menu-item', $item->classes) );
			if(in_array( 'pll-parent-menu-item', $item->classes) ){
				break;
			}

			$html .= '<li><a href="'.$item->url.'">'.$item->title.'</a></li>';

			if($key === ($count - 1)){
				break;
			}
		}

		$html .= '</ul></div>';

		echo $html;

		echo $args['after_widget'];
	}

	// Сохранение настроек виджета (очистка)
	function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';
		$instance['count'] = ( !empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '5';

		return $instance;
	}

	// html форма настроек виджета в Админ-панели
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Default title';
		$count = @ $instance['count'] ?: 5;

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" value="<?php echo esc_attr( $count ); ?>">
		</p>
		<?php 
	}
	// скрипт виджета
	function add_my_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
			return;
	}

	// стили виджета
	function add_my_widget_style() {
	}

}

// Регистрация класса виджета
add_action( 'widgets_init', 'my_register_widgets' );
function my_register_widgets() {
	register_widget( 'MenuWidget' );
}