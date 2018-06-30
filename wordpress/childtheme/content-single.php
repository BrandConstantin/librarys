<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package constantores
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php constantores_the_category_list(); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
		if ( is_active_sidebar( 'sidebar-1' ) && !is_page_template( 'custom-templates/post-nosidebar.php') ) : ?>
			<div class="entry-meta">
				<?php constantores_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image full-bleed">
		<?php
		the_post_thumbnail('constantores-full-bleed');
		?>
	</figure><!-- .featured-image full-bleed -->
	<?php } ?>

	<section class="post-content">


		<?php
		if ( !is_active_sidebar( 'sidebar-1' ) || is_page_template( 'custom-templates/post-nosidebar.php') ) : ?>

		<div class="post-content__wrap">
			<div class="entry-meta">
				<?php constantores_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="post-content__body">

		<?php
		endif; ?>

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'constantores' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
                
                if(get_field('info_box_content')){
                    echo '<div class="info-box">';
                    echo '<h1>'.get_field('info_box_title').'</h1>';
                    the_field('info_box_content');
                    echo '</div>';
                }
                
                $posts = get_field('related_posts');
                if($posts){
                    echo '<h1>Further Reading:</h1>';
                    echo '<ul class="related-list">';
                    foreach ($posts as $post):
                        setup_postdata($post);
                        echo '<li><a href="'.get_the_permalink().'">';
                        echo '<h4>'.get_the_title().'</h4>';
                        the_excerpt();
                        echo '</a></li>';
                    endforeach;
                    echo '</ul>';
                    wp_reset_postdata();
                }
                
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'constantores' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php constantores_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php

		if ( !is_active_sidebar( 'sidebar-1' ) || is_page_template( 'custom-templates/post-nosidebar.php')) : ?>
			</div><!-- .post-content__body -->
		</div><!-- .post-content__wrap -->
		<?php endif; ?>

		<?php
		constantores_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
	</section><!-- .post-content -->

	<?php get_sidebar(); ?>

</article><!-- #post-## -->
