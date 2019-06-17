<?php

// float buttons
function catchpixel_right_fixed_buttons() {
  ?>
  <div class="fixed-right-buttons">
    <a class="signup" href="#" data-toggle="modal" data-target="#signup"><span class="icon-calendar"></span>Записаться</a>
    <a class="order-call" href="#" data-toggle="modal" data-target="#order_call"><span class="icon-tel"></span>Заказать звонок</a>
  </div>

  <div class="modal custom fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo do_shortcode( '[contact-form-7 id="' . get_theme_mod ( 'signup' ) . '" title="Записаться"]' ); ?>
      </div>
    </div>
  </div>
  <div class="modal custom fade" id="order_call" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?php echo do_shortcode( '[contact-form-7 id="' . get_theme_mod ( 'order_call' ) . '" title="Записаться"]' ); ?>
      </div>
    </div>
  </div>
  <?php
}

add_action( 'wp_head', 'catchpixel_right_fixed_buttons', 10 );

// Change breadcrubs default on Yost SEO
function catchpixel_breadcrumbs_change_yost() {
  ?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var breadcrumbs = document.getElementById('breadcrumb');

      if (breadcrumbs) {
        var newBreadcrumbs = '<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );} ?>';
        breadcrumbs.innerHTML = newBreadcrumbs;
      }

    });
  </script>
  <?php
}

add_action( 'wp_footer', 'catchpixel_breadcrumbs_change_yost', 10 );

// Include files after main theme
add_action( 'after_setup_theme', 'catchpixel_include_files_after_theme' );

function catchpixel_include_files_after_theme() {

// require get_stylesheet_directory() . '/inc/facture-services.php';
require get_stylesheet_directory() . '/inc/factrie-portfolio.php';

}

// Custom breadcrumbs Yost SEO
add_filter( 'wpseo_breadcrumb_links', 'catchpixel_breadcrumbs_change' );

function catchpixel_breadcrumbs_change( $links ) {

  foreach( $links as $link ) {
    if (isset($link['term']) && $link['term']->taxonomy == 'portfolio-categories'){
      $breadcrumb[] = array(
        'url' => '/tatuazh/',
        'text' => esc_html__( 'Татуаж', 'catchpixel' ),
      );
      array_insert( $links, 1, $breadcrumb );
      unset($links[2]);
    }
    if (isset($link['term']) && $link['term']->taxonomy == 'portfolio-tags'){
      $breadcrumb[] = array(
        'url' => '/tatuazh/',
        'text' => esc_html__( 'Татуаж', 'catchpixel' ),
      );
      array_insert( $links, 1, $breadcrumb );
      unset($links[2]);
    }
  }

  return $links;
}
