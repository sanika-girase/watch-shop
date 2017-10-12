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
        <?php 
    include_once 'connection.php';
    if(isset($_GET['delete']) && !empty($_GET['delete']))
    {
      $delete_id=$_GET['delete'];
    $query="DELETE from orders where order_id='$delete_id'";
        $result = mysqli_query($con, $query);
        header('location:cust_detail.php');
    }
    
 if(!empty($errors))
      {
        echo display_errors($errors);
      }
      else{

        }
    ?>
<div class="col-md-9">
        <h2>CUSTOMER  DETAILS:</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
            <th>Email ID</th>
              <th>Cart_id</th>
              <th>Order_id</th>
               <th>Order_date</th>
              <th>Address</th>
                <th>Delete</th>
              
            </tr>
          </thead>
          <?php
          include("connection.php");
          $s=" SELECT email_id,cart.cart_id,order_id,order_date,pincode from cart,orders,customer where customer.customer_id=cart.customer_id and orders.cart_id=cart.cart_id";
         
          $re=mysqli_query($con,$s);
          while($row=mysqli_fetch_array($re))
          {
           $r1=$row['order_id'];
          ?>
          <tbody>
            <tr>     
                <td><?php echo $row['email_id']; ?></td>
                <td><?php echo $row['cart_id']; ?></td>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td><?php echo $row['pincode']; ?></td>

             
             
                 <td><a href="cust_detail.php?delete=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-remove"></span></a></td>;
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div>
    
</body>
</html>

