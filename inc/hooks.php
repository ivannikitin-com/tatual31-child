<?php

function factrie_right_fixed_buttons() {
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

add_action( 'wp_head', 'factrie_right_fixed_buttons', 10 );