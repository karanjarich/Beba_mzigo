 <?php include'admin_nav.php';
     include'connection_data.php';
    // include'bus_cus_filter.php';
    ?>

    <div id="content-wrapper">
      <div class="container-fluid" >
			<form method="POST" action="requests_save.php">
                <fieldset disabled>
                <center><h4 style="limegreen">Book a Vehicle</h4></center>
               
             	<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Phone Number:</label>
					</div>
					<div class="col-sm-10">
							<input type="text" class="form-control" value="<?php echo $_SESSION['username'];?>"   name="Client Name">
					</div>
				</div>
                </fieldset>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Origin:</label>
					</div>
					<div class="col-sm-4">
						<input type="number" class="form-control" name="location" placeholder="Enter Pick up location" required="required">
					</div>
				
					<div class="col-sm-2">
						<label class="control-label modal-label">Destination:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="destination" placeholder="Enter Products destination" required="required">
					</div>
				</div>
               <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Available Cars:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="destination" placeholder="Enter Products destination" required="required">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Car Type:</label>
					</div>
					    <div class="col-sm-10">
                        <select class="form-control" name="cabin">
                           <?php while($row = $query->fetch_assoc()){
                                echo
								
						     "<option value=".$row['cabin'].">".$row['cabin']."</option>
							 
                              ";
							}?>
                         </select>
                    </div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Within Nairobi:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="inside">
					</div>
                    <div class="col-sm-2">
						<label class="control-label modal-label">Outside:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="outside">
					</div>
				</div>
                	<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Distance:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="distance">
					</div>
                    <div class="col-sm-2">
						<label class="control-label modal-label">Payment:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="payment">
					</div>
				</div>
                 	<div class="row form-group">
					<div class="col-sm-12">
						<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                       <button type="submit" name="add" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Save</button>
					</div>
                   	</div>
                </form>
            </div>
    
      <div class="container">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="fas fa-plus"></span> New</a>
               <button type="button" id="ok" class="btn btn-lg btn-primary" style="font-size:14px">Print <i class="fa fa-print"></i></button>
                </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Booking Id</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Car</th>
                        <th>Status</th>
                        <th>Area of Transit</th>
                        <th>Action</th>
                    </thead>
                <tbody>
                        <?php
                            include_once('connection_data.php');
                            $sql = "SELECT * FROM client_requests";
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo
                                "<tr>
                                    <td>".$row['booking_id']."</td>
                                    <td>".$row['location']."</td>
                                    <td>".$row['destination']."</td>
                                    <td>".$row['vehicleid']."</td>
                                    <td>".$row['status']."</td>
                                    <td>
                                     <a href='#stock_".$row['booking_id']."' class='btn btn-warning btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-plus'></span>Stock</a>
                                     <a href='#edit_".$row['booking_id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                                     <a href='#delete_".$row['booking_id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                                    </td>
                                </tr>";
                              //  include('product_modal.php');
                                
    
                            }

                        ?>
                     </tbody>
              </table>
            </div>
          </div>
            
         <div class="row form-group">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control fc" name="head1" id="head1" value="<?php echo $businessname; ?>">
						<input type="hidden" class="form-control fc" name="head2" id="head2" value="Cash Sales" required>
						<input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $contact; ?>" required>
						<input type="hidden" class="form-control fc" name="head4" id="head4" value="<?php echo $email; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $businessRegistration; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $pin; ?>" required>
				      </div>
                </div>
              </div>
          </div>
</div>
<?php //include('add_requests.php'); ?>
      </div>
     <?php include "main_footer.php";?>
     <script>
    $(document).ready(function(){
           $('#search').click(function(){
                var datefrom = $('#datefrom').val();
                var dateto = $('#dateto').val();
                if(dateto != '' || datefrom != '')
                {
                     $.ajax({
                          url:"debt_proc.php",
                          method:"POST",
                          data:{dateto:dateto,datefrom:datefrom},
                          dataType:"Text",
                          success:function(data)
                          {
                             $('#results').html(data);

                          }
                     });
                }

           });
        function print_receipt()
        {
            var head1=document.getElementById('head1').value;
            var head2=document.getElementById('head2').value;
            var head3=document.getElementById('head3').value;
            var head4=document.getElementById('head4').value;
            var divToPrint = document.getElementById('dataTable');
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table,th,td {' +
                'border-collapse: collapse;'+
                'border:1px solid #000;' +
                'padding:0.5em;' +
                'color:#000;' +
                '}'
                +
                '#dataTable tr td:last-child,thead th:last-child {' +
                'display:none;'+
                '}' +
                '</style>';
            htmlToPrint += "<b>"+head1+"</br>"+"</br>"+head2+"</br>"+"</br>"+head3+"</br>"+"</br>"+head4+"</br>"+"</br>"+divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
            setTimeout(function(){newWin.close();},1000);
        }
        $('#ok').click(function(){
              print_receipt();
        });
       });
 </script>