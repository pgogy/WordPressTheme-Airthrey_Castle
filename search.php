<?php
	get_header(); 
	$posts_total = 0;

	if(have_posts()){
?>	
	<div id="primary" class="content-area">
		<main id="main" class="site-main"><?PHP

			while ( have_posts() ) : the_post();

				get_template_part( 'parts/content/content-all', get_post_format() );

			endwhile;
	
			wp_reset_postdata();
	
		?></main>
	</div>
<?PHP
	}else{
?><div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="no-posts">
				<?PHP
					echo __("Sorry, nothing found. Try again?","airthrey_castle");
				?>
				<?PHP
					get_template_part("parts/search/search-form");
				?>
			</div>
		</main>
	</div><?PHP
}?>
<?php 
	get_footer(); 
?>