<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['product_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-green">
			    <center><h4 class="modal-title" id="myModalLabel">Order Stock</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_stock.php">
			<fieldset disabled>
				<input type="hidden" class="form-control" name="product_no" value="<?php echo $row['product_no']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Productname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="products_name" value="<?php echo $row['products_name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Reorder Level:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="minimum" value="<?php echo $row['minimum']; ?>">
					</div>
				</div>
				
				</fieldset>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Units To Order:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name=" quantity" value="<?php echo $row['quantity']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['product_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['products_name'].' '.$row['product_no']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_product.php?product_no=<?php echo $row['product_no']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>