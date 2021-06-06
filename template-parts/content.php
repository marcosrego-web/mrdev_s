<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

global $mrdev_display_exclude,$mrdev_display_content_replacement;

if(is_singular()) {
	$mrdev_singular = true;
} else {
	$mrdev_singular = false;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( $mrdev_singular === true ) :
			if( !$mrdev_display_exclude || !in_array('post-title',$mrdev_display_exclude) ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					if( !$mrdev_display_exclude || !in_array('post-date',$mrdev_display_exclude) ) :
						_s_posted_on();
					endif;
					if( !$mrdev_display_exclude || !in_array('post-author',$mrdev_display_exclude) ) :
						_s_posted_by();
					endif;
					?>
				</div><!-- .entry-meta -->
			<?php endif;
			if( !$mrdev_display_exclude || !in_array('post-thumbnail',$mrdev_display_exclude) ) :
				_s_post_thumbnail(); 
			endif;
		else :
			if( !$mrdev_display_exclude || !in_array('archive-titles',$mrdev_display_exclude) ) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
						if( !$mrdev_display_exclude || !in_array('archive-date',$mrdev_display_exclude) ) :
							_s_posted_on();
						endif;
						if( !$mrdev_display_exclude || !in_array('archive-author',$mrdev_display_exclude) ) :
							_s_posted_by();
						endif;
					?>
				</div><!-- .entry-meta -->
			<?php endif;
			if( !$mrdev_display_exclude || !in_array('archive-thumbnail',$mrdev_display_exclude) ) :
				_s_post_thumbnail(); 
			endif;
		endif;

		?>
	</header><!-- .entry-header -->

	<?php 
		if ( $mrdev_singular === true || $mrdev_singular === false && !$mrdev_display_exclude || $mrdev_singular === false && !in_array('archive-excerpt',$mrdev_display_exclude )) :
	?>
			<div class="entry-content">
				<?php
				if ( !empty($mrdev_display_content_replacement) && is_active_sidebar( 'content' )) :
					dynamic_sidebar( 'content' );
				elseif(empty($mrdev_display_content_replacement) || $mrdev_display_content_replacement !== 2) :
					if ( $mrdev_singular === false && has_excerpt() ) :
						the_excerpt();
					else :
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', '_s' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
					endif;
				endif;

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

		if( !$mrdev_display_exclude || $mrdev_singular === true && !in_array('post-taxonomies',$mrdev_display_exclude) || $mrdev_singular === false && !in_array('archive-taxonomies',$mrdev_display_exclude) ) :
	?>
			<footer class="entry-footer">
				<?php _s_entry_footer(); ?>
			</footer><!-- .entry-footer -->
	<?php
		endif;
	?>
</article><!-- #post-<?php the_ID(); ?> -->
