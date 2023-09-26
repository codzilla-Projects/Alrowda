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

        <label for="sh_slider_content_one"><?php _e('العنوان الاول : ','rowda'); ?></label>

        <input type="text"  name="sh_slider_content_one" class="form-control full-wdith" value="<?php echo $sh_slider_content_one; ?>"><br>

    </div>
    
    <div class="form-group mt-3">

        <label for="sh_slider_link_one"><?php _e('رابط  الاول : ','rowda'); ?></label>

        <input type="text"  name="sh_slider_link_one" class="form-control full-wdith" value="<?php echo $sh_slider_link_one; ?>"><br>

    </div>
    
    <div class="form-group mt-3">

        <label for="sh_slider_content_two"><?php _e('العنوان الثاني : ','rowda'); ?></label>

        <input type="text"  name="sh_slider_content_two" class="form-control full-wdith" value="<?php echo $sh_slider_content_two; ?>"><br>

    </div>

    <div class="form-group mt-3">

        <label for="sh_slider_link_two"><?php _e('رابط  الثاني: ','rowda'); ?></label>

        <input type="text"  name="sh_slider_link_two" class="form-control full-wdith" value="<?php echo $sh_slider_link_two; ?>"><br>

    </div>

<?php

}

/********************

Add Date Meta Box To Product CPT

********************/
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">

                <label for="sh_services_link"><?php _e('إضافة ايقونه ','rowda'); ?></label>

                <input type="text"  name="sh_services_link" class="form-control full-wdith" value="<?php echo $sh_services_link; ?>"><br>

            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" class="button button-primary button-large w-100" >لينك الايقونات </a>
            </h2>
        </div>
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


//Register Meta Box
function k_product_meta_box() {

    add_meta_box( 'K-Latest-Product', 'طرق العرض ', 'k_meta_product_callback', 'product', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'k_product_meta_box');
 
//Add field
function k_meta_product_callback( $post ) {
 
    $latest_product = get_post_meta( $post->ID, 'latest_product', true );
    $most_bought    = get_post_meta( $post->ID, 'most_bought', true );
    $is_checked_latest_product = $latest_product === '1' ? 'checked' : '';
    $is_checked_most_bought    = $most_bought === '1' ? 'checked' : '';
    $outline_latest_product = '
    <label for="latest_product" style="width:150px; display:inline-block;">
        <input type="checkbox" name="latest_product" id="latest_product" class="latest_product" value="1" '.$is_checked_latest_product.'/>
       احدث المنتجات 
    </label>';
 
    echo $outline_latest_product;
     $outline_most_bought = '
    <label for="most_bought" style="width:150px; display:inline-block;">
        <input type="checkbox" name="most_bought" id="most_bought" class="most_bought" value="1" '.$is_checked_most_bought.'/>
       المنتجات الاكثر شراءاً
    </label>';
 
    echo $outline_most_bought;
}

function k_save_product_meta( $post_id ) {
 
 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
 
    if($_POST['post_type'] === 'product'){
        if( isset($_POST['latest_product']) ){
            update_post_meta($post_id, 'latest_product', 1);
        }
        else {
            delete_post_meta($post_id, 'latest_product');
        }
    }

     if($_POST['post_type'] === 'product'){
        if( isset($_POST['most_bought']) ){
            update_post_meta($post_id, 'most_bought', 1);
        }
        else {
            delete_post_meta($post_id, 'most_bought');
        }
    }

}
add_action( 'save_post', 'k_save_product_meta' );
