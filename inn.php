<!DOCTYPE html>
<html lang="en">
  <head>
    <title>INSERT</title>
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <title>Supplier</title>
        <?php include_once 'head.php';
        include_once 'connection.php';
        include_once 'errors.php';
        ?>
        <style type="text/css">
          

          .file {
  visibility: hidden;
  position: absolute;
}

        </style>
      </head>
      <body>


     <?php
            include('connection.php');
            if (isset($_POST['sub'])) 
            {
 
            $product_name=$_POST['prod_name'];
            $subca_id=$_POST['watch'];
            $model_no=$_POST['model_no'];
            $image=$_POST['pic'];
            $brand_name=$_POST['brand'];
            $brand_cost=$_POST['brand_cost'];
            $store_cost=$_POST['store_cost'];
            $quentity=$_POST['quentity'];
            $color=$_POST['color'];
            $material=$_POST['material'];
            $dis_type=$_POST['dis_type'];
            $dial_shape=$_POST['dial_type'];
            $warrenty=$_POST['warrenty'];
            //$sup_id=$_POST['sup_id1'];
         //   $des_id=$_POST['des_id'];
       /*    $query="SELECT * from brand";
                      $result = mysqli_query($con, $query);
                      while($row=mysqli_fetch_array($result))
                      {
                      $brand_name=$row['brand_name'];
                      $brand_id=$row['brand_id'];
                      } */
       $p= "SELECT  supplier.supplier_id from supplier,product where supplier.brand_id=product.brand_id and supplier.brand_id=$brand_name group by supplier.supplier_id";
       $r=mysqli_query($con,$p)or die("Error: " . mysqli_error($con));
        while($row=mysqli_fetch_array($r))
       {
        $br=$row['supplier_id'];
       }

            $q1="INSERT INTO description VALUES (LAST_INSERT_ID(),'$color','$material','$dis_type','$dial_shape','$warrenty','$image')";
            $result=mysqli_query($con,$q1)or die("Error: " . mysqli_error($con));
           
        $q2="SELECT * from description";
        $result=mysqli_query($con,$q2)or die("Error: " . mysqli_error($con));

         while($row=mysqli_fetch_array($result))
       {
        $desc=$row['description_id'];
       }
       echo $desc;
            $e="INSERT into product values(LAST_INSERT_ID(),'$model_no','$product_name',$subca_id,$brand_name,$brand_cost,$store_cost,$quentity,$br,$desc)";
            $ref=mysqli_query($con,$e)or die("Error: " . mysqli_error($con));
          }
          
            ?>
<?php
  function filterName($field){
      // Sanitize user name
      $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
      if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
          return $field;
      }else{
          return FALSE;
      }
  } 

     
  $nameErr = $mErr = $messageErr = "";
  $name = $m = $subject = $message = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
   
      // Validate user name
      if(empty($_POST["prod_name"])){
          $nameErr = 'Please enter Product name.';
      }else{
          $name = filterName($_POST["prod_name"]);
          if($name == FALSE){
              $nameErr = 'Please enter a valid  Product name.';
          }
      }
      if(empty($_POST["material"])){
          $mErr = 'Please enter Material name.';
      }else{
          $m = filterName($_POST["material"]);
          if($m == FALSE){
              $mErr = 'Please enter a valid  Material name.';
          }
      }
      }

