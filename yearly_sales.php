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
     $report_name="Daily Sales Report";
     $report_month="";
	 $sql_users = "SELECT * FROM user";
	//use for MySQLi-OOP
	  $query = $conn->query($sql_users);
							
    ?>

    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
       
		  <div class="row">
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
              var action="yearly"
            $.ajax({
                          url:"periodic_sales_proc.php",
                          method:"POST",
                          data:{action:action},
                          dataType:"Text",
                          success:function(data)
                          {
							 
                             $('#results').html(data);  
                             
                          }
                     });

           });
 //it ends here
        
	     $('#btnok').click(function(){
		     
               printDiv('printable');
               location.reload();//https://www.w3schools.com/jsref/met_loc_reload.asp
		}); 
	   
 </script>
 