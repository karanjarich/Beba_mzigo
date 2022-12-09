<?php
 //filter.php
 include_once"../connection_data.php";
 $sales=$_POST['sales'];
$output="";
						$sum = "SELECT sum(customers_orderdetails.unitsordered*customers_orderdetails.price) as total FROM customers_orderdetails where customers_orderno= '".$_POST["sales"]."'";
							  $result = mysqli_query($conn, $sum);

							  if(mysqli_num_rows($result) > 0)
							  {
								   while($row = mysqli_fetch_array($result))
								   {
										$output .= ''. $row["total"] .'';
								   }
							  }
							  else
							  {
								   $output .= 'Not Found ';

							  }

							  echo $output;
 
 ?>