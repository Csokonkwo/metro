<?php

define("EMAIL", 'admin@metrochartered.com');
define("PASSWORD", 'kclimpo//');

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('metrochartered.com', 465, 'ssl'))

  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
; 

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendPasswordResetLink($userEmail, $token){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Password Recovery</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 300px; margin: 10px auto 50px auto">
        <div style="height: 60px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 20px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="120px"></h1>
        </div>
        
        <div style=" padding: 10px 20px; text-align: center; width: 90%; margin: auto;">
            <h2 style="font-weight: normal;">Recover Password</h2>
            
            <p>Hello, If you did not initiate a recover password process please ignore, otherwise, you are almost ready to recover your account, please click the link below, Thank you.</p>
            
            <a href="https://metrochartered.com/register/signin.php?password-token=' . $token. '"style="color: white; background: green; padding: 15px 20px; border-radius: 5px; text-decoration: none; display: block; margin-top: 25px;"> Recover Password </a>
        
        </div>
    </div>
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Password Recovery'))
    //$from = array('admin@metrochartered.com');
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}

function sendOtp($userEmail, $token){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>One Time Password</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 300px; margin: 10px auto 50px auto">
        <div style="height: 60px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 20px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="120px"></h1>
        </div>
        
        <div style=" padding: 10px 20px; text-align: center; width: 90%; margin: auto;">
            <h2 style="font-weight: normal;">One Time Password</h2>
            
            <p>Dear esteemed customer, This email was sent to you because a transfer was initiated by someone on your account. If this was not you, please login to your account and change your password.
            <br> <br>
                
            If you initiated the transfer, please find below your One time Password.
            <br> <br>
            ' . $token . '
            
            </p>
            
        
        </div>
    </div>
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('One Time Password'))
    //$from = array('admin@metrochartered.com');
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}



function sendCashoutConfirm($userEmail, $username, $amount, $hash){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cashout notification</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 220px; margin: 0px auto 0px auto">
        <div style="height: 30px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 0px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="120px"></h1>
        </div>
        
        <div style=" padding: 20px 20px; text-align: center; width: 90%; margin: auto;">
            
            <p>Hello '. $username . ', this is to notify you that your cashout of $' . $amount . ' has been paid to your specified wallet. Thank you.</p>
            
            Transaction hash is <br>
            
            ' . $hash . '
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 600px; margin: auto" src="https://metrochartered.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Cashout Notification'))
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}

function sendVerification($userEmail, $username, $token){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 700px; height: max-content; margin: 0px auto; padding:0px 0px 10px 0px" >
        <div style="height: 30px;">
            <h1 style="margin: 0px\; width: 95%; text-align: left; padding-top: 0px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 0px 0px 0px; text-align: left; width: 90%; font-size: 1em; margin: auto;">
            
            <p>Hello '. $username . ', Welcome to metrochartered, Thank you for allowing us to help you with your recent account opening. We are committed to providing our customers with the highest level of service and the most innovative Grouping products possible. <br> <br>

            We are very glad you chose us as your financial institution and hope you will take advantage of our wide variety of savings, investment and loan products, all designed to meet your specific needs.
            <br> <br>
                If this account was created by you, please click the button below to verify your account.
                <a href="https://metrochartered.com/register/signin.php?token=' . $token. '" style="color: white; background: green; padding: 15px 20px; border-radius: 5px; text-decoration: none; display: block; margin-top: 25px; font-family: lora, Merriweather">Verify Email</a>
            <br>
            <p>Kind Regards,</p>
            <p>Metro Chartered Bank.</p>
            
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 700px; margin: auto" src="https://metrochartered.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Welcome to metrochartered'))
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


function emailUsers($userEmail, $username, $userMessage, $subject){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 700px; height: max-content; margin: 0px auto; padding:0px 0px 10px 0px" >
        <div style="height: 30px;">
            <h1 style="margin: 0px\; width: 95%; text-align: left; padding-top: 0px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 0px 0px 0px; text-align: left; width: 90%; font-size: 1em; margin: auto;">
            
            <p>Hello '. $username . ', ' . $userMessage . '
                
                
            <br>
            <p>Kind Regards,</p>
            <p>Metro Chartered Bank.</p>
            
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 700px; margin: auto" src="https://metrochartered.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message(" $subject "))
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}

function sendUpgrade($userEmail, $username){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Registration</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 700px; height: max-content; margin: 0px auto; padding:0px 0px 10px 0px" >
        <div style="height: 30px;">
            <h1 style="margin: 0px\; width: 95%; text-align: left; padding-top: 0px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 0px 0px 0px; text-align: left; width: 90%; font-size: 1em; margin: auto;">
            
            <p>Hello '. $username . ', You are receiving this email because we are updating the Metro Chartered Bank Terms of Service ("Terms") to clarify our terms and provide transparency to our users. The Terms were similarly updated in March 2021. These changes should not significantly alter your access or use of the Metro Chartered Bank service. <br> <br>

            A summary of the changes: <br> <br>

            Age restrictions: You must be at least 16years of age before you can proceed to enrol on our program.
            Nonetheless, those below 16years who are interested in our firm can join our Children program and must also have a guider who is a bonafide member of Metro Chartered Bank. <br> <br>

            Transfer restrictions: The Terms of Service already state that you cannot make the transfer to another member of Metro Chartered Bankunless you have deposited up to $3000. While this has always been $500 the new Terms make that explicitly clear. <br> <br>

            Withdrawal limits: Our withdrawal is set to $160 - $500,000 daily. You can not withdraw below or above that under any circumstances within 24hours. <br> <br> 

            Please make sure that you read theseupdates to the Terms carefully. The new Terms will fully take effect on 26 May 2021. By continuing to use metrochartered after this date, you are agreeing to the new Terms.  <br> 


            <br>
            <p>Kind Regards,</p>
            <p>Metro Chartered Bank.</p>
            
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 700px; margin: auto" src="https://metrochartered.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message("Terms of Service"))
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}





function sendMessage($userEmail, $fullname, $email, $message){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cashout notification</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 220px; margin: 0px auto 0px auto">
        <div style="height: 30px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 0px; color: white; "><img src="https://metrochartered.com/img/logo.jpg" width="120px"></h1>
        </div>
        
        <div style=" padding: 0px 20px; text-align: center; width: 90%; margin: auto;">
            
            <p>Hello Admin, i am '. $fullname . ', and i can be contacted via '  . $email . '. <br> ' . $message. '
                
            </p>
            
        </div>
    </div>
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Sent from metrochartered</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; metrochartered, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('New Message'))
    ->setFrom('admin@metrochartered.com', 'Metro Chartered Bank')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


?>