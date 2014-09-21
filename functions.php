<?php

include('jw_custom_posts.php'); 
$animation = new JW_Post_Type('Animation', array(
	'supports' => array('title', 'comments', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
));


$animation->add_taxonomy('Year');
$animation->add_taxonomy('Media');

$animation->add_meta_box('Addinational_info', array(
	'quick_review' => 'textarea'
));

$illustration = new JW_Post_Type('Illustration', array(
	'supports' => array('title', 'comments', 'editor', 'thumbnail', 'excerpt', 'custom-fields')
));


$illustration->add_taxonomy('Year');
$illustration->add_taxonomy('Media');

$illustration->add_meta_box('Addinational_info', array(
	'quick_review' => 'textarea'
));


add_theme_support( 'post-thumbnails' ); 

wp_insert_term( $term, $taxonomy, $args = array() );


add_theme_support( 'post-thumbnails' ); 

?>
