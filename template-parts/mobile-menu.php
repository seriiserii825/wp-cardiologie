<!-- Mobile Menu Start -->
<div class="container">
	<div id="page">
		<header class="header">
			<a href="#menu"></a>

		</header>

        <?php wp_nav_menu([
			'theme_location'  => 'mobile_menu',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => '',
			'container_id'    => 'menu',
			'menu_class'      => '',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => new Mobile_Menu_Walker(),
        ]); ?>
    </div>
</div>
<!-- Mobile Menu End -->
