<?php
  include_once('connection_data.php');
  include'bus_cus_filter.php';
  
  $action=$_POST['action'];
      if($action=="readall"){
      ?>
        <div class="container">
        <!-- DataTables Example -->
            	

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Sales </th>
                        <th>Acquisition Cost</th>
						<th>Gross Margin</th>
						<th>Expenses</th>
                        <th>Net Margin</th>
				 </thead>
                <tbody>
                        <?php
          
                                $expenses=null;
								$sql = "SELECT sales_date,sum(sales_details.quantity*sales_details.buying) as cost, sum(sales_details.quantity*sales_details.price) as sales,sum(sales.total_amount)-sum(sales_details.quantity*sales_details.buying) as margin FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and sales.total_amount>0 and MONTH(sales_date) = MONTH(CURRENT_DATE()) AND YEAR(sales_date) = YEAR(CURRENT_DATE());";
                                
                                $sql1 = "SELECT sum(amount) as expenses FROM payments where MONTH(datee) = MONTH(CURRENT_DATE()) AND YEAR(datee) = YEAR(CURRENT_DATE()) ";
                                $query1 = $conn->query($sql1);
                                 while($row = $query1->fetch_assoc()){
                                  $expenses=$row['expenses'];}
                            
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $net=$row['margin']-$expenses;
                                
                                echo
                                "<tr>
                                    <td>".$row['sales']."</td>
                                    <td>".$row['cost']."</td>
                                    <td>".$row['margin']."</td>
									<td>".$expenses."</td>
									<td>".$net."</td>
                            	</tr>";
                            ?>
                     </tbody>
                     <?php 
                            }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php }  
	elseif ($action=="daily"){
				 ?>
       <div class="container">
        <!-- DataTables Example -->
            	

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Date </th>
                        <th>Sales </th>
                        <th>Acquisition Cost</th>
						<th>Gross Margin</th>
						<th>Expenses</th>
                        <th>Net Margin</th>
				 </thead>
                <tbody>
                        <?php   // dailly SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY year(datee) 
                                // yearly grouping SELECT sum(amount) as expenses FROM payments Group BY datee,year(datee) 
                                //SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY month(datee),year(datee) 
                                // yearly exepenses SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY year(datee)
                                /*TODAY SALES
                                    SELECT sales_date,sum(sales_details.quantity*sales_details.buying) as cost, sum(sales.total_amount) as sales,sum(sales.total_amount)-sum(sales_details.quantity*sales_details.buying) as margin FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and sales.total_amount>0 and MONTH(sales_date) = MONTH(CURRENT_DATE()) AND YEAR(sales_date) = YEAR(CURRENT_DATE())*/
                                $expenses=null;
								$sql = "SELECT sales_date,sum(sales_details.quantity*sales_details.buying) as cost, sum(sales_details.quantity*sales_details.price) as sales,sum(sales.total_amount)-sum(sales_details.quantity*sales_details.buying) as margin FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and sales.total_amount>0 and MONTH(sales_date) = MONTH(CURRENT_DATE()) AND YEAR(sales_date) = YEAR(CURRENT_DATE())";
                                
                                $sql1 = "SELECT sum(amount) as expenses FROM payments where datee = CURRENT_DATE() ";
                                $query1 = $conn->query($sql1);
                                 while($row = $query1->fetch_assoc()){
                                  $expenses=$row['expenses'];}
                            
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $net=$row['margin']-$expenses;
                                
                                echo
                                "<tr>
                                    <td>".$row['sales_date']."</td>
                                    <td>".$row['sales']."</td>
                                    <td>".$row['cost']."</td>
                                    <td>".$row['margin']."</td>
									<td>".$expenses."</td>
									<td>".$net."</td>
                            	</tr>";
                            ?>
                     </tbody>
                     <?php 
                            }  
					   
										
				?>
               </table>
            </div>

</div>
 <?php 
      }		   
elseif ($action=="yearly"){
				 ?>
        <div class="container">
        <!-- DataTables Example -->
            	

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Date </th>
                        <th>Sales </th>
                        <th>Acquisition Cost</th>
						<th>Gross Margin</th>
						<th>Expenses</th>
                        <th>Net Margin</th>
				 </thead>
                <tbody>
                        <?php   // dailly SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY year(datee) 
                                // yearly grouping SELECT sum(amount) as expenses FROM payments Group BY datee,year(datee) 
                                //SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY month(datee),year(datee) 
                                // yearly exepenses SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY year(datee)
                                /*TODAY SALES
                                    SELECT sales_date,sum(sales_details.quantity*sales_details.buying) as cost, sum(sales.total_amount) as sales,sum(sales.total_amount)-sum(sales_details.quantity*sales_details.buying) as margin FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and sales.total_amount>0 and MONTH(sales_date) = MONTH(CURRENT_DATE()) AND YEAR(sales_date) = YEAR(CURRENT_DATE())*/
                                $expenses=null;
								$sql = "SELECT sum(sales.total_amount) as sales, sales_date,sum(sales_details.quantity*sales_details.buying) as cost, sum(sales.total_amount)-sum(sales_details.quantity*sales_details.buying) as margin FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and sales.total_amount>0 GROUP by YEAR(CURRENT_DATE()) ";
                                
                                $sql1 = "yearly exepenses SELECT month(datee) month,sum(amount) as expenses FROM payments Group BY year(datee)";
                                $query1 = $conn->query($sql1);
                                 while($row = $query1->fetch_assoc()){
                                  $expenses=$row['expenses'];}
                            
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $net=$row['margin']-$expenses;
                                
                                echo
                                "<tr>
                                    <td>".$row['sales_date']."</td>
                                    <td>".$row['sales']."</td>
                                    <td>".$row['cost']."</td>
                                    <td>".$row['margin']."</td>
									<td>".$expenses."</td>
									<td>".$net."</td>
                            	</tr>";
                            ?>
                     </tbody>
                     <?php 
                            }  
					   
										
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
elseif ($action=="daily"){
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
  
  
  
  