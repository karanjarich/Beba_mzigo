<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['product_categoryno']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			    <center><h4 class="modal-title" id="myModalLabel">Edit Category</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                           </div>
            <div class="modal-body">
			<div class="container-fluid">
			<!-- edits product category details-->
			<form method="POST" action="edit_product_category.php">
				<input type="hidden" class="form-control" name="product_categoryno" value="<?php echo $row['product_categoryno']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Category Name:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="product_category" value="<?php echo $row['product_category']; ?>">
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
<div class="modal fade" id="delete_<?php echo $row['product_categoryno']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			    <center><h4 class="modal-title" id="myModalLabel">Delete Customer</h4></center>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['product_categoryno'].' '.$row['product_category']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
               
				<a href="delete_cat.php?product_categoryno=<?php echo $row['product_categoryno']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
 <!-- delete_cat.php deletes the category --!>