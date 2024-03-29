<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package constantores
 */

get_header(); ?>

<?php
if ( have_posts() ) : ?>

	<header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- .page-header -->

<?php
else :

	get_template_part( 'template-parts/content', 'none' );
	return;

endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_pagination( array(
				'prev_text' => constantores_get_svg( array( 'icon' => 'arrow-long-left', 'fallback' => true ) ) . __( 'Newer', 'constantores' ),
				'next_text' => __( 'Older', 'constantores' ) . constantores_get_svg( array( 'icon' => 'arrow-long-right' , 'fallback' => true ) ),
				'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'constantores' ) . '</span>',
			));

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
