<?php
$username='root';
$password='';
$db='watch1';
$con= mysqli_connect('localhost', $username, $password, $db);
include('./phpgraphlib.php');
$dataArray=array();
$sql="SELECT order_date,count(*) as count from orders group by order_date";
$result = mysqli_query($con,$sql);
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $order_date=$row["order_date"];
      $count=$row["count"];
      //add to data areray
      $dataArray[$order_date]=$count;
  }
}
$graph = new PHPGraphLib(400,300);
$graph->addData($dataArray);
$graph->setBarColor('255,255,204');
$graph->setTitle("Order Analysis");
$graph->setGradient("lime", "green");
$graph->setBarOutlineColor("black");
$graph->createGraph();


?>