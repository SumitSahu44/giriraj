<?php 
    include "../include/dbsmain.inc.php";
	
    if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $site_pages_title = htmlspecialchars($_POST['site_pages_title'], ENT_QUOTES);
    $link = htmlspecialchars($_POST['link'], ENT_QUOTES);
    $slide_desc = $_POST['slide_desc'];
    $meta_title = htmlspecialchars($_POST['meta_title'], ENT_QUOTES);
    $meta_desc = htmlspecialchars($_POST['meta_desc'], ENT_QUOTES);
    $pages_status = $_POST['pages_status'];
    $show_in_header = $_POST['show_in_header'];
    $show_in_footer = $_POST['show_in_footer'];
    $b_image = $_FILES['image'];
    $brads_image = $_FILES['brads_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    $brads_image_extension = pathinfo($brads_image['name'], PATHINFO_EXTENSION);

    if ((!empty($b_image['name']) || !empty($brads_image['name'])) && in_array(strtolower($image_extension), $allowed_extensions) && in_array(strtolower($brads_image_extension), $allowed_extensions)) {
        $new_image_name = 'page_' . $currentDate . '.' . $image_extension;
        $new_brads_image_name = 'brads_page_' . $currentDate . '.' . $brads_image_extension;

        move_uploaded_file($b_image['tmp_name'], 'images/' . $new_image_name);
        move_uploaded_file($brads_image['tmp_name'], 'images/' . $new_brads_image_name);
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
                        window.location.href = 'static_page_list.php';
                    }
                });
            }
        </script>");
    }
    
        $sql = "INSERT INTO `tbl_site_pages` (`site_pages_name`, `site_pages_title`, `site_pages_link`, `site_pages_show_in_header`, `site_pages_show_in_footer`, `site_pages_url`, `site_pages_image_name`, `site_pages_bradsimage_name`, `site_pages_meta_title`, `site_pages_meta_description`, `site_pages_description`, `site_pages_status`) 
                VALUES ('$title', '$site_pages_title', '$link', '$show_in_header', '$show_in_footer', '$link', '$new_image_name', '$new_brads_image_name', '$meta_title', '$meta_desc', '$slide_desc', '$pages_status')";
        
        $result = mysqli_query($db, $sql) or die("Query unsuccessful");

        if ($result) {
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
                            window.location.href = 'static_page_list.php';
                        }
                    });
                }
            </script>");
            mysqli_close($db);
        } else {
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
                            window.location.href = 'static_page_list.php';
                        }
                    });
                }
            </script>");
        }
}

	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $site_pages_title = htmlspecialchars($_POST['site_pages_title'], ENT_QUOTES);
    $link = htmlspecialchars($_POST['link'], ENT_QUOTES);
    $slide_desc = $_POST['slide_desc'];
    $meta_title = htmlspecialchars($_POST['meta_title'], ENT_QUOTES);
    $meta_desc = htmlspecialchars($_POST['meta_desc'], ENT_QUOTES);
    $pages_status = $_POST['pages_status'];
    $show_in_header = $_POST['show_in_header'];
    $show_in_footer = $_POST['show_in_footer'];
    $b_image = $_FILES['image'];
    $brads_image = $_FILES['brads_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    $brads_image_extension = pathinfo($brads_image['name'], PATHINFO_EXTENSION);

    $update_image = "";
    $update_brads_image = "";

    // Handle site_pages_image_name
    if (!empty($b_image['name']) && in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'page_' . $currentDate . '.' . $image_extension;
        $query = "SELECT `site_pages_image_name` FROM `tbl_site_pages` WHERE `site_pages_id` = '$id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $current_image_name = $row['site_pages_image_name'];
        if (!empty($current_image_name) && file_exists('images/' . $current_image_name)) {
            unlink('images/' . $current_image_name);
        }
        move_uploaded_file($b_image['tmp_name'], 'images/' . $new_image_name);
        $update_image = ", `site_pages_image_name` = '$new_image_name'";
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
                        window.location.href = 'static_page_list.php';
                    }
                });
            }
        </script>");
    }

    // Handle site_pages_bradsimage_name
    if (!empty($brads_image['name']) && in_array(strtolower($brads_image_extension), $allowed_extensions)) {
        $new_brads_image_name = 'brads_page_' . $currentDate . '.' . $brads_image_extension;
        $query = "SELECT `site_pages_bradsimage_name` FROM `tbl_site_pages` WHERE `site_pages_id` = '$id'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        $current_brads_image_name = $row['site_pages_bradsimage_name'];
        if (!empty($current_brads_image_name) && file_exists('images/' . $current_brads_image_name)) {
            unlink('images/' . $current_brads_image_name);
        }
        move_uploaded_file($brads_image['tmp_name'], 'images/' . $new_brads_image_name);
        $update_brads_image = ", `site_pages_bradsimage_name` = '$new_brads_image_name'";
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
                        window.location.href = 'static_page_list.php';
                    }
                });
            }
        </script>");
    }

    $sql = "UPDATE `tbl_site_pages` 
            SET `site_pages_name` = '$title', 
                `site_pages_link` = '$link', 
                `site_pages_title` = '$site_pages_title', 
                `site_pages_show_in_header` = '$show_in_header', 
                `site_pages_show_in_footer` = '$show_in_footer', 
                `site_pages_meta_title` = '$meta_title', 
                `site_pages_meta_description` = '$meta_desc', 
                `site_pages_description` = '$slide_desc', 
                `site_pages_status` = '$pages_status' 
                $update_image 
                $update_brads_image
            WHERE `site_pages_id` = '$id'";

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
                        window.location.href = 'static_page_list.php';
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
                        window.location.href = 'static_page_list.php';
                    }
                });
            }
        </script>");
    }
}


