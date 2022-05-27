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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
    
    <!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
</head>
<style>
  input[type=text] {
  width: 100px;
  height: 50px;
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
  transform-origin: top right;
}
 
input[type=text]:focus {
  width: 100%;
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
    <header class="header-area header-sticky ">
        <div class="container ">
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
                            <li class="scroll-to-section">
                                <form action="" method="POST">
                                <input type="text" name="search" placeholder="Search..">
                                <input type="submit" name="src" hidden>
                                </form>
                            </li>
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="products.php">Products</a></li>
                            <li class="scroll-to-section"><a href="contact.php">Contact</a></li>
                            
                            <?php
                            if (isset($_SESSION['login'])) {
                            ?>
                                <li class="scroll-to-section"><a href="profile.php"><?php echo $_SESSION['login']; ?></a></li>
                                <li class="scroll-to-section"><a href="<?php echo SITEURL; ?>logout.php">Logout</a></li>
                            <?php
                            } else {
                            ?>
                                
                                <li class="scroll-to-section"><a href="login.php">Login</a></li>
                            <?php
                            }
                            ?>
                            <li class="scroll-to-section position-relative" id="fchart"><a href="#"><span id="fchartquan" class="badge badge-danger" style="position: absolute;top: -4px;right: 35px;">0</span><i class="fa fa-2x fa-shopping-cart"></i></a></li>
                            
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
    <div class=" ">
        <div class="chart" id="chart">
            <div class="container">
                <div>
                    <span onclick="showItem()" class="btn text-xl float-right">❌</span>
                </div>
                <div class="row">
                    <div class="col-lg-12 table-responsive-sm">
                        <h1 class="text-xl  py-5 text-center text-uppercase text-danger py-5">Selected ITEMS</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="chartitem">
                                <!-- Show the order here -->
                                

                            </tbody>
                        </table>
                        <div>
                            <button class="btn btn-danger mx-auto d-block" onclick="clearChart()">CLEAR</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <style>
        .chart-container {
            overflow: hidden;
        }

        .chart {
            width: 80%;
            height: 100%;
            
            position: fixed;
            top: 0px;
            z-index: 100;
            box-shadow: 0 0 10px black;
            left: -110%;
            background: white;
            transition: all 0.5s;
            overflow-y: scroll;
        }

        .slidechart {
            left: 0;
        }
    </style>
    <!-- ***** Header Area End ***** -->

    <?php
        if(isset($_POST['src'])){
            $sText = $_POST['search'];
            $_SESSION['has'] = "$sText";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>search.php";
            </script>
            <?php
        }
    ?>