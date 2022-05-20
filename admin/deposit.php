<?php 

include('../path.php');
include('server.php');

if(isset($_GET['status'])){
    $status = $_GET['status'];
    $t_id = $_GET['t_id'];
    update('transactionz', $t_id, ['status'=> $status]);
}

$deposits = selectAll('transactionz', ['type' => 'deposit']);
 
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
            <div class="content"> <i class="fa fa-calendar"> </i> All Deposit History</div>
            <div class="container">

            <table>
                    <thead>
                        <th>SN</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>amount</th>
                        <th>Currency</th>
                        <th>Trans_Hash</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="3">Action</th>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($deposits as $key => $deposit): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $deposit['user_id']]); ?>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $userT['username'] ?></td>
                            <td><?php echo $deposit['id'] ?></td>
                            <td><?php echo $deposit['amount'] ?></td>
                            <td><?php echo $deposit['payment_method'] ?></td>
                            <td><a href="check.php?t_id=<?php echo $deposit['id']?>" >CHECK</a></td>
                            <td><?php echo $deposit['type'] ?></td>
                            <td><?php echo $deposit['status'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($deposit['created_at'])) ?></td>
                            
                            <td><a href="deposit.php?status=pending&t_id=<?php echo $deposit['id']?>" >Pending</a></td>
                            <td><a href="deposit.php?status=confirmed&t_id=<?php echo $deposit['id']?>" >Confirm</a></td>
                        
                            <td><a href="deposit.php?status=cancelled&t_id=<?php echo $deposit['id']?>">Cancel</a></td>
                            
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