<?php
	session_start();
	include_once('connection_data.php');
    if(isset($_POST['edit'])){
		$payid=$_POST['payid'];
        $amt = $_POST['amt'];
        $mode = $_POST['mode'];
        $lt_amt= $_POST['lt_amt'];
		$amount = $amt+$lt_amt;
		
		$sql = "UPDATE payments SET amount= '$amount',mode= '$mode',datee= '$datee' WHERE payid= '$payid'";
             	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'payments updated successfully';
			}
			
		else{
			$_SESSION['error'] = 'Something went wrong in updating payments';
		}
	}
	else{
		$_SESSION['error'] = 'Select payments to edit first';
	}
    header('location:payments.php');
  ?>