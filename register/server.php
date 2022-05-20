<?php

require (ROOT_PATH . '/includes/dbFunctions.php');
require 'mailer.php';

$errors =array();
$username = '';
$email = '';
$user = '';
$verified = '';

$lastname = '';
$firstname = '';
$phone = '';
$gender = '';
$country = '';

//CODINGS FOR SIGING USERS UP GOES HERE

if(isset($_POST['sign_up'])){

    //validation

    if(strlen($_POST['username']) < 4){
        $errors['username'] = "Username must contain atleast 4 characters";
    }

    if(strlen($_POST['username']) > 19){
        $errors['username'] = "Username must not exceed 19 characters";
    }

    if(strlen($_POST['country']) < 3){
        $errors['country'] = "Please select country";
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email Address is invalid";
    }

    if(empty($_POST['email'])){
        $errors['email'] = "Email is Required";
    }

    if(strlen($_POST['password']) < 5){
        $errors['password'] = "Password must contain atleast 5 characters";
    }

    if($_POST['password'] != $_POST['password_2']){
        $errors['password'] = "The two password do not match";
    }

    if (count($errors) === 0){

        $usernameCheck = selectOne('users', ['username' => $_POST['username']]);
        $useremailCheck = selectOne('users', ['email' => $_POST['email']]);

        if($usernameCheck){
            if($usernameCheck['username'] == $_POST['username']){
                $errors['username'] = "Username already exists";
            }    
        }
        
        if($useremailCheck){
            if($useremailCheck['email'] == $_POST['email']){
                $errors['email'] = "Email already exists";
            }
        }
        
    }

    //CHANGES WAS MADE HERE TO STOP TWO USERS USING THE SAME USERNAME

    if (count($errors) === 0){

        if(isset($_POST['street'])){
            $_GET['street'] = $_POST['street'];
            $_GET['city'] = $_POST['city'];
            $_GET['state'] = $_POST['state'];
            unset($_POST['street'], $_POST['city'], $_POST['state']);
        }

        unset($_POST['password_2'], $_POST['checkbox'], $_POST['sign_up']);
        
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['token'] = bin2hex(random_bytes(50));
        $_POST['verified'] = 0;
        $_POST['ban'] = 0;
        $_POST['admin'] = 0;
        $_POST['type'] = 'solo';
        $_POST['transfer'] = 0;
        
        if(isset($_GET['street'])){
            $_POST['type'] = 'basic';
        }


        $user_id = createUser('users', $_POST);
        $_GET['user_id'] = $user_id; 

        if($user_id == true){

            //Login user
            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['verified'] = $_POST['verified'];
            $_SESSION['token'] = $_POST['token'];
            $_SESSION['admin'] = $_POST['admin'];
            $_SESSION['referrer_id'] = $_POST['referrer_id'];
            $_SESSION['type'] = 'solo';

            if(isset($_GET['street'])){
                $address_id = createUser('address', $_GET);
                $_SESSION['business'] = 1;
                $_SESSION['type'] = 'basic';
            }

            sendVerification($_POST['email'], $_POST['username'], $_POST['token']);

            $_SESSION['message'] = "Registration Successful, please check your Email to verify your account.";
            $_SESSION['alert-class'] = "alert-success";

            header('location:' . BASE_URL .'/app/index.php');
            exit();

        }else {$errors['db_error'] = "Failed to register";}

    }

    else{
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];
    }

}



//THIS CODINGS COME UP WHEN A USER IS ABOUT TO LOGIN

if(isset($_POST['sign_in'])){


    //validation

    if(empty($_POST['user'])){
        $errors['user'] = "Username or Email is required";
    }

    if(empty($_POST['password'])){
        $errors['password'] = "Password is required";
    }

    if(count($errors) === 0){

        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $_POST['user'], $_POST['user']);
        $stmt->execute();
        $result = $stmt->get_result();
        $userDetail = $result->fetch_assoc();

        if(password_verify($_POST['password'], $userDetail['password'])){

            $ban = selectOne('users', ['email' => $userDetail['email']]);

            if($ban['ban'] === 1){
                $errors['banned'] = "This account has been suspended, Please contact customer care";
            }

            if(count($errors) === 0){
                //login accessed
                $_SESSION['id'] = $userDetail['id'];
                $_SESSION['username'] = $userDetail['username'];
                $_SESSION['email'] = $userDetail['email'];
                $_SESSION['verified'] = $userDetail['verified'];
                $_SESSION['created_at'] = $userDetail['created_at'];
                $_SESSION['token'] = $userDetail['token'];
                $_SESSION['admin'] = $userDetail['admin'];
                $_SESSION['referrer_id'] = $userDetail['referrer_id'];
                $_SESSION['type'] = $userDetail['type'];

                $business = selectOne('address', ['user_id' => $userDetail['id']]);
                if(isset($business)){
                    $_SESSION['business'] = 1;
                    $_SESSION['type'] = 'business';
                }

                $_SESSION['message'] = "Login Successful";
                $_SESSION['alert-class'] = "alert-success";

                header('location:' . BASE_URL .'/app/index.php');
                exit();

            }
        }

        else{
            $errors['user'] = "Wrong Credentials";
        }

    }

    else{
        $user = $_POST['user'];
        $password = $_POST['password'];
    }

}


