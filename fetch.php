 <?php 
  include('connection.php');
  $query="SELECT  product_id,product_name,model_no,brand_name,brand_cost,store_cost,image  FROM product NATURAL JOIN description";
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
    echo '<a href="2.html>';
    echo '<img src="1/'.$images[$y].'" class="img-responsive" style="width:200px;height:200px"  alt="Image" >';
  
    echo '<p>'.$product_name[$y].'&nbsp'.'</p></a>';
    echo '<p>Selling Price:&#8377;<mark>'.$store_cost[$y].'</mark></p>';
    echo '<p>Actual Price:&#8377;'.$brand_cost[$y].'</p>';
    $y++;
    echo '</div>';
    }?>