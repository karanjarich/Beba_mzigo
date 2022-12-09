    <?php include'admin_nav.php';?>

    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              	<div class="col-md-4">Date From<input type="date" class="form-control " id="datefrom" name="datefrom"  required/></div>
				<div class="col-md-4"><label>Date To</label><input type="date" class="form-control data-input" id="dateto" name="dateto"  required/></div>
			    <div class="col-md-4">
                         <button type="button" id="printpdf" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Print Pdf</button>
               		</div>
			 </div>
			 </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
						<th>Customer#</th>
						<th>OrderNumber</th>
						<th>Date</th>
						<th>Status</th>
						<th>Order Amount</th>
						<th>Pre Payment</th>
						<th>Action</th>
					</thead>
                <tbody>
                     		<?php
							include_once('connection_data.php');
							$sql = "SELECT * FROM customers_orders";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
								    <td>".$row['customer_no']."</td>
									<td>".$row['customers_orderno']."</td>
									<td>".$row['orderdate']."</td>
									<td>".$row['status']."</td>
									<td>".$row['total_amount']."</td>
									<td>".$row['pre_paid']."</td>
									<td>
										<a href='#edit_".$row['customers_orderno']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['customers_orderno']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
							
						?>
                </tbody>
              </table>
            </div>
			
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        
</div>
<?php include('add_modal.php') ?>
</div>
<?php include "main_footer.php";?>