if(isset($_POST['log_in'])){


    //validation

    if(empty($_POST['user'])){
        $errors['user'] = "Username or Email is required";
    }

    if(empty($_POST['password'])){
        $errors['password'] = "Password is required";
    }

    if(count($errors) === 0){

        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $_POST['user'], $_POST['user']);
        $stmt->execute();
        $result = $stmt->get_result();
        $userDetail = $result->fetch_assoc();

        if(password_verify($_POST['password'], $userDetail['password'])){

            $ban = selectOne('users', ['email' => $userDetail['email']]);
            if($ban['ban'] === 1){
                $errors['banned'] = "Account disabled, contact customer care";
            }

            if(count($errors) === 0){
                //login accessed
            $_SESSION['id'] = $userDetail['id'];
            $_SESSION['username'] = $userDetail['username'];
            $_SESSION['email'] = $userDetail['email'];
            $_SESSION['verified'] = $userDetail['verified'];
            $_SESSION['created_at'] = $userDetail['created_at'];
            $_SESSION['token'] = $userDetail['token'];
            $_SESSION['admin'] = $userDetail['admin'];
            $_SESSION['referrer_id'] = $userDetail['referrer_id'];

            //Flash message
            $_SESSION['message'] = "Login Successful";
            $_SESSION['alert-class'] = "alert-success";

            if($_SESSION['admin'] >= 3){
                header('location:' . BASE_URL .'/admin/index.php');
                exit();
            }

            header('location:' . BASE_URL .'/app/index.php');
            exit();

            }
        }

        else{
            $errors['user'] = "Wrong Credentials";
        }

    }

    else{
        $user = $_POST['user'];
        $password = $_POST['password'];
    }

}


if(isset($_POST['update_profile'])){

    unset($_POST['update_profile']);

    //validation

    if(empty($_POST['firstname'])){
        $errors['firstname'] = "Firstname required";
    }

    if(empty($_POST['lastname'])){
        $errors['lastname'] = "Lastname required";
    }

    if(empty($_POST['gender'])){
        $errors['gender'] = "Gender is Required";
    }

    if(empty($_POST['phone'])){
        $errors['phone'] = "Phone number required";
    }

    if(empty($_POST['country'])){
        $errors['country'] = "Please select your Country";
    }

    // $userDetail = selectOne('users', ['id'=> $_SESSION['id']]);

    // if($userDetail['firstname']){
    //     $errors['updated'] = "Profile has been updated in the past";

    //     $_SESSION['message'] = "Your Profile is Updated";
    //     $_SESSION['alert-class'] = "alert-success";
    //     header("location: ../app/profile.php");
    //     exit();
    // }

    if (count($errors) === 0){

        $profile_id = update('users', $_SESSION['id'], $_POST);
        $_SESSION['message'] = "Profile Updated successfully";
        $_SESSION['alert-class'] = "alert-success";
        header("location: ../app/profile.php");
        exit();
    }

    else{
    $errors['db_error'] = "Failed to update";
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    }

}


if(isset($_POST['update_password'])){

    if(empty($_POST['old_password'])){
        $errors['old_password'] = "Old Password is Required";
    }

    if(strlen($_POST['password']) < 6){
        $errors['password'] = "New Password must contain atleast 6 characters";
    }

    if($_POST['password'] != $_POST['password_2']){
        $errors['password'] = "The two password do not match";
    }

    if(count($errors) === 0){

        $email = $_SESSION['email'];
        $userDetail = selectOne('users', ['email' => $email ]);

        if(password_verify($_POST['old_password'], $userDetail['password'])){

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $sql = "UPDATE users SET password='$password' WHERE email='$email'";

            $result = mysqli_query($conn, $sql);

            if($result){
                $_SESSION['message'] = "Password Updated successfully";
                $_SESSION['alert-class'] = "alert-success";
                header("location: ../app/profile.php");
                exit();
            }

        }

        else{ $errors['userdetail'] = "Old Password incorrect";}
    }

}



