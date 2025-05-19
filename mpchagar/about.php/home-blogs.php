
 <?php
        $datablog = mysqli_query($db, "select * from tbl_blog where blog_status='Active' ORDER BY blog_order LIMIT 4");
        if(mysqli_num_rows($datablog)>0){
    ?>
    <?php $blogpage = mysqli_fetch_assoc(mysqli_query($db, "select * from tbl_site_pages where site_pages_link='blogs' "));?>
<section class="space" id="blog-sec" data-bg-src="assets/img/bg/blog_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg">
                    <div class="title-area text-center text-lg-start"><span class="sub-title"><img
                                src="assets/img/theme-img/title_icon.svg" alt="shape">Our News & Events</span>
                        <h2 class="sec-title">Our Latest News & Events</h2>
                    </div>
                </div>
                <div class="col-lg-auto d-none d-lg-block">
                    <div class="sec-btn"><a href="<?=$wspath?><?=$blogpage['site_pages_link']?>.html" class="th-btn style4">View All Post</a></div>
                </div>
            </div>
            <div class="slider-area">
                <div class="swiper th-slider has-shadow" id="blogSlider1"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                        <?php
	              while($blogs=mysqli_fetch_array($datablog)){
	              $formatted_date = date('d M, Y', strtotime($blogs['datetime']));
	              $count++;
	            ?>
                        <div class="swiper-slide">
                            <div class="blog-card">
                                <div class="blog-img"><img src="<?=$wspath?>wkiadmin/images/blog/<?= $blogs['blog_image'];?>" alt="<?= $blogs['blog_title'];?>" title="<?= $blogs['blog_title'];?>"></div>
                                <div class="blog-content">
                                    <div class="blog-meta"><a href="<?=$wspath?>blog<?= $blogs['slug_link'];?>.html"><i class="fal fa-user"></i>By Admin</a>
                                        <a href="<?=$wspath?>blog<?= $blogs['slug_link'];?>.html"><i class="fal fa-calendar"></i><?= $formatted_date?></a></div>
                                    <h3 class="box-title"><a href="<?=$wspath?>blog<?= $blogs['slug_link'];?>.html"><?= $blogs['blog_title'];?></a></h3>
                                    <a href="<?=$wspath?>blog<?= $blogs['slug_link'];?>.html"
                                        class="th-btn btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        <? } ?>
                        
                    </div>
                </div><button data-slider-prev="#blogSlider1" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button> <button data-slider-next="#blogSlider1"
                    class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section>
        <? } ?>