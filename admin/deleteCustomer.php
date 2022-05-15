<?php include('connection/connect.php') ?>

<?php
    if(isset($_GET['cid'])){
        $id = $_GET['cid'];
        $dltsql = "SELECT * FROM `customer` WHERE customerID = $id";
        $dltres = mysqli_query($conn,$dltsql);
        $count = mysqli_num_rows($dltres);
        if($count==0){
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>";
            </script>
            <?php
            
        }
        if($dltsql){
            $row = mysqli_fetch_assoc($dltres);
            $st = $row['Status'];
            if($st==0){
                $setSql = "UPDATE customer SET Status = 1 WHERE customerID = $id";
                $setRes = mysqli_query($conn,$setSql);
            }
            else{
                $setSql = "UPDATE customer SET Status = 0 WHERE customerID = $id";
                $setRes = mysqli_query($conn,$setSql);
            }
            $_SESSION['cdltSucess'] = "<div class='alert alert-success' role='alert'> Customer Status Updated Successfully.</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>/customers.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                window.location.href = "<?php echo SITEURL;?>";
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