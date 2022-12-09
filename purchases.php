     <?php 
	
	 include'admin_nav.php';?>

    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="fas fa-plus"></span> New</a>
			    </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
						<th>Product#</th>
						<th>Name</th>
						<th>Quantity</th>
						<th>Category</th>
						<th>Ordered</th>
						<th>Reorder</th>
						<th>Action</th>
					</thead>
                <tbody>
						<?php
							include_once('connection_data.php');
							$sql = "SELECT * FROM products";
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['product_no']."</td>
									<td>".$row['products_name']."</td>
									<td>".$row['units_in_stock']."</td>
									<td>".$row['product_categoryno']."</td>
									<td>".$row['units_ordered']."</td>
									<td>".$row['reorder_level']."</td>
								     <td>
									 <a href='#stock_".$row['product_no']."' class='btn btn-warning btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-plus'></span>Stock</a>
									 <a href='#edit_".$row['product_no']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
									 <a href='#delete_".$row['product_no']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('product_modal.php');
								include('add_stock.php');
							}
							
						?>
					 </tbody>
              </table>
            </div>
          </div>
          </div>       
</div>
<?php include('add_products.php') ?>
</div>
 <?php include "main_footer.php";?>
	