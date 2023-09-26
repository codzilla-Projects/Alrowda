<?php get_header(); ?>

<?php if ( have_posts() ) : 
	while ( have_posts() ) : the_post();  ?>
<?php if(is_product_category() || is_checkout() || is_page(219)): ?>
    <?php get_template_part('page_title_parallax'); ?>
<?php else : ?>
    <?php get_template_part('page_title_defualt'); ?>
<?php endif; ?>


<?php if(is_shop()): ?>

	<?php get_template_part('shop_content'); ?>

<?php elseif(is_cart()): ?>

    <?php get_template_part('cart_content'); ?>

    <?php elseif(is_page(219)): ?>

    <?php get_template_part('about_content'); ?>

<?php else : ?>
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