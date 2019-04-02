<?php
// Enqueue another style:
// wp_enqueue_style( $handle, $src, $deps, $ver, $media );

//this enqueues the single-style.css
	// wp_enqueue_style( 'style',  get_template_directory_uri() );


//this adds the ability to create navbars in the dashboard
  register_nav_menus(array (
    'main_menu' => 'MainMenu',
    'footer_menu' => 'Footer'
  ));

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
