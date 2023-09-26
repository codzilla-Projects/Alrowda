<?php 
get_header(); 
$sh_breadcrumbs = get_post(112);
?>
<section id="page-title" class="text-light" style="background: url('<?php $page_image = get_the_post_thumbnail_url(); if(empty($page_image)){ echo SH_URL ."assets/images/pattern10.png" ;} else{ echo $page_image;}?>')">
    <div class="container">
      <div class="page-title animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <h1><?= single_cat_title(); ?> </h1>
        </div>
        <div class="breadcrumb animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <ul>
                <li><a href="#">الرئيسية</a> </li>
                <li><a href="<?= $sh_breadcrumbs->guid; ?>"><?= $sh_breadcrumbs->post_title; ?></a></li>      
                <li class="active"><a href="#"><?= single_cat_title(); ?> </a> </li>
            </ul>
        </div>
    </div>
</section>
 <section id="videos" dir="rtl">
    <div class="container">
        <div class="col-lg-12 text-right">
            <div dir="ltr" class="row p-0">
                <?php 
                    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                    $videos = sh_get_video_with_tax(2,$term->term_id);
                    if($videos->have_posts()) : 
                ?>
                <?php                     								
      				while($videos->have_posts()) : $videos->the_post(); 
                    $video_title = get_the_title();
      			?>
                <div class="col-lg-6">
                    <h4>
                        <a href="<?php the_permalink();?>" title="<?= $video_title; ?>"><?php echo wp_trim_words( $video_title ,8, ' ...' );?>
                        </a>
                    </h4>
                      <?php the_content()?> 
                </div>
                <?php endwhile; ?>
                <hr class="space mt-5">
                <div class="col-lg-12 mt-5 pagin w-100 justify-content-center">
                    <nav aria-label="Page navigation card">
                        <?php     
                            $args = array(
                               'format'             => '?paged=%#%',
                               'current'            => max( 1, get_query_var('paged') ),
                               'total'              => $videos->max_num_pages,
                               'show_all'           => false,
                               'end_size'           => 1,
                               'mid_size'           => 2,
                               'prev_next'          => true,
                               'next_text'          => 'التالي   »',
                               'prev_text'          => '« السابق  ',
                               'type'               => 'list',
                           );                        ?>
                        <?php echo paginate_links($args); ?>
                    </nav>
                </div>
                <?php wp_reset_query(); ?>
                <?php endif ?>
            </div>                                 
        </div>                          
    </div>
</section>  

<!-- ==================================== -->
<?php get_footer(); ?>