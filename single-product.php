<?php include('MenuXFooter/main.php') ?>
<?php
if (isset($_GET['product_id'])) {
    //Get the Product id and details of the selected product
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM product WHERE productID = $product_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $imgName = $row["ImgName"];
        $pTitle = $row["Title"];
        $price = $row["Price"];
        $desc = $row["Des"];
        $catagoryid = $row["catagoryID"];
        $st = $row["Status"];
        if ($st == 1) {
            $status = "<span class='alert alert-success text-center' role='alert'>In Stock</span>";
        } else {
            $status = "<span class='alert alert-danger text-center' role='alert'>Out Stock</span>";
        }
    }
}
$sql2 = "SELECT * FROM catagory where catagoryID = $catagoryid";
$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);
if ($count2 == 1) {
    $row2 = mysqli_fetch_assoc($res2);
    $name = $row2["Name"];
    $imgname = $row2["ImgBanner"];
    
}
?>

<!-- ***** Main Banner Area Start ***** -->
<div class="page-heading" id="top" style="background-image: url('<?php echo SITEURL; ?>img/<?php echo $imgname ?>');background-position: center center; background-size: cover; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Product Area Starts ***** -->
<section class="section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="left-images">
                    <img src="<?php echo SITEURL; ?>img/<?php echo $imgName; ?>" height="500px">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4><?php echo $pTitle; ?></h4>
                    <span class="price" id="pprice"> $<?php echo $price; ?></span>
                    <span><?php echo $desc; ?></span>
                    <?php echo $status; ?>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <form action="" method="POST">
                                    <input type="button" value="-" class="minus"><input onchange="fun()" type="number" name="quantity" id="totalQuantity" step="1" min="1" max="" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="total " >
                        <form action="" class="" method="POST">
                            <input type="text" name="ordquan" value="" class="d-none" id="ordn">
                            <a onclick="addItem('<?php echo $product_id ?>','<?php echo $pTitle ?>','<?php echo $imgName ?>','<?php echo $price ?>')" name="cartnow" value="Add to Cart" class="btn text-uppercase d-block btn-primary">
                                Add To Cart
                            </a>
                            <input type="submit" name="ordernow" value="Order Now" class="btn d-block my-2 text-uppercase  btn-primary" style="width: 100%;">
                           
                            <!-- name lagbe input type lagbe -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Product Area Ends ***** -->
<?php
    if (isset($_SESSION['login'])) {
        if(isset($_POST['cartnow'])){
            ?>
            <script>
                function fun() {
                    let val = document.getElementById("totalQuantity").value;
                    document.getElementById("ordn").value = val;
                }
            </script>
            <?php
        }
    }
?>
<?php
if (isset($_SESSION['login'])) {
    $cid = $_SESSION['customer_id'];
    $date = date('Y-m-d');
    if (isset($_POST['ordernow']) && $st == 1) {
        $qty = 1;
        if ($_POST['ordquan'] > 1) {
            $qty = $_POST['ordquan'];
        }
        $sql3 = "INSERT INTO orders SET
                 customerID = '$cid',
                 productID = '$product_id',
                 Quantity = '$qty',
                 Dates = '$date'
                 ";
        $res3 = mysqli_query($conn, $sql3);
        if ($res3) {
            $_SESSION['order'] = "<div class='alert alert-success' role='alert'> Ordered Successfully.</div>";
?>
            <script>
                window.location.href = "<?php echo SITEURL; ?>";
            </script>
        <?php
        }
    }
    if ($st == 0) {
        $_SESSION['order'] = "<div class='alert alert-danger' role='alert'> Product is Out of Stock.</div>";
        ?>
        <script>
            window.location.href = "<?php echo SITEURL; ?>";
        </script>
    <?php
    }
} else {
    if (isset($_POST['ordernow'])) {
    ?>
        <script>
            window.location.href = "<?php echo SITEURL; ?>login.php";
        </script>
<?php
    }
}
?>
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


</body>

</html>