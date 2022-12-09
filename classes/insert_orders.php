  <?php 
       include'connection_data.php';
       $datee=date('Y-m-d');
       $sql_sales = "INSERT INTO orders(`sales_date`) VALUES ('$datee')";
     //use for MySQLi OOP
       if($conn->query($sql_sales)){
             $last_id = $conn->insert_id;
            $_SESSION['success'] = 'sales_no added successfully';
        }
        else {
            $_SESSION['error'] = 'Something went wrong while adding';
        }
    ?>