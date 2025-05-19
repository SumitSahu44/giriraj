<?php 
include "../site-main-query.php";
 $wspath=$compseo['site_path'];
if (isset($_POST['forgot'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $query = "SELECT * FROM login_tbl WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {

        $token = bin2hex(random_bytes(32));
        $ist_timezone = new DateTimeZone('Asia/Kolkata');
        $expiry_time = new DateTime('now', $ist_timezone);
        $expiry_time->modify('+15 minutes');
        $expiry_time_ist = $expiry_time->format('Y-m-d H:i:s');

        // Create a new table "password_reset" if it doesn't exist
        $create_table_query = "CREATE TABLE IF NOT EXISTS password_reset (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            token VARCHAR(64) NOT NULL,
            expiration_time DATETIME NOT NULL
        )";

        mysqli_query($db, $create_table_query);

        $insert_query = "INSERT INTO password_reset (email, token, expiration_time) VALUES ('$email', '$token', '$expiry_time_ist')";
        mysqli_query($db, $insert_query);

        // Send the reset link to the user's email address
        $reset_link = $wspath . "wkiadmin/reset_password.php?token=" . $token . "&email=" . $email;
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the link below to reset your password. This link is valid for 15 minutes only:\n$reset_link";
        $headers = "From: info@webkeyindia.com";

        if (mail($to, $subject, $message, $headers)) {
            echo '<script>alert("Reset link sent to your email address. Check Your mail for change password.");</script>';
        } else {
            echo '<script>alert("Failed to send reset link. Please try again later.");</script>';
        }
    } else {
         echo '<script>alert("Email not found in the database. Please enter the correct email address.");</script>';
    }
    mysqli_close($db);
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
              <h4 class="fw-bold">Forgot Password?</h4>
              <p class="mb-0">Enter your registered email ID to reset the password</p>

              <div class="form-body mt-4">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="row g-4">
                  <p style="color:red;"><?php echo $_SESSION['msg']; ?></p>
                  <div class="col-12">
                    <label class="form-label">Email id</label>
                    <input type="email" name="email" class="form-control" placeholder="example@user.com">
                  </div>
                  <div class="col-12">
                    <div class="d-grid gap-2">
                      <button type="submit" name="forgot" class="btn btn-grd-info">Send</button>
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

</body>

</html>