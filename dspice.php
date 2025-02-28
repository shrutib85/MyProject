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
        <h1 class="logo" style="font-size: 30px;">Wel-come <span style="color:orange;">-<?php echo htmlentities($_SESSION['username']);?> </span> </h1>
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

    <h1 class="heading">About Some Spices</h1>

    <div class="box-container">

        <div class="box">
            <img src="img/t1.jpg" alt="">
            <h3>Turmeric</h3>
            <p>Turmeric, a plant in the ginger family, is native to Southeast Asia and is grown commercially in that region, primarily in India. </p>
            <a href="turmeric.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/cu1.jpg" alt="">
            <h3>Cumin</h3>
            <p>Cumin is extensively found in Asia, Europe, and Africa, and it is extracted from the Cuminum cyminum plant.</p>
            <a href="Cumin.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/hing1.jpg" alt="">
            <h3>Hing</h3>
            <p>>Hing (asafoetida) is used as a flavouring agent in food and as a traditional remedy for a variety of ailments.</p>
            <a href="hing.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/gin1.jpg" alt="">
            <h3>Ginger</h3>
            <p>>Ginger, (Zingiber officinale), herbaceous perennial plant of the family Zingiberaceae </p>
            <a href="ginger.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/vi1.jpg" alt="">
            <h3>Cardamom</h3>
            <p>Cardamom is a spice belonging to the Zingiberaceae family that is widely found in South India and Indonesia.</p>
            <a href="cardamom.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/cin1.jpg" alt="">
            <h3>Cinnamon</h3>
            <p>Cinnamon or Cinnamomum Zeylanicum is also popularly known as ‘Dalchini’ in Hindi. </p>
            <a href="cinnamon.html" class="btn">read more</a>
        </div>

        

    </div>

</div>

</body>
</html>