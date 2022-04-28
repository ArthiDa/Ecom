<?php include('MenuXFooter/main.php') ?>
<?php
    $sql2 = "SELECT * FROM catagory";
    $res2 = mysqli_query($conn,$sql2);
    $count2 = mysqli_num_rows($res2);

?>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>We Are Hexashop</h4>
                                <span>Awesome, clean &amp; creative php5 Template</span>
                                <div class="main-border-button">
                                    <li class="scroll-to-section"><a href="#men">Purchase Now!</a></li>
                                </div>
                            </div>
                            <img src="img/leftbanner.jpg" alt="">
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                        <?php
                        if($count2>0){
                            while($row2=mysqli_fetch_assoc($res2)){
                                $id = $row2["catagoryID"];
                                $name = $row2["Name"];
                                $img = $row2["ImgName"];
                                $banner = $row2["ImgBanner"];
                                ?>

                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4><?php echo $name;?></h4>
                                            <span>Best Clothes For Women</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4><?php echo $name;?></h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="<?php echo SITEURL;?>products.php?catagory_id=<?php echo $id?>">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="<?php echo SITEURL;?>img/<?php echo $img;?>">
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Popular Products Area start ***** -->
    <?php
        $sql = "SELECT * FROM product limit 5";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
    ?>


    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Popular Headsets</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                        <?php
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id = $row["productID"];
                                    $imgName = $row["ImgName"];
                                    $pTitle = $row["Title"];
                                    $pDes = $row["Des"];
                                    $price = $row["Price"];
                                    ?>

                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li><a href="<?php echo SITEURL; ?>single-product.php?product_id=<?php echo $id;?> "><i class="fa fa-eye"></i></a></li>
                                                    <!-- <li><a href="<?php echo SITEURL; ?>single-product.php?product_id=<?php echo $id;?> "><i class="fa fa-star"></i></a></li> -->
                                                    <li><a href="<?php echo SITEURL; ?>single-product.php?product_id=<?php echo $id;?> "><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <img src="<?php echo SITEURL; ?>img/<?php echo $imgName;?>" height="300px" alt="">
                                        </div>
                                        <div class="down-content">
                                            <h4><?php echo $pTitle;?></h4>
                                            <span>$<?php echo $price;?></span>
                                            <!-- <ul class="stars">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul> -->
                                        </div>
                                    </div>
                                    
                                    <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Social Media</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-03.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-04.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-05.jpg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="assets/images/instagram-06.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->


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

  </body>
    </html>