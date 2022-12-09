<?php
	session_start();
	include_once('connection_data.php');
     $sql =null;     
	if(isset($_POST['add'])){ 
        $phone_no = $_POST['phone_no'];
		$location= $_POST['location'];
		$destination  = $_POST['destination'];
		
		$paid= $_POST['paid'];
		$bill_no= $_POST['bill_no'];
		$balance=$_POST['balance'];
		
			$status="Requests";
			$sql = "INSERT INTO `client_requests`(`phone_no`, `location`, `destination`, `status`)  VALUES ('$phone_no','$location','$destination','$status')";		
		
       //use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'products added successfully';
			 
		}
				
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	

  header('location:bookings.php');}
?>
