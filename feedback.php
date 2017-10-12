<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
   include_once ('navigation.php');

    include('head.php');


    ?>
        <?php 
    include_once 'connection.php';
    if(isset($_GET['delete']) && !empty($_GET['delete']))
    {
      $delete_id=$_GET['delete'];
    $query="DELETE from contact where Email='$delete_id'";
        $result = mysqli_query($con, $query);
        header('location:feedback.php');
    }
    
 if(!empty($errors))
      {
        echo display_errors($errors);
      }
      else{

        }
    ?>
<div class="col-md-9">
        <h2>FEEDBACK DETAILS:</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
            <th>Email</th>
              <th>Name</th>
              <th>Comment</th>
               <th>Delete</th>
              
            </tr>
          </thead>
          <?php
          include("connection.php");
          $p="SELECT * from contact ";
          $re=mysqli_query($con,$p);
          while($row=mysqli_fetch_array($re))
          {
           $r1=$row['email'];
          ?>
          <tbody>
            <tr>
                  <td><?php echo $row['email']; ?></td>
          
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['Comment']; ?></td>
                 <td><a href="feedback.php?delete=<?php echo $r1 ;?>"class="btn btn-xs-default"><span class="glyphicon glyphicon-remove"></span></a></td>;
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div>
    
</body>
</html>

