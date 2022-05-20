<?php

include('../includes/dbFunctions.php');


if(!isset($_SESSION['id'])){
    header('location: ../register/login.php');
    exit();
}

if($_SESSION['admin'] < 3){
    header('location: ../app/index.php');
    exit();
}

$userDetail = selectOne('users', ['id' => $_SESSION['id']]);
$_SESSION['id'] = $userDetail['id'];
$_SESSION['verified'] = $userDetail['verified'];
$_SESSION['referrer_id']= $userDetail['referrer_id'];


$id = '';
$username = '';
$amount = '';
$currency = '';
$type = '';
$title = '';
$body = '';
$city = '';
$fullname = '';
$name = '';
$user_id = '';
$errors = array();

$pendingDeposits = pendingDeposits('deposit', 'pending');
$pendingWithdrawals = pendingDeposits('withdrawal', 'pending');
$totalInvestments = pendingDeposits('investment', 'confirmed');
$pendingInterests = pendingDeposits('interest', 'paid');



if(isset($_POST['add_bank'])){

    unset($_POST['add_bank']);
    
    if (empty($_POST['name'])){
        array_push($errors, 'Bank name is required');
    }

    $benefactor = selectOne('banks', ['name' => $_POST['name']]);

    if($benefactor == TRUE){
        array_push($errors, 'Bank already Exists');
    }
    
    if(count($errors)==0){

        $addmo = createUser('banks', $_POST);
        
        if($addmo == True){
            header('location: banks.php');
            exit();
        }

        else{
            echo mysqli_error($conn);
            die();
        }
       
    }
    else{
        $name = $_POST['name'];
    }

}



if(isset($_POST['add_account'])){

    unset($_POST['add_account']);
    
    if (empty($_POST['username'])){
        array_push($errors, 'Account name is required');
    }

    if (empty($_POST['user_id'])){
        array_push($errors, 'Account number is required');
    }

    $benefactor = selectOne('bank_accounts', ['username' => $_POST['username']]);

    if($benefactor == TRUE){
        array_push($errors, 'Account already Exists');
    }
    
    if(count($errors)==0){

        $addmo = createUser('bank_accounts', $_POST);
        
        if($addmo == True){
            header('location: accounts.php');
            exit();
        }

        else{
            echo mysqli_error($conn);
            die();
        }
       
    }

    else{
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
    }

}


if(isset($_POST['add_money'])){

    unset($_POST['add_money']);
    

    if (empty($_POST['username'])){
        array_push($errors, 'Username is required');
    }

    if($_POST['amount'] < 1){
        array_push($errors, 'Amount is required');
    }

    if (empty($_POST['status'])){
        array_push($errors, 'status is required');
    }

    $benefactor = selectOne('users', ['username' => $_POST['username']]);

    if($benefactor == false){
        array_push($errors, 'No user found');
    }
    
    
    if(count($errors)==0){

        unset($_POST['username']);
        $table = 'transactionz';

        $_POST['user_id'] = $benefactor['id'];
        $_POST['reference'] = $_SESSION['username'];
        $_POST['payment_method'] = 'bitcoin';

        
        if($_POST['type'] == 'interest'){
            $table = 'interests';
            unset($_POST['reference']);
            unset($_POST['payment_method']);
            $_POST['status'] = 'paid';
        }

        $addmo = createUser($table, $_POST);
        
        if($addmo == True){
            header('location: history.php');
            exit();
        }

        else{
            echo mysqli_error($conn);
            die();
        }
       
    }

    else{
        $amount = $_POST['amount'];
        $username = $_POST['username'];
    }

}


if(isset($_POST['news_submit'])){
    $_POST['created_at'] = date("Y-m-d H:i:s");

    if(strlen($_POST['title']) < 15){
        $errors['title'] = "Enter title";
    }

    if(strlen($_POST['body']) < 37){
        $errors['body'] = "Please News details";
    }

    if(empty($_FILES['image']['name'])){
        $errors['image'] = "Please select an image";
    }

    if(!empty($_FILES['image']['name'])){
        $image_name = time(). "_" . $_FILES['image']['name'];
        $destination = "img/" .$image_name;
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if($result){
            $_POST['image'] = $image_name;
        }
        else{
            $errors['image'] = "Failed to upload screenshot";
        }
    }

    if (count($errors) === 0){
        
        $titleCheck = selectOne('news', ['title' => $_POST['title']]);

        if($titleCheck){
            $errors['titleCheck'] = "News posted in the past";
        }

        if (count($errors) === 0){
            unset($_POST['news_submit']);
    
            $_POST['published'] = 1;
            $_POST['username'] = $_SESSION['username'];
            
            $postNews = createUser('news', $_POST);
    
            if($postNews == true){
    
                $_SESSION['message'] = "News post successful";
                $_SESSION['alert-class'] = "alert-success";
    
                header("location: news.php");
                exit();
    
            }
            
            else {$errors['db_error'] = "Failed to post news";}
        }
    
    }

    else{
        $title = $_POST['title'];
        $body = $_POST['body']; 
    }

}



?>