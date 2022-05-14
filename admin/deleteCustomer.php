<?php include('connection/connect.php') ?>

<?php
    if(isset($_GET['cid'])){
        $id = $_GET['cid'];
        $dltsql = "DELETE FROM `customer` WHERE customerID = $id";
        $dtlres = mysqli_query($conn,$dltsql);
        if($dltsql){
            $_SESSION['cdltSucess'] = "<div class='alert alert-success' role='alert'> Customer Deleted Successfully.</div>";
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