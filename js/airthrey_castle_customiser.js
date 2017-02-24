( function( api ) {

	var $style = jQuery( '#airthrey_castle-colour-scheme-css' );

	if ( ! $style.length ) {
		$style = jQuery( 'head' ).append( '<style type="text/css" id="airthrey_castle-colour-scheme-css" />' )
								.find( '#airthrey_castle-colour-scheme-css' );
	}

	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-title a' ).text( to );
		} );
	} );
	
	api('airthrey_castle_site_allsite_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html' ).css("background-color", to );
		} );
	} );		
	
	api('airthrey_castle_site_alllink_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'a' ).css("color", to );
		} );
	} );
	
	api('airthrey_castle_site_post_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( '.widget-title' ).css("color", to );
			jQuery( '.home .page-footer h1 span').css("background-color", to);
			jQuery( 'article').css("background-color", to);
			jQuery( '.content-holder').css("background-color", to);
			jQuery( '.read-more-holder').css("background-color", to);
			jQuery( '.page-footer .pagination').css("background-color", to);
			jQuery( 'li.pingback div.comment-body').css("background-color", to);
			jQuery( '.comment-respond').css("background-color", to);
		} );
	} );
	
	api('airthrey_castle_site_single_post_background_colour', function( value ) {
		console.log(value);
		value.bind( function( to ) {
			console.log(to);
			jQuery( 'body.single article').css("background-color", to);
			jQuery( 'body.single article').css("background", to);
		} );
	} );
	
	api('airthrey_castle_site_content_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( '.page-footer h1 a').css("color", to);
			jQuery( 'article .entry-header .entry-title').css("background-color", to);
			jQuery( 'article .entry-content').css("background-color", to);
			jQuery( 'article .entry-footer h6').css("background-color", to);
			jQuery( '.page-header .taxonomy-description').css("background-color", to);
			jQuery( 'section.not-found .page-content').css("background-color", to);
			jQuery( '.page-footer .taxonomy-description').css("background-color", to);
		} );
	} );
	
	api('airthrey_castle_site_alltext_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html body' ).css("color", to );
			jQuery( 'html .home article' ).css("color", to );
		} );
	} );
	
	api('airthrey_castle_site_footer_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'footer#colophon' ).css("color", to );
		} );
	} );
	
	api('airthrey_castle_site_footer_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'footer#colophon' ).css("background-color", to );
		} );
	} );
	
	api('airthrey_castle_site_menu_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'h1' ).css("background-color", to );
			jQuery( 'h2' ).css("background-color", to );
			jQuery( 'h3' ).css("background-color", to );
			jQuery( 'h4' ).css("background-color", to );
			jQuery( 'h5' ).css("background-color", to );
			jQuery( 'h6' ).css("background-color", to );
			jQuery( 'summary' ).css("background-color", to );
			jQuery( '#bodyContent h1' ).css("background-color", to );
			jQuery( '#bodyContent h2' ).css("background-color", to );
			jQuery( '#bodyContent h3' ).css("background-color", to );
			jQuery( '#bodyContent h4' ).css("background-color", to );
			jQuery( '#bodyContent h5' ).css("background-color", to );
			jQuery( '#bodyContent h6' ).css("background-color", to );
			jQuery( '.site-navigation' ).css("background-color", to );
			jQuery( '.site-navigation ul' ).css("background-color", to );
			jQuery( '.nav-menu-slide ul' ).css("background-color", to );
		} );
	} );
	
	api('airthrey_castle_site_menu_background_hover_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-navigation li:hover' ).css("background-color", to ); 
			jQuery( '.site-navigation li:focus' ).css("background-color", to );
		} );
	} );
	
	api('airthrey_castle_site_menu_background_current_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-navigation ul li .current-menu-item a' ).css("background-color", to );
		} );
	} );
	
	api('airthrey_castle_site_menu_text_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-navigation ul li a' ).css("color", to );
		} );
	} );
	
	api('airthrey_castle_site_menu_text_hover_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( '.site-navigation li:hover' ).css("color", to ); 
			jQuery( '.site-navigation li:focus' ).css("color", to );
		} );
	} );
	
	api('airthrey_castle_site_header_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery("header#masthead")
				.css( "background-color", to );	
		} );
	} );
	
	api('airthrey_castle_site_header_text_colour', function( value ) {
		value.bind( function( to ) {
			jQuery("header#masthead a")
				.css("color", to );
		} );
	} );
	
	api('airthrey_castle_pagination_background_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html a.page-numbers' ).css( "background-color", to );
		} );
	} );
	
	api('airthrey_castle_pagination_link_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html a.page-numbers' ).css( "color", to );
		} );
	} );
	
	api('airthrey_castle_site_button_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html input[type=submit]' ).css( "background-color", to );
		} );
	} );
	
	api('airthrey_castle_site_button_text_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html input[type=submit]' ).css( "color", to );
		} );
	} );
	
	api('airthrey_castle_border_colour', function( value ) {
		value.bind( function( to ) {
			jQuery( 'html .home article .content-holder' ).css( "border-color", to );
			jQuery( 'html .search article .content-holder' ).css( "border-color", to );
			jQuery( 'html .archive article .content-holder' ).css( "border-color", to );
		} );
	} );

} )( wp.customize );
