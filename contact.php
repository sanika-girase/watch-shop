<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <?php
    include('head.php');
    include_once'connection.php';
    ?>
  </head>
  <body>
    <?php
    include('navigation.php');
    ?>

    <?php
if(isset($_POST['submit']))
    {
       $name=$_POST['name'];
       $email=$_POST['email'];
       $message=$_POST['message'];
      $query="INSERT into contact values(LAST_INSERT_ID(),'$email','$name','$message')";
       $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
          header('location: contact.php');
    }



    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-3 ">
        </div>
        
        <div class="col-md-6 text-left">
          <div class="middle">
            <form class="form-horizontal" action="contact.php" method="post">
              <div class="form-group">
                <center><h3>Contact Us</h3></center>
                <hr>
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
                </div>
              </div>
              <div class="form-group">
                <label for="message" class="col-sm-2 control-label">Message</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="4" name="message"></textarea>
                </div>
              </div>
             
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <! Will be used to display an alert to the user>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-3">
        </div>
      </div>
    </div>
    <?php
    include('footer.php');
    ?>
  </body>
</html>