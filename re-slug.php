<?php
/*
Plugin Name: Re-slug Updated
Plugin URI: https://github.com/lukecav/re-slug
Description: Regenerate the post permalink after changing the title
Author: Luke Cavanagh
Author URI: https://profiles.wordpress.org/lukecavanagh
Version: 1.1
*/

function add_reslug_button ($return) {
	// Add Re-slug button after Edit buton
	$return = str_replace('Edit</button>', 'Edit</button> <button type="button" id="re-slug" class="edit-slug button button-small hide-if-no-js" style="display:inherit;"><a href="#re-slug">Re-slug</a></button>', $return);
	return $return;	
}

add_filter( 'get_sample_permalink_html', 'add_reslug_button', 10, 1 );


function enqueue_reslug_script($hook) {
    if( 'post.php' != $hook && 'post-new.php' != $hook )
        return;
    wp_enqueue_script( 'reslug', plugin_dir_url( __FILE__ ) . '/re-slug.js' );
}
add_action( 'admin_enqueue_scripts', 'enqueue_reslug_script' );
