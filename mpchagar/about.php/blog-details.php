<?php
    include_once('site-main-query.php');
    $slug_link = $_REQUEST['slug_link'] ?? null;
    if(isset($_SERVER['PATH_INFO'])){
    $slug_link=$_SERVER['PATH_INFO'];
    $querydt="SELECT * FROM `tbl_blog` WHERE `slug_link`='$slug_link'";
    $rundt = mysqli_query($db,$querydt) or die("Query Not run");
    $datadt = mysqli_fetch_assoc($rundt);
 }
 $formatted_date = date('d M, Y', strtotime($datadt['datetime']));
?>
    <?php include "header.php";?>

    <div class="breadcumb-wrapper" data-bg-src="<?=$wspath?>assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title"><?=$datadt['blog_title']?></h1>
        <ul class="breadcumb-menu">
          <li><a href="<?=$wspath?>">Home</a></li>
          <li><?=$datadt['blog_title']?></li>
        </ul>
      </div> 
    </div>
  </div>
     
     <section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xxl-8 col-lg-7">
          <div class="th-blog blog-single">
            <div class="blog-img"><img src="<?=$wspath?>wkiadmin/images/blog/<?=$datadt['blog_image']?>" alt="<?=$datadt['blog_title']?>" title="<?=$datadt['blog_title']?>"></div>
            <div class="blog-content">
              <div class="blog-meta"><a class="author" href="#"><i class="fal fa-user"></i>By Admin</a> <a
                  href="blog.html"><i class="fal fa-calendar"></i><?=$formatted_date?></a></div>
              <h2 class="blog-title"><?=$datadt['blog_title']?></h2>
              <p><?=$datadt['long_description']?></p>
            </div>
          </div> 
         
        </div>
        <div class="col-xxl-4 col-lg-5">
          <aside class="sidebar-area">
           
            <div class="widget widget_categories">
              <h3 class="widget_title">Categories</h3>
              <ul>
                <?php
                    $ids=$datadt['blog_id'];
                    $datablog = mysqli_query($db, "select * from tbl_blog where blog_status='Active' AND blog_id!=$ids ORDER BY blog_order");
                    if(mysqli_num_rows($datablog)>0){
                    while($blogs=mysqli_fetch_array($datablog)){
	                $formatted_dates = date('d M, Y', strtotime($blogs['datetime']));
                ?>
                <li><a href="<?=$wspath?>blog<?= $blogs['slug_link'];?>.html"><?= $blogs['blog_title'];?></a></li>
                <? } } ?>
              </ul>
            </div>
           
          </aside>
        </div>
      </div>
    </div>
  </section>
    
    <?php include "footer.php";?>
