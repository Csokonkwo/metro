<header>
    <div  class="clearfix">
            <div class="logo"><a href="../index.php"><img src="<?php echo BASE_URL . '/img/logo.jpg' ?>"></a></div>

            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <label> Hello, <?php echo $_SESSION['username']; ?></label>

            <div class="profile"><a href="../app/profile.php"><img src="../app/img/male.png"></a></div>
        </div>
         
        
        <div class="totald">Pending Deposits
            <span> $<?php echo $pendingDeposits; ?> </span>
        </div>
        
        <div class="totale"><a href="users.php">Users </a>
        </div>
        
    </header>
    
    <aside>
        <ul>
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="history.php"><i class="fa fa-money"></i> History</a></li>
            <li><a href="loan.php"><i class="fas fa-donate"></i>Loans</a></li>
            <li><a href="users.php"><i class="fa fa-users"></i>Users</a></li>
            <li><a href="banks.php"><i class="fa fa-bank"></i>Add Bank</a></li>
            <li><a href="accounts.php"><i class="fa fa-bank"></i>Add Bank Account</a></li>
            <li><a href="transfer_users.php"><i class="fa fa-users"></i>Transfer Users</a></li>
            <li><a href="mailer.php"><i class="fa fa-envelope"></i> Mailer</a></li>
            <li><a href="postadd.php"><i class="fa fa-money"></i> Make Post</a></li>
            <li><a href="<?php echo BASE_URL. '/app/index.php' ?>?logout=1"><i class="fa fa-sign-out"></i> Sign out</a></li>
            <li><a href="<?php echo BASE_URL. '/app/index.php' ?>"><i class="fa fa-user"></i> App</a></li>
        </ul>

    </aside>