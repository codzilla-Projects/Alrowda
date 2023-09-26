 <?php



if ( ! defined( 'ABSPATH' ) ) {

    exit; // Exit if accessed directly

}

get_header('product'); ?>

<?php if ( have_posts() ) :  ?>

<section id="single_product" dir="rtl" id="product-page" class="product-page p-b-0">

    <div class="container">

        <div class="product">

            <div class="row m-b-40">

                <div class="col-lg-12">

                    <div class="product-description">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php the_content()?>

                        <?php endwhile; // end of the loop. ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- end: SHOP PRODUCT PAGE -->
<?php wp_reset_query(); ?>
<?php endif; ?>
<?php get_footer() ?>