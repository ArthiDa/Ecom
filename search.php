<?php include('MenuXFooter/main.php') ?>

<?php
    if(!isset($_SESSION['has'])){
        ?>
        <script>
            window.location.href = "<?php echo SITEURL;?>";
        </script>
        <?php
    }
?>
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content" style="background-image: url('<?php echo SITEURL;?>img/leftbanner.webp')">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="container">
        <div class="row">
        <?php
            $text = $_SESSION['has'];
            $sql2 = "SELECT * FROM product where Title like '%$text%' or Des like '%$text%'";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2){
            while($row2=mysqli_fetch_assoc($res2)){
                $id = $row2["productID"];
                $imgName = $row2["ImgName"];
                $pTitle = $row2["Title"];
                $pDes = $row2["Des"];
                $price = $row2["Price"];
                $st = $row2["Status"];
                if($st==1){
                    $status = "<span class='alert alert-success text-center' role='alert'>In Stock</span>";
                }
                else{
                    $status = "<span class='alert alert-danger text-center' role='alert'>Out Stock</span>";
                }
                ?>
                <div class="col-md-4">
                <div class="thumbnail">
                    <!-- <a href="/w3images/lights.jpg" target="_blank"> -->
                    <a href="<?php echo SITEURL; ?>single-product.php?product_id=<?php echo $id;?>"><img src="<?php echo SITEURL;?>img/<?php echo $imgName;?>" alt="Lights" style="width:100%"></a>  
                    <div class="caption">
                        <br>
                        <h3 style="padding-left: 5px;"><?php echo $pTitle;?></h3>
                        <p style="padding-left: 7px;">Price $<?php echo $price;?></p><br>
                        <?php echo $status;?>
                    </div>
                    </a>
                </div> <br>
                </div>
                <?php
            }
            }
            else{
                ?>
                <div style="color:blue; text-align:center; padding-bottom: 20px;">
                <h1><?php echo "Products Not Found";?></h1>
                </div>
                <?php
            }
            
        ?>
        </div>
    </section>

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
    <?php
        unset($_SESSION['has']);
    ?>
<?php include('MenuXFooter/footer.php') ?>

</body>
</html>


