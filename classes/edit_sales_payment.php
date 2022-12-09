 <?php 
 session_start();
 include_once('../connection_data.php');
 if(isset($_POST["sales"]))  
   {  
      
                $sales =$_POST['sales'];
				$sales_date =$_POST['sales_date'];
                $paid = $_POST['paid'];
				$balance =$paid - $total;
     	
       $sql = " UPDATE sales SET sales_date='$sales_date',paid_amount='$paid' WHERE sales_no='$sales'";  
           	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'cart upddated  successfully';
		}
			
		else{
			$_SESSION['error'] = 'Something went wrong in updating user';
		}
	}
	else{
		$_SESSION['error'] = 'Select user to edit first';
	}
   ?>