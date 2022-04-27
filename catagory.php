
<?php include('MenuXFooter/main.php') ?>
<!-- ***** Main Banner Area Start ***** -->
    <?php
        if(isset($_GET['catagory_id']))
        {
            //Get the Product id and details of the selected product
            $catagory_id = $_GET['catagory_id'];
            
            $sql = "SELECT * FROM catagory WHERE catagoryID = $catagory_id";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count==1){
                $row = mysqli_fetch_assoc($res);
                $banner = $row["ImgBanner"];
                $name = $row["Name"];
            }
        }
    ?>

    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content"style="background-image: url('<?php echo SITEURL;?>img/<?php echo $banner?>')">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
  

    <section class="container my-5" id="psection">
        <h1 class="text-uppercase text-center py-2 text-danger">Catagory</h1>
            <div class="row flex justify-content-around">
            
                <div class="card col-3 bg-dark text-white">
                    <img src="img/Iphone-13.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay  flex">
                    <h1 class="my-5">Phones</h1>
                    </div>
                </div>
                <div class="card col-3 bg-dark text-white">
                    <img src="img/Iphone-13.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay  flex">
                    <h1 class="my-5">Phones</h1>
                    </div>
                </div>
                <div class="card col-3 bg-dark text-white">
                    <img src="img/Iphone-13.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay  flex">
                    <h1 class="my-5">Phones</h1>
                    </div>
                </div>

            </div>

    </section>
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

</body>
</html>
