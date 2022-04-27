
<?php include('MenuXFooter/main.php') ?>
    <?php
        if(isset($_GET['product_id']))
        {
            //Get the Product id and details of the selected product
            $product_id = $_GET['product_id'];
            
            $sql = "SELECT * FROM product WHERE productID = $product_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count==1){
                $row = mysqli_fetch_assoc($res);
                $imgName = $row["ImgName"];
                $pTitle = $row["Title"];
                $price = $row["Price"];
                $desc = $row["Des"];
                $catagoryid = $row["catagoryID"];
            }
        }
        $sql2 = "SELECT * FROM catagory where catagoryID = $catagoryid";
        $res2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($res2);
        if($count2==1){
            $row2 = mysqli_fetch_assoc($res2);
            $name = $row2["Name"];
            $imgname = $row2["ImgBanner"];
        }
    ?>

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content" style="background-image: url('<?php echo SITEURL;?>img/<?php echo $imgname?>')">
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
                    <img src="<?php echo SITEURL; ?>img/<?php echo $imgName;?>" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4><?php echo $pTitle;?></h4>
                    <span class="price" id="pprice"> $<?php echo $price;?></span>
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <span><?php echo $desc;?></span>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                                <input type="button" value="-" class="minus"><input onchange="fun()" type="number" id="totalQuantity" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                            </div>
                        </div>
                    </div>
                    <div class="total">
                        <h4>Total: $<span id="totalprice"></span></h4>
                        <div class="main-border-button"><a href="#">Add To Cart</a></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
    
    <?php include('MenuXFooter/footer.php') ?>
    

    <!-- jQuery -->
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
    <script>
    
        const tquant = document.getElementById("totalQuantity").value;
        const price = document.getElementById("pprice");
        function fun(){
             tquant = document.getElementById("totalQuantity").value;
            console.log(tquant)
            //Product price code
        }
    </script>

  </body>
</html>
