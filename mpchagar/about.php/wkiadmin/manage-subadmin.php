<?php 
  include "../include/dbsmain.inc.php";

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
      if (isset($_POST['submit_user'])) {
        $username = $_POST['username'];
        $name = $_POST['name'];
        // $name = ucfirst($username);
        $password = $_POST['password'];
        $status = $_POST['status'];
        date_default_timezone_set('Asia/Kolkata');
        $current_datetime = date('Y-m-d H:i:s');
        $selectedAccess = $_POST['access'];
        $accessString = implode(',', $selectedAccess);
    
        $sql = "INSERT INTO `login_tbl`(`name`, `admin_access`, `username`, `user_type`, `password`, `admin_status`, `add_date`) 
                VALUES ('$name', '$accessString', '$username', 'admin', '$password', '$status', '$current_datetime')";
        $result = mysqli_query($db, $sql) or die("Query unsuccessful");
    
        if ($result) {
            echo "<script>
                   window.alert('Subadmin are activated successfully.');
                   window.location.href = 'manage-subadmin.php';
                 </script>";
        }
    }
     
       if (isset($_POST['active'])) {
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE login_tbl SET admin_status='Active' WHERE id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo "<script>
                   window.alert('Subadmin are activated successfully.');
                   window.location.href = 'manage-subadmin.php';
                 </script>";
       }
     }
   
      if (isset($_POST['inactive'])) {
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "UPDATE login_tbl SET admin_status='Inactive' WHERE id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo "<script>
                   window.alert('Subadmin are deactivated successfully.');
                   window.location.href = 'manage-subadmin.php';
                 </script>";
       }
     }
     
     if (isset($_POST['delete'])) {
       $checkedIDs = $_POST['checkedIDs'];
   
       foreach ($checkedIDs as $pageID) {
           $sql = "DELETE FROM `login_tbl` WHERE id='$pageID'";
           $result = mysqli_query($db, $sql) or die("Query unsuccessful");
       }
   
       if ($result) {
           echo "<script>
                   window.alert('Subadmin Deleted successfully.');
                   window.location.href = 'manage-subadmin.php';
                 </script>";
       }
     }

   }
?>
<!doctype html>
<!--<html lang="en">-->
<html lang="en" data-bs-theme="blue-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include "top-links.php"; ?>

</head>

