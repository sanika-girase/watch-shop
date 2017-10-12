<!DOCTYPE html>
<?php
 include('navigation.php');
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<p><b><center><h4>Stock Details<h4></h4></center></b></p>
<ht>
 <table class="table table-striped table-auto">
                <thead>
                <th>Product Name</th>
                <th>Model No</th>
                <th>quantity</th>
                </thead>
                <tbody>
<?php 
include_once 'connection.php';

$query="SELECT * from stock where quantity<=5";
$result = mysqli_query($con,$query);
while ($row=mysqli_fetch_array($result)) 
{   echo '<tr>';
	$product=$row['product_name'];
	$model=$row['model_no'];
	$quantity=$row['quantity'];
?>
          <td><?php  echo $product?></td>
          <td><?php  echo $model ?></td>
          <td><?php  echo $quantity ?></td>

<?php
 echo '</tr>';
}
?>
</tr>
</tbody>
</table>


</body>
</html>
