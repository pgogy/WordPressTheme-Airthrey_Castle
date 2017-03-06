function airthrey_castle_filter_search(){

	var data = {
				'action': 'airthrey_castle_filter',
				'category': jQuery("#airthrey_castle_category").val(),
				'tag': jQuery("#airthrey_castle_tag").val(),
				'date': jQuery("#airthrey_castle_date").val(),
				'text': jQuery("#airthrey_castle_free_text").val(),
				'author': jQuery("#airthrey_castle_author").val(),
				'nonce': airthrey_castle_filter.nonce
			};
			

	jQuery.post(airthrey_castle_filter.ajaxURL, data, function(response) {

			response_data = JSON.parse(response);

			if(response_data['count']!=0){
				jQuery("#airthrey_castle_posts_count").fadeOut(200, function(){
																jQuery("#filterShowButton").fadeIn(100);
																jQuery("#airthrey_castle_posts_count").html(response_data['count'] + " " + response_data['text']);
																jQuery("#airthrey_castle_posts_count").fadeIn(300);
															}
														);
			}
			else
			{
				jQuery("#filterShowButton").fadeOut(100);
				jQuery("#airthrey_castle_posts_count").fadeOut(200, function(){
																jQuery("#airthrey_castle_posts_count").html(response_data['count'] + " " + response_data['text']);
																jQuery("#airthrey_castle_posts_count").fadeIn(300);
															}
														);
			}
		}
	);
}

jQuery(document).ready( function(){
	
	jQuery("#airthrey_castle_free_text")
		.on("keyup", function(){
				airthrey_castle_filter_search();
			}
		);

	jQuery("#airthrey_castle_filter select")
		.on("change", function(){
				airthrey_castle_filter_search();
			}
		);
		
	jQuery("#filterShowButton")
		.on("click", function(){
		
				var data = {
					'action': 'airthrey_castle_show_posts',
					'category': jQuery("#airthrey_castle_category").val(),
					'tag': jQuery("#airthrey_castle_tag").val(),
					'date': jQuery("#airthrey_castle_date").val(),
					'author': jQuery("#airthrey_castle_author").val(),
					'text': jQuery("#airthrey_castle_free_text").val(),
					'posts': jQuery("#airthrey_castle_posts_total").val(),
					'order': jQuery("#airthrey_castle_sort_by").val(),
					'nonce': airthrey_castle_filter.nonce
				};
				

				jQuery.post(airthrey_castle_filter.ajaxURL, data, function(response) {
										
						response_data = JSON.parse(response);
					
						airthrey_castle_masonry_delete(response_data);
							
					}																
				);
						
			}
		);	
	}
);