?>

          
          <div class="container-fluid">
            <div class="row content">
              <div class="col-sm-3 sidenav">
                
                
                <br>
              </div>
            <br>
            
            <?php include_once 'navigation.php';?>
            <form action="inn.php" method="post">
              <h3 class="text-center">Add New Product</h3>
              <table class="table table-striped table-auto">
                <thead>
                </thead>
                <tbody>
                  <tr>
                    
                    <td>Product_Name:</td>
                    <td><input type="text" name="prod_name" required></td>
                    <td><span class="error"><?php echo $nameErr; ?></span> </td>
                  </tr>
                  <tr>
                    
                    <td>Subcategory-id:</td>
                    <td>
                      
                      <select class="form-control" name="watch" required>
                        
                        <?php
                        $query = "SELECT subcatagory_id,subcatagory_name from subcatagory;";
                        $result = mysqli_query($con, $query);
                        while($row=mysqli_fetch_array($result))
                        {
                        $sub_name=$row['subcatagory_name'];
                        $sub_id=$row['subcatagory_id'];
                        echo '<option value='.$sub_id.'>'.$sub_name.'</option>';
                        }
                        ?>
                        
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Model.No :</td>
                    <td><input type="text" name="model_no" required></td>
                  </tr>
                  <tr>
                    <td>Image</td>
                    <td>
               <div class="form-group">
              <input type="file" name="pic" class="file" required>
               <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
              <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
      <span class="input-group-btn">
        <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
      </span>
    </div>
  </div></td>

      <script type="text/javascript">
        $(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
   });
$(document).on('change', '.file', function(){




  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});
      </script>
                    <!--<td><input type="file" name="pic" accept="image/*"></td>-->
                  </tr>
                  <tr>
                    <td>Brand-name :</td>
                    <td><select class="form-control" name="brand" required>
                      
                      <?php
                      $query="SELECT * from brand";
                      $result = mysqli_query($con, $query);
                      while($row=mysqli_fetch_array($result))
                      {
                      $brand_name=$row['brand_name'];
                      $brand_id=$row['brand_id'];
                      echo '<option value='.$brand_id.'>'.$brand_name.'</option>';
                      }
                      ?>
                      
                    </select></td>
                  </tr>
                  <tr>
                    <td>Brand-cost :</td>
                    <td><input type="text" name="brand_cost" required></td>
                  </tr>
                  <tr>
                    <td>Store-cost :</td>
                    <td><input type="text" name="store_cost" required></td>
                      
                  </tr>
                  <tr>
                    <td>Colour : </td>
                    <td><select class="form-control" name="color" required>
                      <option value="black">Select Colour</option>
                      
                      <option value="black">Black</option>
                      <option value="white">White</option>
                      <option value="gloden">Gloden</option>
                      <option value="silver">Silver</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td>Material : </td>
                    <td><input type="text" name="material" required></td>
                    <td><span class="error"><?php echo $mErr; ?></span> </td>
                
                  </tr>
                  <tr>
                    <td>Display_Type:</td>
                    <td><select class="form-control" name="dis_type" required>
                      <option value="black">Display Type</option>
                      
                      <option value="analogue">Analog </option>
                      <option value="digital">Digital</option>
                      
                    </select></td>
                  </tr>
                  
                  <tr>
                    <td>Dial_shape:</td>
                
                      <td><select class="form-control" name="dial_type" required>
                        <option value="black">Dial shape</option>
                        <option value="circle">Round</option>
                        <option value="oval">Oval</option>
                        <option value="square">Square</option>
                        <option value="square">Other</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Warranty :</td>
                    <td><input type="text" name="warrenty" required>*  In months</td>
                  </tr>
                  <tr>
                    <td>Quantity :</td>
                    <td><input type="text" name="quentity" required></td>
                  </tr>
              <!--    <tr>
                    <td>Supplier-id :</td>
                    <td><input type="text" name="sup_id1" required></td>
                  </tr> -->
                
             <!--     <tr>
  <?php /*
    //$p=" SELECT description_id FROM description ORDER BY description_id DESC LIMIT 1";
    //echo $p;
    $re=mysqli_query($con,$p);
    $f=$p+2;

    while($row=mysqli_fetch_array($re))
    {
       $e=$row['description_id'];
        }
  */ ?> 
    <td>Description-id :</td>
     
      <td><input type="text" name="des_id" value="<?php// echo $e+2;?>"></td>
  </tr> -->
             </tbody>
               </table>
                <br><br>
                <center>
   <input type="submit" name="sub" class="btn btn-success">
    </center>
                
              </div>
            </form>
          
            <footer class="container-fluid">
              <p>Footer Text</p>
            </footer>
          </body>
        </html>