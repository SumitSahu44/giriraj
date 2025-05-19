<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cfpsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
$stuname=$_POST['stuname'];
$StudentFathername=$_POST['StudentFathername'];
 $stuemail=$_POST['stuemail'];
 $stucourse=$_POST['stucourse'];
 $gender=$_POST['gender'];
 $dob=$_POST['dob'];
 $admissionfee=$_POST['admissionfee'];
 $semesterfee=$_POST['semesterfee'];
 $libraryfee=$_POST['libraryfee'];
 $hostelfee=$_POST['hostelfee'];
 $miscellaneousfee=$_POST['miscellaneousfee'];
 $address=$_POST['address'];
 $eid=$_GET['editid'];
$sql="update tblstudent set StudentName=:stuname,StudentFathername=:StudentFathername,StudentEmail=:stuemail,StudentCourse=:stucourse,Gender=:gender,DOB=:dob,AdmissionFee=:admissionfee,SemesterFee=:semesterfee,LibraryFee=:libraryfee,HosteFee=:hostelfee,MiscellaneousFee=:miscellaneousfee,Address=:address where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
$query->bindParam(':StudentFathername',$StudentFathername,PDO::PARAM_STR);
$query->bindParam(':stuemail',$stuemail,PDO::PARAM_STR);
$query->bindParam(':stucourse',$stucourse,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);

$query->bindParam(':admissionfee',$admissionfee,PDO::PARAM_STR);
$query->bindParam(':semesterfee',$semesterfee,PDO::PARAM_STR);
$query->bindParam(':libraryfee',$libraryfee,PDO::PARAM_STR);
$query->bindParam(':hostelfee',$hostelfee,PDO::PARAM_STR);
$query->bindParam(':miscellaneousfee',$miscellaneousfee,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("Student has been updated")</script>';
  echo "<script>window.location.href ='manage-students.php'</script>";
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>College Fee Payment System || Update Students</title>
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
              <h3 class="page-title"> Update Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Students</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
$eid=$_GET['editid'];
$sql="SELECT tblstudent.ID as sid,tblstudent.StudentName,tblstudent.StudentFathername,tblstudent.StudentEmail,tblstudent.StudentCourse,tblstudent.Gender,tblstudent.DOB,tblstudent.StuID,tblstudent.AdmissionFee,tblstudent.SemesterFee,tblstudent.LibraryFee,tblstudent.HosteFee,tblstudent.MiscellaneousFee,tblstudent.Address,tblstudent.UserName,tblstudent.Password,tblstudent.Image,tblstudent.DateofAdmission,tblcourse.CourseName from tblstudent join tblcourse on tblcourse.ID=tblstudent.StudentCourse where tblstudent.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Name</label>
                        <input type="text" name="stuname" value="<?php  echo htmlentities($row->StudentName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Father's Name</label>
                        <input type="text" name="StudentFathername" value="<?php  echo htmlentities($row->StudentFathername);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Email</label>
                        <input type="text" name="stuemail" value="<?php  echo htmlentities($row->StudentEmail);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Student Course</label>
                        <select  name="stucourse" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->StudentCourse);?>"><?php  echo htmlentities($row->CourseName);?></option>
                         <?php 

$sql2 = "SELECT * from    tblcourse ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->CourseName);?></option>
 <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Gender</label>
                        <select name="gender" value="" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->Gender);?>"><?php  echo htmlentities($row->Gender);?></option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Date of Birth</label>
                        <input type="date" name="dob" value="<?php  echo htmlentities($row->DOB);?>" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputName1">Student ID</label>
                        <input type="text" name="stuid" value="<?php  echo htmlentities($row->StuID);?>" class="form-control" readonly='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Student Photo</label>
                        <img src="images/<?php echo $row->Image;?>" width="100" height="100" value="<?php  echo $row->Image;?>"><a href="changeimage.php?editid=<?php echo $row->sid;?>"> &nbsp; Edit Image</a>
                      </div>
                      <h4 style="font-weight: bold;padding-bottom: 10px;text-align: center;color: blueviolet;">Fee Structure</h4>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Admission Fee</label>
                        <input type="text" name="admissionfee" value="<?php  echo $row->AdmissionFee;?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Yearly Fee</label>
                        <input type="text" name="semesterfee" value="<?php  echo $row->SemesterFee;?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Tuition Fee</label>
                        <input type="text" name="libraryfee" value="<?php  echo $row->LibraryFee;?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Hostel Fee</label>
                        <input type="text" name="hostelfee" value="<?php  echo $row->HosteFee;?>" class="form-control">
                      </div>
                      <!--<div class="form-group">-->
                      <!--  <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Miscellaneous Fee</label>-->
                      <!--  <input type="text" name="miscellaneousfee" value="<?php  echo $row->MiscellaneousFee;?>" class="form-control">-->
                      <!--</div>-->
                      <div class="form-group">
                        <label for="exampleInputName1">Address</label>
                        <textarea name="address" class="form-control" required='true'><?php  echo htmlentities($row->Address);?></textarea>
                      </div>
                      <!--<h3>Login details</h3>-->
                      <!--<div class="form-group">-->
                      <!--  <label for="exampleInputName1">User Name</label>-->
                      <!--  <input type="text" name="uname" value="<?php  echo htmlentities($row->UserName);?>" class="form-control" readonly='true'>-->
                      <!--</div>-->
                      <!--<div class="form-group">-->
                      <!--  <label for="exampleInputName1">Password</label>-->
                      <!--  <input type="Password" name="password" value="<?php  echo htmlentities($row->Password);?>" class="form-control" readonly='true'>-->
                      <!--</div>-->
                      <?php $cnt=$cnt+1;}} ?>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     
                    </form>
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
  </body>
</html><?php }  ?>