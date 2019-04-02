<?php
// Enqueue another style:
// wp_enqueue_style( $handle, $src, $deps, $ver, $media );

//this enqueues the single-style.css
	// wp_enqueue_style( 'style',  get_template_directory_uri() );


//Custom Header
$args = array(
  'flex-width'    => 'true',
  'width'         => 980,
  'flex-height'   => 'true',
	'height'        => 60,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//FUNCTION FOR LOGO IN HEADER
function themename_custom_logo_setup() {
  $defaults = array(
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
      'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

//this adds the ability to create navbars in the dashboard
  register_nav_menus(array (
    'main_menu' => 'MainMenu',
    'footer_menu' => 'Footer'
  ));


//CUSTOM BACKGROUND

$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => 'repeat',
	'default-position-x'     => 'left',
        'default-position-y'     => 'top',
        'default-size'           => 'auto',
	'default-attachment'     => 'scroll',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );

// Allow thumbnails and featured images
  add_theme_support( 'post-thumbnails' );

// Change the base thumbnail size
set_post_thumbnail_size( 50, 50, array( 'center', 'center')  );

// shorten excerpts to x amount of words
function wpdocs_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
 ?>
