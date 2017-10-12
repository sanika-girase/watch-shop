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

    $supplier_name=$_POST['pname'];
   // $model_no=$_POST['pmodel'];
    $address=$_POST['padd'];
   $contact_no=$_POST['pcontact'];
    $quantity=$_POST['pquantity'];
    $total_price=$_POST['pprice'];

    echo $supplier_name;
   // echo $model_no;
    echo $address;
    echo $contact_no;
    echo $quantity;
      $q1="UPDATE supplier set model_no='12100', supplier_name='gunjan',contact_no=314789632,quantity=6,address='nashik' where model_no='1210'";
      $r1="UPDATE supplier set supplier_name='jjjjj',address='nashik',quantity=4   where contact_no ='8087331946'";
    
    $q2="UPDATE supplier set supplier_name='$supplier_name',quantity=$quantity,address='$address',total_price=$total_price where contact_no=$contact_no";
  

  // $w=" UPDATE product set product_name='$product_name',model_no='$model_no',brand_name='$brand_name',store_cost='$store_cost',quantity='$quantity' where model_no='$model_no'";
  $RT=mysqli_query($con,$q2)or die("Error: " . mysqli_error($con));
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
        
    
    $supplier_name=$row['supplier_name'];
   // $model_no=$row['model_no'];
    $address=$row['address'];
    $total_price=$row['total_price'];
    $contact_no=$row['contact_no'];
    $quantity=$row['quantity'];
  
}
}
 ?>
  <form action="edit_supplier.php" method="post" >
    
    <div class="form-group col-md-6">
    <label for="product_name">Supplier_name :</label>
    <input type="text" name="pname" class="form-control" id="product_name" value="<?php echo $supplier_name ; ?>">
      

    </div>
    
    <div class="form-group col-md-6">
    <label for="price">Address:</label>
    <input type="text" name="padd" class="form-control" id="product_name" value="<?php  echo $address ;?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="quantity">Quantity:</label>
    <input type="text" name="pquantity" class="form-control" id="product_name" value="<?php echo $quantity ?>">
      

    </div>
</div>
    <div class="form-group col-md-6">
    <label for="brand_name">Contact_No:</label>
    <input type="text" name="pcontact" class="form-control" id="product_name" value="<?php  echo $contact_no;?>">
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
    <input type="text" name="pbrand" class="form-control" id="product_name" value="<?php  echo $brand_name;?>">
      

    </div>
    <div class="form-group col-md-6">
    <label for="brand_name">Total Price:</label>
    <input type="text" name="pprice" class="form-control" id="product_name" value="<?php  echo $total_price;?>">
      

    </div>
    <input type="submit" value="Update Supplier" class="form-control btn btn-success pull-right" name="bt">
    <div class="clearfix"></div>
  </form>

   
  
</body>
</html>