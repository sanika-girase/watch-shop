<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Supplier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php 
    include_once 'connection.php';
    if(isset($_GET['delete']) && !empty($_GET['delete']))
    {
      $delete_id=$_GET['delete'];
    $query="DELETE from supplier where supplier_id='$delete_id'";
        $result = mysqli_query($con, $query);
        header('location:supplier_details.php');
    }
    
 if(!empty($errors))
      {
        echo display_errors($errors);
      }
      else{

        }
    ?>
  </head>
  <body>
    <?php include_once 'navigation.php';?>
    <div class="container-fluid">
      <div class="row"></div>
      <div class="col-md-3  middle">
        <a href="add_supplier.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-user"></span> Add New Supplier
        </a>
      </div>
      <div class="col-md-9">
        <h2>SUPPLIER DETAILS:</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Name</th>
              <th>Contact NO.</th>
              <th>Address</th>
       <!--       <th>Quantity</th> -->
      <!--        <th>Total_Price</th>  -->
              <th>Brand_Name</th>
              <th>Update</th>
           <!--   <th>Add New</th> -->
           <th>View informations</th>
              <th>Delete</th>
              
            </tr>
          </thead>
          <?php
          $p="SELECT * from supplier,brand where supplier.brand_id=brand.brand_id order by supplier_id";
          $re=mysqli_query($con,$p);
          while($row=mysqli_fetch_array($re))
          {
            $r1=$row['supplier_id'];
          ?>
          <tbody>
            <tr>
              
              <td><?php echo $row['supplier_name']; ?></td>
              <td><?php echo $row['contact_no']; ?> </td>
              <td><?php echo $row['address']; ?></td>
           <!--   <td><?php// echo $row['quantity']; ?></td>
              <td><?php// echo $row['total_price']; ?></td>  -->
              <td><?php echo $row['brand_name']; ?></td>

              <td><a href="edit_supplier.php?edit=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-pencil"></span></a></td>;
          <!--    <td><a href="edit_supplier1.php?edit=<?php //echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-plusglyphicon glyphicon-info-sign"></span></a></td>; -->
              <td><a href="viewsupp.php?edit=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-info-sign"></span></a></td>;
               <td><a href="supplier_details.php?delete=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-remove"></span></a></td>;
             
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