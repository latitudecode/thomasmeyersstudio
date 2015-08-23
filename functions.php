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
      'rewrite' => array('slug' => 'galleries'),
      'supports' => 
      		array(
      			'title',
      			'custom-fields',
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
  register_post_type( 'shows',
    array(
      'labels' => array(
        'name' => __( 'Shows' ),
        'singular_name' => __( 'Show' )
      ),
      'public' => true,
      'has_archive' => true,      
      'rewrite' => array('slug' => 'show'),
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
/* META BOXES */
/*-----------------------------------------------------------------------------------*/

/* GALLERY META BOX */

add_action( 'add_meta_boxes', 'cd_meta_box_add' );

function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'Gallery', 'cd_meta_box_cb', 'galleries', 'normal', 'high' );
}

function cd_meta_box_cb()
{
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
    $text = isset( $values['my_meta_box_text2'] ) ? $values['my_meta_box_text2'] : '';
    $text = isset( $values['my_meta_box_text3'] ) ? $values['my_meta_box_text3'] : '';

     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        <label for="my_meta_box_text">City</label>
        <input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $text; ?>" />
    </p>

    <p>
        <label for="my_meta_box_text">State</label>
        <input type="text" name="my_meta_box_text2" id="my_meta_box_text2" value="<?php echo $text; ?>" />
    </p>

    <p>
        <label for="my_meta_box_text">Website</label>
        <input type="text" name="my_meta_box_text3" id="my_meta_box_text3" value="<?php echo $text; ?>" />
    </p>         

    <?php    
}  
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
/*
	$remove_menu_items = array(__('Posts'));
	global $menu;
	end ($menu);
	while (prev($menu)){
		$item = explode(' ',$menu[key($menu)][0]);
		if(in_array($item[0] != NULL?$item[0]:"" , $remove_menu_items)){
		unset($menu[key($menu)]);}
	}
*/

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