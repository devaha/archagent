<?php
/*
Plugin Name: Archagent Posts
Description: Custom Post Types for the ArchAgent website.
Author: Aha! Digital Marketing + Design
Author URI: http://www.getaha.com
*/

add_action( 'init', 'archagent_posts' );

function archagent_posts() {

register_post_type( 'FAQ', array(
  'labels' => array(
    'name' => 'FAQs',
    'all_items' => 'All FAQs',
    'singular_name' => 'FAQ',
    'add_new' => 'Add FAQ',
    'add_new_item' => 'Add New Product FAQ Page',
   ),
  'description' => 'FAQ for a particular Archagent Product or Bundle',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'custom-fields' ),
	'has_archive' => true,
	'rewrite' => array('slug' => 'faq'),
	'menu_icon'   => 'dashicons-awards'
));

register_post_type( 'Quickstart Guide', array(
  'labels' => array(
    'name' => 'Quickstart Guides',
    'all_items' => 'All Quickstart Guides',
    'singular_name' => 'Quickstart Guide',
    'add_new' => 'Add Quickstart Guide',
    'add_new_item' => 'Add New Product Quickstart Guide',
   ),
  'description' => 'FAQ for a particular Archagent Product or Bundle',
  'public' => true,
  'menu_position' => 20,
  'supports' => array( 'title', 'custom-fields' ),
  	'has_archive' => true,
	'rewrite' => array('slug' => 'quickstart-guide'),
	'menu_icon'   => 'dashicons-clipboard'
));

}

/*
add_action( 'init', 'wpmudev_register_taxonomy' );

// register two taxonomies to go with the post type
function wpmudev_register_taxonomy() {
// set up labels
$labels = array(
'name' => 'Products',
'singular_name' => 'Product',
'search_items' => 'Search Products',
'all_items' => 'All Products',
'edit_item' => 'Edit Product',
'update_item' => 'Update Product',
'add_new_item' => 'Add New Product',
'new_item_name' => 'New Product',
'menu_name' => 'Products'
);
// register taxonomy
register_taxonomy( 'productcat', 'faq', array(
'hierarchical' => true,
'labels' => $labels,
'query_var' => true,
'show_admin_column' => true
) );
} */