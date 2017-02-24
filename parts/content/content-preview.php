<?PHP
	$post = get_query_var('post');
	echo apply_filters("the_content", $post->post_content);
?>
	<footer class="entry-footer">
		<?php airthrey_castle_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'airthrey_castle' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
<?PHP
	if ( comments_open() || get_comments_number() ) :
		echo get_template_part( 'parts/comments/comments' );
	endif;
?>