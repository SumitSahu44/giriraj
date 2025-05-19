<?php include "header.php";?>

    <div class="breadcumb-wrapper" data-bg-src="<?=$wspath?>assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">Our Courses</h1>
        <ul class="breadcumb-menu">
          <li><a href="home-medical-clinic.html">Home</a></li>
          <li>Our Courses</li> 
        </ul>
      </div> 
    </div>
  </div>
    <style>
        #service-sec .col-lg-4{
            margin-bottom:20px;
        }
    </style>
    
    <section class="space" id="service-sec" data-bg-src="<?=$wspath?>assets/img/bg/service_bg_3.jpg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md"> 
                    <div class="title-area text-center text-md-start">
                        <h2 class="sec-title">Courses At Maa Pitambara College</h2>
                    </div> 
                </div>
                
            </div>
             <div class="row ">
                    <?php 
                        $sql = "SELECT * FROM `tbl_category` WHERE category_parent_id=0 AND category_status='Active' ORDER BY category_order_by ASC";
                        $run = mysqli_query($db,$sql) or die("Query Not run");
                        $count=0;
                        while($data = mysqli_fetch_assoc($run)){
                        $count++;
                    ?>
                        <div class="col-lg-4"> 
                            <div class="service-grid">
                                <div class="box-shape"><img src="<?=$wspath?>assets/img/bg/service_grid_shape.png" 
                                alt="<?php echo $data['category_name']?>" title="<?php echo $data['category_name']?>">
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
        </div>
    </section>
    
    <?php include "footer.php";?>
