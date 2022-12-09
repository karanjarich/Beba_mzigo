<!-- Add New -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
			     <center><h4 class="modal-title" id="myModalLabel" style="limegreen">Add Pricing</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="pricing_save.php">
                   <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Car Type:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="car_type" placeholder="Enter car type" required=" required">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Within Nairobi:</label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control" name="within_nairobi" placeholder="Within Nairobi" required=" required">
						
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Enter Outside Nairobi:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="outside_nairobi" placeholder="Enter Outside Nairobi Level"required="required">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Loading Per Person:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name=" loading_per_person" placeholder="Loading Per Person" required="required">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>