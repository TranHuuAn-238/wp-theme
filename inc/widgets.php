<?php
global $theme_dir;
include_once $theme_dir . '/inc/widgets/WP2025_Recent_News.php';
include_once $theme_dir . '/inc/widgets/WP2025_Tags.php';
include_once $theme_dir . '/inc/widgets/WP2025_ProductCategories.php';
include_once $theme_dir . '/inc/widgets/WP2025_ProductFilterPrice.php';
include_once $theme_dir . '/inc/widgets/WP2025_LastProduct.php';

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

	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Footer 1 Sidebar', 'wp2025-theme' ),
			'description'   => __( 'A short description of the sidebar.', 'wp2025-theme' ),
			'before_widget' => '<div class="footer__widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-footer-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Footer 2 Sidebar', 'wp2025-theme' ),
			'description'   => __( 'A short description of the sidebar.', 'wp2025-theme' ),
			'before_widget' => '<div class="footer__widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-footer-title">',
			'after_title'   => '</h6>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'Footer 3 Sidebar', 'wp2025-theme' ),
			'description'   => __( 'A short description of the sidebar.', 'wp2025-theme' ),
			'before_widget' => '<div class="footer__widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widget-footer-title">',
			'after_title'   => '</h6>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Shop Sidebar', 'wp2025-theme' ),
			'id'            => 'shop-sidebar',
			'description'   => __( 'Widgets in this area will be shown on all the posts and pages.', 'wp2025-theme' ),
			'before_widget' => '<div id="%1$s" class="sidebar__item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widgettitle">',
			'after_title'   => '</h4>',
		)
	);

	register_widget( 'WP2025_Recent_News' );
	register_widget( 'WP2025_Tags' );
	register_widget( 'WP2025_ProductCategories' );
	register_widget( 'WP2025_ProductFilterPrice' );
	register_widget( 'WP2025_LastProduct' );
}