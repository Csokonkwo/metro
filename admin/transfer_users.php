<?php 

include('../path.php');
include('server.php');

if(isset($_GET['reset'])){
    $u_id = $_GET['user_id'];
    $_POST['pin'] = 1234;
    $_POST['pin'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    update('Transfers', $u_id, $_POST);

    $_SESSION['message'] =  "Pin has been changed to 1234";
    $_SESSION['alert-class'] = "alert-success";

    header('location:' . BASE_URL .'/admin/transfer_users.php');
    exit();
}

$transfers = selectAll('transfers');
 
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
            <div class="content"> <i class="fa fa-calendar"> </i> All Transfers History</div>
            <div class="container">

            <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>Transfer_token</th>
                        <th>Date</th>
                        <th colspan="1">Action</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($transfers as $key => $transfer): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $transfer['user_id']]); 
                        if ($userT != TRUE){
                            $userT = selectOne('bank_accounts', ['user_id' => $transfer['user_id']]);
                        }
                        
                        ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $transfer['token'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($transfer['created_at'])) ?></td>
                            
                            <td><a href="transfer_users.php?user_id=<?php echo $transfer['user_id'] ?>&reset=1">Reset Pin</a></td>
                            
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