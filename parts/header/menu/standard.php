<?PHP
	if(get_theme_mod("airthrey_castle_menu","on")=="on"){
		if ( has_nav_menu( "primary" ) ) {
			
			?><nav id="primary-navigation" class="site-navigation nav-menu-standard"><?PHP

				wp_nav_menu( 
					array( 
						'theme_location' => 'primary', 
						'menu_class' => 'nav-menu-standard',
						'walker' => new Walker_Menu_Airthrey_Castle(),
					)
				);
			
			?></nav><?PHP
					
		}
	}
?>