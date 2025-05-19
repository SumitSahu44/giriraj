<?php include "header.php";?>
 
    <div class="breadcumb-wrapper" data-bg-src="<?=$wspath?>assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">News & Events</h1>
        <ul class="breadcumb-menu">
          <li><a href="<?=$wspath?>">Home</a></li>
          <li>News & Events</li>
        </ul>
      </div> 
    </div>
  </div>
    <?php
        $datablog = mysqli_query($db, "select * from tbl_blog where blog_status='Active' ORDER BY blog_order");
        if(mysqli_num_rows($datablog)>0){
    ?>
    <?php $blogpage = mysqli_fetch_assoc(mysqli_query($db, "select * from tbl_site_pages where site_pages_link='blogs' "));?>
    <section class="space" id="blog-sec" data-bg-src="<?=$wspath?>assets/img/bg/blog_bg_1.jpg">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-lg">
                    <div class="title-area text-center text-lg-start"><span class="sub-title"><img
                                src="assets/img/theme-img/title_icon.svg" alt="shape">News & Events</span>
                        <h2 class="sec-title">Our Latest News & Events</h2>
                    </div>
                </div>
               
            </div>
            
            <div class="row">
                <?php
	              while($blogs=mysqli_fetch_array($datablog)){
	              $formatted_date = date('d M, Y', strtotime($blogs['datetime']));
	              $count++;
	            ?>
                    
                        <div class="col-lg-4">
                            <div class="blog-card">
                                <div class="blog-img"><img src="<?=$wspath?>wkiadmin/images/blog/<?= $blogs['blog_image'];?>" 
                                alt="<?= $blogs['blog_title'];?>" 
                                title="<?= $blogs['blog_title'];?>"></div>
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
        </div>
    </section>
    <? } ?>
    <?php include "footer.php";?>

