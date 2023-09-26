<?php get_header(); ?>
        <!-- Inspiro Slider -->

        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360" data-animate-delay="100" data-animate="fadeInUp">

            <!-- Slide 1 -->

            <?php $slides = sh_get_slides(4);

                if($slides->have_posts()) : 

                ?>

                <?php while($slides->have_posts()) : $slides->the_post(); ?>

            <div class="slide kenburns" style="background-image: url(<?php the_post_thumbnail_url();  ?>)">

<!--                <div class="bg-overlay"></div>-->

                <div class="container">

                    <div dir="rtl" class="slide-captions text-center text-light">

                        <!-- Captions -->

                        <span class="strong">

                            <?php the_title(); ?>

                        </span>

                        <h2 class="text-dark text-center"> <?php the_content(); ?></h2>
                        <?php $link_one       = get_post_meta(get_the_ID(),'sh_slider_link_one',true); 
                              $content_one    = get_post_meta(get_the_ID(),'sh_slider_content_one',true); 
                            if(!empty($link_one)||($content_one)) :
                        ?>
                        <a class="btn" href="<?=$link_one ?>"><?=$content_one ?></a>
                        <?php endif; ?>
                        <?php $link_two = get_post_meta(get_the_ID(),'sh_slider_link_two',true); 
                              $content_two    = get_post_meta(get_the_ID(),'sh_slider_content_two',true); 
                            if(!empty($link_two)||($content_two)) :
                        ?>
                        <a href="<?=$link_two ?>" class="btn btn-light"><?=$content_two?></a>
                        <?php endif; ?>

                        <!-- end: Captions -->

                    </div>

                </div>

            </div>

        <?php endwhile;?>

        <?php wp_reset_query(); ?>

        <?php endif ?>

            <!-- end: Slide 1 -->
        </div>

        <!--end: Inspiro Slider -->

        <!-- SERVICES -->

        <section id="services">

            <div class="container">

                <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                    <h2><?=get_option('home_sec_one_title');?></h2>

                    <p><?=get_option('home_sec_one_content');?>

                    </p>

                </div>

                <div dir="rtl"  class="row">

                <?php $no=get_option('home_sec_one_number');?>

                <?php $services = sh_get_services($no);

                if($services->have_posts()) : 

                ?>

                <?php while($services->have_posts()) : $services->the_post(); ?>

                    <div  class="col-lg-4" data-animate="fadeInUp" data-animate-delay="0">

                        <div class="icon-box effect medium border small">

                            <div class="icon">
                                <?php 
                                $service_icon = get_post_meta(get_the_ID(),'sh_services_link',true);
                                if(empty($service_icon)) $service_icon ='fa-cogs'; 
                                    ?>
                                <a href="<?php the_permalink();?>" target="_blank"><i class="fa <?= $service_icon;  ?>"></i></a>

                            </div>

                            <h3><a href="<?php the_permalink();?>" target="_blank"><?php the_title(); ?></a></h3>

                            <?php the_excerpt(); ?>

                        </div>

                    </div>

                    <?php endwhile;?>

                    <?php wp_reset_query(); ?>

                    <?php endif ?>

                </div>

            </div>

        </section>

        <!-- end: SERVICES -->



        <!-- Shop products -->

        <section class="background-grey">

            <div class="container">

                <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                    <h2><?=get_option('home_sec_two_title');?></h2>

                </div>

                <!--Product list-->

                <div class="shop">

                    <div dir="rtl" class="row">

                        <?php

                        $no=get_option('home_sec_two_number');

                        $params = array(

                                'post_type'         => 'product',

                                'posts_per_page'    => $no,

                                'post_status'       => 'publish',

                                'orderby'           => 'post_date',

                                'meta_key'          => array('latest_product','most_bought'),

                                'meta_value'        => '1',

                                'order'             => 'DESC',

                                'tax_query' => array(
                                    array(

                                        'taxonomy' => 'product_cat',

                                        'field'    => 'term_id',

                                        'terms'    => get_option('home_sec_two_products'),

                                    ),
                                ),

                            );

                        $wc_query = new WP_Query($params);



                        ?>

                        <?php if ($wc_query->have_posts()) : ?>

                        <?php while ($wc_query->have_posts()) :

                        $wc_query->the_post(); ?>

                        <div class="col-lg-3" data-animate="fadeInUp" data-animate-delay="0">

                            <div class="product">

                                <div class="product-image">

                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>

                                    </a>

                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>

                                    </a>

                                    <span class="product-hot">جديد </span>

                                    <span class="product-wishlist">
                                         <?php
                                            echo apply_filters(
                                                'woocommerce_loop_add_to_cart_link',
                                                sprintf(
                                                    '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s"><i class="fa fa-shopping-cart"></i></a>',
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( $product->get_id() ),
                                                    esc_attr( $product->get_sku() ),
                                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                    esc_attr( $product->product_type ),
                                                    esc_html( $product->add_to_cart_text() )
                                                ),
                                                $product
                                            );?>

                                    </span>

                                    <div class="product-overlay">

                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة المنتج </a>

                                    </div>

                                </div>



                                <div class="product-description"> 

                                    <div class="product-title">

                                        <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo wp_trim_words( get_the_title(),6, ' ...' );?></a></h3>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="product-category">

                                        <?php

                                            if (has_term('uncategorized', 'product_cat')) {

                                                echo '';

                                            }else{
                                                
                                                $product_cats = $product->get_categories();
                                                $shstrpos = strpos($product_cats, ',');
                                                if($shstrpos !== false) ++$shstrpos; 
                                                echo '<i class="fa fa-tag" aria-hidden="true"></i>' .substr($product_cats,$shstrpos);
                                            }

                                        ?>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-price">
                                                <ins><?php echo $product->get_price_html(); ?></ins>
                                            </div>
                                        </div>
                                    </div>                                  

                                </div>

                            </div>

                        </div> 

                         <?php endwhile; ?>

                         <?php wp_reset_postdata(); ?>

                         <?php else:  ?>

                         <li>

                              <?php _e( 'No Products' ); ?>

                         </li>

                         <?php endif; ?>

                    </div>

                </div>

            </div>

        </section>

        <!-- end: Shop products -->

        <!-- Post item Vimeo-->

        <section>

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                            <h2><?=get_option('home_sec_three_title');?></h2>

                            <p><?=get_option('home_sec_three_content');?></p>

                        </div>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8 offset-md-2" data-animate="fadeInUp" data-animate-delay="0">
                        <?php $video = sh_get_videos(1);

                            if($video->have_posts()) : 

                        ?>
                        <div class="post-item border">
                            <div class="post-item-wrap">
                                <?php while($video->have_posts()) : $video->the_post(); ?>
                                    <div class="post-video">
                                        <?php the_content()?>
                                        <h3 class="ha_video_title"><?php the_title(); ?></h3>

                                    </div>
                                    <?php endwhile;?>
                            </div>
                        </div>
                        <?php wp_reset_query(); ?>

                        <?php endif ?>
                    </div>
                </div> 

                <?php $video = sh_get_videos_alone(3);

                if($video->have_posts()) : 

                ?>

                <div class="post-item border">

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="row">
                                <?php while($video->have_posts()) : $video->the_post(); ?>
                                
                                <div class="col-lg-4 col-md-4 col-sm-4 pr-2 pl-2 post-video" data-animate="fadeInUp" data-animate-delay="0">

                                    <?php the_content()?>

                                    <h4 class="ha_video_title"><?php the_title(); ?></h4>
                                </div>
                                
                                <?php endwhile;?>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5" data-animate="fadeInUp" data-animate-delay="0">

                        <a href="<?php echo get_permalink(112); ?>">

                            <button type="button" class="btn btn-rounded btn-reveal"><i class="icon-chevron-left"></i><span>المزيد من الفيديوهات </span></button>

                        </a>

                    </div>

                </div>

                <?php wp_reset_query(); ?>

                <?php endif ?>

            </div>

        </section>

        <!-- end: Post item Vimeo-->

        <!-- Post SHOP CATEGORIES -->

        

       <section class="background-grey">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12">

                        <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                            <h2><?=get_option('home_sec_four_title');?></h2>

                            <p><?=get_option('home_sec_four_content');?></p>

                        </div>

                    </div>

                </div>



                <div class="shop-category">



                    <div dir="rtl" class="row">

                        <?php $terms = get_terms( array(
                            'taxonomy'      => 'product_cat',
                            'hide_empty'    => false,
                            'orderby'       => 'ID',
                            'order'         => 'ASC',
                            'hide_empty'    => true,
                            'exclude'       => array('15'),
                            ) 
                            ); 
                        ?>

                        <?php foreach ($terms as $term) {

                        $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 

                            // get the image URL

                            $image = wp_get_attachment_url( $thumbnail_id );  ?>

                        <div class="col-lg-3" data-animate="fadeInUp" data-animate-delay="0">

                            <div class="shop-category-box">

                                <a href="<?= SH_BlogUrl.'/product-category/'.$term->slug; ?>"><img alt="" src="<?php echo $image; ?>">

                                    <div class="shop-category-box-title text-center">

                                        <h6><?= $term->name; ?></h6><small dir="rtl"> <span><?= $term->count; ?></span> <span>منتج  </span></small>

                                    </div>

                                </a>

                            </div>

                        </div>

                         <?php } ?>

                    </div>



                </div>

            </div>

        </section>

        <!-- end: SHOP CATEGORIES -->

        <!-- Shop products CAROUSEL -->

        <section>

            <div  class="container">

                <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                    <h2><?=get_option('home_sec_five_title');?></h2>

                </div>

                <div dir="rtl" class="carousel shop-products" data-margin="20" data-dots="false" data-animate="fadeInUp" data-animate-delay="0">

                    <?php

                        $no=get_option('home_sec_five_number');

                       $params = array(

                                'post_type'         => 'product',

                                'posts_per_page'    => $no,

                                'post_status'       => 'publish',

                                'orderby'           => 'post_date',

                                'order'             => 'DESC',

                                'tax_query' => array(
                                    array(

                                        'taxonomy' => 'product_cat',

                                        'field'    => 'term_id',

                                        'terms'    => get_option('home_sec_five_products'),

                                    ),
                                ),

                            );

                        $wc_query = new WP_Query($params);



                        ?>

                        <?php if ($wc_query->have_posts()) : ?>

                        <?php while ($wc_query->have_posts()) :

                        $wc_query->the_post(); ?>

                            <div class="product">

                                <div class="product-image">

                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>

                                    </a>

                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?>

                                    </a>

                                    <span class="product-hot">جديد</span>

                                    <span class="product-wishlist">

                                       <?php
                                            echo apply_filters(
                                                'woocommerce_loop_add_to_cart_link',
                                                sprintf(
                                                    '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s"><i class="fa fa-shopping-cart"></i></a>',
                                                    esc_url( $product->add_to_cart_url() ),
                                                    esc_attr( $product->get_id() ),
                                                    esc_attr( $product->get_sku() ),
                                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                                    esc_attr( $product->product_type ),
                                                    esc_html( $product->add_to_cart_text() )
                                                ),
                                                $product
                                            );?>

                                    </span>

                                    <div class="product-overlay">

                                        <a href="<?php the_permalink(); ?>"><i class="fa fa-eye" aria-hidden="true"></i> رؤية المنتج </a>

                                    </div>

                                </div>



                                <div class="product-description">

                                    

                                    <div class="product-title">

                                        <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo wp_trim_words( get_the_title(),6, ' ...' );?></a></h3>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="product-category">

                                        <?php

                                            if (has_term('uncategorized', 'product_cat')) {

                                                echo '';

                                            }else{
                                                
                                                $product_cats = $product->get_categories();
                                                $shstrpos = strpos($product_cats, ',');
                                                if($shstrpos !== false) ++$shstrpos; 
                                                echo '<i class="fa fa-tag" aria-hidden="true"></i>' .substr($product_cats,$shstrpos);
                                            }

                                        ?>

                                    </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-price">
                                                <ins><?php echo $product->get_price_html(); ?></ins>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                         <?php endwhile; ?>

                         <?php wp_reset_postdata(); ?>

                         <?php else:  ?>

                         <li>

                              <?php _e( 'No Products' ); ?>

                         </li>

                         <?php endif; ?>

                </div>

            </div>

        </section>

        <!--END: Shop products CAROUSEL -->

        <!-- PARALLAX -->

        <section id="videos" class="background-grey" dir="rtl">



            <div class="container">

                <div data-animate-delay="100" data-animate="fadeInUp">

                    <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                        <h2><?=get_option('home_sec_six_title');?></h2>

                        <P><?=get_option('home_sec_six_content');?></P>

                    </div>

                </div>

                <div>

                    <div class="container">

                        <!-- Blog post-->

                        <div id="blog" class="row m-b-30" data-item="post-item">



                            <!-- Post item-->

                            <?php $no=get_option('home_sec_six_number');?>

                            <?php $news = sh_get_post($no);

                            if($news->have_posts()) : 

                            ?>

                            <?php while($news->have_posts()) : $news->the_post(); ?>

                            <div class="col-md-4 p-2 post-item border" data-animate="fadeInUp" data-animate-delay="0">

                                <div class="post-item-wrap">

                                    <div class="post-image">

                                        <a href="<?php the_permalink() ?>">

                                            <img alt="" src="<?php the_post_thumbnail_url('blog-size'); ?>">

                                        </a>

                                    </div>

                                    <div class="post-item-description">

                                        <span class="post-meta-date"><i class="fa fa-calendar"></i><?php the_date( 'Y-m-d'); ?></span>

                                        

                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?>

                                            </a></h2>

                                        <p><?php the_excerpt(); ?></p>



                                        <a href="<?php the_permalink() ?>" class="item-link"> أقرا المزيد <i class="fa fa-arrow-left"></i> </a>



                                    </div>

                                </div>

                            </div>

                            <!-- end: Post item-->

                            <?php endwhile;?>

                            <?php wp_reset_query(); ?>

                            <?php endif ?>

                        </div>

                        <!-- end: Blog post-->                        

                    </div>

                </div>

            </div>

        </section>

        <!-- PARALLAX -->

        <!-- Testimonial Carousel -->

        <section>

            <div class="container">

                <div data-animate-delay="100" data-animate="fadeInUp">

                    <div class="heading-text heading-section text-center" data-animate-delay="100" data-animate="fadeInUp">

                        <h2><?=get_option('home_sec_seven_title');?></h2>

                    </div>

                </div>

                <div class="carousel client-logos dots-grey" data-items="5" data-arrows="true"  data-animate="fadeInUp" data-animate-delay="0"> 

                    <?php $no=get_option('home_sec_seven_number');?>

                    <?php $cleints = sh_get_cleints($no);

                    if($cleints->have_posts()) : 

                    ?>

                    <?php while($cleints->have_posts()) : $cleints->the_post(); ?>

                    <div>

                        <a href="#"><img alt="" src="<?php the_post_thumbnail_url(); ?>"></a>

                    </div>

                    <?php endwhile;?>

                    <?php wp_reset_query(); ?>

                    <?php endif ?>

                </div>

            </div>

        </section>



        <!-- end: Testimonials -->

<?php get_footer(); ?>