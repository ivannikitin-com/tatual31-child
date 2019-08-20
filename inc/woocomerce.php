<?php
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
    
add_action('woocommerce_sidebar', 'tatual_edit_block_archive_page', 15);