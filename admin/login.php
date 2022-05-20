<?php include("connection/connect.php")?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header text-center">
				<h3>Sign In</h3>
			</div>
            <?php
                if(isset($_SESSION['failed'])){
                    echo $_SESSION['failed'];
                    unset($_SESSION['failed']);
                }
            ?>
			<div class="card-body">
				<form action="" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pass" class="form-control" placeholder="password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
                    <br>
					<div class="d-flex justify-content-center form-group">
						<input type="submit" name="login" value="Login" class="btn float-right login_btn">
					</div>
                    <div class="d-flex justify-content-center">
                        <a href="../index.php" class="logo">
                            <img src="../assets/images/logo.png">
                        </a>
				    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $adminSql = "SELECT * from admin where Username='$username' AND Password='$pass'";
        $adminRes = mysqli_query($conn,$adminSql);
        $conn = mysqli_num_rows($adminRes);
        if($conn){
            $row = mysqli_fetch_assoc($adminRes);
            $id = $row['ID'];
            $about = $row['About'];
            $name = $row['Name'];
            $add = $row['Address'];
            $con = $row['Country'];
            $fb = $row['Facebook'];
            $status = $row['Status'];
            $github = $row['Github'];
            $img = $row['Img'];
            $_SESSION['name'] = $name;
            $_SESSION['address'] = $add;
            $_SESSION['country'] = $con;
            $_SESSION['status'] = $status;
            $_SESSION['facebook'] = $fb;
            $_SESSION['github'] = $github;
            $_SESSION['image'] = $img;
            $_SESSION['username'] = $username;
            $_SESSION['adminID'] = $id;
            $_SESSION['about'] = $about;
            $_SESSION['logged-in'] = "Success";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>";
              </script>
            <?php
        }
        else{
            $_SESSION['failed'] = "<div class='alert alert-danger' role='alert'> Username and Password didnot match.</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/login.php";
              </script>
            <?php
        }
    }
?>
</body>
</html>