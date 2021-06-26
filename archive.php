<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

global $mrdev_display_exclude;
get_header();
?>

	

		<?php if ( have_posts() ) { ?>
			<?php
				if(!$mrdev_display_exclude || count(array_intersect($mrdev_display_exclude,array('archive-title','archive-description'))) != count(array('archive-title','archive-description'))) :
			?>
					<header class="page-header">
						<?php
							if(!$mrdev_display_exclude || !in_array('archive-title',$mrdev_display_exclude)) :
								the_archive_title( '<h1 class="page-title">', '</h1>' );
							endif;
							if(!$mrdev_display_exclude || !in_array('archive-description',$mrdev_display_exclude)) :
								the_archive_description( '<div class="archive-description">', '</div>' );
							endif;
						?>
					</header><!-- .page-header -->
			<?php
				endif;
				include 'mrdev-framework/functions/layout/archivetop.php';
			?>
			<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );
					endwhile;
					the_posts_navigation();
					include 'mrdev-framework/functions/layout/archivebottom.php';
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		?>
	

<?php
get_sidebar();
get_footer();
