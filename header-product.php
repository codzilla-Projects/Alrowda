<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <meta content="<?= get_bloginfo('description'); ?>" name="description">
  <meta content="ماكينات تعبيئة وتغليف" name="keywords">

  <!-- Favicons -->
  <link href="<?= SH_URL; ?>favicon.png" rel="icon">
  <link href="<?= SH_URL; ?>favicon.png" rel="apple-touch-icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

 <?php wp_head(); ?>
</head>
<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Topbar -->
        <div id="topbar" class="dark topbar-fullwidth">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="top-menu">
                            <?php $mail = get_option('sh_email');  
                                if(!empty($mail)) :
                            ?>
                            <li><a href="mailto:<?= $mail; ?>"><i class="mail fa fa-envelope"> </i><?= $mail; ?></a></li>
                            <?php endif; ?>
                           <?php $phone = get_option('sh_phone');  
                                if(!empty($phone)) :
                            ?>
                            <li><a href="tel:<?= $phone; ?>"><i class="phone fa fa-phone"></i> <?= $phone; ?></a></li>
                            <?php endif; ?>  
                            <?php $phone2 = get_option('sh_phone2');  
                                if(!empty($phone2)) :
                            ?>
                            <li><a href="tel:<?= $phone2; ?>"><i class="phone fa fa-phone"></i> <?= $phone2; ?></a></li>
                            <?php endif; ?>  
                        </ul>
                    </div>
                    <div class="col-md-6 d-none d-sm-block">
                        <div class="social-icons social-icons-colored-hover">
                             <ul>
                                <?php $facebook = get_option('sh_fb');  
                                    if(!empty($facebook)) :
                                ?>
                                <li class="social-facebook"><a href="<?= $facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                                <?php $twitter = get_option('sh_twitter');  
                                    if(!empty($twitter)) :
                                ?>
                                <li class="social-twitter"><a href="<?= $twitter; ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php $instagram = get_option('sh_insta');  
                                    if(!empty($instagram)) :
                                ?>
                                <li class="social-instagram"><a href="<?= $instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                                <?php endif; ?>
                                <?php $linkedin = get_option('sh_linkedin');  
                                    if(!empty($linkedin)) :
                                ?>
                                <li class="social-pinterest"><a href="<?= $linkedin; ?>"><i class="fab fa-linkedin"></i></a></li>
                                <?php endif; ?>
                                <?php $youtube = get_option('sh_youtube');  
                                    if(!empty($youtube)) :
                                ?>
                                <li class="social-youtube"><a href="<?= $youtube; ?>"><i class="fab fa-youtube"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: Topbar -->
        <!-- Header -->
        <header id="header" dir="rtl" data-fullwidth="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                       <a href="<?php bloginfo('url'); ?>">
                            <span class="logo-default"><img class="img-fluid" src="<?= get_option('sh_logo_img'); ?>"></span>
                            <span class="logo-dark"><img class="img-fluid" src="<?= get_option('sh_logo_img'); ?>"></span>
                       </a>
                    </div>
                    <!--End: Logo-->
                    
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="<?php echo home_url('/'); ?>" method="get">
                            <input class="form-control" name="s" value="<?php echo get_search_query(); ?>" type="text" placeholder="اكتب & بحث ..." />
                            <span class="text-muted">ابدأ الكتابة واضغط على "Enter" أو "ESC" للإغلاق</span>
                        </form>
                    </div>
                    <!-- end: search -->
                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            <li>
                                <a id="btn-search" href="#"> <i class="icon-search"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!--end: Header Extras-->
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                   <!--Navigation-->
                    <div id="mainMenu" class="menu-center">
                        <div class="container">
                            <nav>
                                <ul dir="rtl">
                                    <li><a href="<?php bloginfo('url'); ?>">الرئيسية</a></li>
                                    <li><a href="<?php bloginfo('url'); ?>/%d8%b9%d9%86-%d8%a7%d9%84%d8%b4%d8%b1%d9%83%d8%a9/">عن الشركة</a></li>
                                    <li class="dropdown mega-menu-item"><span class="dropdown-arrow"><i class="icon-chevron-down"> </i></span> <a href="<?php bloginfo('url'); ?>/shop/">منتجاتنا</a>
                                        <ul class="dropdown-menu menu-last" style="">
                                            <li class="mega-menu-content">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                                                        <ul>
                                                            <?php $terms = get_terms( array(
                                                                'taxonomy'      => 'product_cat',
                                                                'hide_empty'    => false,
                                                                'orderby'       => 'ID',
                                                                'order'         => 'ASC',
                                                                'number'        => '10',
                                                                'hide_empty'    => true,
                                                                'exclude'       => array('15'),
                                                                ) 
                                                                ); 
                                                                 ?>

                                                            <?php foreach ($terms as $term) {

                                                            $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); ?>
                                                            <li> 
                                                                <a href="<?= SH_BlogUrl.'/product-category/'.$term->slug; ?>">
                                                                    <?= $term->name; ?>
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 text-center p-l-0">
                                                        <h4 class="text-theme">خصم كبير<small>يصل إلى</small></h4>
                                                        <h2 class="text-lg text-theme lh80 m-b-30">70%</h2>
                                                        <p class="m-b-0">يسعدنا أن نقدم لكم خصم كبير فى شركة الروضة.</p>
                                                        <a href="<?php bloginfo('url'); ?>/shop/" class="btn btn-shadow btn-rounded btn-block m-t-10">تسوق الآن</a><small class="t300">
                                                            <p class="text-center m-0"><em>* عرض لمدة محدودة</em></p>
                                                        </small>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                     <li><a href="<?php bloginfo('url'); ?>/%d8%a7%d9%84%d9%81%d9%8a%d8%af%d9%8a%d9%88%d9%87%d8%a7%d8%aa/">الفيديوهات </a></li>
                                    <li><a href="<?php bloginfo('url'); ?>/%d9%85%d9%82%d8%a7%d9%84%d8%a7%d8%aa/">المدونة</a></li>
                                    <li><a href="<?php bloginfo('url'); ?>/%d8%aa%d9%88%d8%a7%d8%b5%d9%84-%d9%85%d8%b9%d9%86%d8%a7/">تواصل معنا</a></li>
                                    <li>
                                        <a class="cart" href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i><span><?php echo sprintf (_n( '%d ', '%d ', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
         <!-- end: Header -->
        <body>