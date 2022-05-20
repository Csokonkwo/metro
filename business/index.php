<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Personal Account";

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
                    <h2>Checking & Savings</h2>
                    <p>
                    We know that successful businesses drive the economic health of the region. <?php echo $companyRealName; ?> believes in your business. We have a variety of business accounts and services tailored to organizations large and small. <br> <br>

                    For over forty years, we have helped businesses in our communities thrive. At <?php echo $companyRealName ?> you enjoy the convenience of working with a local bank who offers all the services that are expected from a larger organization, but with individualized service and support from your local Business Relationship Specialist. 
                    </p>
                </div>
                <div class="right">
                    <h2>Features</h2>
                    <p>
                    Use your Visa Check Card for all of your everyday business purchases. You will earn one point for every two to five dollars spent in eligible check card purchases. Simply link your existing <?php echo $companyName ?> Visa Check Card(s) to begin earning points. 

                    <br> <br> For customer service, Please text us via our online livechat.
                    </p>
                </div>
            </div>
            
            <div class="below">
                
                <h4>Learn more about our Business Banking services below.</h4>

                <a> Business Checking</a>
                <div> 
                
                <span>Features and Benefits</span>
                <li>Open an account with $2000 </li>
                <li>No monthly service charges</li>
                <li>No minimum balance requirements </li>
                <li>Unlimited Transactions</li>
                <li>Free Online/Mobile/Text Banking</li>
                <li>Online Bill Pay available</li>
                <li>Free Business Visa Check Card</li>
                <li>e-Delivery Statements</li>
                <li>Night Depository Services available</li>
                <li>Account Analysis fees may apply</li>
                
                </div>
                
                
                <a> Business Online Bill Pay</a>
                <div>Available to any Business Customer currently enrolled in Online Banking.  
                
                <span>Features</span>
                
                <li>Automatic bill payments. (Bill payments may be scheduled up to a year in advance.) </li>
                <li>Recurring bill payments </li> 
                <li>Currently .49 cents per payment </li>
                <li>Track your payment history to view who you paid, when the payment occurred and the amount of the payment.</li>
                
                <span>Benefits</span>
                
                <li>Avoid late fees. Payments can be set up so that your bills are automatically paid when you want.</li>
                <li>Access your account online—any day, anytime.</li>
                
                </div>
                
                
                <a> Balance Account Analysis</a>
                <div>For businesses with more complex financial needs or high transaction volume. Our Business Account Analysis offers interest credit which may help offset fees. This account also comes with a business ATM card, Online Banking, Bill Pay and e-statements.
                    
                </div>

                <a> Cryptocurrency Deposits</a>

                <div>
                <span>Features</span>
                
                <li>Deposit Cryptocurrency directly from the convenience of your home or office </li>

                <span>Benefits</span>
                
                <li>Enjoy speed, savings, convenience and security </li>
                <li>Promote efficiency and profitability.</li>
                
                </p>

            </div>
        
        </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>