<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
			     <center><h4 class="modal-title" id="myModalLabel" style="limegreen">Add New</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="suppliers_save.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Supplier Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_name" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Supplier Phone:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_phone" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Supplier Location:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_location" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Supplier Email:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="suppliers_email"required>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>
    </div>
</div>