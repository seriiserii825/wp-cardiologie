<?php
class Mobile_Menu_Walker extends Walker_Nav_Menu {

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
	{
		$html = '';

		if($depth === 0){
			$html .= '<li ';

			if(in_array('current-menu-item', $item->classes)){
				$html .= 'class="select"';
			}else{
				$html .= ' ';
			}

			$html .= '><a href="%s">%s</a>';

			$output .= sprintf($html, $item->url, $item->title);
		}elseif($depth === 1){
			$html .= "\n<li ";
			$html .= '><a href="%s">%s</a>';
			$output .= sprintf($html, $item->url, $item->title);
		}
	}

	public function end_el( &$output, $item, $depth = 0, $args = array() )
	{
		if($depth === 0){
			$output .= '</li>';

		}elseif($depth === 1){
			$output .= '</li>';
		}

	}

	public function	start_lvl( &$output, $depth = 0, $args = array() )
	{
		if($depth === 0){
			$output .= '<ul>';

		}

	}

	public function end_lvl( &$output, $depth = 0, $args = array() )
	{
		if($depth === 0){
			$output .= '</ul>';
		}

	}

}
