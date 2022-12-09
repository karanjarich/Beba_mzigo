 <?php 
 //session_start();
   include_once('../connection_data.php');
		$sold = $_POST['sold'];
		$qty =$_POST['qty'];
        $sql = " UPDATE sales_details SET quantity='$qty' WHERE sales_detailsno='$sold'";  
           	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'cart upddated  successfully';
			
		}
		else{
			$_SESSION['error'] = 'Something went wrong in updating user';
		}
   ?>