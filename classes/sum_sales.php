<?php
 //filter.php
 include_once"../connection_data.php";
 $sales=$_POST['sales'];
$output="";
						$sum = "SELECT sum(quantity*price) as total FROM sales_details where sales_no= '".$_POST["sales"]."'";
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