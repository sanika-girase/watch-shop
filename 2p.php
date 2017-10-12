<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <?php
    include('head.php');
    ?>
  </head>
  <body>
    <?php
    include('navigation.php');
    ?>
    <?php
    include('connection.php');
    $v=$_GET['var'];
    $query="SELECT * FROM product p,brand b,description d where  p.brand_id=b.brand_id and p.description_id =d.description_id and product_id='$v'";
    $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
    while($row=mysqli_fetch_array($result))
    {
    $product_name=$row['product_name'];
    $model_no=$row['model_no'];
    $brand_name=$row['brand_name'];
    $brand_cost=$row['brand_cost'];
    $store_cost=$row['store_cost'];
    $quantity=$row['quantity'];
    $colour=$row['colour'];
    $material=$row['material'];
    $display_type=$row['display_type'];
    $dial_shape=$row['dial_shape'];
    $warrenty=$row['warrenty'];
    $image=$row['image'];
    $product=$row['product_id'];//further required
    if($quantity==0)
    {
    $availbale="Not In Stock";
    }
    else
    {
    $availbale="In Stock";
    }
    }
    echo $row['brand_id'];
    ?>
    <div class="container-fluid text-center">
      <div class="row content">
        <div class="col-sm-2 sidenav">
          <!--<div class="thumbnail">-->
          <img src="1/<?php echo $image ?>" class="img-thumbnail" alt="Cinque Terre" width="100%" height="236px"   data-toggle="modal" data-target="#myModal">
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal content-->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><?php echo $brand_name ?></h4>
                </div>
                
                <div class="modal-body">
                  <img src="1/<?php echo $image ?>" width="100%" height="500px" />
                </div>
                <!--<div class="modal-footer">
                  
                </div>-->
              </div>
            </div>
          </div>
          <hr>
          <a href="offers.php">
            <img src="img/offers.png "width=100% height=256>
          </a>
        </div>
        
        <div class="col-sm-8 text-left">
          <h3><!--<img src="img/titan.jpg" width="50" height="50">--><?php echo $product_name ?> </h3>
          <hr>
          <ul class="middle">
            <p><h3><b><code>Our Price:&#8377;<?php echo $store_cost ?></code></b></h3></p>
            <p class="text-danger">Actual Price:<s>&#8377;<?php echo $brand_cost ?></s></p>
            <h4><p class="text-success"><?php echo $availbale ?></p></h4>
            <li>Case Shape: <?php echo $dial_shape ?> </li>
            <li>Band Color:  <?php echo $colour ?>, Band Material: <?php echo $material ?> </li>
            <li>Watch Display Type:  <?php echo $display_type ?> </li>
            
          </ul>
          <p><h3><b>Product Specification</b></h3></p>
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td>Band Colour</td>
                <td><?php echo $colour ?></td>
                
              </tr>
              <tr>
                <td>Band Material </td>
                <td><?php echo $material ?></td>
                
              </tr>
              <tr>
                <td>Brand </td>
                <td><?php echo $brand_name?></td>
                
              </tr>
              <tr>
                <td>Display Type </td>
                <td><?php echo $display_type ?></td>
                
              </tr><?php  ?>
              <tr>
                <td>Dial Shape</td>
                <td>
                  <?php echo $dial_shape ?>
                </td>
              </tr>
              <tr>
                <td>Model Number </td>
                <td><?php echo $model_no ?></td>
              </tr>
              <tr>
                <td>Warrenty</td>
                <td>
                  <?php echo $warrenty ?>
                </td>
              </tr>
              
            </tbody>
          </table>
          <p class="text-primary">
          Report incorrect product information.</p>
          <!--KKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKKK-->
          <div class="well well-small">
            <h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
            <div id="featured" class="carousel slide">
              <div class="carousel-inner">
                <?php
                
                $query="SELECT * from product natural join description where subcatagory_id in (select subcatagory_id from product where product_id='$v')";
                $result = mysqli_query($con, $query) or die("Error: " . mysqli_error($con));
                
                $image=array();
                $product_id=array();
                echo '<div class="item active">';
                  while($row=mysqli_fetch_array($result))
                  {
                  $image[]=$row['image'];
                  $product_id[]=$row['product_id'];
                  }
                  $nos=mysqli_affected_rows($con);
                  $i=0;
                  if($nos>8)
                  {
                  $nos=8;
                  }
                  while($i<4)
                  {
                  echo ' <div class="col-md-3">';
                    echo '
                    <a href="2p.php?var='.$product_id[$i].'" target="_blank" >';
                      echo '<img src="1/'.$image[$i].'" alt="Lights" class="img-responsive" style="width:200px;height:200px">
                    </a>
                    
                  </div>';
                  $i++;
                  }
                echo '</div>';
                echo '<div class="item">';
                  while($i!=$nos)
                  {
                  
                  echo ' <div class="col-md-3">';
                    echo '
                    <a href="2p.php?var='.$product_id[$i].'" target="_blank" >';
                      echo '<img src="1/'.$image[$i].'" alt="Lights" class="img-responsive" style="width:200px;height:200px">
                    </a>
                    
                  </div>';
                  $i++;
                }  echo '</div>';
                ?>
                
              </div>
              <a class="left carousel-control" href="#featured " data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#featured " data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-2 sidenav">
          <img src="img/cart.jpg" height="200" width="200">
          <a class="btn btn-primary btn-sm btn-block" href="cart.php?cart=<?php echo   $product ?>">Add To Cart</a>
          <a class="btn btn-primary btn-sm btn-block" href="cart.php?cart=<?php echo   $product ?>">Buy Now</a>
          
        </div>
      </div>
    </div>
    <hr>
    <?php
    include('footer.php');
    ?>
  </body>
</html>