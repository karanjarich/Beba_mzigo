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
              <div class="row form-group">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control fc" name="head1" id="head1" value="<?php echo $businessname; ?>">
						<input type="hidden" class="form-control fc" name="head2" id="head2" value="Cash Sales" required>
						<input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $contact; ?>" required>
						<input type="hidden" class="form-control fc" name="head4" id="head4" value="<?php echo $email; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $website; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $pin; ?>" required>
				      </div>
                </div>		

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
							$sql = "SELECT sales.sales_no, sales.sales_date, sum(sales_details.quantity*sales_details.buying) as cost, sales.customer_no, sales.total_amount,sales.total_amount-sum(sales_details.quantity*sales_details.buying) as margin, sales.paid_amount,sales.total_amount-sales.paid_amount as balance ,if(vat='no',0,0.16*total_amount) as vat  FROM sales inner join sales_details WHERE sales.sales_no =sales_details.sales_no and  sales.total_amount>0 and sales_date and vat=yes BETWEEN'$datefrom' AND '$dateto' group by sales_no";
                            
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
	?>
               </table>
            </div>

</div>
 

	  
?>
 <script>

	/// print receipt
	function print_receipt()
		{
			var client=document.getElementById('c_phone').value;
			var head1=document.getElementById('head1').value;
			var head2=document.getElementById('head2').value;
			var head3=document.getElementById('head3').value;
			var head4=document.getElementById('head4').value;
			var newWin=window.open('','Print-Window','width=400,height=400,top=500,left=500');
			newWin.document.open();
			newWin.document.write('<html><head><style>body{color:green;line-height:1.5;font-family:"Calibri";margin:10px;} #head1{text-align:center;}table,th,td{border:1px solid blue;text-align:center;}table{width:50%}</style></head><body   onload="window.print()">'+head1+"<br/>"+head2+"<br />"+ head3+"<br />"+ head4+"<br />"+clientinfo+"<br />"+divToPrint.innerHTML+"<br />"</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+"Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+sum+"</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+"Paid:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+paid+"</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+"Change:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+change+'</body></html>');
			newWin.document.close();
			setTimeout(function(){newWin.close();},1000);
		}
	///end of print receipt
	

           	   });

//script to create receipt
//script to update sales
//script to update accounts......... ensure the folio  // is saved to the database

//script to edit sales...........

   
        

 </script>
   