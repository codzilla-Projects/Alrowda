<?php
/**
** Template Name: Contact Template
**/
get_header(); ?>
<!-- Inspiro Slider -->
<section id="page-title" class="text-light" style="background: url('<?php $page_image = get_the_post_thumbnail_url(); if(empty($page_image)){ echo SH_URL ."assets/images/pattern10.png" ;} else{ echo $page_image;}?>')">
    <div class="container">
         
       <div class="page-title animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <h1><?php the_title(); ?> </h1>
        </div>
        <div class="breadcrumb animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <ul>
                <li><a href="<?php bloginfo('url'); ?>">الرئيسية</a> </li>
                <li class="active"><a href="javascript:void(0)"><?php the_title(); ?> </a> </li>
            </ul>
        </div>
    </div>
</section>
        <!--end: Inspiro Slider -->
  <!-- Page title -->
<section class="no-padding">
    <!-- Google Map -->
        <div class="mapouter"><div class="gmap_canvas"><iframe height="500" width="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=%D8%B4%D8%A7%D8%B1%D8%B9%20%D8%A7%D9%84%D8%AD%D9%84%D9%88%D8%8C%20Tanta%20Qism%202,%20Tanta,%20Gharbia%20Governorate&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}</style><a href="https://www.embedgooglemap.net">how to embed google map in email</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div></div>
    <!-- end: Google Map -->
</section>
<!-- end: Page title -->
<!-- CONTENT -->
<section dir="rtl" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-right">
                <h3 class="text-uppercase"><?=get_option('contact_title');?></h3>
                <p>
                    <?=get_option('contact_content');?>
                </p>
                <div class="row m-t-40">
                    <div class="col-lg-12">
                        <h2 class="text-uppercase"><?=get_option('company_name');?></h2>
                        <address>
                            <i class="fa fa-map-marker"></i><span class="mr-2"><?=get_option('company_address');?> </span>
                            <br/>
                            <?php $phone = get_option('sh_phone');  
                                if(!empty($phone)) :
                            ?>
                            <strong dir="rtl" title="Phone"><i class="fa fa-phone"></i><span class="mr-2"> <?= $phone; ?></span></strong>
                            <?php endif; ?>
                            <br/>
                            <?php $phone2 = get_option('sh_phone2');  
                                if(!empty($phone2)) :
                            ?>
                            <strong dir="rtl" title="Phone"><i class="fa fa-phone"></i><span class="mr-2"> <?= $phone2; ?></span></strong>
                            <?php endif; ?>
                        </address>
                    </div>
                </div>
                <div class="social-icons m-t-30 social-icons-colored">
                    <ul>
                            <?php $facebook = get_option('sh_fb');  
                            if(!empty($facebook)) :
                            ?>
                            <li class="social-facebook"><a href="<?= $facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <?php endif; ?>
                            <?php $instagram = get_option('sh_insta');  
                                if(!empty($instagram)) :
                            ?>
                            <li class="social-instagram"><a href="<?= $instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>
                            <?php $mail = get_option('sh_email');  
                                if(!empty($mail)) :
                            ?>
                            <li class="social-vimeo"><a href="mailto:<?= $mail; ?>"><i class="fa fa-envelope"></i></a></li>
                            <?php endif; ?>
                           <?php $phone = get_option('sh_phone');  
                                if(!empty($phone)) :
                            ?>
                            <li class="social-linkedin"><a href="tel:<?= $phone; ?>"><i class="fa fa-phone"></i></a></li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 text-right pr-5">
                <h3 class="text-uppercase">اترك لنا رسالة </h3>
                    <div class="row">
                    <?php echo do_shortcode('[contact-form-7 id="201" title="contact us" html_id="contactForm" html_class="shake"]');?>
                    </div>
            </div>
        </div>
    </div>
</section> <!-- end: Content -->
<?php get_footer(); ?>