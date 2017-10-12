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
              <th>Email</th>
                <th>View Details</th>
              
            </tr>
          </thead>
          <?php
          include("connection.php");
          $s="SELECT distinct cart.customer_id,customer.name ,email_id from orders,cart,customer where orders.cart_id=cart.cart_id and customer.customer_id=cart.customer_id";
         
          $re=mysqli_query($con,$s);
          while($row=mysqli_fetch_array($re))
          {
           $r1=$row['customer_id'];
          ?>
          <tbody>
            <tr>     
                <td><?php echo $row['customer_id']; ?></td>>
                <td><?php echo $row['email_id']; ?></td>
                <td><?php echo $row['name']; ?></td>

             
             
                 <td><a href="odcustview.php?edit=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-info-sign"></span></a></td>;
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div>
    
</body>
</html>

