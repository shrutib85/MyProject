<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <div class= "row" style="padding:100px 300px;">
        <div class="col-50">
        <div class="container">
            <form action="payscript.php" method="post" style="padding: 25px;">
        
            <div class="row">
                <div class="col-25">
                    <h3 style="text-align: centre; margin: 20px 10px;" >Checkout Form</h3>
        
                    <label for="fname"><i class="fa fa-user"></i>Full Name</label>
                    <input type="text" id="fname" name="name" >
                    <label for="email"><i class="fa fa-envelope"></i>E-mail</label>
                    <input type="text" id="email" name="email" >
                    
                    <input type="hidden" value="<?php echo 1;?>" name="amount">
                    <label for="city"><i class="fa fa-mobile"></i>Mobile</label>
                    <input type="text" id="city" name="mobile"  >
                    <label for="adr" ><i class="fa fa-address-card-o"></i>Address</label>
                    <input type="text" id="adr" name="address"  >
                </div>
        
                <input type="submit" value="Pay Now" class="btn">
                </div>
            </form>
            
        </div>
        </div>
        </div>
        
</body>
</html>


