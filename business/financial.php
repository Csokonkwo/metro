<?php

include("../path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Financial Planning";

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
                    <h2>Business</h2>
                    <p>
                    We know that successful businesses drive the economic health of the region. We have a variety of investment options to offer that can help fill the needs of your business.
                     </p>
                </div>

                <div class="right">
                    <p>
                    As a benefit of being a customer of <?php echo $companyRealName; ?>, you can receive insurance quotes from Bankers Insurance, a specialist in property, liability, business auto, workers compensation, employee benefits, and all business insurance coverages. Quotes are always free and no-obligation. All services administered by Bankers Insurance LLC.
                    </p>
                </div>
                
            </div>
            
            <div class="below">
                
                <a> Succession Planning</a>
                <div>A plan to guide your business when you decide to sell or retire. 
                
                <span>Feature</span>
                <li>A comprehensive look at your business with the help of a team of experienced, local financial advisors. We will help you consider your options, make a plan and execute! </li>
                
                <span>Benefits</span>
                
                <li>Protect the business you worked so hard to build. Preserve it for your family. Retire worry-free.</li>
                </div>
                
                
                <a> Life Insurance</a>
                <div>Variety of life insurance plans from the strongest insurance companies in the industry.  
                
                <span>Features</span>
                
                <li>Whole life, Universal Life and Term Life policies</li>
                    
                <span>Benefits</span>
                
                <li>Get the coverage you need with advice from an experienced, local financial advisor</li>
                    
                </div>
                
                
                <a> Qualified Retirement Plans</a>
                <div>Qualified plans that offer flexible ways to set aside money every month for retirement.
                
                <span>Features</span>
                <li>Broad array of investment options; professional investment advice.</li>
                
                <span>Benefits</span>
                
                <li>Retain and reward your best employees. Prepare for retirement.</li>
                    
                </div>

            </div>
        
        </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>