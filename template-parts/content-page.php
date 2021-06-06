<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

global $mrdev_display_exclude,$mrdev_display_content_replacement;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		if(!$mrdev_display_exclude || !in_array('post-title',$mrdev_display_exclude)) :
	?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
	<?php
		endif;
		if(!$mrdev_display_exclude || !in_array('post-thumbnail',$mrdev_display_exclude)) :
			_s_post_thumbnail(); 
		endif;
	?>

	<?php 
		if ( !empty($mrdev_display_content_replacement) && is_active_sidebar( 'content' )) :
			dynamic_sidebar( 'content' );
		elseif(empty($mrdev_display_content_replacement) || $mrdev_display_content_replacement !== 2) :
	?>
			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
	<?php
		endif;
	?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', '_s' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
