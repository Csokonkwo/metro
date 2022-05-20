<?php 

include("../path.php"); 
require("server.php");
$pageName = "Transfers";

$transfers = selectAll('transactionz', ['user_id' => $_SESSION['id'], 'type' => 'transfer']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("head.php") ?>
</head>

<body>
    
    <?php include("header.php"); ?>
    <?php $checkPin = selectOne('transfers', ['user_id' => $_SESSION['id']]); ?>
    <?php if(isset($checkPin)): ?>
    <a class="btnn" href="../register/change_pin.php">Change Transfer Pin</a>
    <?php else: ?>
    <a class="btnn" href="../register/create_pin.php">Create Transfer Pin</a>
    <?php endif; ?>
        <div class="deposit">
            <div class="container">
                <div class="left">
                    <form action="transfers.php" method="post">
                        <h3>Transfer</h3>

                        <?Php if(count($errors) > 0): ?>
                            <div class="alert alert-danger">
                                <?php foreach($errors as $error): ?>
                                <li><?php echo $error; ?>.</li>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>
                        
                        <select name="type" class="text-input" id="select_bank" oninput="bringOut()">
                            <option value="">Select Receiver's Bank</option>
                            <option value="premiertrustbank">Premier Trust Bank</option>
                            <?php $banks = selectAlpha('banks'); 
                            foreach ($banks as $bank):?>
                            <option value="<?php echo $bank['name']; ?>"><?php echo $bank['name']; ?></option>

                            <?php endforeach; ?>
                            
                        </select>

                       <div id="other_detail">
                            <input id="receiver_id" name="receiver_id" placeholder="Enter A/c Number" value="<?php echo $id ?>" oninput="checkLength(this)">
                            
                            <input placeholder="Account Name" type="text" id="receiverResponse" readonly>

                            <input id="amount" name="amount" placeholder="Enter amount, $<?php echo $balance ?> available" value="<?php echo $amount ?>" oninput="checkAmount(this)">
                            <label id="amount_response" for=""></label>

                            <h3>Authorization</h3>
                            <input id="pin" name="pin" placeholder="Enter Transfer Pin" oninput="checkPin(this)">
                            <label id="pin_response" for=""></label>
                            
                            <button type="submit" name="transfer">Continue</button>
                        </div>
                        
                    
                    </form>
                
                </div>
            </div>   
        </div>

        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> Transfer History</div>
                <div class="container">
                    <h3>Your Transfers</h3>
                    <table>
                        <thead>
                            <th>S/n</th>
                            <th>T_id</th>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Reciever</th>
                        </thead>

                        <tbody>
                        <?php foreach ($transfers as $key => $transfer): 
                            if($transfer['status'] == 'sent'){
                                $color='red'; 
                            }

                            if($transfer['status'] == 'received'){
                                $color='green'; 
                            }
                            
                            ?>

                            <tr>
                                <td style="color:<?php echo $color?>"><?php echo $key + 1 ?></td>
                                <td style="color:<?php echo $color?>"><?php echo $transfer['id'] ?></td>
                                <td style="color:<?php echo $color?>"><?php echo $transfer['amount'] ?></td>
                                <td style="color:<?php echo $color?>"><?php echo $transfer['reference'] ?></td>
                                <td style="color:<?php echo $color?>"><?php echo $transfer['status'] ?></td>
                                <td style="color:<?php echo $color?>"><?php echo $transfer['payment_method'] ?></td>
                                <td style="color:<?php echo $color?>"><?php echo date('F j, Y.', strtotime($transfer['created_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    
    <?php include("footer.php"); ?>

    
    <script> 
        var balance = "<?php echo number_format($balance, 0); ?>"
        var user_id = "<?php echo $_SESSION['id']; ?>"

    </script>
    
    <script src="js/ajax.js"></script>
    
</body>
</html>