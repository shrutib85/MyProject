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
    <title>BMI Calculator</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <link rel="stylesheet" href="bmi.css">

    <script src="bmi.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="styleaf.css" />

  <style>
        * {
  font-family: Quicksand;
  font-size: 16px;
  color: #0a0101;
}

body {
  margin: 0;
  height: 100vh;
  padding: 0;
  border: 0;
  background: linear-gradient(to bottom right,  #02074d, #03135a);
}

.form {
  background-color: #fff;
  height: 240px;
  width: 450px;
  border-radius: 20px;
  margin: 20px auto 20px auto;
  display: block;
  border: solid 1px #ebeff3;
  
  box-shadow: 0 0 40px 0 #ddd;
}

.form:hover {
  box-shadow: 0 0 60px 0 #ccc;
  transition: .4s;
  transform: scale(1.02);
}

.row-one {
  padding: 20px;
}

.row-two {
  padding: 20px;
}

.text-input {
  width: 60px;
  height: 30px;
  border-radius: 10px;
  background-color: #f5fafd;
  border: none;
  outline: none;
  padding: 5px 10px;
  cursor: pointer;
}

.text-input:last-child {
  margin-bottom: 35px;
}

.text-input:hover {
  background-color: #cbe7fd;
}

#submit {
  border: none;
  border-radius: 10px;
  height: 40px;
  width: 140px;
  background-color: #289df6;
  color: #fff;
  margin: auto;
  display: block;
  outline: none;
  cursor: pointer;
}

#submit:hover{
  background-color: #0a8ef2;
}

.text {
  display: inline-block;
  margin: 5px 20px 5px 8px;;

}

.row-one {
  padding: 30px 20px 15px 20px;
}
.row-two {
  padding: 15px 20px 30px 20px;
}

.container {
  display: inline-block;
  position: relative;
  padding-left: 30px;
  cursor: pointer;
  user-select: none;
}

.container input {
  position: absolute;
  opacity: 0;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #dbeffe;
  border-radius: 50%;
}

.container:hover input ~ .checkmark {
  background-color: #cbe7fd;
}

.container input:checked ~ .checkmark {
  background-color: #154064;
}

h1 {
  font-size: 30px;
  font-weight: 300;
  text-align: center;
  color:yellow;
  padding-top: 15px;
  display: block;
}

h2 {
  font-size: 22px;
  font-weight: 300;
  text-align: center;
  color:yellow;
}

h3 {
  font-size: 24px;
  font-weight: 300;
  text-align: center;
  padding: 15px;
  color:yellow;
}

h3 b {
  font-size: 32px;
  font-weight: 300;
  color: #043052;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.container input:checked ~ .checkmark:after {
  display: block;
}

.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
}
#refresh{
  border: none;
  border-radius: 10px;
  height: 40px;
  width: 140px;
  background-color: #289df6;
  color: #fff;
  margin: auto;
  display: block;
  outline: none;
  cursor: pointer;
  margin-top:5px;
}
    </style>
</head>
<body>
  
  <div class="menu-bar">
    <h1 class="logo" style="font-size: 30px;">Wel-come <span><?php echo htmlentities($_SESSION['username']);?> </span> </h1>
    <ul>
     <li><a href="bmi2.php"><br>BMI</a></li> 
     
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
      <a href="#" style="float:right; padding:20px; "> 
    <p ><div id="google_translate_element"></div>
  
      <script type="text/javascript">
      function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
      }
      </script>
  
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script></p>
        </div>
      </a>
      
    </ul>
  </div>

    &nbsp;
  </div>
  
 

        <h3 style="color: white;"><b style="color: yellow;">B</b>ody <b style="color: yellow;">M</b>ass <b style="color: yellow;">I</b>ndex Calculator</h3>
      <form class="form" id="form" onsubmit="return validateForm()">
      <div class="row-one">
        <input type="text" class="text-input" id="age" autocomplete="off" required/><p class="text">Age</p>
        <label class="container">
        <input type="radio" name="radio" id="f"><p class="text">Female</p>
          <span class="checkmark"></span>
        </label>
        <label class="container">
        <input type="radio" name="radio" id="m"><p class="text">Male</p>
          <span class="checkmark"></span>
        </label>
        </div>
      
      <div class="row-two">
        <input type="text" class="text-input" id="height" autocomplete="off" required><p class="text">Height (cm)</p>
        <input type="text" class="text-input" id="weight" autocomplete="off" required><p class="text">Weight (kg)</p>
      </div>
      <button type="button" id="submit">Submit</button>
      <button id="refresh" onClick="window.location.reload();">Calculate again</button>
      </form>
     

      <script>
    var age = document.getElementById("age");
    var height = document.getElementById("height");
    var weight = document.getElementById("weight");
    var male = document.getElementById("m");
    var female = document.getElementById("f");
    var form = document.getElementById("form");

function validateForm(){
  if(age.value=='' || height.value=='' || weight.value=='' || (male.checked==false && female.checked==false)){
    alert("All fields are required!");
    document.getElementById("submit").removeEventListener("click", countBmi);
  }else{
    countBmi();
  }
}
document.getElementById("submit").addEventListener("click", validateForm);

function countBmi(){
  var p = [age.value, height.value, weight.value];
  if(male.checked){
    p.push("male");
  }else if(female.checked){
    p.push("female");
  }
  form.reset();
  var bmi = Number(p[2])/(Number(p[1])/100*Number(p[1])/100);
      
  var result = '';
  if(bmi<18.5){
    result = 'Underweight';
     }else if(18.5<=bmi&&bmi<=24.9){
    result = 'Healthy';
     }else if(25<=bmi&&bmi<=29.9){
    result = 'Overweight';
     }else if(30<=bmi&&bmi<=34.9){
    result = 'Obese';
     }else if(35<=bmi){
    result = 'Extremely obese';
     }
  
  var h1 = document.createElement("h1");
  var h2 = document.createElement("h2");

  var t = document.createTextNode(result);
  var b = document.createTextNode('BMI : ');
  var r = document.createTextNode(parseFloat(bmi).toFixed(2));
  
  h1.appendChild(t);
  h2.appendChild(b);
  h2.appendChild(r);
  
  document.body.appendChild(h1);
  document.body.appendChild(h2);
  document.getElementById("submit").removeEventListener("click", countBmi);
  document.getElementById("submit").removeEventListener("click", validateForm);
}
document.getElementById("submit").addEventListener("click", countBmi);
      </script>
 
</body>
</html>