<?php

add_theme_support( 'post-thumbnails' ); 

/*-----------------------------------------------------------------------------------*/
/* Custom post types*/
/*-----------------------------------------------------------------------------------*/

/* PRODUCT */
/* wp_insert_term( $term, $taxonomy, $args = array() ); */

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'acme_product',
        array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
      		'taxonomies' => array('category'),
      		'supports'  =>
            	array( 
            		'title',
                	'comments', 
                	'editor',
                	'thumbnail', 
                	'custom-fields', 
                	'revisions'),            
        )
    );
}

/* GALLERIES */
/* wp_insert_term( $term, $taxonomy, $args = array() ); */


add_action( 'init', 'creates_post_types' );
function creates_post_types() {
  register_post_type( 'galleries',
    array(
      'labels' => array(
        'name' => __( 'Galleries' ),
        'singular_name' => __( 'Gallery' )
      ),
      'public' => true,
      'has_archive' => true,      
      'rewrite' => array('slug' => 'gallery'),
      'supports' => 
      		array(
      			'title',
      			'custom-fields',
      			'editor',
      			'category',
      			'author',
      			'thumbnail'
		)
    )
  );
}

/* EVENTS */
/* wp_insert_term( $term, $taxonomy, $args = array() ); */


add_action( 'init', 'creater_post_typer' );
function creater_post_typer() {
  register_post_type( 'events',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'public' => true,
      'has_archive' => true,      
      'rewrite' => array('slug' => 'event'),
      'supports' => 
      		array(
      			'title',
      			'custom-fields',
      			'editor',
      			'category',
      			'author',
      			'thumbnail'
		)
    )
  );
}


/*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

function remove_admin_menu_items() {
	$remove_menu_items = array(__('Comments'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}

	$remove_menu_items = array(__('Posts'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}

	$remove_menu_items = array(__('Tools'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}

	$remove_menu_items = array(__('Profile'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}

	$remove_menu_items = array(__('Dashboard'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
}

add_action('admin_menu', 'remove_admin_menu_items');


/*-----------------------------------------------------------------------------------*/
/* Adding menu */
/*-----------------------------------------------------------------------------------*/
	

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'thomasmeyersstudio' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'thomasmeyersstudio' ),
	) );

/*-----------------------------------------------------------------------------------*/
/* Adding excerpts */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


?>