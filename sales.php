  <?php include'admin_nav.php';
       include'connection_data.php';
       include'bus_cus_filter.php';
       $datee=date('Y-m-d');
       $determiner=1;
	   $sql_sales = "INSERT INTO sales(`sales_date`) VALUES ('$datee')";
     //use for MySQLi OOP
       if($conn->query($sql_sales)){
             $last_id = $conn->insert_id;
            $_SESSION['success'] = 'sales_no added successfully';
        }
        else {
            $_SESSION['error'] = 'Something went wrong while adding';
        }
      
    ?>
  <div id="content-wrapper">
    <div class="container">
    <div class="row">
	
        <div class="col-md-12">
            
            <div class="row" style="margin-top:10px">

                <div class="col-md-3">
                <div class="row form-group">
                    <input type="text" class="form-control data-input" id="product_no" name="product_no" placeholder="enter product"required>
                    </div>
                </div>
				
				<div class="row form-group">
                     <div class="col-md-6">
                        <input type="number" class="form-control data-input" id="quantity" name="quantity"  placeholder="Quantity" required>
                    </div>
                </div>
				 <div class="col-md-3">
					<div class="row form-group" id="results">
                    
                </div>
                </div>
               <div class="row form-group">
			        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" id="add" class="btn btn-primary" data-dismiss="modal"><span class="fas fa-save"></span> Save Product</button>
               	</div>
                               
            </div>
            
            <div class="col-md-4">
            <div class="row form-group" id="results">
            </div>
			
            </div>
            </div>
            </div>
            </div>
      <div class="container">
            <div class="row ">
               <div class="col-md-8" id="sales_product">
               </div>	
            <div class="col-md-4">
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

            <div class="col-md-2">
                <div class="row form-group">
                     <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="enter phone" required>
                   </div>
                </div>
			 <div class="col-md-6" id="customer_results">
			 
			 </div>
         <div class="col-md-4">
               
                <div class="row form-group">
				    <button type="button" id="cst" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-save"></span>Add Customer</button>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" id="ok" class="btn btn-success" data-dismiss="modal"><span class="fas fa-plus"></span>Ok&&Print</button>
               	</div>
               	</div>
           
		  
         <div class="row form-group">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control fc" name="head1" id="head1" value="<?php echo $businessname; ?>">
						<input type="hidden" class="form-control fc" name="head2" id="head2" value="Cash Sales" required>
						<input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $contact; ?>" required>
						<input type="hidden" class="form-control fc" name="head4" id="head4" value="<?php echo $email; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $website; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $pin; ?>" required>
				      </div>
                </div>			 
            </div>
</div>
</div>
     <?php include "main_footer.php";include('add_customer.php');?>
	  <script>
          var total_amount =document.getElementById('total_amount').innerHTML;
          var paid_amount =document.getElementById('paid_amount').innerHTML;
          var balance=total_amount-paid_amount;
          var credit="";
          var debit="";
          var action=""; 
          var account_category="";
          var account_no="";
          var ref_no = $('#sales').val();
		  var transact_date = $('#sales_date').val();
          var description="Sales of goods sales no"+" "+ref_no;
       $(document).ready(function(){
         var $salesTotal=0;
		 var $report="";
		  $('#sales_receipts').hide();
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
                             $('#results').html(data);  // this works
                             
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
			newWin.document.write('<html><head><style>body{color:green;line-height:1.5;font-family:"Calibri";margin:10px;} #head1{text-align:center;}table,th,td{border:1px solid blue;text-align:center;}table{width:50%}</style></head><body   onload="window.print()">'+head1+"<br/>"+head2+"<br />"+ head3+"<br />"+ head4+"<br />"+clientinfo+"<br />"+divToPrint.innerHTML+"<br />"+"Customer Name:"+client +"</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+"Total:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+sum+"</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+"Paid:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+paid+"</br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+"Change:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"+change+'</body></html>');
			newWin.document.close();
			setTimeout(function(){newWin.close();},1000);
		}
	///end of print receipt

        
    /// search customer
		$('#c_phone').keyup(function(){
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
                             $('#customer_results').html(data);  // this works
                             //document.getElementById('c_phone').value=data;
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
                          url:"classes/edit_sales.php",
                          method:"POST",
                          data:{sales:sales,total:total,sales_date:sales_date,paid:paid,phone:phone,vat:vat},
                          dataType:"Text",
                          success:function(data)
                          {  
						    post_credit();
                            post_debit();
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
           
    ///  debit post
	    function post_debit(){
                var sales = $('#sales').val();
				var sales_date = $('#sales_date').val();
                var total = $('#total_amount').val();
				var paid = $('#paid_amount').val();
				var phone = $('#c_phone').val();
                var account_category="";
                var account_no="";
				var customer = $('#customer').val();
                var diff=paid-total
				if (diff>-1)// paid by cash
				{
					account_no="cash";
                    account_category="assets";
                    debit=paid;
                    }
                else// paid nothing
				{
				    account_no=phone;
                    account_category="assets";
                    debit=total;
                    credit=paid;
                    
                }
                 $.ajax({
                        url:"classes/transaction_save.php",
                          method:"POST",
                         data:{ref_no:ref_no,debit:debit,credit:credit,account_no:account_no,transact_date:transact_date,description:description,account_category:account_category},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                            console.log(data);
                            // document.getElementById('total_amount').value=data;
                          }
                     });
                
           }
           ///end of coding
           ///  post credit
	    function post_credit(){
          var total = $('#total_amount').val();
		  var paid = $('#paid_amount').val();
		  var phone = $('#c_phone').val();
          debit=0;
         
          
		  if (paid>=total)// paid by cash
				{
					account_no="sales";
                    account_category="revenue";
                    credit=total;
                   
                }
                else// paid by nothing
				{
                    account_no="sales";
                    account_category="revenue";
                    credit=total;
            }
               
                     $.ajax({
                         
                          url:"classes/transaction_save.php",
                          method:"POST",
                          data:{ref_no:ref_no,debit:debit,credit:credit,account_no:account_no,transact_date:transact_date,description:description,account_category:account_category},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             console.log(data);
                            // document.getElementById('total_amount').value=data;
                          }
                     });
               

           }
   /// write a code to populate above total
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
          //this code allows to save to the database product ordered by customers
         $("#add").click(function(){
            var product_no = $("#product_no").val();
            var quantity = $("#quantity").val();
            var price = $("#price").val();
			var buying = $("#buying").val();
            var sales = $("#sales").val();
			var stock = $('#stock').val();
			var current_stock = stock-quantity;
						var id=sales.toString()+product_no.toString();
                        console.log(parseInt(id));
                        if(product_no==''||quantity==''||sales==''||price==''||id=='')
                        {
                           alert("Please Fill All Fields");
                        }
                     else if (current_stock>-1)
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
                        else{
                         alert("insufficient stock available"+ stock+ "available");
                          document.getElementById("quantity").value=0;
                          quantity="";
                        }
                        return false;
                        });
                  //code to save customers
        $('#cst').click(function(){
		{
			   var cst_name =$('#cst_name').val();
                var search = $('#c_phone').val();
    			
                if(search != '' && cst_name!='')
                {
                     $.ajax({
                          url:"cst_insert.php",
                          method:"POST",
                          data:{search:search,cst_name:cst_name},
                          dataType:"Text",
                          success:function(data)
                          {
                             //$('#results').html(data);  // this works
                             console.log(search)
                          }
                     });
                }
		}
	   });
           	   });

//script to create receipt
//script to update sales
//script to update accounts......... ensure the folio  // is saved to the database

//script to edit sales...........

   
        

 </script>
   