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
                        Bristle City & Trust Company offers a variety of checking and savings account options that are sure to meet your unique needs. Since 2011, we've proudly offered free checking! <br> <br> Find the account that's right for you below and get started today with our broad range of savings and checking accounts designed to suit your banking needs and make your banking experience a pleasant one.
                    </p>
                </div>
                <div class="right">
                    <h2>Features</h2>
                    <p>
                        <li>Online Banking</li>
                        <li>Bill Pay</li>
                        <li>Debit Card</li>
                        <li>e-statement</li>
                        <li>Card Control</li>
                        <li>Bitcoin Deposit</li>
                        <li>Fraud Monitoring</li>
                    </p>
                </div>
            </div>
            
            <div class="below">
                <h3>Personal Checking and Savings accounts</h3>

                <a> Free Checking</a>
                <div>A free checking account that allows you to access funds via standard checks, Visa Check Cards, First Call Phone Banking, Mobile and Online Banking. Open an account online in 5 minutes or less! 
                
                <span>Details</span>
                <li>Open an account with $500 </li>
                <li>No monthly service charges</li>
                <li>No minimum balance requirements </li>
                <li>Unlimited transfers to other accounts</li>
                
                </div>
                
                
                <a> Money Market</a>
                <div>A limited checking account that pays competitive interest on the funds deposited. Interest rates are tiered based upon the range of deposits.  
                
                <span>Details</span>
                
                <li>Open an account with $2,500  </li>
                <li>Interest rates will be paid on the entire balance based on the applicable rate tier.</li>
                <li>Earn competitive interest on balances of $1,500 or greater. </li>
                    
                <span>Benefits</span>
                
                <li>Higher interest based on balances</li>
                <li>Pay no fees regardless of balance</li>
                <li>Free online, mobile, text and phone banking </li>
                <li>Nationwide access to free ATMs via the Allpoint Network</li>
                <li>24 hour access to money</li>
                    
                </div>
                
                
                <a> Traditional Savings</a>
                <div>A traditional savings account that earns competitive interest on all deposits. 
                
                <span>Details</span>
                <li>Open an account with $1000 </li>
                <li>Unlimited withdrawals at any office or ATM </li>
                <li>Interest compounded quarterly  </li>
                <li>Unlimited transfers to other accounts</li>
                    
                <span>Benefits</span>
                
                <li>Free online, mobile, text and phone banking</li>
                <li>Nationwide access to free ATMs via the Allpoint Network</li>
                <li>Free online, mobile, text and phone banking </li>
                <li>24 hour access to money</li>
                    
                </div>

            </div>
        
        </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>