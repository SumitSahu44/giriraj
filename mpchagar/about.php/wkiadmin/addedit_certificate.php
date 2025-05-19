<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['submit'])) {
        $cert_names = $_POST['cert_name'];
        $cert_statuses = 'Active';
        $b_images = $_FILES['cert_image'];
    
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $currentDate = date('YmdHis');
    
        for($i = 0; $i < count($cert_names); $i++) {
            $cert_name = htmlspecialchars($cert_names[$i], ENT_QUOTES);
            $cert_status = $cert_statuses[$i];
            $b_image = [
                'name' => $b_images['name'][$i],
                'type' => $b_images['type'][$i],
                'tmp_name' => $b_images['tmp_name'][$i],
                'error' => $b_images['error'][$i],
                'size' => $b_images['size'][$i]
            ];
    
            $image_extension = pathinfo($b_image['name'], PATHINFO_EXTENSION);
            if (in_array(strtolower($image_extension), $allowed_extensions)) {
                $new_image_name = 'cert_' . $currentDate . '_' . uniqid() . '.' . $image_extension;
                move_uploaded_file($b_image['tmp_name'], 'images/gallery/' . $new_image_name);
    
                $sql = "INSERT INTO `tbl_certificates`(`cert_image`, `cert_name`, `cert_status`) 
                                          VALUES ('$new_image_name', '$cert_name', 'Active')";
                $result = mysqli_query($db, $sql) or die("Query unsuccessful");
            } else {
                echo ("<script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'error',
                            text: 'Invalid file format for image: {$b_image['name']}. Only JPG, JPEG, and PNG files are allowed!',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            background: '#0f1535',
                            color: '#fefefe',
                            willClose: () => {
                                window.location.href = 'manage-certificates.php';
                            }
                        });
                    }
                </script>");
            }
        }
    
        if($result){
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
                            window.location.href = 'manage-certificates.php';
                        }
                    });
                }
            </script>");
        } else {
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
                            window.location.href = 'manage-certificates.php';
                        }
                    });
                }
            </script>");
        }
    }
	
	if (isset($_POST['update'])) {
        $ids = $_POST['id'];
        $cert_names = $_POST['cert_name'];
        $b_images = $_FILES['cert_image'];

        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $currentDate = date('YmdHis');

        for($i = 0; $i < count($ids); $i++) {
            $id = $ids[$i];
            $cert_name = htmlspecialchars($cert_names[$i], ENT_QUOTES);
            $cert_status = $cert_statuses[$i];
            
            $sql = "UPDATE `tbl_certificates` SET `cert_name`='$cert_name'";
            $existing_images_query = "SELECT `cert_image` FROM `tbl_certificates` WHERE cert_id=$id";
            $existing_images_result = $db->query($existing_images_query);
            $existing_images_row = $existing_images_result->fetch_assoc();
            
            if (!empty($b_images['name'][$i])) {
                $image_extension = pathinfo($b_images['name'][$i], PATHINFO_EXTENSION);
                
                if (in_array(strtolower($image_extension), $allowed_extensions)) {
                    $new_image_name = 'cert_' . $currentDate . '_' . uniqid() . '.' . $image_extension;

                    if (move_uploaded_file($b_images['tmp_name'][$i], 'images/gallery/' . $new_image_name)) {
                        if (!empty($existing_images_row['cert_image'])) {
                            unlink('images/gallery/' . $existing_images_row['cert_image']);
                        }
                        
                        $sql .= ", cert_image='$new_image_name'";
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
                                    window.location.href = 'manage-certificates.php';
                                }
                            });
                        }
                    </script>";
                }
            }

            $sql .= " WHERE cert_id=$id";
            
            if ($db->query($sql) === TRUE) {
                $success = true;
            } else {
                $success = false;
            }
        }

        if ($success) {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Update Successfully!',
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        willClose: () => {
                            window.location.href = 'manage-certificates.php';
                        }
                    });
                }
            </script>";
        } else {
            echo "<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        text: 'Not Update!',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        willClose: () => {
                            window.location.href = 'manage-certificates.php';
                        }
                    });
                }
            </script>";
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

  <?php include "header.php";?>
  
  <?php include "sidebar.php";?>

  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add/Edit Photo Gallery</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <a href="manage-certificates.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <?php
             $sl_id = isset($_REQUEST['cert_id']) ? $_REQUEST['cert_id'] : '';
             if($sl_id!='') {
                 $sqlupd = "SELECT * FROM `tbl_certificates` WHERE cert_id=$sl_id";
                 $runupd = mysqli_query($db,$sqlupd) or die("Query Not run");
                 
                 if ($runupd) {
                     $dataupd = mysqli_fetch_assoc($runupd);
                     if ($dataupd) {
                         $cert_id = $dataupd['cert_id'];
                         $cert_name = $dataupd['cert_name'];
                         $image = $dataupd['cert_image'];
                     }
                 }
                 
             }
          ?>
          <form action="<?php $_PHP_SELF?>" method="POST" enctype="multipart/form-data">
          <div id="card-container">
              <div class="card border-top border-3 border-danger rounded-0 card-template">
                  <div class="card-body">
                      <div class="row image-form">
                          <div class="col-lg-6">
                              <div class="mb-4">
                                  <h5 class="mb-3">Title</h5>
                                  <input type="text" class="form-control" placeholder="Name" name="cert_name[]" <?php if($sl_id!=""){?>value="<?= $cert_name?>"<?php }?> >
                                  <input type="hidden" name="id[]" <?php if($sl_id!=""){?>value="<?= $cert_id?>"<?php }?>>
                              </div>
                          </div>
                          
                          <div class="col-lg-6">
                              <div class="mb-4">
                                  <h5 class="mb-3">Image </h5>
                                  <input type="file" class="form-control" name="cert_image[]" accept=".jpg, .png, image/jpeg, image/png">
                                  <?php if($sl_id!=""){?>
                                  <img src="images/gallery/<?= $image ?>" width="50px">
                                  <?php }?>
                              </div>
                          </div>
                          
                          <div class="col-lg-2">
                          <button type="button" class="remove-button btn btn-danger">Remove</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <?php if(!$_GET['cert_id']){?>
          <button type="button" id="add-card-button" class="btn btn-primary mt-3">Add More</button>
          <?php }?>
          <div class="col-lg-12 mt-3">
              <?php if($sl_id!=""){?>
              <button type="submit" name="update" class="btn btn-success px-5">Update</button>
              <?php }else{?>                                 
              <button type="submit" name="submit" class="btn btn-success px-5">Submit</button>
              <?php }?>
          </div>
          </form>
          <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const addCardButton = document.getElementById('add-card-button');
                const cardContainer = document.getElementById('card-container');
            
                addCardButton.addEventListener('click', () => {
                    const cardClone = cardContainer.querySelector('.card-template').cloneNode(true);
                    cardClone.classList.remove('card-template');
                    cardClone.querySelectorAll('input').forEach(input => input.value = '');
                    cardClone.querySelectorAll('select').forEach(select => select.value = '0');
                    
                    cardClone.querySelector('.remove-button').addEventListener('click', (e) => {
                        if (cardContainer.querySelectorAll('.card').length > 1) {
                            e.currentTarget.closest('.card').remove();
                        } else {
                            alert('You must have at least one image form.');
                        }
                    });
            
                    cardContainer.appendChild(cardClone);
                });
            
                cardContainer.querySelector('.remove-button').addEventListener('click', (e) => {
                    if (cardContainer.querySelectorAll('.card').length > 1) {
                        e.currentTarget.closest('.card').remove();
                    } else {
                        alert('You must have at least one image form.');
                    }
                });
            });
          </script>
        </div>
      </div>
            
  </main>

  <?php include "footer.php";?>

</body>

</html>