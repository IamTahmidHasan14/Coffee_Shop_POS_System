<?php 
    include 'db.php';
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
    <table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Sl no.</th>
      <th scope="col">Product_Id</th>
      <th scope="col">Product_Name</th>
      <th scope="col">Product_Price</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sql="Select * from `orders`";
      $result=mysqli_query($conn,$sql);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $pid=$row['product_id'];
            $pname=$row['product_name'];
            $pprice=$row['product_price'];
            echo '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$pid.'</td>
            <td>'.$pname.'</td>
            <td>'.$pprice.'</td>
            <td>
              <button class="btn btn-primary"><a href="" class="text-light">Update</a></button>
              <button class="btn btn-danger"><a href="" class="text-light">Delete</a></button>
            </td>
          </tr>';
        }        
      }
    ?>    
  </tbody>
</table>
      <button class="btn btn-primary my-5"><a href="product.php" class="text-light">Add Menu</a></button>
    </div>
  </body>
</html>