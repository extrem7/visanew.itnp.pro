<?php
function footer_enqueue_scripts() {
	remove_action( 'wp_head', 'wp_print_scripts' );
	remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
	remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
	add_action( 'wp_footer', 'wp_print_scripts', 5 );
	add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
	add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
}

add_action( 'after_setup_theme', 'footer_enqueue_scripts' );

function cubiq_setup() {
	remove_action( 'wp_head', 'wp_generator' );                // #1
	remove_action( 'wp_head', 'wlwmanifest_link' );            // #2
	remove_action( 'wp_head', 'rsd_link' );                    // #3
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );        // #4
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );    // #5
	add_filter( 'the_generator', '__return_false' );            // #6
	add_filter( 'show_admin_bar', '__return_false' );            // #7
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // #8
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
}

add_action( 'after_setup_theme', 'cubiq_setup' );
//embed
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
//wpc7
add_filter( 'wpcf7_form_elements', function ( $content ) {
	$content = preg_replace( '/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content );

	return $content;
} );