<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
   include_once ('navigation.php');

    include('head.php');


    ?>
    
<div class="col-md-9">
        <h2>CUSTOMER  DETAILS:</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
            <th>Customer ID</th>
              <th>Customer Name</th>
              <th>Product Name</th>
                <th>Order Date</th>
                <th>Total Price</th>
              <th>Quantity</th>
              
            </tr>
          </thead>
          <?php
            $r=(int)$_GET['edit'];
            echo $r;
          include("connection.php");
          $s="SELECT distinct cart.customer_id,total_price,cart_details_copy.quantity,product_name,order_date,customer.name from cart_details_copy,orders,product,cart,customer where cart.cart_id=cart_details_copy.cart_id and orders.cart_id=cart.cart_id and customer.customer_id=cart.customer_id and cart_details_copy.product_id=product.product_id and cart.customer_id=$r;";
         
          $re=mysqli_query($con,$s);
          while($row=mysqli_fetch_array($re))
          {
           $r1=$row['customer_id'];
          ?>
          <tbody>
            <tr>     
                <td><?php echo $row['customer_id']; ?></td>>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
               <td><?php echo $row['total_price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div>
    
</body>
</html>

