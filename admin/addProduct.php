<?php include('MenuXFooter/menu.php') ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Orders</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>">Home</a></li>
          <li class="breadcrumb-item"><a href="<?php echo SITEURL;?>/products.php">Products</a></li>
          <li class="breadcrumb-item active">AddProduct</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <h5 class="card-title">Product Details</h5>
    <?php
         if(isset($_SESSION['imageSize'])){
             echo $_SESSION['imageSize'];
             unset($_SESSION['imageSize']);
         }
         if(isset($_SESSION['imageFiled'])){
            echo $_SESSION['imageFiled'];
            unset($_SESSION['imageFiled']);
        }
        
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="Title" class="col-md-4 col-lg-3 col-form-label">Title</label>
            <div class="col-md-8 col-lg-9">
            <input name="title" type="text" class="form-control" id="Title" placeholder="Enter Product Title" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Description" class="col-md-4 col-lg-3 col-form-label">Description</label>
            <div class="col-md-8 col-lg-9">
            <textarea name="description" type="text" style="height: 100px" class="form-control" id="Description" placeholder="Enter Description of the Product" required></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Price" class="col-md-4 col-lg-3 col-form-label">Price</label>
            <div class="col-md-8 col-lg-9">
            <input name="price" type="text" class="form-control" id="price" placeholder="Enter Product Price (eg:1000.00)" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Image" class="col-md-4 col-lg-3 col-form-label">Select Image</label>
            <div class="col-md-8 col-lg-9">
            <input name="image" type="file" class="form-control" id="Image" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Catagory" class="col-md-4 col-lg-3 col-form-label">Catagory</label>
            <div class="col-md-8 col-lg-9">
            <select name="catagory" id="Catagory" class="form-select" aria-label="Default select example" required>
                <option selected></option>
                <option value="1">Smartphones</option>
                <option value="2">Laptops</option>
                <option value="3">Gaming Consoles</option>
                <option value="4">Cameras</option>
            </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="Status" class="col-md-4 col-lg-3 col-form-label">Status</label>
            <div class="col-md-8 col-lg-9">
            <input name="status" type="radio" class="form-check-input" id="Status" value="1" checked>
            <label for="Status" class="form-check-label">
                In Stock
            </label>
            <br>
            <input name="status" type="radio" class="form-check-input" id="Status" value="0">
            <label for="Status" class="form-check-label">
                Out Stock
            </label>
            </div>
        </div>
        <div class="text-center">
            <input type="submit" name="Submit" class="btn btn-primary"></input>
        </div>
    </form><!-- End Profile Edit Form -->
</main>

<?php
    if(isset($_POST['Submit'])){
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $price = $_POST['price'];
        $catagory = $_POST['catagory'];
        $st = $_POST['status'];

        $imgName = $_FILES['image']['tmp_name'];
        $imgInfo = getimagesize("$imgName");
        if($imgInfo){
            list($width,$height) = getimagesize("$imgName");
            if($width<500 || $height<500){
                $_SESSION['imageSize'] = "<div class='alert alert-danger' role='alert'> Image Height and Width must be greater than 500px.</div>";
                ?>
                <script>
                    window.location.href = "<?php echo SITEURL;?>/addProduct.php";
                </script>
                <?php
            }
            else{
                $imgName = $_FILES['image']['name'];
                $ext = explode('.',$imgName);
                $ext = end($ext);
                $imgName = "Product-Name-".rand(0000,9999).".".$ext;
                $src = $_FILES['image']['tmp_name'];
                $dst = "../img/".$imgName;
                $upload = move_uploaded_file($src,$dst);
                if(!$upload){
                    $_SESSION['imageFiled'] = "<div class='alert alert-danger' role='alert'> Image Upload Failed.</div>";
                    ?>
                    <script>
                        window.location.href = "<?php echo SITEURL;?>/addProduct.php";
                    </script>
                    <?php
                }
                $addSql = "INSERT INTO product SET
                Title = '$title',
                Price = '$price',
                catagoryID = '$catagory',
                Des = '$desc',
                Status = '$st',
                ImgName = '$imgName'";
                $addRes = mysqli_query($conn,$addSql);
                if($addRes){
                    $_SESSION['addSuccess'] = "<div class='alert alert-success' role='alert'> Product Added Successfully.</div>";
                    ?>
                    <script>
                        window.location.href = "<?php echo SITEURL;?>/products.php";
                    </script>
                    <?php
                }
                else{
                    $_SESSION['imageFiled'] = "<div class='alert alert-danger' role='alert'> Something Wrong.Try again.</div>";
                    ?>
                    <script>
                        window.location.href = "<?php echo SITEURL;?>/addProduct.php";
                    </script>
                    <?php 
                }
            }
            
        }
        else{
            $_SESSION['imageFiled'] = "<div class='alert alert-danger' role='alert'> Please Upload Image File Only.</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/addProduct.php";
            </script>
            <?php
        }
    }
?>

<?php include('MenuXFooter/footer.php') ?>