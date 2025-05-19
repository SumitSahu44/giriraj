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
                   
                   
                   <style>
    .hk-sec-wrapper {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.15);
        padding: 30px;
        margin: 20px auto;
        max-width: 900px;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }

    .header-container img {
        max-height: 80px;
    }

    .header-container .college-details {
        text-align: center;
        flex-grow: 1;
    }

    .header-container .college-details h1 {
        font-size: 22px;
        color: #007bff;
        font-weight: bold;
        margin: 0;
    }

    .header-container .college-details h2 {
        font-size: 16px;
        color: #555;
        margin: 5px 0;
    }

    .header-container .college-details h3 {
        font-size: 14px;
        color: #333;
        margin: 5px 0;
    }

    hr {
        border: none;
        border-top: 2px dashed #ddd;
        margin: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    table th, table td {
        border: 1px solid #e0e0e0;
        padding: 10px;
        text-align: center;
        font-size: 14px;
    }

    table th {
        background-color: #f5f5f5;
        color: #333333;
        font-weight: bold;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table .total-row {
        font-weight: bold;
        background-color: #007bff;
        color: #ffffff;
    }

    .table-wrap {
        margin-top: 20px;
    }
</style>

<section class="hk-sec-wrapper hk-invoice-wrap pa-35">
    <!-- Header Section -->
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <img src="http://www.mpchagar.com/wkiadmin/images/header_logo_20241105165620.jpg" alt="Logo">
        </div>

        <!-- College Details -->
        <div class="college-details">
            <h1>Maa Pitambara College</h1>
            <h2>MXRR+9CX, Agar - Ujjain Rd, Awar, Madhya Pradesh 465441</h2>
            <h3>Phone: +91 9201694342</h3>
        </div>
    </div>

    <?php
    $invoicenumber = $_GET['invoicenumber'];
    $sql = "SELECT tblstudent.StudentName, tblstudent.UpdationDate, tblstudent.StudentEmail, tblstudent.StudentFathername, tblstudent.StudentCourse, tblstudent.Gender, tblstudent.DOB, tblstudent.StuID, tblstudent.AdmissionFee, tblstudent.SemesterFee, tblstudent.LibraryFee, tblstudent.HosteFee, tblstudent.MiscellaneousFee, tblstudent.Address, tblstudent.FeeStatus, tblstudent.UserName, tblstudent.Password, tblstudent.Image, tblstudent.DateofAdmission, tblcourse.CourseName, tblfee.InvoiceNumber, tblfee.StudentID, tblfee.FeeStatus, tblfee.TotalAmount, tblfee.AmountPay, tblfee.PaymentType, tblfee.TransactionNumber, DATE_FORMAT(tblfee.InvoiceDate, '%d-%b-%Y') as FormattedInvoiceDate 
            FROM tblstudent 
            JOIN tblcourse ON tblcourse.ID=tblstudent.StudentCourse 
            JOIN tblfee ON tblfee.StudentID=tblstudent.StuID 
            WHERE tblfee.InvoiceNumber=:invoicenumber";
    $query = $dbh->prepare($sql);
    $query->bindParam(':invoicenumber', $invoicenumber, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $row) {
    ?>
    <!-- Invoice Details -->
    <div class="invoice-from-wrap">
        <div class="row">
            <div class="col-md-7 mb-20">
                <h3 class="mb-35 font-weight-600">Student Fee Receipt</h3>
                <h4 class="mb-35 font-weight-600">Name - <?php echo $row->StuID; ?></h4>
            </div>
            <div class="col-md-5 mb-20">
                <h4 class="mb-35 font-weight-600">Invoice / Receipt</h4>
                <span class="d-block">Date: <span class="pl-10 text-dark"><?php echo $row->FormattedInvoiceDate; ?></span></span><br>
                <span class="d-block">Invoice / Receipt #: <span class="pl-10 text-dark"><?php echo htmlentities($row->InvoiceNumber); ?></span></span><br>
                <span class="d-block">Student Name: <span class="pl-10 text-dark"><?php echo $row->StudentName; ?></span></span><br>
                <span class="d-block">Father Name: <span class="pl-10 text-dark"><?php echo $row->StudentFathername; ?></span></span><br>
                <span class="d-block">Course Name: <span class="pl-10 text-dark"><?php echo $row->CourseName; ?></span></span><br>
                <span class="d-block">Payment Mode: <span class="pl-10 text-dark"><?php echo $row->PaymentType; ?></span></span><br>
            </div>
        </div>
    </div>

    <hr class="mt-0">

    <!-- Table Section -->
    <div class="row">
        <div class="col-sm">
            <div class="table-wrap">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th colspan="3" style="font-size: 18px; color: blue; text-align: center;">Receipt Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <th>Admission Fee</th>
                            <td><?php echo $af = ($row->AdmissionFee); ?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <th>Yearly Fee</th>
                            <td><?php echo $sf = ($row->SemesterFee); ?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <th>Tuition Fee</th>
                            <td><?php echo $lf = ($row->LibraryFee); ?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <th>Hostel Fee</th>
                            <td><?php echo $hf = ($row->HosteFee); ?></td>
                        </tr>
                        <tr>
                            <!--<td>5</td>-->
                            <!--<th>Miscellaneous Fee</th>-->
                            <!--<td><?php echo $mf = ($row->MiscellaneousFee); ?></td>-->
                        </tr>
                        <tr class="total-row">
                            <td colspan="2">Total</td>
                            <td><?php echo $tf = $af + $sf + $lf + $hf + $mf; ?></td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="2">Paid Amount</td>
                            <td><?php echo $pa = ($row->AmountPay); ?></td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="2">Due Amount</td>
                            <td><?php echo $ra = $tf - $pa; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php 
        }
    }
    ?>
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