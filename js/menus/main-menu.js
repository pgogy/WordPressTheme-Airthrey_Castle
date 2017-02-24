jQuery(document).ready( function($) {
		jQuery("nav.nav-menu-standard .caret")
			.on("click", function(event){
					
					show = jQuery(event.currentTarget)
						.parent()
						.next()
						.css("display");
					
					if(show=="none"){
						
						jQuery(event.currentTarget)
							.parent()
							.next()
							.slideDown(500);
							
					}
					else
					{
					
						jQuery(event.currentTarget)
							.parent()
							.next()
							.slideUp(250);
					
					}
							
				}
			);
			
		jQuery(document)
			.on("click", function(event){
				if(!jQuery(event.target).hasClass("caret")){
					jQuery(".standard-menu")
						.css("display", "none");
				}
			});
	}
);
