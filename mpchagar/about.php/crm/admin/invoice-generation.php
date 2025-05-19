<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cfpsaid']==0)) {
  header('location:logout.php');
  } else{
   // Code for deletion
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql="delete from tblfee where ID=:rid";
$query=$dbh->prepare($sql);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'invoice-generation.php'</script>";     


}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>College Fee Payment System || Reciept</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
   <style>
       .table th, .table td {
           padding: 8px !important;
       }
        .btn {
           padding: 0.675rem 1.5rem !important;
       }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> Manage Reciept </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Reciept</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Reciept</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Reciepts</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Reciept Number</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Fee Status</th>
                            <th class="font-weight-bold">Total Amount</th>
                            <th class="font-weight-bold">Amount Pay</th>
                            <th class="font-weight-bold">Balanced Amount</th>
                            
                            <th class="font-weight-bold">Reciept Date</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];
} else {
    $pageno = 1;
}

// Pagination logic
$no_of_records_per_page = 15;
$offset = ($pageno - 1) * $no_of_records_per_page;

// Total rows calculation
$ret = "SELECT ID FROM tblfee";
$query1 = $dbh->prepare($ret);
$query1->execute();
$total_rows = $query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);

// Fetch paginated records
$sql = "SELECT * FROM tblfee LIMIT :offset, :no_of_records";
$query = $dbh->prepare($sql);
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':no_of_records', $no_of_records_per_page, PDO::PARAM_INT);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

$cnt = 1;
if ($query->rowCount() > 0) {
    foreach ($results as $row1) {
        $StudentID = $row1->StudentID;

        // Fetch student name
        $sqlstname = "SELECT * FROM tblstudent WHERE StuID = :StudentID";
        $querystname = $dbh->prepare($sqlstname);
        $querystname->bindParam(':StudentID', $StudentID, PDO::PARAM_INT);
        $querystname->execute();
        $resultsstd = $querystname->fetchAll(PDO::FETCH_OBJ);
        ?>
        <tr>
            <td><?php echo htmlentities($cnt); ?></td>
            <td><?php echo htmlentities($row1->InvoiceNumber); ?></td>
            <td><?php echo isset($resultsstd[0]) ? htmlentities($resultsstd[0]->StudentName) : 'N/A'; ?></td>
            <td><?php echo htmlentities($row1->FeeStatus); ?></td>
            <td><?php echo $totalamt = ($row1->TotalAmount); ?></td>
            <td><?php echo $paidamt = ($row1->AmountPay); ?></td>
            <td><?php echo $balamt = $totalamt - $paidamt; ?></td>
            <td><?php echo htmlentities($row1->InvoiceDate); ?></td>
            <td>
                <div>
                    <a href="invoice-detail.php?invoicenumber=<?php echo htmlentities($row1->InvoiceNumber); ?>" class="btn btn-success">View</a>
                    <a href="invoice-generatins.php?delid=<?php echo htmlentities($row1->ID); ?>" onclick="return confirm('Do you really want to Delete?');" class="btn btn-danger">Delete</a>
                </div>
            </td>
        </tr>
        <?php
        $cnt++;
    }
}
?>
</tbody>

                      </table>
                    </div>
                    <div align="left">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html><?php }  ?>