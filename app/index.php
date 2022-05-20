<?php

include("../path.php"); 
require("server.php"); 

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['referrer_id']);
    header('location: ../index.php');

    exit();
}

$pageName = "Dashboard";
$classs = "dash"

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
</head>

<body>
    <?php include("header.php"); ?>    

        <div class="dash-top">
            <span>$<?php echo number_format($balance, 2) ?></span>
            <span>Mini Account <?php if($_SESSION['type'] == 'solo'): ?> <a href="doc/bcb_premier_account_form.pdf" download>upgrade</a> <?php endif; ?> </span>
            
        </div>
        
        <div class="dash-middle">
            <div class="container">
    
                <div class="box">
                    <a href="<?php echo BASE_URL . '/app/transfers.php' ?>"><img src="<?php echo BASE_URL . '/app/img/transfer.png' ?>"></a>
                    <a href="<?php echo BASE_URL . '/app/transfers.php' ?>">Transfer</a>
                </div>

                <div class="box">
                    <a href="<?php echo BASE_URL . '/app/deposits.php' ?>"><img src="<?php echo BASE_URL . '/app/img/deposit.png' ?>"></a>
                    <a href="<?php echo BASE_URL . '/app/deposits.php' ?>">Add Money</a>
                </div>

                <div class="box">
                    <a href="<?php echo BASE_URL . '/app/loan.php' ?>"><img src="<?php echo BASE_URL . '/app/img/loan.png' ?>"></a>
                    <a href="<?php echo BASE_URL . '/app/loan.php' ?>">Loan</a>
                </div>

                <div class="box">
                    <a href="<?php echo BASE_URL . '/app/transfers.php' ?>"><img src="<?php echo BASE_URL . '/app/img/pay.png' ?>"></a>
                    <a href="<?php echo BASE_URL . '/app/transfers.php' ?>">Payments</a>
                </div>
                
            </div>
            
        </div>
        
        <div class="dash-bottom">
            <div class="container">
                <div class="dash-line"></div>
                <?php $transactions = selectStaz('transactionz', 4, ['user_id' => $_SESSION['id']]);

                foreach ($transactions as $key => $transaction):
                
                if($transaction['type'] == 'deposit'){
                    $color='green';
                    $img = 'deposit'; 
                }

                if($transaction['status'] == 'sent'){
                    $color='red';
                    $img = 'transfer'; 
                }

                if($transaction['status'] == 'received'){
                    $color='green'; 
                    $img = 'transfer';
                }

                if($transaction['type'] == 'loan'){
                    $color='red'; 
                    $img = 'loan';
                }

                if($transaction['type'] == 'interest'){
                    $color='green'; 
                }
                
                ?>
                
                <div class="box">
                    <img src="img/<?php echo $img ?>.png">
                    <div class="content">
                        <p><?php echo $transaction['reference'] ?></p>
                        <span style="color: <?php echo $color ?>">$<?php echo $transaction['amount'] ?></span>
                        <small><?php echo $transaction['type'] ?></small>
                    </div>
                </div>
                
                <?php endforeach; ?>
            </div>
        </div>
    
        <?php include("footer.php") ?>
    
</body>
    
</html>