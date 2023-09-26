<?php 

/*===========================================================*/

function sh_get_videos_alone($no){

    $args = array(

        'post_type'       => 'videos',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'post__not_in'    => array(117),

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_videos($no){

    $args = array(

        'post_type'       => 'videos',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_videos_inner($no){

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'videos',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           =>  $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_video_with_tax($no,$term_id){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(

        'post_type'       => 'videos',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC',

        'tax_query' => array(

            array(

                'taxonomy' => 'video_cat',

                'field' => 'term_id',

                'terms' => $term_id,

            ),

        ),

    );

    return $posts = new WP_Query( $args );    

}



function sh_most_viewed_video($no){

    $args = array(

        'post_type'       => 'videos',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'meta_value_num',

        'meta_key'        => 'sh_post_views',

        'order'           => 'DESC',

    );

    return $posts = new WP_Query( $args );    

}

/*===========================================================*/

function sh_get_services($no){

    $args = array(

        'post_type'       => 'services',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}



function sh_get_services_inner($no){

    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args = array(

        'post_type'       => 'services',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_services_with_tax($no,$term_id){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(

        'post_type'       => 'services',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC',

        'tax_query' => array(

            array(

                'taxonomy' => 'services_cat',

                'field' => 'term_id',

                'terms' => $term_id,

            ),

        ),

    );

    return $posts = new WP_Query( $args );    

}

function sh_most_viewed_services($no){

    $args = array(

        'post_type'       => 'services',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'meta_value_num',

        'meta_key'        => 'sh_post_views',

        'order'           => 'DESC',

    );

    return $posts = new WP_Query( $args );    

}

/*===========================================================*/

function sh_get_cleints($no){

    $args = array(

        'post_type'       => 'cleints',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_cleints_inner($no){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(

        'post_type'       => 'cleints',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_cleints_with_tax($no,$term_id){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(

        'post_type'       => 'cleints',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC',

        'tax_query' => array(

            array(

                'taxonomy' => 'cleints_cat',

                'field' => 'term_id',

                'terms' => $term_id,

            ),

        ),

    );

    return $posts = new WP_Query( $args );    

}

function sh_most_viewed_cleints($no){

    $args = array(

        'post_type'       => 'cleints',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'meta_value_num',

        'meta_key'        => 'sh_post_views',

        'order'           => 'DESC',

    );

    return $posts = new WP_Query( $args );    

}

/*===========================================================*/

function sh_get_slides($no){

    $args = array(

        'post_type'       => 'slider',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'ASC'

    );

    return $posts = new WP_Query( $args );    

}

/*===========================================================*/

function sh_get_post($no){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_post_inner($no){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

function sh_get_post_with_tax($no,$term_id){

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'paged'           => $paged,

        'orderby'         => 'date',

        'order'           => 'DESC',

        'tax_query' => array(

            array(

                'taxonomy' => 'category',

                'field' => 'term_id',

                'terms' => $term_id,

            ),

        ),

    );

    return $posts = new WP_Query( $args );    

}

function sh_most_viewed_post($no){

    $args = array(

        'post_type'       => 'post',

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'meta_value_num',

        'meta_key'        => 'sh_post_views',

        'order'           => 'DESC',

    );

    return $posts = new WP_Query( $args );    

}

/*===========================================================*/

function sh_set_post_views() {

    $key = 'sh_post_views';

    $post_id = get_the_ID();

    $count = (int) get_post_meta( $post_id, $key, true );

    $count++;

    update_post_meta( $post_id, $key, $count );

}



function sh_get_post_views() {

    $count = get_post_meta( get_the_ID(), 'sh_post_views', true );

    return $count;

}

/*===========================================================*/

function get_search_results($no){

    $args = array(

        'post_type'       => array('post','audio','video','fatwa','book','cards','news-ticker'),

        'post_status'     => 'publish',

        'posts_per_page'  =>  $no,

        'orderby'         => 'date',

        'order'           => 'DESC'

    );

    return $posts = new WP_Query( $args );    

}

/*===========================================================*/

function mySearchFilter($articleQuery) {

    if ($articleQuery->is_search ) {

        $articleQuery->set('post_type', array('post','audio','video','fatwa','book','cards','news-ticker') );

    };

    return $articleQuery;

};



add_filter('pre_get_posts','mySearchFilter');