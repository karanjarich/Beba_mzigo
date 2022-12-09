<?php
	session_start();
	include_once('connection_data.php');
   
	if(isset($_POST['add'])||isset($_POST['car_type'])||isset($_POST['within_nairobi'])||isset($_POST['outside_nairobi'])||isset($_POST['loading_per_person']))
	     {  
          
			$car_type = $_POST['car_type'];
            $within_nairobi=str_replace(' ','-', $within_nairobi);
 	        $within_nairobi = $_POST['within_nairobi'];
			$outside_nairobi = $_POST['outside_nairobi'];
			$loading_per_person= $_POST['loading_per_person'];
			
			$sql = "INSERT INTO pricing(car_type,within_nairobi,outside_nairobi,loading_per_person) VALUES ('$car_type','$within_nairobi','$outside_nairobi','$loading_per_person')";
	        
		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'pricing added successfully';
			 
		}
				
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
		
	}
	else{
		    $_SESSION['error'] = 'Fill up add form first';
	}
 header('location:car_pricing.php');
?>