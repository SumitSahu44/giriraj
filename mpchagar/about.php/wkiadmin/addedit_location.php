<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $location_name = htmlspecialchars($_POST['location_name'],ENT_QUOTES);
    $location_parent_id = $_POST['location_parent_id'];
    $names = trim($location_name);
    $names = preg_replace('/[#&,\[\]\(\)\{\};:"\'<>\*\^\$%@!?\/\\\|]/', '', $names);
    $names = preg_replace('/\s+/', ' ', $names);
    $nameWords = explode(' ', $names);
    $names = implode(' ', $nameWords);
    $url_links = strtolower($names);
    $url_links = preg_replace('/\./', '', $url_links);
    $url_link = str_replace(' ', '-', $url_links);
    
    $sql="INSERT INTO `tbl_location`(`location_name`, `location_url`, `location_status`, `location_parent_id`) 
                             VALUES ('$location_name', '$url_link', 'Active', '$location_parent_id')";
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
                                window.location.href = " . ($location_parent_id != '0' ? "'manage-sublocation.php?location_parent_id=$location_parent_id'" : "'manage-location.php'") . ";
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
                                window.location.href = " . ($location_parent_id != '0' ? "'manage-sublocation.php?location_parent_id=$location_parent_id'" : "'manage-location.php'") . ";
                            }
                        });
                    }
                </script>");
        }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $location_name = htmlspecialchars($_POST['location_name'], ENT_QUOTES);
    $location_parent_id = $_POST['location_parent_id'];
    $names = trim($location_name);
    $names = preg_replace('/[#&,\[\]\(\)\{\};:"\'<>\*\^\$%@!?\/\\\|]/', '', $names);
    $names = preg_replace('/\s+/', ' ', $names);
    $nameWords = explode(' ', $names);
    $names = implode(' ', $nameWords);
    $url_links = strtolower($names);
    $url_links = preg_replace('/\./', '', $url_links);
    $url_link = str_replace(' ', '-', $url_links);
    
    $sql = "UPDATE `tbl_location` SET `location_name`='$location_name', `location_url`='$url_link'";
    
    $sql .= " WHERE location_id=$id";

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
                        window.location.href = " . ($location_parent_id != '0' ? "'manage-sublocation.php?location_parent_id=$location_parent_id'" : "'manage-location.php'") . ";
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
                        window.location.href = " . ($location_parent_id != '0' ? "'manage-sublocation.php?location_parent_id=$location_parent_id'" : "'manage-location.php'") . ";
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
        <div class="breadcrumb-title pe-3">Add/Edit Location</div>
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
            <a href="manage-location.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $cat_pat_id=$_GET['location_parent_id'];
                $sl_id = isset($_REQUEST['location_id']) ? $_REQUEST['location_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_location` WHERE location_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $location_id = $dataupd['location_id'];
                            $location_name = $dataupd['location_name'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Location Name</h5>
                    <input type="text" class="form-control" placeholder="location_name?" name="location_name" <?php if($sl_id!=""){?>value="<?= $location_name?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $location_id?>"<?php }?>>
                    <input type="hidden" name="location_parent_id" <?php if($cat_pat_id!=""){?>value="<?= $cat_pat_id?>"<?php }?>>
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