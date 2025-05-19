<?php 
  include "../include/dbsmain.inc.php";
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
     
    if (isset($_POST['delete'])) {
        // Handle the inactive logic here
        $checkedIDs = $_POST['checkedIDs'];
    
        foreach ($checkedIDs as $pageID) {
            
            $sql = "DELETE FROM `tbl_queries` WHERE m_id='$pageID'";
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
                            window.location.href = 'manage_enquiry.php';
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
                <div class="breadcrumb-title pe-3">Manage Inquiries</div>
                <div class="ms-auto">
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row g-3">
                <div class="col-auto">
                </div>
                <div class="col-auto pb-2">
                  <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                    <!--<button class="btn btn-primary px-2" onclick="window.location.href='addedit_videogallery.php'">-->
                    <!--      <i class="lni lni-circle-plus"></i> Add Video Gallery</button>-->
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
                                        <th>Sr. No.</th>
                                        <th>Name/Email/Phone</th>
                                        <th>Subject </th>
                                        <th>Message </th>
                                        <th>DateTime </th>
                                        <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $sql = "SELECT * FROM `tbl_queries` ORDER BY m_id DESC";
                                        $run = mysqli_query($db,$sql) or die("Query Not run");
                                        $count=0;
                                        while($data = mysqli_fetch_assoc($run)){
                                        $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count?></td>
                                        <td><?php echo $data['name']?><br><?php echo $data['email']?><br><?php echo $data['phone']?></td>
                                        <td><?php echo $data['subject']?></td>
                                        <td><?php echo $data['message']?></td>
                                        <td><?php echo $data['datetime']?></td>
                                        <td>
                                           <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["m_id"]?>" class="form-check-input row-checkbox" >
                                           <input type="hidden" name="pageID[]" value="<?php echo $data["m_id"]?>">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="row ">
                                <div class="btm-btns pt-2 pb-2">
                                    <div class="col">
                                      <button type="submit" name="delete" class="btn ripple btn-danger px-4 py-2">Delete</button>
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