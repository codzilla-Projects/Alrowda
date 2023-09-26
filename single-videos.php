<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $videos_id = get_the_ID(); 
    $video_title = get_the_title();
?> 
<!-- Page Title -->
<section id="page-title" class="text-light" style="background: url('<?php $page_image = get_the_post_thumbnail_url(); if(empty($page_image)){ echo SH_URL ."assets/images/pattern10.png" ;} else{ echo $page_image;}?>')">
    <div class="container">
         <div class="breadcrumb animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <ul>
                <li><a href="#">الرئيسية </a> </li>
                <li class="active"><a href="javascript:void(0)"><?= $video_title ?></a> </li>
            </ul>
        </div>
        <div class="page-title animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <h1><?= $video_title ?></h1>
        </div>
    </div>
</section>
<!-- End Page Title -->
<section id="page-content" class="sidebar-right" style="transform: none;">
    <div class="container" style="transform: none;">
        <div class="row" style="transform: none;">
            <!-- content -->
            <div class="content col-lg-12">
                <!-- Blog -->
                <div id="blog" class="single-post">
                    <!-- Post single item-->
                    <div class="post-item">
                        <div class="post-item-wrap">
                            <div class="post-video">
                                <?php the_content() ?>
                            </div>
                            <div class="post-item-description">
                                <h2><?= $video_title ?></h2>
                                <div class="post-meta">
                                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i><?= get_the_date( 'j F Y', $videos_id );?></span>
                                    <div class="post-meta-share">
                                        <?php $facebook = get_option('sh_fb');  
                                        if(!empty($facebook)) :
                                        ?>
                                        <a class="btn btn-xs btn-slide btn-facebook" href="#<?= $facebook; ?>">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <?php endif; ?>
                                            <?php $twitter = get_option('sh_twitter');  
                                            if(!empty($twitter)) :
                                        ?>
                                        <a class="btn btn-xs btn-slide btn-twitter" href="<?= $twitter; ?>" data-width="100">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                        <?php endif; ?>
                                        <?php $instagram = get_option('sh_insta');  
                                        if(!empty($instagram)) :
                                        ?>
                                        <a class="btn btn-xs btn-slide btn-instagram" href="<?= $instagram; ?>" data-width="118">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <?php endif; ?>
                                        <?php $mail = get_option('sh_email');  
                                        if(!empty($mail)) :
                                        ?>
                                        <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:#<?= $mail; ?>" data-width="80">
                                            <i class="icon-mail"></i>
                                            <span>Mail</span>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post single item-->
                </div>
            </div>
            <!-- end: content -->
        </div>
    </div>
</section>
<?php endwhile; endif;?>
<?php get_footer(); ?>