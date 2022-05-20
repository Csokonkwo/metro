<?php

include("../path.php");
require("server.php");
$pageName = "Profile";
$user = selectOne('users', ['id' => $_SESSION['id']]);

if(isset($_SESSION['business'])){
    $business = selectOne('address', ['user_id' => $_SESSION['id']]);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require("head.php") ?>

<body>
    <?php include("header.php") ?>
        
       <div class="profile"> 
           <div class="container">
               <div class="left">
                    <?php if(isset($user['image'])): ?>
                   <img src="img/img/<?php echo $user['image']?>">
                    <?php else: ?>
                    <img src="img/img/profile.jpg">
                    <?php endif; ?>

                   <h2><?php echo $user['username'] ?></h2>
                   <?php $status = selectOneDesc('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'investment']) ?>
                   <p>Account<a><?php if(isset($_SESSION['business'])) {echo "Business";} else{echo "Personal";} ?></a></p>
                   <p>Account Balance<a>$<?php echo $balance ?></a></p>
                   <p>Account Type <a> <?php echo $_SESSION['type']; ?></a></p>                    
                   <?php $status = selectOne('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'deposit', 'status' => 'confirmed']);
                   if(isset($status)){$status_color = "green";} else{$status_color = "red";} 
                   ?>
                   <p style = "color:<?php echo $status_color ?>">Status <a><?php if(isset($status)){echo 'Active';} else{echo "Inactive"; }?> </a></p>

                   <?php if($user['verified']){$verified_color = "green";} else{$verified_color = "red";}  ?>
                   <p style = "color:<?php echo $verified_color ?>">Verified <a><?php if($user['verified']){echo 'Yes';} else{echo "No"; }?> </a></p>
                   <?php $referrer = selectOne('users', ['id' => $user['referrer_id']]); ?>
                   
                   <?php if(!isset($user['image'])): ?>
                   <form method="POST" enctype="multipart/form-data">
                        <?Php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?>.</li>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                       <input type="file" name="image" enctype="multipart/form-data">
                       <button type="submit" name="upload_image"> Upload Image</button>
                   </form>
                    <?php endif; ?>
               </div>
               
               <div class="right">
                   <div class="head">
                       <a href="../register/update_profile.php">Update Profile</a>
                       <a href="../register/update_password.php">Change Password</a>
                   </div>
                   
                   <div class="content">
                       <h2>Account Details</h2>
                       <?php if(isset($user['firstname'])){$user_color = "green";} else{$user_color = "red";}  ?>
                       <p style = "color:<?php echo $user_color ?>">Fullname <span><?php if(isset($user['firstname'])){echo $user['firstname'] . ' '; echo $user['lastname'] ;} else{echo '<a style ="color:' . $user_color . '" href="../register/update_profile.php"> Please update profile </a>';}?> </span></p>
                       <p>Username <span><?php echo $user['username'] ?></span></p>
                       <p>Email<span><?php echo $user['email'] ?></span></p>
                       <p style = "color:<?php echo $user_color ?>">Mobile<span><?php if(isset($user['phone'])){echo $user['phone'];} else{echo '<a style ="color:' . $user_color . '" href="../register/update_profile.php"> Update profile </a>';}?></span></p>
                       
                       <?php if(!isset($_SESSION['business'])):?>
                       <p style = "color:<?php echo $user_color ?>">Gender<span><?php if(isset($user['gender'])){echo $user['gender'];} else{echo '<a style ="color:' . $user_color . '" href="../register/update_profile.php"> Update profile </a>';}?></span></p>
                       <?php else: ?>
                        
                        <p>Street<span><?php echo $business['street'] ?></span></p>
                        <p>City<span><?php echo $business['city'] ?></span></p>
                        <p>State<span><?php echo $business['state'] ?></span></p>
                        
                        <?php endif; ?>
                        <p>Country<span><?php echo $user['country'] ?></span></p>
                       <p>Date Created<span><?php echo date('F j, Y.', strtotime($user['created_at'])) ?></span></p>
                       <p>
                            Referral Link: <br> <br> <input type="text" id="myInput" value="https://<?php echo $companyEmail?>.com/register/signup.php?ref=<?php echo $_SESSION['id'] ?>"> <button onclick="copyItem()">Copy Link</button>
                            <br><br> https://<?php echo $companyEmail?>.com/register/signup.php?ref=<?php echo $_SESSION['id'] ?>
                       </p>
                   </div>
               </div>
           
           </div>
        </div>
        
        
        
        <?php include("footer.php") ?>
    
</body>
</html>