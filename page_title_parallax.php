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