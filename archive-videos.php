<?php 
/**
** Template Name: Video library Template
**/
get_header(); ?>
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
        <section id="videos" dir="rtl">
            <div class="container">
                <!--Embeds -->
                <div class="row p-0">
                	<div class="col-lg-12">
                		<nav aria-label="breadcrumb">
                            <ul dir="rtl" class="breadcrumb text-right">
                                <?php $terms = get_terms( array('taxonomy' => 'videos_cat','hide_empty' => false,) ); ?>
                                        <?php foreach ($terms as $term) { ?>
                                <li class="breadcrumb-item hvr-sweep-to-left">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <a class="" href="<?= SH_BlogUrl.'/videos-category/'.$term->slug; ?>"><?= $term->name; ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>
                	</div>
                	<div class="col-lg-12 text-right">
		                <div dir="ltr" class="row p-0">
		                	<?php
                                $videos = sh_get_videos_inner(2);
                                  if($videos->have_posts()) : 
                                ?>
                            <?php while($videos->have_posts()) : $videos->the_post(); 
                                  $video_title = get_the_title(); ?>
		                    <div class="col-lg-6">
		                        <h4><a href="<?php the_permalink();?>" title="<?= $video_title; ?>"><?php echo wp_trim_words( $video_title ,8, ' ...' );?></a></h4>
		                        <?php the_content()?>
		                    <div class="video_content mt-3">    
                                <div dir="rtl" class="row">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                      <span>
                                        <i class="fa fa-tag" aria-hidden="true"></i>
                                        <?php $post_terms = get_the_terms(get_the_ID(),'videos_cat');?>
                                        <?php foreach($post_terms as $post_term){ ?>
                                        <a href="<?= SH_BlogUrl.'/videos-category/'.$post_term->slug; ?>" ><?= $post_term->name; ?>  
                                        </a>
                                        <?php } ?>
                                      </span>
                                    </div>
                                   
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <span>
                                          <i class="fa fa-clock" aria-hidden="true"></i>
                                            <h6><?= get_the_date( 'd F Y', get_the_ID() );?></h6>
                                        </span> 
                                    </div>
                                </div>
                              </div>

		                    </div>
		                    <?php endwhile;?>
		                    <hr class="space">
		                    <div class="pagin w-100 justify-content-center mt-5 pt-5">
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
		                                  );
		                            ?>
		                            <?php echo paginate_links($args); ?>
		                        </nav>
		                    </div>
							<?php wp_reset_query(); ?>
                    		<?php endif ?>
		                </div>
                	</div>
                </div>
                <!--END: Embeds -->
            </div>
        </section>
        <!-- end: Section -->
<?php get_footer(); ?>