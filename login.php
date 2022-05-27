<?php include('Connection/connect.php') ?>

<!doctype html>
<html lang="en">
  <head>
  	<title>HexaShop Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">

	<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  

	<?php
		if(isset($_SESSION['login'])){
			?>
			<script>
				window.location.href = "<?php echo SITEURL;?>";
			</script>
			<?php
		}
	?>
    
    
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
                            <li class="scroll-to-section"><a href="products.php">Products</a></li>
                            <li class="scroll-to-section"><a href="login.php">Login</a></li>
                            <li class="scroll-to-section"><a href="signup.php">Signup</a></li>

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
}	 </style>
  
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Welcome</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      			<h3 class="mb-4 text-center">Have an account?</h3>
						<form action="" method="POST">
							<div class="form-group">
								<input type="email" name="Email" class="form-control" placeholder="Enter Email" required>
							</div>
							<div class="form-group">
								<input id="password-field" type="password" name="Password" class="form-control" placeholder="Password" required>
								<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<?php
								if(isset($_SESSION['try'])){
									echo $_SESSION['try'];
									unset($_SESSION['try']);
								}
							?>
							<?php
								if(isset($_SESSION['create'])){
									echo $_SESSION['create'];
									unset($_SESSION['create']);
								}
							?>
							<div class="form-group">
								<input type="submit" name="login" value="Sign In" class="form-control btn btn-primary submit px-3">
							</div>
							<div class="form-group d-md-flex">
							<div class="w-50">
								<label class="checkbox-wrap checkbox-primary">Remember Me
											<input type="checkbox" checked>
											<span class="checkmark"></span>
											</label>
										</div>
										<div class="w-50 text-md-right">
											<a href="#" style="color: #fff">Forgot Password</a>
										</div>
							</div>
						</form>
	          			<p class="w-100 text-center">&mdash; <a href="signup.php" style="color: #fff">Or Click here to Sign up</a> &mdash;</p>
		      		</div>
				</div>
			</div>
		</div>
	</section>
	<?php
		if(isset($_POST['login'])){
			$email = $_POST['Email'];
			$password = md5($_POST['Password']);
			$sql = "SELECT * FROM customer WHERE Email='$email' AND Passwords ='$password' AND Status = 1";
        	//3. Execute the Query
        	$res = mysqli_query($conn, $sql);
        	//4. COunt rows to check whether the user exists or not
       		$count = mysqli_num_rows($res);
			   if($count==1)
			   {
				   $row = mysqli_fetch_assoc($res);
				   $name = $row['Name'];
				   $cid = $row['customerID'];
				   $_SESSION['login'] = $name;
				   $_SESSION['customer_id'] = $cid;
				   ?>
				   <script>
				   		window.location.href = "<?php echo SITEURL;?>";
					</script>
					<?php
			   }
			   else
			   {
				   //User not Available and Login FAil
				   $_SESSION['try'] = "<div class='error text-center'>Username or Password did not match.</div>";
				   ?>
				   <script>
				   		window.location.href = "<?php echo SITEURL;?>login.php";
					</script>
					<?php
			   }
		}
	?>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/quantity.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
<?php include('MenuXFooter/footer.php') ?>
	</body>
</html>

