<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php
    include('navigation.php');
    include('errors.php');
    include('connection.php');
    ?>
		<hr>
		<?php
		$errors=array();

		if(isset($_GET['delete']) && !empty($_GET['delete']))
		{
			$delete_id=(int)$_GET['delete'];
		$query="DELETE from brand where brand_id='$delete_id'";
				$result = mysqli_query($con, $query);
				header('location:brand.php');
		}
		
		//Edit Brand
		if(isset($_GET['edit']) && !empty($_GET['edit']))
		{
			$edit_id=(int)$_GET['edit'];
		
		$query="SELECT brand_name from brand where brand_id='$edit_id'";
		$result = mysqli_query($con, $query);
		while($row=mysqli_fetch_assoc($result))
		{
			$edit_name=$row['brand_name'];
		}
		
		
				
		}
		if(isset($_POST['sub']))
		{
			$brand=$_POST['brand'];
			if($_POST['brand']=='')
			{
		$errors[].='You Must Enter Brand';
			}
			
		$query="SELECT  brand_name from brand where brand_name='$brand'";
		$result = mysqli_query($con, $query);
		$count=mysqli_affected_rows($con);
		if($count>0)
		{
			$errors[].='Brand Alreday exist Please Enter Another Brand.....';
		}
		if(!empty($errors))
			{
				echo display_errors($errors);
			}
			else{
				$query="INSERT into brand values(LAST_INSERT_ID(),'$brand')";
				
		if(isset($_GET['edit']))
		{
		$query="UPDATE brand  set brand_name='$brand' where brand_id=$edit_id";
			}
		$result = mysqli_query($con, $query);
		header('location:brand.php');
			}
		}
		//Delete Brand
		
		?>
		<div class="container-fluid">
			<div class="row">
				<div col-md-3>
				</div>
				<div class="col-md-9">
		<div class="text-center">
			<form class="form-inline" action="brand.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post">
				<div class="form-group">
					<label for="brand">Name</label>
					<input type="text" id="brand" class="form-control" name="brand" value="<?=(isset($_GET['edit']))?''.$edit_name:''?>" >
				</div>
				
				<input type="submit" name="sub" class="btn btn-success" value="<?=(isset($_GET['edit']))?'Edit':'Add';?>  Brand" >
				<?php
				if(isset($_GET['edit']))
				{
				echo '<a href="brand.php" class="btn btn-success"   value="Cancel" name="cancel">Cancel</a>';
				}
				else{}		?>
			</form>
		</div><hr>
		<br><br><br>
		
		<h3 class="text-center">Brands</h3>
		<table class="table table-striped table-auto">
			<thead>
				
			</thead>
			<tbody>
				<?php
				$query="SELECT * from brand";
				$result = mysqli_query($con, $query);
				while($row=mysqli_fetch_array($result))
				{
				$brand=$row['brand_name'];
				$brand_id=$row['brand_id'];
												echo		'<tr>';
									echo '<td><a href="brand.php?edit='.$brand_id.'"class="btn btn-xs-default"><span class="glyphicon glyphicon-pencil"></span></a></td>';
														echo	'<td>'.$brand.'</td>';
										echo '<td><a href="brand.php?delete='.$brand_id.'"class="btn btn-xs-default"><span class="glyphicon glyphicon-remove"></span></a></td>';
				echo'</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php include('footer.php');?>
	</body>
</html>