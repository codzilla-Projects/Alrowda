<?php 
/********************

Add Date Meta Box To slider CPT

********************/

function sh_add_slider_data_meta() {

    add_meta_box( "slider_extra_data","بيانات إضافية" , "sh_slider_data_callback", array('slider'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_slider_data_meta' );



/* Display the post meta box. */

function sh_slider_data_callback( $object, $box ) { 

    $sh_slider_link_one       = esc_attr( get_post_meta( $object->ID, 'sh_slider_link_one', true ) );
    $sh_slider_link_two       = esc_attr( get_post_meta( $object->ID, 'sh_slider_link_two', true ) );
    $sh_slider_content_one    = esc_attr( get_post_meta( $object->ID, 'sh_slider_content_one', true ) );
    $sh_slider_content_two    = esc_attr( get_post_meta( $object->ID, 'sh_slider_content_two', true ) );
?>
<style type="text/css">
    .mt-3{
        margin-top: 10px;
    }
</style>
    <div class="form-group mt-3">

        <label for="sh_slider_link_one"><?php _e('رابط  الاول : ','rowda'); ?></label>

        <input type="text"  name="sh_slider_link_one" class="form-control full-wdith" value="<?php echo $sh_slider_link_one; ?>"><br>

    </div>
    <div class="form-group mt-3">

        <label for="sh_slider_content_one"><?php _e('العنوان الاول : ','rowda'); ?></label>

        <input type="text"  name="sh_slider_content_one" class="form-control full-wdith" value="<?php echo $sh_slider_content_one; ?>"><br>

    </div>

    <div class="form-group mt-3">

        <label for="sh_slider_link_two"><?php _e('رابط  الثاني: ','rowda'); ?></label>

        <input type="text"  name="sh_slider_link_two" class="form-control full-wdith" value="<?php echo $sh_slider_link_two; ?>"><br>

    </div>
    
    <div class="form-group mt-3">

        <label for="sh_slider_content_two"><?php _e('العنوان الثاني : ','rowda'); ?></label>

        <input type="text"  name="sh_slider_content_two" class="form-control full-wdith" value="<?php echo $sh_slider_content_two; ?>"><br>

    </div>

<?php

}
/********************

Add Date Meta Box To sites-directory CPT

********************/

function ha_add_site_data_meta() {

    add_meta_box( "slider_extra_data","رابط الموقع" , "ha_site_data_callback", array('sites-directory'), "normal" );

}

add_action( 'add_meta_boxes', 'ha_add_site_data_meta' );



/* Display the post meta box. */

function ha_site_data_callback( $object, $box ) { 

    $ha_site_link = esc_attr( get_post_meta( $object->ID, 'ha_site_link', true ) );
?>

    <div class="form-group">

        <label for="ha_site_link"><?php _e('رابط الموقع : ','aldeenalkhales'); ?></label>

        <input type="text"  name="ha_site_link" class="form-control full-wdith" value="<?php echo $ha_site_link; ?>"><br>

    </div>

<?php

}
/********************

Add Date Meta Box To srvices CPT

********************/

function sh_add_services_data_meta() {

    add_meta_box( "services_extra_data","Add Icon" , "sh_services_data_callback", array('services'), "normal" );

}

add_action( 'add_meta_boxes', 'sh_add_services_data_meta' );



/* Display the post meta box. */

function sh_services_data_callback( $object, $box ) { 

    $sh_services_link = esc_attr( get_post_meta( $object->ID, 'sh_services_link', true ) );
?>

    <div class="form-group">

        <label for="sh_services_link"><?php _e('Add Icon','rowda'); ?></label>

        <input type="text"  name="sh_services_link" class="form-control full-wdith" value="<?php echo $sh_services_link; ?>"><br>

    </div>

<?php

}



/* Save post meta on the 'save_post' hook. */

add_action( 'save_post', 'sh_save_custom_meta', 10, 2 );

function sh_save_custom_meta($post_id){

    
    if( isset($_POST['sh_slider_link_one']) ){

        update_post_meta($post_id, 'sh_slider_link_one', $_POST['sh_slider_link_one']);

    }

    else

        delete_post_meta($post_id,'sh_slider_link_one');


    if( isset($_POST['sh_slider_content_one']) ){

        update_post_meta($post_id, 'sh_slider_content_one', $_POST['sh_slider_content_one']);

    }

    else

        delete_post_meta($post_id,'sh_slider_content_one');


    if( isset($_POST['sh_slider_link_two']) ){

        update_post_meta($post_id, 'sh_slider_link_two', $_POST['sh_slider_link_two']);

    }

    else

        delete_post_meta($post_id,'sh_slider_link_two');



    if( isset($_POST['sh_slider_content_two']) ){

        update_post_meta($post_id, 'sh_slider_content_two', $_POST['sh_slider_content_two']);

    }

    else

        delete_post_meta($post_id,'sh_slider_content_two');



    if( isset($_POST['sh_services_link']) ){

        update_post_meta($post_id, 'sh_services_link', $_POST['sh_services_link']);

    }

    else

        delete_post_meta($post_id,'sh_services_link');
    
    
    
     if( isset($_POST['ha_site_link']) ){

        update_post_meta($post_id, 'ha_site_link', $_POST['ha_site_link']);

    }

    else

        delete_post_meta($post_id,'ha_site_link');

}





//Register Meta Box
function k_register_meta_box() {

    add_meta_box( 'k-show-homepage', 'Show in Homepage', 'k_meta_box_callback', 'videos', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'k_register_meta_box');
 
//Add field
function k_meta_box_callback( $post ) {
 
    $show_in_homepage = get_post_meta( $post->ID, 'show_in_homepage', true );
    $is_checked = $show_in_homepage === '1' ? 'checked' : '';
    $outline = '
    <label for="show_home_page" style="width:150px; display:inline-block;">
        <input type="checkbox" name="show_home_page" id="show_home_page" class="show_home_page" value="1" '.$is_checked.'/>
        رؤية الفيديو فى الصفحة الرئيسية 
    </label>';
 
    echo $outline;
}

function k_save_post_meta( $post_id ) {
 
 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
 
    if($_POST['post_type'] === 'videos'){
        if( isset($_POST['show_home_page']) ){
            update_post_meta($post_id, 'show_in_homepage', 1);
        }
        else {
            delete_post_meta($post_id, 'show_in_homepage');
        }
    }

}
add_action( 'save_post', 'k_save_post_meta' );


