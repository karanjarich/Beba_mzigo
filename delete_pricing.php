<?php
	session_start();
	include_once('connection_data.php'); 

	if(isset($_GET['car_type'])){
		$sql = "DELETE FROM pricing WHERE car_type = '".$_GET['car_type']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'customers deleted successfully';
			
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting customers';
		}
	}
	else{
		$_SESSION['error'] = 'Select customers to delete first';
	}
     
	header('location:car_pricing.php');
?>