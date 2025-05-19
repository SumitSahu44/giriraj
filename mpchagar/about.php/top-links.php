<?php 
    ob_start();
    include("site-main-query.php");
    $page_name=basename($_SERVER['PHP_SELF'],'.php');
    if($compsitedown['site_down']=='Yes'){
     header("location:site-down.php");
     exit;
    }
    $wspath=$compseo['site_path'];
    $site_name=$compseo['site_name'];
    $locationName=$compseo['site_default_location'];
    
    $author = str_replace("http://","","$wspath");
    $full_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    $loc_url = $_REQUEST['loc_url'] ?? null;
    // echo $loc_urlexit;
    $prdct_name = $_REQUEST['cat_name'] ?? null;
    
    $blog_name = $_REQUEST['slug_link'] ?? null;
    // echo $prdct_name;exit;
    $locationn=mysqli_fetch_assoc(mysqli_query($db,"select location_id from tbl_location where 1 and location_url='$loc_url'"));
    $loca_id=$locationn['location_id'];
    
    if($loca_id!="") {
      $local_name=mysqli_fetch_assoc(mysqli_query($db,"select * from tbl_location where 1 and location_id='$loca_id'"));
      $loca_name=$local_name['location_name'];
      $loca_url=$local_name['location_url'];
      $locationName=$loca_name;
    }
    
    $catgoryIDs=mysqli_fetch_assoc(mysqli_query($db,"select category_id from tbl_category where 1 and category_url='$prdct_name'"));
    $catgoryID=$catgoryIDs['category_id'];
    // blogs 
    $blogID=mysqli_fetch_assoc(mysqli_query($db,"select blog_id from tbl_blog where 1 and slug_link='$blog_name'"));
    //************ To Fetch Page Heading ****************//
    $pgHeading=mysqli_fetch_assoc(mysqli_query($db,"select * from tbl_site_pages where 1 and site_pages_status='Active' and site_pages_link='$page_name'"));
    
    $pgHeading1=mysqli_fetch_assoc(mysqli_query($db,"select * from tbl_site_pages where 1 and site_pages_status='Active' and site_pages_link='about' or site_pages_link='about-us'"));
?>
<?php
  function query($pid){
    $query = mysqli_query("select * from tbl_category where 1 and category_parent_id='$pid' and category_status='Active' order by category_order_by asc");
	return $query;
  }  
  function has_child($query){
    $numRows = mysqli_num_rows($query);
	if($numRows > 0){
	return true;
	}else{
	return false;
	}
  }
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

    <?php echo $compseo["index_follow"];?>
    
    <?php if($compseo['site_verification']!=''){ ?>
    <meta name="google-site-verification" content="<?=$compDATA['site_verification']?>" />
    <? } ?>
    
    <?php echo $compseo["google_analytic"]; ?>

    <!-- Favicon -->
    <?php if($compseo['favicon']!=""){?>
    <link rel="shortcut icon" type="image/png" href="<?= $wspath?><?php echo $compseo["favicon"]; ?>"/>
    <?}?>
    
    <?php if(!empty($catgoryID)){?>
    <?php $category_title=mysqli_fetch_assoc(mysqli_query($db,"select * from  tbl_category where category_status='Active' and category_id='$catgoryID'"))?>
    <title><?= str_replace("LOCATION",$locationName,$category_title['category_meta_title']);?></title>
    <meta NAME="description" content="<?= str_replace("LOCATION",$locationName,$category_title['category_meta_description']);?>" />
    
    <meta property="og:title" content="<?= str_replace("LOCATION",$locationName,$category_title['category_meta_title']);?>" />
    <meta property="og:description" content="<?= str_replace("LOCATION",$locationName,$category_title['category_meta_description']);?>" />
    <meta property="og:image" content="<?=$wspath?>wkiadmin/images/<?=$pgHeading1['site_pages_image_name']?>" />
    <meta property="og:url" content="<?=$full_url?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $site_name;?>" />
    <meta property="og:locale" content="en_US" />
    
    <? } elseif(isset($_SERVER['PATH_INFO'])){?>
    <?php $category_title=mysqli_fetch_assoc(mysqli_query($db,"select * from  tbl_blog where blog_status='Active' and blog_id='$blogID'"))?>
    <title><?= $datadt['blog_metatitle'];?></title>
    <meta NAME="description" content="<?= $datadt['blog_metadesc'];?>" />
    
    <meta property="og:title" content="<?= $datadt['blog_metatitle'];?>" />
    <meta property="og:description" content="<?= $datadt['blog_metadesc'];?>" />
    <meta property="og:image" content="<?=$wspath?>wkiadmin/images/<?=$pgHeading1['site_pages_image_name']?>" />
    <meta property="og:url" content="<?=$full_url?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $site_name;?>" />
    <meta property="og:locale" content="en_US" />
    
    <? }else{?>
    <?php $page_meta_title=mysqli_fetch_assoc(mysqli_query($db,"select * from tbl_site_pages where site_pages_status='Active' and site_pages_link='$page_name'"))?>
    <title><?=str_replace("LOCATION",$locationName,$page_meta_title['site_pages_meta_title']);?></title>
    <meta NAME="description" content="<?=str_replace("LOCATION",$locationName,$page_meta_title['site_pages_meta_description']);?>" />
    
    <meta property="og:title" content="<?=str_replace("LOCATION",$locationName,$page_meta_title['site_pages_meta_title']);?>" />
    <meta property="og:description" content="<?=str_replace("LOCATION",$locationName,$page_meta_title['site_pages_meta_description']);?>" />
    <meta property="og:image" content="<?=$wspath?>wkiadmin/images/<?=$pgHeading1['site_pages_image_name']?>" />
    <meta property="og:url" content="<?=$full_url?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $site_name;?>" />
    <meta property="og:locale" content="en_US" />
    <? }?>
    
    <meta name="language" content="english">
    <meta name="author" content="<?=$author?>">
    <link rel="canonical" content="<?=$full_url?>">
    <meta name="cache-control" content="public">
    
    <link rel="preconnect" href="https://fonts.googleapis.com/"> 
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,100;9..40,200;9..40,300;9..40,400;9..40,500;9..40,600;9..40,700;9..40,800&amp;family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=$wspath?>assets/css/app.min.css">
    <link rel="stylesheet" href="<?=$wspath?>assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?=$wspath?>assets/css/style.css">
  </head>

<body>