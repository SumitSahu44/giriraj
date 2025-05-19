    <?php
        $datatest = mysqli_query($db, "select * from tbl_testimonial where tes_status='Active'");
        if(mysqli_num_rows($datatest)>0){
    ?>
    <?php $datatesti = mysqli_fetch_assoc(mysqli_query($db, "select * from tbl_site_pages where site_pages_link='testimonial' "));?>
<section class="space" id="testi-sec" data-bg-src="assets/img/bg/testi_bg_6.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 text-center text-xl-start">
                    <div class="pe-xxl-5 mb-40 mb-xl-0">
                        <div class="title-area mb-32"><span class="sub-title4"><img
                                    src="assets/img/theme-img/title_icon.svg" alt="shape">Testimonials</span>
                            <h2 class="sec-title text-white">What Our Students Say</h2>
                            <p class="sec-text text-white">
                                    Embark on a journey of transformation with MA PITAMBARA COLLEGE, where satisfied students share their heartfelt testimonials. Experience the confidence and joy that come with our expert care and personalized approach to nursing education. Let us help you achieve the career you've always dreamed of!</p>
                        </div>
                        <div class="btn-group justify-content-center">
                            <div class="icon-box"><button data-slider-prev="#testiSlide1"
                                    class="slider-arrow default"><i class="far fa-arrow-left"></i></button> <button
                                    data-slider-next="#testiSlide1" class="slider-arrow default"><i
                                        class="far fa-arrow-right"></i></button></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="swiper th-slider has-shadow" id="testiSlide1" data-slider-options="{}">
                        <div class="swiper-wrapper">
                        <?php
	                      while($testimonial=mysqli_fetch_array($datatest)){
	                      $count++;
	                    ?>
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    <div class="box-quote"><img src="assets/img/icon/quote_5.png" alt="Icon"></div>
                                    <p class="box-text"><?= $testimonial['tes_description'];?></p>
                                    <h3 class="box-title"><?= $testimonial['tes_name'];?></h3>
                                    <p class="box-desig"><?= $testimonial['tes_designation'];?></p>
                                    <div class="box-review"><?php
                                    $rating = $testimonial['tes_rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                        } else {
                                            echo '<i class="fa-sharp fa-regular fa-star"></i>';
                                        }
                                    }
                                    ?></div>
                                    <div class="box-img"><img src="<?=$wspath?>wkiadmin/images/testimonial/<?= $testimonial['tes_image'];?>" 
                                    alt="<?= $testimonial['tes_name'];?>" 
                                    title="<?= $testimonial['tes_name'];?>">
                                    </div>
                                </div>
                            </div>
                            <? } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? } ?>