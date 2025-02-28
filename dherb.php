<<?php 
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
        <h1 class="logo" style="font-size: 30px;">Wel-come <span style="color:orange;"><?php echo htmlentities($_SESSION['username']);?> </span> </h1>
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
    </div></a>
    
          <li><a href="logout-user.php">Logout</a></li>
    
        </ul>
      </div>
    
      </div>   
<div class="container">

    <h1 class="heading">About Some Herbs</h1>

    <div class="box-container">

        <div class="box">
            <img src="img/al1.jpg" alt="">
            <h3>Aloe-vera</h3>
            <p>Aloe vera is one of the top Ayurvedic plants, well-known among Indian households  </p>
            <a href="aloe-vera.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/neem1.jpg" alt="">
            <h3>Neem</h3>
            <p>The scientific name of the Neem tree is Azadirachta indica.Neem grows widely in tropical countries.</p>
            <a href="neem.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/tul1.jpg" alt="">
            <h3>Tulsi</h3>
            <p>The scientific name of Tulsi is Ocimum tenuiflorum, which belongs to the Lamiaceae family.</p>
            <a href="tulsi.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/br1.jpg" alt="">
            <h3>Brahmi</h3>
            <p>Brahmi or Bacopa monnieri is a creeping herb found in some Asian countries, Africa, Europe, and Australia.  </p>
            <a href="brahmi.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/ash1.jpg" alt="">
            <h3>Ashwagandha</h3>
            <p>The scientific name of Tulsi is Ocimum tenuiflorum, which belongs to the Lamiaceae family.</p>
            <a href="ashwagandha.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/kr1.jpg" alt="">
            <h3>Bitter melon</h3>
            <p>Bitter melon (Momordica charantia) is a tropical vine closely related to zucchini, squash, cucumber, and pumpkin.</p>
            <a href="bitter_melon.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/tp2.jpg" alt="">
            <h3>Triphala</h3>
            <p>Triphala is a combination of three fruits or herbs “Haritaki, Bibhitaki and Amalaki”.</p>
            <a href="triphala.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/gk1.jpg" alt="">
            <h3>Gotu Kola</h3>
            <p>Gotu Kola is the another well-known Ayurvedic herb also known as the ‘herb of longevity’. </p>
            <a href="gotukola.html" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="img/lr2.jpg" alt="">
            <h3>Licorice Root</h3>
            <p> This Ayurvedic plant is enriched with anti-inflammatory, antioxidant,  antibacterial and antacid properties.</p>
            <a href="licorice_root.html" class="btn">read more</a>
        </div>

        

    </div>

</div>

</body>
</html>