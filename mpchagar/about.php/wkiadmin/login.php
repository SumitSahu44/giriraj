<?php include "../include/dbsmain.inc.php";?>
<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login </title>

  <?php include "top-links.php";?>
  <style>
    .error {
    	width: 92%; 
    	margin: 0px auto; 
    	padding: 10px; 
    	border: 1px solid #a94442; 
    	color: #a94442; 
    	background: #f2dede; 
    	border-radius: 5px; 
    	text-align: left;
    }
   </style>
</head>

<body>
  <div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">

          <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
            <div class="card-body">
              <img src="assets/images/auth/login1.png" class="img-fluid auth-img-cover-login" width="650" alt="Admin">
            </div>
          </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center border-top border-4 border-primary border-gradient-1">
          <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
            <div class="card-body p-sm-5">
              <!-- <img src="assets/images/logo1.png" class="mb-4" width="145" alt=""> -->
              <h4 class="fw-bold">Login Now</h4>
              <p class="mb-0">Enter your credentials to login your account</p>
              
              <div class="form-body mt-4">
                <form class="row g-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                  <p style="color:red;"><?php echo $_SESSION['msg']; ?></p>
                  <div class="col-12">
                    <label for="inputEmailAddress" class="form-label">User Name Or Email</label>
                    <input type="text" class="form-control" placeholder="jhon@example.com" name="username" required>
                  </div>
                  <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control" id="inputChoosePassword" placeholder="Enter Password" name="password" required>
                      <a href="javascript:;" class="input-group-text bg-transparent"><i class="lni lni-eye"></i></a>
                    </div>
                  </div>
                  <div class="col-md-6">
                  </div>
                  <div class="col-md-6 text-end"> <a href="forgot-password.php">Forgot Password ?</a>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" name="login_btn" class="btn btn-grd-primary">Login</button>
                    </div>
                  </div>
                  <!--<div class="col-12">-->
                  <!--  <div class="text-start">-->
                  <!--    <p class="mb-0">Don't have an account yet? <a href="auth-cover-register.html">Sign up here</a>-->
                  <!--    </p>-->
                  <!--  </div>-->
                  <!--</div>-->
                </form>
              </div>

            </div>
          </div>
        </div>

      </div>
      <!--end row-->
    </div>
  </div>


  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>

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

  <?php include "footer.php";?>

</body>


</html>