<?php
  include_once('../connection_data.php');
  
          //Fetching Values from URL
          $ref_no= $_POST['ref_no'];
          $debit= $_POST['debit'];
          $credit= $_POST['credit'];
          $account_no= $_POST['account_no'];
          $transact_date= $_POST['transact_date'];
          $description= $_POST['description'];
          $account_category= $_POST['account_category'];

        //insert into sales products
       $sql="INSERT INTO transactions
              (ref_no,debit,credit,account_no,transact_date,description,account_category) 
            VALUES
            ('$ref_no','$debit','$credit','$account_no','$transact_date','$description','$account_category')";
        
       if($conn->query($sql)){
			// header('location:../products.php');
		}
				
		else{
			//header('location:../customers.php');
		}
    //  mysqli_close($conn);
    ?>
   