<?php include_once 'connection.php';?>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#"><img src="1/logo2.png" height=30 width=30></a></li>
        <div class="dropdown">
           <li class="dropbtn">Wrist Watches</li>
           <div class="dropdown-content">
          <?php
$query="SELECT * from subcatagory where catagory_id=1";
$result = mysqli_query($con, $query);
 while($row=mysqli_fetch_array($result))
      {
     echo ' <a href="product.php?sub_cat='.$row['subcatagory_id'].'">'.$row['subcatagory_name']. '</a>';
       }
?>
 </div>
</div>        
          
          <div class="dropdown">
          <li class="dropbtn">Alarm Clocks</li>
          <div class="dropdown-content">
             <?php
$query="SELECT * from subcatagory where catagory_id=2";
$result = mysqli_query($con, $query);
 while($row=mysqli_fetch_array($result))
      {
     echo ' <a href="product.php?sub_cat='.$row['subcatagory_id'].'">'.$row['subcatagory_name']. '</a>';
       }
?>
          
          </div>
        </div>
        <div class="dropdown">
          <li class="dropbtn">Wall Clocks</li>
          <div class="dropdown-content">
             <?php
$query="SELECT * from subcatagory where catagory_id=3";
$result = mysqli_query($con, $query);
 while($row=mysqli_fetch_array($result))
      {
     echo ' <a href="product.php?sub_cat='.$row['subcatagory_id'].'">'.$row['subcatagory_name']. '</a>';
       }
?>
          </div>
        </div>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--<li><form class="form-wrapper">
          <input type="text" id="search" placeholder="Search for..." required >
          <input type="submit" value="go" id="submit">
        </form></li>-->
        <li><a href="cart.php?cart=cart" ><img src="1/cart2.png" height="25" width="30"></a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php if(empty($_SESSION['success'])){?>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php } else {?>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
