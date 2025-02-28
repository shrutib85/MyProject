
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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="styleaf.css" />
    <title>Welcome to Ayurveda</title>
    <link rel="stylesheet" href="cssold/creative-design.css">
    <link href="cssold/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <link rel="stylesheet" href="assets copy/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="styleaf.css" />
    <link rel="stylesheet" href="cssold/lstyle.css">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
  </head>
  <style>
    * {box-sizing: border-box;}
    body {font-family: Verdana, sans-serif;}
    .mySlides {display: none;
    }
  
    img 
    {
    vertical-align: middle;
    width: 800px;
    height: 700px;
    }
    
    /* Slideshow container */
    .slideshow-container {
      max-width: 1500px;
      position: relative;
      margin: auto;
      
    }
    
    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }
    
    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }
    
    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }
    .text{
      text-align: center;
      font-size: 65px;
      color:white;
      padding-bottom: 300px;
    }
    .t{
      text-align: center;
      font-size: 45px;
      color:white;
      padding-bottom: 300px;
    }
    .active {
      background-color: #717171;
    }
    
    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 5s;
    }
    
    @keyframes fade {
      from {opacity: .4} 
      to {opacity: 1}
    }
    
    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {font-size: 11px}
    }
    </style>
  <style>
    body{
        background-color: rgb(25, 3, 83);;
    }
  </style>
  <style>
.dropbtn {
  background-color:  #141d28;
  color: white;
  padding: 14px;
  font-size: 19px;
  border: none;
  cursor: pointer;
  
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:  #141d28;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-size:18px;
}

.dropdown-content a:hover {color:orange;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
color:orange;
}
</style>
  <body style="background: #06065f;">
    <div class="menu-bar">
      <h1 class="logo">Wel-come <span><?php echo htmlentities($_SESSION['username']);?></span> </h1>
      <ul>

        <li><a href="home.php">Home</a></li>
        <li><a href="#xyz">About </a></li>
        <li><a href="index.php">Product </a></li>


        <div class="dropdown">
          <button class="dropbtn">Health</button>
          <div class="dropdown-content">
          <a href="dherb.php">Herbs </a>
          <a href="dspice.php">Spices </a>
          <a href="dservices.php">Diseases</a> 
          <a href="dfood.php">Diet & Food</a> 

                  </div>
        </div>
        <!-- <li><a href="dherb.php">Herbs </a>

        </li>
        <li><a href="dspice.php">Spices </a>

        </li>
       
        <li><a href="dservices.php">Diseases</a> -->
        </li>
        </li>
        <li><a href="bmi2.php">BMI </a></li>
        
        <li><a href="profile.php">Profile</a></li>
        <li><a href="contact copy.php">Contact</a></li>

        <li><a href="logout-user.php">Logout</a></li>

      </ul>
    </div>


    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="img/a.jpg" style="width:100%">
        <div class="text">वायु पिततं कफशचेति त्रयो दोषा: समास्त: ॥<br>विकृता विकृतादेहं घ्नन्ति ते वर्त्तयन्ति चा ।</div>
        <div style="text-align:center ">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span> </div>
      </div>
      
      <div class="mySlides fade">
        <img src="img/b.jpg" style="width:100%">
        <div class="text">आयु: कामायमानेन धर्मार्थ सुखसाधनम।<br>आयुर्वेदोपदेशेषु विधेय: परमादर: ॥</div>
        <div style="text-align:center" >
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span> </div>
        
      </div>
      
      <div class="mySlides fade">
        <img src="img/d.jpg" style="width:100%">
        <div class="text">शरीरेन्द्रिय्सत्त्वात्म्संयोगो धारि जीवितम् ।<br>नित्यगश्र्चानुबन्धश्र्च पर्यायौरायुरुच्यते ॥</div>
        <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span> </div>
      </div>
      
      </div>
      <br>
      <section style=" padding-left:2cm; padding-right:2cm; padding-top:-3cm;">
      <div style="text-align:center">
        <span class="t">We don’t just Suppress symptoms, <br>We eliminate the root cause to transform your health!</span>
        </div>  
        <br><br> 
        <h3 style="text-align: center; color:orange" id="xyz">3 powerful steps to long lasting health</h3>    
        <br> 
       
      
           <div class="row justify-content-between align-items-center" >
               <div class="col-md-6" >
                   <div class="img-wrapper">
                      
                       <img src="img/3R.jpg" class="w-100" alt="About Us" style="height:14cm">
                   </div>
               </div>
               <div class="col-md-5" >
                   <!-- <h6 class="title mb-3">Body Mass Index (BMI)</h6> -->
                   <h2 class="title mb-3" style="color:orange">Step 1: REMOVE</h2>
                   <p style="text-align:justify; font-size:18px; color:white">Eliminate blockages, inflammation and remove toxins from the gut and intracellular cells through the right type of detox.</p>
                   <h2 class="title mb-3" style="color:orange">Step 2: RESTORE</h2>
                   <p style="text-align:justify; font-size:18px; color:white">Repair & restore the normal functioning of all the organs and especially the ones that are affected by the illness through the usage of powerful home remedies, diet.</p>
                   <h2 class="title mb-3" style="color:orange">Step 3: RENEW</h2>
                   <p style="text-align:justify; font-size:18px; color:white">Rebuild & renew in step by step manner using herbal formulas and therapies on damaged or weak tissues, thus long-lasting relief from chronic health problems.</p>

               </div>

           
         </section>
         <div style="text-align:center">
        <span class="t">Life is too precious to suffer,<br> feeling helpless is no fun, <br>you deserve to have vibrant health!!!</span>
        </div>  
        <br><br> 
         
        
    <div class="container" style="background-color:#06065f;">

<h1 class="heading" style="color:orange">BLOG</h1>

<div class="box-container">

    <div class="box">
        <img src="img/np.jpg" alt="" style="height:6cm; width:5cm;">
        <h3 >5 Simple Exercises for quick relief from neck pain</h3>
        <p>Neck pain is a common complaint that affects many people due to various reasons, such as poor posture, stress, muscle strain, or even underlying health conditions... </p>
        <a href="#" style="color:orange;">continue reading...</a>
    </div>

    <div class="box">
        <img src="img/lowbp.jpg" alt="" style="height:6cm; width:5cm;">
        <h3 >How to Control Your Low Blood Pressure Naturally?</h3>
         <p>Low blood pressure, also known as hypotension, is a condition characterized by a person’s blood pressure falling below the normal range. Blood pressure is measured using two numbers:... </p>
        <a href="#" style="color:orange;">continue reading...</a>
    </div>

    <div class="box">
        <img src="img/aa.jpg" alt="" style="height:6cm; width:5cm;">
        <h3>Fight Alcohol Addiction with Ayurvedic Approach</h3>
        <p>Excessive alcohol consumption can have devastating consequences for your health and well-being. What may start as a harmless way to unwind or have fun ...</p>
        <a href="#" style="color:orange;">continue reading...</a>
    </div>
  </div>
  </div>


      <script>
        let slideIndex = 0;
        showSlides();
        
        function showSlides() {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
          }
          slideIndex++;
          if (slideIndex > slides.length) {slideIndex = 1}    
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";  
          dots[slideIndex-1].className += " active";
          setTimeout(showSlides, 5000); // Change image every 2 seconds
        }
        </script>

  

  </body>
</html>