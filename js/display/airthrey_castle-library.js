function airthrey_castle_menu_slide_filter(items){
	if(items.length!=0){
		article = items.shift();
		jQuery(article)
			.fadeIn(600, function(){airthrey_castle_menu_slide_filter(items);});
	}else{
		jQuery('#scroll_bottom').html(airthrey_castle_library.noMorePosts);
		scrolling = false;
	}
}
