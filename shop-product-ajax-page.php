 <?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header( ); ?>

    <header class="page-banner product-header container-fluid">
        <div class="container">
            
                
            <?php woocommerce_breadcrumb(); ?>
            <?php do_action('woocommerce_archive_description'); ?>
        </div>
    </header>

    <section class="single-product container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    
                </div>
            </div>
        </div>
    </section>

 
        <section id="product-page" class="product-page p-b-0">
            <div class="container">
                <div class="product">
                    <div class="row m-b-40">
                        <div class="col-lg-5">
                            <div class="product-image">
                                <!-- Carousel slider -->
                                <div class="carousel dots-inside dots-dark arrows-visible" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-lightbox="gallery">
                                    <a href="<?php the_post_thumbnail(); ?>" data-lightbox="image" title="Shop product image!"><<?php the_post_thumbnail(); ?>
                                    </a>
                                    <a href="<?php the_post_thumbnail(); ?>" data-lightbox="image" title="Shop product image!"><<?php the_post_thumbnail(); ?>
                                    </a>
                                </div>
                                <!-- Carousel slider -->
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-description">
                                <div class="product-category"> 
	                            </div>
                                <div class="product-title">
                                    <h3><a href="#"><?php if (apply_filters('woocommerce_show_page_title', true)) : ?><?php echo woocommerce_template_single_title(); ?>
            						<?php endif; ?></a></h3>
                                </div>
                                <div class="product-price"><ins>$39.00</ins>
                                </div>
                                <div class="product-rate">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <div class="product-reviews"><a href="#">3 customer reviews</a>
                                </div>
                                <div class="seperator m-b-10"></div>
                                <p>
                                	<?php while ( have_posts() ) : the_post(); ?>

                                  <?php wc_get_template_part( 'content', 'single-product' ); ?>

                                   <?php endwhile; // end of the loop. ?>
                                </p>
                                <div class="product-meta">
                                    <p>Tags: <a href="#" rel="tag">Clothing</a>, <a rel="tag" href="#">T-shirts</a>
                                    </p>
                                </div>
                                <div class="seperator m-t-20 m-b-10"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>Select the size</h6>
                                    <ul class="product-size">
                                        <li>
                                            <label>
                                                <input type="radio" checked="checked" value="option1" name="product-size"><span>xs</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" checked="checked" value="option1" name="product-size"><span>s</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" checked="checked" value="option1" name="product-size"><span>m</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" checked="checked" value="option1" name="product-size"><span>l</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" checked="checked" value="option1" name="product-size"><span>xl</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Select the color</h6>
                                    <label class="sr-only">Color</label>
                                    <select style="padding:10px">
                                        <option value="">Select color…</option>
                                        <option value="">White</option>
                                        <option value="" selected="selected">Green</option>
                                        <option value="">Brown</option>
                                        <option value="">Yellow</option>
                                        <option value="">Pink</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Select quantity</h6>
                                    <div class="cart-product-quantity">
                                        <div class="quantity m-l-5">
                                            <input type="button" class="minus" value="-">
                                            <input type="text" class="qty" value="1">
                                            <input type="button" class="plus" value="+">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6>Add to Cart</h6>
                                    <a class="btn" href="#"><i class="icon-shopping-cart"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product additional tabs -->
                    <div class="tabs tabs-folder">
                        <ul class="nav nav-tabs" id="myTab3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="false"><i class="fa fa-align-justify"></i>Description</a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="true"><i class="fa fa-info"></i>Additional
                                    Info</a></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-star"></i>Reviews</a></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent3">
                            <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                                    minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis
                                    dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum
                                    necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non
                                    recusandae. </p>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                    occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt
                                    mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                    expedita distinctio.</p>
                            </div>
                            <div class="tab-pane fade " id="profile3" role="tabpanel" aria-labelledby="profile-tab">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Size</td>
                                            <td>Small, Medium &amp; Large</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>Pink &amp; White</td>
                                        </tr>
                                        <tr>
                                            <td>Waist</td>
                                            <td>26 cm</td>
                                        </tr>
                                        <tr>
                                            <td>Length</td>
                                            <td>40 cm</td>
                                        </tr>
                                        <tr>
                                            <td>Chest</td>
                                            <td>33 inches</td>
                                        </tr>
                                        <tr>
                                            <td>Fabric</td>
                                            <td>Cotton, Silk &amp; Synthetic</td>
                                        </tr>
                                        <tr>
                                            <td>Warranty</td>
                                            <td>3 Months</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="comments" id="comments">
                                    <div class="comment_number">
                                        Reviews <span>(3)</span>
                                    </div>
                                    <div class="comment-list">
                                        <!-- Comment -->
                                        <div class="comment" id="comment-1">
                                            <div class="image"><img alt="" src="images/blog/author.jpg" class="avatar">
                                            </div>
                                            <div class="text">
                                                <div class="product-rate">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <h5 class="name">John Doe</h5>
                                                <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                <a class="comment-reply-link" href="#">Reply</a>
                                                <div class="text_holder">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                        industry. Lorem Ipsum has been the industry's standard dummy
                                                        text ever since the 1500s.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end: Comment -->
                                        <!-- Comment -->
                                        <div class="comment" id="comment-1-1">
                                            <div class="image"><img alt="" src="images/blog/author2.jpg" class="avatar">
                                            </div>
                                            <div class="text">
                                                <div class="product-rate">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <h5 class="name">John Doe</h5>
                                                <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                <a class="comment-reply-link" href="#">Reply</a>
                                                <div class="text_holder">
                                                    <p>It is a long established fact that a reader will be distracted by
                                                        the readable content.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end: Comment -->
                                        <!-- Comment -->
                                        <div class="comment" id="comment-1-2">
                                            <div class="image"><img alt="" src="images/blog/author3.jpg" class="avatar">
                                            </div>
                                            <div class="text">
                                                <div class="product-rate">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <h5 class="name">John Doe</h5>
                                                <span class="comment_date">Posted at 15:32h, 06 December</span>
                                                <a class="comment-reply-link" href="#">Reply</a>
                                                <div class="text_holder">
                                                    <p>There are many variations of passages of Lorem Ipsum available,
                                                        but the majority have suffered alteration in some form, by
                                                        injected humour.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end: Comment -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Product additional tabs -->
                </div>
            </div>
        </section>
        <!-- end: SHOP PRODUCT PAGE -->
        <!-- SHOP WIDGET PRODUTCS -->
        <section class="p-t-0">
            <div class="container">
                <div class="heading-text heading-line text-center">
                    <h4>Related Products you may be interested!</h4>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="widget-shop">
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/10.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Women</div>
                                    <div class="product-title">
                                        <h3><a href="#">Bolt Sweatshirt</a></h3>
                                    </div>
                                    <div class="product-price"><del>$30.00</del><ins>$15.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/6.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Women</div>
                                    <div class="product-title">
                                        <h3><a href="#">Consume Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/7.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Man</div>
                                    <div class="product-title">
                                        <h3><a href="#">Logo Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget-shop">
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/11.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Man</div>
                                    <div class="product-title">
                                        <h3><a href="#">Logo Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/9.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Women</div>
                                    <div class="product-title">
                                        <h3><a href="#">Consume Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/3.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Man</div>
                                    <div class="product-title">
                                        <h3><a href="#">Logo Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget-shop">
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/1.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Women</div>
                                    <div class="product-title">
                                        <h3><a href="#">Bolt Sweatshirt</a></h3>
                                    </div>
                                    <div class="product-price"><del>$30.00</del><ins>$15.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/2.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Women</div>
                                    <div class="product-title">
                                        <h3><a href="#">Consume Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <div class="product-image">
                                    <a href="#"><img src="images/shop/products/5.jpg" alt="Shop product image!">
                                    </a>
                                </div>
                                <div class="product-description">
                                    <div class="product-category">Man</div>
                                    <div class="product-title">
                                        <h3><a href="#">Logo Tshirt</a></h3>
                                    </div>
                                    <div class="product-price"><ins>$39.00</ins>
                                    </div>
                                    <div class="product-rate">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: SHOP WIDGET PRODUTCS -->
        <!-- DELIVERY INFO -->
        <section class="background-grey p-t-40 p-b-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-gift"></i></a>
                            </div>
                            <h3>Free shipping on orders $60+</h3>
                            <p>Order more than 60$ and you will get free shippining Worldwide. More info.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-plane"></i></a>
                            </div>
                            <h3>Worldwide delivery</h3>
                            <p>We deliver to the following countries: USA, Canada, Europe, Australia</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fa fa-history"></i></a>
                            </div>
                            <h3>60 days money back guranty!</h3>
                            <p>Not happy with our product, feel free to return it, we will refund 100% your money!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: DELIVERY INFO -->
<?php get_footer() ?>