<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cfpsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>College Fee Payment System || View Reciept Details</title>
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
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1000,height=1000');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
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
              <h3 class="page-title"> View Reciept Details </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Reciept Details</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card" id="divToPrint">
                  <div class="card-body" >
                   
                   
                   <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
                    <?php
$invoicenumber=$_GET['invoicenumber'];
$sql="SELECT tblstudent.StudentName,tblstudent.StudentEmail,tblstudent.StudentCourse,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.AdmissionFee,tblstudent.SemesterFee,tblstudent.LibraryFee,tblstudent.HosteFee,tblstudent.MiscellaneousFee,tblstudent.Address,tblstudent.FeeStatus,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblcourse.CourseName,tblfee.InvoiceNumber,tblfee.StudentID,tblfee.FeeStatus,tblfee.TotalAmount,tblfee.AmountPay,tblfee.PaymentType,tblfee.TransactionNumber,tblfee.InvoiceDate from tblstudent join tblcourse on tblcourse.ID=tblstudent.StudentCourse join tblfee on tblfee.StudentID=tblstudent.StuID where tblfee.InvoiceNumber=:invoicenumber";
$query = $dbh -> prepare($sql);
$query->bindParam(':invoicenumber',$invoicenumber,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{   

            ?>
                            <div class="invoice-from-wrap">
                                <div class="row">
                                    <div class="col-md-7 mb-20">
<h3 class="mb-35 font-weight-600">     Student Fee Reciept(<?php echo $row->StuID;?>)</h3>


</div>


<div class="col-md-5 mb-20">
<h4 class="mb-35 font-weight-600">Invoice / Receipt</h4>
<span class="d-block">Collage:<span class="pl-10 text-dark">Maa Pitambara College</span></span>
<span class="d-block">Date:<span class="pl-10 text-dark"><?php echo $row->RecieptDate;?></span></span>
<span class="d-block">Invoice / Receipt #<span class="pl-10 text-dark"><?php  echo htmlentities($row->InvoiceNumber);?></span></span>
<span class="d-block">Student Name #<span class="pl-10 text-dark"><?php echo $row->StudentName;?></span></span>
<span class="d-block">Course Name #<span class="pl-10 text-dark"><?php echo $row->CourseName;?></span></span>
<span class="d-block">Payment Mode #<span class="pl-10 text-dark"><?php echo $row->PaymentType;?></span></span>
</div>
</div>
</div>

<hr class="mt-0">
                        
                          
                       
<div class="row">
<div class="col-sm">
<div class="table-wrap">
<table class="table mb-0" border="1" width="100%">
<thead>
                                            <tbody><hr>
                                                
<tr>
  <th colspan="4" style="font-size:20px; color:blue;text-align: center">Reciept Details</th>

</tr>
<tr><td>1</td><th>Admision Fee</th><td colspan="4"><?php echo $af = ($row->AdmissionFee);?></td></tr>
    <tr><td>2</td><th>YearlyFee</th><td colspan="4"><?php echo $sf=($row->SemesterFee);?></td></tr>
    <tr><td>3</td><th>LibraryFee</th><td colspan="4"><?php echo $lf = ($row->LibraryFee);?></td></tr>
    <tr><td>4</td><th>HosteFee</th><td colspan="4"><?php echo $hf = ($row->HosteFee);?></td></tr>
    <tr><td>5</td><th>MiscellaneousFee</th><td colspan="4"><?php echo $mf =($row->MiscellaneousFee);?></td></tr>

    <tr><th style="text-align:center;" colspan="2">Total</th><td ><?php echo $tf = $af+$sf+$lf+$hf+$mf;?></td></tr>
    <tr><th style="text-align:center;" colspan="2">Paid Amount</th><td ><?php echo $pa =($row->AmountPay);?></td></tr>
    <tr><th style="text-align:center;" colspan="2">Due Amount</th><td ><?php echo $ra = $tf-$pa ;?></td></tr>                                             
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <?php  $cnt=$cnt+1; } } ?>
                        </section>





                     
             <input type="button" style="padding-right: 20px" class="btn btn-primary" value="print" onclick="PrintDiv();" />      
  
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