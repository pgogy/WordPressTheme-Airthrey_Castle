<?php
	get_header(); 
?>	
	<div id="primary" class="content-area">
		<main id="main" class="site-main"><?PHP

			while ( have_posts() ) : the_post();

				get_template_part( 'parts/content/content-all', get_post_format() );

			endwhile;
	
		?></main>
		<?PHP
			get_template_part( 'parts/pagination/pagination' );
		?>
	</div>
<?php 
	get_footer(); 
?>
