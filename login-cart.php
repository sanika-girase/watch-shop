<?php
session_start();
if(isset($_GET['cart']) && !empty($_GET['cart']))
	{ $_SESSION['cart']=$_GET['cart'];

           if(!empty(($_SESSION['success'])))
              {   

                	header('location: cart.php');
                	

              }
                else
                {   
                	header('location: login.php');
                       
                }

         }
?>
