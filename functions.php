<?php
/* =========================================
 * Enqueues parent theme stylesheet
 * ========================================= */

add_action( 'wp_enqueue_scripts', 'factrie_enqueue_child_theme_styles', 30 );
function factrie_enqueue_child_theme_styles() {
	wp_enqueue_style( 'factrie-child-theme-style', get_stylesheet_uri(), array(), null );

	wp_enqueue_style( 'factrie-child-theme-fonts-icon', get_stylesheet_directory_uri() . '/fonts/icomoon/style.css', array(), null );
}

/**
 * Custom hooks
 */
require get_stylesheet_directory() . '/inc/hooks.php';

/**
 * Custom customizer
 */
require get_stylesheet_directory() . '/inc/custom-customizer.php';
