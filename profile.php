<?php include('MenuXFooter/main.php') ?>
<main>
    <div class="main-banner">
        <!-- User Details Container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <img src="https://picsum.photos/id/237/300/300" class="mx-auto d-block mx-lg-0 rounded-circle img-thumbnail" alt="">
                    <div>
                        <h1 id="load"></h1>
                        <input type="file" id="input_img" onchange="fileChange()" accept="image/*" />
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <h1 class="text-uppercase text-center py-5">User Information</h1>
                    <table class="table">
                        <?php
                        $customerid = $_SESSION['customer_id'];
                        $SQL = "SELECT * from customer where customerID = $customerid";
                        $RES = mysqli_query($conn, $SQL);
                        $ROW = mysqli_fetch_assoc($RES);
                        $name = $ROW['Name'];
                        $email = $ROW['Email'];
                        $add = $ROW['Address'];
                        $country = $ROW['Country'];
                        ?>
                        <thead>

                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td><?php echo $name; ?></td>

                            </tr>
                            <tr>

                                <td scope="row">Email</td>
                                <td><?php echo $email; ?></td>

                            </tr>
                            <tr>
                                <td scope="row">Address</td>
                                <td><?php echo $add; ?></td>
                            </tr>
                            <tr>
                                <td scope="row">Country</td>
                                <td><?php echo $country; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- User orderd Products -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 table-responsive-sm">
                    <h1 class="text-xl  text-center text-uppercase text-primary py-5">Your Orders</h1>
                    <?php
                    if (isset($_SESSION['dltSucess'])) {
                        echo $_SESSION['dltSucess'];
                        unset($_SESSION['dltSucess']);
                    }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Preview</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Show the order here -->
                            <?php
                            $showSQL = "SELECT product.Title,product.ImgName,product.Price,orders.orderID
                                FROM orders
                                INNER JOIN product on orders.productID = product.productID
                                INNER JOIN customer on orders.customerID = customer.customerID WHERE customer.customerID = $customerid";
                            $showRES = mysqli_query($conn, $showSQL);
                            $cntt = mysqli_num_rows($showRES);
                            if ($cntt) {
                                while ($showROW = mysqli_fetch_assoc($showRES)) {
                                    $img = $showROW['ImgName'];
                                    $title = $showROW['Title'];
                                    $price = $showROW['Price'];
                                    $orderid = $showROW['orderID'];
                            ?>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="<?php echo SITEURL; ?>img/<?php echo $img; ?>" alt="" height="50px"></a></th>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><a href="<?php echo SITEURL; ?>cancelOrder.php?oid=<?php echo $orderid; ?>" class="btn btn-outline-danger">Cancel</a></td>
                                    </tr>
                            <?php
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</main>
<script>
    const load = document.getElementById("load");

    function fileChange() {
        var file = document.getElementById("input_img");
        var form = new FormData();
        form.append("image", file.files[0]);
        load.innerHTML = "Loading..."
        var settings = {
            url: "https://api.imgbb.com/1/upload?key=a4f874e8592ba2cda3a9a1aec3cd03ee",
            method: "POST",
            timeout: 0,
            processData: false,
            mimeType: "multipart/form-data",
            contentType: false,
            data: form,
        };

        $.ajax(settings).done(function(response) {
            console.log(response);
            var jx = JSON.parse(response);
            load.innerHTML = "Done"
            </script>
            <a href="<?php echo SITEURL;?>api/img_upload?img=<script>document.writeln(jx.data.url);</script>"></a>
            <script>
        });
    }
</script>
<?php include('MenuXFooter/footer.php') ?>