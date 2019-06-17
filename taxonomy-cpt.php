<?php
/**
 * The template for displaying all custom post types
 */

get_header();
$ahe = new FactrieHeaderElements;
$aps = new FactriePostSettings;
$template = 'blog'; // template id
if( $aps->factrieCheckTemplateExists( 'archive' ) ){
	$template = 'archive';
}
$aps->factrieSetPostTemplate( $template );
$template_class = $aps->factrieTemplateContentClass();
$full_width_class = '';
$acpt = new FactrieCPT;
?>
<div class="factrie-content <?php echo esc_attr( 'factrie-' . $template ); ?>">

		<?php $ahe->factrieHeaderSlider('bottom'); ?>

		<?php $ahe->factriePageTitle( $template ); ?>
		<div class="factrie-content-inner">
			<div class="container">
				<div class="row">
          <div class="col-md-12">
            <?php
            if ( function_exists('the_field') ) {
							$queried_object = get_queried_object();
							echo get_field( 'category_custom_content', $queried_object->taxonomy.'_'.$queried_object->term_id );
            }
            ?>
          </div>
				</div><!-- row -->

		</div><!-- .container -->
	</div><!-- .factrie-content-inner -->
</div><!-- .factrie-content -->
<?php get_footer();
