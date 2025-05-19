<?php 
  include "../include/dbsmain.inc.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['active'])) {
       // Handle the active logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_video_gallery SET video_status='Active' WHERE video_id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Activate successfully.',
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
   
      if (isset($_POST['inactive'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_video_gallery SET video_status='Inactive' WHERE video_id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Deactivated successfully.',
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
     
     
    if (isset($_POST['delete'])) {
        // Handle the inactive logic here
        $checkedIDs = $_POST['checkedIDs'];
    
        foreach ($checkedIDs as $pageID) {
            
            $sql = "DELETE FROM `tbl_video_gallery` WHERE video_id='$pageID'";
            $result = mysqli_query($db, $sql) or die("Query unsuccessful");
        }
    
        if ($result) {
            echo ("<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Deleted successfully.',
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

    
    if (isset($_POST['Update-order'])) {
    $pageIDs = $_POST['paID'];
    $site_pages_order_bys = $_POST['site_pages_order_by'];

    if (count($pageIDs) === count($site_pages_order_bys)) {
        $stmt = mysqli_prepare($db, "UPDATE tbl_video_gallery SET video_order = ? WHERE video_id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . mysqli_error($db));
        }

        for ($i = 0; $i < count($pageIDs); $i++) {
            $pageID = $pageIDs[$i];
            $orderValue = $site_pages_order_bys[$i];
            mysqli_stmt_bind_param($stmt, 'ii', $orderValue, $pageID);
            $result = mysqli_stmt_execute($stmt);
            if (!$result) {
                die("Query unsuccessful: " . mysqli_stmt_error($stmt));
            }
        }
        mysqli_stmt_close($stmt);
        header("Location: manage_video_gallery.php");
        exit();
    } else {
        die("The number of IDs and order values do not match.");
    }
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
                <div class="breadcrumb-title pe-3">Manage Video Gallery</div>
                <div class="ms-auto">
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row g-3">
                <div class="col-auto">
                </div>
                <div class="col-auto pb-2">
                  <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <button class="btn btn-primary px-2" onclick="window.location.href='manage_gallery_category.php'">
                          <i class="lni lni-circle-plus"></i> Video Gallery Categories</button>
                    <button class="btn btn-primary px-2" onclick="window.location.href='addedit_videogallery.php'">
                          <i class="lni lni-circle-plus"></i> Add Video Gallery</button>
                  </div>
                </div>
            </div><!--end row-->
    
            <div class="card">
                <div class="card-body">
                    <div class="customer-table">
                        <div class="table-responsive white-space-nowrap">
                            <form method="POST" action="<?php $_PHP_SELF?>" onsubmit="return validateForm()">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead class="table-light">
                                    <tr>
                                        <th style="display:none">Sr. No.</th>
                                        <th>Title</th>
                                        <th>Video </th>
                                        <th>Order By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `tbl_video_gallery` ORDER BY video_order ASC";
                                        $run = mysqli_query($db,$sql) or die("Query Not run");
                                        $count=0;
                                        while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                    ?>
                                    <tr>
                                        <td style="display:none"><?php echo $count?></td>
                                        <td><?php echo $data['video_tile']?></td>
                                        <td>
                                            <svg height="50px" version="1.1" viewBox="0 0 68 48" width="50px"><path class="ytp-large-play-button-bg" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#f00"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path></svg>
                                        </td>
                                        <td>
                                            <input type="text" name="site_pages_order_by[]" value="<?php echo htmlspecialchars($data['video_order']); ?>" style="width:40px; outline:none;">
                                            <input type="hidden" name="paID[]" value="<?php echo htmlspecialchars($data['video_id']); ?>">
                                        </td>
                                        <td>
                                            <?php if($data["video_status"]=="Active"){?>
                                            <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }else{?>
                                            <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }?>
                                        </td>
                                        <td>
                                          <a href="addedit_videogallery.php?video_id=<?php echo $data['video_id']?>"><i class="fadeIn animated bx bx-edit font-20"></i></a>
                                        </td>
                                        <td>
                                           <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["video_id"]?>" class="form-check-input row-checkbox" >
                                           <input type="hidden" name="pageID[]" value="<?php echo $data["video_id"]?>">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row ">
                                <div class="btm-btns pt-2 pb-2">
                                    <div class="col">
                                      <button type="submit" name="Update-order" class="btn ripple btn-info px-2">Update Order</button>
                                    </div>
                                    <div class="col">
                                      <button type="submit" name="active" class="btn ripple btn-primary px-2">Make Active</button>
                                    </div>
                                    <div class="col">
                                      <button type="submit" name="inactive" class="btn ripple btn-warning px-2">Make Inactive</button>
                                    </div>
                                    <div class="col">
                                      <button type="submit" name="delete" class="btn ripple btn-danger px-2">Delete</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </main>


	<?php include "footer.php";?>

</body>

</html>