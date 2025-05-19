<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $fact_heading = htmlspecialchars($_POST['fact_heading'],ENT_QUOTES);
    $fact_desc = htmlspecialchars($_POST['fact_desc'],ENT_QUOTES);
    $fact_status = $_POST['fact_status'];
    $b_image = $_FILES['fact_icon'];
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg', ''];
    $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
    if (in_array(strtolower($image_extension), $allowed_extensions)) {
        $new_image_name = 'fact_' . $currentDate . '.' . $image_extension;
        move_uploaded_file($b_image['tmp_name'], 'images/client/' . $new_image_name);
        
    $sql="INSERT INTO `tbl_facts`(`fact_icon`, `fact_heading`, `fact_desc`, `fact_status`) 
                          VALUES ('$new_image_name', '$fact_heading', '$fact_desc', '$fact_status')";
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
                                window.location.href = 'manage-factfigure.php';
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
                                window.location.href = 'manage-factfigure.php';
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
                            window.location.href = 'manage-factfigure.php';
                        }
                    });
                }
            </script>");
    }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $fact_status = $_POST['fact_status'];
    $fact_heading = htmlspecialchars($_POST['fact_heading'], ENT_QUOTES);
    $fact_desc = htmlspecialchars($_POST['fact_desc'], ENT_QUOTES);
    $team_about = htmlspecialchars($_POST['team_about'], ENT_QUOTES);

    $sql = "UPDATE `tbl_facts` SET `fact_heading`='$fact_heading', `fact_desc`='$fact_desc', `fact_status`='$fact_status'";
    $existing_images_query = "SELECT `fact_icon` FROM `tbl_facts` WHERE fact_id=$id";
    $existing_images_result = $db->query($existing_images_query);
    $existing_images_row = $existing_images_result->fetch_assoc();
    $images = ["fact_icon"];
    $uploaded_files = [];

    foreach ($images as $image) {
        if (!empty($_FILES[$image]['name'])) {
            $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg'];
            $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
            
            if (in_array(strtolower($image_extension), $allowed_extensions)) {
                $new_image_name = 'fact_' . $currentDate . '.' . $image_extension;

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
                                window.location.href = 'manage-factfigure.php';
                            }
                        });
                    }
                </script>";
            }
        }
    }

    $sql .= " WHERE fact_id=$id";

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
                        window.location.href = 'manage-factfigure.php';
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
                        window.location.href = 'manage-factfigure.php';
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

  <?php include "header.php";?>
  
  <?php include "sidebar.php";?>

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
            <a href="manage-factfigure.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['fact_id']) ? $_REQUEST['fact_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_facts` WHERE fact_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $fact_id = $dataupd['fact_id'];
                            $fact_heading = $dataupd['fact_heading'];
                            $fact_desc = $dataupd['fact_desc'];
                            $fact_status = $dataupd['fact_status'];
                            $image = $dataupd['fact_icon'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Title</h5>
                    <input type="text" class="form-control" placeholder="Name" name="fact_heading" <?php if($sl_id!=""){?>value="<?= $fact_heading?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $fact_id?>"<?php }?>>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Description</h5>
                    <input type="text" class="form-control" placeholder="Description" name="fact_desc" <?php if($sl_id!=""){?>value="<?= $fact_desc?>"<?php }?>>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Icon </h5>
                    <input type="file" class="form-control" name="fact_icon" accept=".jpg, .png, image/jpeg, image/png">
                    <?php if($sl_id!=""){?>
                    <img src="images/client/<?= $image ?>" width="50px">
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Status </h5>
                    <select class="form-select" id="AddCategory" name="fact_status">
                        <option value="Active" <?php if($sl_id!=""){?><?php if($fact_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                        <option value="Inactive" <?php if($sl_id!=""){?><?php if($fact_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
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