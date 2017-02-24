<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" tabindex="-1">
		<?php
		while ( have_posts() ) : the_post();
		
			if(has_post_format()){
				get_template_part( 'parts/content/content-' .  get_post_format() );
			}else{
				get_template_part( 'parts/content/content-standard' );
			}
			
			if ( comments_open() || get_comments_number() ) :
				comments_template();

			endif;

		endwhile;
		?>
		</main>
	</div>
<?php 
	get_footer(); 
?>
