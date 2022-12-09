<?php
  include_once('connection_data.php');
  $customer_no=$_POST['search'];
?>
<div class="container">
        <!-- DataTables Example -->
           <div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Sales #</th>
                        <th>Sales Date </th>
                        <th>Customer_no</th>
                        <th>Total_amount</th>
						<th>Paid_amount</th>
                        </thead>
                  <tbody>
                        <?php
                             $query = "SELECT * FROM sales WHERE customer_no =$customer_no and total_amount>paid_amount";
                                //use for MySQLi-OOP
                            $query = $conn->query( $query);
                            while($row = $query->fetch_assoc()){
                                //$catch=$row['no'];
                                echo
                                "<tr>
                                    <td id='sales_no'>".$row['sales_no']."</td>
                                    <td>".$row['sales_date']."</td>
                                    <td id='paid' contenteditable='true' onblur='myFunction(".$row['sales_no'].",this)'></td>
                                    <td>".$row['total_amount']."</td>
							 <td>".$row['paid_amount']."</td>
							 </tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
<script>
 function myFunction(x,y) {
	  //var currentRow=$(this).closest("tr"); 
      var qty=$(y).text();
	  var sold=x;
	  if(sold!= '')
                {
                     $.ajax({
                          url:"classes/edit_sales_details.php",
                          method:"POST",
                          data:{sold:sold,qty:qty},
                          dataType:"Text",
                          success:function(data)
                          {
                              ///call print receipt module
							   DisplayData();
							    alert(sold);
							 // window.location.reload(true);
                          }
                     });
                }
	}
 
/// begin of display
function DisplayData(){
        var sales = $("#sales").val();
        var total = $("#total_amount").val();
        $.ajax({
                          url:"classes/sales_save.php",
                          method:"POST",
                          data:{sales:sales,total:total},
                          dataType:"Text",
                          async:false,
                          success:function(data)
                          {
                            $('#sales_product').html(data);  // this works
                             testSum();
                               }
                     });
    }	
	//end of display function
	
   /// compute sales total
	    function testSum(){

                var sales = $('#sales').val();
                if(sales != '')
                {
                     $.ajax({
                          url:"classes/sum_sales.php",
                          method:"POST",
                          data:{sales:sales},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             document.getElementById('total_amount').value=data;
                          }
                     });
                }

           }	
</script>
