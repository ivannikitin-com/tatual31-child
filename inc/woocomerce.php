<?php
add_action('woocommerce_sidebar', 'tatual_edit_block_archive_page', 15);

function tatual_edit_block_archive_page() {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php echo do_shortcode('[content_block slug=blok-dlya-stranitsy-magazina]'); ?>
            </div>
        </div>
    </div>
    
    <?php
}


add_filter( 'woocommerce_get_availability_text', 'tatual_custom_get_availability_text', 99, 2 );
  
function tatual_custom_get_availability_text( $availability, $product ) {
    $stock = $product->get_stock_status();
  
    switch ($stock) {
        case "instock":
            return __( 'In stock', 'woocommerce' );
            
        case "outofstock":
            return __( 'Out of stock', 'woocommerce' );
    }
}