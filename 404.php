<?php get_header() ?>
<section id="page-title" class="text-light" style="background: url('<?php $page_image = get_the_post_thumbnail_url(); if(empty($page_image)){ echo SH_URL ."assets/images/pattern10.png" ;} else{ echo $page_image;}?>')">
    <div class="container">
         
       <div class="page-title animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <h1 dir="rtl"><?php wp_title( '', true, 'right' ,''); ?>  </h1>
        </div>
        <div class="breadcrumb animated fadeInUp visible" data-animate="fadeInUp" data-animate-delay="1300">
            <ul>
                <li><a href="<?php bloginfo('url'); ?>">الرئيسية</a> </li>
                <li class="active"><a href="javascript:void(0)"><?php wp_title( '', true, 'right' ,''); ?>  </a> </li>
            </ul>
        </div>
    </div>
</section>
<section class="m-t-80 p-b-150">
    <div class="container">
        <div class="row">
            <div dir="rtl" class="col-lg-12">
                <div class="text-center">
                    <h1 class="text-medium">عفوًا ، تعذر العثور على هذه الصفحة!</h1>
                    <p class="lead">ربما تمت إزالة الصفحة التي تبحث عنها أو تم تغيير اسمها أو أنها غير متاحة مؤقتًا.</p>
                    <div class="seperator m-t-20 m-b-20"></div>
                    <div class="search-form">
                        <p>يرجى محاولة البحث مرة أخرى</p>
                        <a class="btn btn-home">
                                <i class="fa fa-home"></i> العودة الى الصفحة الرئيسية
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>