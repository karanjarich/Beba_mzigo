<?php
	session_start();
	include_once('connection_data.php');
   	if(isset($_POST['add'])){  
		$pin = $_POST['pin'];
		$businessname = $_POST['businessname'];
		$businessRegistration = $_POST['businessRegistration'];
		$location = $_POST['location'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$sql = "INSERT INTO business(businessname,businessRegistration,location,contact,email,pin,website) VALUES ('$businessname','$businessRegistration','$location','$contact','$email','$pin','$website')";
      
		//use for MySQLi OOP
		if($conn->query($sql)){
			 header('location:business.php');
				}
			
		else{
			echo "oops something went wrong";
		}
	}
	
      
?>