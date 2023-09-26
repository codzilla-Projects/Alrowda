<?php get_header(); ?>
<section id="page-title" class="text-light" style="background: url(http://rawda.puffermedia.net/wp-content/uploads/2021/04/pattern10.png)">
    <div class="container">
         
       <div class="page-title animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <h1>نتائج البحث عن  :  <?php echo $_GET['s']; ?> </h1>
        </div>
        <div class="breadcrumb animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <ul>
                <li><a href="<?php bloginfo('url'); ?>">الرئيسية</a> </li>
                <li class="active"><a href="javascript:void(0)">تائج البحث عن  :  <?php echo $_GET['s']; ?> </a> </li>
            </ul>
        </div>
    </div>
</section>
<section dir="rtl" class="search_resault text-right" id="search_resault">
    <div data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <h3 class="search_resault_h3">نتائج البحث عن  :   <?php echo $_GET['s']; ?></h3>
                </div>
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;?>
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

                        </div>
                    <?php endwhile; ?>
                        <div class="pagin">
                            <nav aria-label="Page navigation fawaed">
                                <?php    
                                    $args = array(
                                       'format'             => '?paged=%#%',
                                       'current'            => max( 1, get_query_var('paged') ),
                                       'total'              => $wp_query->max_num_pages,
                                       'show_all'           => true,
                                       'end_size'           => 1,
                                       'mid_size'           => 2,
                                       'prev_next'          => true,
                                       'next_text'          => 'التالي   »',
                                       'prev_text'          => '« السابق  ',
                                       'type'               => 'list',
                                      );
                                ?>
                                <?php echo paginate_links($args); ?>
                            </nav>
                        </div>
                        
                    <?php else: echo "
                                    <div class='department_one col-md-12'>
                                        <div class='description'>                            
                                            <div class='row row_padding'>
                                                <ul class=''>
                                                    <li class='fawaedpost'>
                                                        <h5>لا توجد بيانات للبحث </h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    "; ?>
                    <?php wp_reset_query(); ?>
                        <?php endif ?>
                
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>