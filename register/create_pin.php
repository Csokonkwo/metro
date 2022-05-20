<?php 

$pageName = 'New Pin';
include("../path.php");
require_once 'server.php';

if(!isset($_SESSION['id'])){
    header('location: ../register/signin.php');
    exit();
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
                <form action="create_pin.php" method="POST" class="form-container">
                    <h3 class="center">Create Transfer Pin</h3>

                    <?Php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                        <?php endforeach ?>
                    </div>
                    <?php endif ?>

                    <div>
                        <input id ="r_pass" type="password" name="pin" placeholder="Enter Pin" class="text-input" oninput="checkLength(this)">
                        <label id ="r_pass_l" for=""></label>
                    </div>

                    <div class="form-group">
                        <input id ="r_pass_2" type="password" placeholder="Confirm Pin" name="pin_2" class="text-input" oninput="validatePassword(this)">
                        <label id ="r_pass_2_l" for=""></label>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="create_pin" class="btn"> Submit</button>
                    </div>

                    
                </form>

                
            </div>
        </div>
    

    <?php  include("../includes/footer.php"); ?>
</body>
</html>