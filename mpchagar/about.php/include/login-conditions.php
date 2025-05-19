<?php
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page != 'login.php' && !isLoggedIn()) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
        exit();
    }
?>