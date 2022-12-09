<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['suppliers_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			    <center><h4 class="modal-title" id="myModalLabel">Edit Suppliers</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_supplier.php">
				<input type="hidden" class="form-control" name="suppliers_no" value="<?php echo $row['suppliers_no']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">suppliers_name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_name" value="<?php echo $row['suppliers_name']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Product Number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_phone" value="<?php echo $row['suppliers_phone']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Suppliers Location:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_location" value="<?php echo $row['suppliers_location']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Suppliers Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name=" suppliers_email" value="<?php echo $row['suppliers_email']; ?>">
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
<div class="modal fade" id="delete_<?php echo $row['suppliers_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['suppliers_name'].' '.$row['suppliers_no']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_supplier.php?suppliers_no=<?php echo $row['suppliers_no']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>