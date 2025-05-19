<?php 
include "../site-main-query.php";
 $wspath=$compseo['site_path'];
 if(isset($_GET['token'])){
$token = $_GET['token'];
$email = $_GET['email'];

$token = mysqli_real_escape_string($db, $token);
$email = mysqli_real_escape_string($db, $email);

$sql = "SELECT email, expiration_time FROM password_reset WHERE token = '$token'";
$result = mysqli_query($db, $sql);

if (!$result || mysqli_num_rows($result) !== 1) {
    echo '<script>alert("Invalid token.");</script>';
     echo '<script>window.location.href = "login.php";</script>';
    exit();
}

$row = mysqli_fetch_assoc($result);
$db_email = $row['email'];
$expiration_time = $row['expiration_time'];

date_default_timezone_set('Asia/Kolkata');

$current_time = date('Y-m-d H:i:s');
if ($current_time > $expiration_time) {
    echo '<script>alert("Invalid token. Redirecting to request a new password reset.");</script>';
    echo '<script>window.location.href = "login.php";</script>';
    exit();
}
}
if (isset($_POST['reset'])) {
   if (!isset($_POST['token']) || empty($_POST['token'])) {
       die("Invalid token.");
   }
   $token = $_POST['token'];
   $emails = $_POST['email'];
   $new_password = $_POST['password'];

   $token_check_query = "SELECT email FROM password_reset WHERE token = '$token' AND email = '$emails'";
   $result = mysqli_query($db, $token_check_query);

   if (!$result || mysqli_num_rows($result) !== 1) {
       die("Invalid or expired token.");
   }

   $login_query = "SELECT email FROM login_tbl WHERE email = '$emails'";
   $login_result = mysqli_query($db, $login_query);

    if (mysqli_num_rows($login_result) === 1) {
        $hashed_password = $new_password;
        $update_sql_login = "UPDATE login_tbl SET password = '$hashed_password' WHERE email = '$emails'";
        mysqli_query($db, $update_sql_login);
    } else {
        die("Email not found in the database. Please enter the correct email address.");
    }
    $delete_query = "DELETE FROM password_reset WHERE email = '$emails'";
    mysqli_query($db, $delete_query);
    mysqli_close($db);

    $to = $emails;
    $subject = "Password Reset Successful";
    $message = "Your password has been reset successfully. Now you can login.\n Your new Password is: $hashed_password";
    $headers = "From: info@webkeyindia.com";

    if (mail($to, $subject, $message, $headers)) {
        echo '<script>alert("Password reset successful. Please check your email for confirmation.");</script>';
        echo '<script>window.location.href = "login.php";</script>';
    } else {
        echo '<script>alert("Password reset successful, but the confirmation email failed to send.");</script>';
        echo '<script>window.location.href = "login.php";</script>';
    }
}

?>

<!doctype html>
<!--<html lang="en">-->
<html lang="en" data-bs-theme="blue-theme" >

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include "top-links.php";?>

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

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
          <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
            <div class="card-body p-sm-5">
              <img src="https://www.webkeyindia.com/images/logo.png" class="mb-4 text-center" width="145" alt="">
              <h4 class="fw-bold">Reset Password</h4>
              <p class="mb-0">Enter your New Password to reset the password</p>

              <div class="form-body mt-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-4">
                  <p style="color:red;"><?php echo $_SESSION['msg']; ?></p>
                  <div class="col-12">
                    <label class="form-label">New Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control" id="inputChoosePassword" placeholder="Enter Password" name="password" required>
                      <a href="javascript:;" class="input-group-text bg-transparent"><i class="lni lni-eye"></i></a>
                      <input type="hidden" name="token" value="<?php echo $token?>" hidden>
                      <input type="hidden" name="email" value="<?php echo $email?>" hidden>
                    </div>
                    <!--<input type="password" name="password" class="form-control" required>-->
                  </div>
                  <div class="col-12">
                    <div class="d-grid gap-2">
                      <button type="submit" name="reset" class="btn btn-grd-info">Send</button>
                       <a href="login.php" class="btn btn-light">Back to Login</a>
                    </div>
                  </div>
                </form>
              </div>

          </div>
          </div>
        </div>

      </div>
     
    </div>
  </div>
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
</body>

</html>