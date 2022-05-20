<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Contact";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include(ROOT_PATH . "/includes/head.php"); ?>
<link rel="stylesheet" href="<?php echo BASE_URL . '/css/other.css' ?>">

</head>

<body>

<?php include(ROOT_PATH . "/includes/header.php"); ?>
    
    <main>
        
    <div class="contact">
        <div class="container">
            <div class="left">
                <h1>Get in Touch</h1>
                <p id="message-response" style="text-align:center; font-weight:bold;"> </p>
                <form onsubmit="return sendMessage()" id="message-form">
                    <input type="text" class="text-input" placeholder="Enter fullname" id="message-fullname">
                    <input type="email" name="" class="text-input" placeholder="Enter email" id="message-email">
                    <textarea name="message" placeholder="Your message..." cols="30" rows="10" id="message-message"></textarea>
                    <button type="submit">Send Message</button>
                </form>

                
            </div>

            <div class="right">
                <h1>Contact Info</h1>
                
                <p><i class="fa fa-envelope"></i> support@<?php echo $companyEmail;?>.com </p>
                <p><i class="fa fa-map-marker"></i> Head Office: 3rd Floor 44 Esplanade, St Helier, Jersey, JE4 9WG </p>
                <!--<p>
                    <a href="" id="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="" id="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="" id="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="" id="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="" id="whatsapp"><i class="fa fa-whatsapp"></i></a>
                </p> -->
            </div>
        </div>
    </div>
        
    
    </main>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    <script src="<?php echo BASE_URL . '/js/ajax.js' ?>"></script>

</body>


</html>