jQuery(window).load(function() {

	if(jQuery("body").hasClass("home")){

		airthrey_castle_masonry(); 

	}else{

		var container = document.querySelector('#main');
		var msnry = new Masonry( container, {
			itemSelector: 'article',
			columnWidth: 'article',                
		});  

		msnry.layout();
	
	}

});

function airthrey_castle_masonry(){
	
	var data = {
				'action': 'airthrey_castle_index',
				'nonce': airthrey_castle_filter.nonce,
				'query': airthrey_castle_masonry_data.request
			};
			
	jQuery.post(airthrey_castle_filter.ajaxURL, data, function(response) {
	
			data = JSON.parse(response);
	
			var container = document.querySelector('#main');
			var msnry = new Masonry( container, {
				itemSelector: 'article',
				columnWidth: 'article',                
			});  

			setTimeout(
				function(){
					airthrey_castle_masonry_append_loop(data, container, msnry);
				},
				200
			);	
			
		}
	);
	
}

function airthrey_castle_masonry_delete(new_html){
	
	var container = document.querySelector('#main');
	
	var msnry = new Masonry( container, {
        itemSelector: 'article',
        columnWidth: 'article',                
    }); 
	
	list = new Array();
	
    jQuery("#main article")
		.each(
			function(index,value){
				list.push(value);
			}
		);
		
	setTimeout(
		function(){
			airthrey_castle_masonry_delete_loop(list, container, msnry,new_html);
		},
		1
	);	
		
}

function airthrey_castle_masonry_delete_loop(list, container, msnry, new_html){
	
	if(list.length!=0){

		msnry.remove(list.pop());
		msnry.layout();
	
		setTimeout(
			function(){
				airthrey_castle_masonry_delete_loop(list, container, msnry, new_html);
			},
			150
		);	
		
	}else{
	
		airthrey_castle_masonry_append_loop(new_html, container, msnry)
	
	}
}

function airthrey_castle_masonry_append_loop(list, container, msnry){

	if(list.length!=0){

		next_item = document.createElement("div");
		next_item.innerHTML = list.shift();
		
		container
			.appendChild(next_item);
			
		msnry.appended(next_item);
		msnry.layout();
	
		setTimeout(
			function(){
				airthrey_castle_masonry_append_loop(list, container, msnry);
			},
			200
		);	
		
	}else{
	
		console.log("done");
		
	}
}