<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Payments";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/main.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
        
        <div class="serve transfer">
            <div class="container">
                <div class="left">
                    <h1>Payments</h1>
                    <p>
                    Take advantage of our digital payment solutions designed to help organisations and businesses manage easy payments
                    <br> <br> <a href="">Login Now</a>
                </div>
                
                <div style="background-image: url(img/payments/payments.jpg)" class="right"></div>
                
            </div>
        </div>
        
        
        <div class="service">
            <div class="container">
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/payments/bills.jpg' ?>">
                    <a href="">Bills & Utilities</a>
                </div>
                
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/payments/trade.jpg' ?>">
                    <a href="">Trade </a>
                </div>
                
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/payments/tax.jpg' ?>">
                    <a href="">Taxes & Duties</a>
                </div>
            </div>

            <div class="container">
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/payments/school.jpg' ?>">
                    <a href="">School Solutions</a>
                </div>
                
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/payments/collections.jpg' ?>">
                    <a href="">Collections</a>
                </div>
            </div>
        
        </div>
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>