
    <style> .data-input{border:2px solid rgb(10, 239, 28);}</style>
    <div id="content-wrapper">

   <div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="row" style="margin-top:10px">

                <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Product</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control data-input" id="product_no" name="product_no" placeholder="please enter product code or name"required>

                    </div>
                </div>
				
				<div class="row form-group" id="results">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Price</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control data-input" id="price" name="Price">

                    </div>
                </div>
				

                </div>
                <div class="col-md-6">
                <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Quantity:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control data-input" id="quantity" name="quantity"  required>
                    </div>
                </div>	
                <div class="row form-group">
                     <div class="col-md-12">
                         <button type="button" id="add" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Add</button>
               		</div>
                </div>


            </div>

            <div class="col-md-4">
            <div class="row form-group" id="results">
            </div>
            </div>
            </div>
                        </div>
            </div>
      <div class="col-md-12" style="margin-top:0px; background-color:#16f74926" >
            <div class="row ">
               <div class="col-md-8" id="sales_product">
              
                 <hr>

                </div>
            <div class="col-md-4">
                <center><h6> Payments</h6></center>
                 <hr>
                 <div class="col-md-12">
                 <fieldset disabled>
                  	<div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Sales#:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="sales" id="sales" value="<?php echo $last_id ;?>" required>
                    </div>
                </div>

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
                    <div class="col-md-4">
                        <label class="control-label modal-label">Sales Date</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="sales" id="sales_date" value="<?php echo date("Y/m/d") ;?>" required>
                    </div>
                </div>
                    <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Paid Amount:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="paid_amount" name="paid_amount" required>
                    </div>
                </div>
				 <div class="row form-group">
                    <div class="col-md-4">
                        <label class="control-label modal-label">Customers Phone:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="c_phone" name="c_phone" required>
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
                     <div class="col-md-6">
                         <button type="button" id="ok" class="btn btn-warning btn-lg btn-block" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>OK</button>
				</div>
					<div class="col-md-6">
                         <a href="#addnew" data-toggle="modal" class="btn btn-success btn-lg btn-block"><span class="fas fa-users"></span> New</a>
					</div> 
                </div>
                </div>
            </div>
        </div>
        </div>

    </div>
</div>
</div>
     <?php include "main_footer.php";include('add_customer.php');?>
	  <script>
	var total_amount =document.getElementById('total_amount').innerHTML;
	var paid_amount =document.getElementById('paid_amount').innerHTML;
	var balance=total_amount-paid_amount
       $(document).ready(function(){
         var $salesTotal=0;
           $('#product_no').keyup(function(){

                var search = $('#product_no').val();
                if(search != '')
                {
                     $.ajax({
                          url:"search_product.php",
                          method:"POST",
                          data:{search:search},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             document.getElementById('price').value=data;
                          }
                     });
                }

           });
	/// edit sales quantity 
	   
	///
	/// print receipt
	function print_receipt(){
		        var sales = $('#sales').val();
                var customer = $('#c_phone').val();
				var total_amount = $('#total_amount').val();
                var paid_amount = $('#paid_amount').val();
                var balance =total_amount- paid_amount;
				var sales_date= $('#sales_date').val();
               if(sales != '')
                {
                     $.ajax({
                          url:"classes/receipts.php",
                          method:"POST",
                          data:{sales:sales},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                            alert("Wait for the printing of receipt");
                          }
                     });
                }

           }
	///end of print receipt
    /// search customer
		$('#c_phone').blur(function(){
                var search = $('#c_phone').val();
                if(search != '')
                {
                     $.ajax({
                          url:"search_customer.php",
                          method:"POST",
                          data:{search:search},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             document.getElementById('c_phone').value=data;
                          }
                     });
                }

           });
	     
	/// end of recall
	
    ///update sales table
	       $('#ok').click(function(){
                var sales = $('#sales').val();
				var sales_date = $('#sales_date').val();
                var total = $('#total_amount').val();
				var paid = $('#paid_amount').val();
				var customer = $('#customer').val();
				if (balance>0)
				{
					customer_checker();
				}
				else{
                if(sales!= '')
                {
                     $.ajax({
                          url:"classes/edit_sales.php",
                          method:"POST",
                          data:{sales:sales,total:total,sales_date:sales_date,paid:paid},
                          dataType:"Text",
                          success:function(data)
                          {
                              ///call print receipt module
							  //print_receipt();
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
                             alert(data);
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
                        var sales = $("#sales").val();
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
                        data:{product_no: product_no,quantity:quantity ,sales:sales,price: price,id:id},
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
