<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $blog_title = htmlspecialchars($_POST['blog_title'],ENT_QUOTES);
    $slug_link = htmlspecialchars($_POST['slug_link'],ENT_QUOTES);
    
    $blog_tags = htmlspecialchars($_POST['blog_tags'],ENT_QUOTES);
    $blog_metatitle = htmlspecialchars($_POST['blog_metatitle'],ENT_QUOTES);
    $blog_metadesc = htmlspecialchars($_POST['blog_metadesc'],ENT_QUOTES);
    $long_description = $_POST['long_description'];
    $short_description = htmlspecialchars($_POST['short_description'],ENT_QUOTES);
    $blog_status = $_POST['blog_status'];
    $blog_sub_id = $_POST['blog_sub_id'];
    
    $b_image = $_FILES['blog_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', ''];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $blog_image = 'blog_' . $currentDatetime . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/blog/' . $blog_image);
        
    $sql="INSERT INTO `tbl_blog`(`blog_sub_id`, `blog_title`, `blog_tags`, `blog_image`, `long_description`, `short_description`, `blog_metatitle`, `blog_metadesc`, `slug_link`, `blog_status`, `datetime`) 
                    VALUES ('$blog_sub_id', '$blog_title', '$blog_tags', '$blog_image', '$long_description', '$short_description', '$blog_metatitle', '$blog_metadesc', '$slug_link', '$blog_status', '$currentDatetime')";
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

	    if($result){
                echo ("<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'success',
                            text: 'Submit Successfully!',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage_blogs.php';
                            }
                        });
                    }
                </script>");
	    	mysqli_close($db);
	    }else{
            echo ("<script>
                window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            text: 'Not Submit!',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage_blogs.php';
                            }
                        });
                    }
                </script>");
        }
    } else {
        echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        text: 'Invalid file format. Only JPG, JPEG, and PNG files are allowed!',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        background: '#0f1535',
                        color: '#fefefe',
                        willClose: () => {
                            window.location.href = 'manage_blogs.php';
                        }
                    });
                }
            </script>");
    }
	}
	
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $blog_title = htmlspecialchars($_POST['blog_title'],ENT_QUOTES);
    $slug_link = htmlspecialchars($_POST['slug_link'],ENT_QUOTES);
    
    $blog_tags = htmlspecialchars($_POST['blog_tags'],ENT_QUOTES);
    $blog_metatitle = htmlspecialchars($_POST['blog_metatitle'],ENT_QUOTES);
    $blog_metadesc = htmlspecialchars($_POST['blog_metadesc'],ENT_QUOTES);
    $long_description = $_POST['long_description'];
    $short_description = $_POST['short_description'];
    $blog_status = $_POST['blog_status'];
    $blog_sub_id = $_POST['blog_sub_id'];
    
    $b_image = $_FILES['blog_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    
    $update_image = "";
    
    if (!empty($b_image['name']) && in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'blog_' . $currentDatetime . '.' . $image_extension;
        $query = "SELECT `blog_image` FROM `tbl_blog` WHERE `blog_id` = '$id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $current_image_name = $row['blog_image'];
        if (!empty($current_image_name) && file_exists('images/blog/' . $current_image_name)) {
            unlink('images/blog/' . $current_image_name);
        }
        move_uploaded_file($b_image['tmp_name'], 'images/blog/' . $new_image_name);
        $update_image = ", `blog_image` = '$new_image_name'";
    } else {
        echo ("<script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    text: 'Invalid file format. Only JPG, JPEG, and PNG files are allowed!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    background: '#0f1535',
                    color: '#fefefe',
                    willClose: () => {
                        window.location.href = 'manage_blogs.php';
                    }
                });
            }
        </script>");
    }

    $sql = "UPDATE `tbl_blog` SET 
           `blog_sub_id`='$blog_sub_id',
           `blog_title`='$blog_title',
           `blog_tags`='$blog_tags',
           `long_description`='$long_description',
           `short_description`='$short_description',
           `blog_metatitle`='$blog_metatitle',
           `blog_metadesc`='$blog_metadesc',
           `slug_link`='$slug_link',
           `blog_status`='$blog_status'
           $update_image
            WHERE `blog_id` = '$id'";
           
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

    if ($result) {
        echo ("<script>
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
                        window.location.href = 'manage_blogs.php';
                    }
                });
            }
        </script>");
    } else {
        echo ("<script>
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
                        window.location.href = 'manage_blogs.php';
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
                <div class="breadcrumb-title pe-3">Add/Edit Blogs</div>
                <div class="ps-3">
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="manage_blogs.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <?php
                $cat_pat_id=$_GET['blog_sub_id'];
                $cat_id = isset($_REQUEST['blog_id']) ? $_REQUEST['blog_id'] : '';
                if($cat_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_blog` WHERE blog_id=$cat_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $blog_id = $dataupd['blog_id'];
                            $blog_title = $dataupd['blog_title'];
                            $slug_link = $dataupd['slug_link'];
                            $blog_tags = $dataupd['blog_tags'];
                            $long_description = $dataupd['long_description'];
                            $short_description = $dataupd['short_description'];
                            $blog_metatitle = $dataupd['blog_metatitle'];
                            $blog_metadesc = $dataupd['blog_metadesc'];
                            $image = $dataupd['blog_image'];
                            $blog_status = $dataupd['blog_status'];
                        }
                    }
                    
                }
            ?>
            <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="card border-top border-3 border-danger rounded-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="mb-3"> Blog Title</h5>
                                        <input type="text" class="form-control" placeholder="write title here...." name="blog_title" value="<?php if($cat_id!=""){?><?= $blog_title ?><?php }?>">
                                        <input type="hidden" class="form-control" value="<?php if($cat_id!=""){?><?= $blog_id ?><?php }?>" name="id">
                                        <input type="hidden" class="form-control" value="<?php if($cat_pat_id!=""){?><?= $cat_pat_id ?><?php }?>" name="blog_sub_id">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3"> Blog Slug Link</h5>
                                        <input type="text" class="form-control" placeholder="Write Slug Link" name="slug_link" value="<?php if($cat_id!=""){?><?= $slug_link ?><?php }?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Image </h5>
                                        <input class="form-control" type="file" accept=".jpg, .png, image/jpeg, image/png" name="blog_image">
                                        <?php if($cat_id!=""){?>
                                        <img src="images/blog/<?= $image ?>" width="40" >
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card border-top border-3 border-danger rounded-0">
                        <div class="card-body">
                            <h5 class="mb-3">Status and Tags</h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="AddCategory" class="form-label">Blog Status</label>
                                    <select class="form-select" id="AddCategory" name="blog_status">
                                        <option value="Active" <?php if($cat_id!=""){?><?php if($blog_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                                        <option value="Inactive" <?php if($cat_id!=""){?><?php if($blog_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
    
                                    </select>
                                </div>
                                <!--<div class="col-12">-->
                                <!--    <label for="Tags" class="form-label">Blog Tags</label>-->
                                <!--    <input type="text" class="form-control" id="Tags" placeholder="Tags" name="blog_tags" value="<?php if($cat_id!=""){?><?= $blog_tags ?><?php }?>">-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <div class="card border-top border-3 border-danger rounded-0">
                        <div class="card-body">
                            <!--<div class="col-lg-12">-->
                            <!--    <div class="mb-4">-->
                            <!--        <h5 class="mb-3">Short Description</h5>-->
                            <!--        <textarea class="form-control" cols="4" rows="4" placeholder="write a short description here.." name="short_description"><?php if($cat_id!=""){?><?= $short_description ?><?php }?></textarea>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <h5 class="mb-3">Long Description</h5>
                                    <textarea class="form-control ckeditor" placeholder="write a Long description here.." name="long_description"><?php if($cat_id!=""){?><?= $long_description ?><?php }?></textarea>
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
                                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="blog_metatitle"><?php if($cat_id!=""){?><?= $blog_metatitle ?><?php }?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="SKU" class="form-label">Meta Description</label>
                                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="blog_metadesc"><?php if($cat_id!=""){?><?= $blog_metadesc ?><?php }?></textarea>
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