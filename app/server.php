<?php

require '../includes/dbFunctions.php';

if(!isset($_SESSION['id'])){
    header('location: ../register/signin.php');
    exit();
}

$ban = selectOne('users', ['id' => $_SESSION['id']]);

if($ban['ban'] == 1){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    unset($_SESSION['referrer_id']);
    
    header('location: ../index.php');
    exit();
}

$confirmedDeposits = calculateTotal('transactionz', $_SESSION['id'], 'deposit', 'confirmed');
$confirmedInterests = calculateTotal('interests', $_SESSION['id'], 'interest', 'paid');
$confirmedCredits = calculateTotal('transactionz', $_SESSION['id'], 'transfer', 'received');

$confirmedCashouts = calculateTotal2($_SESSION['id'], 'withdrawal');
$confirmedDebits = calculateTotal('transactionz', $_SESSION['id'], 'transfer', 'sent');
$confirmedLoans = calculateTotal('transactionz', $_SESSION['id'], 'loan', 'confirmed');

$income = $confirmedDeposits + $confirmedInterests + $confirmedCredits;
$expenditure = $confirmedCashouts + $confirmedDebits + $confirmedLoans;

$balance = $income - $expenditure;

$id = '';
$amount = '';
$reference = '';
$errors = array();


if(isset($_POST['deposit'])){

    if($_POST['amount'] <= 99){
        $errors['amount'] = "Minimum Deposit allowed is $100";
    }

    if(strlen($_POST['payment_method']) < 7){
        $errors['payment_method'] = "Please choose a payment method";
    }

    if(empty($_FILES['reference']['name'])){
        $errors['image'] = "Please upload Proof of payment";
    }

    if(!empty($_FILES['reference']['name'])){
        $image_name = time(). "_" . $_FILES['reference']['name'];
        $destination = "img/deposits/" .$image_name;
        $result = move_uploaded_file($_FILES['reference']['tmp_name'], $destination);

        if($result){
            $_POST['reference'] = $image_name;
        }
        else{
            $errors['reference'] = "Failed to upload screenshot";
        }
    }

    if (count($errors) === 0){
        
        $hashCheck = selectOne('transactionz', ['reference' => $_POST['reference']]);
        $pendingCheck = selectOne('transactionz', ['user_id'=> $_SESSION['id'], 'type'=> 'deposit', 'status'=> 'pending' ]);

        if($pendingCheck['status'] == 'pending'){
            $errors['pendingCheck'] = "You have a pending Deposit";
        }

        if($hashCheck){
            $errors['pendingCheck'] = "Transaction Hash already used";
        }

        if (count($errors) === 0){
            unset($_POST['deposit']);
    
            $_POST['user_id'] = $_SESSION['id'];
            $_POST['status'] = 'pending';
            $_POST['type'] = 'deposit';
            
            $makeDeposit = createUser('transactionz', $_POST);
    
            if($makeDeposit == true){
    
                $_SESSION['message'] = "Deposit Successful";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: history.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Failed to make Deposit";}
        }
    
    }

    else{
        $amount = $_POST['amount'];
    }

}


if(isset($_POST['loan'])){

    if(strlen($_POST['reference']) < 10){
        $errors['reference'] = "Please enter a valid Wallet Address";
    }

    if(strlen($_POST['payment_method']) < 7){
        $errors['payment_method'] = "Please choose a payment method";
    }

    //if($_SESSION['type'] == 'solo' ){
     //   $errors['balance'] = "Please Upgrade your Account";
    //}

    if (count($errors) === 0){

        if($_POST['amount'] < 100){
            $errors['amount'] = "Minimum withdrawal allowed is $100";
        }

        if (count($errors) === 0){

            unset($_POST['loan']);

            $_POST['user_id'] = $_SESSION['id'];
            $_POST['status'] = 'pending';
            $_POST['type'] = 'loan';
            
            $makeDeposit = createUser('transactionz', $_POST);
    
            if($makeDeposit == true){
    
                $_SESSION['message'] = "Loan Application Initiated, Please download the form, fill and submit";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: history.php");
                exit();
    
            }
        
            else {$errors['db_error'] = "Loan Application failed";}

        }

    } 

    else{
        $amount = $_POST['amount'];
        $reference = $_POST['reference'];
    }

}


if(isset($_POST['transfer'])){

    if($_POST['amount'] < 500){
        $errors['amount'] = "Minimum transfer allowed is $500";
    }

    if($_POST['amount'] > $balance){
        $errors['amount'] = "Insufficient Balance";
    }

    if(strlen($_POST['receiver_id']) < 9){
        $errors['account'] = "Invalid Account Number";
    }

    if($_POST['receiver_id'] == $_SESSION['id']){
        $errors['receiver_id'] = "You cannot transfer to yourself";
    }

    $ifTransfer = selectOne('users', ['username' => $_SESSION['username']]);
    
    if(isset($ifTransfer)){
       if($ifTransfer['transfer'] == 1){
        $errors['transfers'] = "You cannot make a transfer at this moment please contact customer support";
    }
 
    }
    
    
    if (count($errors) === 0){

        $userCheck = selectOne('transfers', ['user_id' => $_SESSION['id']]);
        if(password_verify($_POST['pin'], $userCheck['pin'])){

            $_SESSION['amount'] = $_POST['amount'];
            $_SESSION['receiver_id'] = $_POST['receiver_id'];
            $_SESSION['transfer_type'] = $_POST['type'];
            $_SESSION['transfer_token'] = mt_rand(10000, 99999);

            $token = $_SESSION['transfer_token'];
            $user_id = $_SESSION['id'];

            $sql = "UPDATE transfers SET token='$token' WHERE user_id ='$user_id'";
            $result = mysqli_query($conn, $sql);

            if($result){
                
                include('../register/mailer.php');
                sendOtp($_SESSION['email'], $token);

                $_SESSION['message'] = "Please enter the OTP sent to your email to continue";
                $_SESSION['alert-class'] = "alert-success";

                header("location: otp.php");
                exit(); 
            }
        }else{$errors['transfers'] = "Incorrect Pin";}

        
    }
    else{$amount = $_POST['amount'];}

}



if(isset($_POST['upload_image'])){

    if(empty($_FILES['image']['name'])){
        $errors['image'] = "Please select Image";
    }

    if(!empty($_FILES['image']['name'])){
        $image_name = time(). "_" . $_FILES['image']['name'];
        $destination = "img/img/" .$image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }
        else{
            $errors['image'] = "Failed to upload Image";
        }
    }


    if (count($errors) === 0){
        unset($_POST['upload_image']);

        $updateImage = update('users', $_SESSION['id'], $_POST);

        if($updateImage  == true){

            $_SESSION['message'] = "Image uploaded Successfully";
            $_SESSION['alert-class'] = "alert-success";

            header("location: profile.php");
            exit();
        }
        
        else {$errors['db_error'] = "Failed to Upload Image, Please try to rename";}
    }
    
}


?>