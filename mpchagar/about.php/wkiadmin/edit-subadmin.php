<?php 
  include "../include/dbsmain.inc.php";
	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
      if (isset($_POST['edit_user'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $name = $_POST['name'];
        // $name = ucfirst($username);
        $password = $_POST['password'];
        $status = $_POST['status'];
        date_default_timezone_set('Asia/Kolkata');
        $current_datetime = date('Y-m-d H:i:s');
        $selectedAccess = $_POST['access'];
        $accessString = implode(',', $selectedAccess);
    
        $sql = "UPDATE `login_tbl` SET 
            `name` = '$name',
            `admin_access` = '$accessString',
            `username` = '$username',
            `password` = '$password',
            `admin_status` = '$status'
             WHERE `id` = $id";
        $result = mysqli_query($db, $sql) or die("Query unsuccessful");
    
        if ($result) {
            echo "<script>
                   window.alert('Subadmin are activated successfully.');
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
                <div class="breadcrumb-title pe-3">Edit Sub Admin</div>
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
                        <?php 
                            $id=$_GET['id'];
                            $sql = "SELECT * FROM `login_tbl` WHERE id='$id'";
                            $run = mysqli_query($db,$sql) or die("Query Not run");
                            $data = mysqli_fetch_assoc($run);
                            $site_pages_status=$data['admin_status'];
                            $adminAccessString=$data['admin_access'];
                            $selectedAccess = explode(',', $adminAccessString);
                        ?>
                        <form action="<?php $_PHP_SELF?>" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Name </h5>
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id'];?>">
                                        <input type="text" class="form-control" value="<?php echo $data['name'];?>" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">User Name</h5>
                                        <input type="text" class="form-control" value="<?php echo $data['username'];?>" name="username">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Password</h5>
                                        <input type="text" class="form-control" value="<?php echo $data['password'];?>" name="password">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3">Status</h5>
                                    <select style ="width:100%; height:2.3rem; padding:3px; border-radius:5px;" class="form-select" name="status">
                                        <option value="Active" <?php if($site_pages_status=='Active'){ ?> selected="selected" <? } ?>>Active</option>
                                        <option value="Inactive" <?php if($site_pages_status=='Inactive'){ ?> selected="selected" <? } ?>>Inactive</option>
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="01" name="access[]" id="flexCheckDefault" <?php echo (in_array('01', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckDefault">Manage Slider</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="02" name="access[]" id="flexCheckDefault1" <?php echo (in_array('02', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckDefault1">Manage Products/Services</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="03" name="access[]" id="flexCheckDefault3" <?php echo (in_array('03', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckDefault3">Manage Static Pages</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="04" name="access[]" id="flexCheckDefault4" <?php echo (in_array('04', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckDefault4">Manage Team</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="05" name="access[]" id="flexCheckClients" <?php echo (in_array('05', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckClients">Manage Clients</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="06" name="access[]" id="flexCheckTestimonials" <?php echo (in_array('06', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckTestimonials">Manage Testimonials</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="07" name="access[]" id="flexCheckFAQs" <?php echo (in_array('07', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckFAQs">Manage FAQ's</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="08" name="access[]" id="flexCheckFactsFigures" <?php echo (in_array('08', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckFactsFigures">Manage Facts/Figures</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="09" name="access[]" id="flexCheckPhotoGallery" <?php echo (in_array('09', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckPhotoGallery">Manage Photo Gallery</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="10" name="access[]" id="flexCheckVideoGallery" <?php echo (in_array('10', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckVideoGallery">Manage Video Gallery</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="11" name="access[]" id="flexCheckCertificates" <?php echo (in_array('11', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckCertificates">Manage Certificates</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="12" name="access[]" id="flexCheckIndustries" <?php echo (in_array('12', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckIndustries">Manage Industries</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="13" name="access[]" id="flexCheckLocation" <?php echo (in_array('13', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckLocation">Manage Location</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="14" name="access[]" id="flexCheckSEO" <?php echo (in_array('14', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckSEO">Manage SEO</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="15" name="access[]" id="flexCheckGeneralSetting" <?php echo (in_array('15', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckGeneralSetting">General Setting</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="16" name="access[]" id="flexCheckSubAdmin" <?php echo (in_array('16', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckSubAdmin">Manage Sub Admin</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="17" name="access[]" id="flexCheckBlogs" <?php echo (in_array('17', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckBlogs">Manage Blogs</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="18" name="access[]" id="flexCheckExternalLinks" <?php echo (in_array('18', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckExternalLinks">Manage External Links</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="19" name="access[]" id="flexCheckPackages" <?php echo (in_array('19', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckPackages">Manage Packages</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="20" name="access[]" id="flexCheckSiteColours" <?php echo (in_array('20', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckSiteColours">Manage Site Colours</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="21" name="access[]" id="flexCheckSiteDown" <?php echo (in_array('21', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckSiteDown">Site Down</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="22" name="access[]" id="flexCheckSiteBackup" <?php echo (in_array('22', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckSiteBackup">Site Backup</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="23" name="access[]" id="flexCheckChangePassword" <?php echo (in_array('23', $selectedAccess)) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexCheckChangePassword">Change Password</label>
                                    </div>
                                
                                    <div class="form-check">
                                        <input class="form-check-input" name="check_all" type="checkbox" id="flexCheckDefault001" value="check_all" onclick="checkall(this.form)">
                                        <label class="form-check-label" for="flexCheckDefault001"><b>Select All</b></label>
                                    </div>
                                </div>

                                
                                <div class="col">
                                    <button type="submit" name="edit_user" class="btn btn-success px-5">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>
    
    <?php include "footer.php"; ?>

</body>

</html>