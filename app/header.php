<header>
    <div  class="clearfix">
        <div class="logo"><a href="../index.php"><img src="<?php echo BASE_URL . '/img/logo.jpg' ?>"></a></div>

        <div class="menu-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <label> Hello, <?php echo $_SESSION['username']; ?></label>

        <div class="profile"><a href="profile.php"><img src="img/male.png"></a></div>
    </div>
    
    <div class="member_id">A/C Number: <?php echo $_SESSION['id']; ?></div>
    
    <div class="totald"><a href="transfers.php"> Transfers </a>
    </div>
    
    <div class="totale"> <a href="history.php">History </a>
    </div>
    
</header>


<aside class="nav">
    <ul>
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="profile.php"><i class="fa fa-user-edit"></i> My Profile</a></li>
        <li><a href="deposits.php"><i class="fa fa-money"></i> Deposits</a></li>
        <li><a href="transfers.php"><i class="fa fa-exchange"></i> Transfers</a></li>
        <li><a href="loan.php"><i class="fas fa-donate"></i> Loans</a></li>
        <li><a onclick="confirm('You are about to download the form for Debit Card')" href="doc/bcb_debit_card_form.pdf"><i class="fa fa-credit-card" download></i> Cards</a></li>
        <?php if($_SESSION['admin']): if($_SESSION['admin'] > 3): ?>
        <li><a href="../admin/index.php"><i class="fa fa-user"></i> Admin</a></li>
        <?php endif; endif; ?>
        <li><a href="history.php"><i class="fa fa-calendar"></i> History</a></li>
        <li><a href="index.php?logout=1"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
</aside>

    <main class="<?php if(isset($classs)){echo $classs;} ?>">
        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert <?php echo $_SESSION['alert-class'];?> ">
                <?php 
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                unset($_SESSION['alert-class']);
                ?>
            </div>
        <?php endif ?>
        
