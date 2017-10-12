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



if ((isset($_POST['bt']))) 
{
  # code...

    $product_name=$_POST['pname'];
    $model_no=$_POST['pmodel'];
    $brand_name=$_POST['pbrand'];
  //  $brand_cost=$row['brand_cost'];
    $store_cost=$_POST['pprice'];
    $quantity=$_POST['pquantity'];
    $q1="UPDATE product set store_cost='$store_cost',quantity='$quantity' WHERE model_no='$model_no'";
  $RT=mysqli_query($con,$q1);
  header('location:product1.php');
}else
{
  $r=$_GET['model_no'];

                      $query="SELECT * from brand";
                      $result = mysqli_query($con, $query);
                      while($row=mysqli_fetch_array($result))
                      {
                      $brand_name=$row['brand_name'];
                      $brand_id=$row['brand_id'];
                       }
                

$query="SELECT  *  FROM product where model_no='$r'";
    $result = mysqli_query($con, $query);

 echo $r; 
  while($row=mysqli_fetch_array($result))
    {
    
    
    $product_name=$row['product_name'];
    $model_no=$row['model_no'];
   // $brand_name=$row['brand_name'];
 
    $store_cost=$row['store_cost'];
    $quantity=$row['quantity'];
 
}
}
 $query="SELECT * from brand";
    $result1 = mysqli_query($con, $query);
  while($row=mysqli_fetch_array($result1))
  {
       $brand_name=$row['brand_name'];
       $brand_id=$row['brand_id'];
    }
   
 ?>
  <form action="edit_product.php" method="post" >
    
    <div class="form-group col-md-6">
    <label for="product_name">Product_name :</label>
    <input type="text" name="pname" class="form-control" id="product_name" value="<?php echo $product_name ; ?>" readonly="readonly">
      

    </div>
    <div class="form-group col-md-6">
    <label for="model_no">Model_No:</label>
    <input type="text" name="pmodel" class="form-control" id="product_name" value="<?php echo $model_no ?>"  readonly="readonly">
      
<br>
    </div>
    <div class="form-group col-md-6">
    <label for="price">Price:</label>
    <input type="text" name="pprice" class="form-control" id="product_name" value="<?php  echo $store_cost ;?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="quantity">Quantity:</label>
    <input type="text" name="pquantity" class="form-control" id="product_name" value="<?php echo $quantity ?>">
      

    </div>
</div>
    <div class="form-group col-md-6">
    <label for="brand_name">Brand_name:</label>
    <input type="text" name="pbrand" class="form-control" id="product_name" value="<?php  echo $brand_name;?>">
      

    </div>
    

    <br>
    <input type="submit" value="UPDATE PRODUCT" class="form-control btn btn-success pull-right" name="bt">
    <div class="clearfix"></div>
  </form>

  
 
</body>

</html>