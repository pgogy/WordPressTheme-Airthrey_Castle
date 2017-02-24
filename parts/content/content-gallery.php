<article id="post-<?php the_ID(); ?>" resource="?<?php the_ID() ; ?>#id" <?php post_class(); ?> vocab="http://schema.org/" typeof="Image">
	<header class="entry-header">
		<div class="thumbnail"><?PHP
			the_post_thumbnail();
		?></div>
		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header>

	<div class="entry-content gallery">
		<?PHP
			the_content();
		?>
	</div>
	
	<script type="text/javascript">
		jQuery(document).ready(
			function(){
				jQuery(".entry-content img")
					.each(
						function(index,value){
							width = jQuery(value).width();
							height = jQuery(value).height();
							ratio = width / height;
							if(index==0){
								jQuery(value)
									.css("clear","both");
							}
							jQuery(value)
								.css("height",150);
							jQuery(value)
								.css("width", 150 * ratio)
								.css("cursor", "pointer");
							jQuery(value)
								.on("click", function(){
										window.open(jQuery(value).attr("src"));
									}
								);
						}
					);
			}
		);
	</script>
	
	<footer class="entry-footer">
		<?php airthrey_castle_author_meta(); ?><br />
		<?php airthrey_castle_entry_meta(); ?><br />
		<?php edit_post_link( __( 'Edit', 'airthrey_castle' ), '<span class="edit-link">', '</span>' ); ?><br /><br />
		<?php airthrey_castle_licence(); ?>	
	</footer>
</article>
