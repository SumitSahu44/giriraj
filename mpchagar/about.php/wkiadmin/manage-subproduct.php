<?php 
  include "../include/dbsmain.inc.php";
  $category_parent_id = isset($_REQUEST['category_parent_id']) ? $_REQUEST['category_parent_id'] : '';
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['active'])) {
       // Handle the active logic here
       $checkedIDs = $_POST['checkedIDs'];
   
        foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_category SET category_status='Active' WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
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
           $sql = "UPDATE tbl_category SET category_status='Inactive' WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
                        }
                    });
                }
            </script>");
       }
     }
     
     if (isset($_POST['make_hot'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_category SET category_is_hot='Yes' WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
                        }
                    });
                }
            </script>");
       }
     }
     
     
     if (isset($_POST['remove_hot'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_category SET category_is_hot='No' WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
                        }
                    });
                }
            </script>");
       }
     }
     
     if (isset($_POST['make_featured'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_category SET category_is_featured='Yes' WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
                        }
                    });
                }
            </script>");
       }
     }
     
     if (isset($_POST['remove_featured'])) {
       // Handle the inactive logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_category SET category_is_featured='No' WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
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
            $existing_images_query = "SELECT `category_image_name` FROM `tbl_category` WHERE category_id='$pageID'";
            $existing_images_result = mysqli_query($db, $existing_images_query) or die("Query unsuccessful");
            $existing_images_row = mysqli_fetch_assoc($existing_images_result);
    
            if (!empty($existing_images_row['category_image_name'])) {
                unlink('images/services/' . $existing_images_row['category_image_name']);
            }
            
            $sql = "DELETE FROM `tbl_category` WHERE category_id='$pageID'";
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
                            window.location.href = 'manage-subproduct.php?category_parent_id=$category_parent_id';
                        }
                    });
                }
            </script>");
        }
    }

    
    if (isset($_POST['Update-order'])) {
    $pageIDs = $_POST['paID'];
    $category_order_bys = $_POST['category_order_by'];

    if (count($pageIDs) === count($category_order_bys)) {
        $stmt = mysqli_prepare($db, "UPDATE tbl_category SET category_order_by = ? WHERE category_id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . mysqli_error($db));
        }

        for ($i = 0; $i < count($pageIDs); $i++) {
            $pageID = $pageIDs[$i];
            $orderValue = $category_order_bys[$i];
            mysqli_stmt_bind_param($stmt, 'ii', $orderValue, $pageID);
            $result = mysqli_stmt_execute($stmt);
            if (!$result) {
                die("Query unsuccessful: " . mysqli_stmt_error($stmt));
            }
        }
        mysqli_stmt_close($stmt);
        header("Location: manage-subproduct.php?category_parent_id=" . $category_parent_id);
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
            <div class="breadcrumb-title pe-3">Products/Services</div>
            <div class="ms-auto">
          </div>
        </div>
      <!--end breadcrumb-->

      <div class="row g-3">
        <!--<div class="col-auto flex-grow-1 overflow-auto">-->
        <!--  <div class="btn-group position-static">-->
        <!--    <div class="btn-group position-static">-->
        <!--      <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"-->
        <!--        aria-expanded="false">-->
        <!--        Category-->
        <!--      </button>-->
        <!--      <ul class="dropdown-menu">-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Action</a></li>-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>-->
        <!--        <li>-->
        <!--          <hr class="dropdown-divider">-->
        <!--        </li>-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>-->
        <!--      </ul>-->
        <!--    </div>-->
        <!--    <div class="btn-group position-static">-->
        <!--      <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"-->
        <!--        aria-expanded="false">-->
        <!--        Vendor-->
        <!--      </button>-->
        <!--      <ul class="dropdown-menu">-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Action</a></li>-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>-->
        <!--        <li>-->
        <!--          <hr class="dropdown-divider">-->
        <!--        </li>-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>-->
        <!--      </ul>-->
        <!--    </div>-->
        <!--    <div class="btn-group position-static">-->
        <!--      <button type="button" class="btn btn-filter dropdown-toggle px-4" data-bs-toggle="dropdown"-->
        <!--        aria-expanded="false">-->
        <!--        Collection-->
        <!--      </button>-->
        <!--      <ul class="dropdown-menu">-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Action</a></li>-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Another action</a></li>-->
        <!--        <li>-->
        <!--          <hr class="dropdown-divider">-->
        <!--        </li>-->
        <!--        <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>-->
        <!--      </ul>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
        <div class="col-auto pb-2">
          <div class="d-flex align-items-center gap-2 justify-content-lg-end">
            <button class="btn btn-primary px-2" onclick="window.location.href='addedit_product.php?category_parent_id=<?= $category_parent_id?>'">
                  <i class="lni lni-circle-plus"></i> Add New Product</button>
          </div>
        </div>
      </div><!--end row-->

      <div class="card">
        <div class="card-body">
          <div class="customer-table">
            <div class="table-responsive white-space-nowrap">
              <!--<table class="table align-middle">-->
              <form method="POST" action="<?php $_PHP_SELF?>" onsubmit="return validateForm()">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead class="table-light">
                  <tr>
                    <th style="display:none">Sr. No.</th>
                    <th>Category Name</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Category is?</th>
                    <th>Is Hot / Featured ?</th>
                    <th>Status</th>
                    <th>Order By</th>
                    <th>Action</th>
                    <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM `tbl_category` WHERE category_parent_id!=0 ";
                        if($category_parent_id!=""){
                            $sql .=" AND category_parent_id='$category_parent_id'";
                        }
                         $sql .=" ORDER BY category_order_by ASC";
                        $run = mysqli_query($db,$sql) or die("Query Not run");
                        $count=0;
                        while($data = mysqli_fetch_assoc($run)){
                        $count++;
                    ?>
                  <tr>
                    <td style="display:none"><?php echo $count?></td>
                    <td>
                        <div class="product-info"><?php echo $data['category_name']?></div>
                    </td>
                    <td>
                        <img src="images/services/<?php echo $data['category_image_name']?>" width="40" class="rounded-3" >
                    </td>
                    <td>
                        <?php
                        $d = mysqli_fetch_assoc(mysqli_query($db, "select * from tbl_category where category_id='".$data["category_parent_id"]."' "));
                        ?>
                        <div class="product-info"><?php echo $d['category_name']?></div>
                    </td>
                    <td>
                        <?php if($data["category_is_product"]=="Yes"){?>
                        <span class="lable-table text-success rounded border border-success-subtle font-text2 fw-bold">Product<i class="bi bi-check2 ms-2"></i></span>
                        <?php }else{?>
                        <span class="lable-table text-danger rounded border border-danger-subtle font-text2 fw-bold">Service<i class="bi bi-check2 ms-2"></i></span>
                        <?php }?>
                    </td>
                    <td><?php echo $data['category_is_hot']?>/<?php echo $data['category_is_featured']?></td>
                    <td>
                        <?php if($data["category_status"]=="Active"){?>
                        <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>
                        <?php }else{?>
                        <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-check2 ms-2"></i></span>
                        <?php }?>
                    </td>
                    <td>
                        <input type="text" name="category_order_by[]" value="<?php echo htmlspecialchars($data['category_order_by']); ?>" style="width:40px; outline:none;">
                        <input type="hidden" name="paID[]" value="<?php echo htmlspecialchars($data['category_id']); ?>">
                    </td>
                    
                    <td>
                      <a href="addedit_product.php?category_parent_id=<?= $category_parent_id?>&category_id=<?php echo $data['category_id']?>"><i class="fadeIn animated bx bx-edit font-20"></i></a>
                    </td>
                    <td>
                       <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["category_id"]?>" class="form-check-input row-checkbox" >
                       <input type="hidden" name="pageID[]" value="<?php echo $data["category_id"]?>">
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
                         <button type="submit" name="make_hot" class="btn ripple btn-success px-2">Make Hot</button>
                      </div>
                      <div class="col">
                         <button type="submit" name="remove_hot" class="btn ripple btn-warning px-2">Remove Hot</button>
                       </div>
                      <div class="col">
                         <button type="submit" name="make_featured" class="btn ripple btn-success px-2">Make Feature</button>
                       </div>
                      <div class="col">
                         <button type="submit" name="remove_featured" class="btn ripple btn-warning px-2">Remove Feature</button>
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