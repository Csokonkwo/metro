<?php 

include("../path.php"); 
require("server.php");

$deposits = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'deposit']);
$pageName = "Deposits"

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>

</head>

<body>
    <?php include("header.php"); ?>
        
        <div class="deposit">
            <div class="container">
                <div class="left">
                    <h3>Make a deposit ($) </h3>
                    <form method="POST" enctype="multipart/form-data">

                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>

                        <select name="payment_method" id="payment-method">
                            <option value="">Select payment method</option>
                            <option value="other">Other Methods</option>
                        </select>
                        
                        <p id="wallet-address"> </p>
                       
                        <input type="text" placeholder="Enter amount only" name="amount" id="invest-amount" value="<?php echo $amount ?>">
                        
                        <input type="file"  placeholder="Select " name="reference">
                        
                        <button name="deposit" type="submit">Submit</button>
                    
                    </form>
                </div>
                
                
            
            </div>
        
        </div>
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Deposit History</div>
            <div class="container">
                
                <table>
                    <thead>
                        <th>S/n</th>
                        <th>T_id</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </thead>

                    <tbody>
                    <?php foreach ($deposits as $key => $deposit): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $deposit['id'] ?></td>
                            <td><?php echo number_format($deposit['amount'], 2) ?></td>
                            <td><?php echo $deposit['status'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($deposit['created_at'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                
            </div>
        </div>
    
        <?php include("footer.php") ?>
    
</body>
    
</html>