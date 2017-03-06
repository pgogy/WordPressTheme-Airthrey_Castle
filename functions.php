<?php

function airthrey_castle_setup() {

	load_theme_textdomain( 'airthrey_castle', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'post-thumbnails' );	
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	
	set_post_thumbnail_size( 825, 510, true );

	if ( ! isset( $content_width ) ) $content_width = 900;

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'airthrey_castle' ),
	) );
	
	add_theme_support( 'html5', array(
										'comment-form', 'comment-list', 'gallery', 'caption'
									) 
	);
	
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

}
add_action( 'after_setup_theme', 'airthrey_castle_setup' );

function airthrey_castle_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'airthrey_castle' ),
		'id'            => 'sidebar-one',
		'description'   => __( 'Add widgets here', 'airthrey_castle' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'airthrey_castle_widgets_init' );
  
function airthrey_castle_scripts() {

	if(defined("SUBDOMAIN_INSTALL")){
		$ajax_base = site_url();
	}else{
		$ajax_base = network_site_url();
	}

	wp_enqueue_style( 'airthrey_castle-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'airthrey_castle-style-extra', admin_url('admin-ajax.php').'?action=airthrey_castle_custom_css');
	wp_enqueue_style( 'airthrey_castle-core-style', get_template_directory_uri() . '/css/wp_core.css' );
	wp_enqueue_style( 'airthrey_castle-style-mobile-768', get_template_directory_uri() . '/css/mobile768.css' );
	wp_enqueue_style( 'airthrey_castle-main-menu-style', get_template_directory_uri() . '/css/menu/main-menu.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome/font-awesome.min.css'); 
	
	wp_enqueue_style( 'google_font_poppins', '//fonts.googleapis.com/css?family=Varela+Round:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,vietnamese', FALSE);
	wp_enqueue_style( 'google_font_josefin', '//fonts.googleapis.com/css?family=Josefin+Sans:400', FALSE);

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	wp_enqueue_script( 'airthrey_castle-search', get_template_directory_uri() . '/js/search/search-form.js', array( 'jquery' ), "", true );
	
	if( ! is_single() && ! is_page() ){
	
		global $wp_query;
		
		wp_enqueue_script( 'airthrey_castle-masonry', get_template_directory_uri() . '/js/display/masonry.js', array( 'jquery' ), "", true );
		wp_localize_script( 'airthrey_castle-masonry', 'airthrey_castle_masonry_data', 
																			array( 
																					'request' => json_encode($wp_query),
																				)
					);
	
	}
	
	wp_enqueue_script( 'airthrey_castle-widgets', get_template_directory_uri() . '/js/display/front-page-widgets.js', array( 'jquery' ), "", true );

	wp_enqueue_script( 'airthrey_castle-main-menu', get_template_directory_uri() . '/js/menus/main-menu.js', array( 'jquery' ), "", true );
	
	wp_enqueue_script( 'airthrey_castle-library', get_template_directory_uri() . '/js/display/airthrey_castle-library.js', array( 'jquery' ), "", true );
	wp_localize_script( 'airthrey_castle-library', 'airthrey_castle_library', 
																			array( 
																					'noMorePosts' => __("No More Posts", "airthrey_castle"),
																				)
					);
	
	
	
	wp_enqueue_script( 'airthrey_castle-front-page-menu', get_template_directory_uri() . '/js/display/front-page-menu.js', array( 'jquery' ), "", true );
	
	wp_enqueue_script( 'airthrey_castle-front-page-filter-change', get_template_directory_uri() . '/js/display/front-page-filter-change.js', array( 'jquery' ), "", true );
	wp_localize_script( 'airthrey_castle-front-page-filter-change', 'airthrey_castle_filter', 
																			array( 
																					'ajaxURL' => $ajax_base . "/wp-admin/admin-ajax.php",
																					'siteURL' => site_url(),
																					'resetFilter' => __("Reset the filter", "airthrey_castle"),
																					'nonce' => wp_create_nonce("airthrey_castle_filter")
																				)
					);
					
	if(!is_single()){
		wp_enqueue_script( 'masonry' );
	}				
		
	if(get_theme_mod("airthrey_castle_scroll","on")=="on"){
		wp_enqueue_script( 'airthrey_castle-scroll-top', get_template_directory_uri() . '/js/display/front-page-scroll-top.js', array( 'jquery' ), "", true );
	}
	
}
add_action( 'wp_enqueue_scripts', 'airthrey_castle_scripts' );

function airthrey_castle_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb;
}

function airthrey_castle_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'airthrey_castle_excerpt_length', 999 );

function airthrey_castle_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/main.css' );
}
add_action( 'admin_init', 'airthrey_castle_add_editor_styles' );

