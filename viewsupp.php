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
              <th>Model NO</th>
              <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
          </thead>
          <?php
            $r=(int)$_GET['edit'];
            echo $r;
          include("connection.php");
          $s="SELECT model_no,product_name,total_price,product.quantity from supplier,product where product.supplier_id=supplier.supplier_id and supplier.supplier_id=$r;";
         
          $re=mysqli_query($con,$s);
          while($row=mysqli_fetch_array($re))
          {
        //   $r1=$row['customer_id'];
          ?>
          <tbody>
            <tr>     
                <td><?php echo $row['model_no']; ?></td>>
                 <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
                <td><?php echo $row['total_price']; ?></td>
                
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div>
    
</body>
</html>

