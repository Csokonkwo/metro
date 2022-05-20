<?php 

include('../path.php');
include('server.php');

if(isset($_GET['verified'])){
    $verified = $_GET['verified'];
    $u_id = $_GET['u_id'];
    update('users', $u_id, ['verified'=> $verified]);
}

if(isset($_GET['ban'])){
    $ban = $_GET['ban'];
    $u_id = $_GET['u_id'];
    update('users', $u_id, ['ban'=> $ban]);
}

if(isset($_GET['transfer'])){
    $transfer = $_GET['transfer'];
    $u_id = $_GET['u_id'];
    update('users', $u_id, ['transfer'=> $transfer]);
}

if(isset($_GET['type'])){
    $type = $_GET['type'];
    $u_id = $_GET['u_id'];
    update('users', $u_id, ['type'=> $type]);
}
 
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
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-user"> </i> Users </div>
            <div class="container">
            <?php $users = selectAll('users'); ?>
            <table>
                    <thead>
                        <th>SN</th>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Referrer</th>
                        <th>Referrals</th>
                        <th>Date_created</th>
                        <th colspan="3">Actions</th>
                        
                    </thead>
                    
                    <tbody>
                    <?php foreach ($users as $key => $user): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['username'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['country'] ?></td>
                            <td><?php $usern = selectOne('users', ['id'=> $user['referrer_id'] ] ); if($usern){echo $usern['username'];} else{echo "None";}  ?></td>
                            <td> <a href="user_profile.php?user_id=<?php echo $user['id'] ?>">CHECK_PROFILE</a></td>
                            <td><?php echo date('F j, Y.', strtotime($user['created_at'])) ?></td>

                            <?php if($user['verified'] === 0): ?>
                            <td><a href="users.php?verified=1&u_id=<?php echo $user['id'] ?>" class="Verify">Verify</a></td>               
                            <?php else: ?>
                            <td><a href="users.php?verified=0&u_id=<?php echo $user['id'] ?>" class="Unverify">Unverify</a></td>
                            <?php endif; ?>

                            <?php if($user['ban'] === 0): ?>
                            <td><a href="users.php?ban=1&u_id=<?php echo $user['id'] ?>">Suspend</a></td>
                            <?php else: ?>
                            <td><a href="users.php?ban=0&u_id=<?php echo $user['id'] ?>">Unsuspend</a></td>
                            <?php endif; ?>

                            <?php if($user['transfer'] === 0): ?>
                            <td><a href="users.php?transfer=1&u_id=<?php echo $user['id'] ?>">Block_transfer</a></td>
                            <?php else: ?>
                            <td><a href="users.php?transfer=0&u_id=<?php echo $user['id'] ?>">Allow_transfer</a></td>
                            <?php endif; ?>

                            <?php if($user['type'] == 'solo'): ?>
                            <td><a href="users.php?type=premier&u_id=<?php echo $user['id'] ?>">Premier</a></td>
                            <?php else: ?>
                            <td><a href="users.php?type=solo&u_id=<?php echo $user['id'] ?>">Solo</a></td>
                            <?php endif; ?>

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