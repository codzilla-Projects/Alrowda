<?php
/**
** Template Name: Shop library Template
**/
get_header();


$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
$catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
	'menu_order' => __( 'Default sorting', 'woocommerce' ),
	'popularity' => __( 'Sort by popularity', 'woocommerce' ),
	'rating'     => __( 'Sort by average rating', 'woocommerce' ),
	'date'       => __( 'Sort by newness', 'woocommerce' ),
	'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
	'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
) );

$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
$orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.

if ( wc_get_loop_prop( 'is_search' ) ) {
	$catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );

	unset( $catalog_orderby_options['menu_order'] );
}

if ( ! $show_default_orderby ) {
	unset( $catalog_orderby_options['menu_order'] );
}

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	unset( $catalog_orderby_options['rating'] );
}

if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
	$orderby = current( array_keys( $catalog_orderby_options ) );
}
?>

<?php

$order_by = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : '';

if ( 'price' === $order_by ) {
    $meta_key = '_regular_price';
    $order = 'ASC';
}
if ( 'price-desc' === $order_by ) {
	$meta_key = '_regular_price';
	$order = 'DESC';
}
if ( 'rating' === $order_by ) {
	$meta_key = '_wc_average_rating';
	$order = 'DESC';
}
if ( 'popularity' === $order_by ) {
	$meta_key = '_wc_review_count';
	$order = 'DESC';
}

$args = array(
	'post_type'       => 'product',
	'meta_key'        => $meta_key,
	'orderby'         => 'meta_value',
	'order'           => $order,
//	'tax_query' => array(
//		array(
//			'taxonomy' => 'product_cat',
//			'field'    => 'slug',
//			'terms'    => 'women',
//		),
//	)
);

$result = new WP_Query( $args );


?>
<section id="page-title">
    <div class="container">
        <div class="page-title">
            <h1>Shop</h1>
            <span>Shop 4 columns version</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="#">الرئيسية</a>
                </li>
                <li class="active"><a href="#"><?php the_title() ?></a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section>
	<div class="container">
	    <div class="row m-b-20">
	        <div class="col-lg-3">
	            <div class="order-select">
	                <h6>Sort by</h6>
	                <p>Showing 1–12 of 25 results</p>
	                <?php
						wc_get_template( 'loop/orderby.php', array(
							'catalog_orderby_options' => $catalog_orderby_options,
							'orderby'                 => $orderby,
							'show_default_orderby'    => $show_default_orderby,
						) );
						?>
	            </div>
	        </div>
	        <div class="col-lg-3">
	            <div class="order-select">
	                <h6>Sort by Price</h6>
	                <p>From 0 - 190$</p>
	                <form method="get">
	                    <select class="form-control">
	                        <option value="" selected="selected">0$ - 50$</option>
	                        <option value="">51$ - 90$</option>
	                        <option value="">91$ - 120$</option>
	                        <option value="">121$ - 200$</option>
	                    </select>
	                </form>
	            </div>
	        </div>
	    </div>
	    <!--Product list-->
	    <div dir="rtl" class="shop">
	        <div class="grid-layout grid-4-columns grid-loaded" data-item="grid-item" style="margin: 0px -20px -20px 0px; position: relative; height: 837.034px;">
	        	<?php
				if ( $result->have_posts() ) {
					while ( $result->have_posts() ) : $result->the_post();
					$default_img = '<img src="' . site_url() . '/wp-content/uploads/2018/06/noimg.jpeg' . '"/>';
					$img = ( get_the_post_thumbnail() ) ? get_the_post_thumbnail() : $default_img;
					$id = get_the_ID();
				?>
	            <div class="grid-item" style="padding: 0px 20px 20px 0px; position: absolute; left: 0px; top: 0px;">
	                <div class="product">
	                    <div class="product-image">
	                        <a href="<?php the_permalink(); ?>"><?php echo $img; ?>
	                        </a>
	                        <a href="<?php the_permalink(); ?>"><?php echo $img; ?>
	                        </a>
	                        <span class="product-hot">جديد </span>
	                        <span class="product-wishlist">
	                             <?php //echo do_shortcode( '[add_to_cart id="' . $id . '"]' )
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
	                            <a href="shop-product-ajax-page.php" data-lightbox="ajax">مشاهدة المنتج </a>
	                        </div>
	                    </div>
	                    <div class="product-description"> 
	                        <div class="product-title">
	                            <h3><a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php echo wp_trim_words( get_the_title(),2, ' ...' );?></a></h3>
	                        </div>
	                        <div class="product-price">
	                        	<ins><?php echo $product->get_price_html(); ?></ins>
	                        </div>
	                        <div class="product-category">
	                            <?php
	                                if (has_term('uncategorized', 'product_cat')) {
	                                    echo '';
	                                }else{
	                                    echo '<i class="fa fa-tag" aria-hidden="true"></i>'  . $product->get_categories();
	                                }
	                            ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <?php
					endwhile;
					}
				?>
	        <div class="grid-loader"></div>
	    </div>
	        <hr>
	        <!-- Pagination -->
	        <ul class="pagination">
	            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
	            <li class="page-item"><a class="page-link" href="#">1</a></li>
	            <li class="page-item"><a class="page-link" href="#">2</a></li>
	            <li class="page-item active"><a class="page-link" href="#">3</a></li>
	            <li class="page-item"><a class="page-link" href="#">4</a></li>
	            <li class="page-item"><a class="page-link" href="#">5</a></li>
	            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
	        </ul>
	        <!-- end: Pagination -->
	    </div>
	</div>
</section>

<?php get_footer(); ?>

