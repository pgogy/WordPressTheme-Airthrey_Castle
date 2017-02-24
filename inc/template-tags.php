<?php

function airthrey_castle_licence(){
	$license = esc_html(get_theme_mod("airthrey_castle_license","none"));
	$text = "";
	if($license!="none"){
		switch($license){
			case 'zero' : $text = __('Creative Commons Zero',"airthrey_castle"); $url = "https://creativecommons.org/publicdomain/zero/1.0/"; break;
			case 'cc-by' : $text = __('Creative Commons CC-BY',"airthrey_castle"); $url = "https://creativecommons.org/licenses/by/4.0/";	break;	
			case 'cc-by-sa' : $text = __('Creative Commons CC-BY-SA',"airthrey_castle"); $url = "https://creativecommons.org/licenses/by-sa/4.0/"; break;		
			case 'cc-by-nd' : $text = __('Creative Commons CC-BY-ND',"airthrey_castle"); $url = "https://creativecommons.org/licenses/by-nd/4.0/"; break;		
			case 'cc-by-nc' : $text = __('Creative Commons CC-BY-NC',"airthrey_castle"); $url = "https://creativecommons.org/licenses/by-nc/4.0/"; break;		
			case 'cc-by-nc-sa' : $text = __('Creative Commons CC-BY-NC-SA',"airthrey_castle"); $url = "https://creativecommons.org/licenses/by-nc-sa/4.0/"; break;		
			case 'cc-by-nc-nd' : $text = __('Creative Commons CC-BY-NC-ND',"airthrey_castle"); $url = "https://creativecommons.org/licenses/by-nc-nd/4.0/"; break;
		}
		if(trim($text)!=""){
			?><p><a rel="license" href="<?PHP echo $url; ?>"><?PHP echo __("Content licensed as","airthrey_castle") . " " . $text; ?></a></p><?PHP
		}
	}
}

function airthrey_castle_get_categories($id){

	$post_categories = wp_get_post_categories($id);
	$cats = array();
		
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug, 'link' => get_category_link($c) );
	}
	
	return $cats;

}

function airthrey_castle_get_categories_links($id){

	$html = array();
	$cats = airthrey_castle_get_categories($id);
	
	foreach($cats as $cat){
		$html[] = "<span property='about' typeof='Thing'><a property='url' href='" . $cat['link'] ."'><span property='name'>" . $cat['name'] . "</span></a></span>";
	}
	
	if(count($html)==0){
		$html[] = esc_html(__("No Categories", "airthrey_castle"));
	}
	
	return $html;

}

function airthrey_castle_author_meta() {

	if(get_theme_mod("airthrey_castle_author", "on")=="on"){
		global $post;
		?><div>
			<h6 class='meta_label'><?PHP echo __('Author', 'airthrey_castle'); ?></h6> <span property="author" typeof="Person"><a property="url" href="<?PHP echo get_author_posts_url($post->post_author); ?>"><span property="name"><?PHP echo get_the_author_meta("display_name"); ?></span></a>
		</div>
		<?PHP
	}
	
}

function airthrey_castle_entry_meta() {

	global $post;
	?><div>
		<h6 class='meta_label'><?PHP echo __('Categories', 'airthrey_castle'); ?></h6><span>
		<?PHP  
			echo implode(" ", airthrey_castle_get_categories_links($post->ID));
		?>
		</span>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo __('Tags', 'airthrey_castle'); ?></h6><span><?PHP 
			if(get_the_tag_list()!=""){
				echo get_the_tag_list(" ", " <br /> ", " "); 
			}else{
				echo __("No tags","airthrey_castle");
			}
		?></span>
	</div>
	<div>
		<h6 class='meta_label'><?PHP echo __('Published', 'airthrey_castle'); ?></h6><span><?PHP echo get_the_date(); ?></span>
	</div>
	<?PHP
	
}

function airthrey_castle_archive_title(){

	if(isset($_GET['cat'])){
		$term = $_GET['cat'];
	}else{
		$term = get_term_by( "slug", $_GET['tag'], "post_tag" );
		$term = $term->term_id;
	}

	?><header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			$thumbnail = get_option( 'airthrey_castle_' . $term . '_thumbnail_id', 0 );
			if($thumbnail){
				$html = 'background:url(' . wp_get_attachment_url($thumbnail) . ') 0px 0px / cover no-repeat;';
				the_archive_description( '<div class="taxonomy-description"><div class="taxonomy_picture" style="' . $html . '"></div><div class="taxonomy_content">', '</div></div>' );
			}else{
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			}
		?>
	</header><?PHP

}

function airthrey_castle_author_title(){

	?><header class="page-header">
		<?php
			echo '<h1 class="page-title">' . ucfirst(get_the_author_meta("display_name")) . '</h1>';
			if(get_the_author_meta("description")!=""){
				echo '<div class="taxonomy-description">' . get_the_author_meta("description") . '</div>';
			}
		?>
	</header><?PHP

}

function airthrey_castle_posts_authors_list($type, $id){

	$the_query = new WP_Query( array($type => $id, 'posts_per_page' => -1) );
	
	$authors = array();

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$authors[] = get_the_author_meta('ID');
		}
	} 
	
	wp_reset_postdata();
	
	return $authors;
	
}