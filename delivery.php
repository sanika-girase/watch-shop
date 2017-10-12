<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include('head.php');
    ?>
 </head>
 <body>
<div class="col-md-9" style="margin-top: 50px;margin-left: 100px">
<div class="panel panel-info">
      <div class="panel-heading">Delivered To
      </div>
      <div class="panel-body">



       <?php
       include_once 'connection.php';
      $email=$_SESSION['success'];
        $query="SELECT * from orders where cart_id in(select cart_id from cart where customer_id in (SELECT  customer_id from customer  where email_id='$email'))";
         $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
          while($row=mysqli_fetch_array($result))
          {
          $name=$row['name'];
          $quantity=$row['flat'];
          $landmark=$row['landmark'];
          $city=$row['city'];
          $date=$row['delivery_date'];
          $order_id=$row['order_id'];
      

          }


      ?>
<?php
    $mailto =   $email;
    $mailSub =   "Delivery Status:::World Of Watches";
    $mailMsg = "Your Order ID: ".$order_id."Hope to see you Next Time...Have a Nice Day....";
   require 'PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "123watchworld@gmail.com";
   $mail ->Password = "world123";
   $mail ->SetFrom("123watchworld@gmail.com");
   $mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);

   if(!$mail->Send())
   {
       echo "Mail Not Sent";
   }
   else
   {
       echo "Mail Sent";
   }
?>


















      <p><b>Order Id:<?php echo $order_id ?></b></p>
      <p><b>Name:</b><?php echo $name ?></p>
      <p><b>Building/Fla:</b><?php echo $quantity ?></p>
      <p><b>Landmark:</b><?php echo $landmark ?></p>
      <p> <b>City:</b><?php echo $city ?></p>
   <p><b>Delivered On:</b><?php echo $date ?></p>
 <a class="btn btn-warning" href="bill.php?bill=<?php echo  $order_id ?>">Bill</a>
</div>
</div>
<p></p>
</div>
</body>
</html>
 
