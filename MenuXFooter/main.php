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
                            <li class="scroll-to-section"><a href="#social">Contact</a></li>
                            <?php
                            if(isset($_SESSION['login'])){
                                 ?>
                                <li class="scroll-to-section"><a href="profile.php"><?php echo $_SESSION['login'];?></a></li>
                                <li class="scroll-to-section"><a href="<?php echo SITEURL;?>logout.php">Logout</a></li>
                                <li class="scroll-to-section" ><a href="#" ><span id="fchart" class="badge badge-danger" style="position: absolute;top: -4px;right: 35px;">0</span><i class="fa fa-2x fa-shopping-cart"></i></a></li>
                                <?php
                            }
                            else{
                                 ?>
                                <li class="scroll-to-section"><a href="login.php">Login</a></li>
                                <li class="scroll-to-section"><a href="signup.php">Signup</a></li>
                                <?php
                            }
                            ?>
                            
                           
                            <div class="search-box ">
                                <input class="search-txt  d-none" type="text" name="" placeholder="Type to search">
                                <a class="" href="#">
                                    <i class="fa fa-2x fa-search" id="sbtn"></i>
                                </a>
                        </div>
                        
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