<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cfpsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit'])){
$stuid=$_GET['stuid'];

$fstatus = $_POST['fstatus'];
$invoicenumber=mt_rand(100000000,999999999);
$totalamount = $_POST['totalamount'];
$amount = $_POST['amount'];
$paymenttype = $_POST['paymenttype'];
$txnnumber = $_POST['txnnumber'];


$sql="update tblstudent set FeeStatus=:fstatus where StuID=:stuid;
insert into tblfee(InvoiceNumber,StudentID,FeeStatus,TotalAmount,AmountPay,PaymentType,TransactionNumber) values(:invoicenumber,:stuid,:fstatus,:totalamount,:amount,:paymenttype,:txnnumber)";
$query = $dbh -> prepare($sql);
$query->bindParam(':invoicenumber',$invoicenumber,PDO::PARAM_STR);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->bindParam(':fstatus',$fstatus,PDO::PARAM_STR);
$query->bindParam(':totalamount',$totalamount,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
$query->bindParam(':paymenttype',$paymenttype,PDO::PARAM_STR);
$query->bindParam(':txnnumber',$txnnumber,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Fee status has been updated Successfully');</script>";
echo "<script>window.location.href ='student-fee-payment.php'</script>";
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>College Fee Payment System || View Payment Detail of Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
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
              <h3 class="page-title"> View Fee Detail of Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Fee Detail of Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                   
                    
                      <?php
$stuid=$_GET['stuid'];
$sql="SELECT tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.StudentCourse,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.AdmissionFee,tblstudent.SemesterFee,tblstudent.LibraryFee,tblstudent.HosteFee,tblstudent.MiscellaneousFee,tblstudent.Address,tblstudent.FeeStatus,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblcourse.CourseName from tblstudent join tblcourse on tblcourse.ID=tblstudent.StudentCourse where tblstudent.StuID=:stuid";
$query = $dbh -> prepare($sql);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
   <h4 class="card-title" style="text-align: center;font-size:20px; color:blue;">View Fee Detail of <?php  echo htmlentities($row->StudentName);?>(<?php  echo htmlentities($row->StuID);?>)</h4>
                      <table class="table table-hover table-bordered">
                <tbody>
                 
                  <tr>
<th>Name</th> <td><?php echo $row->StudentName;?></td>
<th>Email</th> <td><?php echo $row->StudentEmail;?></td>
</tr>
<tr>
<th>Course Name</th> <td><?php echo $row->CourseName;?></td>
<th>Gender</th> <td><?php echo $row->Gender;?></td>
</tr>
<tr>
<th>Date of Birth</th> <td><?php echo $row->DOB;?></td>
<th>Address</th> <td><?php echo $row->Address;?></td>
</tr>
<tr>
  <th>Fee Status</th>
<td  colspan="3"><?php $status=$row->FeeStatus;
if($status==""){
echo htmlentities("Not Updated yet");    
} else {
echo htmlentities("$status");        
}
?></td>
</tr>
<tr>
  <th colspan="4" style="font-size:20px; color:blue;text-align: center">Student Fee Structure</th>

</tr>
<tr><td>1</td><th>Admision Fee</th><td colspan="4"><?php echo $af = ($row->AdmissionFee);?></td></tr>
    <tr><td>2</td><th>YearlyFee</th><td colspan="4"><?php echo $sf=($row->SemesterFee);?></td></tr>
    <tr><td>3</td><th>TuitionFee</th><td colspan="4"><?php echo $lf = ($row->LibraryFee);?></td></tr>
    <tr><td>4</td><th>HosteFee</th><td colspan="4"><?php echo $hf = ($row->HosteFee);?></td></tr>
    <!--<tr><td>5</td><th>MiscellaneousFee</th><td colspan="4"><?php echo $mf =($row->MiscellaneousFee);?></td></tr>-->

    <tr><th style="text-align:center;" colspan="2">Total</th><td ><?php echo $tf = $af+$sf+$lf+$hf+$mf;?></td></tr>

</tbody>
</table>
<?php 
$fstatus=$row->FeeStatus;
if ($fstatus!=='NULL'):?>
  <?php endif;?>

  <h3>Payment History</h3>
<table class="table table-hover table-bordered">
  
  <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Invoice Number</th>
                            <th class="font-weight-bold">Fee Status</th>
                            <th class="font-weight-bold">Total Amount</th>
                            <th class="font-weight-bold">Amount Pay</th>
                            <th class="font-weight-bold">Payment Type</th>
                            <th class="font-weight-bold">Transaction Number</th>
                            <th class="font-weight-bold">Invoice Date</th>
                          </tr>
                          <?php 
                          $stuid=$_GET['stuid'];
                          $sql="SELECT * from tblfee where StudentID=:stuid";
$query = $dbh -> prepare($sql);
$query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row1)
{   $paidamt=($row1->AmountPay)            ?>
  <tr>
                           
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php  echo htmlentities($row1->InvoiceNumber);?></td>
                            <td><?php  echo htmlentities($row1->FeeStatus);?></td>
                            <td><?php  echo $totalamt=($row1->TotalAmount);?></td>
                            <td><?php  echo $row1->AmountPay;?></td>
                            <td><?php  echo htmlentities($row1->PaymentType);?></td>
                            <td><?php  echo htmlentities($row1->TransactionNumber);?></td>
                            <td><?php  echo htmlentities($row1->InvoiceDate);?></td>
                          </tr><?php 
$gpaidamt+=$paidamt;
                          $cnt=$cnt+1;}} ?>
                          <tr>
                            <th colspan="4" style="text-align:right">Total Paid</th>
                            <th><?php echo $gpaidamt; ?></th>
                          </tr>
                             <tr>
                            <th colspan="4" style="text-align:right">Total Balance</th>
                            <th><?php echo $totalamt-$gpaidamt; ?></th>
                          </tr>
  </table>

