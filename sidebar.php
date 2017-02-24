<div id="widget-area" class="widget-area">
	<?php
		if(is_active_sidebar("sidebar-one")){
			dynamic_sidebar("sidebar-one"); 
		}else{
			if ( current_user_can( 'manage_options' ) ) {
				echo "<a href='" . admin_url("widgets.php") . "'>" . __("Add some widgets", "airthrey_castle") . "</a>"; 
			}else{
				echo __("Extra information will appear here", "airthrey_castle");
			}
		}
	?>
</div>
