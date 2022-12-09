  <?php include'admin_nav.php';
       include'connection_data.php';
       $datee=date('Y-m-d');
?>
     <div id="content-wrapper">
    <div class="container">
       <form class="form-inline">
			<div class="form-group">
			  <label for="customer_no">Customer Phone Number:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			  <input type="text" class="form-control" id="customer_no" placeholder="customer_no" name="customer_no">
			</div>&nbsp&nbsp&nbsp&nbsp
			<div class="form-group">
			  <label for="paid">Amount:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			  <input type="number" class="form-control" id="paid" placeholder="paid" name="paid">
			</div>
			  <div class="form-group">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			  <button type="button" id="ok" class="btn btn-primary" style="font-size:24px">Print Invoice <i class="fa fa-print"></i></button>
			  </div>			  
           </form>
		</div>
      <div class="container" style="margin-top:2vh">
            <div class="row ">
               <div class="col-md-8" id="sales_product">
               </div>	
            <div class="col-md-4">
                <div class="col-md-12">
                 <fieldset disabled>
                  <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Sales Total:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="total_amount"name="total_amount" required>
                    </div>
                </div>
                </fieldset>
                <div class="row form-group">
                    <div class="col-md-8">
                        <input type="hidden" class="form-control" name="sales" id="sales_date" value="<?php echo date("Y/m/d") ;?>" required>
                    </div>
                </div>
                    <div class="row form-group" id="amount_paid">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Paid Amount:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount" required>
                    </div>
                </div>
				
                <div class="row form-group">
                    <div class="col-md-4">

                        <label class="control-label modal-label">Payment Mode:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-control" name="mode">
                         <option>MPESA</option>
                         <option>CHEQUE</option>
                         <option>CASH</option>
                         <option>CREDIT</option>
                         </select>
                    </div>
                </div>
				<div class="row form-group">
                    <div class="col-md-4">

                        <label class="control-label modal-label">VAT:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-control" id="vat" name="vat">
                         <option>YES</option>
                         <option>NO</option>
                      </select>
                    </div>
                </div>
        </div>
       </div>
    </div>
	<div class="row">

            <div class="col-md-3">
                <div class="row form-group">
                     <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="enter phone" required>
                   </div>
                </div>
			 <div class="col-md-6" id="customer_results">
			 
			 </div>
		   <div class="col-md-3">
                <div class="row form-group">
				    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" id="ok" class="btn btn-success" style="font-size:24px" data-dismiss="modal"><span class="fas fa-plus"></span>Ok&&Print</button>
               	</div>
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
</div>
</div>
     <?php include "main_footer.php";?>
	  <script>
	var total_amount =document.getElementById('total_amount').innerHTML;
	var paid_amount =document.getElementById('paid_amount').innerHTML;
	var balance=total_amount-paid_amount
       $(document).ready(function(){
         var $salesTotal=0;
		 var $report="";
		  $('#sales_receipts').hide();
           $('#customer_no').keyup(function(){

                var search = $('#customer_no').val();
                if(search != '')
                {
                     $.ajax({  
                          url:"search_sales.php",
                          method:"POST",
                          data:{search:search},
                          dataType:"Text",
                          success:function(data)
                          {
                             $('#sales_product').html(data);  // this works
                             
                          }
                     });
                }

           });
	
	/// print receipt
	function print_receipt()
		{
			
			var divToPrint=document.getElementById('sales_product');
			var clientinfo=document.getElementById('sales_date').value;
			var paid=document.getElementById('paid_amount').value;
			var sum=document.getElementById('total_amount').value;
		 	var change=paid-sum;
			var client=document.getElementById('c_phone').value;
			var head1=document.getElementById('head1').value;
			var head2=document.getElementById('head2').value;
			var head3=document.getElementById('head3').value;
			var head4=document.getElementById('head4').value;
			var newWin=window.open('','Print-Window','width=400,height=400,top=500,left=500');
			newWin.document.open();
			newWin.document.write('<html><head><style>body{color:green;line-height:1.5;font-family:"Calibri";} #head1{text-align:center;}table,th,td{border:1px solid blue;text-align:center;}</style></head><body   onload="window.print()">'+head1+"<br/>"+head2+"<br />"+ head3+"<br />"+ head4+"<br />"+clientinfo+"<br />"+divToPrint.innerHTML+"<br />"+"Customer Name:"+client +"</br>"+"Change:"+balance+'</body></html>');
			newWin.document.close();
			setTimeout(function(){newWin.close();},1000);
		}
	///end of print receipt
	/// search units in stock
		$('#quantity').blur(function(){
                var stock = $('#stock').val();
				var antity = $('#quantity').val();
                if(stock<antity)
                {
                     alert(stock);
                }
				else
				{
					 
				}
           });
	     
	
    ///update sales table
	       $('#ok').click(function(){
                var sales = $('#sales').val();
				var sales_date = $('#sales_date').val();
                var total = $('#total_amount').val();
				var paid = $('#paid_amount').val();
				var phone = $('#c_phone').val();
				var vat = $('#vat').val();
				var customer = $('#customer').val();
				if (balance>0)
				{
					//j();
				}
				else{
                if(sales!= '')
                {
					
                     $.ajax({
                          url:"classes/edit_sales_payment.php",
                          method:"POST",
                          data:{sales:sales,total:total,sales_date:sales_date,paid:paid,phone:phone,vat:vat},
                          dataType:"Text",
                          success:function(data)
                          {  
						      
                             print_receipt();
							 window.location.reload(true);
						  }
                     });
                }
		   }
		   });
     ///end  update sales
    /// compute sales total
	    function testSum(){

                var sales = $('#sales').val();
                if(sales != '')
                {
                     $.ajax({
                          url:"classes/sum_sales.php",
                          method:"POST",
                          data:{sales:sales},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             document.getElementById('total_amount').value=data;
                          }
                     });
                }

           }
   /// write a code to populate above total
      $('#edit_sales').click(function(){
        var sales_detailsno= $("#edit").val();
                if(sales_detailsno != '')
                {
                     $.ajax({
                          url:"classes/edit_sales.php",
                          method:"POST",
                          data:{sales_detailsno:sales_detailsno},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             document.getElementById('price').value=data;
                             //alert(data);
                          }
                     });
                }

           }); 
		   
