<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "About Us";

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
                    <h2>Who We Are</h2>

                    <h2>About The <?php echo $companyRealName; ?></h2>
                    <p>
                    The Company is in its 9th year of operations and can best be categorized as a growth company. 
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

                <a> UK Based</a>
                <div> <?php echo $companyRealName; ?> began as a single-office bank in Lebanon, Virginia with one million dollars in capital. Today, we remain a privately-held financial institution with over $2.5 Billion in assets, operating twenty full-service and five loan offices in Virginia, with additional presence in Tennessee and North Carolina. 
                
                </div>
                
                
                <a> Community focused.</a>
                <p>Our focus has always been in providing innovative financial solutions in a community banking environment, where exceptional customer service is our top priority.
 
                   <br> <br> The Bank has carved out a regional market niche by catering to businesses large and small who wish to take advantage of a local bank that offers all of the business services that are expected from a larger organization. Since its inception, the company has a long and proud history of offering free checking to its customers. 
  
 
                   <br> <br> Caring for our customers' most basic financial needs serves as a daily reminder that we are privileged to have our customers' trust and that we must always put the needs of our customers first. It is the specific goal of the Company to offer the services customers and clients expect from larger financial services firms in a community bank environment
                    
                </p>
                
                
                <a> Our People</a>
                <p>
                 Our manpower development policy recognises the invaluable contribution that human resources make to the growth and development of countries.
                    
                </p>

            </div>
        
        </div>
        
        <div id="map"><img width="100%" src="img/map.svg" alt=""></div>

    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>

</body>


</html>