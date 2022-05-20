<?php

require "../includes/dbFunctions.php";

  
if(isset($_POST['receiver_id'])){

  $errors = array();

  if(strlen($_POST['receiver_id']) < 8){
    echo "Account number must be up to 10 digits";
    exit;
  }

  if (count($errors) == 0) {
    
    if($_POST['select_bank'] == 'premiertrustbank'){
      $userCheck = selectOne('users', ['id' => $_POST['receiver_id']]);
    }else{$userCheck = selectOne('bank_accounts', ['user_id' => $_POST['receiver_id']]);}
    

    if($userCheck == TRUE){
      echo $userCheck['username'];
    }else{echo "Please Check that you have entered a Correct Account Number.";}
    
  }
}

if(isset($_POST['pin'])){

  $errors = array();

  if(strlen($_POST['pin']) < 4){
    $errors['pin'] = "Pin must be 4 Digits";
    echo "Pin must be 4 Digits";
    exit;
  }

  if(strlen($_POST['pin']) > 4){
    $errors['pin'] = "Pin must be 4 Digits";
    echo "Pin must be 4 Digits";
    exit;
  }

  if (count($errors) == 0) {
    
    $userCheck = selectOne('transfers', ['user_id' => $_POST['user_id']]);

    if(!isset($userCheck)){
      echo "Please Create a Transfer Pin";
      exit;
    }

    if(password_verify($_POST['pin'], $userCheck['pin'])){
      echo '<span style="color:green">Pin Correct</span>';
    }else{echo "Incorrect Pin";}
    
  }
}

?>