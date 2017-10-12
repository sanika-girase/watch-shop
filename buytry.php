<?php 
session_start();
include_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    .well
    {
        background-color: #ffffff;
        padding: 25px;  
        position: relative; left: 700px; bottom: 800px;
    }
    .input
{
  border-radius:8px; 
  border:2px solid #b4b4b4;
  padding:5px;
}
.button 
{
    background-color:rgb(255,165,0);
    border: none;
    color: white;
    padding: 8px 15px; 
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
  </style>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
  echo $_SESSION['total'];
if($_SESSION['total']==0)
{
  echo '<div class="alert alert-danger">
             <strong>!</strong> Order  Conatin 0 items...
             you cant place order
            </div>';

  header('Location:buytry.php');

}
else
{
$email=$_SESSION['success'];
$query="SELECT * from cart where customer_id in (select customer_id from customer where email_id='$email')";
   $result=mysqli_query($con, $query)or die("Error: " . mysqli_error($con));
   $row=mysqli_fetch_array($result);
   $cart_id=$row['cart_id'];
   echo $cart_id;
    $query="SELECT DATE_ADD(CURDATE(), INTERVAL 5 DAY) as date";
    $result=mysqli_query($con, $query)or die("Error: " . mysqli_error($con));
    $row=mysqli_fetch_array($result);
     $date=$row['date'];
echo $date;
$name= $_POST['name'];
$mbno=$_POST['mbno'];
$pincode=$_POST['pincode'];
$flat=$_POST['flat'];
$landmark=$_POST['landmark'];
$city=$_POST['city'];
$state=$_POST['state'];
$total=$_SESSION['total'];
$item=$_SESSION['item'];
echo $_SESSION['total'];

$query="INSERT into orders values(LAST_INSERT_ID(),$cart_id,CURDATE(),'$date',$total,$item,'$name',$mbno,$pincode,'$flat','$landmark','$city','$state')";
   $result=mysqli_query($con,$query)or die("Error: " . mysqli_error($con));

$query="SELECT * from orders where cart_id=$cart_id";
$result=mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
while($row=mysqli_fetch_array($result))
{
 $id=$row['order_id'];
}
$query="INSERT into delivery values($id,0)";
$result=mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
header('Location:delivery.php');
}
} 

?>
 <?php 
$email=$_SESSION['success']; 
$query="SELECT * from customer where email_id='$email'";
$result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
$row=mysqli_fetch_array($result);
$name=$row['name'];
$mbno=$row['mobile_no'];
?>
<h1>Select a delivery address</h1>
<h4>On the move? Pick up your order from our pickup store.</h4>
<hr>
<form action="buytry.php" method="post">  
<div class="container-fluid">
<b>Full  name:</b><br> <br><input type="text" name="name" size="50" maxlength="60" class="input" value="<?php echo $name?>" required><br>
<br><b>Mobile number:</b><br><br> <input type="text" name="mbno" size="50" maxlength="50" class="input" value="<?php echo $mbno?>" required><br>
<br><b>Pincode:</b> <br><br><input type="text" name="pincode" size="50" maxlength="50" class="input" required><br>
<br><b>Flat / House No. / Floor / Building:</b><br><br> <input type="text" name="flat" size="50" maxlength="50" class="input"  required><br>

<br><b>Landmark: </b><br><br> <input type="text" name="landmark" size="50" maxlength="50" class="input"  required><br>
<br><b>Town/City: </b><br><br> <input type="text" name="city" size="50" maxlength="50" class="input"  required ><br>
<br><b>State:</b><br> <br><input type="text" name="state" size="50" maxlength="50" class="input"  required><br>
<br><br>
<input  type="submit" class="button" value="Deliver to this address" name="submit"><br>
      <br><p id="demo"></p>
    <br>
        <div class="col-sm-3">
          <div class="well">
           <p><font size="5" color="orange">Order Summary</font></p>
            <?php 
       $email=$_SESSION['success'];
     
      $query="SELECT cart_details.quantity,store_cost,cart_details.product_id from cart_details INNER JOIN product on cart_details.product_id=product.product_id  where cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
         $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
      $total=0;
      $item=0;
       while($row=mysqli_fetch_array($result))
          {
          $product_id=$row['product_id'];
          $quantity=$row['quantity'];
          $store_cost=$row['store_cost'];
          $total=$total+($quantity*$store_cost);
          $item=$item+$quantity;
          }


      ?>
<p>Item:<?php  echo $item;?></p>
<?php $_SESSION['total']=$total;  
 $_SESSION['item']=$item;  
?>
            <hr>
            <p><font size="4" color="red"><b>Order Total:<?php  echo $total;?></b></font>
              
            </p>
        </div>
    </div>
  </div>
</div>
</body>
</html>
