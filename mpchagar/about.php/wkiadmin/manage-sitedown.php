<?php 
    include "../include/dbsmain.inc.php";
    
    if(isset($_POST['update'])) {
        $site_down = $_POST['site_down'];
        $message = $_POST['message'];
        
        $sql = "UPDATE `tbl_sitedown` SET `site_down`='$site_down', `message`='$message'";
        
        $existing_images_query = "SELECT `site_image` FROM `tbl_sitedown` WHERE sd_id=1";
        $existing_images_result = $db->query($existing_images_query);
        $existing_images_row = $existing_images_result->fetch_assoc();
        $images = ["site_image"];
        $uploaded_files = [];
        
        foreach ($images as $image) {
            if (!empty($_FILES[$image]['name'])) {
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'svg'];
                $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
                
                if (in_array(strtolower($image_extension), $allowed_extensions)) {
                    $new_image_name = 'sitedown_' . $currentDate . '.' . $image_extension;
    
                    if (move_uploaded_file($_FILES[$image]['tmp_name'], 'images/' . $new_image_name)) {
                        if (!empty($existing_images_row[$image])) {
                            unlink('images/' . $existing_images_row[$image]);
                        }
                        
                        $uploaded_files[$image] = $new_image_name;
                        $sql .= ", $image='$new_image_name'";
                    }
                } else {
                    echo "<script>
                        window.onload = function() {
                            Swal.fire({
                                icon: 'error',
                                text: 'Invalid file format. Only JPG, JPEG, and PNG files are allowed!',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                willClose: () => {
                                    window.location.href = 'manage-sitedown.php';
                                }
                            });
                        }
                    </script>";
                }
            }
        }
    
        $sql .= " WHERE sd_id=1";
    
        if ($db->query($sql) === TRUE) {
            echo ("<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'success',
                            text: 'Submit Successfully!',
                            showConfirmButton: false,
                            timer: 1000,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage-sitedown.php';
                            }
                        });
                    }
                </script>");
	    }else{
            echo ("<script>
                window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            text: 'Not Submit!',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage-sitedown.php';
                            }
                        });
                    }
                </script>");
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

	<?php include "sidebar.php";?>

	<!--end sidebar-->
    <main class="main-wrapper">
        <div class="main-content">
    
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Manage SiteDown</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <?php
                           $sql = "SELECT * FROM `tbl_sitedown` WHERE sd_id=1";
                           $run = mysqli_query($db,$sql) or die("Query Not run");
                           $data = mysqli_fetch_assoc($run)
                        ?>
                        <form action="<?php $_PHP_SELF?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <h5 class="mb-3">Site Down</h5>
                                    <select class="form-select" name="site_down">
                                        <option value='Yes' <?php if($data["site_down"]=='Yes'){ ?> selected='selected' <? } ?>>Yes</option>
                                        <option value='No' <?php if($data["site_down"]=='No'){ ?> selected='selected' <? } ?>>No</option>
                                        
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Upload Image</h5>
                                        <input type="file" class="form-control" name="site_image">
                                        <img width="50px;" src="images/<?php echo $data['site_image']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h5 class="mb-3">Other Codes</h5>
                                
                                <textarea class="form-control ckeditor" cols="4" rows="3" name="message"><?php echo $data['message']?></textarea>
                            </div>
                            <div class="col mt-3">
                                <button type="submit" name="update" class="btn btn-success px-5">Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
    
            </div>
            <!--end row-->
        </div>
    </main>

	<?php include "footer.php";?>

</body>

</html>