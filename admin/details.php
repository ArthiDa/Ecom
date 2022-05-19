<?php include('MenuXFooter/menu.php') ?>

<main id="main" class="main">
    <?php
        if(isset($_GET['PID'])){
            $id = $_GET['PID'];
            $prSql = "SELECT * FROM `product` where productID = $id";
            $prRes = mysqli_query($conn,$prSql);
            while($prow = mysqli_fetch_assoc($prRes)){
                $id = $prow['productID'];
                $cid = $prow['catagoryID'];
                $product = $prow['Title'];
                $image = $prow['ImgName'];
                $price = $prow['Price'];
                $des = $prow['Des'];
                $st = $prow["Status"];
                if($st==1){
                    $button = "In Stock";
                }
                else{
                    $button = "Out Stock";
                }
            }
            ?>
            <div class="pagetitle">
              <h1>Details</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
                  <li class="breadcrumb-item active">ProductDetails</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="../img/<?php echo $image;?>" alt="Profile" class="img-thumbnail" height="200px">
                    </div>
                    <div class="card-body pt-3">
                        <div class="tab-content">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Product Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8"><?php echo $product;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Description</div>
                                <div class="col-lg-9 col-md-8"><?php echo $des;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Price</div>
                                <div class="col-lg-9 col-md-8">$<?php echo $price;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Status</div>
                                <div class="col-lg-9 col-md-8"><?php echo $button;?></div>
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
            <?php
        }
        else if(isset($_GET['CID'])){
            $id = $_GET['CID'];
            $sql2 = "SELECT * FROM customer where customerID = $id";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            while($row=mysqli_fetch_assoc($res2)){
                $name = $row['Name'];
                $email = $row['Email'];
                $address = $row['Address'];
                $country = $row['Country'];
                $date = $row['Dates'];
                $st = $row["Status"];
                if($st==1){
                    $button = "Active";
                }
                else{
                    $button = "De-Active";
                }
            }
            ?>
            <div class="pagetitle">
              <h1>Details</h1>
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
                  <li class="breadcrumb-item active">CustomerDetails</li>
                </ol>
              </nav>
            </div><!-- End Page Title -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body pt-3">
                        <div class="tab-content">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Customer Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Name</div>
                                <div class="col-lg-9 col-md-8"><?php echo $name;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?php echo $email;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8"><?php echo $address;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Country</div>
                                <div class="col-lg-9 col-md-8"><?php echo $country;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Join</div>
                                <div class="col-lg-9 col-md-8"><?php echo $date;?></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Status</div>
                                <div class="col-lg-9 col-md-8"><?php echo $button;?></div>
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
            <?php
        }
        else{
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>";
              </script>
            <?php
        }
    ?>
</main>
<?php include('MenuXFooter/footer.php') ?>