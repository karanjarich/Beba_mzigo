 <?php 
 session_start();
 include_once('../connection_data.php');
 if(isset($_POST["sales"]))  
   {  
      
                $sales = $_POST['sales'];
				$sales_date =$_POST['sales_date'];
                $total = $_POST['total'];
				$paid = $_POST['paid'];
				$phone= $_POST['phone'];
				$vat= $_POST['vat'];
				$balance =$paid - $total;
				$customer=$_POST['customer'];
				$user=$_SESSION["username"];
     	
       $sql = " UPDATE sales SET sales_date='$sales_date',customer_no='$phone',total_amount='$total',paid_amount='$paid',vat='$vat',employee='$user',customer_no='$customer' WHERE sales_no='$sales'";  
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