<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Residential Construction Loans";

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
                    <h2>Residential Construction Loans</h2>
                    <p>
                    Sometimes you’ll find the perfect home that’s move in ready, while other times, the only way to get what you truly want is to build a new home from the ground up. That’s when you need to secure a residential construction loan. 

                    <br> <br> At <?php echo $companyRealName; ?>, we offer flexible financing to cover your home construction needs.  

                    <br> <br> <span>What is a residential construction loan?</span> 
                    <br> A residential construction loan provides you with the funding needed to build your dream home. These loans are short term compared to a traditional home mortgage and the funds are paid out in stages as work is completed on your home. 
                    
                    <br> <br> <span>Residential construction loan vs. home mortgage</span> 
                    <br> While you’re likely familiar with a traditional home mortgage, information about a residential construction loan isn’t generally common knowledge.  Here are some primary differences between the two loan types:

                    <br> <br> <span>Morgage Loan</span> <br>
                    Term: Usually ranges from 15-30 years
                    <br>
                    Purpose: Purchase a home that is already built or is being built by a construction company, usually in a neighborhood <br>
                    Rates: Can be fixed or variable depending on your lender <br>
                    Security: Mortgages are secured because your home is used as collateral <br>
                    Repayment: You pay your mortgage each month after securing the loan.

                    <br> <br> <span>Residential Construction Loan</span> <br>
                    Term: Term can vary based on your building timeline. With residential construction loans, funds are disbursed to you and the builder as progress is made on the home, not all at once like a traditional mortgage. 
                    <br>
                    Purpose:Funding to have your home custom built, typically on your own land, through a private construction company you hire <br>
                    Rates: Fixed Rates <br>
                    Security: Residential construction loans are unsecured loans since your unfinished home can’t be used as collateral <br>
                    Repayment: You pay interest only until construction is complete, then switch to monthly mortgage payments <br>

                </p>
                </div>

                <div class="right sec">
                    <?php echo $companyRealName; ?> makes residential construction loans easy. <br> <br> 
                    <p>
                        <img src="../img/mortgage.jpg">
                    </p>
                </div>
                
            </div>
            
            <div class="below">
                <h4>Frequently asked questions about residential construction loans</h4>
                
                <a> Is it hard to get a construction loan? </a>
                <div>
                Construction loans present risks that standard purchase or refinance loans do not and contain variables common with construction. That’s why you want to be sure that you find the right lender to support you through the qualifying and underwriting process.
                </div>
                
                <a> What is the required down payment for a construction loan? </a>
                <div>
                Typically, a residential construction loan will require a down payment, similar to a traditional mortgage loan. The amount of your down payment can vary based on different factors, so it's best to get in touch with one of our mortgage expert for the details.
                </div>

                <a> Is it hard to get a construction loan? </a>
                <div>
                Like most loans, higher credit scores can often increase your chances of qualifying for a loan at lower rates and terms. 
                </div>

                <a> How do I convert a construction loan to a permanent loan? </a>
                <div>

                <br> After the construction on your home is completed, your mortgage lender will present you with options for permanent financing.

                <br> <br> <?php echo $companyRealName; ?>, we offer discounts to our customers who are converting their construction loans to a permanent mortgage.

                </div>

            </div>
        
        </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>