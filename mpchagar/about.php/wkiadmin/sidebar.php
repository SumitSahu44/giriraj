<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
       <div class="logo-icon">
          <img src="images/<?= $general['header_logo'];?>" class="logo-img" alt="<?=$_SESSION['user']['name']?>">
       </div>
       <div class="logo-name flex-grow-1">
          <h5 class="mb-0"><?=$_SESSION['user']['name']?></h5>
       </div>
       <div class="sidebar-close">
          <span class="material-icons-outlined">close</span>
       </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
    <?php if (isset($_SESSION['user'])) { ?>
        <ul class="metismenu" id="sidenav">
            <li>
               <a href="index.php">
                  <div class="parent-icon"><i class="material-icons-outlined">home</i>
                  </div>
                  <div class="menu-title">Dashboard</div>
               </a>
            </li>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '01') !== false) {
      echo '<li>
               <a href="manage-slider.php">
                  <div class="parent-icon"><i class="fadeIn animated bx bx-image"></i>
                  </div>
                  <div class="menu-title">Manage Slider</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '02') !== false) {
      echo '<li>
               <a href="javascript:;" class="has-arrow">
                  <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                  </div>
                  <div class="menu-title">Products/Services</div>
               </a>
               <ul>
                  <!--<li><a href="addedit_product.php?category_parent_id=0"><i class="material-icons-outlined">arrow_right</i>Add Product</a>-->
                  <!--</li>-->
                  <li><a href="product_list.php"><i class="material-icons-outlined">arrow_right</i>Service Category</a></li>
                  <!--<li><a href="manage-subproduct.php"><i class="material-icons-outlined">arrow_right</i>Sub Service</a></li>
                  <li><a href="customer_list.php"><i class="material-icons-outlined">arrow_right</i>Customers</a></li>-->
                  <li><a href="manage_enquiry.php"><i class="material-icons-outlined">arrow_right</i>Manage Enquiries</a></li>
                  <!--<li><a href="order_list.php"><i class="material-icons-outlined">arrow_right</i>Orders</a></li>-->
                  <!--<li><a href="ecommerce-order-details.html"><i class="material-icons-outlined">arrow_right</i>Order Details</a></li>-->
               </ul>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '03') !== false) {
      echo '<li>
               <a href="static_page_list.php">
                  <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                  </div>
                  <div class="menu-title">Manage Static Pages</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '04') !== false) {
      echo '<li>
               <a href="manage-team.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Team</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '05') !== false) {
      echo '<li>
               <a href="manage-clients.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Clients</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '06') !== false) {
      echo '<li>
               <a href="manage-testimonial.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Testimonials</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '07') !== false) {
      echo '<li>
               <a href="manage_faq.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage FAQs</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '08') !== false) {
      echo '<li>
               <a href="manage-factfigure.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Facts/Figures</div>
               </a>
            </li>';
        } ?>
            
            <!--<li>-->
            <!--  <a href="javascrpt:;">-->
            <!--    <div class="parent-icon"><i class="material-icons-outlined">description</i>-->
            <!--    </div>-->
            <!--    <div class="menu-title">Manage Why Choose Us</div>-->
            <!--  </a>-->
            <!--</li>-->
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '09') !== false) {
      echo '<li>
               <a href="javascript:;" class="has-arrow">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Photo Gallery</div>
               </a>
               <ul>
                  <li><a href="manage_gallery_category.php"><i class="material-icons-outlined">arrow_right</i>Gallery Category</a>
                  </li>
                  <li><a href="manage_photo_gallery.php"><i class="material-icons-outlined">arrow_right</i>Gallery Images</a>
                  </li>
               </ul>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '10') !== false) {
      echo '<li>
               <a href="javascript:;" class="has-arrow">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Video Gallery</div>
               </a>
               <ul>
                  <li><a href="manage_gallery_category.php"><i class="material-icons-outlined">arrow_right</i>Video Gallery Category</a>
                  </li>
                  <li><a href="manage_video_gallery.php"><i class="material-icons-outlined">arrow_right</i>Video Gallery</a>
                  </li>
               </ul>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '11') !== false) {
      echo '<li>
               <a href="manage-certificates.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Certificates</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '12') !== false) {
      echo '<li>
               <a href="manage-industries.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Industries </div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '13') !== false) {
      echo '<li>
               <a href="javascript:;" class="has-arrow">
                  <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                  </div>
                  <div class="menu-title">Manage Location</div>
               </a>
               <ul>
                  <li><a href="manage-location.php"><i class="material-icons-outlined">arrow_right</i>Location</a></li>
                  <li><a href="manage-sublocation.php"><i class="material-icons-outlined">arrow_right</i>Sub Location</a></li>
               </ul>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '14') !== false) {
      echo '<li>
               <a href="manage-seo.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Seo </div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '15') !== false) {
      echo '<li>
               <a href="general-setting.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">General Setting</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '16') !== false) {
      echo '<li>
               <a href="manage-subadmin.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Sub Admin </div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '17') !== false) {
      echo '<li>
               <a href="manage_blogs.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Blogs </div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '18') !== false) {
      echo '<li>
               <a href="manage-externallinks.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage External Links </div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '19') !== false) {
      echo '<li>
               <a href="manage-packages.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Packages </div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '20') !== false) {
      echo '<li>
               <a href="manage-sitecolors.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title">Manage Site Colours</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '21') !== false) {
      echo '<li>
               <a href="manage-sitedown.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title"> Site Down</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '22') !== false) {
      echo '<li>
               <a href="manage-backupfiles.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title"> Site Backup</div>
               </a>
            </li>';
        } ?>
            
            <?php if ($_SESSION['user']['user_type'] == 'supadmin' || strpos($_SESSION['user']['admin_access'], '23') !== false) {
      echo '<li>
               <a href="change-password.php">
                  <div class="parent-icon"><i class="material-icons-outlined">description</i>
                  </div>
                  <div class="menu-title"> Chnage Password </div>
               </a>
            </li>';
        } ?>
            
        </ul>
    <?php } ?>
       <!--end navigation-->
    </div>
</aside>