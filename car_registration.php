<?php
	session_start();
	include_once('connection_data.php');

	if(isset($_POST['add'])){  
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['phone'];
		$password= $_POST['password'];
        $owner = $_POST['firstname']."  ". $_POST['lastname'];
		$vehicleid = $_POST['regno'];
		$model = $_POST['model'];
		$cabin= $_POST['cabin'];
        $location= $_POST['location'];
		$sql = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `password`, `status`) VALUES ('$firstname','$lastname','$username','$password','active')";
      
        $cars = "INSERT INTO `vehicle`(`vehicleid`, `owner`, `model`, `cabin`, `location`) VALUES('$vehicleid','$owner','$model','$cabin', '$location')";
		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'user added successfully';
			 
		}
        if($conn->query($cars)){
			$_SESSION['success'] = 'user added successfully';
			 
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
    header('location:index.php');
?>

