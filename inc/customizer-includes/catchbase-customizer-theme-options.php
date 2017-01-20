<?php
/**
 * The template for adding additional theme options in Customizer
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0
 */

// Additional Color Scheme (added to Color Scheme section in Theme Customizer)
if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


	//Theme Options
	$wp_customize->add_panel( 'catchbase_theme_options', array(
	    'description'    => __( 'Basic theme Options', 'catch-base' ),
	    'capability'     => 'edit_theme_options',
	    'priority'       => 200,
	    'title'    		 => __( 'Theme Options', 'catch-base' ),
	) );

	// Breadcrumb Option
	$wp_customize->add_section( 'catchbase_breadcumb_options', array(
		'description'	=> __( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'catch-base' ),
		'panel'			=> 'catchbase_theme_options',
		'title'    		=> __( 'Breadcrumb Options', 'catch-base' ),
		'priority' 		=> 201,
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[breadcumb_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_option'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[breadcumb_option]', array(
		'label'    => __( 'Check to enable Breadcrumb', 'catch-base' ),
		'section'  => 'catchbase_breadcumb_options',
		'settings' => 'catchbase_theme_options[breadcumb_option]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[breadcumb_onhomepage]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_onhomepage'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[breadcumb_onhomepage]', array(
		'label'    => __( 'Check to enable Breadcrumb on Homepage', 'catch-base' ),
		'section'  => 'catchbase_breadcumb_options',
		'settings' => 'catchbase_theme_options[breadcumb_onhomepage]',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[breadcumb_seperator]', array(
		'transport'			=> 'postMessage',
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['breadcumb_seperator'],
		'sanitize_callback'	=> 'sanitize_text_field'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[breadcumb_seperator]', array(
			'input_attrs' => array(
	            'style' => 'width: 40px;'
            	),
            'label'    	=> __( 'Separator between Breadcrumbs', 'catch-base' ),
			'section' 	=> 'catchbase_breadcumb_options',
			'settings' 	=> 'catchbase_theme_options[breadcumb_seperator]',
			'type'     	=> 'text'
		)
	);
   	// Breadcrumb Option End

	/**
	 * Do not show Custom CSS option from WordPress 4.7 onwards
	 */
	if ( !function_exists( 'wp_update_custom_css_post' ) ) {
	   	// Custom CSS Option
		$wp_customize->add_section( 'catchbase_custom_css', array(
			'description'	=> __( 'Custom/Inline CSS', 'catch-base'),
			'panel'  		=> 'catchbase_theme_options',
			'priority' 		=> 203,
			'title'    		=> __( 'Custom CSS Options', 'catch-base' ),
		) );

		$wp_customize->add_setting( 'catchbase_theme_options[custom_css]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['custom_css'],
			'sanitize_callback' => 'catchbase_sanitize_custom_css',
		) );

		$wp_customize->add_control( 'catchbase_theme_options[custom_css]', array(
				'label'		=> __( 'Enter Custom CSS', 'catch-base' ),
		        'priority'	=> 1,
				'section'   => 'catchbase_custom_css',
		        'settings'  => 'catchbase_theme_options[custom_css]',
				'type'		=> 'textarea',
		) );
	   	// Custom CSS End
	}

   	// Excerpt Options
	$wp_customize->add_section( 'catchbase_excerpt_options', array(
		'panel'  	=> 'catchbase_theme_options',
		'priority' 	=> 204,
		'title'    	=> __( 'Excerpt Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[excerpt_length]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'catchbase_theme_options[excerpt_length]', array(
		'description' => __('Excerpt length. Default is 40 words', 'catch-base'),
		'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'width: 60px;'
            ),
        'label'    => __( 'Excerpt Length (words)', 'catch-base' ),
		'section'  => 'catchbase_excerpt_options',
		'settings' => 'catchbase_theme_options[excerpt_length]',
		'type'	   => 'number',
	)	);


	$wp_customize->add_setting( 'catchbase_theme_options[excerpt_more_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['excerpt_more_text'],
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'catchbase_theme_options[excerpt_more_text]', array(
		'label'    => __( 'Read More Text', 'catch-base' ),
		'section'  => 'catchbase_excerpt_options',
		'settings' => 'catchbase_theme_options[excerpt_more_text]',
		'type'	   => 'text',
	) );
	// Excerpt Options End

	//Homepage / Frontpage Options
	$wp_customize->add_section( 'catchbase_homepage_options', array(
		'description'	=> __( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catch-base' ),
		'panel'			=> 'catchbase_theme_options',
		'priority' 		=> 209,
		'title'   	 	=> __( 'Homepage / Frontpage Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[front_page_category]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['front_page_category'],
		'sanitize_callback'	=> 'catchbase_sanitize_category_list',
	) );

	$wp_customize->add_control( new Catchbase_Customize_Dropdown_Categories_Control( $wp_customize, 'catchbase_theme_options[front_page_category]', array(
        'label'   	=> __( 'Select Categories', 'catch-base' ),
        'name'	 	=> 'catchbase_theme_options[front_page_category]',
		'priority'	=> '6',
        'section'  	=> 'catchbase_homepage_options',
        'settings' 	=> 'catchbase_theme_options[front_page_category]',
        'type'     	=> 'dropdown-categories',
    ) ) );
	//Homepage / Frontpage Settings End

	//@remove Remove this block when WordPress 4.8 is released
	if ( ! function_exists( 'has_site_icon' ) ) {
		// Icon Options
		$wp_customize->add_section( 'catchbase_icons', array(
			'description'	=> __( 'Remove Icon images to disable.', 'catch-base'),
			'panel'  => 'catchbase_theme_options',
			'priority' 		=> 210,
			'title'    		=> __( 'Icon Options', 'catch-base' ),
		) );

		$wp_customize->add_setting( 'catchbase_theme_options[favicon]', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchbase_sanitize_image',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchbase_theme_options[favicon]', array(
			'label'		=> __( 'Select/Add Favicon', 'catch-base' ),
			'section'    => 'catchbase_icons',
	        'settings'   => 'catchbase_theme_options[favicon]',
		) ) );

		$wp_customize->add_setting( 'catchbase_theme_options[web_clip]', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchbase_sanitize_image',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'catchbase_theme_options[web_clip]', array(
			'description'	=> __( 'Web Clip Icon for Apple devices. Recommended Size - Width 144px and Height 144px height, which will support High Resolution Devices like iPad Retina.', 'catch-base'),
			'label'		 	=> __( 'Select/Add Web Clip Icon', 'catch-base' ),
			'section'    	=> 'catchbase_icons',
	        'settings'   	=> 'catchbase_theme_options[web_clip]',
		) ) );
		// Icon Options End
	}

	// Layout Options
	$wp_customize->add_section( 'catchbase_layout', array(
		'capability'=> 'edit_theme_options',
		'panel'		=> 'catchbase_theme_options',
		'priority'	=> 211,
		'title'		=> __( 'Layout Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[theme_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['theme_layout'],
		'sanitize_callback' => 'catchbase_sanitize_select',
	) );

	$layouts = catchbase_layouts();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[theme_layout]', array(
		'choices'	=> $choices,
		'label'		=> __( 'Default Layout', 'catch-base' ),
		'section'	=> 'catchbase_layout',
		'settings'   => 'catchbase_theme_options[theme_layout]',
		'type'		=> 'select',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['content_layout'],
		'sanitize_callback' => 'catchbase_sanitize_select',
	) );

	$layouts = catchbase_get_archive_content_layout();
	$choices = array();
	foreach ( $layouts as $layout ) {
		$choices[ $layout['value'] ] = $layout['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[content_layout]', array(
		'choices'   => $choices,
		'label'		=> __( 'Archive Content Layout', 'catch-base' ),
		'section'   => 'catchbase_layout',
		'settings'  => 'catchbase_theme_options[content_layout]',
		'type'      => 'select',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[single_post_image_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['single_post_image_layout'],
		'sanitize_callback' => 'catchbase_sanitize_select',
	) );


	$single_post_image_layouts = catchbase_single_post_image_layout_options();
	$choices = array();
	foreach ( $single_post_image_layouts as $single_post_image_layout ) {
		$choices[$single_post_image_layout['value']] = $single_post_image_layout['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[single_post_image_layout]', array(
			'label'		=> __( 'Single Page/Post Image Layout ', 'catch-base' ),
			'section'   => 'catchbase_layout',
	        'settings'  => 'catchbase_theme_options[single_post_image_layout]',
	        'type'	  	=> 'select',
			'choices'  	=> $choices,
	) );
   	// Layout Options End

	// Pagination Options
	$pagination_type	= $options['pagination_type'];

	$catchbase_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.<br/>Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'catch-base' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );

	/**
	 * Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	 */
	if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
		if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
			$catchbase_navigation_description = sprintf( __( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'catch-base' ), esc_url( 'https://wordpress.org/plugins/jetpack/' ) );
		}
		else {
			$catchbase_navigation_description = '';
		}
	}
	/**
	* Check if navigation type is numeric and if Wp-PageNavi Plugin is enabled
	*/
	elseif ( 'numeric' == $pagination_type ) {
		if ( !function_exists( 'wp_pagenavi' ) ) {
			$catchbase_navigation_description = sprintf( __( 'Numeric Option requires <a target="_blank" href="%s">WP-PageNavi Plugin</a>.', 'catch-base' ), esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ) );
		}
		else {
			$catchbase_navigation_description = '';
		}
    }

	$wp_customize->add_section( 'catchbase_pagination_options', array(
		'description'	=> $catchbase_navigation_description,
		'panel'  		=> 'catchbase_theme_options',
		'priority'		=> 212,
		'title'    		=> __( 'Pagination Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[pagination_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['pagination_type'],
		'sanitize_callback' => 'catchbase_sanitize_select',
	) );

	$pagination_types = catchbase_get_pagination_types();
	$choices = array();
	foreach ( $pagination_types as $pagination_type ) {
		$choices[$pagination_type['value']] = $pagination_type['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[pagination_type]', array(
		'choices'  => $choices,
		'label'    => __( 'Pagination type', 'catch-base' ),
		'section'  => 'catchbase_pagination_options',
		'settings' => 'catchbase_theme_options[pagination_type]',
		'type'	   => 'select',
	) );
	// Pagination Options End

	//Promotion Headline Options
    $wp_customize->add_section( 'catchbase_promotion_headline_options', array(
		'description'	=> __( 'To disable the fields, simply leave them empty.', 'catch-base' ),
		'panel'			=> 'catchbase_theme_options',
		'priority' 		=> 213,
		'title'   	 	=> __( 'Promotion Headline Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['promotion_headline_option'],
		'sanitize_callback' => 'catchbase_sanitize_select',
	) );

	$catchbase_featured_slider_content_options = catchbase_featured_slider_content_options();
	$choices = array();
	foreach ( $catchbase_featured_slider_content_options as $catchbase_featured_slider_content_option ) {
		$choices[$catchbase_featured_slider_content_option['value']] = $catchbase_featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_option]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Enable Promotion Headline on', 'catch-base' ),
		'priority'	=> '0.5',
		'section'  	=> 'catchbase_promotion_headline_options',
		'settings' 	=> 'catchbase_theme_options[promotion_headline_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline'],
		'sanitize_callback'	=> 'wp_kses_post',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline]', array(
		'active_callback' 	=> 'catchbase_is_promotion_headline_enabled',
		'description'		=> __( 'Appropriate Words: 10', 'catch-base' ),
		'label'    			=> __( 'Promotion Headline Text', 'catch-base' ),
		'priority'			=> '1',
		'section' 			=> 'catchbase_promotion_headline_options',
		'settings'			=> 'catchbase_theme_options[promotion_headline]',
		'type'				=> 'textarea'
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_subheadline'],
		'sanitize_callback'	=> 'wp_kses_post',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_subheadline]', array(
		'active_callback' 	=> 'catchbase_is_promotion_headline_enabled',
		'description'		=> __( 'Appropriate Words: 15', 'catch-base' ),
		'label'    			=> __( 'Promotion Subheadline Text', 'catch-base' ),
		'priority'			=> '2',
		'section' 			=> 'catchbase_promotion_headline_options',
		'settings'			=> 'catchbase_theme_options[promotion_subheadline]',
		'type'				=> 'textarea'
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_button]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_button'],
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_button]', array(
		'active_callback' 	=> 'catchbase_is_promotion_headline_enabled',
		'description'		=> __( 'Appropriate Words: 3', 'catch-base' ),
		'label'    			=> __( 'Promotion Headline Button Text ', 'catch-base' ),
		'priority'			=> '3',
		'section' 			=> 'catchbase_promotion_headline_options',
		'settings'			=> 'catchbase_theme_options[promotion_headline_button]',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_url]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_url'],
		'sanitize_callback'	=> 'esc_url_raw',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_url]', array(
		'active_callback' 	=> 'catchbase_is_promotion_headline_enabled',
		'label'    			=> __( 'Promotion Headline Link', 'catch-base' ),
		'priority'			=> '4',
		'section' 			=> 'catchbase_promotion_headline_options',
		'settings'			=> 'catchbase_theme_options[promotion_headline_url]',
		'type'				=> 'text',
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[promotion_headline_target]', array(
		'capability'		=> 'edit_theme_options',
		'default' 			=> $defaults['promotion_headline_target'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[promotion_headline_target]', array(
		'active_callback' 	=> 'catchbase_is_promotion_headline_enabled',
		'label'    			=> __( 'Check to Open Link in New Window/Tab', 'catch-base' ),
		'priority'			=> '5',
		'section'  			=> 'catchbase_promotion_headline_options',
		'settings' 			=> 'catchbase_theme_options[promotion_headline_target]',
		'type'     			=> 'checkbox',
	) );
	// Promotion Headline Options End

	// Scrollup
	$wp_customize->add_section( 'catchbase_scrollup', array(
		'panel'    => 'catchbase_theme_options',
		'priority' => 215,
		'title'    => __( 'Scrollup Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[disable_scrollup]', array(
		'capability'		=> 'edit_theme_options',
        'default'			=> $defaults['disable_scrollup'],
		'sanitize_callback' => 'catchbase_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'catchbase_theme_options[disable_scrollup]', array(
		'label'		=> __( 'Check to disable Scroll Up', 'catch-base' ),
		'section'   => 'catchbase_scrollup',
        'settings'  => 'catchbase_theme_options[disable_scrollup]',
		'type'		=> 'checkbox',
	) );
	// Scrollup End

	// Search Options
	$wp_customize->add_section( 'catchbase_search_options', array(
		'description'=> __( 'Change default placeholder text in Search.', 'catch-base'),
		'panel'  => 'catchbase_theme_options',
		'priority' => 216,
		'title'    => __( 'Search Options', 'catch-base' ),
	) );

	$wp_customize->add_setting( 'catchbase_theme_options[search_text]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['search_text'],
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=> 'postMessage'
	) );

	$wp_customize->add_control( 'catchbase_theme_options[search_text]', array(
		'label'		=> __( 'Default Display Text in Search', 'catch-base' ),
		'section'   => 'catchbase_search_options',
        'settings'  => 'catchbase_theme_options[search_text]',
		'type'		=> 'text',
	) );
	// Search Options End
//Theme Option End