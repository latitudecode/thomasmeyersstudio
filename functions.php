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

/* SHOWS */
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
            'category',
            'author',
            'thumbnail'
		)
    )
  );
}

/* FAVS */

add_action( 'init', 'creater_post_typerr' );
function creater_post_typerr() {
  register_post_type( 'favorites',
    array(
      'labels' => array(
        'name' => __( 'Favorites' ),
        'singular_name' => __( 'Favorite' )
      ),
      'public' => true,
      'has_archive' => true,      
      'rewrite' => array('slug' => 'favortie'),
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

/* SLIDES */

add_action( 'init', 'creater_post_type_slides' );
function creater_post_type_slides() {
  register_post_type( 'slides',
    array(
      'labels' => array(
        'name' => __( 'Slides' ),
        'singular_name' => __( 'Slide' )
      ),
      'public' => true,
      'has_archive' => true,      
      'rewrite' => array('slug' => 'slide'),
      'supports' => 
          array(
            'title',
            'custom-fields',
            'category',
            'author',
            'thumbnail',
            'post-formats',
            'page-attributes'
    )
    )
  );
}

/*-----------------------------------------------------------------------------------*/
/* META BOXES */
/*-----------------------------------------------------------------------------------*/

/* ============================== */
/* POST META BOX #1  -- GALLERIES */
/* ============================== */

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setup' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setup() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxes' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_meta', 10, 2 );
}

function smashing_add_post_meta_boxes() {

  add_meta_box(
    'smashing-post-class',      // Unique ID
    esc_html__( 'City', 'example' ),    // Title
    'smashing_post_class_meta_box',   // Callback function
    'galleries',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_box( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-class"><?php _e( "City in which the gallery is located", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-class" id="smashing-post-class" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_class', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_meta( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-class'] ) ? sanitize_html_class( $_POST['smashing-post-class'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_class';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_class' );

function smashing_post_class( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_class', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = sanitize_html_class( $post_class );
  }

  return $classes;
}

/* =============================== */
/* POST META BOX #2 -- GALLERIES   */
/* =============================== */

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setupp' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setupp' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setupp() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxess' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_metaa', 10, 2 );
}

function smashing_add_post_meta_boxess() {

  add_meta_box(
    'smashing-post-classs',      // Unique ID
    esc_html__( 'State', 'example' ),    // Title
    'smashing_post_class_meta_boxx',   // Callback function
    'galleries',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_boxx( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-classs"><?php _e( "State in which the gallery is located", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-classs" id="smashing-post-classs" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_classs', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_metaa( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-classs'] ) ? sanitize_html_class( $_POST['smashing-post-classs'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_classs';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_classs' );

function smashing_post_classs( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_classs', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = sanitize_html_class( $post_class );
  }

  return $classes;
}


/* =============================== */
/* POST META BOX #3 -- GALLERIES */
/* =============================== */

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setuppp' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setuppp' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setuppp() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxesss' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_metaaa', 10, 2 );
}

function smashing_add_post_meta_boxesss() {

  add_meta_box(
    'smashing-post-classss',      // Unique ID
    esc_html__( 'Website', 'example' ),    // Title
    'smashing_post_class_meta_boxxx',   // Callback function
    'galleries',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_boxxx( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-classss"><?php _e( "Link to Gallery's website (Only place the domain name ei. google or facebook)", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-classss" id="smashing-post-classss" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_classss', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_metaaa( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-classss'] ) ? sanitize_html_class( $_POST['smashing-post-classss'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_classss';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_classss' );

function smashing_post_classss( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_classss', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = sanitize_html_class( $post_class );
  }

  return $classes;
}

/* =============================== */
/* POST META BOX #1 -- SHOWS */
/* =============================== */

/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setupppp' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setupppp' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setupppp() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxessss' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_metaaaa', 10, 2 );
}

function smashing_add_post_meta_boxessss() {

  add_meta_box(
    'smashing-post-classsss',      // Unique ID
    esc_html__( 'City', 'example' ),    // Title
    'smashing_post_class_meta_boxxxx',   // Callback function
    'shows',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_boxxxx( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-classsss"><?php _e( "Place name of city here", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-classsss" id="smashing-post-classsss" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_classsss', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_metaaaa( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-classsss'] ) ? esc_html( $_POST['smashing-post-classsss'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_classsss';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_classsss' );

function smashing_post_classsss( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_classsss', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = esc_html( $post_class );
  }

  return $classes;
}

/* =============================== */
/* POST META BOX #2 -- SHOWS */
/* =============================== */


/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setuppppp' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setuppppp' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setuppppp() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxesssss' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_metaaaaa', 10, 2 );
}

