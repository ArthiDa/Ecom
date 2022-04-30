<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/login css/style.css">

	

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

	</head>
	<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <! ***** Preloader End ***** -->
    
    
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
                            <li class="scroll-to-section"><a href="#top">Catagories</a></li>
                            <li class="scroll-to-section"><a href="products.php">Products</a></li>



                            <li class="scroll-to-section"><a href="login.php">Login</a></li>
                            <li class="scroll-to-section"><a href="#">Signup</a></li>

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
    <br> <br> <br> <br> 
	<body >
  <video autoplay muted loop id="myVideo">
  <source src="../Ecom/img/bg.mp4" type="video/mp4">
</video>
<style>
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
  overflow: hidden;
   object-fit: cover;
            
   filter: brightness(25%);
}

 </style>
  
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">

			</div>
			<div class="row justify-content-center">

				<div class="col-md-6 col-lg-4">

					<div class="login-wrap p-0">

		      	<h3 class="mb-4 text-center">Create a account</h3>

		      	<form action="#" class="signin-form">
		      		<div class="form-group">

		      			<input type="text" class="form-control" placeholder="Enter Your Name (eg:Turjo)" required>
		      		</div>

                      <div class="form-group">
		      			<input type="email" class="form-control" placeholder="Enter Email" required>
		      		</div>

              <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>

	            <div class="form-group">
	              <input type="number" class="form-control" placeholder="Phone Number" required>
	            
	            </div>

                <div class="form-group">
	              <input type="text" class="form-control" placeholder="Adress" required>
	           
	            </div>

              




	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Create Now</button>
	            </div>

	          </form>

		      </div>
				</div>
			</div>
		</div>
	</section>
  <?php include('MenuXFooter/footer.php') ?>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
</script>

	</body>
</html>

