<?php include('MenuXFooter/menu.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Customers</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item active">Customers</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
              <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">

                    <h5 class="card-title">Customer List</h5>
                    <a href="<?php echo SITEURL;?>/addCustomer.php" class="btn btn-primary">Add Customer</a>
                    <br>
                    <br>

                  <?php
                    if(isset($_SESSION['updated'])){
                        echo $_SESSION['updated'];
                        unset($_SESSION['updated']);
                    }
                    if(isset($_SESSION['cdltSucess'])){
                        echo $_SESSION['cdltSucess'];
                        unset($_SESSION['cdltSucess']);
                    }
                    if(isset($_SESSION['create'])){
                        echo $_SESSION['create'];
                        unset($_SESSION['create']);
                    }
                  ?>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $cSql = "SELECT * FROM `customer`";
                            $cRes = mysqli_query($conn,$cSql);
                            $cn=1;
                            while($cRow=mysqli_fetch_assoc($cRes)){
                                    $id = $cRow['customerID'];
                                    $email = $cRow['Email'];
                                    $name = $cRow['Name'];
                                    $country = $cRow['Country'];
                                    $add = $cRow['Address'];
                                    $date = $cRow['Dates'];
                                ?>
                                <tr>
                                    <th scope="row"><a href="#"><?php echo $cn++;?></a></th>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $add;?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>/updateCustomer.php?cid=<?php echo $id;?>" class="btn btn-outline-info">Update</a>
                                        <a href="<?php echo SITEURL;?>/deleteCustomer.php?cid=<?php echo $id;?>" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
          </div>
        </div>
      </div>
    </section>
</main>

<?php include('MenuXFooter/footer.php') ?>