<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $post_id = get_the_ID(); 
    $post_title = get_the_title();
?>  
<section id="page-title" class="text-light" style="background: url('<?php echo SH_URL ."assets/images/pattern10.png";?>')">
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

                            <div class="post-item-description">
                                <h2><?php the_title() ?></h2>
                                <div class="post-meta">
                                    <div dir="rtl" class="row">
                                        <div class="col-lg-8">
                                            <span class="post-meta-date"><i class="fa fa-calendar"></i><?= get_the_date( 'j, F, Y', get_the_ID() );?></span>
                                        </div>
                                        <div class="col-lg-4">
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
                                                <a class="btn btn-xs btn-slide btn-googleplus" href="mailto:<?= $mail; ?>" data-width="80">
                                                    <i class="icon-mail"></i>
                                                    <span>Mail</span>
                                                </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <p>
                                    <?php the_content() ?>
                                </p>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            <!-- end: content -->
        </div>
    </div>
</section>
<?php endwhile; endif;?>

<?php get_footer(); ?>