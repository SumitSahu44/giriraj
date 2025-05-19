<section class="bg-top-center space-top" id="team-sec" data-bg-src="assets/img/bg/team_bg_1.jpg">
        <div class="container z-index-common">
            <div class="title-area text-center"><span class="sub-title"><img src="assets/img/theme-img/title_icon.svg"
                        alt="Icon">Our Team</span>
                <h2 class="sec-title">Meet Our Expert Team Members</h2>
            </div>
            <div class="swiper th-slider has-shadow" id="teamSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
                <div class="swiper-wrapper">
                    <?php 
                                        $sqlteam = "SELECT * FROM `tbl_team` ORDER BY team_order ASC";
                                        $runteam = mysqli_query($db,$sqlteam) or die("Query Not run");
                                        $count=0;
                                        while($datateam = mysqli_fetch_assoc($runteam)){
                                        $count++;
                                    ?>
                    <div class="swiper-slide"> 
                        <div class="th-team team-card">
                            <div class="box-img"><img src="<?=$wsapth?>wkiadmin/images/team/<?php echo $datateam['team_image']?>"
                            alt="<?php echo $datateam['team_name']?>" title="<?php echo $datateam['team_name']?>">
                               
                            </div>
                            <h3 class="box-title"><?php echo $datateam['team_name']?></h3><span
                                class="team-desig"><?php echo $datateam['team_designation']?></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>