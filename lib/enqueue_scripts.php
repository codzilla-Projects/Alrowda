<?php
function sh_admin_scripts_styles($hook) {
	wp_enqueue_style( 'sh-main', SH_URL . 'assets/admin/css/main-style.css');
	$sh_pages = ['toplevel_page_content-area','%d8%a5%d8%b9%d8%af%d8%a7%d8%af%d8%aa-%d8%a7%d9%84%d9%85%d9%88%d9%82%d8%b9_page_home-page-content','%d8%a5%d8%b9%d8%af%d8%a7%d8%af%d8%aa-%d8%a7%d9%84%d9%85%d9%88%d9%82%d8%b9_page_contact-page-content'];

	if( in_array($hook, $sh_pages) ) {
		wp_enqueue_style( 'sh-bootsrtap', SH_URL . 'assets/admin/css/bootstrap.min.css');
		wp_enqueue_style( 'sh-style', SH_URL . 'assets/admin/css/style.css');
		wp_enqueue_style( 'sh-style-sub', SH_URL . 'assets/admin/css/style-sub.css');
		wp_enqueue_script( 'sh-bootsrtap', SH_URL .'assets/admin/js/bootstrap.min.js', array() ,false, true );
		wp_enqueue_script( 'sh-script', SH_URL .'assets/admin/js/script.js', array() ,false, true );
		if(function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
	}

}
 
add_action('admin_enqueue_scripts', 'sh_admin_scripts_styles');


function ha_scripts_styles() {

    wp_enqueue_style( 'ha-plugins-css', SH_URL . 'assets/css/plugins.css' );
    wp_enqueue_style( 'ha-style-css', SH_URL . 'assets/css/style.css' );
    if(wp_is_mobile()){
        wp_enqueue_style( 'ha-responsive-css', SH_URL . 'assets/css/responsive.css' );
    }
    
 
    
    wp_enqueue_script( 'ha-jquery-js',  SH_URL . 'assets/js/jquery.js' , array() ,false, true );
    wp_enqueue_script( 'ha-bootstrap-js',  SH_URL . 'assets/js/bootstrap.bundle.min.js' , array() ,false, true );
    
    wp_enqueue_script( 'ha-plugins-js',  SH_URL . 'assets/js/plugins.js' , array() ,false, true );
    wp_enqueue_script( 'ha-custom-js',  SH_URL . 'assets/js/custom.js' , array() ,false, true );
    wp_enqueue_script( 'ha-functions-js',  SH_URL . 'assets/js/functions.js' , array() ,false, true );
     if ( is_product() || is_page_template( array( 'page-template.php' ) ) ) {

        wp_enqueue_style( 'ha-ss-css', SH_URL . 'assets/css/ss.css' );
        
    }
     /* Template Main CSS File */     
    // /*if( is_front_page()){*/
    // 	wp_enqueue_style( 'ha-style-css', SH_URL . 'assets/css/style.css' );

    // }else{
    // 	wp_enqueue_style( 'ha-style-sub-css', SH_URL . 'assets/css/style-sub.css' );

    // }

}
add_action( 'wp_enqueue_scripts', 'ha_scripts_styles' );