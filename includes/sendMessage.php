<?php

include('../register/mailer.php');

require "dbFunctions.php";
  
if(isset($_POST['message_submit'])){
  $errors = array();

  unset($_POST['message_submit']);

  if(empty($_POST['fullname'])){
    echo "Fullname is required ";
    exit;
  }

  if(empty($_POST['email'])){
    echo "Email is required ";
    exit;
  }

  if(empty($_POST['message'])){
    echo "Message is required ";
    exit;
  }
   
 
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    
    //this is a function
    sendMessage('bobaltwein2005@gmail.com', $_POST['fullname'], $_POST['email'], $_POST['message']);

    $sendMessage = createUser('messages', $_POST);
    
      if($sendMessage == true){
          echo "Message sent";
      }
      
      else{echo"Sending message failed";}
  	
  }
}


?>