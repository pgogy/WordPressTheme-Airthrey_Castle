<?php
	get_header(); 
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Sorry, something can\'t be found. Try searching below', 'airthrey_castle' ); ?></h1>
					<?PHP
						get_template_part("parts/search/search-form");
					?>
				</header>
			</section>
		</main>
	</div>
<?php 
	get_footer(); 
?>
