<article id="post-<?php the_ID(); ?>" resource="?<?php the_ID() ; ?>#id" <?php post_class(); ?> vocab="http://schema.org/" typeof="Blog">
	<header class="entry-header">
		<div class="thumbnail"><?PHP
			the_post_thumbnail();
		?></div>
		<?php
			the_title( '<p class="entry-title">', '</p>' );
		?>
	</header>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'airthrey_castle' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'airthrey_castle' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'airthrey_castle' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>
	
	<footer class="entry-footer">
		<?php airthrey_castle_author_meta(); ?>
		<?php airthrey_castle_entry_meta(); ?><br />
		<?php if(get_previous_post_link()!=""){ ?>
		<div class="links_post"><?PHP previous_post_link() ?></div>
		<?php 
			}
			
			if(get_next_post_link()!=""){ 
		?>
		<div class="links_post"><?PHP next_post_link() ?></div>
		<?php } ?><br />
		<?php edit_post_link( __( 'Edit', 'airthrey_castle' ), '<span class="edit-link">', '</span>' ); ?><br /><br />
		<?php airthrey_castle_licence(); ?>	
	</footer>
</article>