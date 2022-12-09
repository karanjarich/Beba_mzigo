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
                        <th>Total Sales</th>
                        <th>Cost of Sales</th>
						<th>Gross Margin</th>
                        <th>Paid Amount</th>
                        <th>Expenses</th>
                        <th>Net Margin</th> 
                    </thead>
                <tbody>
                        <?php
          
                           
                            $expenses=null;
                            //use for MySQLi-OOP
                            
                                   
							$sql = "SELECT  sales.sales_date, sum(sales_details.quantity*sales_details.buying) as cost, sales.total_amount,sales.total_amount-sum(sales_details.quantity*sales_details.buying) as margin, sales.paid_amount,sales.total_amount-sales.paid_amount as balance ,if(vat='no',0,0.16*total_amount) as vat  FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and  sales.total_amount>0 and sales_date BETWEEN'$datefrom' AND '$dateto' group by sales.sales_date";
                           
                            
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                 $expenses=0;
                                 $diff=(int)$row['margin'];
                                 echo
                                
                                "<tr>
								    <td>".$row['sales_date']."</td>
                                    <td>".$row['total_amount']."</td>
									<td>".$row['cost']."</td>
                                    <td>".$row['margin']."</td>
									<td>".$row['paid_amount']."</td> ";
                                    $datee=$row['sales_date'];
                                // $sql1 = "SELECT sum(`amount`) amount, `datee` FROM `payments` where datee='$datee' "; works well produces results
                                // null results  $sql1 = "SELECT sum(`amount`) amount, `datee` FROM `payments` where datee=$datee";
                                // if $datee is empty check for another date 
                               
                                $sql1 = "SELECT sum(`amount`) amount, `datee` FROM `payments` group by datee";
                                $query1 = $conn->query($sql1);
                         
                                    while($row = $query1->fetch_assoc()){
                                                  $expenses=$row['amount'];
                                             }
                                     $val=$diff-$expenses;
                                      echo "<td>".$expenses."</td>
                                         <td>".$val."</td>
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
    // queries for summaries
        $net=null    ;
        $total_sales =null;
        $expenses =null;
        $goods_cost=null;
        $gross=null;
    
        // Query to filter all 
         $sql_sales ="SELECT sum(sales_details.quantity*sales_details.buying) as cost_of_good,sum(sales.total_amount) as sales FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and  sales.total_amount>0 and sales_date BETWEEN'$datefrom' AND '$dateto' ";
            //use for MySQLi-OOP
              $query_sales = $conn->query($sql_sales);

        $sql_pay = "select * from payments where datee between '$datefrom' AND '$dateto' ";
        $sql_pay= $conn->query($sql_pay); 

          $costing = "select sum(amount) as cost from payments where datee between'$datefrom' AND '$dateto' ";
          $costing = $conn->query($costing);
           while($row = $costing->fetch_assoc()){
                $expenses=$row['cost'];
            }
       $net=$gross-$expenses;
//end of queries
					 ?>
<div class="container">
        <!-- DataTables Example -->
          
            
        <form style="padding:0.5%" id="dataTable">
        <div class="form-group row">
                    <div class="col-sm-11">
                        <label class="control-form-label "><i><b>Income Statement</b></i></label>
                    </div>   
        </div> 
        <div class="form-group row">
                    <div class="col-sm-1 ">
                        <label class="control-form-label ">From</label>
                    </div>
                    <div class="col-sm-2">
                         <input type="text" class="form-control" id="paid_amount" name="paid_amount" disabled value="<?php echo $datefrom?>">
                    </div>
                    <div class="col-sm-1 ">
                        <label class="control-form-label ">To</label>
                    </div>
                    <div class="col-sm-2">
                         <input type="text" class="form-control" id="paid_amount" disabled name="paid_amount" value="<?php echo $dateto?>">
                    </div>
                </div>
        <div class="form-group row">
                    <div class="col-sm-11">
                        <label class="control-form-label "><i><b>Income Generated</b></i></label>
                    </div>   
        </div>
       <?php while($row = $query_sales->fetch_assoc()){
                              $total_sales=$row['sales'];
                              $goods_cost=$row['cost_of_good'];
                              $gross=$total_sales-$goods_cost;
                                        echo"
                    <div class=\"form-group row\">
                    <div class=\"col-sm-5 .offset-md-1\">
                        <label class=\"control-form-label \">Total Sales:</label>
                    </div>
                    <div class=\"col-sm-6\">
                         <input type=\"text\" class=\"form-control\" disabled id=\"paid_amount\" name=\"paid_amount\" value=".$row['sales'].">
                    </div>
                </div>
                <div class=\"form-group row\">
                    <div class=\"col-sm-5 .offset-md-1\">
                        <label class=\"control-form-label \">Cost of Goods Sold:</label>
                    </div>
                    <div class=\"col-sm-6\">
                         <input type=\"text\" class=\"form-control\" id=\"paid_amount\" name=\"paid_amount\" value=".$row['cost_of_good'].">
                    </div>
                </div>
                <div class=\"form-group row\">
                    <div class=\"col-sm-5 .offset-md-1\">
                        <label class=\"control-form-label \">Gross Profit / Loss :</label>
                    </div>
                    <div class=\"col-sm-6\">
                         <input type=\"text\" class=\"form-control\" disabled id=\"paid_amount\" name=\"paid_amount\" value=".$gross.">
                    </div>
                </div>
				";
            }?>
          <div class="form-group row">
                    <div class="col-sm-11">
                        <label class="control-form-label "><i><b>Expenses Incured</b></i></label>
                    </div>   
        </div>
            
         <?php 
       
         while($row = $sql_pay->fetch_assoc()){
                         $expenses=$row['amount'];
             echo"
                    <div class=\"form-group row\">
                    <div class=\"col-sm-5 \">
                        <label class=\"control-form-label \">".$row['paid'].":</label>
                    </div>
                    <div class=\"col-sm-6\">
                         <input type=\"text\" class=\"form-control\" disabled id=\"paid_amount\" name=\"paid_amount\" value=".$row['amount'].">
                    </div>
                </div>
                
				";
            }?>	
      <div class="form-group row">
                    
                        <label class="control-form-label col-sm-5">Total Expenses</label>
                   
                    <div class="col-sm-6">
                         <input type="text" class="form-control" disabled id="paid_amount" name="paid_amount" value="<?php echo $expenses?>">
                    </div>
                </div>   
     <div class="form-group row">
                    
                        <label class="control-form-label col-sm-5">Margin</label>
                   
                    <div class="col-sm-6">
                         <input type="text" class="form-control" disabled id="paid_amount" name="paid_amount" value="<?php echo $net;?>">
                    </div>
                </div>
    
</form>            

</div>

 <?php 
      }		  
?>
  
  
  
  