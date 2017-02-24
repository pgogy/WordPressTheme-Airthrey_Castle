jQuery(document).ready( function(){
	jQuery("#airthrey_castletopscroll")
		.on("click", function(){
				jQuery('html, body').animate({scrollTop: jQuery("html").offset().top}, 400);
			}
		);
	jQuery(window).scroll(function (event) {
	
			var scrollTop = jQuery(window).scrollTop();
			
			if(scrollTop < 400){
			
				jQuery("#airthrey_castletopscroll")
					.fadeOut(200);
				
			}else{
			
				jQuery("#airthrey_castletopscroll")
					.fadeIn(200);
			
			}
		});
	}
);