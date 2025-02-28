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


</head>
<body>
   
    <div class="menu-bar">
        <h1 class="logo" style="font-size: 30px;">Wel-come <span style="color:orange;"><?php echo htmlentities($_SESSION['username']);?></span> </h1>
        <ul>
         
    
    
          <li><a href="home.php">Home</a></li>
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
         
    
          <li><a href="logout-user.php">Logout</a></li>
    
        </ul>
      </div>
    
      </div>   
<div class="container">

    <h1 class="heading">About Some Diseases</h1>

    <div class="box-container">

        <div class="box">
            <img src="img/ac1.jpg" alt="">
            <h3>Acne</h3>
            <p>a common skin condition that happens when hair follicles under the skin become clogged. </p>
            <a href="acne.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/app1.jpg" alt="">
            <h3>Appendicite</h3>
            <p>Appendicitis is an inflammation of the appendix.Appendicitis causes pain in the lower right abdomen.</p>
            <a href="appendicite.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/backkpain1.jpg" alt="">
            <h3>Backpain</h3>
            <p>Back pain is a leading cause of disability.It is diagnosed based on through physical examination.</p>
            <a href="backpain.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/dpree1.jpg" alt="">
            <h3>Depression</h3>
            <p>It is a serious medical illness that affects how you feel,the way you think and how you act. </p>
            <a href="depression.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/db1.jpg" alt="">
            <h3>Diabetes</h3>
            <p>Diabetes is one of the most common health conditions that affects over 10% of the adult population globally.</p>
            <a href="diabeties .html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/fs1.jpg" alt="">
            <h3>Frozen Shoulder</h3>
            <p>It is a condition that causes severe shoulder pain and stiffness making it difficult to move the shoulder.</p>
            <a href="frozenSholder.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/hair1.jpg" alt="">
            <h3>Hairfall</h3>
            <p>Hair loss, also known as alopecia or baldness, refers to a loss of hair from part of the head or body</p>
            <a href="hairfall.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/jp1.jpg" alt="">
            <h3>Jointpain</h3>
            <p>Joint discomfort is common and usually felt in the hands, feet, hips, knees, or spine. the joint can feel stiff, achy, or sore. </p>
            <a href="jointpain.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/kp1.jpg" alt="">
            <h3>Knee</h3>
            <p>Knee pain is a common complaint that affects people of all ages. Knee pain may be the result of an injury</p>
            <a href="knee.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/migrane.jpg" alt="">
            <h3>Migrain</h3>
            <p>A migraine is a headache that can cause severe throbbing pain or a pulsing sensation,on one side of the head. </p>
            <a href="migrane.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/pitta1.jpg" alt="">
            <h3>Pitta Dosha</h3>
            <p>Pitta is the energy that plays a significant role in metabolism and various transformations, including the processing and perception of thoughts on mental and sensory levels. </p>
            <a href="pittadosha.html" class="btn">read more</a>
        </div>
         
        <div class="box">
            <img src="img/mental1.jpg" alt="">
            <h3>Mental</h3>
            <p>Mental health includes our emotional, behavioural and social well-being. To have a good physical health it is very important that one has normal and healthy mind.</p>
            <a href="mental.html" class="btn">read more</a>
        </div>
        
    </div>

</div>

</body>
</html>