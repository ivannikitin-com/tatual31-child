<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
get_header();

$ahe = new FactrieHeaderElements;
$aps = new FactriePostSettings;
$template = 'page'; // template id
$aps->factrieSetPostTemplate( $template );
$template_class = $aps->factrieTemplateContentClass();
?>
<div class="wrap">
	<div id="primary" class="content-area error-404-area">
		<main id="main" class="site-main">
		
			<?php $ahe->factriePageTitle( $template ); ?>
		
			<section class="error-404 not-found text-center">
				<div class="container">
					<header class="page-header">
						
						<div class="image-wrap-404">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/404.jpg' ); ?>">
							
						</div>	
						
						<div class="relative mb-2">
							<h3 class="page-title"><?php esc_html_e( 'Страница не найдена', 'factrie' ); ?></h3>
						</div>
						<?php 
							$home_url = home_url( '/' ); 
						?>
							<p class="error-description">
								<?php esc_html_e( 'Вернуться на ', 'factrie' ); ?>
								<a href="<?php echo esc_url( $home_url ); ?>">
									<?php esc_html_e( 'Главную страницу', 'factrie' ); ?>
								</a>
							</p>
					</header><!-- .page-header -->
				</div><!-- .container -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
<?php get_footer();