<?php

function catchpixel_register_factrie_portfolio() {

	/**
	 * Post Type: Татуаж.
	 */

	$labels = array(
		"name" => __( "Татуаж", "catchpixel" ),
		"singular_name" => __( "Татуаж", "catchpixel" ),
	);

	$args = array(
		"label" => __( "Татуаж", "catchpixel" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "tatuazh", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "editor", "thumbnail", "author", "page-attributes" ),
	);

	register_post_type( "factrie-portfolio", $args );
}

add_action( 'init', 'catchpixel_register_factrie_portfolio' );

function catchpixel_register_taxes() {

	/**
	 * Taxonomy: Категории.
	 */

	$labels = array(
		"name" => __( "Категории", "catchpixel" ),
		"singular_name" => __( "Категория", "catchpixel" ),
	);

	$args = array(
		"label" => __( "Категории", "catchpixel" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'portfolio-categories', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "portfolio-categories",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "rewrite" => array( "slug" => "tatuazh", "with_front" => true ),
		"show_in_quick_edit" => false,
		);
	register_taxonomy( "portfolio-categories", array( "factrie-portfolio" ), $args );

	/**
	 * Taxonomy: Рубрики.
	 */

	$labels = array(
		"name" => __( "Рубрики", "catchpixel" ),
		"singular_name" => __( "Рубрика", "catchpixel" ),
	);

	$args = array(
		"label" => __( "Рубрики", "catchpixel" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'portfolio-tags', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "portfolio-tags",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "rewrite" => array( "slug" => "tatuazh", "with_front" => true ),
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "portfolio-tags", array( "factrie-portfolio" ), $args );
}
add_action( 'init', 'catchpixel_register_taxes' );
