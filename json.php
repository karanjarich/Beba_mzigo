<?php
session_start();
include_once('connection_data.php');
$json='[{"customer_name":"Jill","customer_no":"1","Quantity":"50"},{"customer_name":"John","customer_no":"78899","Quantity":"80"}]';
$val=json_decode($json, true);
 foreach($val as $row)
 {
 $stock=$row['stock'];
 $sql="UPDATE products SET `units_in_stock`='$stock' WHERE `product_no`={$row['product_no']}";
       if($conn->query($sql)){
			echo'update well';
		}
		else{
			echo'Something went wrong while adding';
    }
 }
?>