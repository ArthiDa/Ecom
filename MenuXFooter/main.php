<?php include('Connection/connect.php') ?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Hexashop</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    <style>
        input[type=text] {
  width: 100px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 10px 12px 20px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  z-index: 9999;
}

input[type=text]:focus {
  width: 20%;
}
    </style>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
<!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                         <!-- ***** Logo End ***** -->

                         <!-- ***** Menu Start ***** -->
                         <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="index.php">Catagories</a></li>
                            <li class="scroll-to-section"><a href="products.php">Products</a></li>
                            <?php
                            if(isset($_SESSION['login'])){
                                 ?>
                                <li class="scroll-to-section"><a href="profile.php"><?php echo $_SESSION['login'];?></a></li>
                                <li class="scroll-to-section"><a href="<?php echo SITEURL;?>logout.php">Logout</a></li>
                                <?php
                            }
                            else{
                                 ?>
                                <li class="scroll-to-section"><a href="login.php">Login</a></li>
                                <li class="scroll-to-section"><a href="signup.php">Signup</a></li>
                                <?php
                            }
                            ?>
                            <li class="scroll-to-section"><a href="../Profile/index.php">Contact</a></li>
                            <li class="scroll-to-section"><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            <input type="text" name="search" placeholder="Search..">
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->