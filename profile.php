<?php include('MenuXFooter/main.php') ?>
<?php
    if(!isset($_SESSION['login'])) {
        ?>
        <script>
            window.location.href = "<?php echo SITEURL;?>login.php";
        </script>
        <?php
    }
?>
<main>
    <div class="main-banner">
        <!-- User Details Container -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                <?php
                        $customerid = $_SESSION['customer_id'];
                        $SQL = "SELECT * from customer where customerID = $customerid";
                        $RES = mysqli_query($conn, $SQL);
                        $ROW = mysqli_fetch_assoc($RES);
                        $name = $ROW['Name'];
                        $email = $ROW['Email'];
                        $add = $ROW['Address'];
                        $country = $ROW['Country'];
                        $pimg = $ROW['pimg'];
                        if($pimg==''){
                            $pimg = "https://cdn.pixabay.com/photo/2013/07/13/10/07/man-156584_960_720.png";
                        }
                        ?>
                    <img src="<?php echo $pimg;?>" width="400px" height="400px" class="mx-auto d-block mx-lg-0 rounded-circle img-thumbnail" alt="">
                    <div>
                        <h1 id="load"></h1>
                        <input type="file" id="input_img" onchange="fileChange()" accept="image/*" />
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <h1 class="text-uppercase text-center py-5">User Information</h1>
                    <table class="table">
                        
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
            url: "https://api.imgbb.com/1/upload?key=9339ccce6ba8bc89a7d59c6342549043",
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

            const url = `<?php echo SITEURL; ?>/api/img_upload.php?img="${jx.data.url}"&id=<?php echo $customerid?>`;
            fetch(url).then(res=>res.json()).then(data=>console.log(data));
            window.location.href = "<?php echo SITEURL;?>profile.php";

        });
    }
</script>
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
<script src="../ecom/MenuXFooter/chart/chart.js"></script>

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
<script src="./MenuXFooter/chart/chart.js"></script>
<?php include('MenuXFooter/footer.php') ?>