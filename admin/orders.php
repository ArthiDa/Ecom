<?php include('MenuXFooter/menu.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Orders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item active">Orders</li>
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
                  <h5 class="card-title">Order List</h5>
                 

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $orderSql = "SELECT product.Title,product.Price,customer.Name,customer.Email,orders.Quantity,product.ImgName,orders.orderID
                            FROM orders
                            INNER JOIN product ON orders.productID = product.productID
                            INNER JOIN customer ON orders.customerID = customer.customerID ORDER BY orders.orderID DESC";
                            $orderRes = mysqli_query($conn,$orderSql);
                            while($orderrow=mysqli_fetch_assoc($orderRes)){
                                $product = $orderrow['Title'];
                                $price = $orderrow['Price'];
                                $name = $orderrow['Name'];
                                $email = $orderrow['Email'];
                                $image = $orderrow['ImgName'];
                                $id = $orderrow['orderID'];
                                ?>
                                <tr>
                                    <th scope="row"><a href="#"><img src="<?php echo Siteurl;?>img/<?php echo $image;?>" alt="" height="50px"></a></th>
                                    <td><?php echo $product;?></td>
                                    <td><?php echo $price;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><a href="<?php echo SITEURL;?>/deleteOrder.php?oid=<?php echo $id;?>" class="btn btn-outline-danger">Cancel</a></td>
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