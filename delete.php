<?php
    include ("db.php");
    if(isset($_GET['deleteid']))
    $id=$_GET['deleteid'];
    $sql="delete from `orders` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo "delete done";
        header("location:index.php");
    }else{
        die(mysqli_error($conn));
    }
?>
