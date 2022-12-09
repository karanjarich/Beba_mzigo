    <?php include'admin_nav.php';?>

    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="fas fa-plus"></span> New</a>
				<a href="print_pdf.php" class="btn btn-success" style="margin-left:60px"><span class="fas fa--print"></span> PDF</a>
				  Suppliers
			 </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
						<th>Supplier#</th>
						<th>Suppliername</th>
						<th>Phone</th>
						<th>Address</th>
						<th>Email</th>
						<th>Action</th>
					</thead>
                <tbody>
                     		<?php
							include_once('connection_data.php');
							$sql = "SELECT * FROM suppliers";
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
								    <td>".$row['suppliers_no']."</td>
									<td>".$row['suppliers_name']."</td>
									<td>".$row['suppliers_phone']."</td>
									<td>".$row['suppliers_location']."</td>
								    <td>".$row['suppliers_email']."</td>
									<td>
										<a href='#edit_".$row['suppliers_no']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['suppliers_no']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('suppliers_modal.php');
							}
							
						?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        
</div>
<?php include('add_suppliers.php') ?>
      </div>
     <?php include "main_footer.php";?>
	