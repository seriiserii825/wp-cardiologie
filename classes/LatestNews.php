<?php

if( ! defined('ABSPATH') ) exit;

// Класс виджета
class LatestNews extends WP_Widget {
	function __construct() {
		// Запускаем родительский класс
		parent::__construct(
			'', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Latest News',
			array('description' => esc_html( 'Latest News', 'medical' ))
		);

		// стили скрипты виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_my_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_my_widget_style' ) );
		}
	}

	// Вывод виджета
	function widget($args, $instance ) {
		$args['before_widget'] = '<div class="col-md-3">';
		$args['after_widget'] = '</div>';

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$html = '';

		$html .= '<div class="detail">';
		$news_posts = new WP_Query([
			'posts_per_page' => 2,
			'category_name' => 'news'
		]);

		if ( $news_posts->have_posts() ){
			while ( $news_posts->have_posts() ){
				$news_posts->the_post();

				$html .= '<div class="tweets">
					<div class="icon">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="text">
						<p><a href="'.get_permalink().'">'.get_the_title().'</a></p>
					</div>
				</div>';
			}
		} 


		$html .= '</div>';

		echo $html;

		echo $args['after_widget'];
	}

	// Сохранение настроек виджета (очистка)
	function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? ( $new_instance['title'] ) : '';

		return $instance;
	}

	// html форма настроек виджета в Админ-панели
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Default title';

		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
add_action( 'widgets_init', 'register_latest_news_widget' );
function register_latest_news_widget() {
	register_widget( 'LatestNews' );
}