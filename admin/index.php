<?php 

include('../path.php');
include('server.php');

 $transactions = selectAll('transactionz');  
 $lastTransfer = selectOneDesc('transactionz', ['type' => 'transfer']);

 $classs = "dash"
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $companyName; ?> - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Dosis:wght@700&family=Lora:ital@1&family=Noto+Sans&family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet"> 

    <script src="https://kit.fontawesome.com/27416b154a.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../app/css/style.css">
    <link rel="stylesheet" href="../app/css/main.css">

    
</head>
<body>
    
    <?php include("header.php"); ?>
    
    <main class="<?php if(isset($classs)){echo $classs;} ?>">

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>
        
        <div class="dash-middle">
            <div class="container">
                <div class="box">
                    <a href="transfers.php"><img src="<?php echo BASE_URL . '/app/img/pay.png' ?>"></a>
                    <a href="transfers.php">Payments</a>
                </div>

                <div class="box">
                    <a href="transfers.php"><img src="<?php echo BASE_URL . '/app/img/transfer.png' ?>"></a>
                    <a href="transfers.php">Transfer</a>
                </div>

                <div class="box">
                    <a href="history.php"><img src="<?php echo BASE_URL . '/app/img/deposit.png' ?>"></a>
                    <a href="history.php">Deposits</a>
                </div>

                <div class="box">
                    <a href="loan.php"><img src="<?php echo BASE_URL . '/app/img/loan.png' ?>"></a>
                    <a href="loan.php">Loans</a>
                </div>
                
            </div>
            
        </div>
    
    </main>
    
    
    <?php include("footer.php"); ?>
    
</body>
</html>