<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

global $mrdev_display_exclude;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
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
		<?php 
			endif; 
			if( !$mrdev_display_exclude || !in_array('archive-thumbnail',$mrdev_display_exclude) ) :
				_s_post_thumbnail(); 
			endif;
		?>
	</header><!-- .entry-header -->

	<?php 
		if( !$mrdev_display_exclude || !in_array('archive-excerpt',$mrdev_display_exclude) ) :
	?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
	<?php 
		endif;
	?>

	<footer class="entry-footer">
		<?php _s_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
