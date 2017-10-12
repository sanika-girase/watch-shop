<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	
</head>

<body>
<?php
    include('navigation.php');
    include('errors.php');
    include('connection.php');
    ?>
<?php

$r=$_GET['model_no'];

$query="SELECT  *  FROM product where model_no='$r'";
    $result = mysqli_query($con, $query);

 echo $r; 
	while($row=mysqli_fetch_array($result))
    {
    
    
    $product_name=$row['product_name'];
    $model_no=$row['model_no'];
    $brand_name=$row['brand_name'];
  //  $brand_cost=$row['brand_cost'];
    $store_cost=$row['store_cost'];
    $quantity=$row['quantity'];
  //  $colour=$row['colour'];
   // $material=$row['material'];
   // $display_type=$row['display_type'];
   // $dial_shape=$row['dial_shape'];
   // $warrenty=$row['warrenty'];
  //  $image=$row['image'];
  /*  if($quantity==0)
    {
    $availbale="Not In Stock";
    }
    else
    {
    $availbale="In Stock";
    }
    }*/
    
}
 ?>
  <form action="edit_product.php " method="post" >
    
    <div class="form-group col-md-6">
    <label for="product_name">Product_name :</label>
    <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo $product_name ; ?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="model_no">Model_No:</label>
    <input type="text" name="product_name" class="form-control" id="product_name" value="<?php echo $model_no ?>">
      
<br>
    </div>
    <div class="form-group col-md-6">
    <label for="price">Price:</label>
    <input type="text" name="price" class="form-control" id="product_name" value="<?php  echo $store_cost ;?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="quantity">Quantity:</label>
    <input type="text" name="quantity" class="form-control" id="product_name" value="<?php echo $quantity ?>">
      

    </div>
</div>
    <div class="form-group col-md-6">
    <label for="brand_name">Brand_name:</label>
    <input type="text" name="quantity" class="form-control" id="product_name" value="<?php  echo $brand_name;?>">
      

    </div>
    <input type="submit" value="ADD Product" class="form-control btn btn-success pull-right">
    <div class="clearfix"></div>
  </form>
  <?php

    $product_name=$row['product_name'];
    $model_no=$row['model_no'];
    $brand_name=$row['brand_name'];
  //  $brand_cost=$row['brand_cost'];
    $store_cost=$row['store_cost'];
    $quantity=$row['quantity'];
  $q1="UPDATE product set  product_name ='$product_name',model_no='$model_no',brand_name='$brand_name',$store_cost='$store_cost',$quantity='$quantity' WHERE model_no=$r";
  $RT=mysqli_query($con,$q1);
  ?>
</body>
</html>