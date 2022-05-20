<header>

    <div class="topbar">
      <ul class="left">

        <a href="<?php echo BASE_URL . '/personal/index.php' ?>">Personal</a>
        <a href="<?php echo BASE_URL . '/index.php' ?>" class="active">Home</a>
        <a href="<?php echo BASE_URL . '/business/index.php' ?>">Business</a>
        <a href="<?php echo BASE_URL . '/about.php' ?>">About</a>
        <a class="search-btn"><i class="fa fa-search"></i></a>
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
        <a href="<?php echo BASE_URL . '/register/signin.php' ?>" class="space-within-10 hide-desktop">Online Banking</a>
        <a href="<?php echo BASE_URL . '/register/signin.php' ?>" class="space-within-10 hide-mobile">Login</a>

      </ul>
    </nav>

  </header>
  

  <div class="search-form">
      <form action="<?php echo BASE_URL . '/search.php'?>" method="post">
          <input type="text" name="search_term"  placeholder="Search..." id="searcher">
      </form>
  </div>
  <div class="search-cancel"><i class="fa fa-close" style="font-size:15px;"></i></div>
    
<!-- preloader -->
    <div class="preloader">
        <div class="loader">
            <img src="<?php echo BASE_URL . '/img/loader.svg' ?>" />
        </div>
    </div>
