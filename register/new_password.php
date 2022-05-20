<?php 

$pageName = 'New Password';
include("../path.php");
require_once 'server.php';

if(!isset($_GET['new_pass'])){
    header('location: signin.php');
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
                <form action="new_password.php" method="POST" class="form-container">
                    <h3 class="center">Update Password</h3>

                    <?Php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>

                    <div>
                        <input type="password" name="password" placeholder="New Password" class="text-input">
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Confirm New Password" name="password_2" class="text-input">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="new_password" class="btn"> Update Password</button>
                    </div>

                    
                </form>

                
            </div>
        </div>
    

    <?php  include("../includes/footer.php"); ?>
</body>
</html>