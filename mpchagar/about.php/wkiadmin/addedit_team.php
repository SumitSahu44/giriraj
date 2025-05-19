<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $team_name = htmlspecialchars($_POST['team_name'],ENT_QUOTES);
    $team_designation = htmlspecialchars($_POST['team_designation'],ENT_QUOTES);
    $team_about = htmlspecialchars($_POST['team_about'],ENT_QUOTES);
    $team_status = $_POST['team_status'];
    $fb_link = htmlspecialchars($_POST['fb_link'],ENT_QUOTES);
    $tw_link = htmlspecialchars($_POST['tw_link'],ENT_QUOTES);
    $inst_link = htmlspecialchars($_POST['inst_link'],ENT_QUOTES);
    $lkd_link = htmlspecialchars($_POST['lkd_link'],ENT_QUOTES);
    $b_image = $_FILES['team_image'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'team_' . $currentDate . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/team/' . $new_image_name);
        
    $sql="INSERT INTO `tbl_team`(`team_image`, `team_name`, `team_designation`, `team_about`, `team_status`, `fb_link`, `tw_link`, `inst_link`, `lkd_link`) 
                  VALUES ('$new_image_name', '$team_name', '$team_designation', '$team_about', '$team_status', '$fb_link', '$tw_link', '$inst_link', '$lkd_link')";
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
                                window.location.href = 'manage-team.php';
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
                                window.location.href = 'manage-team.php';
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
                            window.location.href = 'manage-team.php';
                        }
                    });
                }
            </script>");
    }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $team_status = $_POST['team_status'];
    $team_name = htmlspecialchars($_POST['team_name'], ENT_QUOTES);
    $team_designation = htmlspecialchars($_POST['team_designation'], ENT_QUOTES);
    $team_about = htmlspecialchars($_POST['team_about'], ENT_QUOTES);
    $fb_link = htmlspecialchars($_POST['fb_link'],ENT_QUOTES);
    $tw_link = htmlspecialchars($_POST['tw_link'],ENT_QUOTES);
    $inst_link = htmlspecialchars($_POST['inst_link'],ENT_QUOTES);
    $lkd_link = htmlspecialchars($_POST['lkd_link'],ENT_QUOTES);

    $sql = "UPDATE `tbl_team` SET `team_name`='$team_name', `team_designation`='$team_designation', `team_about`='$team_about', `team_status`='$team_status', `fb_link`='$fb_link', `tw_link`='$tw_link', `inst_link`='$inst_link', `lkd_link`='$lkd_link'";
    $existing_images_query = "SELECT `team_image` FROM `tbl_team` WHERE team_id=$id";
    $existing_images_result = $db->query($existing_images_query);
    $existing_images_row = $existing_images_result->fetch_assoc();
    $images = ["team_image"];
    $uploaded_files = [];

    foreach ($images as $image) {
        if (!empty($_FILES[$image]['name'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
            
            if (in_array(strtolower($image_extension), $allowed_extensions)) {
                $new_image_name = 'team_' . $currentDate . '.' . $image_extension;

                if (move_uploaded_file($_FILES[$image]['tmp_name'], 'images/team/' . $new_image_name)) {
                    if (!empty($existing_images_row[$image])) {
                        unlink('images/team/' . $existing_images_row[$image]);
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
                                window.location.href = 'manage-team.php';
                            }
                        });
                    }
                </script>";
            }
        }
    }

    $sql .= " WHERE team_id=$id";

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
                        window.location.href = 'manage-team.php';
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
                        window.location.href = 'manage-team.php';
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
            <a href="manage-team.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['team_id']) ? $_REQUEST['team_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_team` WHERE team_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $team_id = $dataupd['team_id'];
                            $team_name = $dataupd['team_name'];
                            $team_designation = $dataupd['team_designation'];
                            $team_status = $dataupd['team_status'];
                            $team_about = $dataupd['team_about'];
                            $image = $dataupd['team_image'];
                            $fb_link = $dataupd['fb_link'];
                            $tw_link = $dataupd['tw_link'];
                            $inst_link = $dataupd['inst_link'];
                            $lkd_link = $dataupd['lkd_link'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Name</h5>
                    <input type="text" class="form-control" placeholder="Name" name="team_name" <?php if($sl_id!=""){?>value="<?= $team_name?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $team_id?>"<?php }?>>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Designation</h5>
                    <input type="text" class="form-control" placeholder="Designation" name="team_designation" <?php if($sl_id!=""){?>value="<?= $team_designation?>"<?php }?>>
                  </div>
                </div>
                <!--<div class="col-lg-12">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3">About</h5>-->
                <!--    <textarea class="form-control" cols="4" rows="3" placeholder="write a description here.." name="team_about"><?php if($sl_id!=""){?><?= $team_about ?><?php }?></textarea>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-lg-6">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3"><i class="lni lni-facebook-original"></i> Facebook Link</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Facebook Link" name="fb_link" <?php if($sl_id!=""){?>value="<?= $fb_link?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-lg-6">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3"><i class="lni lni-twitter-original"></i> Twitter Link</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Twitter Link" name="tw_link" <?php if($sl_id!=""){?>value="<?= $tw_link?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-lg-6">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3"><i class="lni lni-instagram"></i> Instagram Link</h5>-->
                <!--    <input type="text" class="form-control" placeholder="Instagram Link" name="inst_link" <?php if($sl_id!=""){?>value="<?= $inst_link?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <!--<div class="col-lg-6">-->
                <!--  <div class="mb-4">-->
                <!--    <h5 class="mb-3"><i class="lni lni-linkedin-original"></i> LinkedIn</h5>-->
                <!--    <input type="text" class="form-control" placeholder="LinkedIn Link" name="lkd_link" <?php if($sl_id!=""){?>value="<?= $lkd_link?>"<?php }?>>-->
                <!--  </div>-->
                <!--</div>-->
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Image </h5>
                    <input type="file" class="form-control" name="team_image" accept=".jpg, .png, image/jpeg, image/png">
                    <?php if($sl_id!=""){?>
                    <img src="images/team/<?= $image ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Status </h5>
                    <select class="form-select" id="AddCategory" name="team_status">
                        <option value="Active" <?php if($sl_id!=""){?><?php if($team_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                        <option value="Inactive" <?php if($sl_id!=""){?><?php if($team_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
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