      <?php
          
                                $expenses=null;
								$sql = "SELECT sum(sales_details.quantity*sales_details.buying) as cost, sum(sales.total_amount) as sales,sum(sales.total_amount)-sum(sales_details.quantity*sales_details.buying) as margin FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and sales.total_amount>0  GROUP BY EXTRACT(YEAR_MONTH FROM sales_date)";
                                
                                $sql1 = "SELECT sum(amount) expenses FROM payments GROUP BY EXTRACT(YEAR_MONTH FROM datee)";
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