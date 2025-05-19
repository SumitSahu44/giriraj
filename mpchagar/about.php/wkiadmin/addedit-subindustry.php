<?php 
    include "../include/dbsmain.inc.php";
	$industry_sub_id = isset($_REQUEST['industry_sub_id']) ? $_REQUEST['industry_sub_id'] : '';
    if(isset($_POST['submit'])) {
    $industry_name = htmlspecialchars($_POST['industry_name'],ENT_QUOTES);
    $names = trim($industry_name);
    $names = preg_replace('/[#&,\[\]\(\)\{\};:"\'<>\*\^\$%@!?\/\\\|]/', '', $names);
    $names = preg_replace('/\s+/', ' ', $names);
    $nameWords = explode(' ', $names);
    $names = implode(' ', $nameWords);
    $url_links = strtolower($names);
    $url_links = preg_replace('/\./', '', $url_links);
    $url_link = str_replace(' ', '-', $url_links);
    // $url_link = '/' . str_replace(' ', '-', $url_links);

    $industry_metatitle = htmlspecialchars($_POST['industry_metatitle'],ENT_QUOTES);
    $industry_metadesc = htmlspecialchars($_POST['industry_metadesc'],ENT_QUOTES);
    $industry_desc = $_POST['industry_desc'];
    $industry_sub_id = $_POST['industry_sub_id'];
    
    $b_image = $_FILES['industry_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', ''];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $industry_image = 'industry_' . $currentDatetime . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/services/' . $industry_image);
        
    $sql="INSERT INTO `tbl_industry`(`industry_name`, `industry_image`, `industry_desc`, `industry_metatitle`, `industry_metadesc`, `industry_url`, `industry_status`, `industry_sub_id`) 
                    VALUES ('$industry_name', '$industry_image', '$industry_desc', '$industry_metatitle', '$industry_metadesc', '$url_link', 'Active', '$industry_sub_id')";
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

	    if($result){
                echo ("<script>
                    window.onload = function() {
                    var industrySubId = $industry_sub_id;
                        Swal.fire({
                            icon: 'success',
                            text: 'Submit Successfully!',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage-sub-industries.php?industry_sub_id=' + industrySubId;
                            }
                        });
                    }
                </script>");
	    }else{
            echo ("<script>
                window.onload = function() {
                var industrySubId = $industry_sub_id;
                        Swal.fire({
                            icon: 'error',
                            text: 'Not Submit!',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage-sub-industries.php?industry_sub_id=' + industrySubId;
                            }
                        });
                    }
                </script>");
        }
    } else {
        echo ("<script>
            window.onload = function() {
            var industrySubId = $industry_sub_id;
                    Swal.fire({
                        icon: 'error',
                        text: 'Invalid file format. Only JPG, JPEG, and PNG files are allowed!',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        background: '#0f1535',
                        color: '#fefefe',
                        willClose: () => {
                            window.location.href = 'manage-sub-industries.php?industry_sub_id=' + industrySubId;
                        }
                    });
                }
            </script>");
    }
	}
	
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $industry_name = htmlspecialchars($_POST['industry_name'],ENT_QUOTES);
    $names = trim($industry_name);
    $names = preg_replace('/[#&,\[\]\(\)\{\};:"\'<>\*\^\$%@!?\/\\\|]/', '', $names);
    $names = preg_replace('/\s+/', ' ', $names);
    $nameWords = explode(' ', $names);
    $names = implode(' ', $nameWords);
    $url_links = strtolower($names);
    $url_links = preg_replace('/\./', '', $url_links);
    $url_link = str_replace(' ', '-', $url_links);
    // $url_link = '/' . str_replace(' ', '-', $url_links);

    $industry_metatitle = htmlspecialchars($_POST['industry_metatitle'],ENT_QUOTES);
    $industry_metadesc = htmlspecialchars($_POST['industry_metadesc'],ENT_QUOTES);
    $industry_desc = $_POST['industry_desc'];
    $industry_sub_id = $_POST['industry_sub_id'];
    
    $b_image = $_FILES['industry_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    
    $update_image = "";
    
    if (!empty($b_image['name']) && in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'industry_' . $currentDatetime . '.' . $image_extension;
        $query = "SELECT `industry_image` FROM `tbl_industry` WHERE `industry_id` = '$id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $current_image_name = $row['industry_image'];
        if (!empty($current_image_name) && file_exists('images/services/' . $current_image_name)) {
            unlink('images/services/' . $current_image_name);
        }
        move_uploaded_file($b_image['tmp_name'], 'images/services/' . $new_image_name);
        $update_image = ", `industry_image` = '$new_image_name'";
    } else {
        echo ("<script>
            window.onload = function() {
            var industrySubId = $industry_sub_id;
                Swal.fire({
                    icon: 'error',
                    text: 'Invalid file format. Only JPG, JPEG, and PNG files are allowed!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: '#0f1535',
                    color: '#fefefe',
                    willClose: () => {
                        window.location.href = 'manage-sub-industries.php?industry_sub_id=' + industrySubId;
                    }
                });
            }
        </script>");
    }

    $sql = "UPDATE `tbl_industry` SET 
           `industry_name`='$industry_name',
           `industry_desc`='$industry_desc',
           `industry_metatitle`='$industry_metatitle',
           `industry_metadesc`='$industry_metadesc',
           `industry_url`='$url_link'
           $update_image
            WHERE `industry_id` = '$id'";
           
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

    if ($result) {
        echo ("<script>
        var industrySubId = $industry_sub_id;
            window.onload = function() {
                Swal.fire({
                    icon: 'success',
                    text: 'Update Successfully!',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    background: '#0f1535',
                    color: '#fefefe',
                    willClose: () => {
                        window.location.href = 'manage-sub-industries.php?industry_sub_id=' + industrySubId;
                    }
                });
            }
        </script>");
    } else {
        echo ("<script>
        var industrySubId = $industry_sub_id;
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    text: 'Not Updated!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    background: '#0f1535',
                    color: '#fefefe',
                    willClose: () => {
                        window.location.href = 'manage-sub-industries.php?industry_sub_id=' + industrySubId;
                    }
                });
            }
        </script>");
    }
} 

