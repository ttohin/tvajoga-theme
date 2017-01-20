<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Catch Base
 * @since Catch Base 1.0
 */

if ( ! defined( 'CATCHBASE_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


/**
 * Returns the default options for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_get_default_theme_options() {

	$default_theme_options = array(
		//Site Title an Tagline
		'logo'												=> get_template_directory_uri() . '/images/headers/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,
		'move_title_tagline'								=> 0,

		//Layout
		'theme_layout' 										=> 'three-columns',
		'content_layout'									=> 'excerpt-featured-image',
		'single_post_image_layout'							=> 'disabled',

		//Header Image
		'enable_featured_header_image'						=> 'disabled',
		'featured_image_size'								=> 'full',
		'featured_header_image_url'							=> '',
		'featured_header_image_alt'							=> '',
		'featured_header_image_base'						=> 0,

		//Breadcrumb Options
		'breadcumb_option'									=> 0,
		'breadcumb_onhomepage'								=> 0,
		'breadcumb_seperator'								=> '&raquo;',

		//Custom CSS
		'custom_css'										=> '',

		//Scrollup Options
		'disable_scrollup'									=> 0,

		//Excerpt Options
		'excerpt_length'									=> '40',
		'excerpt_more_text'									=> __( 'Read More ...', 'catch-base' ),

		//Homepage / Frontpage Settings
		'front_page_category'								=> array(),

		//Pagination Options
		'pagination_type'									=> 'default',

		//Promotion Headline Options
		'promotion_headline_option'							=> 'homepage',
		'promotion_headline'								=> __( 'Catch Base is a Premium Responsive WordPress Theme', 'catch-base' ),
		'promotion_subheadline'								=> __( 'This is promotion headline. You can edit this from Appearance -> Customize -> Theme Options -> Promotion Headline Options', 'catch-base' ),
		'promotion_headline_button'							=> __( 'Reviews', 'catch-base' ),
		'promotion_headline_url'							=> esc_url( 'http://wordpress.org/support/view/theme-reviews/catch-base' ),
		'promotion_headline_target'							=> 1,

		//Search Options
		'search_text'										=> __( 'Search...', 'catch-base' ),

		//Basic Color Options
		'color_scheme' 										=> 'light',
		'background_color'									=> '#f2f2f2',
		'header_textcolor'									=> '#404040',

		//Featured Content Options
		'featured_content_option'							=> 'homepage',
		'featured_content_layout'							=> 'layout-four',
		//move_posts_home replaced with featured_content_position from version 1.1
		'move_posts_home'									=> 0,
		'featured_content_position'							=> 0,
		'featured_content_headline'							=> '',
		'featured_content_subheadline'						=> '',
		'featured_content_type'								=> 'demo-featured-content',
		'featured_content_number'							=> '4',
		'featured_content_show'								=> 'excerpt',

		//Featured Slider Options
		'featured_slider_option'							=> 'homepage',
		'featured_slider_image_loader'						=> 'true',
		'featured_slide_transition_effect'					=> 'fadeout',
		'featured_slide_transition_delay'					=> '4',
		'featured_slide_transition_length'					=> '1',
		'featured_slider_type'								=> 'demo-featured-slider',
		'featured_slide_number'								=> '4',

		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	return apply_filters( 'catchbase_default_theme_options', $default_theme_options );
}


/**
 * Returns an array of featured slider image loader options
 *
 * @since Catch Base 2.3.1
 */
function catchbase_featured_slider_image_loader() {
	$color_scheme_options = array(
		'true' => array(
			'value' 				=> 'true',
			'label' 				=> __( 'True', 'catch-base' ),
		),
		'wait' => array(
			'value' 				=> 'wait',
			'label' 				=> __( 'Wait', 'catch-base' ),
		),
		'false' => array(
			'value' 				=> 'false',
			'label' 				=> __( 'False', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_color_schemes', $color_scheme_options );
}

/**
 * Returns an array of color schemes registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_color_schemes() {
	$color_scheme_options = array(
		'light' => array(
			'value' 				=> 'light',
			'label' 				=> __( 'Light', 'catch-base' ),
		),
		'dark' => array(
			'value' 				=> 'dark',
			'label' 				=> __( 'Dark', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_color_schemes', $color_scheme_options );
}


/**
 * Returns an array of layout options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_layouts() {
	$layout_options = array(
		'left-sidebar' 	=> array(
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catch-base' ),
		),
		'right-sidebar' => array(
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catch-base' ),
		),
		'three-columns'	=> array(
			'value' => 'three-columns',
			'label' => __( 'Three Columns ( Secondary Sidebar, Content, Primary Sidebar )', 'catch-base' ),
		),
		'no-sidebar'	=> array(
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catch-base' ),
		),
	);
	return apply_filters( 'catchbase_layouts', $layout_options );
}


/**
 * Returns an array of content layout options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-featured-image' => array(
			'value' => 'excerpt-featured-image',
			'label' => __( 'Show Excerpt', 'catch-base' ),
		),
		'full-content' => array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content (No Featured Image)', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_get_archive_content_layout', $layout_options );
}


/**
 * Returns an array of feature header enable options
 *
 * @since Catch Base 1.0
 */
function catchbase_enable_featured_header_image_options() {
	$enable_featured_header_image_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'catch-base' ),
		),
		'exclude-home' 		=> array(
			'value'	=> 'exclude-home',
			'label' => __( 'Excluding Homepage', 'catch-base' ),
		),
		'exclude-home-page-post' 	=> array(
			'value' => 'exclude-home-page-post',
			'label' => __( 'Excluding Homepage, Page/Post Featured Image', 'catch-base' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'catch-base' ),
		),
		'entire-site-page-post' 	=> array(
			'value' => 'entire-site-page-post',
			'label' => __( 'Entire Site, Page/Post Featured Image', 'catch-base' ),
		),
		'pages-posts' 	=> array(
			'value' => 'pages-posts',
			'label' => __( 'Pages and Posts', 'catch-base' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_enable_featured_header_image_options', $enable_featured_header_image_options );
}


/**
 * Returns an array of feature image size
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_image_size_options() {
	$featured_image_size_options = array(
		'full' 		=> array(
			'value'	=> 'full',
			'label' => __( 'Full Image', 'catch-base' ),
		),
		'large' 	=> array(
			'value' => 'large',
			'label' => __( 'Large Image', 'catch-base' ),
		),
		'slider'		=> array(
			'value' => 'slider',
			'label' => __( 'Slider Image', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_featured_image_size_options', $featured_image_size_options );
}


/**
 * Returns an array of content and slider layout options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_slider_content_options() {
	$featured_slider_content_options = array(
		'homepage' 		=> array(
			'value'	=> 'homepage',
			'label' => __( 'Homepage / Frontpage', 'catch-base' ),
		),
		'entire-site' 	=> array(
			'value' => 'entire-site',
			'label' => __( 'Entire Site', 'catch-base' ),
		),
		'disabled'		=> array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_featured_slider_content_options', $featured_slider_content_options );
}


/**
 * Returns an array of feature content types registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_content_types() {
	$featured_content_types = array(
		'demo-featured-content' => array(
			'value' => 'demo-featured-content',
			'label' => __( 'Demo Featured Content', 'catch-base' ),
		),
		'featured-page-content' => array(
			'value' => 'featured-page-content',
			'label' => __( 'Featured Page Content', 'catch-base' ),
		)
	);

	return apply_filters( 'catchbase_featured_content_types', $featured_content_types );
}


/**
 * Returns an array of featured content options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_content_layout_options() {
	$featured_content_layout_option = array(
		'layout-three' 		=> array(
			'value'	=> 'layout-three',
			'label' => __( '3 columns', 'catch-base' ),
		),
		'layout-four' 	=> array(
			'value' => 'layout-four',
			'label' => __( '4 columns', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_featured_content_layout_options', $featured_content_layout_option );
}

/**
 * Returns an array of featured content show registered for catchbase.
 *
 * @since Catch Base 1.9.1
 */
function catchbase_featured_content_show() {
	$featured_content_show_option = array(
		'excerpt' 		=> array(
			'value'	=> 'excerpt',
			'label' => __( 'Show Excerpt', 'catch-base' ),
		),
		'full-content' 	=> array(
			'value' => 'full-content',
			'label' => __( 'Show Full Content', 'catch-base' ),
		),
		'hide-content' 	=> array(
			'value' => 'hide-content',
			'label' => __( 'Hide Content', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_featured_content_show', $featured_content_show_option );
}

/**
 * Returns an array of feature slider types registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_slider_types() {
	$featured_slider_types = array(
		'demo-featured-slider' => array(
			'value' => 'demo-featured-slider',
			'label' => __( 'Demo Featured Slider', 'catch-base' ),
		),
		'featured-page-slider' => array(
			'value' => 'featured-page-slider',
			'label' => __( 'Featured Page Slider', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_featured_slider_types', $featured_slider_types );
}


/**
 * Returns an array of feature slider transition effects
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_slide_transition_effects() {
	$featured_slide_transition_effects = array(
		'fade' 		=> array(
			'value'	=> 'fade',
			'label' => __( 'Fade', 'catch-base' ),
		),
		'fadeout' 	=> array(
			'value'	=> 'fadeout',
			'label' => __( 'Fade Out', 'catch-base' ),
		),
		'none' 		=> array(
			'value' => 'none',
			'label' => __( 'None', 'catch-base' ),
		),
		'scrollHorz'=> array(
			'value' => 'scrollHorz',
			'label' => __( 'Scroll Horizontal', 'catch-base' ),
		),
		'scrollVert'=> array(
			'value' => 'scrollVert',
			'label' => __( 'Scroll Vertical', 'catch-base' ),
		),
		'flipHorz'	=> array(
			'value' => 'flipHorz',
			'label' => __( 'Flip Horizontal', 'catch-base' ),
		),
		'flipVert'	=> array(
			'value' => 'flipVert',
			'label' => __( 'Flip Vertical', 'catch-base' ),
		),
		'tileSlide'	=> array(
			'value' => 'tileSlide',
			'label' => __( 'Tile Slide', 'catch-base' ),
		),
		'tileBlind'	=> array(
			'value' => 'tileBlind',
			'label' => __( 'Tile Blind', 'catch-base' ),
		),
		'shuffle'	=> array(
			'value' => 'shuffle',
			'label' => __( 'Shuffle', 'catch-base' ),
		)
	);

	return apply_filters( 'catchbase_featured_slide_transition_effects', $featured_slide_transition_effects );
}


/**
 * Returns an array of color schemes registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_get_pagination_types() {
	$pagination_types = array(
		'default' => array(
			'value' => 'default',
			'label' => __( 'Default(Older Posts/Newer Posts)', 'catch-base' ),
		),
		'numeric' => array(
			'value' => 'numeric',
			'label' => __( 'Numeric', 'catch-base' ),
		),
		'infinite-scroll-click' => array(
			'value' => 'infinite-scroll-click',
			'label' => __( 'Infinite Scroll (Click)', 'catch-base' ),
		),
		'infinite-scroll-scroll' => array(
			'value' => 'infinite-scroll-scroll',
			'label' => __( 'Infinite Scroll (Scroll)', 'catch-base' ),
		),
	);

	return apply_filters( 'catchbase_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of content featured image size.
 *
 * @since Catch Base 1.0
 */
function catchbase_single_post_image_layout_options() {
	$single_post_image_layout_options = array(
		'large' => array(
			'value' => 'large',
			'label' => __( 'Large', 'catch-base' ),
		),
		'medium' => array(
			'value' => 'medium',
			'label' => __( 'Medium', 'catch-base' ),
		),
		'full-size' => array(
			'value' => 'full-size',
			'label' => __( 'Full size', 'catch-base' ),
		),
		'slider-image-size' => array(
			'value' => 'slider-image-size',
			'label' => __( 'Slider Image Size', 'catch-base' ),
		),
		'disabled' => array(
			'value' => 'disabled',
			'label' => __( 'Disabled', 'catch-base' ),
		),
	);
	return apply_filters( 'catchbase_single_post_image_layout_options', $single_post_image_layout_options );
}


/**
 * Returns list of social icons currently supported
 *
 * @since Catch Base 1.0
*/
function catchbase_get_social_icons_list() {
	$catchbase_social_icons_list = array(
		'facebook_link'		=> array(
			'genericon_class' 	=> 'facebook-alt',
			'label' 			=> esc_html__( 'Facebook', 'catch-base' )
			),
		'twitter_link'		=> array(
			'genericon_class' 	=> 'twitter',
			'label' 			=> esc_html__( 'Twitter', 'catch-base' )
			),
		'googleplus_link'	=> array(
			'genericon_class' 	=> 'googleplus-alt',
			'label' 			=> esc_html__( 'Googleplus', 'catch-base' )
			),
		'email_link'		=> array(
			'genericon_class' 	=> 'mail',
			'label' 			=> esc_html__( 'Email', 'catch-base' )
			),
		'feed_link'			=> array(
			'genericon_class' 	=> 'feed',
			'label' 			=> esc_html__( 'Feed', 'catch-base' )
			),
		'wordpress_link'	=> array(
			'genericon_class' 	=> 'wordpress',
			'label' 			=> esc_html__( 'WordPress', 'catch-base' )
			),
		'github_link'		=> array(
			'genericon_class' 	=> 'github',
			'label' 			=> esc_html__( 'GitHub', 'catch-base' )
			),
		'linkedin_link'		=> array(
			'genericon_class' 	=> 'linkedin',
			'label' 			=> esc_html__( 'LinkedIn', 'catch-base' )
			),
		'pinterest_link'	=> array(
			'genericon_class' 	=> 'pinterest',
			'label' 			=> esc_html__( 'Pinterest', 'catch-base' )
			),
		'flickr_link'		=> array(
			'genericon_class' 	=> 'flickr',
			'label' 			=> esc_html__( 'Flickr', 'catch-base' )
			),
		'vimeo_link'		=> array(
			'genericon_class' 	=> 'vimeo',
			'label' 			=> esc_html__( 'Vimeo', 'catch-base' )
			),
		'youtube_link'		=> array(
			'genericon_class' 	=> 'youtube',
			'label' 			=> esc_html__( 'YouTube', 'catch-base' )
			),
		'tumblr_link'		=> array(
			'genericon_class' 	=> 'tumblr',
			'label' 			=> esc_html__( 'Tumblr', 'catch-base' )
			),
		'instagram_link'	=> array(
			'genericon_class' 	=> 'instagram',
			'label' 			=> esc_html__( 'Instagram', 'catch-base' )
			),
		'polldaddy_link'	=> array(
			'genericon_class' 	=> 'polldaddy',
			'label' 			=> esc_html__( 'PollDaddy', 'catch-base' )
			),
		'codepen_link'		=> array(
			'genericon_class' 	=> 'codepen',
			'label' 			=> esc_html__( 'CodePen', 'catch-base' )
			),
		'path_link'			=> array(
			'genericon_class' 	=> 'path',
			'label' 			=> esc_html__( 'Path', 'catch-base' )
			),
		'dribbble_link'		=> array(
			'genericon_class' 	=> 'dribbble',
			'label' 			=> esc_html__( 'Dribbble', 'catch-base' )
			),
		'skype_link'		=> array(
			'genericon_class' 	=> 'skype',
			'label' 			=> esc_html__( 'Skype', 'catch-base' )
			),
		'digg_link'			=> array(
			'genericon_class' 	=> 'digg',
			'label' 			=> esc_html__( 'Digg', 'catch-base' )
			),
		'reddit_link'		=> array(
			'genericon_class' 	=> 'reddit',
			'label' 			=> esc_html__( 'Reddit', 'catch-base' )
			),
		'stumbleupon_link'	=> array(
			'genericon_class' 	=> 'stumbleupon',
			'label' 			=> esc_html__( 'Stumbleupon', 'catch-base' )
			),
		'pocket_link'		=> array(
			'genericon_class' 	=> 'pocket',
			'label' 			=> esc_html__( 'Pocket', 'catch-base' ),
			),
		'dropbox_link'		=> array(
			'genericon_class' 	=> 'dropbox',
			'label' 			=> esc_html__( 'DropBox', 'catch-base' ),
			),
		'spotify_link'		=> array(
			'genericon_class' 	=> 'spotify',
			'label' 			=> esc_html__( 'Spotify', 'catch-base' ),
			),
		'foursquare_link'	=> array(
			'genericon_class' 	=> 'foursquare',
			'label' 			=> esc_html__( 'Foursquare', 'catch-base' ),
			),
		'twitch_link'		=> array(
			'genericon_class' 	=> 'twitch',
			'label' 			=> esc_html__( 'Twitch', 'catch-base' ),
			),
		'website_link'		=> array(
			'genericon_class' 	=> 'website',
			'label' 			=> esc_html__( 'Website', 'catch-base' ),
			),
		'phone_link'		=> array(
			'genericon_class' 	=> 'phone',
			'label' 			=> esc_html__( 'Phone', 'catch-base' ),
			),
		'handset_link'		=> array(
			'genericon_class' 	=> 'handset',
			'label' 			=> esc_html__( 'Handset', 'catch-base' ),
			),
		'cart_link'			=> array(
			'genericon_class' 	=> 'cart',
			'label' 			=> esc_html__( 'Cart', 'catch-base' ),
			),
		'cloud_link'		=> array(
			'genericon_class' 	=> 'cloud',
			'label' 			=> esc_html__( 'Cloud', 'catch-base' ),
			),
		'link_link'		=> array(
			'genericon_class' 	=> 'link',
			'label' 			=> esc_html__( 'Link', 'catch-base' ),
			),
	);

	return apply_filters( 'catchbase_social_icons_list', $catchbase_social_icons_list );
}


/**
 * Returns an array of metabox layout options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_metabox_layouts() {
	$layout_options = array(
		'default' 	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'default',
			'label' => __( 'Default', 'catch-base' ),
		),
		'left-sidebar' 	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'left-sidebar',
			'label' => __( 'Primary Sidebar, Content', 'catch-base' ),
		),
		'right-sidebar' => array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'right-sidebar',
			'label' => __( 'Content, Primary Sidebar', 'catch-base' ),
		),
		'three-columns'	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'three-columns',
			'label' => __( 'Three Columns ( Secondary Sidebar, Content, Primary Sidebar )', 'catch-base' ),
		),
		'no-sidebar'	=> array(
			'id' 	=> 'catchbase-layout-option',
			'value' => 'no-sidebar',
			'label' => __( 'No Sidebar ( Content Width )', 'catch-base' ),
		),
	);
	return apply_filters( 'catchbase_layouts', $layout_options );
}

/**
 * Returns an array of metabox header featured image options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_metabox_header_featured_image_options() {
	$header_featured_image_options = array(
		'default' => array(
			'id'		=> 'catchbase-header-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catch-base' ),
		),
		'enable' => array(
			'id'		=> 'catchbase-header-image',
			'value' 	=> 'enable',
			'label' 	=> __( 'Enable', 'catch-base' ),
		),
		'disable' => array(
			'id'		=> 'catchbase-header-image',
			'value' 	=> 'disable',
			'label' 	=> __( 'Disable', 'catch-base' )
		)
	);
	return apply_filters( 'header_featured_image_options', $header_featured_image_options );
}


/**
 * Returns an array of metabox featured image options registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_metabox_featured_image_options() {
	$featured_image_options = array(
		'default' => array(
			'id'		=> 'catchbase-featured-image',
			'value' 	=> 'default',
			'label' 	=> __( 'Default', 'catch-base' ),
		),
		'featured' => array(
			'id'		=> 'catchbase-featured-image',
			'value' 	=> 'featured',
			'label' 	=> __( 'Featured Image', 'catch-base' )
		),
		'full' => array(
			'id' => 'catchbase-featured-image',
			'value' => 'full',
			'label' => __( 'Full Image', 'catch-base' )
		),
		'slider' => array(
			'id' => 'catchbase-featured-image',
			'value' => 'slider',
			'label' => __( 'Slider Image', 'catch-base' )
		),
		'disable' => array(
			'id' => 'catchbase-featured-image',
			'value' => 'disable',
			'label' => __( 'Disable Image', 'catch-base' )
		)
	);
	return apply_filters( 'featured_image_options', $featured_image_options );
}


/**
 * Returns catchbase_contents registered for catchbase.
 *
 * @since Catch Base 1.0
 */
function catchbase_get_content() {
	$theme_data = wp_get_theme();

	$catchbase_content['left'] 	= sprintf( _x( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', '1: Year, 2: Site Title with home URL', 'catch-base' ), date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

	$catchbase_content['right']	= esc_attr( $theme_data->get( 'Name') ) . '&nbsp;' . __( 'by', 'catch-base' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_attr( $theme_data->get( 'Author' ) ) .'</a>';

	return apply_filters( 'catchbase_get_content', $catchbase_content );
}


/**
 * Returns the default options for Catch Base dark theme.
 *
 * @since Catch Base 1.0
 */
function catchbase_default_dark_color_options() {
	$default_dark_color_options = array(
		//Basic Color Options
		'background_color'	=> '#111111',
		'header_textcolor'	=> '#dddddd',
	);

	return apply_filters( 'catchbase_default_dark_color_options', $default_dark_color_options );
}