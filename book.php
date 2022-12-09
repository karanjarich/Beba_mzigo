<!-- Add New Request -->
<?php include'admin_nav.php';
include_once('connection_data.php');
$sql = "SELECT * FROM vehicle";
							//use for MySQLi-OOP
							$query = $conn->query($sql);
$sql1 = "SELECT * FROM vehicle";
							//use for MySQLi-OOP
							$query1 = $conn->query($sql1);
                            
							
                            
?>
<div class="container-fluid" >
			<form method="POST" action="book_save.php">
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
						<input type="text" class="form-control" id="product_no" name="location" placeholder="Enter Pick up location" required="required">
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
						<label class="control-label modal-label">Car Type:</label>
					</div>
					    <div class="col-sm-5">
                        <select class="form-control" name="cabin" id="cartype">
                        <?php while($row = $query->fetch_assoc()){
                        echo						
						     "<option value=".$row['cabin'].">".$row['cabin']."</option>";
							}?>
                         </select>
                    </div>
            	</div>
            	<div class="row form-group">
                        <div class="col-sm-8">
                        </div>
					<div class="col-sm-1">
						<button type="button" class="btn btn-default" class="btn btn-warning">Decline</button>
                     </div>
                        <div class="col-sm-1">
				           <button type="submit" name="add" class="btn btn-success">Book</button>
					</div>
                   	</div>
                </form>
            </div>
<?php include "main_footer.php";?>
     <script>
    $(document).ready(function(){
             $('#cartype').change(function(){
                var located = $('#product_no').val();
                var  search= $('#cartype').val();
                if(search != '')
                {
                     $.ajax({
                          url:"search_cars.php",
                          method:"POST",
                          data:{located:located,search:search},
                          dataType:"Text",
                          success:function(data)
                          {
                             $('#results').html(data);  // this works
                             
                          }
                     });
                }

           });
           function compute_cost(){
                var located = $('#product_no').val();
                var  search= $('#cartype').val();
                if(search != '')
                {
                     $.ajax({
                          url:"search_cars.php",
                          method:"POST",
                          data:{located:located,search:search},
                          dataType:"Text",
                          success:function(data)
                          {
                             $('#results').html(data);  // this works
                             
                          }
                     });
                }

           });
        function print_receipt()
        {
            var head1=document.getElementById('Beba Mzigo').value;
            var head2=document.getElementById('123 456').value;
            var head3=document.getElementById('Nairobi').value;
            var head4=document.getElementById('Nyati House 2nd Floor').value;
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
    