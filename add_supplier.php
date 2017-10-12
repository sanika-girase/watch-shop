<!DOCTYPE html>
<html lang="en">
<head>

  <title>Supplier</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <?php 
  include_once 'connection.php';
   include_once 'errors.php';
  ?>

</head>
<body>
<?php

function filterName($field){
      // Sanitize user name
      $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
      if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
          return $field;
      }else{
          return FALSE;
      }
  } 
  
$name= $nameerr="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["sname"])){
          $nameerr = 'Please enter Supplier name.';
      }else{
          $name = filterName($_POST["sname"]);
          if($name == FALSE){
              $nameerr = 'Please enter a valid  Supplietr name.';
          }
      }
   }

   $phoneNumber = $_POST['scontact'];
$p="";
if(!empty($phoneNumber)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$phoneNumber)) // phone number is valid
    {
      $phoneNumber = '0' . $phoneNumber;

      // your other code here
    }
    else // phone number is not valid
    {
        $p='Phone number invalid !';
    }
}
else // phone number is empty
{
  $p='You must provid a phone number !';
}

?>
<?php
if (isset($_POST['sub'])) {
  # code...

$model_no=$_POST['smodel_no'];
$name=$_POST['sname'];
$contact=$_POST['scontact'];
$quantity=$_POST['squantity'];
$brand=$_POST['sbrand'];
$address=$_POST['saddress'];
$unit_price=$_POST['unit_price'];
$total_price=$unit_price*$quantity;

echo $name,$brand,$contact,$model_no,$quantity,$address;
$query="INSERT into supplier values(LAST_INSERT_ID(),'$model_no','$name',$contact,$quantity,$total_price,$brand,'$address')";


$result = mysqli_query($con, $query);
//header('location:supplier_details.php');
}
 
?>
<?php include_once 'navigation.php';?>

<form  action="add_supplier.php" method="post">
<h3 class="text-center">Add New Supplier</h3>
    <table class="table table-striped table-auto">
      <thead>
         </thead> 
      <tbody>


  <tr>
    <td>Name of Supplier :</td>
    <td>  <input type="text" name="sname"></td>
     <td><span class="error"><?php echo $nameerr; ?></span> </td>
    
  <br>
  </tr>
  <tr>
    <td>Contact no:</td>
    <td> <input type="text" name="scontact"></td>
     <td><span class="error"><?php echo $p; ?></span> </td>
                              
     </tr>
  <tr>
    <td> Address:</td>
    <td>  <input type="text" name="saddress"></td>
  
  </tr>
  <tr> <td>Model No</td>
    <td>  <input type="text" name="smodel_no"></td>
  
  </tr>
  <tr> <td>Unit_Price :</td>
    <td>  <input type="text" name="unit_price"></td>
  
  </tr>
  <tr> <td>Quantity:</td>
    <td>  <input type="text" name="squantity"></td>
     <tr> <td>Brand_Name:</td>
    <td>
    <select class="form-control" name="sbrand">
   
    <?php 
    $query="SELECT * from brand";
    $result = mysqli_query($con, $query);
    while($row=mysqli_fetch_array($result))
    {
       $brand_name=$row['brand_name'];
       $brand_id=$row['brand_id'];
       echo '<option value='.$brand_id.'>'.$brand_name.'</option>';
    }
    ?>
    
  </select>
</td>
</tr>
 </tbody>
</table>
    <hr>
 <center>
   <input type="submit" name="sub" class="btn btn-success">
    </center>
    </form>
<br>
<br>

</body>
</html>
