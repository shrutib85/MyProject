<?php 
session_start();
require "connection.php";

include('includes/config.php');

$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $contactno = mysqli_real_escape_string($con, $_POST['contactno']);

    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    
    // $password = 'user-input-pass';

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

   
  
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // $emailErr = "Invalid email format";
        $errors['email'] = "Invalid email format !";

      }
    elseif(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }

    if(preg_match('/^\d{10}$/',$contactno)) // phone number is valid
    {
      $contactno = '0' . $contactno;

      // your other code here
    }
    else // phone number is not valid
    {
        $errors['email'] = "Invalid Phone Number !";
    }

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $errors['password'] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
        // echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    if(count($errors) === 0){
        // $encpass = password_hash($password, PASSWORD_BCRYPT);
        $encpass=md5($password);

        // $encpass1 = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $code1 = rand(999999, 111111);
        $status1 = "notverified";
        // include('includes/config.php');

        // $insert_data = "INSERT INTO users (name, email, contactno, password)
        // values('$name', '$email','$contactno', '$encpass')";

// require "connection.php";

        // $insert_user= "INSERT INTO users (name, email, contactno, password)
        // values('$name', '$email','$contactno', '$encpass')";

        $insert_data = "INSERT INTO users (name, email,contactno, password, code, status)
                        values('$name', '$email','$contactno', '$encpass', '$code', '$status')";

    // $new_rough= "INSERT INTO users (name, email, password, code, status)
    //                     values('$name', '$email', '$encpass', '$code', '$status')";

// $sql = "INSERT INTO table1 (column1, column2) VALUES ('$value1', '$value2');
//         INSERT INTO table2 (column1, column2) VALUES ('$value3', '$value4');
//         INSERT INTO table3 (column1, column2) VALUES ('$value5', '$value6')";


       
        // $query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");

        $data_check = mysqli_query($con, $insert_data);
        // $data_check2 = mysqli_query($con, $new_rough);

        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: thewareshital@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }
   
    
      // Code for User login
      if(isset($_POST['login']))
      {
         $email=$_POST['email'];
         $password=md5($_POST['password']);
      $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email' and password='$password'");
      $num=mysqli_fetch_array($query);
      if($num>0)
      {
      $extra="home.php";
      $_SESSION['login']=$_POST['email'];
      $_SESSION['id']=$num['id'];
      $_SESSION['username']=$num['name'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=1;
      $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('".$_SESSION['login']."','$uip','$status')");
      $host=$_SERVER['HTTP_HOST'];
      $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      header("location:http://$host$uri/$extra");
      exit();
      }
      else
      {
      $extra="login-user.php";
      $email=$_POST['email'];
      $uip=$_SERVER['REMOTE_ADDR'];
      $status=0;
      $log=mysqli_query($con,"insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
      $host  = $_SERVER['HTTP_HOST'];
      $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      header("location:http://$host$uri/$extra");
      $_SESSION['errmsg']="Invalid email id or Password";
      // echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
      // alert("Welcome to Geeks for Geeks");
      // $errors['email'] = "Incorrect email or password!";
      
      exit();
      }
      }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');




                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

  


    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(9999, 11111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: thewareshital@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

   
    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            // $encpass = password_hash($password, PASSWORD_BCRYPT);
            $encpass=md5($password);

            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }


  
?>
