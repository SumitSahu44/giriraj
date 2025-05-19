
<div class=" bg-top-right" data-bg-src="assets/img/bg/brand_bg_2.png">
        <div class="container th-container py-5">
        <div class="title-area text-center pt-4">
            <h2 class="sec-title">Placement Partner</h2>
         </div>
            <div class="swiper th-slider" id="brandSlider2"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"420":{"slidesPerView":"3"},"768":{"slidesPerView":"4"},"992":{"slidesPerView":"5"},"1200":{"slidesPerView":"6"},"1400":{"slidesPerView":"8"}}}'>
                <div class="swiper-wrapper">
                       <?php 
                                        $sql = "SELECT * FROM `tbl_clients` ORDER BY cl_order ASC";
                                        $run = mysqli_query($db,$sql) or die("Query Not run");
                                        $count=0;
                                        while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                    ?>
                    <div class="swiper-slide">
                        <div class="brand-box"><img src="<?=$wspath?>wkiadmin/images/client/<?php echo $data['cl_image']?>"
                        alt="<?php echo $data['cl_title']?>" title="<?php echo $data['cl_title']?>"></div>
                    </div>
                   <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>