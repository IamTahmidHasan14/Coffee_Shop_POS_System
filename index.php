<?php 
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Tahmid Project</title>
        <style>
            body {background-color: rgb(219 234 254);}
            .result{
                color:red;
            }            
            td{
                text-align:center;
            }
        </style>
    </head>
    <body>
    <div class="container-fluid">
        <h2 class="text-center" style="color:green"> COFFEE SHOP </h2>
        <h4 class="text-center"> Rajshahi, Bangladesh </h4>
        <h6 class="text-center"> * * * * * </h6><br>
            
        <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="mx-7 my-2 col-sm-2.5" style="background-color:#f5f5f5; border: 1px solid blue;">
    <table class="table table-hover">
  <thead>
    <tr><th colspan="4" style="text-align:center">M E N U</th></tr>
    <tr>
      <th scope="col" style="text-align:center">Product_Id</th>
      <th scope="col" style="text-align:center">Product_Name</th>
      <th scope="col" style="text-align:center">Product_Price</th>
      <th scope="col" style="text-align:center">Operations</th>
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
            <td>'.$pid.'</td>
            <td>'.$pname.'</td>
            <td>'.$pprice.'</td>
            <td>
              <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Update</a></button>
              <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
            </td>
          </tr>';
        }        
      }
    ?>
    </tbody>
    </table>
        </div>
        <div class="col-sm-3">
            <button class="btn btn-primary mx-5 my-1"><a href="product.php" class="text-light">Add More Menu</a></button>
    </div> <div class="col-sm-2">
            <button class="btn btn-primary mx-9 my-1"><a href="bill.php?" class="text-light">Place Order 🡲</a></button>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $('#vegitable').change(function() {
        var id = $(this).find(':selected')[0].id;
        $.ajax({
            method:'POST',
            url:'fetch_product.php',
            data:{id:id},
            dataType:'json',
            success:function(data)
                {
                    $('#price').text(data.product_price);
                }
        });
        });
    
     //add to cart 
    var count = 1;
    $('#add').on('click',function(){
    
        var name = $('#vegitable').val();
        var qty = $('#qty').val();
        var price = $('#price').text();
 
        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
        }
         
        function billFunction()
            {
            var total = 0;
        
            $("#receipt_bill").each(function () {
            var total =  price*qty;
            var subTotal = 0;
            subTotal += parseInt(total);
            
            var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
            $('#new').append(table)
    
            // Code for Sub Total of Vegitables 
                var total = 0;
                $('tbody tr td:last-child').each(function() {
                    var value = parseInt($('#total', this).val());
                    if (!isNaN(value)) {
                        total += value;
                    }
                });
                $('#subTotal').text(total);
                
                // Code for calculate tax of Subtoal 5% Tax Applied
                var Tax = (total * 5) / 100;
                $('#taxAmount').text(Tax.toFixed(2));
    
                // Code for Total Payment Amount
    
                var Subtotal = $('#subTotal').text();
                var taxAmount = $('#taxAmount').text();
    
                var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
                $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 
        
            });
            count++;
            } 
        });
            // Code for year 
                
            var currentdate = new Date(); 
                var datetime = currentdate.getDate() + "/"
                    + (currentdate.getMonth()+1)  + "/"
                    + currentdate.getFullYear();
                    $('#year').text(datetime);
    
            // Code for extract Weekday     
                    function myFunction()
                    {
                        var d = new Date();
                        var weekday = new Array(7);
                        weekday[0] = "Sunday";
                        weekday[1] = "Monday";
                        weekday[2] = "Tuesday";
                        weekday[3] = "Wednesday";
                        weekday[4] = "Thursday";
                        weekday[5] = "Friday";
                        weekday[6] = "Saturday";
    
                        var day = weekday[d.getDay()];
                        return day;
                        }
                    var day = myFunction();
                    $('#day').text(day);
        });
</script>
 
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
        function displayClock(){
        var time = new Date().toLocaleTimeString();
        document.getElementById("time").innerHTML = time;
            setTimeout(displayClock, 1000); 
        }
</script>
