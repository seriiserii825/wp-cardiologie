<?php

if( ! defined('ABSPATH') ) exit;

// Класс виджета
class ContactFormWidget extends WP_Widget {
	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Contact form widget',
			array('description' => 'Widget for contact form')
		);

		// стили скрипты виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_my_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_my_widget_style' ) );
		}
	}

	// Вывод виджета
	function widget($args, $instance ) {
		$args['before_widget'] = '<div class="col-md-4"><div class="newsletter">';
		$args['after_widget'] = '</div></div>';

		$title = apply_filters( 'widget_title', $instance['title'] );
		$text = $instance['text'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$html = '';

		$html .= '<div class="detail">';

		
		$html .= '<div class="signup-text">
					<i class="fas fa-envelope-open-text"></i>
					<span>'.$text.'</span>
				</div>';

		$html .= do_shortcode($instance['shortcode_text']);

		$html .= '</div>';

		echo $html;

		echo $args['after_widget'];
	}

	// Сохранение настроек виджета (очистка)
	function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';
		$instance['text'] = ( !empty( $new_instance['text'] ) ) ? ( $new_instance['text'] ) : '';
		$instance['shortcode_text'] = ( !empty( $new_instance['shortcode_text'] ) ) ? ( $new_instance['shortcode_text'] ) : '';

		return $instance;
	}

	// html форма настроек виджета в Админ-панели
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Default title';
		$text = @ $instance['text'] ? : '';
		$shortcode_text = @ $instance['shortcode_text'] ? : '';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'text:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'shortcode_text' ); ?>"><?php _e( 'shortcode_text:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'shortcode_text' ); ?>" name="<?php echo $this->get_field_name( 'shortcode_text' ); ?>" type="text" value="<?php echo esc_attr( $shortcode_text ); ?>">
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
add_action( 'widgets_init', 'register_contact_form_widget' );
function register_contact_form_widget() {
	register_widget( 'ContactFormWidget' );
}