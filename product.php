<?php 
    include 'db.php';
    if(isset($_POST['submit'])){
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $pprice=$_POST['pprice'];

        $sql="insert into `orders` (product_id,product_name,product_price)
        values('$pid','$pname','$pprice')";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "Data inserted successfully";
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
    <input type="text" class="form-control" placeholder="Enter Product_Id" name="pid" autocomplete="off">
  </div>
  <div class="form-group my-2">
    <label>Product_Name</label>
    <input type="text" class="form-control" placeholder="Enter Product_Name" name="pname" autocomplete="off">
  </div>
  <div class="form-group my-2">
    <label>Product_Price</label>
    <input type="text" class="form-control" placeholder="Enter Product_Price" name="pprice" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
  </body>
</html>