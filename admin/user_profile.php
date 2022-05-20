<?php 

include('../path.php');
include('server.php');

$referrals = selectAll('users', ['referrer_id' => $_GET['user_id']]);
$user = selectOne('users', ['id' => $_GET['user_id']]);

if(isset($_GET['reset'])){
    $u_id = $_GET['user_id'];
    $_POST['password'] = 123456;
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    update('users', $u_id, $_POST);

    $_SESSION['message'] =  $user['username'] . "'s Password has been changed to 123456";
    $_SESSION['alert-class'] = "alert-success";

    header('location:' . BASE_URL .'/admin/users.php');
    exit();

    if($table == "transactionz"){
        header('location: history.php');
    }
}

if(isset($_POST['edit_profile'])){
    $u_id = $_POST['id'];
    unset($_POST['id'], $_POST['edit_profile']); 

    update('users', $u_id, $_POST);

    $_SESSION['message'] =  $user['username'] . " Profile Updated";
    $_SESSION['alert-class'] = "alert-success";

    header('location:' . BASE_URL .'/admin/user_profile.php?user_id=' . $u_id);
    exit();

    if($table == "transactionz"){
        header('location: history.php');
    }
}

$confirmedDeposits = calculateTotal('transactionz', $_GET['user_id'], 'deposit', 'confirmed');
$confirmedReferrals = calculateTotal('transactionz', $_GET['user_id'], 'referral', 'confirmed');
$confirmedInterests = calculateTotal('interests', $_GET['user_id'], 'interest', 'paid');
$confirmedCredits = calculateTotal('transactionz', $_GET['user_id'], 'transfer', 'received');
$confirmedNFPs = calculateTotal('interests', $_GET['user_id'], 'NFP_Payroll', 'confirmed');

$confirmedCashouts = calculateTotal2($_GET['user_id'], 'withdrawal');
$confirmedinvestments = calculateTotal2($_GET['user_id'], 'investment');
$confirmedDebits = calculateTotal('transactionz', $_GET['user_id'], 'transfer', 'sent');

$income = $confirmedDeposits + $confirmedReferrals + $confirmedInterests + $confirmedCredits + $confirmedNFPs;
$expenditure = $confirmedCashouts + $confirmedinvestments + $confirmedDebits;

$balance = $income - $expenditure;
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $companyName; ?> - Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Dosis:wght@700&family=Lora:ital@1&family=Noto+Sans&family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet"> 

    <script src="https://kit.fontawesome.com/27416b154a.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../app/css/style.css">
    <link rel="stylesheet" href="../app/css/main.css">
    
</head>
<body>
    
    <?php include("header.php"); ?>
    
    <main>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>

        <div class="deposit">
            <div class="container">
                <div class="left">
                <h3>Edit Profile </h3>
                    <form action="" method="post">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        
                        <?php endif ?>
                            <input type="hidden" name="id" value= "<?php echo  $user['id']; ?>" >
                        

                            <input type="text" name="username" value= "<?php echo  $user['username']; ?>" class="text-input" placeholder="<?php echo $user['username']; ?>" disabled>
                        
                            <input type="text" name="email" class="text-input" value= "<?php echo $user['email']; ?>" placeholder="<?php echo $user['email']; ?>">

                            <input type="text" name="referrer_id" class="text-input" value= "<?php echo $user['referrer_id']; ?>" placeholder="<?php echo $user['referrer_id']; ?>">

                            <input type="text" name="created_at" class="text-input" value= "<?php echo $user['created_at']; ?>" placeholder="<?php echo $user['created_at']; ?>">

                            <button type="submit" name="edit_profile" class="btn btn-big">Edit</button>
                        
                    </form>
                </div>
            </div>
        </div>


        <div class="profile"> 
           <div class="container">
               
               <div class="right">
                   <div class="head">
                   <a href="users.php"> &lt&lt Back </a>
                       <a href="user_profile.php?user_id=<?php echo $user['id'] ?>&reset=1">Reset Password</a>
                   </div>
                   
                   <div class="content">
                       <h2>Account Details</h2>
                       <p>Account Balance <span><?php echo $balance ?></span></p>
                       <p>Verified <span><?php echo $user['verified'] ?></span></p>
                       <p>Fullname <span><?php if(isset($user['firstname'])){echo $user['firstname'] . ' '; echo $user['lastname'] ;} else{echo '<a href="../register/update_profile.php"> Please update profile </a>';}?> </span></p>
                       <p>Username <span><?php echo $user['username'] ?></span></p>
                       <p>Email<span><?php echo $user['email'] ?></span></p>
                       <p>Mobile<span><?php if(isset($user['phone'])){echo $user['phone'];} else{echo '<a href="../register/update_profile.php"> Update profile </a>';}?></span></p>
                       <p>Country<span><?php echo $user['country'] ?></span></p>
                       <p>Gender<span><?php if(isset($user['gender'])){echo $user['gender'];} else{echo '<a href="../register/update_profile.php"> Update profile </a>';}?></span></p>
                       <p>Date Created<span><?php echo date('F j, Y.', strtotime($user['created_at'])) ?></span></p>
                       
                   </div>
               </div>
           
           </div>
        </div>
        
        

        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Transactions </div>
            <div class="container">
        <?php $transactions = selectAll('transactionz', ['user_id' => $_GET['user_id']]); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>User_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Reference</th>
                        <th>Date_created</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($transactions as $key => $transaction): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $transaction['id'] ?></td>
                            <td><?php echo $transaction['user_id'] ?></td>
                            <td><?php echo $transaction['amount'] ?></td>
                            <td><?php echo $transaction['type'] ?></td>
                            <td><?php echo $transaction['status'] ?></td>
                            <td><?php echo $transaction['reference'] ?></td>
                            <td><?php echo $transaction['created_at'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Interests </div>
            <div class="container">
        <?php $interests = selectAll('interests', ['user_id' => $_GET['user_id']]); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>User_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Date_created</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($interests as $key => $interest): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $interest['id'] ?></td>
                            <td><?php echo $interest['user_id'] ?></td>
                            <td><?php echo $interest['amount'] ?></td>
                            <td><?php echo $interest['type'] ?></td>
                            <td><?php echo $interest['created_at'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Referrals </div>
            <div class="container">
        <?php $referrer = selectOne('users', ['id'=> $_GET['user_id']]); ?>
            <h3> <?php echo $referrer['username'] ?>  's Downlines</h3>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>User_id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Invested</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($referrals as $key => $referral): ?>
                        <tr>
                        <?php $ifinvested = selectOne('transactionz', ['user_id'=> $referral['id'], 'type'=>'investment']); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $referral['id'] ?></td>
                            <td><?php echo $referral['username'] ?></td>
                            <td><?php echo $referral['email'] ?></td>
                            <td> <?php  if($ifinvested){ echo ('Yes');} else{echo ('No');} ?> </td>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </main>
    
    
    <?php include("footer.php"); ?>
    
</body>
</html>