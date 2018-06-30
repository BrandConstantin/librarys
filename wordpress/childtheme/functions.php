<?php

function my_add_reviews( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ($query->is_home() || $query->is_search() ) {
        $query->set( 'post_type', array( 'post', 'review' ) );
        }
    }
}

add_action( 'pre_get_posts', 'my_add_reviews' );

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function constantores_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Published %s', 'post date', 'constantores' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'Written by %s', 'post author', 'constantores' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo ' <span class="comments-link"><span class="extra">Discussion </span>';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'constantores' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
	
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'constantores' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		' <span class="edit-link"><span class="extra">Admin </span>',
		'</span>'
	);

}
                

