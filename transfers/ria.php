<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Ria Money Transfer";

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
                    <h1>Ria Money Transfer</h1>
                    <p>
                        <br>
                        With RIA Money Transfer, enjoy the convenience of receiving money from abroad directly to your bank account in your local currency.
                    </div>
                
                <div class="right" style="background-image: url(../img/transfers/ria.jpg)"></div>
                
            </div>
        </div>
        
        
        <div class="personal">
            
            <div class="below">
                
                <h4>Product Information</h4>

                <a> Features</a>
                <div> 
                    <li>Payout in over 750 branches.</li>
                    <li>Cash-to-cash.</li>
                    <li>Cash-to-account.</li>
                    <li>Online transfers for the US corridor only.</li>
                    <li>Outbound services available at selected locations.</li>
                </div>

                <a> Benefits</a>
                <div> 
                    <li>Convenience of direct transfers to recipient’s account.</li>
                    <li>Identification not required for transfers sent directly to recipient’s accounts.</li>
                </div>

                <a> Required Documents</a>
                <div> Any of the following documents are valid means of identification
                    <li>International Passport.</li>
                    <li>Driver’s License.</li>
                    <li>National Identity Card.</li>
                </div>
                
                <a> Payments Requirements (Receiving)</a>
                <div>
                    <li>Sender’s name, Phone number, address.</li>
                    <li>Expected Amount.</li>
                    <li>Acceptable means of identification (see Required documents).</li>
                    <li>The receiver’s name and country.</li>
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
                    <li>A maximum send limit of 10,000USD equivalent per customer per quarter.</li>
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