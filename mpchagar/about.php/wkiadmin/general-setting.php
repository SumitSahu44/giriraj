<?php
    include "../include/dbsmain.inc.php";

   if(isset($_POST['update'])) {
       $address = htmlspecialchars($_POST['address'], ENT_QUOTES);
       $phone = $_POST['phone'];
       $universal_notification = $_POST['universal_notification'];
       $alt_phone = $_POST['alt_phone'];
       $email = $_POST['email'];
       $alt_email = $_POST['alt_email'];
       $whatsapp = $_POST['whatsapp'];
       $map_link = $_POST['map_link'];
       $short_about = $_POST['short_about'];
       $facebook_link = htmlspecialchars($_POST['facebook_link'], ENT_QUOTES);
       $insta_link = htmlspecialchars($_POST['insta_link'], ENT_QUOTES);
       $twitter_link = htmlspecialchars($_POST['twitter_link'], ENT_QUOTES);
       $pinterest_link = htmlspecialchars($_POST['pinterest_link'], ENT_QUOTES);
       $youtube_link = htmlspecialchars($_POST['youtube_link'], ENT_QUOTES);
       $linkedin_link = htmlspecialchars($_POST['linkedin_link'], ENT_QUOTES);

       $sql="UPDATE `tbl_general` SET `short_about`='$short_about',`universal_notification`='$universal_notification',`address`='$address',`phone`='$phone',`alt_phone`='$alt_phone',`email`='$email',`alt_email`='$alt_email',`whatsapp`='$whatsapp',`map_link`='$map_link',`facebook_link`='$facebook_link',`twitter_link`='$twitter_link',`youtube_link`='$youtube_link',`linkedin_link`='$linkedin_link',`insta_link`='$insta_link',`pinterest_link`='$pinterest_link'";
      
       $existing_images_query = "SELECT `header_logo`, `footer_logo` FROM `tbl_general` WHERE id=1";
       $existing_images_result = $db->query($existing_images_query);
       $existing_images_row = $existing_images_result->fetch_assoc();
       
       $images = ["header_logo", "footer_logo"];
       $uploaded_files = [];
       
       foreach ($images as $image) {
           if (!empty($_FILES[$image]['name'])) {
               if (!empty($existing_images_row[$image])) {
                   unlink('images/' . $existing_images_row[$image]);
               }
               $image_extension = pathinfo($_FILES[$image]['name'], PATHINFO_EXTENSION);
               $current_datetime = date('YmdHis');
               $new_image_name = $image . '_' . $current_datetime . '.' . $image_extension;
               move_uploaded_file($_FILES[$image]['tmp_name'], 'images/' . $new_image_name);
               $upload_image = $new_image_name;
               if ($upload_image) {
                   $uploaded_files[$image] = $new_image_name;
                   $sql .= ", $image='$new_image_name'";
               } else {
                   echo "Error: Failed to upload $image";
                   exit;
               }
           }
       }
   
       $sql .= " WHERE id=1";
   
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
                                window.location.href = 'general-setting.php';
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
                                window.location.href = 'general-setting.php';
                            }
                        });
                    }
                </script>");
        }
   }
?>
<!doctype html>
<!--<html lang="en">-->
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
                <div class="breadcrumb-title pe-3">Edit Page</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
    
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <?php 
                           $sql = "SELECT * FROM `tbl_general` WHERE id=1";
                           $run = mysqli_query($db,$sql) or die("Query Not run");
                           $data = mysqli_fetch_assoc($run);
                        ?>
                        <form action="<?php $_PHP_SELF?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <!--<div class="mhead">-->
                                <!--    <h4>General Settings</h4>-->
                                <!--</div>-->
                                <div class="col-lg-6">
                                    <h5 class="mb-3"><i class="lni lni-image"></i> Header Logo</h5>
                                    <input type="file" class="form-control" name="header_logo">
                                    <img width="50px;" src="images/<?php echo $data['header_logo']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3"><i class="lni lni-image"></i> Footer Logo </h5>
                                    <input type="file" class="form-control" name="footer_logo">
                                    <img width="80px;" src="images/<?php echo $data['footer_logo']?>">
                                </div>
    
                                <div class="mb-4 mt-4">
                                    <h5 class="mb-3"> Footer Short About</h5>
                                    <textarea class="form-control" cols="3" rows="6" name="short_about"><?php echo $data['short_about']?></textarea>
                                </div>
                                <div class="mhead">
                                    <h4>Universal Notification </h4>
                                </div>
                                <div class="mb-4 mt-4">
                                    <h5 class="mb-3">Universal Notification</h5>
                                    <textarea class="form-control" cols="3" rows="6" name="universal_notification"><?php echo $data['universal_notification']?></textarea>
                                </div>
                                <div class="mhead">
                                    <h4>Contact Details
                                    </h4>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-phone"></i> Contact Number</h5>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $data['phone']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-phone"></i> Alt-Contact Number</h5>
                                    <input type="text" class="form-control" placeholder="Alt Phone Number" name="alt_phone" value="<?php echo $data['alt_phone']?>">
    
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-envelope"></i> Email</h5>
                                    <input type="email" class="form-control" placeholder="Eamil" name="email" value="<?php echo $data['email']?>">
    
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-envelope"></i> Alt-Email</h5>
                                    <input type="email" class="form-control" placeholder="Alt Email" name="alt_email" value="<?php echo $data['alt_email']?>">
    
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-whatsapp"></i> Whatsapp Number</h5>
                                    <input type="text" class="form-control" placeholder="Whatsapp Number" name="whatsapp" value="<?php echo $data['whatsapp']?>">
    
                                </div>
    
                                <div class="mb-4">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-map"></i> Address</h5>
                                    <textarea class="form-control" cols="4" rows="2" placeholder="Address" name="address" ><?php echo $data['address']?></textarea>
                                </div>
                                <div class="mb-4">
                                    <h5 class="mb-3"><i class="lni lni-map-marker"></i>Map Link(Embeded)</h5>
                                    <textarea class="form-control" cols="4" rows="3" placeholder="Embeded Map Link" name="map_link"><?php echo $data['map_link']?></textarea>
                                </div>
                                <div class="mhead">
                                    <h4>Social Media
                                    </h4>
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-youtube"></i> Youtube Link</h5>
                                    <input type="text" class="form-control" name="youtube_link" value="<?php echo $data['youtube_link']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-facebook-original"></i> Facebook Link</h5>
                                    <input type="text" class="form-control" name="facebook_link" value="<?php echo $data['facebook_link']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-pinterest"></i> Pinterest Link</h5>
                                    <input type="text" class="form-control" name="pinterest_link" value="<?php echo $data['pinterest_link']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-instagram"></i> Instagram Link</h5>
                                    <input type="text" class="form-control" name="insta_link" value="<?php echo $data['insta_link']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-twitter-original"></i> Twitter X Link</h5>
                                    <input type="text" class="form-control" name="twitter_link" value="<?php echo $data['twitter_link']?>">
    
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="mb-3 mt-3"><i class="lni lni-linkedin-original"></i> LinkedIn Link </h5>
                                    <input type="text" class="form-control" name="linkedin_link" value="<?php echo $data['linkedin_link']?>">
    
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <button type="submit" name="update" class="btn btn-success px-5">Submit</button>
                                </div>
    
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