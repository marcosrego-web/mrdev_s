<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _s
 */

global $mrdev_display_exclude;
get_header();
?>

	<main id="primary" class="mr-main site-main">

		<section class="mr-section error-404 not-found">
			<?php 
				if(!$mrdev_display_exclude || !in_array('post-title',$mrdev_display_exclude)) :
			?>
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', '_s' ); ?></h1>
				</header><!-- .page-header -->
			<?php
				endif;
			?>

			<div class="page-content">
				
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', '_s' ); ?></p>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
