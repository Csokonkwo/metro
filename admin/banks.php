<?php 

include('../path.php');
include('server.php');

 $banks = selectAll('banks'); 
 
if(isset($_GET['delete'])){
    $u_id = $_GET['u_id'];
    delete('banks', $u_id);
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
                <h3>Add bank </h3>
                    <form action="" method="post">
                        <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                        
                        <?php endif ?>

                            <input type="text" name="name" value = "<?php echo $name; ?>" class="text-input" placeholder="Bank name">
                        
                            <button type="submit" name="add_bank" class="btn btn-big">Submit</button>
                        
                    </form>
                </div>
            </div>
        </div>
        
        <div class="transaction">
            <div class="content"> <i class="fa fa-calendar"> </i> All banks</div>
            <div class="container">
            <?php $banks = selectAll('banks');  ?>
            <table>
                    <thead>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th colspan="1">Action</th>
                    </thead>
                    <tbody>
                    <?php foreach ($banks as $key => $bank): ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $bank['name'] ?></td>
                            <td><?php echo date('F j, Y.', strtotime($bank['created_at'])); ?></td>

                            <td><a href="banks.php?delete=1&u_id=<?php echo $bank['id'] ?>">delete</a></td>
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