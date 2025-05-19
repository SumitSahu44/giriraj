<?php
    include_once('site-main-query.php');
    $wspath=$compseo['site_path'];
    $site_name=$compseo['site_name'];
    
    function isAllowedMessage($message) {
        $allowedChars = '/^[a-zA-Z0-9,@. ]*$/';
        return preg_match($allowedChars, $message);
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            date_default_timezone_set("Asia/Kolkata");
            $currentTime = date("Y-m-d H:i:s");
            $errors = array();
    
            // Validate input
            if (empty($name)) {
                $errors[] = "Name field is required.";
            } elseif (!preg_match('/^[a-zA-Z ]+$/', $name)) {
                $errors[] = "Name can only contain alphabets.";
            }
    
            if (empty($email)) {
                $errors[] = "Email field is required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }
    
            if (empty($phone)) {
                $errors[] = "Phone field is required.";
            } elseif (!preg_match('/^\d{10}$/', $phone)) {
                $errors[] = "Phone number should have exactly 10 digits.";
            }
    
            // Sanitize input
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    
            // Check for potentially malicious content in the message
            if (!isAllowedMessage($message)) {
                $errors[] = "Your message contains potentially malicious content or disallowed characters.";
            }
    
    if (empty($errors)) {
        // Your existing code for successful submission
        $query = "INSERT INTO `tbl_queries` (`name`, `phone`, `email`, `message`, `datetime`) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $name, $phone, $email, $message, $currentTime);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            if ($result) {
                $sendmail = $general["email"];
                // $sendmail = 'fardeenkhan902664@gmail.com';
                $to = $sendmail;
                $subjects = "New Query Submitted From $site_name";
                
                $emailMessage = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f4f4f4;
                            color: #333;
                        }
                        .container {
                            width: 100%;
                            max-width: 600px;
                            margin: 0 auto;
                            background-color: #ffffff;
                            padding: 20px;
                            border-radius: 8px;
                            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                        }
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }
                        table, th, td {
                            border: 1px solid #ddd;
                        }
                        th, td {
                            padding: 12px;
                            text-align: left;
                        }
                        th {
                            background-color: #f4f4f4;
                        }
                        .footer {
                            text-align: center;
                            margin-top: 20px;
                            font-size: 12px;
                            color: #aaa;
                        }
                        .header-title {
                            text-align: center;
                            background-color: #4CAF50;
                            color: white;
                            padding: 10px 0;
                            font-size: 20px;
                            font-weight: bold;
                        }
                        @media (max-width: 600px) {
                            .container {
                                width: 100%;
                                padding: 10px;
                            }
                            table, th, td {
                                width: 100%;
                                display: block;
                            }
                            th, td {
                                box-sizing: border-box;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class='container'>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan='2' class='header-title'>New Query Submitted From $site_name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>$name</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>$phone</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>$email</td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>$subject</td>
                                </tr>
                                <tr>
                                    <th>Message</th>
                                    <td>$message</td>
                                </tr>
                                <tr>
                                    <th>Query DateTime</th>
                                    <td>$currentTime</td>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <td>Contact Page</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class='footer'>
                            <p>&copy; $site_name</p>
                        </div>
                    </div>
                </body>
                </html>";
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: $email" . "\r\n";
                
                if (mail($to, $subjects, $emailMessage, $headers)) {
                    echo "<script>
                    window.alert('Successfully Sent! We will contact you soon');
                    window.location.href = '$wspath' + 'contact.html';
                    </script>";
                } else {
                    echo "<script>
                    window.alert('Error sending email');
                    window.location.href = '$wspath' + 'contact.html';
                    </script>";
                }
            } else {
                $errors[] = "Error in processing your request. Please try again later.";
            }
        } else {
            $errors[] = "Error in preparing the statement.";
        }
    } else {
        $errorMessage = "";
        foreach ($errors as $error) {
            $errorMessage .= addslashes($error) . "\\n";
        }
        echo "<script>
            window.history.back();
            setTimeout(function() {
                alert('$errorMessage');
            }, 100);
        </script>";
    }
        }
    }
?>