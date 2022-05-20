<?php 

include("../path.php"); 
require("server.php");
$pageName = "Transfers";

if(!isset($_SESSION['transfer_type'])){
    header('location: ../register/signin.php');
    exit();
}

if(isset($_POST['otp_submit'])){

    $otpCheck = selectOne('transfers', ['user_id' => $_SESSION['id']]);
    if($otpCheck['token'] != $_POST['otp']){
        $errors['otp'] = "Incorrect One Time Password";
    }

    unset($_POST['otp_submit']);

    if(count($errors) === 0){

        unset($_POST['otp']);

        if($_SESSION['transfer_type'] == 'premiertrustbank'){
            $reciever = selectOne('users', ['id' => $_SESSION['receiver_id']]);
          }else{$reciever = selectOne('bank_accounts', ['user_id' => $_SESSION['receiver_id']]);}
        
        if($reciever == TRUE){
        
            $charge = 0.02 * $_SESSION['amount'];
            $_GET['user_id'] = $_SESSION['receiver_id'];
            $_GET['amount'] = $_SESSION['amount'] - $charge;
            $_GET['type'] = 'transfer';
            $_GET['status'] = 'received';
            $_GET['reference'] = $_SESSION['username'];
            $_GET['payment_method'] = 'credit';
        
            $sendMoney = createUser('transactionz', $_GET);
        
                if($sendMoney == TRUE){
                $_POST['user_id'] = $_SESSION['id'];
                $_POST['type'] = 'transfer';
                $_POST['status'] = 'sent';
                $_POST['amount'] = $_SESSION['amount'];
                $_POST['reference'] = $reciever['username'];
                $_POST['payment_method'] = 'debit'; 
                
                $debitMoney = createUser('transactionz', $_POST);
                }
        
             if($debitMoney == true){

                unset($_SESSION['amount']);
                unset($_SESSION['receiver_id']);
                unset($_SESSION['transfer_type']);
                unset($_SESSION['transfer_token']);
        
                $_SESSION['message'] = "Transfer to ". $reciever['username'] . ' Successful';
                $_SESSION['alert-class'] = "alert-success";
        
                header("location: history.php");
                exit();
        
            }else {$errors['db_error'] = "Failed to Transfer";}
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
</head>

<body>
    
    <?php include("header.php"); ?>
    <?php $checkPin = selectOne('transfers', ['user_id' => $_SESSION['id']]); ?>

        <div class="deposit">
            <div class="container">
                <div class="left">
                    <form action="otp.php" method="post">
                        <h3>One Time Password</h3>

                        <?Php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?>.</li>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>

                        <input id="otp" name="otp" placeholder="Enter OTP" value="<?php echo $id ?>" oninput="checkLength(this)">

                        <div id="other_detail">
                            <button type="submit" name="otp_submit">Submit</button>
                        </div>
                        
                    
                    </form>
                
                </div>
            </div>   
        </div>
    
    <?php include("footer.php"); ?>

    
    <script> 
        var balance = "<?php echo number_format($balance, 0); ?>"
        var user_id = "<?php echo $_SESSION['id']; ?>"

    </script>
    
    <script src="js/ajax.js"></script>
    
</body>
</html>