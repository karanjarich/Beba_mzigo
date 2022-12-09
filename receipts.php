     <?php include'admin_nav.php';
	 //https://stackoverflow.com/questions/37266665/calculate-date-difference-in-mysql-and-php
	 //Calculate date difference in MySQL and PHP 
	 ?>
    
    <div id="content-wrapper">

      <div class="container">
	    <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
		  <div><h3><center>Receipts </center></h3></div>
		  <hr/>
		   <form class="form-inline">
		  
			<div class="form-group">
			  <label for="email">Phone:&nbsp</label>
			  <input type="text" class="form-control" id="c_phone" placeholder="Customer Phone" name="c_phone">
			</div>&nbsp
			<div class="form-group">
			  <label for="email">Balance:&nbsp</label>
			  <fieldset disabled>
			  <input type="text" class="form-control " id="c_balance" placeholder="balance" name="balance">
			   </fieldset>
			</div>&nbsp&nbsp
            <div class="form-group">
			  <label for="email">Amount Paid:&nbsp</label>
			  <input type="number" class="form-control" id="c_amount" placeholder="Enter Amount to Pay" name="c_phone">
			</div>&nbsp
              <div class="form-group">&nbsp
			  <button type="button" id="ok" class="btn btn-lg btn-primary" style="font-size:14px">Print Invoice <i class="fa fa-print"></i></button>
			  </div>			  
           </form>
				</div>
		<div id="results">
		
		
		</div>
		 <div class="row form-group">
							  <div class="col-md-8">
								<input type="hidden" class="form-control fc" name="head1" id="head1" value="GulfMAX Nuetral Care Ltd" required>
								<input type="hidden" class="form-control fc" name="head2" id="head2" value="Cash Sales" required>
								<input type="hidden" class="form-control fc" name="head3" id="head3" value="Po Box 1123421" required>
								<input type="hidden" class="form-control fc" name="head4" id="head4" value="072432432432" required>
							</div>
						</div>
			  </div>
     <?php include "main_footer.php";?>
	 
	 <script>
	$(document).ready(function(){
		   $('#c_phone').keyup(function(){
                var search = $('#c_phone').val();
                if(search != '')
                {
                     $.ajax({
                          url:"customer_debt_proc.php",
                          method:"POST",
                          data:{search:search},
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
			htmlToPrint += "<b>"+head1+"</br>"+"</br>"+head2+"</br>"+"</br>"+head3+"</br>"+"</br>"+head4+"</br>"+"</br>"+"============================================================"+"</br>"+divToPrint.outerHTML;
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