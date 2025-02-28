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
    <title>document</title>
 
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <link href="cssold/style.css" rel="stylesheet">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="stylesheet" href="assets copy/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="styleaf.css" />

    <link rel="stylesheet" href="cssold/creative-design.css">

</head>
<style>
  #submit1
  {
  border: none;
  border-radius: 10px;
  height: 50px;
  width: 300px;
  background-color: #289df6;
  color: #fff;
  margin: auto;
  /* display: block; */
  outline: none;
  cursor: pointer;
  margin-top:5px;
  font-size:25px;
}
</style>
<body>
    <div class="menu-bar">
        <h1 class="logo" style="font-size: 30px;">Wel-come <span><?php echo htmlentities($_SESSION['username']);?> </span> </h1>
        <ul>
         
    
    
          <li><a href="home.php">Home</a></li>
          <li><a href="bmi.php">BMI </a></li>
    <style>
    .dropdown {
    position: relative;
    display: inline-block;
    }

    .dropdown-content {
    display: none;
    position: absolute;
    background-color:  var(--color-black);
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
    }

    .dropdown:hover .dropdown-content {
    display: block;
    }
    </style>
          <li><a href="#">   
          <div class="dropdown">
  <span>Select Language</span>
  <div class="dropdown-content">
  <p><div id="google_translate_element"></div>

    <script type="text/javascript">
    function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></p>
      </div>
    </div></a></li>
         

          <li><a href="profile.php">Profile</a></li>
    
          <li><a href="logout-user.php">Logout</a></li>
    
        </ul>
      </div>
    <section>
       
        <div class="container">
        
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6">
                    <div class="img-wrapper">
                       
                        <img src="img/bmi2.jpg" class="w-100" alt="About Us">
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- <h6 class="title mb-3">Body Mass Index (BMI)</h6> -->
                    <h2 class="title mb-3">Body Mass Index (BMI)</h2>
                    
                    <p style="text-align:justify; font-size:18px;">Body mass index (BMI) is a measure of your weight relative to your height and functions as a rough estimate of body fat. </p>
                    <p style="text-align:justify; font-size:18px;">When you enter your height and weight into a BMI calculator, you’ll get a number. That number is one way to gauge if you have a healthy or unhealthy weight.</p>
                    <p style="text-align:justify; font-size:18px;">When you enter your height and weight into a BMI calculator, you’ll get a number. That number is one way to gauge if you have a healthy or unhealthy weight.</p>

                </div>
            </div>
            <!-- <ul>
                <li><p>The BMI calculator for children and teenagers is different than the one for adults. While it uses height and weight, it also uses age and gender.</p></li>
                <li><p>That’s because male and female height and weight change during growth and development. For children, BMI is expressed as a percentile as compared to other children of the same age and gender.</p></li>

            </ul> -->
            <br><br>
                    <div class="row justify-content-between align-items-center">
               
                <div class="col-md-5">
                    <!-- <h6 class="title mb-3">Body Mass Index (BMI)</h6> -->
                 
                    
                    <div class="info">
                <ul style="text-align:justify; font-size:22px;">
                <h1>BMI Chart </h1>
                    <li><b>BMI </b> : <b>Weight Status</b></li>
                    <li>Below 18.5	: <b><i>Underweight</i></b></li>
                    <li>18.5 – 24.9 :	<b><i>Normal or Healthy Weight</i></b></li>
                    <li>25.0 – 29.9	: <b><i>Overweight</i></b></li>
                    <li> 30.0 - 34.9 :<b><i>Obese</i></b></li>
                    <li> 35 and above:	<b><i>Extremely Obese</i></b></li>

                </ul>
            </div>
                </div>
                <div class="col-md-6">
                    <div class="img-wrapper">
                       
                        <img src="img/bmi.jpg" class="w-100" alt="About Us">
                    </div>
                </div>
            </div>
            
            <a href="bmi.php"><button type="button" id="submit1">Let's Calculate Your BMI</button></a>
        </div>  
    </section>

   
</body>
</html>