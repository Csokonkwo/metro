<?php

include("path.php");
include(ROOT_PATH . "/includes/dbFunctions.php"); 
$pageName = "Home";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(ROOT_PATH . "/includes/head.php"); ?>

  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/hero.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . '/css/main.css' ?>">

</head>

<body>

  <?php include(ROOT_PATH . "/includes/header.php"); ?>

    <main>
        
        <div class="hero">
            <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-touch="true" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/image1.jpg">
                  <div class="container">
                    <div class="transp-black">
                      <div class="title">Banking that puts you first</div>
                      <div class="sub space-top-20 space-bottom-20">Nationwide access to free ATMs, Loans and other Necessities.</div>
                      <a href="<?php echo BASE_URL . '/register/signup.php' ?>" class="space-within-10">Get Started</a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/image2.jpg">
                  <div class="container">
                    <div class="transp-black">
                      <div class="title">Loans that get you moving</div>
                      <div class="sub space-top-20 space-bottom-20">Get your dream car with easy loans</div>
                      <a href="<?php echo BASE_URL . '/register/signin.php' ?>" class="space-within-10">Get Started</a>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="img/image3.jpg">
                  <div class="container">
                    <div class="transp-black">
                      <div class="title">Cards that help you do more</div>
                      <div class="sub space-top-20 space-bottom-20">Make everyday expenses without cash</div>
                      <a href="<?php echo BASE_URL . '/register/signup.php' ?>" class="space-within-10">Get Started</a>
                    </div>
                  </div>
                </div>

                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
              </div>
            </div>
        </div>
        
        <div class="b-login">
            <div class="container">
                <p>Internet banking login</p>
                <a href="<?php echo BASE_URL . '/register/signin.php' ?>">Personal (Individual/Corporate)</a>
                <a href="<?php echo BASE_URL . '/register/bsignin.php' ?>">Business</a>
            </div>
        
        </div>


        <div class="show">
            <div class="container">
                <ul>
                    <li>
                        <a href="<?php echo BASE_URL . '/register/signup.php' ?>"><img src="<?php echo BASE_URL . '/img/icons/account.png' ?>"></a> 
                        <a href="<?php echo BASE_URL . '/register/signup.php' ?>">Open Account</a>
                    </li>
                    
                    <li>
                        <a href=""><img src="<?php echo BASE_URL . '/img/icons/agent.png' ?>"></a> 
                        <a href="">Agent Banking</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASE_URL . '/contact.php' ?>"><img src="<?php echo BASE_URL . '/img/icons/contactus.png' ?>"></a> 
                        <a href="<?php echo BASE_URL . '/contact.php' ?>">Contact us</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASE_URL . '/about.php#map' ?>"><img src="<?php echo BASE_URL . '/img/icons/location.png' ?>"></a> 
                        <a href="<?php echo BASE_URL . '/about.php#map' ?>">Our Locations</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASE_URL . '/personal/calculator.php' ?>"><img src="<?php echo BASE_URL . '/img/icons/calculator.png' ?>"></a> 
                        <a href="<?php echo BASE_URL . '/personal/calculator.php' ?>">Loan Calculator</a>
                    </li>
                    
                    <li>
                        <a href="<?php echo BASE_URL . '/register/sustain.php' ?>"><img src="<?php echo BASE_URL . '/img/icons/sustain.png' ?>"></a> 
                        <a href="<?php echo BASE_URL . '/register/sustain.php' ?>">Sustainability</a>
                    </li>
                    
                </ul>
            </div>

        </div>
        
        
        <div class="serve">
            <div class="container">
                <div class="left">
                    <h1>ServingYou</h1>
                    <p>
                        Giant strides, big leaps and innovation has formed the basis of our heritage over the years. Indeed, we are woven into the fabric of society. <br> <br>

                        We are rooted in tradition but constantly leaning towards the future. We are excited about the days ahead. <br>
                    </p>
                    <a href="">Login Now</a>
                </div>
                
                <div class="right"></div>
                
            </div>
        </div>
        
        
        <div class="service counter_target">
            <div class="container">
            <?php $readings = selectStaz('posts', 3, ['published' => 1]);
              foreach($readings as $reading): 
            ?>
                <div class="box">
                    <img src="<?php echo BASE_URL . '/admin/img/'. $reading['image'] ?>">
                    <a href="single.php?id=<?php echo $reading['id'] ?>"><?php echo html_entity_decode(substr($reading['title'], 0, 100). '...'); ?></a>
                </div>
                <?php endforeach; ?>
            </div>
        
        </div>

        <div class="loan">
        <div class="container">
            <div class="box">
                <img src="img/loan/loan-1.png">
                
                <h3>Personal Loan @ 10.75%</h3>
                
                <p>
                    Unlimited Rewards. Enjoy Attractive Deals & Discounts. Flexible Payment Options. Global Usage Privilege
                </p>
            </div>
            
            <div class="box">
                <img src="img/loan/loan-2.png">
                
                <h3>Repayable in 12 to 60 EMIs</h3>
                
                <p>
                    Globally Accepted. Lowest Interest @ 20% Annually. Worldwide Cash Advance
                    Facility.
                </p>
            </div>
            
            <div class="box">
                <img src="img/loan/loan-3.png">
                
                <h3>Personal Loan @ 10.75%</h3>
                
                <p>
                    Get Credit Card Within 24 hours ! Up to 98% Cash Withdrawal Facilities by
                    Card Cheque
                </p>
            </div>
            
        </div>
        
    </div>

        
        <!-------------- Counter section --------->
        
        <div class="counter">
            <div class="container">
                <div class="box">
                    <p id="total_investors"></p> 
                    <p>Members</p>
                </div>
                
                <div class="box">
                    <p id="total_deposits"></p>
                    <p>Business Loan </p>
                </div>
                
                <div class="box">
                    <p id="total_withdrawals"></p>
                    <p>Student Loan</p>
                </div>
                
                <div class="box">
                    <p id="total_investments"></p>
                    <p>ROIs</p>
                </div>
            </div>
        
        </div>
    
    </main>

    <script src="js/counter.js"></script>
    <script> 
        //FOR COUNTER
        const countOne = new CountUp("total_investors", 0, 43250);
        const countTwo = new CountUp("total_deposits", 0, 10000000000);    
        const countThree = new CountUp("total_withdrawals", 0, 200000000 );
        const countFour = new CountUp("total_investments", 0, 3000000000);

        var counterPos = document.querySelector(".counter_target");
        var counterSticky = counterPos.offsetTop;


        window.onscroll = function() {myFunction()};


        function myFunction() {

            if (window.scrollY >= counterSticky) {
                countOne.start();
                countTwo.start();
                countThree.start();
                countFour.start();
            } 
            
        };

    </script>
    
    <?php include(ROOT_PATH . "/includes/footer.php"); ?>
    
</body>


</html>