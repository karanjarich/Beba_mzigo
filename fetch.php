<?php

//fetch.php

include('database_connection.php');

$column = array('customer_name', 'customer_no', 'customer_phone', 'customer_location', 'customer_address');

$query = "SELECT * FROM customers ";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE customer_name LIKE "%'.$_POST['search']['value'].'%" 
 OR customer_no LIKE "%'.$_POST['search']['value'].'%" 
 OR customer_phone LIKE "%'.$_POST['search']['value'].'%" 
 OR customer_location LIKE "%'.$_POST['search']['value'].'%" 
 OR customer_location LIKE "%'.$_POST['search']['value'].'%" 
  ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY customer_phone DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['customer_name'];
 $sub_array[] = $row['customer_phone'];
 $sub_array[] = $row['customer_no'];
 $sub_array[] = $row['customer_location'];
 $sub_array[] = $row['customer_address'];
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM customers";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>
