<?php 

error_reporting(1);

define('SH_ROOT', get_template_directory() . '/');

define('SH_URL', get_template_directory_uri() . '/');

define('SH_ADMIN', admin_url());

define('SH_BlogUrl', get_bloginfo('url'));


add_theme_support( 'post-thumbnails' );
add_image_size( 'blog-size', 525, 350, true ); 


require_once ( SH_ROOT . 'lib/theme_initialization.php');

require_once ( SH_ROOT . 'lib/meta.php');

require_once ( SH_ROOT . 'lib/taxonomy.php');

require_once ( SH_ROOT . 'lib/enqueue_scripts.php');

require_once ( SH_ROOT . 'lib/ajax_functions.php');

require_once ( SH_ROOT . 'lib/sh_functions.php');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function prefix_modify_nav_menu_args( $args ) {
    return array_merge( $args, array(
        'walker' => new WP_Bootstrap_Navwalker(),
    ) );
}
add_filter( 'wp_nav_menu_args', 'prefix_modify_nav_menu_args' );
function rowda_menu() {

wp_nav_menu( array(
      'theme_location'    => 'main-menu',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'bs-example-navbar-collapse-1',
      'menu_class'        => 'navbar-nav',
      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
      'walker'            => new WP_Bootstrap_Navwalker(),
  ) );

}
function language_menu() {
wp_nav_menu( array(
      'theme_location'    => 'language',
      'depth'             => 2,
      'menu_class'        => 'p-dropdown-content',
  ) );

}

function rawda_widgets_init() {

  register_sidebar( array(
    'name'          => 'First Footer Column',
    'id'            => 'first_footer',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
  ) );

}
add_action( 'widgets_init', 'rawda_widgets_init' );

// Change the Number of WooCommerce Products Displayed Per Page
add_filter( 'loop_shop_per_page', 'lw_loop_shop_per_page', 30 );

function lw_loop_shop_per_page( $products ) {
 $products = 4;
 return $products;
}
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
unset($fields['billing']['billing_last_name']);
unset($fields['billing']['billing_company']);
unset($fields['billing']['billing_address_2']);
unset($fields['billing']['billing_city']);
unset($fields['billing']['billing_postcode']);
$fields['billing']['billing_first_name']['label'] = 'الاسم بالكامل ';
 $fields['billing']['billing_first_name']['placeholder'] = 'الاسم بالكامل '; 
 
return $fields;
}