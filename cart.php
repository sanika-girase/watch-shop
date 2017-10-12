<?php

include_once 'login-cart.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include('head.php');
    ?>
  
  </head>
  <body>
<?php
   include_once 'connection.php';
if(isset($_GET['product']) && !empty($_GET['product']))
    {
      $id=$_GET['product'];
         $email=$_SESSION['success'];
    $query="DELETE from cart_details  where product_id=$id and cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
        $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
        $_SESSION['cart']='cart';
        header('location:cart.php');
    }
//Add Quantity
if(isset($_GET['plus']) && !empty($_GET['plus']))
    {
      $id=$_GET['plus'];
         $email=$_SESSION['success'];
$query="SELECT * from product where product_id=$id";
$result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
 $row=mysqli_fetch_array($result);
 $total=$row['quantity'];

    $query="SELECT *  from cart_details  where product_id=$id and cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
        $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
      $row=mysqli_fetch_array($result);
      $cart_total=$row['quantity'];
      if($cart_total<($total-1))
      {
        $query="UPDATE cart_details set quantity=($cart_total+1) where product_id=$id and cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
         $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
      }
      else
      {

      }   $_SESSION['cart']='cart';
        header('location:cart.php');
    }

if(isset($_GET['minus']) && !empty($_GET['minus']))
    {
      $id=$_GET['minus'];
         $email=$_SESSION['success'];
        $query="SELECT *  from cart_details  where product_id=$id and cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
        $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
      $row=mysqli_fetch_array($result);
      $cart_total=$row['quantity'];
      if($cart_total>1)
      {
        $query="UPDATE cart_details set quantity=($cart_total-1) where product_id=$id and cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
         $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
      }
      else
      {

      }   $_SESSION['cart']='cart';
        header('location:cart.php');
    }
?>
<?php
    include_once 'navigation.php';
    ?>
    <div class="alert alert-success text-center"><p>
       <p><a href="index.php" class="btn btn-warning pull-right" style="margin-left: 10px">Continue Shoppping</a></p>
      <a href="buytry.php" class="btn btn-warning pull-right">Proceed to checkout</a></p>
      <strong><h3>Added to Cart</h3></strong>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
      <strong><h3>Shopping Cart</h3></strong>
      <form  action="cart.php" method="post" >
      <table class="table table-striped table-auto">
        <thead>
          
        </thead>
        <tbody>
          <?php
        
          $product=$_SESSION['cart'];
        
          $email=$_SESSION['success'];
          include_once 'connection.php';
          $product_id=array();
       
          if($_SESSION['cart']!='cart')
          {
          $query1="SELECT * from customer where email_id='$email'";
          $result=mysqli_query($con, $query1)or die("Error: " . mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $customer_id=$row['customer_id'];
          $query2="SELECT  * from cart where customer_id=$customer_id";
          $result=mysqli_query($con, $query2)or die("Error: " . mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $nos=mysqli_affected_rows($con);
          if($nos==0)
          {
          $query2="INSERT into cart values(LAST_INSERT_ID(),$customer_id)";
          $result=mysqli_query($con, $query2)or die("Error: " . mysqli_error($con));
          }
          $query3="SELECT * from cart where customer_id=$customer_id";
          $result=mysqli_query($con, $query3)or die("Error: " . mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $cart_id=$row['cart_id'];
          $query2="SELECT * from cart_details where cart_id=$cart_id and product_id=$product";
          $result=mysqli_query($con, $query2)or die("Error: " . mysqli_error($con));
          $no=mysqli_affected_rows($con);
          echo $no;
         echo $cart_id;
         echo $product;

          if($no>0)
          {
             echo ' <tr><div class="alert alert-danger">
             <strong>!</strong> Product Already In Cart
            </div> <tr>';
          }
          else
          {
          $query3="INSERT into cart_details values($cart_id,$product,1)";
          $result=mysqli_query($con, $query3)or die("Error: " . mysqli_error($con));
          }
             $_SESSION['cart']='cart';
    }
          $query="SELECT * from cart NATURAL JOIN cart_details where customer_id in (select customer_id from customer where email_id='$email')";
          $result=mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
          $nos=mysqli_affected_rows($con);
       
          while($row=mysqli_fetch_array($result))
          {
          $product_id[]=$row['product_id'];
          $quan[]=$row['quantity'];
          }
          $y=0;
          if($nos>0)
          {
          while($y!=$nos)
          {
            $total=$quan[$y];
          $query1="SELECT * from product natural join description where product_id=$product_id[$y]";
          $result=mysqli_query($con, $query1)or die("Error: " . mysqli_error($con));
          $row=mysqli_fetch_array($result);
          $image=$row['image'];
          $colour=$row['colour'];
          $material=$row['material'];
          $product_name=$row['product_name'];
          $brand_cost=$row['brand_cost'];
          $store_cost=$row['store_cost'];
          $model_no=$row['model_no'];
          $quantity=$row['quantity'];
          $product1=$row['product_id'];

          $y++;
          
          
          ?><tr>
            <td><img src="1/<?php  echo $image?>" width="120"  height="120" alt=""/>
            <?php  echo $product_name?>Color : <?php  echo $colour?><b><code>Our Price:&#8377;<?php echo $store_cost ?></code></b></td>
       <td> <a href="cart.php?product=<?php echo $product1?>" class="btn btn-xs-default"><span class="glyphicon glyphicon-trash"></span></a></td>
       <td> <a href="cart.php?plus=<?php echo $product1?>" class="btn btn-xs-default"><span class="glyphicon glyphicon-plus"></span></a></td>
       <td> <a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true"><?php echo $total ?></a></td>
       <td> <a href="cart.php?minus=<?php echo $product1?>" class="btn btn-xs-default"><span class="glyphicon glyphicon-minus"></span></a></td>
                
              
        </tr>
   
          <?php
          }
          }
          else
           {
              echo ' <tr><div class="alert alert-danger">
             <strong>Empty!!</strong>
            </div> <tr>';

            }
          ?>
          
        </tbody>
      </table>
    </form>
    </div>
<div class="col-md-3">
<div class="panel panel-info">
      <div class="panel-heading">SubTotal</div>
      <div class="panel-body"></div>
      <?php 
       $email=$_SESSION['success'];
       include_once 'connection.php';
      $query="SELECT cart_details.quantity,store_cost,cart_details.product_id from cart_details INNER JOIN product on cart_details.product_id=product.product_id  where cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
         $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
      $total=0;
       while($row=mysqli_fetch_array($result))
          {
          $product_id=$row['product_id'];
          $quantity=$row['quantity'];
          $store_cost=$row['store_cost'];
          $total=$total+($quantity*$store_cost);
          }


      ?>
<p>Total:<?php  echo $total;?></p>
    </div>
</div>

  </div>
</div>
      <?php
      include('footer.php');
      ?>
    </body>
  </html>