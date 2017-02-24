<?php 
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" tabindex="-1">
		<?php
		while ( have_posts() ) : the_post();
		
			get_template_part( 'parts/content/page' );
			
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