?>
<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

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
        <div class="breadcrumb-title pe-3">Add/Edit Static Page</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <a href="static_page_list.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $pages_id = isset($_REQUEST['pages_id']) ? $_REQUEST['pages_id'] : '';
                if($pages_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_site_pages` WHERE site_pages_id=$pages_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $s_id = $dataupd['site_pages_id'];
                            $title = $dataupd['site_pages_name'];
                            $site_pages_title = $dataupd['site_pages_title'];
                            $slide_desc = $dataupd['site_pages_description'];
                            $site_pages_meta_title = $dataupd['site_pages_meta_title'];
                            $site_pages_meta_description = $dataupd['site_pages_meta_description'];
                            $site_pages_link = $dataupd['site_pages_link'];
                            $image = $dataupd['site_pages_image_name'];
                            $site_pages_bradsimage_name = $dataupd['site_pages_bradsimage_name'];
                            $site_pages_show_in_header=$dataupd['site_pages_show_in_header'];
                            $site_pages_show_in_footer=$dataupd['site_pages_show_in_footer'];
                            $site_pages_status=$dataupd['site_pages_status'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Page Name</h5>
                    <input type="text" class="form-control" placeholder="Page Name" name="title" <?php if($pages_id!=""){?>value="<?= $title?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($pages_id!=""){?>value="<?= $s_id?>"<?php }?>>
                  </div>
                </div>
                
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Page Slug</h5>
                    <input type="text" class="form-control" placeholder="Page Link" name="link" <?php if($pages_id!=""){?>value="<?= $site_pages_link?>"<?php }?>>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Page Title</h5>
                    <input type="text" class="form-control" placeholder="Page Title" name="site_pages_title" <?php if($pages_id!=""){?>value="<?= $site_pages_title?>"<?php }?>>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Page Image </h5>
                    <input type="file" class="form-control" name="image">
                    <?php if($pages_id!=""){?>
                    <img src="images/<?= $image ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Page Header Image </h5>
                    <input type="file" class="form-control" name="brads_image">
                    <?php if($pages_id!=""){?>
                    <img src="images/<?= $site_pages_bradsimage_name ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Page Description</h5>
                    <textarea class="form-control ckeditor" placeholder="write a description here.." name="slide_desc"><?php if($pages_id!=""){?><?= $slide_desc ?><?php }?></textarea>
                  </div>
                </div>
                <div class="col-lg-4 mb-4">
                  <label for="AddCategory" class="form-label">Page Status</label>
                  <select class="form-select" id="AddCategory" name="pages_status">
                    <option value="Active" <?php if($pages_id!=""){?><?php if($site_pages_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                    <option value="Inactive" <?php if($pages_id!=""){?><?php if($site_pages_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
                  </select>
                </div>
                <div class="col-lg-4 mb-4">
                  <label for="AddCategory" class="form-label">Show In Header</label>
                  <select class="form-select" id="AddCategory" name="show_in_header">
                    <option value="Yes" <?php if($pages_id!=""){?><?php if($site_pages_show_in_header=='Yes'){ ?> selected="selected" <? } ?><?php }?>>Yes</option>
                    <option value="No" <?php if($pages_id!=""){?><?php if($site_pages_show_in_header=='No'){ ?> selected="selected" <? } ?><?php }?>>No</option>
                  </select>
                </div>
                <div class="col-lg-4 mb-4">
                  <label for="AddCategory" class="form-label">Show In Footer</label>
                  <select class="form-select" id="AddCategory" name="show_in_footer">
                    <option value="Yes" <?php if($pages_id!=""){?><?php if($site_pages_show_in_footer=='Yes'){ ?> selected="selected" <? } ?><?php }?>>Yes</option>
                    <option value="No" <?php if($pages_id!=""){?><?php if($site_pages_show_in_footer=='No'){ ?> selected="selected" <? } ?><?php }?>>No</option>
                  </select>
                </div>
                
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Meta Title</h5>
                    <textarea class="form-control" cols="4" rows="3" placeholder="write a title here.." name="meta_title"><?php if($pages_id!=""){?><?= $site_pages_meta_title ?><?php }?></textarea>
                  </div>
                </div><div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Meta Description</h5>
                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="meta_desc"><?php if($pages_id!=""){?><?= $site_pages_meta_description ?><?php }?></textarea>
                  </div>
                </div>
                <div class="col">
                    <?php if($pages_id!=""){?>
                    <button type="submit" name="update" class="btn btn-success px-5">Update</button>
                    <?php }else{?>								                                 
                    <button type="submit" name="submit" class="btn btn-success px-5">Submit</button>
                    <?php }?>
                </div>
              </div>
              </form>
            </div>
            <!--end row-->
          </div>
  </main>


  <?php include "footer.php";?>

</body>

</html>