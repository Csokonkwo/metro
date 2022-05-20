<?php 
$pageName = 'Password Message';
include("../path.php");
require_once 'server.php'; 

if(isset($_GET['ref'])){
    $ref = $_GET['ref'];
}

else{
    $ref = 'N/A';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
        
<?php include(ROOT_PATH . "/includes/head.php"); ?>

    <link rel="stylesheet" href="form.css">

</head>

<body>
    
<?php include(ROOT_PATH . "/includes/header.php"); ?>



<div class="form">
           <div class="container">

                <p> A recovery email has been sent to your address</p> 
           </div>
           
           <div class="right"></div>
       </div>




    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>