<?php
/**
** Template Name: Shop Template
**/
get_header('product'); 

 if ( have_posts() ) : 
	while ( have_posts() ) : the_post(); 



        if(is_shop()):

            get_template_part('shop_content'); 

        elseif(is_cart()): 

            get_template_part('cart_content'); 

    
        else : ?>
            <section>
                <div dir="rtl" class="container text-right">
                   <?php the_content(); ?>
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile;  
    wp_reset_query() ;
endif; ?>

<?php get_footer(); ?>