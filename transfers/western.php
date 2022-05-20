<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Western Union";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/main.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>

        <div class="serve transfer">
            <div class="container">
                <div class="left">
                    <h1>Western Union</h1>
                    <p>
                        <br>
                    Do you know you can receive or send money directly from your account abroad with our western union money transfer? Yes, you can! Take the advantage now!
                </div>
                
                <div class="right" style="background-image: url(../img/transfers/western.jpg)"></div>
                
            </div>
        </div>
        
        
        <div class="personal">
            
            <div class="below">
                
                <h4>Product Information</h4>

                <a> Description</a>
                <div> 
                
                    <li>When it comes to Sending or Receiving money to and from abroad, there is no better way than Our Western Union Money Transfer Services. With over 8years partnership with Western Union, our wealth of experience in pioneering remittance payout gives us the edge in the market. We are open all through the week in our over 150 locations spread across the country and on weekends at designated locations to meet your demands. So, think <?php echo $companyRealName; ?> when next you want to receive or send money through Western Union money transfer. </li>
                
                </div>

                <a> Features</a>
                <div> 
                    <li>Safe.</li>
                    <li>Fast.</li>
                    <li>Reliable.</li>
                    <li>Convenient.</li>
                </div>

                <a> Benefits</a>
                <div> 
                    <li>You can send or receive your remittances from any of our branches in Europe.</li>
                    <li>Customers can pick or send their transfers from Mondays through Fridays nationwide and from selected locations on weekends and public holidays.</li>
                    <li>Transfer is available to receiver immediately the sender concludes the transaction.</li>
                    <li>Receiver does not pay any fee.</li>
                </div>

                <a> Required Documents</a>
                <div> Any of the following documents are valid means of identification
                    <li>International Passport.</li>
                    <li>Driver’s License.</li>
                    <li>National Identity Card.</li>
                </div>
                
                <a> Payments Requirements (Receiving)</a>
                <div> 
                    <li>The Money Transfer Control Number (MTCN).</li>
                    <li>Expected Amount.</li>
                    <li>Acceptable means of identification (see Required documents).</li>
                    <li>The receiver’s name, address and phone numbers.</li>
                    <li>Sender’s name and country (city to be included for transfers coming from the US and Mexico).</li>
                    <li>Test Question and Answer where applicable.</li>
                </div>

                <a>Payment Requirements (Sending)</a>
                <div> 
                    <li>Sender’s name, Phone number, address.</li>
                    <li>The receiver’s name and country.</li>
                    <li>Amount.</li>
                    <li>Acceptable means of identification (see Required Documents).</li>
                    <li>Sender must have a <?php echo $companyRealName; ?> account or be identified by an account holder.</li>
                    <li>Test Question and Answer where applicable.</li>
                    <li>A maximum send limit of 30,000USD equivalent per customer per quarter.</li>
                </div>

                <a> Who can apply?</a>
                <div> 
                    <li>This service is available to anyone who is 18yrs and above.</li>
                </div>

            </div>
        
        </div>
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>