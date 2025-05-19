<?php 
  include "../include/dbsmain.inc.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['active'])) {
       // Handle the active logic here
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE tbl_faqs SET faq_status='Active' WHERE faq_id='$pageID'";
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
                            window.location.href = 'manage_faq.php';
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
           $sql = "UPDATE tbl_faqs SET faq_status='Inactive' WHERE faq_id='$pageID'";
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
                            window.location.href = 'manage_faq.php';
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
            
            $sql = "DELETE FROM `tbl_faqs` WHERE faq_id='$pageID'";
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
                            window.location.href = 'manage_faq.php';
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
        $stmt = mysqli_prepare($db, "UPDATE tbl_faqs SET faq_order = ? WHERE faq_id = ?");
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
        header("Location: manage_faq.php");
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
                <div class="breadcrumb-title pe-3">Manage FAQ's</div>
    
                <div class="ms-auto">
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row g-3">
                <div class="col-auto">
                </div>
                <div class="col-auto pb-2">
                  <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <button class="btn btn-primary px-2" onclick="window.location.href='addedit_faq.php'">
                          <i class="lni lni-circle-plus"></i> Add FAQ</button>
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
                                        <th >Sr. No.</th>
                                        <th>Question</th>
                                        <th>Order By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `tbl_faqs` ORDER BY faq_order ASC";
                                        $run = mysqli_query($db,$sql) or die("Query Not run");
                                        $count=0;
                                        while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                    ?>
                                    <tr>
                                        <td ><?php echo $count?></td>
                                        <td><?php echo $data['question']?></td>
                                        <td>
                                            <input type="text" name="site_pages_order_by[]" value="<?php echo htmlspecialchars($data['faq_order']); ?>" style="width:40px; outline:none;">
                                            <input type="hidden" name="paID[]" value="<?php echo htmlspecialchars($data['faq_id']); ?>">
                                        </td>
                                        <td>
                                            <?php if($data["faq_status"]=="Active"){?>
                                            <span class="lable-table bg-success-subtle text-success rounded border border-success-subtle font-text2 fw-bold">Active<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }else{?>
                                            <span class="lable-table bg-danger-subtle text-danger rounded border border-danger-subtle font-text2 fw-bold">Inactive<i class="bi bi-check2 ms-2"></i></span>
                                            <?php }?>
                                        </td>
                                        <td>
                                          <a href="addedit_faq.php?faq_id=<?php echo $data['faq_id']?>"><i class="fadeIn animated bx bx-edit font-20"></i></a>
                                        </td>
                                        <td>
                                           <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["faq_id"]?>" class="form-check-input row-checkbox" >
                                           <input type="hidden" name="pageID[]" value="<?php echo $data["faq_id"]?>">
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