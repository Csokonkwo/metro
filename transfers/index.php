<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Transfers";

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
                    <h1>Money Transfer</h1>
                    <p>
                    Home and abroad, share love through Western Union, MoneyGram, Ria. <br> <br> Our variety of products are guaranteed to make sending or receiving money from abroad easy, fast, safe and reliable. Explore our services for seamless international money transfers.</p>
                    <a href="">Login Now</a>
                </div>
                
                <div class="right"></div>
                
            </div>
        </div>
        
        
        <div class="service">
            <div class="container">
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/transfers/western.jpg' ?>">
                    <a href="<?php echo BASE_URL . '/transfers/western.php' ?>">Western Union</a>
                </div>
                
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/transfers/moneygram.jpg' ?>">
                    <a href="<?php echo BASE_URL . '/transfers/moneygram.php' ?>">Moneygram</a>
                </div>
                
                <div class="box">
                    <img src="<?php echo BASE_URL . '/img/transfers/ria.jpg' ?>">
                    <a href="<?php echo BASE_URL . '/transfers/ria.php' ?>">Ria Money Transfer</a>
                </div>
            </div>
        
        </div>
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>