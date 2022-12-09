<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['payid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-green">
			    <center><h4 class="modal-title" id="myModalLabel">Edit Payment</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit_payments.php">
				<input type="hidden" class="form-control" name="payid" value="<?php echo $row['payid']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Receipient:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="receipient" value="<?php echo $row['receipient']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Amount Paid:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="amount" value="<?php echo $row['amount']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Paid For:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="paid" value="<?php echo $row['paid']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Mode:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="mode" value="<?php echo $row['mode']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Date:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="datee" value="<?php echo $row['datee']; ?>">
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
<!-- Pay -->
<div class="modal fade" id="pay_<?php echo $row['payid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-green">
			    <center><h4 class="modal-title" id="myModalLabel">Add Payments</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="increase_payments.php">
				<input type="hidden" class="form-control" name="payid" value="<?php echo $row['payid']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Receipient:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="receipient" value="<?php echo $row['receipient']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Amount Paid:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="amt" value="<?php echo $row['amount']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Paid For:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="paid" value="<?php echo $row['paid']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Amount Paid Now:</label>
					</div>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="lt_amt">
					</div>
				</div>
				<div class="row form-group">
                    <div class="col-md-2">
                       <label class="control-label modal-label">Payment Mode:</label>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="mode">
                         <option>MPESA</option>
                         <option>CHEQUE</option>
                         <option>CASH</option>
                         <option>CREDIT</option>
                         </select>
                    </div>
                </div>
					
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Date:</label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control" name="datee" value="<?php echo $row['datee']; ?>">
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
<!-- End Pay -->
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['payid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['payid'].' '.$row['receipient']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete_product.php?payid=<?php echo $row['payid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>