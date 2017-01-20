<?php
/**
 * The template for displaying the Slider
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


if ( !function_exists( 'catchbase_featured_slider' ) ) :
/**
 * Add slider.
 *
 * @uses action hook catchbase_before_content.
 *
 * @since Catch Base 1.0
 */
function catchbase_featured_slider() {
	global $post, $wp_query;
	//catchbase_flush_transients();
	// get data value from options
	$options 		= catchbase_get_theme_options();
	$enableslider 	= $options['featured_slider_option'];
	$sliderselect 	= $options['featured_slider_type'];
	$imageloader	= isset ( $options['featured_slider_image_loader'] ) ? $options['featured_slider_image_loader'] : 'true';

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	if ( 'entire-site' == $enableslider || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enableslider ) ) {
		if ( ( !$catchbase_featured_slider = get_transient( 'catchbase_featured_slider' ) ) ) {
			echo '<!-- refreshing cache -->';

			$catchbase_featured_slider = '
				<section id="feature-slider">
					<div class="wrapper">
						<div class="cycle-slideshow"
						    data-cycle-log="false"
						    data-cycle-pause-on-hover="true"
						    data-cycle-swipe="true"
						    data-cycle-auto-height=container
						    data-cycle-fx="'. esc_attr( $options['featured_slide_transition_effect'] ) .'"
							data-cycle-speed="'. esc_attr( $options['featured_slide_transition_length'] ) * 1000 .'"
							data-cycle-timeout="'. esc_attr( $options['featured_slide_transition_delay'] ) * 1000 .'"
							data-cycle-loader="'. esc_attr( $imageloader ) .'"
							data-cycle-slides="> article"
							>

						    <!-- prev/next links -->
						    <div class="cycle-prev"></div>
						    <div class="cycle-next"></div>

						    <!-- empty element for pager links -->
	    					<div class="cycle-pager"></div>';

							// Select Slider
							if ( 'demo-featured-slider' == $sliderselect && function_exists( 'catchbase_demo_slider' ) ) {
								$catchbase_featured_slider .=  catchbase_demo_slider( $options );
							}
							elseif ( 'featured-page-slider' == $sliderselect && function_exists( 'catchbase_page_slider' ) ) {
								$catchbase_featured_slider .=  catchbase_page_slider( $options );
							}

			$catchbase_featured_slider .= '
						</div><!-- .cycle-slideshow -->
					</div><!-- .wrapper -->
				</section><!-- #feature-slider -->';

			set_transient( 'catchbase_featured_slider', $catchbase_featured_slider, 86940 );
		}
		echo $catchbase_featured_slider;
	}
}
endif;
add_action( 'catchbase_before_content', 'catchbase_featured_slider', 10 );


if ( ! function_exists( 'catchbase_demo_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from customizer options
 *
 * @since Catch Base 1.0
 *
 */
function catchbase_demo_slider( $options ) {
	$output ='
			<article class="post hentry slides demo-image displayblock">
				<figure class="slider-image">
					<a title="Slider Image 1" href="'. esc_url( home_url( '/' ) ) .'">
						<img src="'.get_template_directory_uri().'/images/gallery/slider1-1200x514.jpg" class="wp-post-image" alt="Slider Image 1" title="Slider Image 1">
					</a>
				</figure>
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="Slider Image 1" href="#"><span>Slider Image 1</span></a>
						</h1>
					</header>
					<div class="entry-content">
						<p>Slider Image 1 Content</p>
					</div>
				</div>
			</article><!-- .slides -->

			<article class="post hentry slides demo-image displaynone">
				<figure class="Slider Image 2">
					<a title="Slider Image 2" href="'. esc_url( home_url( '/' ) ) .'">
						<img src="'. get_template_directory_uri() . '/images/gallery/slider2-1200x514.jpg" class="wp-post-image" alt="Slider Image 2" title="Slider Image 2">
					</a>
				</figure>
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="Slider Image 2" href="#"><span>Slider Image 2</span></a>
						</h1>
					</header>
					<div class="entry-content">
						<p>Slider Image 2 Content</p>
					</div>
				</div>
			</article><!-- .slides -->';
	return $output;
}
endif; // catchbase_demo_slider


if ( ! function_exists( 'catchbase_page_slider' ) ) :
/**
 * This function to display featured page slider
 *
 * @param $options: catchbase_theme_options from customizer
 *
 * @since Catch Base 1.0
 */
function catchbase_page_slider( $options ) {
	$quantity		= absint( $options['featured_slide_number'] );

	global $post;

    $output 				= '';
    $number_of_page 		= 0; 		// for number of pages
	$page_list				= array();	// list of valid page ids

	//Get number of valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_slider_page_' . $i] ) && $options['featured_slider_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_slider_page_' . $i] ) );
		}

	}

	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
			'posts_per_page'	=> $quantity,
			'post_type'			=> 'page',
			'post__in'			=> $page_list,
			'orderby' 			=> 'post__in'
		));
		$i=0;

		while ( $get_featured_posts->have_posts()) {
			$get_featured_posts->the_post();

			$i++;

			$title_attribute =the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-base' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			if ( $i == 1 ) { $classes = 'page pageid-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'page pageid-'.$post->ID.' hentry slides displaynone'; }
			$output .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
				if ( has_post_thumbnail() ) {
					$output .= '<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-base' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">
						'. get_the_post_thumbnail( $post->ID, 'catchbase_slider', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class'	=> 'attached-page-image' ) ).'
					</a>';
				}
				else {
					//Default value if there is no first image
					$catchbase_image = '<img class="pngfix wp-post-image" src="'.get_template_directory_uri().'/images/gallery/no-featured-image-1200x514.jpg" >';

					//Get the first image in page, returns false if there is no image
					$catchbase_first_image = catchbase_get_first_image( $post->ID, 'medium', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'attached-page-image' ) );

					//Set value of image as first image if there is an image present in the page
					if ( '' != $catchbase_first_image ) {
						$catchbase_image =	$catchbase_first_image;
					}

					$output .= '<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-base' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">
						'. $catchbase_image .'
					</a>';
				}

				$output .= '
				</figure><!-- .slider-image -->
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title">
							<a title="' . the_title_attribute( array( 'before' => __( 'Permalink to:', 'catch-base' ), 'echo' => false ) ) . '" href="' . get_permalink() . '">'.the_title( '<span>','</span>', false ).'</a>
						</h1>
						<div class="assistive-text">'.catchbase_page_post_meta().'</div>
					</header>';
					if ( $excerpt !='') {
						$output .= '<div class="entry-content">'. $excerpt.'</div>';
					}
					$output .= '
				</div><!-- .entry-container -->
			</article><!-- .slides -->';
		}

		wp_reset_query();
  	}
	return $output;
}
endif; // output