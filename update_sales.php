<?php
	session_start();
	include_once('connection_data.php');
	
	if(isset($_POST['add'])){ 
	    $sales_no = $_POST['sales_no'];
		$customer_no = $_POST['customer_no'];
		$total_amount = $_POST['total_amount'];
	 	$sql = "UPDATE `sales` SET `customer_no`='$customer_no',`total_amount`='$total_amount',`paid_amount`='$total_amount' WHERE `sales_no`=$sales_no";
      //  $upadte_accounts=
		if($conn->query($sql)){
			$_SESSION['success'] = 'sale added successfully';
			
			}
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		    }
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
      ('location:sales.php');
?>