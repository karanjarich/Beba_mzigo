<script >
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script> 
<?php include'admin_nav.php';
	 include_once('connection_data.php');
     include'bus_cus_filter.php';
	 $sql_users = "SELECT * FROM user";
	//use for MySQLi-OOP
	  $query = $conn->query($sql_users);
							
    ?>

    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
       
		  <div class="row">
              <div class="col-md-1">From:</div>
                <div class="col-md-2"><input type="date" class="form-control data-input" id="datefrom" name="datefrom" style="border-radius:50px 0 0 50px"  required></div>
                 <div class="col-md-1">To:</div>
                 <div class="col-md-2"><input type="date" class="form-control data-input" id="dateto" name="dateto"  required></div>
                 <div class="col-md-2">
				       <select class="form-control" name="mode" id="employee">
                           <?php while($row = $query->fetch_assoc()){
                                echo"<option value=".$row['username'].">".$row['username']."</option>							 
                              ";
							}?>
                         </select>
                   
				</div>
                <div class="col-md-2">
                        <select class="form-control" name="mode" id="action">
                         <option>customers</option>
                         <option>summary</option>
                         <option>products</option>
                         <option>category</option>
                         </select>
                    </div>
                <div class="col-md-2">
                        <button type="button" id="btnok" class="btn btn-success" data-dismiss="modal"><span class="fas fa-print"></span>Print</button>
                    </div>
          </div>
          <div class="container" id="printable">
               <div class="form-group row" style="border:2px solid black;">
                      <div class="col-sm-5">
                          <label class="control-form-label "><?php echo $businessname; ?></label><br>
						<label class="control-form-label "><?php echo $businessRegistration; ?></label><br>
                        <label class="control-form-label "><?php echo $contact; ?></label><br>
						<label class="control-form-label "><?php echo $email;?></label>
                        
				      </div>
                </div>
                <div class="card-header" id="results">
			     </div>
          </div>
          </div>
          
			

</div>
 
<?php include "main_footer.php";?>
<script>
	  $(document).ready(function(){
		   $('#dateto').change(function(){
                var datefrom = $('#datefrom').val();
                var dateto = $('#dateto').val();
				var action= "readall";
                if(dateto != '' || datefrom != '')
                {
                     $.ajax({
                          url:"view_sales_proc.php",
                          method:"POST",
                          data:{dateto:dateto,datefrom:datefrom,action:action},
                          dataType:"Text",
                          success:function(data)
                          {
                             $('#results').html(data);  
                             
                          }
                     });
                }

           });
		   
		   //this module allows you to filter total sales by customers
		   
		$('#action').change(function(){
                var datefrom = $('#datefrom').val();
                var dateto = $('#dateto').val();
				var action= $('#action').val();
                if(dateto != '' || datefrom != '')
                {
                     $.ajax({
                          url:"view_sales_proc.php",
                          method:"POST",
                          data:{dateto:dateto,datefrom:datefrom,action:action},
                          dataType:"Text",
                          success:function(data)
                          {
							 console.log(action);
                             $('#results').html(data);  
                             
                          }
                     });
                }

           });
		   //it ends here
	//this module allows you to filter total sales by products
 	   $('#employee').change(function(){
                var datefrom = $('#datefrom').val();
                var dateto = $('#dateto').val();
				var user = $('#employee').val();
				var action= "employee";
                if(dateto != '' || datefrom != '')
                {
                     $.ajax({
                          url:"view_sales_proc.php",
                          method:"POST",
                          data:{dateto:dateto,datefrom:datefrom,action:action,user:user},
                          dataType:"Text",
                          success:function(data)
                          {
							 
                             $('#results').html(data);  
                             
                          }
                     });
                }

           });
 //it ends here
	     $('#btnok').click(function(){
		     
               printDiv('printable');
               location.reload();//https://www.w3schools.com/jsref/met_loc_reload.asp
		}); 
	   });
 </script>
 