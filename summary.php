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
         <div class="card-header">
		  <div class="row">
              <div class="col-md-1">From:</div>
                <div class="col-md-2"><input type="date" class="form-control data-input" id="datefrom" name="datefrom" style="border-radius:50px 0 0 50px"  required></div>
                 <div class="col-md-1">To:</div>
                 <div class="col-md-2"><input type="date" class="form-control data-input" id="dateto" name="dateto"  required></div>
                 <div class="col-md-2">
				       <select class="form-control" name="mode" id="action">
                         <option>customers</option>
                         <option>products</option>
                         <option>category</option>
                         </select>
				</div>
                <div class="col-md-2">
                         <button type="button" id="btnok" class="btn btn-success" data-dismiss="modal"><span class="fas fa-print"></span>Print</button>
				
                    </div>
              
          </div>
          <div class="card-header" id="results">
			</div>
			 <div class="row form-group">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control fc" name="head1" id="head1" value="<?php echo $businessname; ?>">
						<input type="hidden" class="form-control fc" name="head2" id="head2" value=" Sales Report" required>
						<input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $contact; ?>" required>
						<input type="hidden" class="form-control fc" name="head4" id="head4" value="<?php echo $email; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $businessRegistration; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $pin; ?>" required>
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
                          url:"summary_proc.php",
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
				'</style>';
			htmlToPrint += "<b>"+head1+"</br>"+"</br>"+head2+"</br>"+"</br>"+head3+"</br>"+"</br>"+head4+"</br>"+"</br>"+divToPrint.outerHTML;
			newWin = window.open("");
			newWin.document.write(htmlToPrint);
			newWin.print();
			newWin.close();
			setTimeout(function(){newWin.close();},1000);
		}
        $('#btnok').click(function(){
		      print_receipt();
		});
	   });
 </script>
 