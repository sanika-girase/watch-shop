<!DOCTYPE html>
<html lang="en">
<head>
  <title>admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      background-color: #000000;
      margin-bottom: 0;
      border-radius: 0;
    }
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #000000;
      padding: 25px;
    }
    .dropbtn {
    color: white;
    padding: 16px;
    font-size: 15px;
    border: none;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
     box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #787878}

.dropdown:hover .dropdown-content {
    display: block;
}
.dropdown:hover .dropbtn {
    background-color: #3c3c3c;
}
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc {
    padding: 15px;
    text-align: center;
}
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <div class="dropdown">
        <li class="dropbtn">Wrist Watches</li>
  <div class="dropdown-content">
    <a href="#">Men's</a>
    <a href="#">Women's</a>
    <a href="#">Children's</a>
    <a href="#">Couple Watches</a>
    </div>
</div>
 <div class="dropdown">
        <li class="dropbtn">Alarm Clocks</li>
  <div class="dropdown-content">
    <a href="#">Digital</a>
    <a href="#">Analog</a>
    </div>
</div>
<div class="dropdown">
        <li class="dropbtn">Wall Clocks</li>
  <div class="dropdown-content">
    <a href="#">Modern Wall Clocks</a>
    <a href="#">Contemporary Wall Clocks</a>
   </div>
</div>
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><form class="form-wrapper">
    <input type="text" id="search" placeholder="Search for..." required >
    <input type="submit" value="go" id="submit">
</form></li>
      <li><a href="#">Contact</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
   </div>
   </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-md-4">
    <br>
      <div class="thumbnail">
        <a href="buttonpro.php" target="_blank">
          <img src="images\giphy.gif" alt="Lights" style="width:100%">
          <div class="caption">
            <center><p> Products </p></center>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
    <br>
      <div class="thumbnail">
        <a href="graph.php" target="_blank">
          <img src="images\circular_pie_chart_data_up_down.gif" alt="Nature" style="width:100%">
          <div class="caption">
            <center><p>Order Analysis</p></center>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
    <br>
      <div class="thumbnail">
        <a href="supplier_details.php" target="_blank">
          <img src="images\supplier.gif" alt="Fjords" style="width:100%">
          <div class="caption">
            <center><p>Supplier Details</p></center>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
    <br>
      <div class="thumbnail">
        <a href="custd_button.php" target="_blank">
          <img src="images\feedback.gif" alt="Nature" style="width:50%">
          <div class="caption">
            <center><p>Feedback</p></center>
          </div>
        </a>
      </div>
    </div>
<div class="col-md-4">
      <div class="thumbnail">
        <a href="#" target="_blank">
          <img src="images\motion.gif" alt="Nature" style="width:70%">
          <div class="caption">
            <center><p>Settings</p></center>

          </div>
        </a>
      </div>
    </div>
    
  </div>
</div>

</body>
</html>