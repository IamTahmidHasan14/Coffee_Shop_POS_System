<?php
    include 'db.php';
    $id=$_GET['updateid'];
    $sql="Select * from `orders` where Id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $pid=$row['product_id'];
    $pname=$row['product_name'];
    $pprice=$row['product_price'];

    if(isset($_POST['submit'])){
        // $id=$_POST['Id'];
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $pprice=$_POST['pprice'];

        $sql="update `orders` set product_id=$pid, product_name='$pname', product_price='$pprice' where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Update successfully";
            header('location:index.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>CRUD Operation</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group my-2">
    <label>Product_Id</label>
    <input type="text" class="form-control" placeholder="Enter Product_Id" name="pid" autocomplete="off" value=<?php echo $pid;?>>
  </div>
  <div class="form-group my-2">
    <label>Product_Name</label>
    <input type="text" class="form-control" placeholder="Enter Product_Name" name="pname" autocomplete="off" value=<?php echo $pname;?>>
  </div>
  <div class="form-group my-2">
    <label>Product_Price</label>
    <input type="text" class="form-control" placeholder="Enter Product_Price" name="pprice" autocomplete="off" value=<?php echo $pprice;?>>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
    </div>
  </body>
</html>