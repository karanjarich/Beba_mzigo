<?php
  include_once('connection_data.php');
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
