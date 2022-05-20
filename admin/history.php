<?php 

include('../path.php');
include('server.php');

 $transactions = selectAll('transactionz'); 
 
if(isset($_GET['delete'])){
    $u_id = $_GET['u_id'];
    delete('transactionz', $u_id);
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

        <div class="deposit">
            <div class="container">
                <div class="left">
                <h3>Admin powered Transaction </h3>
                    <form action="" method="post">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        
                        <?php endif ?>

                            <input type="text" name="username" value= "<?php echo $username; ?>" class="text-input" placeholder="Username">
                        
                            <input type="text" name="amount" class="text-input" value= "<?php echo $amount; ?>" placeholder="Amount">

                            <select name="type" class="text-input">
                                <option value="deposit">Deposit</option>
                                <option value="withdrawal">Withdrawal</option>
                                <option value="referral">Referral</option>
                                <option value="interest">Interest</option>
                            </select>

                            <select name="status" class="text-input">
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="paid">Paid</option>
                            </select>
                        
                            <button type="submit" name="add_money" class="btn btn-big">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> All Transaction History</div>
            <div class="container">
            <?php $transactions = selectAll('transactionz');  ?>
            <table>
                    <thead>
                        <th>S/N</th>
                        <th>Username</th>
                        <th>T_id</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($transactions as $key => $transaction): ?>
                        <tr>
                        <?php $userT = selectOne('users', ['id' => $transaction['user_id']]); 
                            if($transaction['type'] == 'deposit' || $transaction['status'] == 'received'){
                                $color='green'; 
                            }
        
                            if($transaction['type'] == 'withdrawal' || $transaction['status'] == 'sent'){
                                $color='red'; 
                            }
                            
                            if($transaction['type'] == 'investment'){
                                $color='blue'; 
                            }
                            if($transaction['type'] == 'interest'){
                                $color='green'; 
                            }

                            if($transaction['type'] == 'referral'){
                                $color='green'; 
                            }
                        
                        ?>
                            <td style="color:<?php echo $color?>"><?php echo $key + 1 ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $userT['username'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['id'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo '$'. $transaction['amount'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['type'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo $transaction['status'] ?></td>
                            <td style="color:<?php echo $color?>"><?php echo date('F j, Y.', strtotime($transaction['created_at'])); ?></td>

                            <td><a href="edit.php?edit=1&t_id=<?php echo $transaction['id'] ?>">edit</a></td>
                            <td><a href="history.php?delete=1&u_id=<?php echo $transaction['id'] ?>">delete</a></td>
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