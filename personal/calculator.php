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
        
        <div class="calculator">
            <div class="container">
                <h3>CALCULATOR</h3>
                <h2>ROI Calculator</h2>
                <p>Thousands of people have made a fortune with our system!</p>
                <p>Enter the amount of Loan.</p>
                <p>Find out the Repayment period in per month below</p>

                <input type="text" class="amount" name="amount" placeholder="Enter amount ($)" onchange="calculate('amount')" />
                
                <select name="plan" placeholder="Select Plan" oninput="calculate('plan')">
                    <option>Personal</option>
                    <option>Credit_card</option>
                    <option>Car_loan</option>
                    <option>Home_loan</option>

                </select>
                
                <div class="field">
                    <label>Total Interest (Per Annum)</label>
                    <div class="interest"><span></span></div>
                </div>

                <div class="field">
                    <label>Total Payments</label>
                    <div class="total"><span></span></div>
                </div>

            </div>
        </div>
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    <script src="<?php echo BASE_URL . '/js/calculator.js' ?>"></script>

</body>


</html>