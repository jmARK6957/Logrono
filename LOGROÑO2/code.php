<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
  
    function sendemail_verify($name, $email, $verify_token) {

        $mail = new PHPMailer(true);

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->SMTPAuth   = true;  //Enable SMTP authentication

        $mail->Host       = "smtp.gmail.com"; //Set the SMTP server to send through
        $mail->Username   = "logronojohnmark2@gmail.com";  //SMTP username
        $mail->Password   = "qviz lmmc aewa iobs"; //SMTP password

        $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
        $mail->Port       = 465;  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("johnmarklogrono9@gmail.com", $name);
        $mail->addAddress($email);     //Add a recipient
        
        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = "Email verification from John mark";
    
        $email_template = "
                    <h2>You have Registered with Login Form of John Mark.</h2>
                    <h5>Verify your email to Login with the given link below.</h5>
                    <br/><br/>
                    <a href = 'http://localhost/LOGROÑO2/verify-email.php?token=$verify_token'>Click Me?</a>
                ";
        
                $mail ->Body =$email_template;
                $mail->send();
                 echo 'Message has been sent';
        
            }
            if(isset($_POST['register_btn'])) {
        
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $verify_token = md5(rand());
        
        
                //check if the email exist or not.
                $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
                $check_email_query_run = mysqli_query($con, $check_email_query);
        
                if(mysqli_num_rows($check_email_query_run) > 0){
        
                    $_SESSION['status'] = "Email ID already exist";
                    header("Location: register.php");
        
                } else {
        
                    //insert user or register new user.
                    $query = "INSERT INTO users (name, phone, email, password, verify_token) VALUES ('$name', '$phone', '$email', '$password', '$verify_token')";
                    $query_run = mysqli_query($con, $query);
        
                    if($query_run){
                        
                        sendemail_verify("$name", "$email", "$verify_token");
        
                        $_SESSION['status'] = "Registration Successfuly, Verify your email address.";
                        header("Location: register.php");
        
                    } else{
        
                        $_SESSION['status'] = "Registration Failed";
                        header("Location: register.php");
        
                    }
               }
        }    
     }
?>