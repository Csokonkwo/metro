<?php

include("../path.php");
require("server.php");
$pageName = "Transaction History";
$transactions = selectAll('transactionz', ['user_id' => $_SESSION['id']]);

$color = "black";

?>

<!DOCTYPE html>
<html lang="en">

<?php require("head.php") ?>

<body>
    <?php include("header.php") ?>
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Transactions</div>
            <div class="container">
                
                <table>
                    <thead>
                        <th>S/n</th>
                        <th>Trans_id</th>
                        <th>amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Date</th>
                    </thead>

                    <tbody>
                    <?php foreach ($transactions as $key => $transaction):

                    if($transaction['type'] == 'deposit' || $transaction['status'] == 'received'){
                        $color='green'; 
                    }

                    if($transaction['type'] == 'withdrawal' || $transaction['status'] == 'sent'){
                        $color='red'; 
                    }

                    if($transaction['type'] == 'loan'){
                        $color='red'; 
                    }

                    if($transaction['type'] == 'interest'){
                        $color='green'; 
                    }


                    ?>
                    <tr>
                    <td style="color:<?php echo $color?>"><?php echo $key + 1 ?></td>
                    <td style="color:<?php echo $color?>"><?php echo $transaction['id'] ?></td>
                    <td style="color:<?php echo $color?>"><?php echo '$'. $transaction['amount'] ?></td>
                    <td style="color:<?php echo $color?>"><?php echo $transaction['type'] ?></td>
                    <td style="color:<?php echo $color?>"><?php echo $transaction['status'] ?></td>
                    <td style="color:<?php echo $color?>"><?php echo date('F j, Y.', strtotime($transaction['created_at'])); ?></td>

                    </tr>

                    <?php endforeach; ?>
                    </tbody>

                </table>
                
            </div>
        </div>
        
        <?php include("footer.php") ?>
    
</body>
</html>