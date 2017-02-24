<article id="post-<?php the_ID(); ?>" resource="?<?php the_ID() ; ?>#id" <?php post_class(); ?> vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header">
		<div class="thumbnail"><?PHP
			the_post_thumbnail();
		?></div>
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header>

	<div class="entry-content quote">
		<blockquote><?PHP
			the_content();
		?></blockquote>
	</div>
	
	<footer class="entry-footer">
		<?php airthrey_castle_author_meta(); ?><br />
		<?php airthrey_castle_entry_meta(); ?><br />
		<?php edit_post_link( __( 'Edit', 'airthrey_castle' ), '<span class="edit-link">', '</span>' ); ?><br /><br />
		<?php airthrey_castle_licence(); ?>	
	</footer>
</article>
