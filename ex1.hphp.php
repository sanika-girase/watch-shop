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
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
         </style>
      </head>

      <body>

      <?php
      if(isset($_POST['check1']))
      {
        echo $check1;
      }
      if (isset($_POST['check2'])){
        echo "hello";
          # code...
      }

      ?>

<label class="switch">
  <input type="checkbox" name="check1">
  <span class="slider"></span>
</label>
<label class="switch">
  <input type="checkbox" name="check2">
  <span class="slider round"></span>
</label>
<footer class="container-fluid">
              <p>Footer Text</p>
            </footer>
          </body>
        </html>

