<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <?php
    include_once'head.php';
    include_once 'connection.php';
    ?>
  </head>
  <body>
    <?php
     include_once 'navigation.php';
    ?>
    <div class="jumbotron">
      <div class="container  text-center">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner" style="width: 100%">
            <div class="item active">
              <img src="images/3.jpg" alt="Image" style="width:100% "/>
            </div>
            <div class="item">
              <img src="images/10.jpg" alt="Image" style="width:100%"/>
            </div>
            <div class="item">
              <img src="images/7.jpg" alt="Image" style="width:100%"/>
            </div>
          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <p style="font-size:80px; left:50px; padding-left: 380px " ><i>World Of Watches</i></p>
    </div>
  
  <div class="container-fluid bg-3 text-center">
    <h2>TOP SALES</h2><br>
    <div class="row">
      <?php
      
      $query="SELECT  product_id,product_name,model_no,brand_name,brand_cost,store_cost,image  FROM product p,brand b,description d where p.brand_id=b.brand_id and d.description_id=p.description_id";
      $result = mysqli_query($con, $query);
      $images=array();
      $brand=array();
      $product_name=array();
      $brand_cost=array();
      $store_cost=array();
      $model_no=array();
      while($row=mysqli_fetch_array($result))
      {
      $images[]=$row['image'];
      $brand[]=$row['brand_name'];
      $product_name[]=$row['product_name'];
      $brand_cost[]=$row['brand_cost'];
      $store_cost[]=$row['store_cost'];
      $model_no[]=$row['model_no'];
      $product_id[]=$row['product_id'];
      }
      $nos=mysqli_affected_rows($con);
      if($nos>8)
      {
      $nos=8;
      }
      $y=0;
      while($y!=$nos)
      {
      echo '<div class="col-sm-3">';
        echo '<a href="2p.php?var='.$product_id[$y].'">';
          echo '<img src="1/'.$images[$y].'" class="img-responsive" style="width:200px;height:200px"  alt="Image" >';
          echo '<p calss="text-center">'.$product_name[$y].'&nbsp'.'</p></a>';
          echo '<p calss="text-center">Selling Price:&#8377;<mark>'.$store_cost[$y].'</mark></p>';
          echo '<p class="text-danger">Actual Price:&#8377;<s>'.$brand_cost[$y].'</s></p>';
          $y++;
        echo '</div>';
        }
        ?>
      </div>
    </div><br>
<?php 
include_once 'footer.php';
?>
  </body>
</html>