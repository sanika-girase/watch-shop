<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
  </head>
  <body>
    <?php 
    include_once('navigation.php');?>
    <div class="container-fluid">
      <div class="row"></div>
      <
      <div class="col-md-9">
        <h2>SUPPLIER DETAILS:</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Order_id</th>
              <th>Customer_name</th>
              <th>Casrt_id</th>
              <th>order_date</th>
              <th>address</th>
              <th>city</th>
               <th>pincode</th>
                <th>shipped_date</th>
              <th>Delete</th>
              
            </tr>
          </thead>
        
         <?php
          include("connection.php");
          $p="SELECT * from contact ";
          $re=mysqli_query($con,$p);
          while($row=mysqli_fetch_array($re))
          {
           $r1=$row['Email'];
          ?>
          <tbody>
            <tr>
                  <td><?php echo $row['Email']; ?></td>
          
              <td><?php echo $row['First_name']; ?></td>
              <td><?php echo $row['Last_name']; ?> </td>
              <td><?php echo $row['Comment']; ?></td>
                 <td><a href="feedback.php?delete=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-remove"></span></a></td>;
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>