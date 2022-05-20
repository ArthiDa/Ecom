<?php include('../Connection/connect.php')?>
<?php
    echo $_GET['img'];

    header("Content-Type:application/json;charset=UTF-8");
    $img = json_decode($_GET["img"],false);
    $id = json_decode($_GET["id"],false);
    if(isset($img) && isset($id)){
        $sql = "UPDATE  customer SET pimg='$img' WHERE customerID='$id'";
        if(mysqli_query($conn,$sql)){
            echo 1;
        }else{
            echo 0;
        }
    }else{
        echo 0;

    }
    
   
    

?>