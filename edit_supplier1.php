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
if (isset($_POST['bt'])) {
  # code...

$model_no=$_POST['pmodel'];
$name=$_POST['pname'];
$contact=$_POST['pcontact'];
$quantity=$_POST['pquantity'];
$brand=$_POST['pbrand'];
$address=$_POST['padd'];
$total_price=$_POST['pprice'];
$query="SELECT * from brand";
$total_price1=$total_price*$quantity;
    $result1 = mysqli_query($con, $query);
    while($row=mysqli_fetch_array($result1))
    {
       $brand_name=$row['brand_name'];
       $brand_id=$row['brand_id'];
    }

echo $name,$brand,$contact,$model_no,$quantity,$address ;
$w2=" INSERT into supplier values('','df1','wer',2353467887,3,2344,1,'ferer')";

$w1="INSERT into supplier values(LAST_INSERT_ID(),'$model_no','$name',$contact,$quantity,$total_price1,$brand_id,'$address')";
$result = mysqli_query($con, $w1);
header('location:supplier_details.php');
}
 
  else
{
  $r=(int)$_GET['edit'];
  echo $r;

$query="SELECT  *  FROM supplier where supplier_id=$r";
    $result = mysqli_query($con, $query);

    $query="SELECT * from brand";
    $result1 = mysqli_query($con, $query);
  while($row=mysqli_fetch_array($result1))
  {
       $brand_name=$row['brand_name'];
       $brand_id=$row['brand_id'];
    }
    
  while($row=mysqli_fetch_array($result))
    {
        
    
    $supp=$row['supplier_name'];
    $model_no=$row['model_no'];
    $address=$row['address'];
 
    $contact=$row['contact_no'];
    $quantity=$row['quantity'];
  
}
}
 ?>
  <form action="edit_supplier1.php" method="post" >
    
    <div class="form-group col-md-6">
    <label for="product_name">Supplier_name :</label>
    <input type="text" name="pname" class="form-control" id="product_name" value="<?php echo  $supp ?>" readonly="readonly">
      

    </div>
    <div class="form-group col-md-6">
    <label for="model_no">Model_No:</label>
    <input type="text" name="pmodel" class="form-control" id="product_name" value="<?php echo $model_no ?>">*Enter in the form of character and integer.
      
<br>
    </div>
    <div class="form-group col-md-6">
    <label for="price">Address:</label>
    <input type="text" name="padd" class="form-control" id="product_name" value="<?php  echo $address ?>" readonly="readonly">
      

    </div>
    <div class="form-group col-md-6">
    <label for="quantity">Quantity:</label>
    <input type="text" name="pquantity" class="form-control" id="product_name" value="<?php echo $quantity ?>">
      

    </div>
     <div class="form-group col-md-6">
    <label for="quantity">Unit Price:</label>
    <input type="text" name="pprice" class="form-control" id="product_name" value="<?php echo $quantity ?>">
      

    </div>
</div>
    <div class="form-group col-md-6">
    <label for="brand_name">Contact_No:</label>
    <input type="text" name="pcontact" class="form-control" id="product_name" value="<?php  echo $contact ?>" readonly="readonly">
  <?php    
     $query="SELECT * from brand";
    $result1 = mysqli_query($con, $query);
    while($row=mysqli_fetch_array($result1))
    {
       $brand_name=$row['brand_name'];
       $brand_id=$row['brand_id'];
    }
    ?>
    </div>
     <div class="form-group col-md-6">
    <label for="brand_name">Brand_name:</label>
    <input type="text" name="pbrand" class="form-control" id="product_name" value="<?php  echo $brand_name;?>" readonly="readonly">
      

    </div>
    <input type="submit" value="Add New Model" class="form-control btn btn-success pull-right" name="bt">
    <div class="clearfix"></div>
  </form>

   
  
</body>
</html>