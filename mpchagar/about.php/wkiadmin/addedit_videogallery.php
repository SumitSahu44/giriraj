<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $video_tile = htmlspecialchars($_POST['video_tile'],ENT_QUOTES);
    $video_status = $_POST['video_status'];
    $video_cat_id = $_POST['video_cat_id'];
    $video_desc = $_POST['video_desc'];
    $video_link = htmlspecialchars($_POST['video_link'], ENT_QUOTES);
        
    $sql="INSERT INTO `tbl_video_gallery`(`video_link`, `video_tile`, `video_cat_id`, `video_status`, `video_desc`) 
                             VALUES ('$video_link', '$video_tile', '$video_cat_id', '$video_status', '$video_desc')";
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
                                window.location.href = 'manage_video_gallery.php';
                            }
                        });
                    }
                </script>");
	   // 	mysqli_close($db);
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
                                window.location.href = 'manage_video_gallery.php';
                            }
                        });
                    }
                </script>");
        }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $video_status = $_POST['video_status'];
    $video_desc = $_POST['video_desc'];
    $video_tile = htmlspecialchars($_POST['video_tile'], ENT_QUOTES);
    $video_cat_id = $_POST['video_cat_id'];
    $video_link = htmlspecialchars($_POST['video_link'], ENT_QUOTES);

    $sql = "UPDATE `tbl_video_gallery` SET `video_tile`='$video_tile', `video_cat_id`='$video_cat_id', `video_status`='$video_status', `video_link`='$video_link', `video_desc`='$video_desc'";

    $sql .= " WHERE video_id=$id";

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
                        window.location.href = 'manage_video_gallery.php';
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
                        window.location.href = 'manage_video_gallery.php';
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
        <div class="breadcrumb-title pe-3">Add/Edit Video Gallery</div>
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
            <a href="manage_video_gallery.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['video_id']) ? $_REQUEST['video_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_video_gallery` WHERE video_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $video_id = $dataupd['video_id'];
                            $video_tile = $dataupd['video_tile'];
                            $video_cat_id = $dataupd['video_cat_id'];
                            $video_status = $dataupd['video_status'];
                            $video_link = $dataupd['video_link'];
                            $video_desc = $dataupd['video_desc'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col">
                  <div class="mb-4">
                    <h5 class="mb-3">Video Title</h5>
                    <input type="text" class="form-control" placeholder="Video Title" name="video_tile" <?php if($sl_id!=""){?>value="<?= $video_tile?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $video_id?>"<?php }?>>
                  </div>
                </div>
                
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Video Link(Embeded) </h5>
                    <textarea class="form-control" cols="2" rows="2" placeholder="Write Video Embeded Link" name="video_link"><?php if($sl_id!=""){?><?= $video_link ?><?php }?></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Video Description </h5>
                    <textarea class="form-control" cols="2" rows="3" placeholder="Write Video Description" name="video_desc"><?php if($sl_id!=""){?><?= $video_desc ?><?php }?></textarea>
                  </div>
                </div>
                <?php 
                    $sqlsup = "SELECT * FROM `tbl_gall_category` WHERE gal_cat_status='Active'";
                    $runsup = mysqli_query($db, $sqlsup) or die("Query Not run");
                    if(mysqli_num_rows($runsup) > 0){?>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Choose Category </h5>
                    <select class="form-select" id="AddCategory" name="video_cat_id">
                        <option value="0">Select Category</option>
                        <?php if($sl_id!=""){
                           $selected_id = $video_cat_id;
                           $sqlsup = "SELECT * FROM `tbl_gall_category` WHERE gal_cat_status='Active'";
                           $runsup = mysqli_query($db, $sqlsup) or die("Query Not run");
                           while($datasup = mysqli_fetch_assoc($runsup)){
                               $selected = ($datasup['gal_cat_id'] == $selected_id) ? 'selected="selected"' : '';
                               echo "<option value='{$datasup['gal_cat_id']}' $selected>{$datasup['gal_cat_title']}</option>";
                           }
                         } else{
                           $sqlsup = "SELECT * FROM `tbl_gall_category` WHERE gal_cat_status='Active'";
                           $runsup = mysqli_query($db, $sqlsup) or die("Query Not run");
                           while($datasup = mysqli_fetch_assoc($runsup)){
                               echo "<option value='{$datasup['gal_cat_id']}'>{$datasup['gal_cat_title']}</option>";
                           }
                         }?>
                    </select>
                  </div>
                </div>
                <?php }?>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <h5 class="mb-3">Status </h5>
                    <select class="form-select" id="AddCategory" name="video_status">
                        <option value="Active" <?php if($sl_id!=""){?><?php if($video_status=='Active'){ ?> selected="selected" <? } ?><?php }?>>Active</option>
                        <option value="Inactive" <?php if($sl_id!=""){?><?php if($video_status=='Inactive'){ ?> selected="selected" <? } ?><?php }?>>Inactive</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
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