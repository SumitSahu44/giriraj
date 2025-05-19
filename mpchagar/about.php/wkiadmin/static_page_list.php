<?php 
  include "../include/dbsmain.inc.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['active'])) {
       // Handle the active logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_site_pages SET site_pages_status='Active' WHERE site_pages_id='$pageID'";
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
                            window.location.href = 'static_page_list.php';
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
           $sql = "UPDATE tbl_site_pages SET site_pages_status='Inactive' WHERE site_pages_id='$pageID'";
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
                            window.location.href = 'static_page_list.php';
                        }
                    });
                }
            </script>");
       }
     }
     
     if (isset($_POST['show_header_yes'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_site_pages SET site_pages_show_in_header='Yes' WHERE site_pages_id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Update successfully.',
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
     
     
     if (isset($_POST['show_header_no'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_site_pages SET site_pages_show_in_header='No' WHERE site_pages_id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Update successfully.',
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
     
     if (isset($_POST['show_footer_yes'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_site_pages SET site_pages_show_in_footer='Yes' WHERE site_pages_id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Update successfully.',
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
     
     if (isset($_POST['show_footer_no'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_site_pages SET site_pages_show_in_footer='No' WHERE site_pages_id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Update successfully.',
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
     
     
    if (isset($_POST['delete'])) {
        // Handle the inactive logic here
        $checkedIDs = $_POST['checkedIDs'];
    
        foreach ($checkedIDs as $pageID) {
            $existing_images_query = "SELECT `site_pages_image_name` FROM `tbl_site_pages` WHERE site_pages_id='$pageID'";
            $existing_images_result = mysqli_query($db, $existing_images_query) or die("Query unsuccessful");
            $existing_images_row = mysqli_fetch_assoc($existing_images_result);
    
            if (!empty($existing_images_row['site_pages_image_name'])) {
                unlink('images/' . $existing_images_row['site_pages_image_name']);
            }
            
            $sql = "DELETE FROM `tbl_site_pages` WHERE site_pages_id='$pageID'";
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
                            window.location.href = 'static_page_list.php';
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
        $stmt = mysqli_prepare($db, "UPDATE tbl_site_pages SET site_pages_order_by = ? WHERE site_pages_id = ?");
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
        header("Location: static_page_list.php");
        exit();
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
          <div class="breadcrumb-title pe-3">Manage Static Pages </div>
          <div class="ms-auto">
          </div>
        </div>

        <div class="row g-3">
          <div class="col-auto pb-2">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
              <!--<button class="btn btn-filter px-4"><i class="bi bi-box-arrow-right me-2"></i>Delete Selected</button>-->
              <button class="btn btn-primary px-2" onclick="window.location.href='addedit-static-page.php'">
                  <i class="lni lni-circle-plus"></i> Add New Page</button>
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
                      <th>Show In Header/Footer</th>
                      <th>Order By</th>
                      <th>Status</th>
                      <th>Edit</th>
                      <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php 
                          $sql = "SELECT * FROM `tbl_site_pages` ORDER BY site_pages_order_by ASC";
                          $run = mysqli_query($db,$sql) or die("Query Not run");
                          $count=0;
                          while($data = mysqli_fetch_assoc($run)){
                          $count++;
                      ?>
                    <tr>
                      <td style="display:none"><?php echo $count?></td>
                      <td><?php echo $data['site_pages_name']?></td>
                      <td><?php echo $data['site_pages_show_in_header']?>/<?php echo $data['site_pages_show_in_footer']?></td>
                      <td>
                          <input type="text" name="site_pages_order_by[]" value="<?php echo htmlspecialchars($data['site_pages_order_by']); ?>" style="width:40px; outline:none;">
                          <input type="hidden" name="paID[]" value="<?php echo htmlspecialchars($data['site_pages_id']); ?>">
                      </td>
  
                      <td>
                          <?php if($data["site_pages_status"]=="Active"){?>
                          <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>
                          <?php }else{?>
                          <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-check2 ms-2"></i></span>
                          <?php }?>
                      </td>
                      
                      <td>
                        <a href="addedit-static-page.php?pages_id=<?php echo $data['site_pages_id']?>"><i class="fadeIn animated bx bx-edit font-20"></i></a>
                      </td>
                      <td>
                        <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["site_pages_id"]?>" class="form-check-input row-checkbox" >
                        <input type="hidden" name="pageID[]" value="<?php echo $data["site_pages_id"]?>">
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
                        <button type="submit" name="active" class="btn ripple btn-primary px-2">Active</button>
                      </div>
                      <div class="col">
                        <button type="submit" name="inactive" class="btn ripple btn-warning px-2">Inactive</button>
                      </div>
                      
                      <div class="col">
                         <button type="submit" name="show_header_yes" class="btn ripple btn-success px-2">Show In Header</button>
                      </div>
                      <div class="col">
                         <button type="submit" name="show_header_no" class="btn ripple btn-warning px-2">Hide In Header</button>
                       </div>
                      <div class="col">
                         <button type="submit" name="show_footer_yes" class="btn ripple btn-success px-2">Show In Footer</button>
                       </div>
                      <div class="col">
                         <button type="submit" name="show_footer_no" class="btn ripple btn-warning px-2">Hide In Footer</button>
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
    <script>
        function validateForm() {
            var checkboxes = document.getElementsByName('checkedIDs[]');
            var checked = false;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checked = true;
                    break;
                }
            }
            if (!checked && event.submitter.name !== "Update-order") {
                alert('Check at least one box');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>