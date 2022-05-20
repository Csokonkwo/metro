<?php 
$pageName = 'Forgot Password';
include("../path.php");
require_once 'server.php'; 


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

           <form action="forgot_password.php" method="POST">
                <h3 class="center">Recover Password</h3>

                <?Php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                    <li><?php echo $error; ?>.</li>
                    <?php endforeach ?>
                </div>
                <?php endif ?>

                <p>Please enter the email address associated with the account you want to recover</p>

                <div>
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Enter Email">
                    <label for=""></label>
                </div>

                <div>
                    <button type="submit" name="forgot_password" class="btn"> Recover Password</button>
                </div>

            </form>
                
           </div>
           
           <div class="right"></div>
       </div>




    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>