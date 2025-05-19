<?php 
    include "../include/dbsmain.inc.php";
	
    if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
     $sql=" UPDATE `login_tbl` SET `username`='$username',`password`='$password' WHERE `id`= '$id'";
     $result = mysqli_query($db, $sql) or die("Query unsuccessful");

	if($result){
            echo ("<script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        text: 'Update Successfully!',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        background: '#0f1535',
                        color: '#fefefe',
                        willClose: () => {
                            window.location.href = 'change-password.php';
                        }
                    });
                }
            </script>");
		mysqli_close($db);
	}else{
        echo ("<script>
            window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        text: 'Not Update!',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        background: '#0f1535',
                        color: '#fefefe',
                        willClose: () => {
                            window.location.href = 'change-password.php';
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
  <!--end top header-->

  <!--start sidebar-->
  <?php include "sidebar.php";?>
  <!--end sidebar-->

  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Change Pasword</div>
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
            <a href="index.php"><button type="button" class="btn btn-primary"><i class="lni lni-arrow-left-circle"></i> Back</button></a>
          </div>
        </div>
      </div>
      <!--end breadcrumb-->
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <?php 
                  $id = $_SESSION['user']['id'];
                  $sql = "SELECT * FROM `login_tbl` WHERE id='$id'";
                  $run = mysqli_query($db, $sql) or die("Query Not run");
                  $data = mysqli_fetch_assoc($run);
              ?>
              <form action="<?php $_PHP_SELF?>" method="POST">
              <div class="row">
                <input type="text" hidden="" value="<?php echo $data['id'];?>" class="form-control" name="id">
                <div class="col-12 col-lg-6">
                    <label for="inputEmailAddress" class="form-label">User Name Or Email</label>
                    <input type="text" class="form-control" value="<?php echo $data['username'];?>" name="username" required>
                  </div>
                  <div class="col-12 col-lg-6">
                    <label for="inputChoosePassword" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control" id="inputChoosePassword" value="<?php echo $data['password'];?>" name="password" required>
                      <a href="javascript:;" class="input-group-text bg-transparent"><i class="lni lni-eye"></i></a>
                    </div>
                  </div>
                <div class="col pt-4">
                  <button type="submit" name="update" class="btn btn-success px-5">Submit </button>
                </div>
              </div>
              </form>
            </div>
            <!--end row-->
          </div>
  </main>


  <?php include "footer.php";?>
<script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>
</body>

</html>