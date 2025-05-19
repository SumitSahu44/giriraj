<?php 
  include "../include/dbsmain.inc.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['active'])) {
       // Handle the active logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_blog SET blog_status='Active' WHERE blog_id='$pageID'";
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
                            window.location.href = 'manage_blogs.php';
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
           $sql = "UPDATE tbl_blog SET blog_status='Inactive' WHERE blog_id='$pageID'";
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
                            window.location.href = 'manage_blogs.php';
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
            $existing_images_query = "SELECT `blog_image` FROM `tbl_blog` WHERE blog_id='$pageID'";
            $existing_images_result = mysqli_query($db, $existing_images_query) or die("Query unsuccessful");
            $existing_images_row = mysqli_fetch_assoc($existing_images_result);
    
            if (!empty($existing_images_row['blog_image'])) {
                unlink('images/blog/' . $existing_images_row['blog_image']);
            }
            
            $sql = "DELETE FROM `tbl_blog` WHERE blog_id='$pageID'";
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
                            window.location.href = 'manage_blogs.php';
                        }
                    });
                }
            </script>");
        }
    }

    
    if (isset($_POST['Update-order'])) {
    $pageIDs = $_POST['paID'];
    $blog_order = $_POST['blog_order'];

    if (count($pageIDs) === count($blog_order)) {
        $stmt = mysqli_prepare($db, "UPDATE tbl_blog SET blog_order = ? WHERE blog_id = ?");
        if ($stmt === false) {
            die("Prepare failed: " . mysqli_error($db));
        }

        for ($i = 0; $i < count($pageIDs); $i++) {
            $pageID = $pageIDs[$i];
            $orderValue = $blog_order[$i];
            mysqli_stmt_bind_param($stmt, 'ii', $orderValue, $pageID);
            $result = mysqli_stmt_execute($stmt);
            if (!$result) {
                die("Query unsuccessful: " . mysqli_stmt_error($stmt));
            }
        }
        mysqli_stmt_close($stmt);
        header("Location: manage_blogs.php");
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
            <div class="breadcrumb-title pe-3">Blog Category</div>
            <div class="ms-auto">
          </div>
        </div>
      <!--end breadcrumb-->

      <div class="row g-3">
        <div class="col-auto pb-2">
          <div class="d-flex align-items-center gap-2 justify-content-lg-end">
            <button class="btn btn-primary px-2" onclick="window.location.href='addedit_blog.php?blog_sub_id=0'">
                  <i class="lni lni-circle-plus"></i> Add New Blog</button>
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
                    <th>Blog Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Order By</th>
                    <!--<th>Category</th>-->
                    <th>Action</th>
                    <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM `tbl_blog` WHERE blog_sub_id=0 ORDER BY blog_order ASC";
                        $run = mysqli_query($db,$sql) or die("Query Not run");
                        $count=0;
                        while($data = mysqli_fetch_assoc($run)){
                        $count++;
                    ?>
                  <tr>
                    <td style="display:none"><?php echo $count?></td>
                    <td>
                        <div class="product-info">
                          <a href="javascript:;" class="product-title"><?php echo substr($data['blog_title'],0,30)?>...</a>
                        </div>
                    </td>
                    <td>
                        <img src="images/blog/<?php echo $data['blog_image']?>" width="40" class="rounded-3" >
                    </td>
                    <td>
                        <?php if($data["blog_status"]=="Active"){?>
                        <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>
                        <?php }else{?>
                        <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-check2 ms-2"></i></span>
                        <?php }?>
                    </td>
                    <td>
                        <input type="text" name="blog_order[]" value="<?php echo htmlspecialchars($data['blog_order']); ?>" style="width:40px; outline:none;">
                        <input type="hidden" name="paID[]" value="<?php echo htmlspecialchars($data['blog_id']); ?>">
                    </td>
                    <!--<td>-->
                    <!--  <a href="javascript:;">Michle Shoes England</a>-->
                    <!--</td>-->
                    <td>
                      <a href="addedit_blog.php?blog_sub_id=0&blog_id=<?php echo $data['blog_id']?>"><i class="fadeIn animated bx bx-edit font-20"></i></a>
                    </td>
                    <td>
                       <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["blog_id"]?>" class="form-check-input row-checkbox" >
                       <input type="hidden" name="pageID[]" value="<?php echo $data["blog_id"]?>">
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