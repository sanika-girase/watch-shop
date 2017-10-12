
<?php
require("fpdf/fpdf.php");
include_once 'connection.php';
if(isset($_GET['bill']))
{
	$bill=$_GET['bill'];
}
        $query="SELECT * from orders where order_id=$bill";
         $result = mysqli_query($con,$query)or die("Error: " . mysqli_error($con));
while($row=mysqli_fetch_array($result))
          {
          $name=$row['name'];
          $quantity=$row['flat'];
          $landmark=$row['landmark'];
          $city=$row['city'];
          $date=$row['delivery_date'];
          $order_id=$row['order_id'];
          $Total_Price=$row['total_price'];
          $quantity=$row['total_quantity'];
          }


$pdf= new FPDF("P","mm","A4");
$pdf->Addpage();
$pdf->Setfont("Arial","B",14);
$pdf->Cell(130,5,".........Bill...........",1,1);
$pdf->Cell(130,5,"Order_id:$order_id",1,1);
$pdf->Cell(130,5,"Name:$name",1,1);
$pdf->Cell(130,5,"Address:$landmark   $city",1,1);

$pdf->Cell(130,5,"Quantity:$quantity",1,1);
$pdf->Cell(130,5,"Total_Price:$Total_Price",1,1);


$pdf->Output();

?>
