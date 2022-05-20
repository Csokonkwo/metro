<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Mortgage Loans";

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
                    <h2>Home Mortgage Loans</h2>
                    <p>
                    Get the home that’s right for you with the mortgage that’s right for you, too.

                    <br> <br> Local customer service. That's the key difference you'll experience when you get a mortgage loan at <?php echo $companyRealName; ?>. Many of our mortgage loans are serviced locally, and services are provided for the life of the loan.
                    </p>
                </div>

                <div class="right">
                    <p>
                    At <?php echo $companyRealName; ?>, we offer competitive mortgage loan rates for the life of your loan. Whether you need a 30-year fixed loan or simply to refinance, our local representatives will find a financing solution that works for you.

                    <br> <br> Since mortgage interest rates change frequently with the market, it’s best to work with your local representative to get your custom rate quote.
                    </p>
                </div>
                
            </div>
            
            <div class="below">
                
                <a> Home Equity</a>
                <div>Life happens, and sometimes we all need a little extra cash to get by. Whether you are remodeling a room in your home, need additional funds at tax time or whatever the case may be, a <?php echo $companyRealName; ?> home equity line of credit may just be the answer. Check with us to see how a home equity line of credit can work for you. 
                </div>
                
                <a> Mortgage Loan - No Down Payment</a>
                <div>One of the biggest hurdles for people who want to buy a new home is coming up with a down payment. This special mortgage loan removes the need for a down payment do you can buy your dream home without having to cough up a huge amount of cash.
                </div>
                
                
                <a> Refinance Your Mortgage</a>
                <div>Refinancing your mortgage is a way to decrease your interest rate paid on your mortgage, decrease the monthly payments you make on your mortgage, or both! Refinancing is a great option for people who already own a home but want to improve their existing finance management.
                </div>

                <a> Home Insurance</a>
                <div>
                Customer of <?php echo $companyRealName; ?>, you can receive insurance quotes from Bankers Insurance. Quotes are always free and no-obligation.
                </div>

            </div>
        
        </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>