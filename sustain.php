<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Sustainability";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/main.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
        
        <div class="serve transfer">
            <div class="container">
                <div class="left">
                    <h1>Sustainability</h1>
                    <p>
                        <br>
                        At <?php echo $companyRealName; ?>, we are committed to growing our people, minimizing our environmental impacts, meeting the needs of our customers and investing in our communities in which we operate.
                </div>
                
                <div style="background-image: url(img/sustain.jpg)" class="right"></div>
                
            </div>
        </div>
        
        <div class="personal">
            
            <div class="below">
                
                <h4>Our Approach</h4>

                <p> <li>
                
                    

                    <?php echo $companyRealName; ?>, we are committed to growing our people, minimizing our environmental impacts, meeting the needs of our customers and investing in our communities in which we operate.

                    Our commitment to nation-building largely informs our approach to corporate responsibility and sustainability (CRS) which is three-pronged: citizenship, stakeholder management and impact management. Citizenship and stakeholder management involves considering the needs of stakeholders when making decisions, while impact management is about minimising our negative impacts and increasing our positive inclusive impacts on society. It is about creating long-term stakeholder value by adopting the opportunities and managing the associated environmental, social and governance risks. The CR&S approach is contained in the Bank’s corporate responsibility policy. The policy clearly outlines our commitments and approach to corporate responsibility, as well as the Bank’s CR&S governance framework. The policy’s scope and respective guidelines apply to operations and activities throughout the Bank, including the subsidiaries in all locations, stakeholders and associated partners representing the Bank.

                    The CR&S approach is designed to deliver value in a structured way along four key areas:
                    Education, Health & Welfare, Financial Inclusion; and Responsible Lending & Procurement.

                    </li></p>

            </div>
        
        </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>