<?php
	session_start();
	include_once('connection_data.php');
    if(isset($_POST['edit'])){
		$sales_no=$_POST['sales_no'];
        $total = $_POST['total'];//paid_amount
        	
		$sql = "UPDATE sales SET paid_amount= '$total' WHERE sales_no= '$sales_no'";
             	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'sales updated successfully';
			}
			
		else{
			$_SESSION['error'] = 'Something went wrong in updating sales';
		}
	}
	else{
		$_SESSION['error'] = 'Select sales to edit first';
	}
   //header('location:receipts.php');
  ?>