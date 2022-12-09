<?php
 $debit="";
	   $credit="";
	   $datee= date("l F jS Y");
	   $search = $_POST['search'];
	   // select only when the customer changes the 
	   $sql_accounts=" SELECT `accounts_name`, `accounts_code`, `accounts_type` FROM `accounts_operations where operations = $search`";
	   
	 /*  $query = $conn->query($sql);
			//while($row = $query->fetch_assoc()){
			///	$debit=$row['debit'];
			 ///   $credit=$row['credit'];
			//}
	////Cash Account	Debit
    ////Sales Account	Credit
	//Debtor’s Account	Debit
    //Sales Account	Credit
	Journal Entry for Credit Purchase
Purchase Account	Debit
 To Creditor’s Account	Credit
 
 
 
 /*Journal Entry for Cash Purchase
Purchase Account	Debit
 To Cash Account	Credit*/
 
?>