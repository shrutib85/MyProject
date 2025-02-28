<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login-user.php');
}
else{
	if (isset($_GET['id'])) {

		mysqli_query($con,"delete from orders  where userId='".$_SESSION['id']."' and paymentMethod is null and id='".$_GET['id']."' ");
		;

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="styleaf.css" />
</head>
<style>
    body{
        display: grid;
        place-items: center;
        width: 100%;
        height: 100vh;
        background-color: #174b72;
    }
    *{
        box-sizing: border-box;
    }
    .container{
        border-radius: 5px;
        background-color: #aea5d1;
        padding: 20px;
        height: 650px;
        width: 500px;
    }
    input[type=text],textarea{
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=email],textarea{
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    input[type=button]{
        background-color: #124930;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=button]:hover{
        background-color: #45a049;
    }
</style>
<script>
    function validateForm() {
      var x = document.forms["myForm"]["fname"].value;
      if (x == "" || x == null) {
        alert("Name must be filled out");
        return false;
      }
    }
    </script>
<body>
  <div class="menu-bar">
    <h1 class="logo" style="font-size: 30px;">Wellcome <span><?php echo $fetch_info['name']  ?> </span> </h1>
    <ul>
     


      <li><a href="home.php">Home</a></li>
      <li><a href="bmi.php">BMI </a></li>

      <li><a href="profile.php">Profile</a></li>

      <li><a href="logout-user.php">Logout</a></li>

    </ul>
  </div>

    &nbsp;
  </div>
  
    <div class="container">
        <!-- <form action="" onsubmit="return validateForm()"> -->
            <form name="myForm" action="/action_page.php" onsubmit="return validateForm()" method="post" required>
            <label for="Name">Name</label>
            <input type="text" id="Name" name="fname" placeholder="Enter Your Name.." required>

            <label for="Email">Email</label>
            <input type="email" id="Email" name="email" placeholder="Enter Your Email.." onclick="ValidateEmail(document.form1.text1)" required>

            <label for="Contact">Contact Number</label>
            <input type="text" id="Contact" name="contact" placeholder="Enter Your Contact Number.." required>

            <label for="Subject">Subject</label>
            <input type="text" id="Subject" name="subjects" placeholder="Enter Your Subject.." required>

            <label for="message">Message</label>
            <textarea name="" id="message" name="message" placeholder="Enter Your Message.."style="height: 200px;" required></textarea>

            <input type="button" value="Send" onclick="Send()">

        </form>
    </div>

    <script src="https://smtpjs.com/v3/smtp.js">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>

        function Send(){

      var x = document.forms["myForm"]["fname"].value;
      if (x == "" || x == null) {
        alert("Name must be filled out");
        return false;
      }

   
      // if(!isNaN(x))
      // {
      //   alert("Name must not be numeric value");
      //   return false;
      // }
      var x = document.forms["myForm"]["email"].value;
      if (x == "" || x == null) {
        alert("Email must be filled out");
        return false;
      }
      


 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.email.value))
  {
    // return (true)
  }
  else{
    alert("You have entered an invalid email address!")
    return (false)
        }


      var x = document.forms["myForm"]["contact"].value;
      if (x == "" || x == null) {
        alert("CONTACT must be filled out");
        return false;
      }
      if(isNaN(x)){
        alert("Enter Only numeric value in CONTACT  field");
        return false;
      }
      if(x.length<10 ){
        alert(" CONTACT Number Must be 10 digit");
        return false;
      }
      var x = document.forms["myForm"]["subjects"].value;
      if (x == "" || x == null) {
        alert("Subjects must be filled out");
        return false;
      }
      var x = document.forms["myForm"]["message"].value;
      if (x == "" || x == null) {
        alert("Message must be filled out");
        return false;
      }
    
    
    

            var name = document.getElementById("Name").value;
            var email = document.getElementById("Email").value;
            var contact = document.getElementById("Contact").value;
            var sub = document.getElementById("Subject").value;
            var mess = document.getElementById("message").value;

            var body="Name : " + name +"<br/> Email: " + email + "<br/> Contact Number: " + contact + "<br/> Message : " + mess;
            
            console.log(body);

            Email.send({
            SecureToken :"7e8e433f-432b-41c8-a4df-5f76ff3aeafc",
            
            To : 'thewareshital@gmail.com',
            From : "thewareshital@gmail.com",
           


            Subject : sub,
            Body : body
            }).then(
               message =>{
                  if(message=="OK"){
                    swal("Successfull", "Your Data Successfull Received", "success");
                  }
                  else{
                    swal("Something Wrong", "Your Data is not Received", "error");
                  }
                }
            );
        }

    </script>
</body>
</html>