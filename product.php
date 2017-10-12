<?php
session_start();
include_once 'connection.php';
?>
<html lang="en">
<head>
		<title>Bootstrap Example</title>
		<?php
		include_once'head.php';
		?>
	</head>
	<body>
		<?php
		include_once 'navigation.php';
				$subcatagory=$_GET['sub_cat'];
		?>
		<div class="container">
			<div class="row">
				<div class="col-sm-3"  style="padding-top: 40px">
					<p><h4>Brand</h4></p>
					<form method="post" action="product.php?sub_cat=<?php echo $subcatagory?>">
				<?php
		         $query = "SELECT distinct(brand_id),brand_name from brand NATURAL join product where product.subcatagory_id=$subcatagory";
				$result1 = mysqli_query ($con,$query);
 				while($row=mysqli_fetch_array($result1))
				{
  				?>
				<br><input type="checkbox" id="check1" name="check1[]" value="<?php echo $row["brand_id"]?>">  <?php  echo $row["brand_name"];  ?>

				<?php

				}
				
				?>


				<hr>
				<input type="submit" value="Find Products">

				</form>

</div>
				<?php	
			if(isset($_POST['check1'])){
				$brands = $_POST['check1'];
				$brand1=implode("|",$brands);
				$result1= mysqli_query($con,"SELECT  product_name,product_id,brand_cost,store_cost,image  FROM product NATURAL JOIN description where subcatagory_id=$subcatagory and  brand_id in ('".implode("','", $brands)."')");
		
		
	                 echo '<div class="col-sm-9 middle">';
						
						$images=array();
						
						$product_name=array();
						$brand_cost=array();
						$store_cost=array();
						$product_id=array();
						if (mysqli_num_rows($result1)>0) {
							# code...
						
						while($row=mysqli_fetch_array($result1))
						{
						$images[]=$row['image'];
						$product_name[]=$row['product_name'];
						$brand_cost[]=$row['brand_cost'];
						$store_cost[]=$row['store_cost'];
						
						$product_id[]=$row['product_id'];
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
						}
						else 
						{
							echo '<div class="alert alert-warning">
                                 <strong>Warning!</strong> No Result Found
                                      </div>';
						}
echo '</div>';							
}

							?>


					
					
				

				
				
						<?php
						if(!isset($_POST['check1']))
						{

						
						$query="SELECT  product_name,product_id,brand_cost,store_cost,image  FROM product NATURAL JOIN description where subcatagory_id=$subcatagory";
						$result = mysqli_query($con, $query);
							echo '<div class="col-sm-9 middle">';
						$images=array();
						
						$product_name=array();
						$brand_cost=array();
						$store_cost=array();
						$product_id=array();
						while($row=mysqli_fetch_array($result))
						{
						$images[]=$row['image'];
						$product_name[]=$row['product_name'];
						$brand_cost[]=$row['brand_cost'];
						$store_cost[]=$row['store_cost'];
						$product_id[]=$row['product_id'];
						}
						$nos=mysqli_affected_rows($con);
						
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

					echo '</div>';	} 
							?>
						
					</div>
				</div>

			

	<?php
	include('footer.php');
	?>
</body>
</html>