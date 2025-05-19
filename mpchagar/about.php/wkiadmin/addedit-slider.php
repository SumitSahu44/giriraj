<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title'],ENT_QUOTES);
    $line = htmlspecialchars($_POST['line'],ENT_QUOTES);
    $slide_desc = htmlspecialchars($_POST['slide_desc'],ENT_QUOTES);
    $slide_button_link = htmlspecialchars($_POST['slide_button_link'],ENT_QUOTES);
    $slider_status = 'Active';
    $b_image = $_FILES['image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'slide_' . $currentDate . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/slider/' . $new_image_name);
        
    $sql="INSERT INTO `tbl_slider`(`image`, `title`, `line`, `slide_desc`, `slide_button_link`, `slider_status`) 
                          VALUES ('$new_image_name', '$title', '$line', '$slide_desc', '$slide_button_link', '$slider_status')";
    $result = mysqli_query($db, $sql) or die("Query unsuccessful");

	    if($result){
                echo ("<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'success',
                            text: 'Sbmit Successfully!',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage-slider.php';
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
                                window.location.href = 'manage-slider.php';
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
                            window.location.href = 'manage-slider.php';
                        }
                    });
                }
            </script>");
    }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES);
    $line = htmlspecialchars($_POST['line'], ENT_QUOTES);
    $slide_desc = htmlspecialchars($_POST['slide_desc'], ENT_QUOTES);
    $slide_button_link = htmlspecialchars($_POST['slide_button_link'], ENT_QUOTES);

    $sql = "UPDATE `tbl_slider` SET `title`='$title', `line`='$line', `slide_desc`='$slide_desc', `slide_button_link`='$slide_button_link'";
    $existing_images_query = "SELECT `image` FROM `tbl_slider` WHERE s_id=$id";
    $existing_images_result = $db->query($existing_images_query);
    $existing_images_row = $existing_images_result->fetch_assoc();
    $images = ["image"];
    $uploaded_files = [];

    foreach ($images as $image) {
        if (!empty($_FILES[$image]['name'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
            
            if (in_array(strtolower($image_extension), $allowed_extensions)) {
                $new_image_name = 'slide_' . $currentDate . '.' . $image_extension;

                if (move_uploaded_file($_FILES[$image]['tmp_name'], 'images/slider/' . $new_image_name)) {
                    if (!empty($existing_images_row[$image])) {
                        unlink('images/slider/' . $existing_images_row[$image]);
                    }
                    
                    $uploaded_files[$image] = $new_image_name;
                    $sql .= ", $image='$new_image_name'";
                }
            } else {
                echo "<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            text: 'Invalid file format. Only JPG, JPEG, and PNG files are allowed!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            willClose: () => {
                                window.location.href = 'manage-slider.php';
                            }
                        });
                    }
                </script>";
            }
        }
    }

    $sql .= " WHERE s_id=$id";

    if ($db->query($sql) === TRUE) {
        echo "<script>
            window.onload = function() {
                Swal.fire({
                    icon: 'success',
                    text: 'Update Successfully!',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'manage-slider.php';
                    }
                });
            }
        </script>";
    } else {
        echo "<script>
               window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    text: 'Not Update!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'manage-slider.php';
                    }
                });
            }
        </script>";
    }

    // mysqli_close($db);
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
        <div class="breadcrumb-title pe-3">Add/Edit Slider</div>
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
            <a href="manage-slider.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['sl_id']) ? $_REQUEST['sl_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_slider` WHERE s_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $s_id = $dataupd['s_id'];
                            $title = $dataupd['title'];
                            $line = $dataupd['line'];
                            $slide_desc = $dataupd['slide_desc'];
                            $slide_button_link = $dataupd['slide_button_link'];
                            $image = $dataupd['image'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <!--<div class="col-lg-12">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">Slide Heading</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Slide Heading" name="title" <?php if($sl_id!=""){?>value="<?= $title?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $s_id?>"<?php }?>>
                
                <!--<div class="col-lg-12">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">Sub Heading</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Slide Text" name="line" <?php if($sl_id!=""){?>value="<?= $line?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-lg-12">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">Slide Description</h5>-->
                <!--    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="slide_desc"><?php if($sl_id!=""){?><?= $slide_desc ?><?php }?></textarea>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-lg-6">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">Button Link </h5>-->
                <!--    <input type="text" class="form-control" placeholder="Button Link" name="slide_button_link" <?php if($sl_id!=""){?>value="<?= $slide_button_link ?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Image </h5>
                    <input type="file" class="form-control" name="image" accept=".jpg, .png, image/jpeg, image/png">
                    <?php if($sl_id!=""){?>
                    <img src="images/slider/<?= $image ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col">
                    <?php if($sl_id!=""){?>
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