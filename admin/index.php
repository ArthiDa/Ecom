<?php include('MenuXFooter/menu.php') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?sid=1">Today</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?sid=2">This Month</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?sid=3">This Year</a></li>
                  </ul>
                </div>

                <?php
                  if(isset($_GET['sid'])){
                    $_SESSION['sid'] = $_GET['sid'];
                  }
                  else{
                    if(isset($_SESSION['sid'])){
                      $_SESSION['sid'] = $_SESSION['sid'];
                    }
                    else $_SESSION['sid'] = 2;
                  }
                  $date = date('Y-m-d');
                  $newdate = date("Y-m-d", strtotime ( '-1 day' , strtotime ( $date ) )) ;
                  $newmonth = date("Y-m-d", strtotime ( '-1 month' , strtotime ( $date ) )) ;
                  $newyear = date("Y-m-d", strtotime ( '-1 year' , strtotime ( $date ) )) ;

                  if($_SESSION['sid']==1){
                    $filter = "Today";
                    $sql = "SELECT COUNT(orderID) as 'total' FROM `orders` WHERE Dates = '$date'";
                    $sql2 = "SELECT COUNT(orderID) as 'prevtotal' FROM `orders` WHERE Dates = '$newdate'";
                  }
                  if($_SESSION['sid']==2){
                    $filter = "This Month";
                    $sql = "SELECT COUNT(orderID) as 'total' FROM `orders` WHERE MONTH(Dates) = MONTH('$date')";
                    $sql2 = "SELECT COUNT(orderID) as 'prevtotal' FROM `orders` WHERE MONTH(Dates) = MONTH('$newmonth')"; 
                  }
                  if($_SESSION['sid']==3){
                    $filter = "This Year";
                    $sql = "SELECT COUNT(orderID) as 'total' FROM `orders` WHERE YEAR(Dates) = YEAR('$date')";
                    $sql2 = "SELECT COUNT(orderID) as 'prevtotal' FROM `orders` WHERE YEAR(Dates) = YEAR('$newyear')";
                  }
                  
                  $res = mysqli_query($conn,$sql);
                  $res2 = mysqli_query($conn,$sql2);
                  $row = mysqli_fetch_assoc($res);
                  $row2 = mysqli_fetch_assoc($res2);
                  $total = $row['total'];
                  $prev = $row2['prevtotal'];
                  $perc = 0;
                  if($prev==0){
                    $perc = 100;
                  }
                  else{
                    $perc = (($total-$prev)/$prev)*100;
                  }
                  if($perc<=0){
                    $perc = -$perc;
                    $sty = "text-danger small pt-1 fw-bold";
                    $is = "decrease";
                  }
                  else{
                    $sty = "text-success small pt-1 fw-bold";
                    $is = "increase";
                  }
                ?>

                <div class="card-body">
                  <h5 class="card-title">Sales
                    <span>| <?php echo $filter?></span>
                  </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total;?></h6>
                      <span class="<?php echo $sty;?>"><?php echo round($perc,2);?>%</span> <span class="text-muted small pt-2 ps-1"><?php echo $is;?></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?rid=1">Today</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?rid=2">This Month</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?rid=3">This Year</a></li>
                  </ul>
                </div>

                <?php
                  if(isset($_GET['rid'])){
                    $_SESSION['rid'] = $_GET['rid'];
                  }
                  else{
                    if(isset($_SESSION['rid'])){
                      $_SESSION['rid'] = $_SESSION['rid'];
                    }
                    else $_SESSION['rid'] = 2;
                  } 
                  if($_SESSION['rid']==1){
                    $revfilter = "Today";
                    $revsql = "SELECT orders.Quantity,product.Price
                    from orders
                    INNER JOIN product on orders.productID = product.productID WHERE Dates = '$date'";
                    $revsql2 = "SELECT orders.Quantity,product.Price
                    from orders
                    INNER JOIN product on orders.productID = product.productID WHERE Dates = '$newdate'";
                  }
                  if($_SESSION['rid']==2){
                    $revfilter = "This month";
                    $revsql = "SELECT orders.Quantity,product.Price
                    from orders
                    INNER JOIN product on orders.productID = product.productID WHERE MONTH(Dates) = MONTH('$date')";
                    $revsql2 = "SELECT orders.Quantity,product.Price
                    from orders
                    INNER JOIN product on orders.productID = product.productID WHERE MONTH(Dates) = MONTH('$newmonth')";
                  }
                  if($_SESSION['rid']==3){
                    $revfilter = "This Year";
                    $revsql = "SELECT orders.Quantity,product.Price
                    from orders
                    INNER JOIN product on orders.productID = product.productID WHERE YEAR(Dates) = YEAR('$date')";
                    $revsql2 = "SELECT orders.Quantity,product.Price
                    from orders
                    INNER JOIN product on orders.productID = product.productID WHERE YEAR(Dates) = MONTH('$newyear')";
                  }

                  $revres = mysqli_query($conn,$revsql);
                  $revres2 = mysqli_query($conn,$revsql2);

                  $rev = 0;
                  $prevrev = 0;
                  while($revrow=mysqli_fetch_assoc($revres)){
                    $qt = $revrow['Quantity'];
                    $pr = $revrow['Price'];
                    $rev += ($qt*$pr);
                  }
                  while($revrow2=mysqli_fetch_assoc($revres2)){
                    $qt2 = $revrow2['Quantity'];
                    $pr2 = $revrow2['Price'];
                    $prevrev += ($qt2*$pr2);
                  }
                  $perc2 = 0;
                  if($prevrev==0){
                    $perc2 = 100;
                  }
                  else{
                    $perc2 = (($rev-$prevrev)/$prevrev)*100;
                  }
                  if($perc2<=0){
                    $perc2 = -$perc2;
                    $sty2 = "text-danger small pt-1 fw-bold";
                    $is2 = "decrease";
                  }
                  else{
                    $sty2 = "text-success small pt-1 fw-bold";
                    $is2 = "increase";
                  }
                ?>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| <?php echo $revfilter;?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $rev;?>$</h6>
                      <span class="<?php echo $sty2;?>"><?php echo round($perc2,2);?>%</span> <span class="text-muted small pt-2 ps-1"><?php echo $is2;?></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <?php
              if(isset($_GET['csid'])){
                $_SESSION['csid'] = $_GET['csid'];
              }
              else{
                if(isset($_SESSION['csid'])){
                  $_SESSION['csid'] = $_SESSION['csid'];
                }
                else $_SESSION['csid'] = 2;
              }
              if($_SESSION['csid']==1){
                $csfilter = "Today";
                $cssql = "SELECT COUNT(customerID) as 'cstotal' FROM `customer` WHERE Dates = '$date'";
                $pcssql = "SELECT COUNT(customerID) as 'pcstotal' FROM `customer` WHERE Dates = '$newdate'";
              }
              if($_SESSION['csid']==2){
                $csfilter = "This Month";
                $cssql = "SELECT COUNT(customerID) as 'cstotal' FROM `customer` WHERE MONTH(Dates) = MONTH('$date')";
                $pcssql = "SELECT COUNT(customerID) as 'pcstotal' FROM `customer` WHERE MONTH(Dates) = MONTH('$newmonth')";
              }
              if($_SESSION['csid']==3){
                $csfilter = "This Year";
                $cssql = "SELECT COUNT(customerID) as 'cstotal' FROM `customer` WHERE YEAR(Dates) = YEAR('$date')";
                $pcssql = "SELECT COUNT(customerID) as 'pcstotal' FROM `customer` WHERE YEAR(Dates) = YEAR('$newyear')";
              }
              $csres = mysqli_query($conn,$cssql);
              $csres2 = mysqli_query($conn,$pcssql);
              $csrow = mysqli_fetch_assoc($csres);
              $cstotal = $csrow['cstotal'];
              $csrow2 = mysqli_fetch_assoc($csres2);
              $pcstotal = $csrow2['pcstotal'];

              $perc3=0;
              if($pcstotal==0){
                $perc3 = 100;
              }
              else{
                $perc3 = (($cstotal-$pcstotal)/$pcstotal)*100;
              }

              if($perc3<=0){
                $perc3 = -$perc3;
                $sty3 = "text-danger small pt-1 fw-bold";
                $is3 = "decrease";
              }
              else{
                $sty3 = "text-success small pt-1 fw-bold";
                $is3 = "increase";
              }


            ?>

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?csid=1">Today</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?csid=2">This Month</a></li>
                    <li><a class="dropdown-item" href="<?php echo SITEURL;?>?csid=3">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| <?php echo $csfilter;?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $cstotal;?></h6>
                      <span class="<?php echo $sty3;?>"><?php echo round($perc3,2);?>%</span> <span class="text-muted small pt-2 ps-1"><?php echo $is3;?></span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Sales',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Revenue',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Customers',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
            <?php
              $salesSql = "SELECT orders.Quantity,customer.Name,product.Title,product.Price,orders.orderID
              from orders
              INNER JOIN customer on orders.customerID = customer.customerID
              INNER JOIN product on orders.productID = product.productID
              ORDER BY orders.orderID DESC";
              $salesres = mysqli_query($conn,$salesSql);

            ?>
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Recent Sales</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $cn = 1;
                        while($salesrow=mysqli_fetch_assoc($salesres)){
                          $customer = $salesrow['Name'];
                          $product = $salesrow['Title'];
                          $price = $salesrow['Price'];
                          ?>
                          <tr>
                            <th scope="row"><?php echo $cn;?></th>
                            <td class="text-primary fw-bolder"><?php echo $customer;?></td>
                            <td><a class="text-primary fw-bold"><?php echo $product;?></a></td>
                            <td>$<?php echo $price;?></td>
                          </tr>
                          <?php
                          $cn += 1;
                        }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
            
            <!-- Top Selling -->
            <?php
              $topSql = "SELECT * from orders";
              $topRes = mysqli_query($conn,$topSql);
              $topProduct = [];
              $cnt = mysqli_num_rows($topRes);
              while($cnt && $topRow=mysqli_fetch_assoc($topRes)){
                $pID = $topRow['productID'];
                $pCN = $topRow['Quantity'];
                if(array_key_exists($pID,$topProduct)){
                  $topProduct[$pID] = $topProduct[$pID] + $pCN;
                }
                else $topProduct[$pID] = $pCN;
              }
              arsort($topProduct);  
            ?>
            <div class="col-12" id="popular">
              <div class="card top-selling overflow-auto">

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling</h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          foreach($topProduct as $PID => $value) {
                          $PSQL = "SELECT * from product where productID = $PID";
                          $PRES = mysqli_query($conn,$PSQL);
                          $PROW = mysqli_fetch_assoc($PRES);
                          $Pprice = $PROW['Price'];
                          $Ptitle = $PROW['Title'];
                          $Pimg = $PROW['ImgName'];
                          ?>
                          <tr>
                            <th scope="row"><a href="<?php echo SITEURL;?>/details.php?PID=<?php echo $PID;?>"><img src="../img/<?php echo $Pimg;?>" alt=""></a></th>
                            <td><a href="<?php echo SITEURL;?>/details.php?PID=<?php echo $PID;?>" class="text-primary fw-bold"><?php echo $Ptitle;?></a></td>
                            <td>$<?php echo $Pprice;?></td>
                            <td class="fw-bold"><?php echo $value;?></td>
                            <td>$<?php echo round($Pprice*$value);?></td>
                          <?php
                        }
                        ?>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include('MenuXFooter/footer.php') ?>