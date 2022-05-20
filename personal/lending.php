<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Lending";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include(ROOT_PATH . "/includes/head.php"); ?>
<link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>


  </header>
    
    <main>
        <div class="hero">
        
        </div>
        
        <div class="personal">
            <div class="wrapper">
                <div class="left">
                    <h2>Lending</h2>
                    <p>
                        Local customer service. That's the key difference you'll experience when you apply for a personal loan at <?php echo $companyRealName ?>. With a variety of personal loan options available, you are certain to find a lending option that best fits your needs. Our local, experienced, qualified lenders will be sure to make the experience enjoyable.
                    </p>
                </div>
                <div class="right">
                    <h2>Services</h2>
                    <p>
                        <li>Mortgage Loan</li>
                        <li>Recreational Loan</li>
                        <li>Agricultural Loan</li>
                    </p>
                </div>
            </div>
            
            <div class="below">
                
                <a> Mortgage Loan</a>
                <div>At <?php echo $companyRealName ?>, we offer competitive mortgage loan rates for the life of your loan. Whether you need a 30-year fixed loan or simply to refinance, our local representatives will find a financing solution that works for you.
                
                <br> <br>
                    We offer unique mortgage options to meet your needs and many of our mortgage loans are serviced locally, and services are provided for the life of the loan.
                </div>
                
                
                <a> Recreational loan</a>
                <div>Financing is available for all your consumer needs including personal loans, automobile, RVs and motorcycles. 
                    
                </div>
                
                
                <a> Agricultural Loan</a>
                <div>We offer flexible term financing for real estate and improvements, equipment, livestock and operating lines of credit. Our ag loan officers are experienced, personable and eager to help.
                    
                </div>

            </div>
        
        </div>
        
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>