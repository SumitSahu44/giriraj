  
    <section class="space" id="service-sec" data-bg-src="<?=$wspath?>assets/img/bg/service_bg_3.jpg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md">
                    <div class="title-area text-center text-md-start"><span class="sub-title3">Our Courses</span>
                        <h2 class="sec-title">Courses At Maa Pitambara College</h2>
                    </div> 
                </div>
                <div class="col-md-auto">
                    <div class="sec-btn"><a href="<?=$wspath?>courses.html" class="th-btn">View More Courses</a></div>
                </div>
            </div>
            <div class="slider-area"> 
                <div class="swiper th-slider has-shadow" id="serviceSlider3"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                    <div class="swiper-wrapper">
                         <?php 
                        $sql = "SELECT * FROM `tbl_category` WHERE category_parent_id=0 AND category_status='Active' ORDER BY category_order_by ASC";
                        $run = mysqli_query($db,$sql) or die("Query Not run");
                        $count=0;
                        while($data = mysqli_fetch_assoc($run)){
                        $count++;
                    ?>
                        <div class="swiper-slide">
                            <div class="service-grid">
                                <div class="box-shape"><img src="assets/img/bg/service_grid_shape.png" alt="image">
                                </div>
                                <div class="box-img">
                                    <div class="img"><img class="w-100" src="<?=$wspath?>wkiadmin/images/services/<?php echo $data['category_image_name']?>"
                                            alt="<?php echo $data['category_name']?>" title="<?php echo $data['category_name']?>"></div>
                                 
                                </div>
                                <div class="box-content">
                                    <h3 class="box-title"><a href="<?=$wspath?><?=$data['category_url']?>.html"><?php echo $data['category_name']?></a></h3>
                                    <p class="box-text"><?php echo $data['category_short_description']?></p><a href="<?=$wspath?><?=$data['category_url']?>.html" class="th-btn btn-sm style2">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                         <?php } ?> 
                        
                    </div>
                </div><button data-slider-prev="#serviceSlider3" class="slider-arrow slider-prev"><i
                        class="far fa-arrow-left"></i></button> <button data-slider-next="#serviceSlider3"
                    class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
            </div>
        </div>
    </section> 