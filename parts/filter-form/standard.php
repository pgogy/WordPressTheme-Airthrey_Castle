<form id="airthrey_castle_filter" onsubmit="return false">
<?PHP
	$categories = get_categories();
	echo "<div><label for='airthrey_castle_category'>" . __("Category", "airthrey_castle") . "</label>";
	echo "<select id='airthrey_castle_category'>";
	echo "<option value='0'>" . __("All categories", 'airthrey_castle') . "</option>";
	foreach($categories as $category){
		echo "<option value='" . $category->term_id . "'>" . $category->name . "</option>";
	}
	echo "</select></div>";
	$tags = get_tags();
	echo "<div><label for='airthrey_castle_tag'>" . __("Tag", "airthrey_castle") . "</label>";
	echo "<select id='airthrey_castle_tag'>";
	echo "<option value='0'>" . __("All Tags", 'airthrey_castle') . "</option>";
	foreach($tags as $tag){
		echo "<option value='" . $tag->term_id . "'>" . $tag->name . "</option>";
	}
	echo "</select></div>";
	
	$args = array(
		'posts_per_page'   => -1,
		'post_status' => "published",
		'post_type' => 'post'
	);
							
	$query = new WP_Query( $args );	

	$dates = array();
	$authors = array();
	$posts_count = count($query->posts);
	foreach($query->posts as $index => $post){
		$authors[$post->post_author] = ucfirst(get_the_author_meta( "display_name", $post->post_author ));
		$post_date = $post->post_date;
		$parts = explode(" ", $post_date);
		$date_parts = explode("-",$parts[0]);
		if(!in_array($date_parts[0] . "-" . $date_parts[1], $dates)){
			$dates[$date_parts[0] . "-" . $date_parts[1]] = __("All of", 'airthrey_castle') . " " . date("F Y", mktime(0,0,0,$date_parts[1],1,$date_parts[0]));
		}
		if(!in_array($parts[0], $dates)){
			$dates[$parts[0]] = "- " . date("D, j/" . $date_parts[1] . "/Y", mktime(0,0,0,$date_parts[1],$date_parts[2],$date_parts[0]));
		}
	}
	
	wp_reset_query();
	echo "<div><label for='airthrey_castle_date'>" . __("Date", "airthrey_castle") . "</label>";
	echo "<select id='airthrey_castle_date'>";
	echo "<option value='0'>" . __("All dates", 'airthrey_castle') . "</option>";
	foreach($dates as $date => $name){
		echo "<option value='" . $date . "'>" . $name . "</option>";
	}
	echo "</select></div>";
	
	asort($authors);
	
	echo "<div><label for='airthrey_castle_author'>" . __("Author", "airthrey_castle") . "</label>";
	echo "<select id='airthrey_castle_author'>";
	echo "<option value='0'>" . __("All Authors", 'airthrey_castle') . "</option>";
	foreach($authors as $id => $name){
		echo "<option value='" . $id . "'>" . $name . "</option>";
	}
	echo "</select></div>";
	
	echo "<div><label for='airthrey_castle_posts_total'>" . __("Number of posts", "airthrey_castle") . "</label>";
	echo "<select id='airthrey_castle_posts_total'>";
	echo "<option value='-1'>" . __("All Posts", 'airthrey_castle') . "</option>";
	echo "<option value='5'>5</option>";
	echo "<option value='10'>10</option>";
	echo "<option value='20'>20</option>";
	echo "<option value='50'>50</option>";
	echo "<option value='100'>100</option>";
	echo "</select></div>";
	
	echo "<div><label for='airthrey_castle_sort_by'>" . __("Sort by", "airthrey_castle") . "</label>";
	echo "<select id='airthrey_castle_sort_by'>";
	echo "<option value='date_DESC'>" . __("Date descending", 'airthrey_castle') . "</option>";
	echo "<option value='title_ASC'>" . __("Title ascending", 'airthrey_castle') . "</option>";
	echo "<option value='title_DESC'>" . __("Title descending", 'airthrey_castle') . "</option>";
	echo "<option value='date_ASC'>" . __("Date ascending", 'airthrey_castle') . "</option>";
	echo "</select></div>";
	
	echo "<div><label for='airthrey_castle_free_text'>" . __("Free text", 'airthrey_castle') . "</label></div><div><input type='text' name='freetext' id='airthrey_castle_free_text' maxlength='100' /></div>";
	echo "<p><span id='airthrey_castle_posts_count'>" . $posts_count . " " . __("Matching Posts", 'airthrey_castle') . "</span> <button id='filterShowButton'>" . __("Show", "airthrey_castle") . "</button></p>";
?>
</form>