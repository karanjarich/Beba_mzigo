<?php
	session_start();
	include_once('connection_data.php');
    if(isset($_POST['edit'])){
		$car_type=$_POST['car_type'];
		$within_nairobi= $_POST['within_nairobi'];
		$outside_nairobi= $_POST['outside_nairobi'];
		$loading_per_person=$_POST['loading_per_person'];
        
		$sql ="UPDATE `pricing` SET `within_nairobi`='$within_nairobi',`outside_nairobi`='$outside_nairobi',`loading_per_person`='$loading_per_person' WHERE `car_type`='$car_type'";
             	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'pricing updated successfully';
			}
			
		else{
			$_SESSION['error'] = 'Something went wrong in updating pricing';
            
		}
	}
	else{
		$_SESSION['error'] = 'Select pricing to edit first';
	}
  header('location:car_pricing.php');
?>