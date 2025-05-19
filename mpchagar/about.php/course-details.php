
    <?php include "header.php";?>
    <?php
        $category_ids=$category_title['category_id'];
        $main_cat = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_id = '$category_ids'");
        $result_main = mysqli_fetch_array($main_cat);
        
        $category_parent_ids=$result_main['category_parent_id'];
        
        // $subcat = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id != '0' and category_status='Active'"));
    ?>
    <div class="breadcumb-wrapper" data-bg-src="<?=$wspath?>assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title"><?=str_replace("LOCATION",$locationName,$result_main['category_displayname'])?></h1>
        <ul class="breadcumb-menu">
          <li><a href="<?=$wspath?>">Home</a></li>
          <li><?=str_replace("LOCATION",$locationName,$result_main['category_displayname'])?></li> 
        </ul>
      </div> 
    </div>
  </div>
     
    <section class="space-top space-extra-bottom">
    <div class="container">
      <div class="row flex-row-reverse">
        <div class="col-xxl-8 col-lg-8">
          <div class="page-single single-right mb-30">
            <div class="page-img"><img src="<?=$wspath?>wkiadmin/images/services/<?=$result_main['category_image_name']?>" 
            alt="<?=str_replace("LOCATION",$locationName,$result_main['category_displayname'])?>" title="<?=str_replace("LOCATION",$locationName,$result_main['category_displayname'])?>"></div>
            <div class="page-content">
              <h2 class="page-title"><?=$result_main['category_name']?></h2>
              <p class=""><?=str_replace("LOCATION",$locationName,$result_main['category_description_long'])?></p>
              
            
             <!--<div class="accordion mt-40" id="faqAccordion">-->
             <!--   <div class="accordion-card">-->
             <!--     <div class="accordion-header" id="collapse-item-1"><button class="accordion-button" type="button"-->
             <!--         data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true"-->
             <!--         aria-controls="collapse-1">What is nobel coronavirus?</button></div>-->
             <!--     <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1"-->
             <!--       data-bs-parent="#faqAccordion">-->
             <!--       <div class="accordion-body">-->
             <!--         <p class="faq-text">Either waxed or unwaxed floss will do the job. Using floss picks coordinate-->
             <!--           performance based interdental brushe another easy option clear food and plaque technology with-->
             <!--           quality technologies from between teeth under gumline.</p>-->
             <!--       </div>-->
             <!--     </div>-->
             <!--   </div>-->
             <!--   <div class="accordion-card">-->
             <!--     <div class="accordion-header" id="collapse-item-2"><button class="accordion-button collapsed"-->
             <!--         type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="false"-->
             <!--         aria-controls="collapse-2">Why should I go to the dentist regularly?</button></div>-->
             <!--     <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="collapse-item-2"-->
             <!--       data-bs-parent="#faqAccordion">-->
             <!--       <div class="accordion-body">-->
             <!--         <p class="faq-text">Either waxed or unwaxed floss will do the job. Using floss picks coordinate-->
             <!--           performance based interdental brushe another easy option clear food and plaque technology with-->
             <!--           quality technologies from between teeth under gumline.</p>-->
             <!--       </div>-->
             <!--     </div>-->
             <!--   </div>-->
             <!--   <div class="accordion-card">-->
             <!--     <div class="accordion-header" id="collapse-item-3"><button class="accordion-button collapsed"-->
             <!--         type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="false"-->
             <!--         aria-controls="collapse-3">How can I prevent cavities?</button></div>-->
             <!--     <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="collapse-item-3"-->
             <!--       data-bs-parent="#faqAccordion">-->
             <!--       <div class="accordion-body">-->
             <!--         <p class="faq-text">Either waxed or unwaxed floss will do the job. Using floss picks coordinate-->
             <!--           performance based interdental brushe another easy option clear food and plaque technology with-->
             <!--           quality technologies from between teeth under gumline.</p>-->
             <!--       </div>-->
             <!--     </div>-->
             <!--   </div>-->
             <!-- </div>-->
            </div>
          </div> 
        </div>
        <div class="col-xxl-4 col-lg-4">
          <aside class="sidebar-area">
            <!--<div class="widget widget_search">-->
            <!--  <form class="search-form"><input type="text" placeholder="Enter Keyword"> <button type="submit"><i-->
            <!--        class="far fa-search"></i></button></form>-->
            <!--</div>-->
            <div class="widget widget_categories">
              <h3 class="widget_title">Related Categories</h3>
              <ul>
                <?php
                    $category_ids=$result_main['category_id'];
                    $parent_id=$result_main['category_parent_id'];
                    $othmain_cat = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_id!= '$category_ids' AND category_parent_id ='$parent_id' AND category_status='Active'");
                    while($result_othmain = mysqli_fetch_array($othmain_cat)){
                ?>
                <li><a href="<?=$wspath?><?=$result_othmain['category_url']?>.html"><?=$result_othmain['category_name']?></a></li>
                <?php } ?>
              </ul>
            </div>
            
          </aside>
          <?php
            $category_ids=$result_main['category_id'];
            $parent_id=$result_main['category_parent_id'];
            $othmain_cat = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id = '$category_ids'");
            if($othmain_cat < 0){
          ?>
          <aside class="sidebar-area">
            <!--<div class="widget widget_search">-->
            <!--  <form class="search-form"><input type="text" placeholder="Enter Keyword"> <button type="submit"><i-->
            <!--        class="far fa-search"></i></button></form>-->
            <!--</div>-->
            <div class="widget widget_categories">
              <h3 class="widget_title">Our Services</h3>
              <ul>
                <?php
                    while($result_othmain = mysqli_fetch_array($othmain_cat)){
                ?>
                <li><a href="<?=$wspath?><?=$result_othmain['category_url']?>.html"><?=$result_othmain['category_name']?></a></li>
                <?php } ?>
              </ul>
            </div>
            
          </aside>
          <? } ?>
        </div>
      </div>
    </div>
  </section>
     
    
    <?php include "footer.php";?>
