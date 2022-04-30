<!-- ***** Footer Start ***** -->
<!-- <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2 style="text-align: center;">Developers</h2>
                        <p style="text-align: center;">Developers Details.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-4">
                    <div class="thumb">
                        <div class="icon">
                            <a href="https://www.facebook.com/surabbaruaturjo">
                                <h6>Turjo</h6>
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <img src="img/turjo.jpg" alt="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="thumb">
                        <div class="icon">
                            <a href="https://www.facebook.com/surabbaruaturjo">
                                <h6>Turjo</h6>
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <img src="img/turjo.jpg" alt="">
                    </div>
                </div>
                <div class="col-4">
                    <div class="thumb">
                        <div class="icon">
                            <a href="https://www.facebook.com/surabbaruaturjo">
                                <h6>Turjo</h6>
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div>
                        <img src="img/turjo.jpg" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </section> -->
    <!-- ***** Social Area Ends ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="under-footer">
    
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved.       
                        <ul>
                            
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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
    