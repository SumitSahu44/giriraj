<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cfpsaid']==0)) {
    header('location:logout.php');
} else {
    if(isset($_POST['submit'])) {
        $stuname=$_POST['stuname'];
        $StudentFathername=$_POST['StudentFathername'];
        $stuemail=$_POST['stuemail'];
        $stucourse=$_POST['stucourse'];
        $studentyear=$_POST['studentyear'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $stuid=$_POST['stuid'];
        $address=$_POST['address'];
        $admissionfee=$_POST['admissionfee'];
        $semesterfee=$_POST['semesterfee'];
        $libraryfee=$_POST['libraryfee'];
        $hostelfee=$_POST['hostelfee'];
        $miscellaneousfee=$_POST['miscellaneousfee'];
        $uname=$_POST['uname'];
        $password=md5($_POST['password']);
        $image=$_FILES["image"]["name"];

        // Check if image is uploaded
        if (!empty($image)) {
            $extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
            if (!in_array($extension, $allowed_extensions)) {
                echo "<script>alert('Logo has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
            } else {
                // Valid image format, proceed with insertion
                $image=md5($image).time().".".$extension;
                move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$image);

                // Check for existing username or student ID
                $ret="SELECT UserName FROM tblstudent WHERE UserName=:uname OR StuID=:stuid";
                $query= $dbh->prepare($ret);
                $query->bindParam(':uname',$uname,PDO::PARAM_STR);
                $query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                if($query->rowCount() == 0) {
                    // Insert data into database
                    $sql="INSERT INTO tblstudent(StudentName,StudentFathername,StudentEmail,StudentCourse,StudentYear,Gender,DOB,StuID,AdmissionFee,SemesterFee,LibraryFee,HosteFee,MiscellaneousFee,Address,UserName,Password,Image) VALUES(:stuname,:StudentFathername,:stuemail,:stucourse,:studentyear,:gender,:dob,:stuid,:admissionfee,:semesterfee,:libraryfee,:hostelfee,:miscellaneousfee,:address,:uname,:password,:image)";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':stuname',$stuname,PDO::PARAM_STR);
                    $query->bindParam(':StudentFathername',$StudentFathername,PDO::PARAM_STR);
                    $query->bindParam(':stuemail',$stuemail,PDO::PARAM_STR);
                    $query->bindParam(':stucourse',$stucourse,PDO::PARAM_STR);
                    $query->bindParam(':studentyear',$studentyear,PDO::PARAM_STR);
                    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
                    $query->bindParam(':dob',$dob,PDO::PARAM_STR);
                    $query->bindParam(':stuid',$stuid,PDO::PARAM_STR);
                    $query->bindParam(':admissionfee',$admissionfee,PDO::PARAM_STR);
                    $query->bindParam(':semesterfee',$semesterfee,PDO::PARAM_STR);
                    $query->bindParam(':libraryfee',$libraryfee,PDO::PARAM_STR);
                    $query->bindParam(':hostelfee',$hostelfee,PDO::PARAM_STR);
                    $query->bindParam(':miscellaneousfee',$miscellaneousfee,PDO::PARAM_STR);
                    $query->bindParam(':address',$address,PDO::PARAM_STR);
                    $query->bindParam(':uname',$uname,PDO::PARAM_STR);
                    $query->bindParam(':password',$password,PDO::PARAM_STR);
                    $query->bindParam(':image',$image,PDO::PARAM_STR);
                    $query->execute();
                    $LastInsertId=$dbh->lastInsertId();
                    if ($LastInsertId>0) {
                        echo '<script>alert("Student has been added.")</script>';
                        echo "<script>window.location.href ='add-students.php'</script>";
                    } else {
                        echo '<script>alert("Something Went Wrong. Please try again")</script>';
                    }
                } else {
                    echo "<script>alert('Username or Student Id already exist. Please try again');</script>";
                }
            }
        } else {
            // No image uploaded, proceed without checking format
            // Insert data into database
            $sql = "INSERT INTO tblstudent (StudentName, StudentFathername, StudentEmail, StudentCourse, StudentYear, Gender, DOB, StuID, AdmissionFee, SemesterFee, LibraryFee, HosteFee, MiscellaneousFee, Address, UserName, Password) VALUES (:stuname, :StudentFathername, :stuemail, :stucourse, :studentyear, :gender, :dob, :stuid, :admissionfee, :semesterfee, :libraryfee, :hostelfee, :miscellaneousfee, :address, :uname, :password)";
            $query = $dbh->prepare($sql);
            $query->execute(array(
                ':stuname' => $stuname,
                ':stuemail' => $stuemail,
                ':StudentFathername' => $StudentFathername,
                ':stucourse' => $stucourse,
                ':studentyear' => $studentyear,
                ':gender' => $gender,
                ':dob' => $dob,
                ':stuid' => $stuid,
                ':admissionfee' => $admissionfee,
                ':semesterfee' => $semesterfee,
                ':libraryfee' => $libraryfee,
                ':hostelfee' => $hostelfee,
                ':miscellaneousfee' => $miscellaneousfee,
                ':address' => $address,
                ':uname' => $uname,
                ':password' => $password
            ));
            // Check if insertion was successful
            $LastInsertId = $dbh->lastInsertId();
            if ($LastInsertId > 0) {
                echo '<script>alert("Student has been added.")</script>';
                echo "<script>window.location.href ='add-students.php'</script>";
            } else {
                echo '<script>alert("Something Went Wrong. Please try again")</script>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>College Fee Payment System || Add Students</title>
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
              <h3 class="page-title"> Add Students </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Students</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 style="font-weight: bold;padding-bottom: 10px;text-align: center;color: blueviolet;">Add Students Information</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Student Name<span style="color:red;">*</span></label>
                        <input type="text" name="stuname" value="" class="form-control" required='true' minlength="3" maxlength="100" onkeypress="return isNumberKey(event)" pattern=".{3,100}" onpaste="return false;">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Father's Name<span style="color:red;">*</span></label>
                        <input type="text" name="StudentFathername" value="" class="form-control" required='true' minlength="3" maxlength="100" onkeypress="return isNumberKey(event)" pattern=".{3,100}" onpaste="return false;">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Student Email<span style="color:red;">*</span></label>
                        <input type="email" name="stuemail" value="" class="form-control" required='true'>
                      </div>
                       <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Address<span style="color:red;">*</span></label>
                        <textarea name="address" class="form-control" required='true'></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3" style="font-weight: bold;padding-bottom: 10px;">Student Course<span style="color:red;">*</span></label>
                        <select  name="stucourse" class="form-control" required='true'>
                          <option value="">Select Course</option>
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
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Course Year<span style="color:red;">*</span></label>
                        <input type="text" name="studentyear" value="" class="form-control" required='true' minlength="1" maxlength="100">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Gender<span style="color:red;">*</span></label>
                        <select name="gender" value="" class="form-control" required='true'>
                          <option value="">Choose Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Date of Birth<span style="color:red;">*</span></label>
                        <input type="date" name="dob" value="" class="form-control" required='true'>
                      </div>
                     
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Student ID<span style="color:red;">*</span></label>
                        <input type="text" name="stuid" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Student Photo</label>
                        <input type="file" name="image" value="" class="form-control" >
                      </div>
                      <h4 style="font-weight: bold;padding-bottom: 10px;text-align: center;color: blueviolet;">Fee Structure</h4>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Admission Fee</label>
                        <input type="text" name="admissionfee" value="" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Yearly Fee</label>
                        <input type="text" name="semesterfee" value="" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Tuition Fee</label>
                        <input type="text" name="libraryfee" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Hostel Fee</label>
                        <input type="text" name="hostelfee" value="" class="form-control">
                      </div>
                      <!--<div class="form-group">-->
                      <!--  <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Miscellaneous Fee</label>-->
                      <!--  <input type="text" name="miscellaneousfee" value="" class="form-control">-->
                      <!--</div>-->
                      
                    <!--<h4 style="font-weight: bold;padding-bottom: 10px;text-align: center;color: blueviolet;">Login details</h4>-->
                     <!--<div class="form-group">-->
                     <!--   <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">User Name<span style="color:red;">*</span></label>-->
                     <!--   <input type="text" name="uname" value="" class="form-control" required='true'>-->
                     <!-- </div>-->
                     <!-- <div class="form-group">-->
                     <!--   <label for="exampleInputName1" style="font-weight: bold;padding-bottom: 10px;">Password<span style="color:red;">*</span></label>-->
                     <!--   <input type="Password" name="password" value="" class="form-control" required='true'>-->
                     <!-- </div>-->
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Add</button>
                     
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