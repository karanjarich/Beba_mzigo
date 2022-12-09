<?php
  include_once('connection_data.php');
  include'bus_cus_filter.php';
  $datefrom=$_POST['datefrom'];
  $dateto=$_POST['dateto'];
  $action=$_POST['action'];
    if($action=="readall"){
      ?>
        <div class="container">
        <!-- DataTables Example -->
            	

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                        <th>Sales Date</th>
                        <th>Sales Number</th>
						<th>Phone Number</th>
						<th>Total Sales</th>
                        <th>Cost of Sales</th>
						<th>Gross Margin</th>
                        <th>Paid Amount</th>
                        <th>Balance</th>
                        <th>Vat</th> 
                    </thead>
                <tbody>
                        <?php
							$sql = "SELECT sales.sales_no, sales.sales_date, sum(sales_details.quantity*sales_details.buying) as cost, sales.customer_no, sales.total_amount,sales.total_amount-sum(sales_details.quantity*sales_details.buying) as margin, sales.paid_amount,sales.total_amount-sales.paid_amount as balance ,if(vat='no',0,0.16*total_amount) as vat  FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and  sales.total_amount>0 and sales_date BETWEEN'$datefrom' AND '$dateto' group by sales_no";
                            
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo
                                "<tr>
								    <td>".$row['sales_date']."</td>
                                    <td>".$row['sales_no']."</td>
                                    <td>".$row['customer_no']."</td>
									<td>".$row['total_amount']."</td>
									<td>".$row['cost']."</td>
                                    <td>".$row['margin']."</td>
									<td>".$row['paid_amount']."</td>
                                    <td>".$row['balance']."</td>
									<td>".$row['vat']."</td>
									</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php }  
	elseif ($action=="customers"){
				 ?>
        <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Customer Name</th>
                        <th>Phone Number</th>
						<th>Total Sales</th>
                        <th>Paid Amount</th>
                        <th>Debt</th>
                 </thead>
                <tbody>
                        <?php
							$sql="SELECT 
							      sum(sales.total_amount) as total,sum(sales.paid_amount)as paid,sales.customer_no,customers.customer_name as customers
								  FROM sales
								  INNER JOIN customers 
								  ON customers.customer_no =sales.customer_no
								  WHERE sales_date BETWEEN '$datefrom' AND '$dateto'
								  GROUP by customer_no LIMIT 0, 25 ";
				 
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
								$balance=$row['total']-$row['paid'];
                                echo
                                "<tr>
								    <td>".$row['customer_no']."</td>
									<td>".$row['customer_no']."</td>
                                    <td>".$row['total']."</td>
									<td>".$row['paid']."</td>
                                    <td>".$balance."</td>
							</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php 
      }		   
elseif ($action=="products"){
				 ?>
        <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Product Name</th>
                        <th>Product Number</th>
						<th>Units Sold</th>
                        <th>Cost</th>
                        <th>Sold</th>
						<th>Margin</th>
                 </thead>
                <tbody>
                        <?php
							$sql="
							SELECT
								products.products_name as product,sales_details.product_no as number,sum(sales_details.price*sales_details.quantity) as sales,sum(sales_details.quantity*sales_details.buying)as cost,COUNT(sales_details.sales_no)as units,sales.sales_date as datee 
								FROM sales_details 
								INNER join products 
								INNER JOIN sales 
								ON products.product_no=sales_details.product_no 
								WHERE sales.sales_date BETWEEN '$datefrom' AND '$dateto'
								AND sales_details.sales_no=sales.sales_no 
								GROUP by sales_details.product_no
								LIMIT 0, 25 
							";
				        //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
								$margin=$row['sales']-$row['cost'];
                                echo
                                "<tr>
								    <td>".$row['product']."</td>
									<td>".$row['number']."</td>
									<td>".$row['units']."</td>
                                    <td>".$row['cost']."</td>
									<td>".$row['sales']."</td>
                                    <td>".$margin."</td>
							</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php 
      }		elseif ($action=="category"){
				 ?>
        <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Category Name</th>
                       	<th>Products Sold</th>
                        <th>Cost of Sales</th>
                        <th>Sales</th>
						<th>Margin</th>
                 </thead>
                <tbody>
                        <?php
							$sql="
							SELECT
							 products.product_categoryno as Category,
							 count(sales_details.product_no)as produ,
							 sum(sales_details.quantity*sales_details.price) as sales,
							 sum(sales_details.quantity*sales_details.buying) as cost 
							FROM sales_details
							INNER JOIN products 
							INNER JOIN sales
							ON products.product_no=sales_details.product_no
							WHERE sales.sales_date BETWEEN '$datefrom' AND '$dateto'
							GROUP BY products.product_categoryno 
							LIMIT 0, 25 
							";
				        //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
								$margin=$row['sales']-$row['cost'];
                                echo
                                "<tr>
								    <td>".$row['Category']."</td>
									<td>".$row['produ']."</td>
									<td>".$row['sales']."</td>
									<td>".$row['cost']."</td>
                                    <td>".$margin."</td>
							</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php 
      }
