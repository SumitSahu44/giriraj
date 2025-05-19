<?php 
    include "../include/dbsmain.inc.php";
    
    if(isset($_POST['update'])) {
        $color_code = $_POST['color_code'];
        $secondry_color = $_POST['secondry_color'];
        
        $sql = "UPDATE `tbl_site_color` SET `color_code`='$color_code', `secondry_color`='$secondry_color'";
    
        $sql .= " WHERE color_id=1";
    
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
                                window.location.href = 'manage-sitecolors.php';
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
                                window.location.href = 'manage-sitecolors.php';
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
                <div class="breadcrumb-title pe-3">Manage Site Colors</div>
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
                           $sql = "SELECT * FROM `tbl_site_color` WHERE color_id=1";
                           $run = mysqli_query($db,$sql) or die("Query Not run");
                           $data = mysqli_fetch_assoc($run)
                        ?>
                        <form action="<?php $_PHP_SELF?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Pick Primary Color</h5>
                                        <input type="color" class="form-control pb2 pt2" name="color_code" value="<?php echo $data['color_code']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Primary Color For Testing</h5>
                                        <textarea class="form-control" cols="4" rows="2" name="" readonly style="background:<?php echo $data['color_code']?>"><?php echo $data['color_code']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Pick Secondary Color</h5>
                                        <input type="color" class="form-control pb2 pt2" name="secondry_color" value="<?php echo $data['secondry_color']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mb-3">Secondary Color For Testing</h5>
                                        <textarea class="form-control" cols="4" rows="2" name="" readonly style="background:<?php echo $data['secondry_color']?>"><?php echo $data['color_code']?></textarea>
                                    </div>
                                </div>
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