function airthrey_castle_custom_css() {
		header("Content-type: text/css;");
		?>
		html,
		#comments,
		#widget-area{
			color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_alltext_colour', '#000000')); ?>;
		}
		
		<?PHP
			if(get_background_image()!=""){
		?>
		
		html body.custom-background{
			background:url('<?PHP echo get_background_image(); ?>');
			background-size:cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: top left;
			background-scroll: no-scroll;
		}
		
		#comments,
		#widget-area{
			background-color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_allsite_background_colour', '#fefefe')); ?>;
		}
		
		<?PHP
			}else{
			?>
				html,
				body,
				#comments,
				#widget-area{
					background-color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_allsite_background_colour', '#fefefe')); ?>;
				}
			<?PHP
			}
		?>
		
		<?PHP
			if(get_header_image()!=""){
		?>
		
		header#masthead{
			background:url('<?PHP echo get_header_image(); ?>');
			background-size:cover;
			background-repeat: no-repeat;
		}
		
		<?PHP
			}else{
		?>
			
		header#masthead{
			background-color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_allsite_background_colour', '#fefefe')); ?>
		}
		
		
		div#menu{
			background-color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_allsite_background_colour', '#fefefe')); ?>
		}
		
		<?PHP
			}
		?>
		
		
		.nav-links a,
		.site-navigation ul li a{
			color :  <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_menu_text_colour','#ffffff')); ?>;
		}

		.nav-links a,
		.site-navigation ul li{
			background-color :  <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_submenu_background_colour','#007934')); ?>;
		}
	
		li.sub-menu{
			background-color :  <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_submenu_background_colour','#007934')); ?>;
		}
		
		.site-navigation li a:hover,
		.site-navigation li a:focus {
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_menu_text_hover_colour','#33d177')); ?>;
		}
		
		.site-navigation li:hover, 
		.nav-links a:hover,
		.nav-links a:focus,
		.site-navigation li:focus {
			transition: background-color 0.5s ease;
			background-color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_menu_background_hover_colour','#3d7655')); ?>;
		}
		
		.site-navigation ul li .current-menu-item a{
			background: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_menu_background_current_colour','#aaaaaa')); ?>;  
			background-color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_menu_background_current_colour','#aaaaaa')); ?>;  
		}
		
		<?PHP
			$hex = airthrey_castle_hex2rgb(esc_html(get_theme_mod('airthrey_castle_site_post_background_colour','#ffffff')));
		?>
	
		article,
		.content-holder{
			background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 1.0); 
		}

		.page article,		
		.single article,
		.links .linkprevious,
		.links .linknext,
		.single .links,
		.page .links{
			background-color: <?PHP echo esc_html(get_theme_mod("airthrey_castle_site_single_post_background_colour",'#ffffff')); ?>;
		}

		a{
			color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_alllink_colour','#007934')); ?>;
		}
		
		html a:hover,
		html a:focus{
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_alllink_hover_colour','#3d7655')); ?>;
		}
		
		.nav-links a:hover,
		.nav-links a:focus{
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_background_colour','#007934')); ?>;
		}
		
		header#masthead h1 a,
		header#masthead p a{
			color: <?PHP echo esc_html(get_theme_mod("airthrey_castle_site_title_colour",'#007934')); ?>;
		}
		
		header#masthead h1 a:hover,
		header#masthead p a:hover{
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('airthrey_castle_site_alllink_hover_colour','#3d7655')); ?>;
		}
		
		button,
		input[type=submit]{
			background-color:  <?PHP echo esc_html(get_theme_mod("airthrey_castle_site_button_colour",'#007934')); ?>;
			color:  <?PHP echo esc_html(get_theme_mod("airthrey_castle_site_button_text_colour",'#ffffff')); ?>;
		}
		
		article .entry-title{
			color:  <?PHP echo esc_html(get_theme_mod("airthrey_castle_site_title_colour",'#555555')); ?>;
		}
		
		article{
			border-top:2px solid <?PHP echo esc_html(get_theme_mod('airthrey_castle_border_top_colour',"#33d177")); ?>;
			border-bottom:3px solid <?PHP echo esc_html(get_theme_mod('airthrey_castle_border_bottom_colour','#007934')); ?>;
		}
		
		.links_post,
		#commentform textarea,
		#sitesearchform form input[type=text],
		#commentform input[type=text],
		#commentform input[type=email],
		#commentform input[type=url]{
			background-color: <?PHP echo esc_html(get_theme_mod("airthrey_castle_pagination_background_colour",'#007934')); ?>;
		}
		
		.single .entry-footer div,
		.page .entry-footer div{
			border: 1px solid <?PHP echo esc_html(get_theme_mod("airthrey_castle_pagination_background_colour",'#007934')); ?>;
		}
		
		.links_post a{
			color: <?PHP echo esc_html(get_theme_mod("airthrey_castle_pagination_link_colour",'#fefefe')); ?>;
		}
		
		<?PHP
}
add_action('wp_ajax_airthrey_castle_custom_css', 'airthrey_castle_custom_css');
add_action('wp_ajax_nopriv_airthrey_castle_custom_css', 'airthrey_castle_custom_css');

function airthrey_castle_search_extend($query){
	if(is_search()){
		$query->query_vars['posts_per_page']=-1;
	}
	return $query;
}
add_action("pre_get_posts","airthrey_castle_search_extend");

function airthrey_castle_comment_template( $comment_template ) {
     return dirname(__FILE__) . '/parts/comments/comments.php';
}
add_filter( "comments_template", "airthrey_castle_comment_template" );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/airthrey_castle_filter.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/menus/Walker_Menu_airthrey_castle.php';
