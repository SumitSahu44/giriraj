<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
    $link_name = htmlspecialchars($_POST['link_name'],ENT_QUOTES);
    $link_url = htmlspecialchars($_POST['link_url'],ENT_QUOTES);
    $link_status = 'Active';
        
    $sql="INSERT INTO `tbl_external_links`(`link_name`, `link_url`, `link_status`) 
                  VALUES ('$link_name', '$link_url', '$link_status')";
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
                                window.location.href = 'manage-externallinks.php';
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
                                window.location.href = 'manage-externallinks.php';
                            }
                        });
                    }
                </script>");
        }
	}
	
	if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $link_name = htmlspecialchars($_POST['link_name'], ENT_QUOTES);
    $link_url = htmlspecialchars($_POST['link_url'], ENT_QUOTES);

    $sql = "UPDATE `tbl_external_links` SET `link_name`='$link_name', `link_url`='$link_url'";
    
    $sql .= " WHERE link_id=$id";

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
                        window.location.href = 'manage-externallinks.php';
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
                        window.location.href = 'manage-externallinks.php';
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
        <div class="breadcrumb-title pe-3">Add/Edit FAQ</div>
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
            <a href="manage-externallinks.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card border-top border-3 border-danger rounded-0">
            <div class="card-body">
              <?php
                $sl_id = isset($_REQUEST['link_id']) ? $_REQUEST['link_id'] : '';
                if($sl_id!='') {
                    $sqlupd = "SELECT * FROM `tbl_external_links` WHERE link_id=$sl_id";
                    $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                    
                    if ($runupd) {
                        $dataupd = mysqli_fetch_assoc($runupd);
                        if ($dataupd) {
                            $link_id = $dataupd['link_id'];
                            $link_name = $dataupd['link_name'];
                            $link_status = $dataupd['link_status'];
                            $link_url = $dataupd['link_url'];
                        }
                    }
                    
                }
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">  
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Link Name</h5>
                    <input type="text" class="form-control" placeholder="Link Name" name="link_name" <?php if($sl_id!=""){?>value="<?= $link_name?>"<?php }?>>
                    <input type="hidden" name="id" <?php if($sl_id!=""){?>value="<?= $link_id?>"<?php }?>>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-4">
                    <h5 class="mb-3">Link URL</h5>
                    <textarea class="form-control" cols="4" rows="2" placeholder="write a Link.." name="link_url"><?php if($sl_id!=""){?><?= $link_url ?><?php }?></textarea>
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