<?php 
    include "../include/dbsmain.inc.php";
    
    if(isset($_POST['update'])) {
        $index_follow = $_POST['index_follow'];
        $site_verification = htmlspecialchars($_POST['site_verification'], ENT_QUOTES);
        $google_analytic = mysqli_real_escape_string($db,$_POST['google_analytic']);
        $other_codes = mysqli_real_escape_string($db,$_POST['other_codes']);
        $site_path= $_POST['site_path'];
        
        $copyright_year= $_POST['copyright_year'];
        $member_of= $_POST['member_of'];
        $member_keyword= htmlspecialchars($_POST['member_keyword'], ENT_QUOTES);
        $member_link= $_POST['member_link'];
        $site_name= htmlspecialchars($_POST['site_name'], ENT_QUOTES);
     
        $sql = "UPDATE `tbl_seo` SET site_path = '$site_path',`index_follow`='$index_follow', `site_verification`='$site_verification', `google_analytic`='$google_analytic', `site_name`='$site_name', `other_codes`='$other_codes', `copyright_year`='$copyright_year', `member_of`='$member_of', `member_keyword`='$member_keyword', `member_link`='$member_link'";
        
        $images = ["favicon", "robots_txt", "sitemap"];
        $uploaded_files = [];
        $query = "SELECT `favicon`, `robots_txt`, `sitemap` FROM `tbl_seo` WHERE `se_id` = '1'";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        
        foreach ($images as $image) {
            if (!empty($_FILES[$image]['name'])) {
                $current_file = $row[$image];
                
                if (!empty($current_file) && file_exists('../' . $current_file)) {
                    unlink('../' . $current_file);
                }
        
                $file_name = basename($_FILES[$image]['name']);
                $target_file = $file_name;
                $move_image = move_uploaded_file($_FILES[$image]['tmp_name'], '../' . $_FILES[$image]['name']);
                
                if ($move_image) {
                    $uploaded_files[$image] = $target_file;
                    $sql .= ", $image='$target_file'";
                } else {
                    echo "Error: Failed to upload $image";
                    exit;
                }
            }
        }
    
        $sql .= " WHERE se_id=1";
    
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
                                window.location.href = 'manage-seo.php';
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
                                window.location.href = 'manage-seo.php';
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
                <div class="breadcrumb-title pe-3">Manage SEO/ Site Setting</div>
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
                        <?php
                           $sql = "SELECT * FROM `tbl_seo` WHERE se_id=1";
                           $run = mysqli_query($db,$sql) or die("Query Not run");
                           $data = mysqli_fetch_assoc($run)
                        ?>
                        <form action="<?php $_PHP_SELF?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-lg-7">
                                    <div class="card border-top border-3 border-danger rounded-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-4">
                                                        <h5 class="mb-3">Website URL</h5>
                                                        <input type="text" class="form-control" value="<?php echo $data['site_path']?>" name="site_path">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-4">
                                                        <h5 class="mb-3">Company / Website Name</h5>
                                                        <input type="text" class="form-control" value="<?php echo $data['site_name']?>" name="site_name">
                                                    </div>
                    
                                                </div>
                                                <div class="col-lg-6">
                                                    <h5 class="mb-3">Index,Follow </h5>
                                                    <select class="form-select" name="index_follow">
                                                        <option value='<meta name="robots" content="index,follow">' <?php if($data["index_follow"]=='<meta name="robots" content="index,follow">'){ ?> selected='selected' <? } ?>>Yes</option>
                                                        <option value='<meta name="robots" content="noindex,nofollow">' <?php if($data["index_follow"]=='<meta name="robots" content="noindex,nofollow">'){ ?> selected='selected' <? } ?>>No</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <h5 class="mb-3">Robots.txt</h5>
                                                        <input type="file" class="form-control" name="robots_txt">
                                                    </div>
                    
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <h5 class="mb-3">Favicon Icon</h5>
                                                        <input type="file" class="form-control" name="favicon">
                                                        <img width="50px;" src="../<?php echo $data['favicon']?>">
                                                    </div>
                    
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <h5 class="mb-3">Sitemap XML</h5>
                                                        <input type="file" class="form-control" name="sitemap">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-5">
                                    <div class="card border-top border-3 border-danger rounded-0">
                                        <div class="card-body">
                                            <!--<h5 class="mb-3">Copyright</h5>-->
                                            <div class="row g-3 ">
                                                <div class="col-12">
                                                    <h5 class="mb-3">Copyright Start Year</h5>
                                                    <input type="text" class="form-control" placeholder="Copyright Start Year" name="copyright_year" value="<?php echo $data['copyright_year']?>">
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-2">
                                                <div class="col-12">
                                                    <h5 class="mb-3">Member Of</h5>
                                                    <input type="text" class="form-control" placeholder="Member Of" name="member_of" value="<?php echo $data['member_of']?>">
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-2">
                                                <div class="col-12">
                                                    <h5 class="mb-3">Keyword For Member Of</h5>
                                                    <input type="text" class="form-control" placeholder="Keyword" name="member_keyword" value="<?php echo $data['member_keyword']?>">
                                                </div>
                                            </div>
                                            <div class="row g-3 mt-2 mb-2">
                                                <div class="col-12">
                                                    <h5 class="mb-3">Keyword Link</h5>
                                                    <input type="text" class="form-control" placeholder="Keyword Link" name="member_link" value="<?php echo $data['member_link']?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="card border-top border-3 border-danger rounded-0">
                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <h5 class="mb-3">Site Verification Code</h5>
                                                    <textarea class="form-control" cols="4" rows="2" name="site_verification"><?php echo $data['site_verification']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <h5 class="mb-3">Google Analytic Code</h5>
                                                    <textarea name="google_analytic" class="form-control" rows="3" col="2"><?php echo $data['google_analytic']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <h5 class="mb-3">Other Codes</h5>
                                                    <textarea class="form-control" cols="4" rows="3" name="other_codes"><?php echo $data['other_codes']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mt-3">
                                                    <button type="submit" name="update" class="btn btn-success px-5">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
    
            </div>
            <!--end row-->
        </div>
    </div>
    </main>

	<?php include "footer.php";?>

</body>

</html>