<?php

add_theme_support( 'post-thumbnails' ); 

wp_insert_term( $term, $taxonomy, $args = array() );


add_action( 'init', 'create_posttype' );
function create_posttype() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Project' ),
        'singular_name' => __( 'Project' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'portfolio'),
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



?>