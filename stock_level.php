     <?php include'admin_nav.php';?>
    
    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
        <div class="card mb-3">
           <div class="card-header">
		   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Stock Level</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <button type="button" id="ok" class="btn btn-success" data-dismiss="modal"><span class="fas fa-print"></span>Print</button>
               	
				</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
						<th>Product#</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Ordered</th>
						<th>Reorder</th>
						<th>Surplus</th>
					</thead>
                <tbody>
						<?php
							include_once('connection_data.php');
							$sql = "SELECT `products_name`, `product_no`,`reorder_level`,`units_ordered`, `units_in_stock`, `units_in_stock`-`reorder_level` as surplus FROM `products` ";
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['product_no']."</td>
									<td>".$row['products_name']."</td>
									<td>".$row['units_in_stock']."</td>
									<td>".$row['units_ordered']."</td>
									<td>".$row['reorder_level']."</td>
								    <td>".$row['surplus']."</td> 
								</tr>";
							}
							
						?>
					 </tbody>
              </table>
            </div>
          </div>
          </div>       
</div>
<div class="row form-group">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control fc" name="head1" id="head1" value="GulfMAX Nuetral Care Ltd" required>
						<input type="hidden" class="form-control fc" name="head2" id="head2" value="Cash Sales" required>
						<input type="hidden" class="form-control fc" name="head3" id="head3" value="Po Box 1123421" required>
						<input type="hidden" class="form-control fc" name="head4" id="head4" value="072432432432" required>
                    </div>
                </div>
 </div>
 
     <?php include "main_footer.php";?>
	  <script>
	$(document).ready(function(){
            function print_receipt()
		{
			var head1=document.getElementById('head1').value;
			var head2=document.getElementById('head2').value;
			var head3=document.getElementById('head3').value;
			var head4=document.getElementById('head4').value;
			var divToPrint = document.getElementById('dataTable');
			var htmlToPrint = '' +
				'<style type="text/css">' +
				'table,th,td {' +
				'border-collapse: collapse;'+
				'border:1px solid #000;' +
				'padding:0.5em;' +
				'color:#000;' +
				'}' 
				+
				'</style>';
			htmlToPrint += "<b>"+head1+"</br>"+"</br>"+head2+"</br>"+"</br>"+head3+"</br>"+"</br>"+head4+"</br>"+"</br>"+divToPrint.outerHTML;
			newWin = window.open("");
			newWin.document.write(htmlToPrint);
			newWin.print();
			newWin.close();
			setTimeout(function(){newWin.close();},1000);
		}
        $('#ok').click(function(){
		      print_receipt();
		});
	   });
 </script>