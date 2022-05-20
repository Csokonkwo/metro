<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Convenience";

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include(ROOT_PATH . "/includes/head.php"); ?>
<link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
    
    <main>
        <div class="hero">
        
        </div>
        
        <div class="personal">
            <div class="wrapper">
                <div class="left">
                    <h2>Convenience Services</h2>
                    <p>
                        Bristle City & Trust Company offers several convenience services to give you secure real-time access to all of 

                        your Bristle City Bank accounts via the internet. At any time of the day or night you can check your balances, transfer funds, monitor accounts for unauthorized activity and much more.
                    <br> <br>
                        eStatements are easy, convenient and safer than mail. They're fast - just click and view. They're simple - no paper clutter. <br> They are also secure, making your chances of ID theft even less likely. e-Statements are available to all <?php echo $companyRealName ?> customers free of charge.
                    </p>
                </div>
                <div class="right">
                    <h2>Services</h2>
                    <p>
                        <li>Apple Pay</li>
                        <li>Samsung Pay</li>
                        <li>Andriod pay</li>
                    </p>
                </div>
            </div>
            
            <div class="below">
            
                <a> Apple Pay</a>
                <div>With Apple Pay, you can simplify the way you shop by adding your <?php echo $companyRealName ?> Check Card(s) to the Wallet app on your iPhone® 6 (or higher version). Then, you can easily check out at many of your favorite retailers with just the touch of your finger. You must be a customer in order to sign up for Apple Pay. If you are not a current customer, Sign up
                </div>
                
                
                <a> Samsung Pay</a>
                <div>With Samsung Pay, you can simplify the way you shop by adding your <?php echo $companyRealName ?> Check Card(s) to the Wallet app on your mobile device. Then, you can easily check out at many of your favorite retailers with just the touch of your finger. You must be a customer in order to sign up for Samsung Pay.   
                
                    
                </div>
                
                
                <a> Andriod Pay</a>
                <div>With Android Pay, you can simplify the way you shop by adding your <?php echo $companyName; ?> Check Card(s) to the Wallet app on your mobile device. Then, you can easily check out at many of your favorite retailers with just the touch of your finger. You must be a customer in order to sign up for Android Pay. If you are not a current customer, please sign up. 
                    
                </div>


            </div>
        
        </div>
        
    
    </main>
    
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>