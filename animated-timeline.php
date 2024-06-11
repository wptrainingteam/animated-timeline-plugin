<?php
/**
* Plugin Name: Animated Timeline
* Description: Extends the Group block for an animating timeline effect.
* Requires at least: 6.5
* Requires PHP: 7.4
* Version: 1.0.0
* Author: Damon Cook
* License: GPL-2.0-or-later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: animated-timeline
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Registers the custom script and style for the timeline plugin.
 */
function animated_timeline_register_scripts() {

	// Register the custom script to be used later.
	wp_register_script(
		'animated-timeline-script',
		plugin_dir_url( __FILE__ ) . '/assets/scripts/core-blocks/group--animated-timeline.js',
		array(),
		'1.0.0',
		true
	);

	// Register the custom style to be used later.
	wp_register_style(
		'animated-timeline-style',
		plugin_dir_url( __FILE__ ) . '/assets/styles/core-blocks/group--animated-timeline.css',
		array(),
		'1.0.0',
	);
}
add_action( 'wp_enqueue_scripts', 'animated_timeline_register_scripts' );

/**
 * Modify the core Group block.
 *
 * @param string $block_content The block content about to be rendered.
 *
 * @return string               The maybe modified block content.
 */
function animated_timeline_filter_group_content( $block_content ) {
	$processor = new WP_HTML_Tag_Processor( $block_content );
	$counter   = 0;

	// Check for the presence of the 'timeline' class.
	if ( ! $processor->next_tag( array( 'class_name' => 'animated-timeline' ) ) ) {
		return $block_content;
	}

	// Loop through each child block with the class name 'wp-block-column'.
	while ( $processor->next_tag( array( 'class_name' => 'wp-block-column' ) ) ) {
		$processor->add_class( 'animated__item' );
		++$counter;

		switch ( $counter ) {
			case 1:
				$processor->add_class( 'animated__item--first' );
				break;
			case 2:
				$processor->add_class( 'animated__item--line' );
				break;
			case 3:
				$processor->add_class( 'animated__item--last' );
				$counter = 0;
				break;
		}
	}

	$block_content = $processor->get_updated_html();

	// Enqueue the custom script and style.
	wp_enqueue_script( 'animated-timeline-script' );
	wp_enqueue_style( 'animated-timeline-style' );

	// Return the maybe modified block content.
	return $block_content;
}
add_filter( 'render_block_core/group', 'animated_timeline_filter_group_content', 10 );

/**
 * Registers a block pattern for the timeline plugin.
 *
 * This function registers a block pattern for the timeline plugin. It checks if the pattern file exists and then registers the pattern using the `register_block_pattern` function.
 */
function animated_timeline_register_block_pattern() {
	$pattern_file = plugin_dir_path( __FILE__ ) . '/patterns/animated-timeline.php';

	if ( ! file_exists( $pattern_file ) ) {
		return;
	}

	register_block_pattern(
		'animated-timeline/animated-timeline',
		require $pattern_file
	);
}
add_action( 'init', 'animated_timeline_register_block_pattern' );
