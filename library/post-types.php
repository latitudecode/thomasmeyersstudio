<?php
/**
 * Custom Post Types
 *
 * @package WordPress
 * @subpackage cebo
 * @since Dream Home 1.0
 */
 
///////////////////////////////////////////////////////////////////////////// Custom Post Type

add_action('init', 'project_items');

function project_items()
{
  $labels = array(
    'name' => _x('Rooms', 'post type general name'),
    'singular_name' => _x('Rooms', 'post type singular name'),
    'add_new' => _x('Add New', 'Rooms'),
    'add_new_item' => __('Add New Rooms'),
    'edit_item' => __('Edit Rooms'),
    'new_item' => __('New Rooms'),
    'view_item' => __('View Rooms'),
    'search_items' => __('Search Rooms'),
    'not_found' =>  __('No Rooms found'),
    'not_found_in_trash' => __('No Rooms found in Trash'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'rooms' ),
    'capability_type' => 'post',
    'menu_icon' => get_bloginfo('template_url').'/options/images/icon_team.png',
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','custom-fields','editor','author','excerpt','comments','thumbnail')
  );
  register_post_type('rooms',$args);
}


?>