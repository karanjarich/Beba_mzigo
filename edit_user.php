<?php
	session_start();
	include_once('connection_data.php');

	if(isset($_POST['edit'])){
		$userid = $_POST['userid'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$status=$_POST['status'];
		$sql = "UPDATE user SET username= '$username',password= '$password',status= '$status' WHERE userid= '$userid'";
             	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'user updated successfully';
		}
			
		else{
			$_SESSION['error'] = 'Something went wrong in updating user';
		}
	}
	else{
		$_SESSION['error'] = 'Select user to edit first';
	}
   header('location:user.php');

?>