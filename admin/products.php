<?php include('MenuXFooter/menu.php') ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
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
                  <h5 class="card-title">Product List</h5>
                    <a href="<?php echo SITEURL;?>/addProduct.php" class="btn btn-primary">Add Product</a>
                    <br>
                    <br>
                    <?php
                      if(isset($_SESSION['addSuccess'])){
                        echo $_SESSION['addSuccess'];
                        unset($_SESSION['addSuccess']);
                      }
                    ?>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $prSql = "SELECT * FROM `product`";
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
                                    $status = "btn btn-success";
                                }
                                else{
                                    $button = "Out Stock";
                                    $status = "btn btn-danger";
                                } 
                                ?>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo Siteurl;?>img/<?php echo $image;?>" alt="" height="50px"></a></th>
                                    <td><?php echo $product;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $des;?></td>
                                    <td><a href="<?php echo SITEURL;?>/statusProduct.php?pid=<?php echo $id;?>" class="<?php echo $status;?>"><?php echo $button;?></a></td>
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