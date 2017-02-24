jQuery(document).ready( function(){

	jQuery("div#searchShow")
		.on("click", function(){
				airthrey_castle_aria("true");
				jQuery("#searchHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#searchHolder")
											.animate({opacity:"0.7"},200);
										jQuery("div#searchBar")
											.fadeIn(200);
										jQuery("#searchClose")
											.fadeIn(200);
								}
							);
			}
		);
		
	jQuery("p#searchClose")
		.on("click", function(){
				airthrey_castle_aria("false");
				jQuery("#searchBar")
					.fadeOut(250,
						function(){
							jQuery("#searchClose")
								.fadeOut(200);
							jQuery("#searchHolder")
								.slideUp(300, function(){
												jQuery("#page")
													.animate({opacity:"1"},200);
											}
										);
						}
					);
				
			}
		);
			
	}
);