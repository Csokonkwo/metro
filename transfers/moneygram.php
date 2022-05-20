<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "MoneyGram";

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
                    <h1>Moneygram</h1>
                    <p>
                        <br>
                    With Our Moneygram Services you are assured of receiving your money from Monday through Friday nationwide and from selected locations on weekends.
                    </div>
                
                <div class="right" style="background-image: url(../img/transfers/moneygram.jpg)"></div>
                
            </div>
        </div>
        
        
        <div class="personal">
            
            <div class="below">
                
                <h4>Product Information</h4>

                <a> Description</a>
                <div> 
                
                    <li>With Our MoneyGram services, you are assured of receiving your money from Monday through Friday nationwide and from selected locations on weekends. </li>
                
                </div>

                <a> Features</a>
                <div> 
                    <li>Fast: Transfer is completed in minutes.</li>
                    <li>Reliable: Recipient is assured of getting funds .</li>
                    <li>Convenient: Money pick-up at any of our branch.</li>
                    <li>Beneficiary pays no charges.</li>
                    <li>Direct to account deposit is available for Inbound transfers and Direct to account for Outbound transfers is available in selected corridors.</li>
                    <li>Convenient.</li>
                </div>

                <a> Benefits</a>
                <div> 
                    <li>Provides affordable, convenient, reliable means of transferring money to loved ones around the globe.</li>
                    <li>Expected Amount will be received in full.</li>
                </div>

                <a> Required Documents</a>
                <div> Any of the following documents are valid means of identification
                    <li>International Passport.</li>
                    <li>Driver’s License.</li>
                    <li>National Identity Card.</li>
                </div>
                
                <a> Payments Requirements (Receiving)</a>
                <div> 
                Beneficiaries can receive transferred money at any of our outlets by providing the following:
                    <li>Transfer Reference Number.</li>
                    <li>Expected Amount.</li>
                    <li>Acceptable means of identification (see Required documents).</li>
                    <li>Fully completed  form.</li>
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