<?php 
    include "../include/dbsmain.inc.php";
	
  if(isset($_POST['submit'])) {
    $cl_title = htmlspecialchars($_POST['cl_title'],ENT_QUOTES);
    $cl_link = htmlspecialchars($_POST['cl_link'],ENT_QUOTES);
    $cl_status = $_POST['cl_status'];
    $b_image = $_FILES['cl_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'client_' . $currentDate . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/client/' . $new_image_name);
        
    $sql="INSERT INTO `tbl_clients`(`cl_image`, `cl_title`, `cl_link`, `cl_status`) 
                          VALUES ('$new_image_name', '$cl_title', '$cl_link', '$cl_status')";
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
                                window.location.href = 'manage-clients.php';
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
                                window.location.href = 'manage-clients.php';
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
                            window.location.href = 'manage-clients.php';
                        }
                    });
                }
            </script>");
    }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $cl_status = $_POST['cl_status'];
    $cl_title = htmlspecialchars($_POST['cl_title'], ENT_QUOTES);
    $cl_link = htmlspecialchars($_POST['cl_link'], ENT_QUOTES);

    $sql = "UPDATE `tbl_clients` SET `cl_title`='$cl_title', `cl_link`='$cl_link', `cl_status`='$cl_status'";
    $existing_images_query = "SELECT `cl_image` FROM `tbl_clients` WHERE cl_id=$id";
    $existing_images_result = $db->query($existing_images_query);
    $existing_images_row = $existing_images_result->fetch_assoc();
    $images = ["cl_image"];
    $uploaded_files = [];

    foreach ($images as $image) {
        if (!empty($_FILES[$image]['name'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
            
            if (in_array(strtolower($image_extension), $allowed_extensions)) {
                $new_image_name = 'client_' . $currentDate . '.' . $image_extension;

                if (move_uploaded_file($_FILES[$image]['tmp_name'], 'images/client/' . $new_image_name)) {
                    if (!empty($existing_images_row[$image])) {
                        unlink('images/client/' . $existing_images_row[$image]);
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
                                window.location.href = 'manage-clients.php';
                            }
                        });
                    }
                </script>";
            }
        }
    }

    $sql .= " WHERE cl_id=$id";

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
                        window.location.href = 'manage-clients.php';
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
                        window.location.href = 'manage-clients.php';
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
        <div class="breadcrumb-title pe-3">Add/Edit Team</div>
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
            <a href="manage-clients.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['cl_id']) ? $_REQUEST['cl_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_clients` WHERE cl_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $cl_id = $dataupd['cl_id'];
                            $cl_title = $dataupd['cl_title'];
                            $cl_link = $dataupd['cl_link'];
                            $cl_status = $dataupd['cl_status'];
                            $image = $dataupd['cl_image'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Title</h5>
                    <input type="text" class="form-control" placeholder="Name" name="cl_title" <?php if($sl_id!=""){?>value="<?= $cl_title?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $cl_id?>"<?php }?>>
                  </div>
                </div>
                
                <!--<div class="col-lg-12">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">Link</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Link" name="cl_link" <?php if($sl_id!=""){?>value="<?= $cl_link?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Image </h5>
                    <input type="file" class="form-control" name="cl_image" accept=".jpg, .png, image/jpeg, image/png">
                    <?php if($sl_id!=""){?>
                    <img src="images/client/<?= $image ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Status </h5>
                    <select class="form-select" id="AddCategory" name="cl_status">
                        <option value="Active" <?php if($sl_id!=""){?><?php if($cl_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                        <option value="Inactive" <?php if($sl_id!=""){?><?php if($cl_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
                    </select>
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