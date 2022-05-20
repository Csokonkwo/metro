<?php 

$pageName = 'Sign in';
include("../path.php");

require_once 'server.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
<?php include(ROOT_PATH . "/includes/head.php"); ?>

    <link rel="stylesheet" href="form.css">

</head>

<body>
   
<header>

    <div class="topbar">
      <ul class="left">

        <a href="<?php echo BASE_URL . '/personal/index.php' ?>">Personal</a>
        <a href="<?php echo BASE_URL . '/index.php' ?>" class="active">Home</a>
        <a href="<?php echo BASE_URL . '/business/index.php' ?>">Business</a>
        <a href="<?php echo BASE_URL . '/about.php' ?>">About</a>
      </ul>

      <ul class="right">
        <a href="<?php echo BASE_URL . '/sustain.php' ?>">Sustainability</a>
        <a href="<?php echo BASE_URL . '/privacy.php' ?>">Privacy Policy</a>
        <a href="#">Europe</a>

      </ul>

    </div>

    <nav>

      <i class="fa fa-bars toggle-btn hide-mobile" onclick="toggleNav()"></i>
      <div class="logo">
        <img src="<?php echo BASE_URL . '/img/logo.jpg' ?>" alt="logo">
      </div>

      <ul class="nav-items">

        <li href="#">Personal<i class="fa fa-angle-down"></i>

          <ul class="dropdown">
            <a href="<?php echo BASE_URL . '/personal/index.php' ?>">Checking & Savings</a>
            <a href="<?php echo BASE_URL . '/personal/convenience.php' ?>">Convenience Services</a>
            <a href="<?php echo BASE_URL . '/personal/lending.php' ?>">Lending</a>
            <a href="<?php echo BASE_URL . '/personal/financial.php' ?>">Financial Planning</a>
            <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Personal Account</a>
          </ul>

        </li>
        <li href="#">Business<i class="fa fa-angle-down"></i>

          <ul class="dropdown">
            <a href="<?php echo BASE_URL . '/business/index.php' ?>">Checking & Savings</a>
            <a href="<?php echo BASE_URL . '/business/lending.php' ?>">Lending</a>
            <a href="<?php echo BASE_URL . '/business/financial.php' ?>">Financial Planning</a>
            <a href="<?php echo BASE_URL . '/register/bsignup.php' ?>">Business Account</a>
          </ul>

        </li>

        <li href="#">Mortgage<i class="fa fa-angle-down"></i>

          <ul class="dropdown">
            <a href="<?php echo BASE_URL . '/mortgage/index.php' ?>">Home Mortgage Loans</a>
            <a href="<?php echo BASE_URL . '/mortgage/residential.php' ?>">Residential Construction Loan</a>
          </ul>
        </li>

        <li href="#">Transfers<i class="fa fa-angle-down"></i>

          <ul class="dropdown">
            <a href="<?php echo BASE_URL . '/transfers/index.php' ?>">Transfers</a>
            <a href="<?php echo BASE_URL . '/transfers/western.php' ?>">Western Union</a>
            <a href="<?php echo BASE_URL . '/transfers/moneygram.php' ?>">Moneygram</a>
            <a href="<?php echo BASE_URL . '/transfers/ria.php' ?>">Ria Money Transfer</a>
          </ul>
        </li>

        <li> <a class="without" href="<?php echo BASE_URL . '/payments.php'?>">Payments </a>

          <ul class="dropdown">
          </ul>
        </li>

        <li> <a class="without" href="<?php echo BASE_URL . '/contact.php'?>">Contact </a>

          <ul class="dropdown">
          </ul>
        </li>
      </ul>

      <ul class="nav-right">
        <i class="fa fa-search hide-desktop"></i>
        <a href="<?php echo BASE_URL . '/register/signin.php' ?>" class="space-within-10 hide-desktop">Online Banking</a>
        <a href="<?php echo BASE_URL . '/register/signin.php' ?>" class="space-within-10 hide-mobile">Login</a>

      </ul>
    </nav>


  </header>
    
  
<main>

    <!-------------- Hero Section --------->
        

<div class="form">
           <div class="container">

                <form action="signin.php" method="POST" onSubmit="return validateForm(this)">
                    <h2>Member Login</h2>
                    
                    <?Php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?>.</li>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>

                    <div>
                        <i class="fa fa-user"></i>
                        <input id="l_user" type="text" name="user" placeholder="Username or Email" value="<?php echo $user; ?>" oninput="checkLength(this)">
                        <label id="l_user_2" for=""></label>
                    </div>

                    <div>
                        <i class="fa fa-lock"></i>
                        <input id = "pass" type="password" placeholder="Password" name="password" oninput="checkLength(this)">
                        <label id ="l_pass" for=""></label>
                    </div>

                    <div>
                        <button type="submit" name="log_in" class="btn"> Login</button>
                    </div>

                    <p class="">Not yet a member? <a href="signup.php">Sign up</a></p>
                    
                    <div style="font-size: 0.8em; text-align:center;"><a href="forgot_password.php"> forgot password?</a></div>

                </form>
           </div>
           
           <div class="right"></div>
       </div>

                    </main>


    <?php  include("../includes/footer.php"); ?>
       
</body>
</html>