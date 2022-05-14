<?php include('MenuXFooter/menu.php') ?>

<?php 
    if(!isset($_GET['cid'])){
        ?>
        <script>
            window.location.href = "<?php echo SITEURL;?>";
        </script>
        <?php
    }
?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Customer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>/customers.php">Customers</a></li>
          <li class="breadcrumb-item active">UpdateCustomer</li>
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
        <?php
            $id = $_GET['cid'];
            $upcSql = "SELECT * From `customer` WHERE customerID = $id";
            $upcRes = mysqli_query($conn,$upcSql);
            $count = mysqli_num_rows($upcRes);
            if($count==0){
                ?>
                <script>
                    window.location.href = "<?php echo SITEURL;?>";
                </script>
                <?php
            }
            else{
                $crow = mysqli_fetch_assoc($upcRes);
                $email = $crow['Email'];
                $name = $crow['Name'];
                $country = $crow['Country'];
                $add = $crow['Address'];
                $date = $crow['Dates'];
                $pass = $crow['Passwords'];
            }
        ?>
        <div class="row mb-3">
            <label for="Name" class="col-md-4 col-lg-3 col-form-label">Name</label>
            <div class="col-md-8 col-lg-9">
            <input name="name" type="text" class="form-control" id="Name" value="<?php echo $name;?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
            <input name="email" type="email" class="form-control" id="Email" value="<?php echo $email;?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
            <div class="col-md-8 col-lg-9">
            <input name="address" type="text" class="form-control" id="Address" value="<?php echo $add;?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
            <div class="col-md-8 col-lg-9">
            <input name="country" type="text" class="form-control" id="Country" value="<?php echo $country;?>" required>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="change" class="btn btn-primary"></input>
        </div>
    </form><!-- End Profile Edit Form -->
</main>

    <?php
        if(isset($_POST['change']) && $upcRes){
            $newName = $_POST['name'];
            $newEmail = $_POST['email'];
            $newAdd = $_POST['address'];
            $newCountry = $_POST['country'];
            try{
                $updateSql = "UPDATE `customer` SET
                `Name` = '$newName',
                `Email` = '$newEmail',
                `Address` = '$newAdd',
                `Country` = '$newCountry' WHERE customerID = $id";
                $updateRes = mysqli_query($conn,$updateSql);
                if($updateRes){
                    $_SESSION['updated'] = "<div class='alert alert-success' role='alert'> Customer Details Updated Successfully.</div>";
                    ?>
                    <script>
                        window.location.href = "<?php echo SITEURL;?>/customers.php";
                    </script>
                    <?php
                }
            } catch(mysqli_sql_exception $e){
                $_SESSION['failed'] = "<div class='alert alert-danger' role='alert'> Email ID Already Exist...</div>";
                ?>
                <script>
                    window.location.href = "<?php echo SITEURL;?>/updateCustomer.php?cid=<?php echo $id;?>";
                </script>
                <?php
            }
        }
    ?>

<?php include('MenuXFooter/footer.php') ?>