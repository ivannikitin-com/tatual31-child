<?php
// ======================================
// Редактируемый блок на странице товаров
// ======================================
add_action('woocommerce_sidebar', 'catchpixel_edit_block_archive_page', 15);

function catchpixel_edit_block_archive_page() {
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
// ============================
// Добавление надписи в наличии
// ============================
add_filter( 'woocommerce_get_availability_text', 'catchpixel_custom_get_availability_text', 99, 2 );
  
function catchpixel_custom_get_availability_text( $availability, $product ) {
    $stock = $product->get_stock_status();
  
    switch ($stock) {
        case "instock":
            return __( 'In stock', 'woocommerce' );
            
        case "outofstock":
            return __( 'Out of stock', 'woocommerce' );
    }
}

// ===============================
// Поле производитель в настройках
// ===============================

// Отображение поля в backend
add_action( 'woocommerce_product_options_general_product_data', 'catchpixel_add_custom_general_fields' );

function catchpixel_add_custom_general_fields() {

  global $woocommerce, $post;
  
  echo '<div class="options_group">';
  
  woocommerce_wp_text_input( 
    	array( 
    		'id'          => '_manufacturer', 
    		'label'       => __( 'Производитель', 'catchpixel' ), 
    		'placeholder' => '',
    	)
    );
  
  echo '</div>';
	
}

// Сохранение полей
add_action( 'woocommerce_process_product_meta', 'catchpixel_add_custom_general_fields_save' );


function catchpixel_add_custom_general_fields_save( $post_id ) {
    $woocommerce_text_field = $_POST['_manufacturer'];
	if( !empty( $woocommerce_text_field ) )
		update_post_meta( $post_id, '_manufacturer', esc_attr( $woocommerce_text_field ) );
}

// Вывод поля на frontend
add_action( 'woocommerce_product_meta_end',  'catchpixel_add_meta_field_manufacturer_frontend');

function catchpixel_add_meta_field_manufacturer_frontend() {
    global $post;

    $product = wc_get_product( $post->ID );    
    $manufacturer = $product->get_meta( '_manufacturer' );
    ?>
    
    <span class="manufacturer"><?php echo __( 'Производитель: ', 'catchpixel' ) . $manufacturer; ?></span>
    
    <?php
}
