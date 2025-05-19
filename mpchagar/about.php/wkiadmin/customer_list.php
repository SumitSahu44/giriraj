<?php 
  include "../include/dbsmain.inc.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['active'])) {
       // Handle the active logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_users SET user_status='Active' WHERE user_id='$pageID'";
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
                            window.location.href = 'customer_list.php';
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
           $sql = "UPDATE tbl_users SET user_status='Inactive' WHERE user_id='$pageID'";
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
                            window.location.href = 'customer_list.php';
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
            $existing_images_query = "SELECT `user_profile` FROM `tbl_users` WHERE user_id='$pageID'";
            $existing_images_result = mysqli_query($db, $existing_images_query) or die("Query unsuccessful");
            $existing_images_row = mysqli_fetch_assoc($existing_images_result);
    
            if (!empty($existing_images_row['image'])) {
                unlink('images/user/' . $existing_images_row['image']);
            }
            
            $sql = "DELETE FROM `tbl_users` WHERE user_id='$pageID'";
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
                            window.location.href = 'customer_list.php';
                        }
                    });
                }
            </script>");
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
				<div class="breadcrumb-title pe-3">Customers/Users</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
						</ol>
					</nav>
				</div>
			</div>
			<!--end breadcrumb-->
			
			<div class="card mt-4">
                <div class="card-body">
                  <div class="customer-table">
                    <div class="table-responsive white-space-nowrap">
                        <form method="POST" action="<?php $_PHP_SELF?>" onsubmit="return validateForm()">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th >Sr. No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Join Date</th>
                                    <th>Status</th>
                                    <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT * FROM `tbl_users` ORDER BY user_id DESC";
                                    $run = mysqli_query($db,$sql) or die("Query Not run");
                                    $count=0;
                                    while($data = mysqli_fetch_assoc($run)){
                                    $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count?></td>
                                    <td>
                                        <img src="images/users/<?php echo $data['user_profile'];?>" class="rounded-circle" width="40" height="40">
                                    </td>
                                    <td><?php echo $data['user_name']?></td>
                                    <td><?php echo $data['user_email']?></td>
                                    <td><?php echo $data['user_phone']?></td>
                                    <td><?php echo $data['user_address']?> - <?php echo $data['user_pin']?></td>
                                    <td><?php echo $data['datetime']?></td>
                                    <td>
                                        <?php if($data["user_status"]=="Active"){?>
                                        <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>
                                        <?php }else{?>
                                        <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-check2 ms-2"></i></span>
                                        <?php }?>
                                    </td>
                                    <td>
                                      <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["user_id"]?>" class="form-check-input row-checkbox" >
                                      <input type="hidden" name="pageID[]" value="<?php echo $data["user_id"]?>">
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="row ">
                            <div class="btm-btns pt-2 pb-2">
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