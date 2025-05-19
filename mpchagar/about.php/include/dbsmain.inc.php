<?php 
 session_start();
 include "db-config.php";
 include "login-conditions.php";
 date_default_timezone_set('Asia/Kolkata');
 $currentDate = date('Y-m-d_H:i:s');
 $currentDatetime = date('Y-m-d_H:i:s');
// variable declaration
$username = "";
$email    = "";
$errors   = array();

if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		// $password = md5($password);

		$query1 = "SELECT * FROM login_tbl WHERE (username='$username' OR email='$username') AND password='$password' LIMIT 1";
		$results1 = mysqli_query($db, $query1);

		if (mysqli_num_rows($results1) == 1) {
            // check if user is admin or user
            $logged_in_user = mysqli_fetch_assoc($results1);
            if ($logged_in_user['user_type'] == 'supadmin') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "";
                header('location: index.php');		  
            } else if ($logged_in_user['user_type'] == 'admin') {
                $_SESSION['user'] = $logged_in_user;
                $_SESSION['success']  = "";
                header('location: index.php');		  
            } else {
                $_SESSION['msg'] = "Invalid user type";
                header('location: login.php');
            }
        } else {
            $_SESSION['msg'] = "Invalid username or password";
            header('location: login.php');
        }

// 		$query2 = "SELECT * FROM tbl_member WHERE username='$username' AND password='$password' LIMIT 1";
// 		$results2 = mysqli_query($db, $query2);

// 		if (mysqli_num_rows($results2) == 1) { 
// 			$logged_in_user = mysqli_fetch_assoc($results2);
// 			$_SESSION['user'] = $logged_in_user;
// 			$_SESSION['success']  = "";
// 			header('location:member_home.php');
// 		}

		// No user found in either table
		array_push($errors, "Wrong username/password ");
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>