    <?php include'admin_nav.php';?>

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
					<tbody>
						<?php
							include_once('connection_data.php');
							$sql = "SELECT * FROM users";
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
								    <td>".$row['userid']."</td>
									<td>".$row['username']."</td>
									<td>".$row['password']."</td>
									<td>".$row['status']."</td>
								    <td>
										<a href='#edit_".$row['userid']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
										<a href='#delete_".$row['userid']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('users_modal.php');
							}
							
						?>
					 </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>       
</div>
<?php include('add_users.php') ?>
      </div>
     <?php include "main_footer.php";?>
	