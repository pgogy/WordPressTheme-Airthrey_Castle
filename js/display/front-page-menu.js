jQuery(document).ready( function(){

	jQuery("div#menuShow")
		.on("click", function(){
				airthrey_castle_aria("true");
				jQuery("#navMenuHolder")
					.slideDown(500, function(){
										jQuery("#page")
											.animate({opacity:"0.1"},100);
										jQuery("#navMenuHolder")
											.animate({opacity:"0.7"},200);
										jQuery("#menuClose")
											.fadeIn(200);
										jQuery("nav#primary-navigation")
											.fadeIn(200);
								}
							);
			}
		);
		
	jQuery("p#menuClose")
		.on("click", function(){
				airthrey_castle_aria("false");
				jQuery("#menuClose")
					.fadeOut(200,
						function(){							
							jQuery("nav#primary-navigation")
								.fadeOut(250,
									function(){
										jQuery("#navMenuHolder")
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
			
	}
);