<body>

    <?php include "header.php"; ?>

    <?php include "sidebar.php"; ?>

    <!--end sidebar-->
    <main class="main-wrapper">
        <div class="main-content">

            <!--breadcrumb-->

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Manage Sub Admin</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <!--<ol class="breadcrumb mb-0 p-0">-->
                        <!--    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>-->
                        <!--    </li>-->
                        <!--    <li class="breadcrumb-item active" aria-current="page">Starter Page</li>-->
                        <!--</ol>-->
                    </nav>
                </div>
            </div>

            <!--end breadcrumb-->

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <form action="<?php $_PHP_SELF?>" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Name </h5>
                                        <input type="text" class="form-control" placeholder="write Name here...." name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">User Name</h5>
                                        <input type="text" class="form-control" placeholder="write Usernane here...." name="username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Password</h5>
                                        <input type="text" class="form-control" placeholder="write password here...." name="password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3">Status</h5>
                                    <select class="form-select" name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-check">
								    	<input class="form-check-input" type="checkbox" value="01" name="access[]" id="flexCheckDefault">
								    	<label class="form-check-label" for="flexCheckDefault">Manage Slider</label>
								    </div>
                                    <div class="form-check">
								    	<input class="form-check-input" type="checkbox" value="02" name="access[]" id="flexCheckDefault1">
								    	<label class="form-check-label" for="flexCheckDefault1">Manage Products/Services</label>
								    </div>
                                    <div class="form-check">
								    	<input class="form-check-input" type="checkbox" value="03" name="access[]" id="flexCheckDefault3">
								    	<label class="form-check-label" for="flexCheckDefault3">Manage Static Pages</label>
								    </div>
                                    <div class="form-check">
								    	<input class="form-check-input" type="checkbox" value="04" name="access[]" id="flexCheckDefault4">
								    	<label class="form-check-label" for="flexCheckDefault4">Manage Team</label>
								    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="05" name="access[]" id="flexCheckClients">
                                        <label class="form-check-label" for="flexCheckClients">Manage Clients</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="06" name="access[]" id="flexCheckTestimonials">
                                        <label class="form-check-label" for="flexCheckTestimonials">Manage Testimonials</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="07" name="access[]" id="flexCheckFAQs">
                                        <label class="form-check-label" for="flexCheckFAQs">Manage FAQ's</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="08" name="access[]" id="flexCheckFactsFigures">
                                        <label class="form-check-label" for="flexCheckFactsFigures">Manage Facts/Figures</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="09" name="access[]" id="flexCheckPhotoGallery">
                                        <label class="form-check-label" for="flexCheckPhotoGallery">Manage Photo Gallery</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="10" name="access[]" id="flexCheckVideoGallery">
                                        <label class="form-check-label" for="flexCheckVideoGallery">Manage Video Gallery</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="11" name="access[]" id="flexCheckCertificates">
                                        <label class="form-check-label" for="flexCheckCertificates">Manage Certificates</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="12" name="access[]" id="flexCheckIndustries">
                                        <label class="form-check-label" for="flexCheckIndustries">Manage Industries</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="13" name="access[]" id="flexCheckLocation">
                                        <label class="form-check-label" for="flexCheckLocation">Manage Location</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="14" name="access[]" id="flexCheckSEO">
                                        <label class="form-check-label" for="flexCheckSEO">Manage SEO</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="15" name="access[]" id="flexCheckGeneralSetting">
                                        <label class="form-check-label" for="flexCheckGeneralSetting">General Setting</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="16" name="access[]" id="flexCheckSubAdmin">
                                        <label class="form-check-label" for="flexCheckSubAdmin">Manage Sub Admin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="17" name="access[]" id="flexCheckBlogs">
                                        <label class="form-check-label" for="flexCheckBlogs">Manage Blogs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="18" name="access[]" id="flexCheckExternalLinks">
                                        <label class="form-check-label" for="flexCheckExternalLinks">Manage External Links</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="19" name="access[]" id="flexCheckPackages">
                                        <label class="form-check-label" for="flexCheckPackages">Manage Packages</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="20" name="access[]" id="flexCheckSiteColours">
                                        <label class="form-check-label" for="flexCheckSiteColours">Manage Site Colours</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="21" name="access[]" id="flexCheckSiteDown">
                                        <label class="form-check-label" for="flexCheckSiteDown">Site Down</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="22" name="access[]" id="flexCheckSiteBackup">
                                        <label class="form-check-label" for="flexCheckSiteBackup">Site Backup</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="23" name="access[]" id="flexCheckChangePassword">
                                        <label class="form-check-label" for="flexCheckChangePassword">Change Password</label>
                                    </div>
								    
                                    <div class="form-check">
								    	<input class="form-check-input" name="check_all" type="checkbox" id="check_all flexCheckDefault001" value="check_all" onclick="checkall(this.form)" >
								    	<label class="form-check-label" for="flexCheckDefault001"><b>Select All</b></label>
								    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" name="submit_user" class="btn btn-success px-5">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>User Info</th>
                                            <!--<th>Username</th>-->
                                            <!--<th>Password</th>-->
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th><input class="form-check-input" type="checkbox" id="select-all"></th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <form method="POST" action="<?php $_PHP_SELF?>" onsubmit="return validateForm()">
                                        <?php 
                                            $sql = "SELECT * FROM `login_tbl` WHERE user_type!='supadmin'";
                                            $run = mysqli_query($db,$sql) or die("Query Not run");
                                            $count=0;
                                            while($data = mysqli_fetch_assoc($run)){
                                            if(mysqli_num_rows($run) > 0){
                                            $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td> <p><b>Name- </b> <?php echo $data['name']?></p>
                                               <p><b>Username- </b>  <?php echo $data['username']?></p>
                                               <label for="inputChoosePassword" class="form-label">Password</label>
                                               <div class="input-group" id="show_hide_password" style="width: 50%;">
                                                 <input type="text" readonly class="form-control" id="inputChoosePassword" value="<?php echo $data['password'];?>" name="password" required>
                                                 <a href="javascript:;" class="input-group-text bg-transparent" id="togglePassword"><i class="lni lni-eye"></i></a>
                                               </div>
                                                <!--<p><i style="color:blue;" class="password-toggle fa fa-eye"></i>-->
                                                <!-- <input type="password" class="form-control password-field" value="<?php echo $data['password'] ?>" readonly style="border: none; padding-left:10px;"></p>-->
                                                 <p><b>Access- </b> 
                                                 <?php
                                                    $accessDescriptions = [
                                                        "01" => "Manage Slider",
                                                        "02" => "Manage Products/Services",
                                                        "03" => "Manage Static Pages",
                                                        "04" => "Manage Team",
                                                        "05" => "Manage Clients",
                                                        "06" => "Manage Testimonials",
                                                        "07" => "Manage FAQ's",
                                                        "08" => "Manage Facts/Figures",
                                                        "09" => "Manage Photo Gallery",
                                                        "10" => "Manage Video Gallery",
                                                        "11" => "Manage Certificates",
                                                        "12" => "Manage Industries",
                                                        "13" => "Manage Location",
                                                        "14" => "Manage SEO",
                                                        "15" => "General Setting",
                                                        "16" => "Manage Sub Admin",
                                                        "17" => "Manage Blogs",
                                                        "18" => "Manage External Links",
                                                        "19" => "Manage Packages",
                                                        "20" => "Manage Site Colours",
                                                        "21" => "Site Down",
                                                        "22" => "Site Backup",
                                                        "23" => "Change Password"
                                                    ];
                                                    
                                                    $accessString = $data['admin_access'];
                                                    $selectedAccess = explode(',', $accessString);
                                                    $msg = "";
                                                    
                                                    foreach ($selectedAccess as $accessValue) {
                                                        if (isset($accessDescriptions[$accessValue])) {
                                                            $msg .= $accessDescriptions[$accessValue] . ',&nbsp;';
                                                        }
                                                    }
                                                    
                                                    // Remove the trailing comma and space
                                                    $msg = rtrim($msg, ',&nbsp;');
                                                    
                                                    print $msg;
                                                  ?>

                                                 </p>
                                            </td>
                                            <td class="text-center">
                                                <?php if($data["admin_status"]=="Active"){?>
                                                <button type="button" class="btn btn-success"><span class="label label-default">Active</span></button>
                                                <?php }else{?>
                                                <button type="button" class="btn btn-danger"><span class="label label-default">Inactive</span></button>
                                                <?php }?>
                                            </td>
                                            
                                            <td>
                                                <a href="edit-subadmin.php?id=<?php echo $data['id']?>"><i class="fadeIn animated bx bx-edit font-20"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" name="checkedIDs[]" value="<?php echo $data["id"]?>" class="form-check-input row-checkbox" />
                                                <input type="hidden" name="pageID[]" value="<?php echo $data["id"]?>">
                                            </td>
                                        </tr>
                                        <?php
                                            }else{
                                                echo "<h1>No Data Found</h1>";
                                            }
                                        }
                                        ?>
                                        <tfoot>
                                        <tr>
                                            <td colspan="10" class="text-right">
                                                <button type="submit" name="inactive" class="btn btn-danger pull-right mr5" >Make Inactive</button>
                                                <button type="submit" name="active" class="btn btn-success pull-right mr5" >Make Active</button>
                                                <button type="submit" name="delete" class="btn btn-danger pull-right mr5" >Delete</button>
                                            </td>
                                        </tr>
                                        </form>
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
    <script>
    $(document).ready(function () {
  $("#togglePassword").on('click', function (event) {
    event.preventDefault();
    var passwordField = $('#inputChoosePassword');
    var icon = $(this).find('i');

    if (passwordField.attr("type") == "password") {
      passwordField.attr('type', 'text');
      icon.addClass("bi-eye-fill");
      icon.removeClass("bi-eye-slash-fill");
    } else {
      passwordField.attr('type', 'password');
      icon.removeClass("bi-eye-fill");
      icon.addClass("bi-eye-slash-fill");
    }
  });
});

  </script>
    <script>
    function checkall(form) {
        var checkboxes = form.elements['access[]'];
        var checkAllCheckbox = form.elements['check_all'];
    
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = checkAllCheckbox.checked;
        }
    }
    </script>
    
    <?php include "footer.php"; ?>

</body>

</html>