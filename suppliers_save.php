<?php
	session_start();
	include_once('connection_data.php');
   
	if(isset($_POST['add'])){  
		$suppliers_name = $_POST['suppliers_name'];
		$suppliers_phone = $_POST['suppliers_phone'];
		$suppliers_no =str_replace(' ','', $_POST['suppliers_phone']);
		$suppliers_location = $_POST['suppliers_location'];
		$suppliers_email = $_POST['suppliers_email'];
		$sql = "INSERT INTO suppliers(suppliers_name,suppliers_no,suppliers_phone,suppliers_location, suppliers_email) VALUES ('$suppliers_name','$suppliers_no','$suppliers_phone','$suppliers_location','$suppliers_email')";
      
		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'suppliers added successfully';
			 
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn',' $sql)){
		// 	$_SESSION['success'] = 'customers added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
   header('location:suppliers.php');
?>