jQuery(document).ready(
	function(){
		jQuery(".airthrey_castle_search_box")
			.on("focus", function(event){
					jQuery(event.target).attr("value","");
				}
			);
	}
);