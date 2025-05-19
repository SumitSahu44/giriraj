<?php include "header.php";?>

    <div class="breadcumb-wrapper" data-bg-src="<?=$wspath?>assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">Our Gallery</h1>
        <ul class="breadcumb-menu">
          <li><a href="<?=$wspath?>">Home</a></li>
          <li>Our Gallery</li>
        </ul>
      </div> 
    </div>
  </div>
        <?php
        $datagallery = mysqli_query($db, "select * from tbl_photo_gallery where photo_status='Active' ORDER BY photo_order LIMIT 9");
        if(mysqli_num_rows($datagallery)>0){
    ?>
    <?php $datagal = mysqli_fetch_assoc(mysqli_query($db, "select * from tbl_site_pages where site_pages_link='photo-gallery' "));?>
    <div class="space">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title4"><img src="assets/img/theme-img/title_icon.svg"
                        alt="shape">Portfolio cases</span>
            </div>
            <div class="row gy-4 masonary-active gallery-row2">
                <?php
	              while($gallery=mysqli_fetch_array($datagallery)){
	            ?>
                <div class="filter-item col-xl-4 col-md-6">
                    <div class="gallery-card style2">
                        <div class="box-img"><img src="<?=$wspath?>wkiadmin/images/gallery/<?= $gallery['photo_image'];?>" 
                        alt="<?= $gallery['photo_title'];?>" title="<?= $gallery['photo_title'];?>">
                            <div class="shape"> 
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                        <div class="box-content"><a href="<?=$wspath?>wkiadmin/images/gallery/<?= $gallery['photo_image'];?>"
                                class="icon-btn style2 popup-image"><i class="far fa-eye"></i></a>
                           
                        </div>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
     <? } ?>
    
    <?php include "footer.php";?>