function smashing_add_post_meta_boxesssss() {

  add_meta_box(
    'smashing-post-classssss',      // Unique ID
    esc_html__( 'Dates of show', 'example' ),    // Title
    'smashing_post_class_meta_boxxxxx',   // Callback function
    'shows',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_boxxxxx( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-classssss"><?php _e( "Place dates of show here", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-classssss" id="smashing-post-classssss" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_classssss', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_metaaaaa( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-classssss'] ) ? esc_html( $_POST['smashing-post-classssss'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_classssss';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_classssss' );

function smashing_post_classssss( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_classssss', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = esc_html( $post_class );
  }

  return $classes;
}

/* =============================== */
/* POST META BOX #3 -- SHOWS */
/* =============================== */


/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setupppppp' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setupppppp' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setupppppp() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxessssss' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_metaaaaaa', 10, 2 );
}

function smashing_add_post_meta_boxessssss() {

  add_meta_box(
    'smashing-post-classsssss',      // Unique ID
    esc_html__( 'Website', 'example' ),    // Title
    'smashing_post_class_meta_boxxxxxx',   // Callback function
    'shows',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_boxxxxxx( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-classsssss"><?php _e( "Place website here (note: don't need to place www. or .com)", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-classsssss" id="smashing-post-classsssss" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_classsssss', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_metaaaaaa( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-classsssss'] ) ? esc_html( $_POST['smashing-post-classsssss'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_classsssss';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_classsssss' );

function smashing_post_classsssss( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_classsssss', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = esc_html( $post_class );
  }

  return $classes;
}



/* ============================================= */
/* POST META BOX #1 -- PARTIAL LIST OF FAVORITES */
/* ============================================= */


/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'smashing_post_meta_boxes_setuppppppp' );
add_action( 'load-post-new.php', 'smashing_post_meta_boxes_setuppppppp' );


/* Meta box setup function. */
function smashing_post_meta_boxes_setuppppppp() {

  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'smashing_add_post_meta_boxesssssss' );

   /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'smashing_save_post_class_metaaaaaaa', 10, 2 );
}

function smashing_add_post_meta_boxesssssss() {

  add_meta_box(
    'smashing-post-classssssss',      // Unique ID
    esc_html__( 'Website', 'example' ),    // Title
    'smashing_post_class_meta_boxxxxxxx',   // Callback function
    'favorites',         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}


/* Display the post meta box. */
function smashing_post_class_meta_boxxxxxxx( $object, $box ) { ?>

  <?php wp_nonce_field( basename( __FILE__ ), 'smashing_post_class_nonce' ); ?>

  <p>
    <label for="smashing-post-classssssss"><?php _e( "Place website here (note: don't need to place www. or .com)", 'example' ); ?></label>
    <br />
    <input class="widefat" type="text" name="smashing-post-classssssss" id="smashing-post-classssssss" value="<?php echo esc_attr( get_post_meta( $object->ID, 'smashing_post_classssssss', true ) ); ?>" size="30" />
  </p>


<?php }

/* Save the meta box's post metadata. */
function smashing_save_post_class_metaaaaaaa( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['smashing_post_class_nonce'] ) || !wp_verify_nonce( $_POST['smashing_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['smashing-post-classssssss'] ) ? esc_html( $_POST['smashing-post-classssssss'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'smashing_post_classssssss';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

/* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'smashing_post_classssssss' );

function smashing_post_classssssss( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'smashing_post_classssssss', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = esc_html( $post_class );
  }

  return $classes;
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
    'tertiary' => __( 'mosaic filter page menu', 'thomasmeyersstudio' ),
    'archive' => __( 'archive menu', 'thomasmeyersstudio' ),

	) );

/*-----------------------------------------------------------------------------------*/
/* Adding excerpts */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


?>