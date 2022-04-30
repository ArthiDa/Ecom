<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<br> <br> <br> <br> <br> <br> <br> <br> 

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
                            <li class="scroll-to-section"><a href="#top">Catagories</a></li>
                            <li class="scroll-to-section"><a href="#men">Products</a></li>



                            <li class="scroll-to-section"><a href="login.php">Login</a></li>
                            <li class="scroll-to-section"><a href="signup.php">Signup</a></li>

                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** SEARCH ***** -->
                    
                       
                       
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

<?php
        if(isset($_GET['catagory_id']))
        {
            //Get the Product id and details of the selected product
            $catagory_id = $_GET['catagory_id'];
            
            $sql = "SELECT * FROM catagory WHERE catagoryID = $catagory_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count==1){
                $row = mysqli_fetch_assoc($res);
                $banner = $row["ImgBanner"];
                $name = $row["Name"];
            }
        }
    ?>

<div class="container">

  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
        <a href="../Ecom/single-product.php"><img src="img/laptops.jpg" alt="Lights" style="width:100%"></a>  
          <div class="caption">
              <h3>Iphone 11 Pro Max </h3>
            <p>Price : 1000 USD</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
          <a href="../Ecom/single-product.php"><img src="img/laptops.jpg" alt="Lights" style="width:100%"></a> 
          <div class="caption">
              <h3>Iphone 11 Pro Max </h3>
            <p>Price : 1000 USD</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
          <img src="../Ecom/img/laptops.jpg" alt="Lights" style="width:100%">
          <div class="caption">
              <h3>Iphone 11 Pro Max </h3>
            <p>Price : 1000 USD</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
          <img src="../Ecom/img/laptops.jpg" alt="Lights" style="width:100%">
          <div class="caption">
              <h3>Iphone 11 Pro Max </h3>
            <p>Price : 1000 USD</p>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
          <img src="../Ecom/img/laptops.jpg" alt="Lights" style="width:100%">
          <div class="caption">
              <h3>Iphone 11 Pro Max </h3>
            <p>Price : 1000 USD</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

</body>
</html>