//FORGOTTEN PASSWORD CODING HERE

if(isset($_POST['forgot_password'])){

    $email = $_POST['email'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email Address is invalid";
    }

    if(empty($email)){
        $errors['email'] = "Email is Required";
    }

    if(count($errors) === 0){

        $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $userDetail = $result->fetch_assoc();
        $userCount = $result->num_rows;
        $token = $userDetail['token'];
        $stmt->close();

        if($userCount < 1){
            $errors['email'] = "User does not exist";
        }

        if(count($errors)===0){
            sendPasswordResetLink($email, $token);
            header('location: password_message.php');
            exit(0);

        }
    }

}


function updatePassword($token){

    global $conn;
    $sql = "SELECT * FROM users WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];

    header('location: new_password.php?new_pass=0');
    exit(0);
}


if(isset($_POST['new_password'])){

    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];

    //Validation
    if(empty($password)){
        $errors['password'] = "Password is Required";
    }

    if(strlen($password) < 6){
        $errors['password'] = "Password must contain atleast 6 characters";
    }

    if($password != $password_2){
        $errors['password'] = "The two password do not match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    if(count($errors)===0){

        $sql = "UPDATE users SET password='$password' WHERE email='$email'";

        $result = mysqli_query($conn, $sql);

        if($result){
            header('location: signin.php');
            exit(0);
        }
    }
}


function verifyUser($token){
    global $conn;
    $sql = "SELECT * FROM users WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token = '$token'";

        if(mysqli_query($conn, $update_query)){

            //Log user in

            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
            $_SESSION['email'] = $user['referrer_id'];
            $_SESSION['email'] = $user['created_at'];
    
            //Flash message
    
            $_SESSION['message'] = "Your Email has been verified successfully";
            $_SESSION['alert-class'] = "alert-success";
    
            header('location:' . BASE_URL .'/app/index.php');
            exit();
        }

        else {
            echo 'User not found';
        }
    }
}


if(isset($_POST['create_pin'])){

    $_POST['user_id'] = $_SESSION['id'];

    $pin = $_POST['pin'];
    $pin_2 = $_POST['pin_2'];

    if($pin != $pin_2){
        $errors['pin'] = "The two pins do not match";
    }

    if(strlen($pin) < 4){
        $errors['pin'] = "Pin must be 4 digits";
    }

    if(strlen($pin) > 4){
        $errors['pin'] = "Pin must be 4 digits";
    }

    if(!is_numeric($_POST['pin'])){
        $errors['pinner'] = "Pin must be numbers only";
    }

    $check_user = selectOne('transfers', ['user_id' => $_SESSION['id']]);

    if(isset($check_user)){
        $errors['user'] = "Pin has been created already";
    }

    unset($_POST['pin_2']);
    unset($_POST['create_pin']);

    $_POST['pin'] = password_hash($pin, PASSWORD_DEFAULT);

    if(count($errors)===0){

        $create_pin = createUser('transfers', $_POST);

        if($create_pin){
            $_SESSION['message'] = "Transfer Pin Created Successfully";
            $_SESSION['alert-class'] = "alert-success";
            header('location: ../app/transfers.php');
            exit(0);
        }
    }
}


if(isset($_POST['change_pin'])){

    if(empty($_POST['old_pin'])){
        $errors['old_pin'] = "Old Pin is Required";
    }

    if(strlen($_POST['pin']) < 4){
        $errors['pin'] = "New Pin must be 4 digits";
    }

    if($_POST['pin'] != $_POST['pin_2']){
        $errors['pin'] = "The two Pins do not match";
    }

    if(!is_numeric($_POST['pin'])){
        $errors['pinner'] = "Pin must be numbers only";
    }

    if(count($errors) === 0){

        $user_id = $_SESSION['id'];
        $userDetail = selectOne('transfers', ['user_id' => $user_id]);

        if(password_verify($_POST['old_pin'], $userDetail['pin'])){

            $pin = password_hash($_POST['pin'], PASSWORD_DEFAULT);

            $sql = "UPDATE transfers SET pin='$pin' WHERE user_id ='$user_id'";

            $result = mysqli_query($conn, $sql);

            if($result){
                $_SESSION['message'] = "Transfer Pin Updated Successfully";
                $_SESSION['alert-class'] = "alert-success";
                header('location: ../app/transfers.php');
                exit(0);
            }

        }

        else{ $errors['userdetail'] = "Old Pin incorrect";
        }
    }

}


?>