<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $category_name = htmlspecialchars($_POST['category_name'],ENT_QUOTES);
    $names = trim($category_name);
    $names = preg_replace('/[#&,\[\]\(\)\{\};:"\'<>\*\^\$%@!?\/\\\|]/', '', $names);
    $names = preg_replace('/\s+/', ' ', $names);
    $nameWords = explode(' ', $names);
    $names = implode(' ', $nameWords);
    $url_links = strtolower($names);
    $url_links = preg_replace('/\./', '', $url_links);
    $url_link = str_replace(' ', '-', $url_links);
    // $url_link = '/' . str_replace(' ', '-', $url_links);
    
    $category_displayname = htmlspecialchars($_POST['category_displayname'],ENT_QUOTES);
    $category_tags = htmlspecialchars($_POST['category_tags'],ENT_QUOTES);
    $category_real_price = $_POST['category_real_price'];
    $category_discount_price = $_POST['category_discount_price'];
    $category_meta_title = htmlspecialchars($_POST['category_meta_title'],ENT_QUOTES);
    $category_meta_description = htmlspecialchars($_POST['category_meta_description'],ENT_QUOTES);
    $category_description_long = $_POST['category_description_long'];
    $category_short_description = $_POST['category_short_description'];
    $category_is_product = $_POST['category_is_product'];
    $category_is_hot = $_POST['category_is_hot'];
    $category_is_featured = $_POST['category_is_featured'];
    $category_qnty = $_POST['category_qnty'];
    $packing = $_POST['packing'];
    $category_status = $_POST['category_status'];
    $category_parent_id = $_POST['category_parent_id'];
    
    $b_image = $_FILES['image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', ''];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $category_image_name = 'category_' . $currentDatetime . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/services/' . $category_image_name);
        
    $sql="INSERT INTO `tbl_category`(`category_parent_id`, `category_name`, `category_displayname`, `category_tags`, `packing`, `category_real_price`, `category_discount_price`, `category_image_name`, `category_description_long`, `category_short_description`, `category_meta_title`, `category_meta_description`, `category_is_product`, `category_is_hot`, `category_is_featured`, `category_url`, `category_qnty`, `category_status`) 
                    VALUES ('$category_parent_id', '$category_name', '$category_displayname', '$category_tags', '$packing', '$category_real_price', '$category_discount_price', '$category_image_name', '$category_description_long', '$category_short_description', '$category_meta_title', '$category_meta_description', '$category_is_product', '$category_is_hot', '$category_is_featured', '$url_link', '$category_qnty', '$category_status')";
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

	    if($result){
	        
            if($category_parent_id!='0'){
                $redirectUrl = 'manage-subproduct.php?category_parent_id='.$category_parent_id;
            }else{
                $redirectUrl = 'product_list.php';
            }
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
                            window.location.href = " . ($category_parent_id != '0' ? "'manage-subproduct.php?category_parent_id=$category_parent_id'" : "'product_list.php'") . ";
                        }
                    });
                }
            </script>");
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
                            window.location.href = " . ($category_parent_id != '0' ? "'manage-subproduct.php?category_parent_id=$category_parent_id'" : "'product_list.php'") . ";
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
                        window.location.href = " . ($category_parent_id != '0' ? "'manage-subproduct.php?category_parent_id=$category_parent_id'" : "'product_list.php'") . ";
                    }
                });
            }
            </script>");
    }
	}
	
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $category_name = htmlspecialchars($_POST['category_name'],ENT_QUOTES);
    $names = trim($category_name);
    $names = preg_replace('/[#&,\[\]\(\)\{\};:"\'<>\*\^\$%@!?\/\\\|]/', '', $names);
    $names = preg_replace('/\s+/', ' ', $names);
    $nameWords = explode(' ', $names);
    $names = implode(' ', $nameWords);
    $url_links = strtolower($names);
    $url_links = preg_replace('/\./', '', $url_links);
    $url_link = str_replace(' ', '-', $url_links);
    // $url_link = '/' . str_replace(' ', '-', $url_links);
    
    $category_displayname = htmlspecialchars($_POST['category_displayname'],ENT_QUOTES);
    $category_tags = htmlspecialchars($_POST['category_tags'],ENT_QUOTES);
    $packing = htmlspecialchars($_POST['packing'],ENT_QUOTES);
    $category_real_price = $_POST['category_real_price'];
    $category_discount_price = $_POST['category_discount_price'];
    $category_discount_price = $_POST['category_discount_price'];
    $category_meta_title = htmlspecialchars($_POST['category_meta_title'],ENT_QUOTES);
    $category_meta_description = htmlspecialchars($_POST['category_meta_description'],ENT_QUOTES);
    $category_description_long = $_POST['category_description_long'];
    $category_short_description = $_POST['category_short_description'];
    $category_is_product = $_POST['category_is_product'];
    $category_is_hot = $_POST['category_is_hot'];
    $category_is_featured = $_POST['category_is_featured'];
    $category_qnty = $_POST['category_qnty'];
    $category_status = $_POST['category_status'];
    $category_parent_id = $_POST['category_parent_id'];
    
    $b_image = $_FILES['image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    
    $update_image = "";
    
    if (!empty($b_image['name']) && in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'category_' . $currentDatetime . '.' . $image_extension;
        $query = "SELECT `category_image_name` FROM `tbl_category` WHERE `category_id` = '$id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $current_image_name = $row['category_image_name'];
        if (!empty($current_image_name) && file_exists('images/services/' . $current_image_name)) {
            unlink('images/services/' . $current_image_name);
        }
        move_uploaded_file($b_image['tmp_name'], 'images/services/' . $new_image_name);
        $update_image = ", `category_image_name` = '$new_image_name'";
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
                        window.location.href = " . ($category_parent_id != '0' ? "'manage-subproduct.php?category_parent_id=$category_parent_id'" : "'product_list.php'") . ";
                    }
                });
            }
        </script>");
    }

    $sql = "UPDATE `tbl_category` SET 
           `category_parent_id`='$category_parent_id',
           `category_name`='$category_name',
           `category_displayname`='$category_displayname',
           `category_tags`='$category_tags',
           `packing`='$packing',
           `category_real_price`='$category_real_price',
           `category_discount_price`='$category_discount_price',
           `category_description_long`='$category_description_long',
           `category_short_description`='$category_short_description',
           `category_meta_title`='$category_meta_title',
           `category_meta_description`='$category_meta_description',
           `category_is_product`='$category_is_product',
           `category_is_hot`='$category_is_hot',
           `category_is_featured`='$category_is_featured',
           `category_url`='$url_link',
           `category_qnty`='$category_qnty',
           `category_status`='$category_status'
           $update_image
            WHERE `category_id` = '$id'";
           
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
                        window.location.href = " . ($category_parent_id != '0' ? "'manage-subproduct.php?category_parent_id=$category_parent_id'" : "'product_list.php'") . ";
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
                        window.location.href = " . ($category_parent_id != '0' ? "'manage-subproduct.php?category_parent_id=$category_parent_id'" : "'product_list.php'") . ";
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
                <div class="breadcrumb-title pe-3">Add Products</div>
                <div class="ps-3">
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="product_list.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <?php
                $cat_pat_id=$_GET['category_parent_id'];
                $cat_id = isset($_REQUEST['category_id']) ? $_REQUEST['category_id'] : '';
                if($cat_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_category` WHERE category_id=$cat_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $category_id = $dataupd['category_id'];
                            $category_name = $dataupd['category_name'];
                            $category_displayname = $dataupd['category_displayname'];
                            $category_tags = $dataupd['category_tags'];
                            $packing = $dataupd['packing'];
                            $category_real_price = $dataupd['category_real_price'];
                            $category_discount_price = $dataupd['category_discount_price'];
                            $category_description_long = $dataupd['category_description_long'];
                            $category_short_description = $dataupd['category_short_description'];
                            $category_meta_title = $dataupd['category_meta_title'];
                            $category_meta_description = $dataupd['category_meta_description'];
                            $category_qnty = $dataupd['category_qnty'];
                            $image = $dataupd['category_image_name'];
                            $category_is_hot = $dataupd['category_is_hot'];
                            $category_status = $dataupd['category_status'];
                            $category_is_featured = $dataupd['category_is_featured'];
                            $category_is_product = $dataupd['category_is_product'];
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
                                        <h5 class="mb-3"> Product Name</h5>
                                        <input type="text" class="form-control" placeholder="write title here...." name="category_name" value="<?php if($cat_id!=""){?><?= $category_name ?><?php }?>">
                                        <input type="hidden" class="form-control" value="<?php if($cat_id!=""){?><?= $category_id ?><?php }?>" name="id">
                                        <input type="hidden" class="form-control" value="<?php if($cat_pat_id!=""){?><?= $cat_pat_id ?><?php }?>" name="category_parent_id">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Product Display Name </h5>
                                        <input type="text" class="form-control" placeholder="write title here...." name="category_displayname" value="<?php if($cat_id!=""){?><?= $category_displayname ?><?php }?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Image(1000*600px) </h5>
                                        <input class="form-control" type="file" accept=".jpg, .png, image/jpeg, image/png" name="image">
                                        <?php if($cat_id!=""){?>
                                        <img src="images/services/<?= $image ?>" width="40" >
                                        <?php }?>
                                    </div>
                                </div>
                                <!--<div class="col-lg-6">-->
                                <!--    <div class="mb-4">-->
                                <!--        <h5 class="mb-3">Add to Stock</h5>-->
                                <!--        <input class="form-control" type="number" placeholder="Quantity" name="category_qnty" value="<?php if($cat_id!=""){?><?= $category_qnty ?><?php }?>">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="col-lg-6">-->
                                <!--    <div class="mb-4">-->
                                <!--        <h5 class="mb-3">MRP Price </h5>-->
                                <!--        <input type="text" class="form-control" placeholder="write title here...." name="category_real_price" value="<?php if($cat_id!=""){?><?= $category_real_price ?><?php }?>">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="col-lg-6">-->
                                <!--    <div class="mb-4">-->
                                <!--        <h5 class="mb-3">Discount Price </h5>-->
                                <!--        <input type="text" class="form-control" placeholder="write title here...." name="category_discount_price" value="<?php if($cat_id!=""){?><?= $category_discount_price ?><?php }?>">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Short Description</h5>
                                        <textarea class="form-control" cols="4" rows="6" placeholder="write a short description here.." name="category_short_description"><?php if($cat_id!=""){?><?= $category_short_description ?><?php }?></textarea>
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
                                    <label for="AddCategory" class="form-label">Product Status</label>
                                    <select class="form-select" id="AddCategory" name="category_status">
                                        <option value="Active" <?php if($cat_id!=""){?><?php if($category_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                                        <option value="Inactive" <?php if($cat_id!=""){?><?php if($category_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
    
                                    </select>
                                </div>
                                <!--<div class="col-12">-->
                                <!--    <label for="Tags" class="form-label">Tags</label>-->
                                <!--    <input type="text" class="form-control" id="Tags" placeholder="Tags" name="category_tags" value="<?php if($cat_id!=""){?><?= $category_tags ?><?php }?>">-->
                                <!--</div>-->
                                <!--<div class="col-12">-->
                                <!--    <label for="Tags" class="form-label">HSN CODE</label>-->
                                <!--    <input type="text" class="form-control" id="Tags" placeholder="Tags" name="category_tags" value="<?php if($cat_id!=""){?><?= $category_tags ?><?php }?>">-->
                                <!--</div>-->
                                <!--<div class="col-12">-->
                                <!--    <label for="Tags" class="form-label">Packing</label>-->
                                <!--    <input type="text" class="form-control" id="Tags" placeholder="Tags" name="packing" value="<?php if($cat_id!=""){?><?= $packing ?><?php }?>">-->
                                <!--</div>-->
                                <!--<div class="col-12">-->
                                <!--  <div class="d-flex align-items-center gap-2">-->
                                <!--    <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Woman <i class="bi bi-x"></i></a>-->
                                <!--    <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Fashion <i class="bi bi-x"></i></a>-->
                                <!--    <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm">Furniture <i class="bi bi-x"></i></a>-->
                                <!--  </div>-->
                                <!--</div>  -->
                            </div>
                        </div>
                    </div>
                    <!--<div class="card border-top border-3 border-danger rounded-0">-->
                    <!--    <div class="card-body">-->
                    <!--        <h5 class="mb-3">Other Options</h5>-->
                    <!--        <div class="row g-3">-->
                    <!--            <div class="col-12">-->
                    <!--                <label for="Brand" class="form-label">Is Hot ?</label>-->
                    <!--                <select class="form-select" name="category_is_hot">-->
                    <!--                    <option value="Yes" <?php if($cat_id!=""){?><?php if($category_is_hot=='Yes'){ ?> selected="selected" <? } ?><?php }?>>Yes</option>-->
                    <!--                    <option value="No" <?php if($cat_id!=""){?><?php if($category_is_hot=='No'){ ?> selected="selected" <? } ?><?php }?>>No</option>-->

                    <!--                </select>-->
                    <!--            </div>-->
                    <!--            <div class="col-12">-->
                    <!--                <label for="SKU" class="form-label">Is Featured ?</label>-->
                    <!--                <select class="form-select" name="category_is_featured">-->
                    <!--                    <option value="Yes" <?php if($cat_id!=""){?><?php if($category_is_featured=='Yes'){ ?> selected="selected" <? } ?><?php }?>>Yes</option>-->
                    <!--                    <option value="No" <?php if($cat_id!=""){?><?php if($category_is_featured=='No'){ ?> selected="selected" <? } ?><?php }?>>No</option>-->
                    <!--                </select>-->
                    <!--            </div>-->

                    <!--            <div class="col-12">-->
                    <!--                <label for="SKU" class="form-label">Category Is?</label>-->
                    <!--                <select class="form-select" name="category_is_product">-->
                    <!--                    <option value="Yes" <?php if($cat_id!=""){?><?php if($category_is_product=='Yes'){ ?> selected="selected" <? } ?><?php }?>>Product</option>-->
                    <!--                    <option value="No" <?php if($cat_id!=""){?><?php if($category_is_product=='No'){ ?> selected="selected" <? } ?><?php }?>>Service</option>-->
                    <!--                </select>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-12">-->
                    <!--    <div class="d-grid">-->
                    <!--        <button type="button" class="btn btn-primary">Submit</button>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <div class="col-12 col-lg-12">
                    <div class="card border-top border-3 border-danger rounded-0">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <h5 class="mb-3">Long Description</h5>
                                    <textarea class="form-control ckeditor" placeholder="write a description here.." name="category_description_long"><?php if($cat_id!=""){?><?= $category_description_long ?><?php }?></textarea>
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
                                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="category_meta_title"><?php if($cat_id!=""){?><?= $category_meta_title ?><?php }?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="SKU" class="form-label">Meta Description</label>
                                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="category_meta_description"><?php if($cat_id!=""){?><?= $category_meta_description ?><?php }?></textarea>
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