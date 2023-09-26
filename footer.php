 <!-- Footer -->
        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row gap-y">
                        <div class="col-md-6 col-xl-3 text-center">
                            <p><a href="<?php bloginfo('url'); ?>"><img src="<?= get_option('sh_footer_logo'); ?>" alt="logo"></a></p>
                            <?php if ( is_active_sidebar( 'first_footer' ) ) : ?>
                                <?php dynamic_sidebar( 'first_footer' ); ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-6 col-md-3 col-xl-3">
                            <!-- Footer widget area 1 -->
                            <div class="widget">
                                <h4>التصنيفات </h4>
                                <ul class="list">
                                    <?php $terms = get_terms( array(
                                        'taxonomy'      => 'product_cat',
                                        'hide_empty'    => false,
                                        'orderby'       => 'ID',
                                        'order'         => 'ASC',
                                        'number'        => '8',
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
                            <!-- end: Footer widget area 1 -->
                        </div>
                        <div class="col-6 col-md-6 col-xl-3">
                            <!-- Contact icons -->
                            <div class="widget">
                                <h4>اتصل بنا </h4>
                                <div class="contact-us">
                                    <?php $phone = get_option('sh_phone');  
                                        if(!empty($phone)) :
                                    ?>
                                    <h5>
                                        <a  href="tel:<?= $phone; ?>"><i class="phone fa fa-phone"></i><?= $phone; ?></a>
                                    </h5>
                                    <?php endif; ?>
                                    <?php $phone2 = get_option('sh_phone2');  
                                        if(!empty($phone2)) :
                                    ?>
                                    <h5>
                                        <a  href="tel:<?= $phone2; ?>"><i class="phone fa fa-phone"></i><?= $phone2; ?></a>
                                    </h5>
                                    <?php endif; ?>
                                    <?php $mail = get_option('sh_email');  
                                        if(!empty($mail)) :
                                    ?>
                                    <h5>
                                        <a  href="mailto:<?= $mail; ?>"><i class="mail fa fa-envelope"></i><?= $mail; ?></a>
                                    </h5>
                                     <?php endif; ?>
                                </div>
                            </div>
                            <br>
                            <!-- end: Contact icons -->
                            <!-- Social icons -->
                            <div class="widget">
                                <h4>تابعنا </h4>
                                <div class="social-icons social-icons-colored social-icons-rounded float-right">
                                    <ul dir="rtl">
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
                                            <?php $youtube = get_option('sh_youtube');  
                                            if(!empty($youtube)) :
                                            ?>
                                        <li class="social-youtube"><a href="<?= $youtube; ?>"><i class="fab fa-youtube"></i></a></li>
                                            <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- end: Social icons -->
                        </div>
                        <div class="col-12 col-md-6 col-xl-3">
                            <!-- Footer widget area 2 -->
                            <div class="widget">
                                <h4>تابعنا على الفيسبوك </h4>
                                <div class="fb-page" data-href="https://www.facebook.com/alrawda.machinery" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/alrawda.machinery" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/alrawda.machinery">‎الروضة لماكينات التعبئة والتغليف‎</a></blockquote></div>
                            </div>
                            <!-- end: Footer widget area 2 -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">كل الحقوق محفوظة لدى شركة الروضة لماكينات التعبئة والتغليف &copy; <?= date('Y'); ?> - تم التطوير والإنشاء ء من خلال puffer media agency</div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
        <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="QNHJmhoV"></script>
    <!--Plugins-->
<!--     <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
    var inputs = document.getElementsByClassName('quantity')
    
    function incInputNumber(input, step) {
        var val = +input.value
        if (isNaN(val)) val = 0
        val += step
        input.value = val > 0 ? val: 0
        // If you need to change the input value in the DOM :
        // var newValue = val > 0 ? val : 0;
        // input.setAttribute("value", newValue);
    }
    
    Array.prototype.forEach.call(inputs, function(el) {
        var input = el.getElementsByTagName('input')[0]
        
        el.getElementsByClassName('increase')[0].addEventListener('click', function() { incInputNumber(input, 1) })
        el.getElementsByClassName('decrease')[0].addEventListener('click', function() { incInputNumber(input, -1) })
    })
    })

</script> -->
    <?php wp_footer() ?>

</body>

</html>
