<?php include('connection/connect.php') ?>

<?php
    if(isset($_GET['oid'])){
        $id = $_GET['oid'];
        $dltsql = "DELETE FROM `orders` WHERE orderID = $id";
        $dtlres = mysqli_query($conn,$dltsql);
        if($dltsql){
            $_SESSION['dltSucess'] = "<div class='alert alert-success' role='alert'> Cancel Order Successfully.</div>";
            ?>
            <script>
                window.location.href = "http://localhost/Ecom/admin/orders.php";
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
			window.location.href = "http://localhost/Ecom/admin/orders.php";
		</script>
        <?php
    }

?>