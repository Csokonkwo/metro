<?php 

include("../path.php"); 
require("server.php");

$deposits = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'loan']);
$pageName = "Loan"

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
                    <h3>Loan Application </h3>
                    <form method="POST" enctype="multipart/form-data">

                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        <?php endif ?>

                        <select name="payment_method" id="payment_method" oninput = "bringOut()">
                            <option value="">Select payment method</option>
                            <option value="bitcoin">Bitcoin</option>
                            <option value="usdt">USDT</option>
                            <option value="bank">Bank Payment</option>
                        </select>
                        
                        <input type="text" placeholder="Enter amount, <?php if($_SESSION['type'] == 'solo'){echo 'Max $2000';} else{echo 'Max $20,000';}?> " name="amount" value="<?php echo $amount ?>">
                        
                        <input type="text" placeholder="Enter wallet address" name="reference" value="<?php echo $reference ?>" id="wallet_address" style = "display:none">
                        <input name="other_ref" placeholder="Bank Name" id="bank" style = "display:none">
                        <input name="other_date" placeholder="Account Number" id="banka" style = "display:none">
                        
                        <button name="loan" type="submit">Apply</button>
                    
                    </form>
                </div>
            
            </div>
        
        </div>

        <script>
            var payment_method = document.querySelector("#payment_method");
            var bank = document.querySelector("#bank");
            var banka = document.querySelector("#banka");
            var wallet = document.querySelector("#wallet_address");

            function bringOut(){
                if(payment_method.value == 'bank'){
                    bank.style ='display: block';
                    banka.style ='display: block';
                    wallet.style ='display: none';
                }
                if(payment_method.value == 'bitcoin' || payment_method.value == 'usdt'){
                    wallet.style ='display: block';
                    bank.style ='display: none';
                    banka.style ='display: none';
                }
                if(payment_method.value == ''){
                    bank.style ='display: none';
                    wallet.style ='display: none';
                    banka.style ='display: none';
                }

                
            }

        </script>
        
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Loans</div>
            <div class="container">
                
                <table>
                    <thead>
                        <th>S/n</th>
                        <th>T_id</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Form</th>
                    </thead>

                    <tbody>
                    <?php foreach ($deposits as $key => $deposit): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $deposit['id'] ?></td>
                            <td><?php echo number_format($deposit['amount'], 2) ?></td>
                            <td><?php echo $deposit['status'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($deposit['created_at'])); ?></td>
                            <td><a onclick="confirm('You are about to download the loan application form')"  href="doc/bcb_loan_application_form.pdf" download>Download</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
                
            </div>
        </div>
    
        <?php include("footer.php") ?>
    
</body>
    
</html>