<?php 
$fstatus=$row->FeeStatus;
if ($fstatus=="" || $fstatus=="Partial Payment"):?>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Take Action</button>
<?php endif;?>

<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                    </div>
                    <div class="modal-body">
                     <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Fee Realated Info </h3>
                         
            <div class="tile-body">
              <form class="row" method="post">
              <div class="form-group col-md-12">
                  <label class="control-label">Total Amount</label>
               <input name="totalamount" id="totalamount" class="form-control" value="<?php echo $tf;?>" readonly="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Fee Status</label>
                  <select name="fstatus" class="form-control">
                    <option value="">--select--</option>
                    <option value="Partial Payment">Partial Payment</option>
                    <option value="Full Payment">Full Payment</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Amount</label>
               <input name="amount" id="amount" class="form-control">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Mode of Payment</label>
                  <select name="paymenttype" id="paymenttype" class="form-control">
                    <option value="">--select--</option>
                    <option value="Cash">Cash</option>
                    <option value="UPI">UPI</option>
                    <option value="Credit Card">Credit Card</option>
                     <option value="Debit Card">Debit Card</option>
                  </select>
                </div>
                <div class="form-group col-md-12" id="txnno">
                  <label class="control-label">Transaction Number</label>
               <input type="text" name="txnnumber" id="txnnumber" class="form-control" maxlength="50">
                </div>
                 
                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><?php  $cnt=$cnt+1; } } ?>
                </div>
            </div>
        </div>

     <!--    // end modal popup code........ -->
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
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
    <script type="text/javascript">

  //For report file
  $('#txnno').hide();
  $(document).ready(function(){
  $('#paymenttype').change(function(){
  if($('#paymenttype').val()=='Cash')
  {
  $('#txnno').hide();
    jQuery("#txnnumber").prop('required',false);  
  } else if($('#paymenttype').val()==''){
      $('#txnno').hide();
        jQuery("#txnnumber").prop('required',false);  
  } else{
    $('#txnno').show();
  jQuery("#txnnumber").prop('required',true);  
  }
})}) 
</script>
  </body>
</html><?php }  ?>