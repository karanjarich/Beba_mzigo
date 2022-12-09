<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['car_type']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-green">
			    <center><h4 class="modal-title" id="myModalLabel">Edit Pricing</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_products.php">
				<input type="hidden" class="form-control" name="car_type" value="<?php echo $row['car_type']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Within Nairobi:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="products_name" value="<?php echo $row['within_nairobi']; ?>" required="required">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Outside Nairobi:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="reorder_level" value="<?php echo $row['outside_nairobi']; ?>" required="required">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Loading Per Person:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name=" products_description" value="<?php echo $row['loading_per_person']; ?>" required="required">
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
<div class="modal fade" id="delete_<?php echo $row['car_type']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Price</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['products_name'].' '.$row['car_type']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_product.php?car_type=<?php echo $row['car_type']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>