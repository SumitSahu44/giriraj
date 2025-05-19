<?php include "top-links.php"?>

<div class="sidemenu-wrapper sidemenu-info">
    <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
        <div class="widget">
            <div class="th-widget-about">
                <div class="about-logo"><a href="#"><img src="assets/imgs/mapitambari-logo.png" alt="Mediax"></a></div>
                <p class="about-text">Welcome to MA Pitambara College of Nursing, offering top-notch medical education with global affiliations and modern facilities.</p>
                <p class="footer-info"><i class="fal fa-location-dot"></i> <?=$general['address']?></p>
                <p class="footer-info"><i class="fal fa-envelope"></i> <a href="mailto:<?=$general['email']?>" class="info-box_link"><?=$general['email']?></a></p>
                <p class="footer-info"><i class="fal fa-phone"></i> <a href="tel:<?=$general['phone']?>" class="info-box_link"><?=$general['phone']?></a></p>
                <div class="th-social">
                    <?php if($general['facebook_link']!=''){ ?>
                    <a href="<?=$general['facebook_link']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <?php }?>
                    <?php if($general['twitter_link']!=''){ ?>
                    <a href="<?=$general['twitter_link']?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <?php }?>
                    <?php if($general['insta_link']!=''){ ?>
                    <a href="<?=$general['insta_link']?>" target="_blank"><i class="fab fa-instagram"></i></a>
                    <?php }?>
                    <?php if($general['linkedin_link']!=''){ ?>
                    <a href="<?=$general['linkedin_link']?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    <?php }?>
                    <?php if($general['youtube_link']!=''){ ?>
                    <a href="<?=$general['youtube_link']?>" target="_blank" class="mt-2"><i class="fab fa-youtube"></i></a>
                    <?php }?>
                    <?php if($general['pinterest_link']!=''){ ?>
                    <a href="<?=$general['pinterest_link']?>" target="_blank" class="mt-2"><i class="fab fa-pinterest"></i></a>
                    <?php }?>
                </div>
            </div>
        </div>
       
    </div>
</div>
<!--<div class="popup-search-box d-none d-lg-block"><button class="searchClose"><i class="fal fa-times"></i></button>-->
<!--    <form action="#"><input type="text" placeholder="What are you looking for?"> -->
<!--    <button type="submit"><i class="fal fa-search"></i></button>-->
<!--    </form>-->
<!--</div>-->

<div class="th-menu-wrapper">
    <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="<?= $wspath?>"><img src="<?= $wspath?>wkiadmin/images/<?= $general['header_logo'];?>" alt="<?=$site_name?>" title="<?=$site_name?>"></a>
        </div>
            <?php
                $link_sql = mysqli_query($db, "SELECT * FROM tbl_site_pages WHERE site_pages_status='Active' AND site_pages_show_in_header='Yes' ORDER BY site_pages_order_by ASC");
                if (mysqli_num_rows($link_sql) > 0) {
                $count = 0;
            ?>
            <div class="th-mobile-menu">
                <ul>
                    <?php 
                        while ($link_data = mysqli_fetch_array($link_sql)) {
                        $pgName = $link_data['site_pages_link'];
                        $count++;
                        if ($count <= 6) {
                    ?>
                        <?php if ($pgName == 'index') { ?>
                        <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                        
                        <?php } elseif ($pgName == 'services' || $pgName == 'products' || $pgName == 'courses') { ?>
                        <li class="menu-item-has-children"><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a>
                            <ul class="sub-menu">
                                <?php
                                function fetch_header_menu($category_parent_id, $db) {
                                    global $loca_url;
                                
                                    $sitepath = mysqli_fetch_assoc(mysqli_query($db, "SELECT site_path FROM tbl_seo WHERE 1"));
                                    $wspath = $sitepath['site_path'];
                                    $query = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id = '$category_parent_id' AND category_status='Active'");
                                    
                                    while ($result = mysqli_fetch_array($query)) {
                                        $menu_id = $result['category_id'];
                                        $menu_name = ucwords(strtolower($result['category_name']));
                                        $menu_url = $result['category_url'];
                                        if (!empty($loca_url)) {
                                            $menu_cat_link = "$wspath{$loca_url}/$menu_url.html";
                                        } else {
                                            $menu_cat_link = "$wspath$menu_url.html";
                                        }
                                        
                                        $has_children = mysqli_num_rows(mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id = '$menu_id'")) > 0;
                                        $menuClass = $has_children ? "sub-menu" : "";
                                
                                        echo "<li><a href='$menu_cat_link'>{$menu_name}</a>";
                                        
                                        if ($has_children) {
                                            echo "<ul class='{$menuClass}'>";
                                            fetch_header_menu($menu_id, $db);
                                            echo "</ul>";
                                        }
                                        echo "</li>";
                                    }
                                }
                                
                                // Call the function to generate the menu
                                fetch_header_menu(0, $db);
                                ?>
                            </ul>
                        </li>
                        <?php } elseif ($pgName == 'admission') { ?>
                        <li class="menu-item-has-children"><a href="#"><?=$link_data['site_pages_name']?></a>
                            <ul class="sub-menu">
                                <li><a href='<?=$wspath?>assets/imgs/ADMISSION_INFORMATION.pdf' target="_blank">Admission Information</a></li>
                                <li><a href='<?=$wspath?>assets/imgs/FEE_STRACTURE.pdf' target="_blank">Fee Structure</a></li>
                                <?php
                                    // $queryad = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id = '$category_parent_id' AND category_status='Active'");
                                    
                                    // while ($resultad = mysqli_fetch_array($queryad)) {
                                    //     $adname=$result['category_name'];
                                    //     $adurl=$result['category_url'];
                                        
                                    //     echo "<li><a href='$adurl'>{$adname}</a></li>";
                                    // }
                                ?>
                            </ul>
                        </li>
                        <?php } else { ?>
                        <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                        <?php } ?>
                        
                    <?php 
                        } else {
                            if ($count == 7) {
                    ?>
                        <li class="menu-item-has-children"><a href="#">More</a>
                            <ul class="sub-menu">
                                <?php } ?>
                                <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                                <?php 
                                if (mysqli_num_rows($link_sql) == $count) {
                                ?>
                            </ul>
                        </li>
                    <?php 
                            }
                        }
                    } 
                    ?>
                    <button class="btn btn btn-primary mt-2"><a style="color:#fefefe" href="<?=$wspath?>contact.html">Admission Now</a></button>
                </ul>
            </div>
            <?php 
            } 
            ?>
    </div>
</div>
<header class="th-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li class="d-none d-sm-inline-block"><i class="fas fa-phone icon-btn"></i><b>Phone:</b>
                                <a href="tel:<?=$general['phone']?>"><?=$general['phone']?> </a>
                            </li>
                            <li class="d-none d-sm-inline-block"><i class="fas fa-envelope icon-btn"></i><b>Email:</b>
                                <a href="mailto:<?=$general['email']?>"><?=$general['email']?></a>
                            </li>
                            <li class="d-none d-xxl-inline-block"><i class="fas fa-location-dot icon-btn"></i><?=$general['address']?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-links">
                        <ul>
                            <li>
                                <div class="social-links"><span class="social-title">Follow Us On: </span>
                                    <?php if($general['facebook_link']!=''){ ?>
                                    <a href="<?=$general['facebook_link']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <?php }?>
                                    <?php if($general['twitter_link']!=''){ ?>
                                    <a href="<?=$general['twitter_link']?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                    <?php }?>
                                    <?php if($general['insta_link']!=''){ ?>
                                    <a href="<?=$general['insta_link']?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <?php }?>
                                    <?php if($general['linkedin_link']!=''){ ?>
                                    <a href="<?=$general['linkedin_link']?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <?php }?>
                                    <?php if($general['youtube_link']!=''){ ?>
                                    <a href="<?=$general['youtube_link']?>" target="_blank" class="mt-2"><i class="fab fa-youtube"></i></a>
                                    <?php }?>
                                    <?php if($general['pinterest_link']!=''){ ?>
                                    <a href="<?=$general['pinterest_link']?>" target="_blank" class="mt-2"><i class="fab fa-pinterest"></i></a>
                                    <?php }?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <div class="logo-bg" data-bg-src="<?= $wspath?>assets/img/bg/logo_bg_1.png"></div>
                            <a href="<?= $wspath?>"><img src="<?= $wspath?>wkiadmin/images/<?= $general['header_logo'];?>" alt="<?=$site_name?>" title="<?=$site_name?>"></a>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-inline-block">
                        <?php
                        $link_sql = mysqli_query($db, "SELECT * FROM tbl_site_pages WHERE site_pages_status='Active' AND site_pages_show_in_header='Yes' ORDER BY site_pages_order_by ASC");
                        if (mysqli_num_rows($link_sql) > 0) {
                        $count = 0;
                        ?>
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <?php 
                                  while ($link_data = mysqli_fetch_array($link_sql)) {
                                      $pgName = $link_data['site_pages_link'];
                                      $count++;
                                      if ($count <= 6) {
                                ?>
                                <?php if ($pgName == 'index') { ?>
                                        <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                                        
                                        <?php } elseif ($pgName == 'services' || $pgName == 'products' || $pgName == 'courses') { ?>
                                        <li class="menu-item-has-children"><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a>
                                            <ul class="sub-menu">
                                                <?php
                                                fetch_header_menu(0, $db);
                                                ?>
                                            </ul>
                                        </li>
                                        <?php } elseif ($pgName == 'admission') { ?>
                                        <li class="menu-item-has-children"><a href="#"><?=$link_data['site_pages_name']?></a>
                                            <ul class="sub-menu">
                                                <li><a href='<?=$wspath?>assets/imgs/ADMISSION_INFORMATION.pdf' target="_blank">Admission Information</a></li>
                                                <li><a href='<?=$wspath?>assets/imgs/FEE_STRACTURE.pdf' target="_blank">Fee Structure</a></li>
                                                <?php
                                                    // $queryad = mysqli_query($db, "SELECT * FROM tbl_category WHERE category_parent_id = '$category_parent_id' AND category_status='Active'");
                                                    
                                                    // while ($resultad = mysqli_fetch_array($queryad)) {
                                                    //     $adname=$result['category_name'];
                                                    //     $adurl=$result['category_url'];
                                                        
                                                    //     echo "<li><a href='$adurl'>{$adname}</a></li>";
                                                    // }
                                                ?>
                                            </ul>
                                        </li>
                                        <?php } else { ?>
                                        <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                                        <?php } ?>
                                        
                                    <?php 
                                        } else {
                                            if ($count == 7) {
                                    ?>
                                        <li class="menu-item-has-children"><a href="#">More</a>
                                            <ul class="sub-menu">
                                    <?php } ?>
                                                <li><a href="<?=$wspath?><?=$link_data['site_pages_link']?>.html"><?=$link_data['site_pages_name']?></a></li>
                                    <?php 
                                        if (mysqli_num_rows($link_sql) == $count) {
                                    ?>
                                    </ul>
                                        </li>
                                    <?php 
                                            }
                                        }
                                    } 
                                    ?>
                                <button class="btn btn btn-primary"><a style="color:#fefefe" href="<?=$wspath?>contact.html">Admission Now</a></button>
                            </ul>
                        </nav>
                        <? } ?>
                    </div>
                    <div class="col-auto">
                        <div class="header-button">
                           <!--<a href="#" class="th-btn">Appointment Now</a> -->
                            <button type="button" class="icon-btn sideMenuInfo d-none d-xl-inline-block">
                               <i class="far fa-bars"></i>
                            </button> 
                            <button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>