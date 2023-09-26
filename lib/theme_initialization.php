<?php
add_action( 'init', 'sh_custom_post_types' );
/**********************
** create CPT Types
**********************/
function sh_custom_post_types() {
	
 $cpts = [
    array(
        'single'   => 'السلايدر',
        'plural'   => 'السلايدر',
        'cptname'  => 'slider',
        'supports' => ["title","editor","thumbnail","excerpt"],
        'icon'     => 'dashicons-slides',
        'position' => 4,
        'show_in_menu' => true
        ),
    array(
        'single'   => 'الخدمات',
        'plural'   => 'الخدمات',
        'cptname'  => 'services',
        'supports' => ["title","editor","thumbnail","excerpt"],
        'icon'     => 'dashicons-database-add',
        'position' => 5,
        'show_in_menu' => true
        ),
    array(
        'single'   => 'الفيديوهات',
        'plural'   => 'الفيديوهات',
        'cptname'  => 'videos',
        'supports' => ["title","editor","thumbnail","excerpt"],
        'icon'     => 'dashicons-youtube',
        'position' => 6,
        'show_in_menu' => true
        ),
    array(
        'single'   => 'العملاء',
        'plural'   => 'العملاء',
        'cptname'  => 'cleints',
        'supports' => ["title","editor","thumbnail","excerpt"],
        'icon'     => 'dashicons-admin-users',
        'position' => 7,
        'show_in_menu' => true
        ),
 ];
 foreach ($cpts as $cpt) {

     $labels = array(
        'name'                  => _x( $cpt['single'], 'Post Type General Name', 'rowda' ),
        'singular_name'         => _x( $cpt['single'], 'Post Type Singular Name', 'rowda' ),
        'menu_name'             => __( $cpt['plural'], 'rowda' ),
        'all_items'             => __( 'كل '.$cpt['plural'], 'rowda' ),
        'add_new_item'          => __( 'إضافة جديد '.$cpt['single'] , 'rowda' ),
        'add_new'               => __( 'إضافة ', 'rowda' ),
        'new_item'              => __( 'جديد '.$cpt['single'], 'rowda' ),
        'edit_item'             => __( 'تعديل '.$cpt['single'], 'rowda' ),
        'update_item'           => __( 'تحديث '.$cpt['single'], 'rowda' ),
        'view_item'             => __( 'شاهد '.$cpt['single'], 'rowda' ),
        'search_items'          => __( 'بحث في '.$cpt['plural'], 'rowda' ),
        'not_found'             => __( 'غير موجود ', 'rowda' ),
        'not_found_in_trash'    => __( 'غير موجود في سلة المحذوفات ', 'rowda' ),
        'featured_image'        => __( 'صورة بارزة ', 'rowda' ),
        'set_featured_image'    => __( 'تعيين كصورة مميزة ', 'rowda' ),
        'remove_featured_image' => __( 'إزالة الصورة البارزة ', 'rowda' ),
        'use_featured_image'    => __( 'استخدم الصورة البارزة',  'rowda' ),
      );
      $args = array(
        'label'                 => __( $cpt['plural'], 'rowda' ),
        'description'           => __( $cpt['plural'].' Description', 'rowda' ),
        'labels'                => $labels,
        'supports'              => $cpt['supports'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => $cpt['show_in_menu'],
        'menu_position'         => $cpt['position'],
        'menu_icon'             => $cpt['icon'],
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,    
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
      );
    
    // Register Custom Post Type>
	register_post_type( $cpt['cptname'], $args );

    }   

}


function sh_register_custom_menu_pages() {
    add_menu_page(
        'website options',
        'إعدادت الموقع',
        'manage_options',
        'content-area',
        'main_content_area_callback',
        get_option('sh_logo_light_img'),
        2
    );   
    add_submenu_page(
        'content-area',
        'Home options',
        'إعدادات الصفحة الرئيسية',
        'manage_options',
        'home-page-content',
        'home_page_content_callback'
    );    
      add_submenu_page(
        'content-area',
        'Contact options',
        'اعدادات صفحة  التواصل ',
        'manage_options',
        'contact-page-content',
        'contact_page_content_callback'
    );  
}
function our_library_callback(){

}
add_action( 'admin_menu', 'sh_register_custom_menu_pages' );
require_once ( SH_ROOT . 'custom fields/theme_options.php');
require_once ( SH_ROOT . 'custom fields/home_page_options.php');
require_once ( SH_ROOT . 'custom fields/contact_us_options.php');


register_nav_menus(
    array(
    'main-menu'                 => __( 'Main Menu' ),
    'language'                  => __( 'Switch Language' ),
    'mobile-menu'               => __( 'Mobile Menu' ),
    'footer-menu-one'           => __( 'Footer Menu One' ),
    'footer-menu-second'        => __( 'Footer Menu Second' ),
    )
);


add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_option('sh_logo_img'); ?>);
            width: 100%;
            height: 100px;
            background-size: contain;
            margin: 0 auto;
        }
        .login form{
            background: #262261!important;
        }
        .login label{
            font-weight: 600!important;
            color: #fff!important;
        }
        .wp-core-ui p .button {
            background: #00ADEE;
            border-color: #00ADEE;
        }
        #reg_passmail{color:#fff;}
    </style>
<?php }

function remove_wp_logo($wp_admin_bar) {
  $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'remove_wp_logo', 999);

function change_footer_admin() {
  echo '<span id="footer-thankyou"><a href="https://shwkyfareed.com/" target="_blank">Shawky Fareed</span>';
}
add_filter('admin_footer_text', 'change_footer_admin');

function sh_add_menuclass($items,$args) {
    if ( ($args->menu->slug == 'main-menu-right') || ($args->menu->slug == 'main-menu-left') || ($args->menu->slug == 'mobile-menu') ) {
        $items = preg_replace('/<a/', '<a class="nav-link"', $items);
    }

    return $items;
}
add_filter('wp_nav_menu_items','sh_add_menuclass',10,2);


function admin_bar(){

  if(is_user_logged_in()){
    add_filter( 'show_admin_bar', '__return_true' , 1000 );
  }
}
add_action('init', 'admin_bar' );