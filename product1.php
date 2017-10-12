<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php
    include('navigation.php');
    include('errors.php');
    include('connection.php');
if(isset($_GET['add']))
{
  ?>
  <h2 class="text-center"> Add a New Product </h2><hr>
  <form action="product1.php?add=1" method="post" >
    
    <div class="form-group col-md-6">
    <label for="product_name">Product_name :</label>
    <input type="text" name="product_name" class="form-control" id="product_name" value="<?=((isset($_POST['product_name']))?$_POST['product_name']:''); ?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="model_no">Model_No:</label>
    <input type="text" name="product_name" class="form-control" id="product_name" value="<?=((isset($_POST['model_no']))?$_POST['model_no']:''); ?>">
      
<br>
    </div>
    <div class="form-group col-md-6">
    <label for="price">Price:</label>
    <input type="text" name="price" class="form-control" id="product_name" value="<?=((isset($_POST['store_cost']))?$_POST['store_cost']:''); ?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="quantity">Quantity:</label>
    <input type="text" name="quantity" class="form-control" id="product_name" value="<?=((isset($_POST['quantity']))?$_POST['quantity']:''); ?>">
      

    </div>
    <?php
    
        $query = "SELECT brand_id,brand_name from brand;";
        $result1 = mysqli_query ($con,$query);
        while($row=mysqli_fetch_array($result1))
        {
          ?>
        <br><input type="checkbox" id="check1" name="check1[]" value="<?php echo $row["brand_id"]?>">  <?php  echo $row["brand_name"];  ?>

        <?php

        }
        
        ?>
</div>
    <div class="form-group col-md-6">
    <label for="brand_name">Brand_name:</label>
    <input type="text" name="quantity" class="form-control" id="product_name" value="<?=((isset($_POST['brand_name']))?$_POST['brand_name']:''); ?>">
      

    </div>
    <input type="submit" value="ADD Product" class="form-control btn btn-success pull-right">
    <div class="clearfix"></div>
  </form>
  <?php
}

else{

    if(isset($_GET['delete']) && !empty($_GET['delete']))
    {
      $delete_id=$_GET['delete'];
    $query="DELETE from product where model_no='$delete_id'";
        $result = mysqli_query($con, $query);
        header('location:product1.php');
    }
    
 if(!empty($errors))
      {
        echo display_errors($errors);
      }
      else{

        }
    ?>
    
    <h3 class="text-center">Product</h3>
    <a href="inn.php" class="btn btn-success pull-right" id="add-product-btn">ADD PRODUCT</a>
    <br>
    <table class="table table-striped table-auto">
      <thead>
        <th>Product_Name</th> <th>Model NO</th> <th>Price</th><th>Quantity</th><th></th>
      </thead>
      
       <?php
        $p="SELECT * from product";
        $re=mysqli_query($con,$p);
        while ($row=mysqli_fetch_array($re)) 
        {
          $r1=$row['model_no'];

          ?>
          <tr>
          <tbody>
         
         <!-- <a href="product1.php?delete=<?php// echo $r1 ;?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a></td>-->
       
                   
        <td><?php echo $row['product_name']; ?></td>
        <td><?php echo $row['model_no']; ?></td>
        <td><?php echo $row['store_cost']; ?> </td>
        <td><?php echo $row['quantity']; ?></td>
   
       <!-- <td><?php// echo $row['brand_name']; ?></td> -->
          <?php    
           echo '<td> <a href="edit_product.php?model_no='.$r1.'" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>';
                    echo '<td><a href="product1.php?delete='.$r1.'"class="btn btn-xs-default"><span class="glyphicon glyphicon-remove"></span></a></td>'; ?>

       

          </tbody>
          </tr>
        <?php
        }
}
      ?>
      
    
    </table>
  </div>
</div>
</div>

<? php include('footer.php');?>
  </body>
</html>