/// end of data sales edit
/// module used for data display
    function DisplayData(){
        var sales = $("#sales").val();
        var total = $("#total_amount").val();
        $.ajax({
                          url:"classes/sales_save.php",
                          method:"POST",
                          data:{sales:sales,total:total},
                          dataType:"Text",
                          async:false,
                          success:function(data)
                          {
                            $('#sales_product').html(data);  // this works
                             testSum();
                               }
                     });
    }
         $("#add").click(function(){
                        var product_no = $("#product_no").val();
                        var quantity = $("#quantity").val();
                        var price = $("#price").val();
						var buying = $("#buying").val();
                        var sales = $("#sales").val();
						var stock = $('#stock').val();
				        var current_stock = stock-quantity;
						 var id=sales+product_no;
                        if(product_no==''||quantity==''||sales==''||price==''||id=='')
                        {
                           alert("Please Fill All Fields");
                        }
                        else
                        {
                        // AJAX Code To Submit Form.
                        $.ajax({
                        type: "POST",
                        url: "classes/sales_save.php",
                        data:{ product_no: product_no,quantity:quantity ,sales:sales,price: price,id:id,current_stock:current_stock,buying:buying},
                        cache: false,
                        success: function(result){
                            //retrieve the data that has been saved in the database bearing the sales number
                              $("#product_no").val('');
                              $("#quantity").val('');
                              $("#price").val('');
                              DisplayData();
                          	}
                        });
                        }
                        return false;
                        });
        
	   });
//script to create receipt
//script to update sales
//script to update accounts......... ensure the folio  // is saved to the database

//script to edit sales...........

 </script>
   