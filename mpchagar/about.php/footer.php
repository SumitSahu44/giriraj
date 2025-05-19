    <?php include "social.php"; ?>
    <footer class="footer-wrapper footer-layout1" data-bg-src="<?= $wspath?>assets/img/bg/footer_bg_1_1.jpg">
        <!--<div class="container z-index-common">-->
        <!--    <div class="newsletter-wrap">-->
        <!--        <div class="newsletter-content">-->
        <!--            <h2 class="sec-title">Subscribe for newsletter</h2>-->
        <!--        </div>-->
        <!--        <form class="newsletter-form">-->
        <!--            <div class="form-group"><input class="form-control" type="email" placeholder="Email Address"-->
        <!--                    required=""></div><button type="submit" class="th-btn shadow-1">Subscribe</button>-->
        <!--        </form>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-4">
                        <div class="widget footer-widget">
                            <div class="th-widget-about">
                                <div class="about-logo">
                                    <a href="<?= $wspath?>">
                                        <img src="<?= $wspath?>wkiadmin/images/<?= $general['footer_logo'];?>" alt="<?=$site_name?>" title="<?=$site_name?>" style="width:110px;">
                                    </a>
                                </div>
                                <p class="about-text"><?= $general['short_about'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-2">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Links</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <?php
                                    $link_sql = mysqli_query($db, "SELECT * FROM tbl_site_pages WHERE site_pages_status='Active' AND site_pages_show_in_footer='Yes' ORDER BY site_pages_order_by ASC");
                                    if (mysqli_num_rows($link_sql) > 0) {
                                    while ($link_data = mysqli_fetch_array($link_sql)) {
                                    $pgName = $link_data['site_pages_link'];
                                    ?>
                                    <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                                    <?php } }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Our Courses</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <?php
                                    $query = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id = '0' AND category_status='Active' limit 6");
                                    while ($result = mysqli_fetch_array($query)) {
                                        $menu_id = $result['category_id'];
                                        $menu_name = ucwords(strtolower($result['category_name']));
                                        $menu_cat_link = $result['category_url'];
                                    ?>
                                    <li><a href="<?= $wspath?><?=$menu_cat_link?>.html"><?= $menu_name?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Contact Info</h3>
                            <div class="recent-post-wrap">
                                <p class="footer-info"><i class="fal fa-location-dot"></i><?=$general['address']?></p>
                                <?php if($general['email']!=''){ ?>
                                <p class="footer-info"><i class="fal fa-envelope"></i> <a href="mailto:<?=$general['email']?>" class="info-box_link"> <?=$general['email']?></a></p>
                                <?php }?>
                                <?php if($general['alt_email']!=''){ ?>
                                <p class="footer-info"><i class="fal fa-envelope"></i> <a href="mailto:<?=$general['alt_email']?>" class="info-box_link"> <?=$general['alt_email']?></a></p>
                                <?php }?>
                                <?php if($general['phone']!=''){ ?>
                                <p class="footer-info"><i class="fal fa-phone"></i> <a href="tel:<?=$general['phone']?>" class="info-box_link"> <?=$general['phone']?></a></p>
                                <?php }?>
                                <?php if($general['alt_phone']!=''){ ?>
                                <p class="footer-info"><i class="fal fa-phone"></i> <a href="tel:<?=$general['alt_phone']?>" class="info-box_link"> <?=$general['alt_phone']?></a></p>
                                <?php }?>
                                <?php if($general['whatsapp']!=''){ ?>
                                <p class="footer-info"><i class="fab fa-whatsapp"></i> <a href="https://wa.me/<?=$general['whatsapp']?>" target="_blank" class="info-box_link"> Chat With Us</a></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row gy-2 align-items-center">
                    <div class="col-md-7">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> <?= date("Y");?> <?= $site_name;?>. All Rights Reserved. <br>Designed And Developed By <a href="https://www.webkeyindia.com/" target="_blank">WebKeyIndia</a></p>
                    </div>
                    <div class="col-md-5 text-center text-md-end">
                        <div class="th-social">
                            <?php if($general['facebook_link']!=''){ ?>
                            <a href="<?=$general['facebook_link']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <?php }?>
                            <?php if($general['twitter_link']!=''){ ?>
                            <a href="<?=$general['twitter_link']?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            <?php }?>
                            <?php if($general['insta_link']!=''){ ?>
                            <a href="<?=$general['insta_link']?>" target="_blank"><i class="fab fa-instagram"></i></a>
                            <?php }?>
                            <?php if($general['linkedin_link']!=''){ ?>
                            <a href="<?=$general['linkedin_link']?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <?php }?>
                            <?php if($general['youtube_link']!=''){ ?>
                            <a href="<?=$general['youtube_link']?>" target="_blank" class="mt-2"><i class="fab fa-youtube"></i></a>
                            <?php }?>
                            <?php if($general['pinterest_link']!=''){ ?>
                            <a href="<?=$general['pinterest_link']?>" target="_blank" class="mt-2"><i class="fab fa-pinterest"></i></a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <script src="<?= $wspath?>assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="<?= $wspath?>assets/js/app.min.js"></script>
    <script src="<?= $wspath?>assets/js/main.js"></script>
    <!--<script>-->
    <!--    document.addEventListener('contextmenu', function(event) {-->
    <!--        event.stopPropagation();-->
    <!--    }, true);-->

    <!--</script>-->
    <script>
  // Function to enable right-click by removing contextmenu event listeners
  document.addEventListener("DOMContentLoaded", function() {
    document.addEventListener("contextmenu", function(event) {
      event.stopPropagation(); // Prevent other scripts from blocking right-click
      return true; // Allow the default right-click menu
    });

    // Clear other potential right-click blockers
    document.oncontextmenu = null;
    document.body.oncontextmenu = null;
  });
</script>
    
 </body>

</html>