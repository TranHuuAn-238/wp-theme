<?php
global $theme_dir;
include_once $theme_dir . '/inc/widgets/WP2025_Recent_News.php';
include_once $theme_dir . '/inc/widgets/WP2025_Tags.php';

add_action( 'widgets_init', 'wp2025_register_widgets' );
function wp2025_register_widgets() {
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar', 'wp2025-theme' ),
			'description'   => __( 'A short description of the sidebar.', 'wp2025-theme' ),
			'before_widget' => '<div id="%1$s" class="blog__sidebar__item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_widget( 'WP2025_Recent_News' );
	register_widget( 'WP2025_Tags' );
}