elseif ($action=="employee"){
	  $user=$_POST['user'];
  
				 ?>
        <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Sales Number</th>
                       	<th>Date</th>
                        <th>Phone</th>
                        <th>Tendered</th>
						<th>Paid</th>
						<th>Balance</th>
                 </thead>
                <tbody>
                        <?php
							$sql="
							SELECT * FROM `sales` 
                            WHERE employee='$user' and sales_date BETWEEN '$datefrom' AND '$dateto' 							
							LIMIT 0, 25 
							";
				        //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
								$margin=$row['total_amount']-$row['paid_amount'];
                                echo
                                "<tr>
								    <td>".$row['sales_no']."</td>
									<td>".$row['sales_date']."</td>
									<td>".$row['customer_no']."</td>
                                    <td>".$row['total_amount']."</td>
									<td>".$row['paid_amount']."</td>
                                    <td>".$margin."</td>
							</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
<?php 
      }
elseif ($action=="employee"){
	  $user=$_POST['user'];
  
				 ?>
        <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Sales Number</th>
                       	<th>Date</th>
                        <th>Phone</th>
                        <th>Tendered</th>
						<th>Paid</th>
						<th>Balance</th>
                 </thead>
                <tbody>
                        <?php
							$sql="
							SELECT sum FROM `sales` 
                            WHERE vat=yes and sales_date BETWEEN '$datefrom' AND '$dateto' 							
							LIMIT 0, 25 
							";
				        //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
								$margin=$row['total_amount']-$row['paid_amount'];
                                echo
                                "<tr>
								    <td>".$row['sales_no']."</td>
									<td>".$row['sales_date']."</td>
									<td>".$row['customer_no']."</td>
                                    <td>".$row['total_amount']."</td>
									<td>".$row['paid_amount']."</td>
                                    <td>".$margin."</td>
							</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php 
       }
elseif ($action=="summary"){
					 ?>
<div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                        
						<th>Sales Totals</th>
                        <th>Cost of Goods</th>
                        <th>Expenditure</th>
                        <th>Margin</th>
						
                    </thead>
                <tbody>
                        <?php
							$datefrom=$_POST['datefrom'];
							$dateto=$_POST['dateto'];
                            
							 $sql =  "SELECT  sum(sales_details.quantity*sales_details.buying) as cost,sum(sales.total_amount) as totals FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and  sales.total_amount>0 and sales_date BETWEEN'$datefrom' AND '$dateto' ";
                             $data;
                             $sql1 = "SELECT sum(amount) as summate FROM payments Where datee BETWEEN
                                      '$datefrom' AND '$dateto' 
							        ";
                             $query = $conn->query($sql1);
                              while($row = $query->fetch_assoc()){
                                $data=$row['summate'];
                                  
								}
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $profit=$row['totals']-$data;
									 echo 
								"<tr>
                                    <td>".$row['totals']."</td>
                                    <td>".$row['cost']."</td>
									<td>".$data."</td>
                                    <td>".$profit."</td>
									
								</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>

 <?php 
      }		  
?>
  
  
  
  