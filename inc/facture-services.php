<?php
function catchpixel_cpt_register_factrie_service() {

/**
 * Post Type: Татуаж.
 */

$labels = array(
  "name" => esc_html__( "Татуаж", "catchpixel" ),
  "singular_name" => esc_html__( "Татуаж", "catchpixel" ),
);

$args = array(
  "label" => esc_html__( "Татуаж", "catchpixel" ),
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
  "hierarchical" => true,
  "rewrite" => array( "slug" => "/", "with_front" => true ),
  "query_var" => true,
  "supports" => array( "title", "editor", "thumbnail", "author", "page-attributes" ),
);

register_post_type( "factrie-service", $args );
}

add_action( 'init', 'catchpixel_cpt_register_factrie_service' );
