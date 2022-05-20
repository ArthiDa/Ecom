<?php include('MenuXFooter/menu.php') ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>/index.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $_SESSION['image'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['name'];?></h2>
              <h3><?php echo $_SESSION['status'];?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $_SESSION['facebook'];?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $_SESSION['github'];?>" class="linkedin"><i class="bi bi-github"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
            <?php
              if(isset($_SESSION['wrongpass'])){
                echo $_SESSION['wrongpass'];
                unset($_SESSION['wrongpass']);
              }
              if(isset($_SESSION['changeSuccess'])){
                echo $_SESSION['changeSuccess'];
                unset($_SESSION['changeSuccess']);
              }
              if(isset($_SESSION['notMatch'])){
                echo $_SESSION['notMatch'];
                unset($_SESSION['notMatch']);
              }
            ?>
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Change Password</button>
                </li>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $_SESSION['about'];?></p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['name'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Username</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['username'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['status'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['country'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['address'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Facebook Profile</div>
                    <div class="col-lg-9 col-md-8"><a href="<?php echo $_SESSION['facebook'];?>"><?php echo $_SESSION['facebook'];?></a></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Github Profile</div>
                    <div class="col-lg-9 col-md-8"><a href="<?php echo $_SESSION['github'];?>"><?php echo $_SESSION['github'];?></a></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="" method="POST">
                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass" type="password" class="form-control" id="passwotd" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newpassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpass" type="password" class="form-control" id="newpasswotd" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="confirmpassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="conpass" type="password" class="form-control" id="confirmpasswotd" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="change" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
    if(isset($_POST['change'])){
      $username = $_SESSION['username'];
      $pass = $_POST['pass'];
      $checkSql = "SELECT * from admin where Username='$username' AND Password='$pass'";
      $checkRes = mysqli_query($conn,$checkSql);
      $cnt = mysqli_num_rows($checkRes);
      if($cnt){
        $newPass = $_POST['newpass'];
        $conPass = $_POST['conpass'];
        if($newPass==$conPass){
          $changeSql = "UPDATE admin set
          Password = '$newPass' where Username = '$username'";
          $changeRes = mysqli_query($conn,$changeSql);
          if($changeRes){
            $_SESSION['changeSuccess'] = "<div class='alert alert-success' role='alert'> Password Changed Successfully.</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/users-profile.php";
              </script>
            <?php
          }
        }
        else{
          $_SESSION['notMatch'] = "<div class='alert alert-danger' role='alert'>New Password and Confirm Password didnot match.</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/users-profile.php";
              </script>
            <?php
        }
      }
      else{
        $_SESSION['wrongpass'] = "<div class='alert alert-danger' role='alert'> Wrong Password.</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/users-profile.php";
              </script>
            <?php
      }
    }
  ?>

<?php include('MenuXFooter/footer.php') ?>