?>
<!doctype html>

<html lang="en" data-bs-theme="blue-theme" >

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include "top-links.php";?>

</head>

<body>

	<!--start header-->
	<?php include "header.php";?>
	<!--end top header-->

	<!--start sidebar-->
	<?php include "sidebar.php";?>
	<!--end sidebar-->

    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Add/Edit Industry</div>
                <div class="ps-3">
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="manage-sub-industries.php?industry_sub_id=<?= $industry_sub_id?>"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <?php
                $cat_id = isset($_REQUEST['industry_id']) ? $_REQUEST['industry_id'] : '';
                
                if($cat_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_industry` WHERE industry_id=$cat_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $industry_id = $dataupd['industry_id'];
                            $industry_name = $dataupd['industry_name'];
                            $industry_desc = $dataupd['industry_desc'];
                            $industry_metatitle = $dataupd['industry_metatitle'];
                            $industry_metadesc = $dataupd['industry_metadesc'];
                            $image = $dataupd['industry_image'];
                        }
                    }
                    
                }
            ?>
            <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border-top border-3 border-danger rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3"> Industry Name</h5>
                                        <input type="text" class="form-control" placeholder="write title here...." name="industry_name" value="<?php if($cat_id!=""){?><?= $industry_name ?><?php }?>">
                                        <input type="hidden" class="form-control" value="<?php if($cat_id!=""){?><?= $industry_id ?><?php }?>" name="id">
                                        <input type="hidden" class="form-control" value="<?php if($industry_sub_id!=""){?><?= $industry_sub_id ?><?php }?>" name="industry_sub_id">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Image </h5>
                                        <input class="form-control" type="file" accept=".jpg, .png, image/jpeg, image/png" name="industry_image">
                                        <?php if($cat_id!=""){?>
                                        <img src="images/services/<?= $image ?>" width="40" >
                                        <?php }?>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <h5 class="mb-3">Long Description</h5>
                                    <textarea class="form-control ckeditor" placeholder="write a description here.." name="industry_desc"><?php if($cat_id!=""){?><?= $industry_desc ?><?php }?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-top border-3 border-danger rounded-0">
                        <div class="card-body">
                            <h5 class="mb-3">SEO Related Information</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-12">
                                    <label for="Brand" class="form-label">Meta Title</label>
                                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="industry_metatitle"><?php if($cat_id!=""){?><?= $industry_metatitle ?><?php }?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="SKU" class="form-label">Meta Description</label>
                                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="industry_metadesc"><?php if($cat_id!=""){?><?= $industry_metadesc ?><?php }?></textarea>
                                </div>
                            </div>
                        <div class="col ">
                            <!--<div class="d-grid">-->
                                <?php if($cat_id!=""){?>
                                <button type="submit" name="update" class="btn btn-grd-primary px-4">Update</button>
                                <?php }else{?>								                                 
                                <button type="submit" name="submit" class="btn btn-grd-primary px-4">Submit</button>
                                <?php }?>
                                <!--<button type="submit" class="btn btn-primary" name="submit">Submit</button>-->
                            <!--</div>-->
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            </form>
        </div>
    </main>


	<?php include "footer.php";?>

</body>

</html>