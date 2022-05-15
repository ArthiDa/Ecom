<?php include('MenuXFooter/menu.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add New Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>/customers.php">Customers</a></li>
          <li class="breadcrumb-item active">AddCustomer</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <!-- Profile Edit Form -->
    <h5 class="card-title">Customer Details</h5>
    <?php
        if(isset($_SESSION['failed'])){
            echo $_SESSION['failed'];
            unset($_SESSION['failed']);
        }
    ?>
    <form action="" method="POST">
        <div class="row mb-3">
            <label for="Name" class="col-md-4 col-lg-3 col-form-label">Name</label>
            <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" id="Name" placeholder="Enter Name (eg:Turjo)" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="Email" placeholder="Enter Email" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Password" class="col-md-4 col-lg-3 col-form-label">Password</label>
            <div class="col-md-8 col-lg-9">
            <input name="pass" type="password" class="form-control" id="password-field" placeholder="Enter Password" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
            <input name="address" type="text" class="form-control" id="Address" placeholder="Enter Adress" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
            <div class="col-md-8 col-lg-9">
            <input name="country" type="text" class="form-control" id="Country" placeholder="Enter Country" required>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="Submit" class="btn btn-primary"></input>
        </div>
    </form><!-- End Profile Edit Form -->
</main>

<?php
    if(isset($_POST['Submit'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = md5($_POST['pass']);
      $address = $_POST['address'];
      $country = $_POST['country'];
      $date = date('Y-m-d');
      try{
        $sql = "INSERT INTO customer SET
        Email = '$email',
        Name = '$name',
        Passwords = '$password',
        Address = '$address',
        Country = '$country',
        Status = 1,
        Dates = '$date'";
        $res = mysqli_query($conn, $sql);
        if($res==true){
          $_SESSION['create'] =  "<div class='alert alert-success' role='alert'> Customer Added Succesfully.</div>";
          ?>
          <script>
            window.location.href = "<?php echo SITEURL;?>/customers.php";
          </script>
          <?php
        }
      } catch (mysqli_sql_exception $e){
        $_SESSION['failed'] = "<div class='alert alert-danger' role='alert'> Email ID Already Exist...</div>";
        ?>
        <script>
            window.location.href = "<?php echo SITEURL;?>/addCustomer.php";
          </script>
        <?php
      }
    }
?>


<?php include('MenuXFooter/footer.php') ?>