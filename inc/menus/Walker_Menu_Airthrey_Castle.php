<?php

class Walker_Menu_airthrey_castle extends Walker {

    var $db_fields = array(
        'parent' => 'menu_item_parent', 
        'id'     => 'db_id' 
    );
	
	var $first = false;

	function start_lvl( &$output, $depth = 0, $args = array() ) {
	
		$extra = "";
		if($depth>0){
			$extra = "sub-sub-menu";
		}
		$output .= "<ul class='sub-menu menu-depth-" . $depth . " " . $extra . "'>";
	
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
	
		$output .= "</ul>";
	
	}
	
	function end_el( &$output, $object, $depth = 0, $args = array() ) {
	
		$output .= "</li>";
	
	}
	
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	
		$page_class = "";
		
		if(isset($item->classes)){
			
			foreach($item->classes as $index => $class){
			
				if(strpos($class,"-")===FALSE){
				
					$page_class .= $class . " ";
					unset($item->classes[$index]);
				
				}
			
			}
			
		}
		
		if(!isset($item->classes)){
			$item->classes = array();
		}
		
		$item->classes[] = str_replace(" ", "-", strtolower(trim($page_class)));
		
		if($depth==""){
			$item->classes[] = "top-level";
		}
		
		if(in_array("menu-item-has-children",$item->classes)){
			$item->classes[] = "dropdown";
		}
	
        $output .= "<li class='" . implode(" ", $item->classes) . "'><a ";
		if ( $item->object_id === get_the_ID() ) {
			$output .= " class='current' ";
		}
		
		if(in_array("menu-item-has-children",$item->classes)){
			$output .= " href='" . $item->url . "' class='dropdown-toggle'>" . $item->title;
		}else{
			$output .= " href='" . $item->url . "'>" . $item->title;
		}
	
		$output .=  "</a>";
	
		if(in_array("menu-item-has-children",$item->classes)){
			$output .= "<a><span class='caret' menu_depth='menu-depth-" . $depth . "'></span></a>";	
		}		
		
    }

}