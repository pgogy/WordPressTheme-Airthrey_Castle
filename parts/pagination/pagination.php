<?PHP
	$prev_link = get_previous_posts_link();
	$next_link = get_next_posts_link();
	
	$pagination = false;
	
	if ($prev_link || $next_link) {
		$pagination = true;
	}
?>
<div class="paginationNumbers">
	<?PHP if($pagination){
		?><p><?PHP echo __("Choose from the list", 'airthrey_castle'); ?></p><?PHP
		}
	?>
	<?PHP
		the_posts_pagination( array(
			'mid_size' => 2,
			"before_page_number" => __("Extra posts page", "airthrey_castle") . " ",
			'prev_text' => __( 'Previous posts page', 'airthrey_castle' ),
			'next_text' => __( 'Next posts page', 'airthrey_castle' ),
		) );
	?>
</div>