 <?php 
 session_start();
 include_once('../connection_data.php');
 if(isset($_POST["sales"]))  
   {  
                $data=$_SESSION["username"];
				$status="Waiting to be Delivered";
                $sales = $_POST['sales'];
				$sales_date =$_POST['sales_date'];
                $total = $_POST['total'];
				$paid = $_POST['paid'];
				$phone= $_POST['phone'];
				$balance =$paid - $total;
     	
       $sql = " UPDATE customers_orders SET customer_no='$phone',orderdate='$sales_date',orderby='$data',status='$status',total_amount='$total',pre_paid='$paid' WHERE customers_orderno='$sales'";  
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