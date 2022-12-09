<?php  
     include"connection_data.php";
      //Fetching Values from URL
	  $sales = $("#sales"); 
	  $paid = $("#paid'");
	  $amount = $("#amount");
	  $customer_no = $("#customer_no");
      //insert into sales products
      $query = mysqli_query($conn,"UPDATE sales SET customer_no='$customer_no',total_amount='$amount',paid_amount='$paid' WHERE where sales_no='$sales'");	
      
?>