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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="cssold/lstyle.css">
    <link rel="stylesheet" href="styleaf.css" />

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
</head>
<body>
   
    <div class="menu-bar">
        <h1 class="logo" style="font-size: 30px;">Wel-come <span style="color:orange;"><?php echo htmlentities($_SESSION['username']);?></span> </h1>
        <ul>
         
    
    
          <li><a href="home.php">Home</a></li>
          <div class="dropdown">
            <button class="dropbtn">Health</button>
            <div class="dropdown-content">
            <a href="dherb.php">Herbs </a>
            <a href="dspice.php">Spices </a>
            <a href="dservices.php">Diseases</a> 
            <a href="dfood.html">Diet & Food</a> 
  
                    </div>
          </div>
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
    </div></a>
    
          <li><a href="logout-user.php">Logout</a></li>
    
        </ul>
      </div>
    
      </div>   
<div class="container">

    <h1 class="heading">Diet & Food</h1>

    <div class="box-container">

        <div class="box">
            <img src="img/acidity.jpg" alt="">
            <h3>Acidity</h3>
            <p> Acidity is a common condition that brings burning pain, known as heartburn</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/anxiety.jpg" alt="">
            <h3>Anxiety</h3>
            <p>Managing anxiety, depression or is possible through lifestyle changes.  </p>     
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/allergy,jpg.jpg" alt="">
            <h3>Cold & Allergies</h3>
            <p>Cold and flu are very annoying to deal with especially when you’re working...</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/cons.jpg" alt="">
            <h3>Constipation</h3>
            <p>In Ayurveda, constipation is seen as an imbalance in the Vata dosha, which is responsible for movement and elimination in the body.  </p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/memory.jpg" alt="">
            <h3>Memory</h3>
            <p> Keeping your brain in good health is very important to boost your memory...</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/ha.jpg" alt="">
            <h3>Headache</h3>
            <p>A headache is pain or discomfort in the head or face area.</p>
            <a href="#" class="btn">read more</a>
        </div>

        

    </div>

</div>

</body>
</html>