<?php

function airthrey_castle_customize_register_modify( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
}

function airthrey_castle_customize_register_scroll_layout( $wp_customize ){

	$wp_customize->add_section( 'scroll_layout' , array(
		'title'      => __( 'Scroll', 'airthrey_castle' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'airthrey_castle_scroll',
		array(
			'default' => 'on',
			'sanitize_callback' => 'airthrey_castle_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'airthrey_castle_scroll',
		array(
			'type' => 'radio',
			'label' => __('Show scroll to top','airthrey_castle'),
			'section' => 'scroll_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
		
}

function airthrey_castle_customize_register_page_layout( $wp_customize ){

	$wp_customize->add_section( 'page_layout' , array(
		'title'      => __( 'Page Options', 'airthrey_castle' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'airthrey_castle_author',
		array(
			'default' => 'on',
			'sanitize_callback' => 'airthrey_castle_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'airthrey_castle_author',
		array(
			'type' => 'radio',
			'label' => __('Display Author','airthrey_castle'),
			'section' => 'page_layout',
			'choices' => array(
				'on' => 'On',
				'off' => 'Off'		
			),
		)
	);
	
}

function airthrey_castle_customize_register_add_site_colours( $wp_customize ) {
	
	$wp_customize->add_section( 'site_colours' , array(
		'title'      => __( 'Site Colours', 'airthrey_castle' ),
		'priority'   => 30,
	) );
	
	$wp_customize->add_setting(
		'airthrey_castle_site_allsite_background_colour',
		array(
			'default' => '#fefefe',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_allsite_background_colour',
			array(
				'label' => __('Site background colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_allsite_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_alllink_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_alllink_colour',
			array(
				'label' => __('Site Link Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_alllink_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_alllink_hover_colour',
		array(
			'default' => '#1dffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_alllink_hover_colour',
			array(
				'label' => __('Site Link Hover Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_alllink_hover_colour'
			)
		)
	);

	$wp_customize->add_setting(
		'airthrey_castle_site_post_background_colour',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_post_background_colour',
			array(
				'label' => __('Home Page Post Background Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_post_background_colour'
			)
		)
	);

	$wp_customize->add_setting(
		'airthrey_castle_site_single_post_background_colour',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_single_post_background_colour',
			array(
				'label' => __('Single Post Background Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_single_post_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_alltext_colour',
		array(
			'default' => '#000000',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_alltext_colour',
			array(
				'label' => __('Site Text Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_alltext_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_title_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_title_colour',
			array(
				'label' => __('Site Article Title Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_title_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_header_background_colour',
		array(
			'default' => '#fefefe',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_header_background_colour',
			array(
				'label' => __('Site Header Background Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_header_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_header_text_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_title_colour',
			array(
				'label' => __('Site Title Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_title_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_submenu_background_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_submenu_background_colour',
			array(
				'label' => __('Site SubMenu Background Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_submenu_background_colour'
			)
		)
	);

	$wp_customize->add_setting(
		'airthrey_castle_site_menu_background_hover_colour',
		array(
			'default' => '#1dffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_menu_background_hover_colour',
			array(
				'label' => __('Site Menu Background Hover Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_menu_background_hover_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_menu_background_current_colour',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_menu_background_current_colour',
			array(
				'label' => __('Site Menu Current Page Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_menu_background_current_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_menu_text_colour',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_menu_text_colour',
			array(
				'label' => __('Site Menu Text Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_menu_text_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_menu_text_hover_colour',
		array(
			'default' => '#1dffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_menu_text_hover_colour',
			array(
				'label' => __('Site Menu Text Hover Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_menu_text_hover_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_button_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_button_colour',
			array(
				'label' => __('Site Button Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_button_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_site_button_text_colour',
		array(
			'default' => '#ffffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_site_button_text_colour',
			array(
				'label' => __('Site Button Text Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_site_button_text_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_pagination_background_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_pagination_background_colour',
			array(
				'label' => __('Pagination Background Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_pagination_background_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_pagination_link_colour',
		array(
			'default' => '#FFFFFF',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_pagination_link_colour',
			array(
				'label' => __('Pagination Link Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_pagination_link_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_border_top_colour',
		array(
			'default' => '#1dffff',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_border_top_colour',
			array(
				'label' => __('Post Border Top Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_border_top_colour'
			)
		)
	);
	
	$wp_customize->add_setting(
		'airthrey_castle_border_bottom_colour',
		array(
			'default' => '#3b5998',
			'transport' => 'postMessage',
			'sanitize_callback' => 'airthrey_castle_sanitize_colour',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'airthrey_castle_border_bottom_colour',
			array(
				'label' => __('Post Border Top Colour','airthrey_castle'),
				'section' => 'site_colours',
				'settings' => 'airthrey_castle_border_bottom_colour'
			)
		)
	);
	
}

function airthrey_castle_customize_register_licence( $wp_customize ){

	$wp_customize->add_section( 'cc_licence' , array(
		'title'      => __( 'Creative Commons License', 'airthrey_castle' ),
		'priority'   => 2,
	) );
	
	$wp_customize->add_setting(
		'airthrey_castle_license',
		array(
			'default' => 'none',
			'sanitize_callback' => 'airthrey_castle_sanitize_radio',
		)
	);
	 
	$wp_customize->add_control(
		'airthrey_castle_license',
		array(
			'type' => 'radio',
			'label' => __('Which Creative Commons License?','airthrey_castle'),
			'section' => 'cc_licence',
			'choices' => array(
				'none' => __('No license','airthrey_castle'),
				'zero' => __('Creative Commons Zero','airthrey_castle'),
				'cc-by' => __('Creative Commons CC-BY','airthrey_castle'),		
				'cc-by-sa' => __('Creative Commons CC-BY-SA','airthrey_castle'),		
				'cc-by-nd' => __('Creative Commons CC-BY-ND','airthrey_castle'),		
				'cc-by-nc' => __('Creative Commons CC-BY-NC','airthrey_castle'),		
				'cc-by-nc-sa' => __('Creative Commons CC-BY-NC-SA','airthrey_castle'),		
				'cc-by-nc-nd' => __('Creative Commons CC-BY-NC-ND','airthrey_castle'),		
			),
		)
	);
	
}

function airthrey_castle_sanitize_colour($value ) {
    return filter_var($value, FILTER_SANITIZE_STRING);
}

function airthrey_castle_sanitize_radio($value ) {
    return filter_var($value, FILTER_SANITIZE_STRING);
}

function airthrey_castle_sanitize_file($value ) {
    return filter_var($value, FILTER_SANITIZE_STRING);
}

function airthrey_castle_customize_register( $wp_customize ) {
	airthrey_castle_customize_register_modify( $wp_customize );
	airthrey_castle_customize_register_licence( $wp_customize );
	airthrey_castle_customize_register_add_site_colours( $wp_customize );
	airthrey_castle_customize_register_page_layout( $wp_customize );
	airthrey_castle_customize_register_scroll_layout( $wp_customize );
}
add_action( 'customize_register', 'airthrey_castle_customize_register' );

function airthrey_castle_customize_preview_js() {
	wp_enqueue_script( 'airthrey_castle_customizer', get_template_directory_uri() . '/js/airthrey_castle_customiser.js', array("customize-preview", "jquery") );
}
add_action( 'customize_preview_init', 'airthrey_castle_customize_preview_js' );
