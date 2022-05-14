<?php include('connection/connect.php') ?>

<?php
    if(isset($_GET['pid'])){
        $id = $_GET['pid'];
        $sql = "SELECT * FROM product WHERE productID = $id";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count==0){
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>";
            </script>
            <?php
            
        }
        if($res){
            $row = mysqli_fetch_assoc($res);
            $st = $row['Status'];
            if($st==0){
                $setSql = "UPDATE product SET Status = 1 WHERE productID = $id";
                $setRes = mysqli_query($conn,$setSql);
            }
            else{
                $setSql = "UPDATE product SET Status = 0 WHERE productID = $id";
                $setRes = mysqli_query($conn,$setSql);
            }
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/products.php";
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            window.location.href = "<?php echo SITEURL;?>";
        </script>
        <?php
    }
?>