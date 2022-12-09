<?php 
    /// this file is meant to filter customers and business
     $customer="select * from customers";
      $business="select * from business";
     //use for MySQLi-OOP
	  $query = $conn->query($customer);
       $bsSQL= $conn->query($business);// query to filter company details
        while($row = $bsSQL->fetch_assoc()){
           $businessname=$row['businessname'];
           $businessRegistration=$row['businessRegistration'];
           //$pin=$row['pin'];
           //$location=$row['location'];
           $contact=$row['contact'];
           $email=$row['email'];
           //$website=$row['website'];
        }?>