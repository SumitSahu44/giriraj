<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $tes_name = htmlspecialchars($_POST['tes_name'],ENT_QUOTES);
    $tes_company = htmlspecialchars($_POST['tes_company'],ENT_QUOTES);
    $tes_designation = htmlspecialchars($_POST['tes_designation'],ENT_QUOTES);
    $tes_description = htmlspecialchars($_POST['tes_description'],ENT_QUOTES);
    $tes_status = $_POST['tes_status'];
    $tes_rating = $_POST['tes_rating'];
    $tes_metatitle = htmlspecialchars($_POST['tes_metatitle'],ENT_QUOTES);
    $tes_metadesc = htmlspecialchars($_POST['tes_metadesc'],ENT_QUOTES);
    $b_image = $_FILES['tes_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'team_' . $currentDate . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/testimonial/' . $new_image_name);
        
    $sql="INSERT INTO `tbl_testimonial`(`tes_image`, `tes_name`, `tes_designation`, `tes_description`, `tes_status`, `tes_rating`, `tes_company`, `tes_metatitle`, `tes_metadesc`) 
                        VALUES ('$new_image_name', '$tes_name', '$tes_designation', '$tes_description', '$tes_status', '$tes_rating', '$tes_company', '$tes_metatitle', '$tes_metadesc')";
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
                                window.location.href = 'manage-testimonial.php';
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
                                window.location.href = 'manage-testimonial.php';
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
                            window.location.href = 'manage-testimonial.php';
                        }
                    });
                }
            </script>");
    }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tes_status = $_POST['tes_status'];
    $tes_rating = $_POST['tes_rating'];
    $tes_company = htmlspecialchars($_POST['tes_company'],ENT_QUOTES);
    $tes_name = htmlspecialchars($_POST['tes_name'], ENT_QUOTES);
    $tes_designation = htmlspecialchars($_POST['tes_designation'], ENT_QUOTES);
    $tes_description = htmlspecialchars($_POST['tes_description'], ENT_QUOTES);
    $tes_metatitle = htmlspecialchars($_POST['tes_metatitle'],ENT_QUOTES);
    $tes_metadesc = htmlspecialchars($_POST['tes_metadesc'],ENT_QUOTES);

    $sql = "UPDATE `tbl_testimonial` SET `tes_name`='$tes_name', `tes_designation`='$tes_designation', `tes_description`='$tes_description', `tes_status`='$tes_status', `tes_rating`='$tes_rating', `tes_company`='$tes_company', `tes_metatitle`='$tes_metatitle', `tes_metadesc`='$tes_metadesc'";
    $existing_images_query = "SELECT `tes_image` FROM `tbl_testimonial` WHERE tes_id=$id";
    $existing_images_result = $db->query($existing_images_query);
    $existing_images_row = $existing_images_result->fetch_assoc();
    $images = ["tes_image"];
    $uploaded_files = [];

    foreach ($images as $image) {
        if (!empty($_FILES[$image]['name'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
            
            if (in_array(strtolower($image_extension), $allowed_extensions)) {
                $new_image_name = 'team_' . $currentDate . '.' . $image_extension;

                if (move_uploaded_file($_FILES[$image]['tmp_name'], 'images/testimonial/' . $new_image_name)) {
                    if (!empty($existing_images_row[$image])) {
                        unlink('images/testimonial/' . $existing_images_row[$image]);
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
                                window.location.href = 'manage-testimonial.php';
                            }
                        });
                    }
                </script>";
            }
        }
    }

    $sql .= " WHERE tes_id=$id";

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
                        window.location.href = 'manage-testimonial.php';
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
                        window.location.href = 'manage-testimonial.php';
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
        <div class="breadcrumb-title pe-3">Add/Edit Testimonial</div>
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
            <a href="manage-testimonial.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['tes_id']) ? $_REQUEST['tes_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_testimonial` WHERE tes_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $tes_id = $dataupd['tes_id'];
                            $tes_name = $dataupd['tes_name'];
                            $tes_company = $dataupd['tes_company'];
                            $tes_designation = $dataupd['tes_designation'];
                            $tes_status = $dataupd['tes_status'];
                            $tes_description = $dataupd['tes_description'];
                            $image = $dataupd['tes_image'];
                            $tes_rating = $dataupd['tes_rating'];
                            $tes_metatitle = $dataupd['tes_metatitle'];
                            $tes_metadesc = $dataupd['tes_metadesc'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Name</h5>
                    <input type="text" class="form-control" placeholder="Name" name="tes_name" <?php if($sl_id!=""){?>value="<?= $tes_name?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $tes_id?>"<?php }?>>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Designation</h5>
                    <input type="text" class="form-control" placeholder="Designation" name="tes_designation" <?php if($sl_id!=""){?>value="<?= $tes_designation?>"<?php }?>>
                  </div>
                </div>
                
                <!--<div class="col-lg-6">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">Company Name</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Company Name" name="tes_company" <?php if($sl_id!=""){?>value="<?= $tes_company?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Description</h5>
                    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="tes_description"><?php if($sl_id!=""){?><?= $tes_description ?><?php }?></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Star Rating</h5>
                    
                    <div class="form-check form-check-success mb-2">
                        <input class="form-check-input" value="5" type="radio" name="tes_rating" id="flexRadioSuccess" <?php if ($tes_rating == 5) echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioSuccess">
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-info mb-2">
                        <input class="form-check-input" value="4" type="radio" name="tes_rating" id="flexRadioSuccess2" <?php if ($tes_rating == 4) echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioSuccess2">
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-warning mb-2">
                        <input class="form-check-input" value="3" type="radio" name="tes_rating" id="flexRadioSuccess3" <?php if ($tes_rating == 3) echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioSuccess3">
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-dark mb-2">
                        <input class="form-check-input" value="2" type="radio" name="tes_rating" id="flexRadioSuccess4" <?php if ($tes_rating == 2) echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioSuccess4">
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                        </label>
                    </div>
                    <div class="form-check form-check-danger mb-2">
                        <input class="form-check-input" value="1" type="radio" name="tes_rating" id="flexRadioSuccess5" <?php if ($tes_rating == 1) echo 'checked'; ?>>
                        <label class="form-check-label" for="flexRadioSuccess5">
                            <i class="lni lni-star-filled btn btn-outline-warning" style="margin-right: 2px;"></i>
                        </label>
                    </div>

                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Meta Title</h5>
                    <textarea class="form-control" cols="4" rows="2" placeholder="write a title here.." name="tes_metatitle"><?php if($sl_id!=""){?><?= $tes_metatitle ?><?php }?></textarea>
                  </div>
                </div><div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Meta Description</h5>
                    <textarea class="form-control" cols="4" rows="2" placeholder="write a description here.." name="tes_metadesc"><?php if($sl_id!=""){?><?= $tes_metadesc ?><?php }?></textarea>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Image </h5>
                    <input type="file" class="form-control" name="tes_image" accept=".jpg, .png, image/jpeg, image/png">
                    <?php if($sl_id!=""){?>
                    <img src="images/testimonial/<?= $image ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Status </h5>
                    <select class="form-select" id="AddCategory" name="tes_status">
                        <option value="Active" <?php if($sl_id!=""){?><?php if($tes_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                        <option value="Inactive" <?php if($sl_id!=""){?><?php if($tes_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="col">
                    <?php if($sl_id!=""){?>
                    <button type="submit" name="update" class="btn btn-grd-primary px-4">Update</button>
                    <?php }else{?>								                                 
                    <button type="submit" name="submit" class="btn btn-grd-primary px-4">Submit</button>
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