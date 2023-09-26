<?php 
/**
** Template Name: News library Template
**/
get_header(); 
?>

<section id="page-title" class="text-light" style="background: url('<?php $page_image = get_the_post_thumbnail_url(); if(empty($page_image)){ echo SH_URL ."assets/images/pattern10.png" ;} else{ echo $page_image;}?>')">
    <div class="container">
    	<div class="page-title animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <h1><?php the_title(); ?> </h1>
        </div>
        <div class="breadcrumb animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <ul>
                <li><a href="#">الرئيسية</a> </li>
                <li class="active"><a href="#"><?php the_title(); ?> </a> </li>
            </ul>
        </div>
    </div>
</section>
<!-- Section -->
<!-- PARALLAX -->
<section id="videos" dir="rtl" class="parallax" style="background: transparent url(assets/images/parallax/1.jpg);">
    <div class="container">
        <div id="blog">
            <div class="container">
                <!-- Blog post-->
                <div id="blog" dir="" class="row m-b-30" data-item="post-item" data-animate="fadeInUp" data-animate-delay="0">
                    <?php
                        $posts = sh_get_post_inner(6);
                          if($posts->have_posts()) : 
                        ?>
                    <?php while($posts->have_posts()) : $posts->the_post(); 
                          $posts_title = get_the_title(); ?>
                    <div dir="rtl" class="col-md-4 p-2 post-item border">
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
                                <a href="<?php the_permalink() ?>" class="item-link"> أقرا المزيد  <i class="fa fa-arrow-left"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->

                    <?php endwhile;?>
                    </div>
                    <hr class="space">
                    <div class="pagin w-100 justify-content-center">
                        <nav aria-label="Page navigation card">
                           <?php    
                                $args = array(
                                   'format'             => '?paged=%#%',
                                   'current'            => max( 1, get_query_var('paged') ),
                                   'total'              => $posts->max_num_pages,
                                   'show_all'           => false,
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
                    <?php wp_reset_query(); ?>
                    <?php endif ?>
                
                <!-- end: Blog post-->                        
            </div>
        </div>
    </div>
</section>
<!-- end: Section -->
<?php get_footer(); ?>