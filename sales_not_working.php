  <?php include'admin_nav.php';
       include'connection_data.php';
       $datee=date('Y-m-d');
       $determiner=1;
	   
      $customer="select * from customer";
	 //use for MySQLi-OOP
	  $query = $conn->query($customer);
	   
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
    <div class="container" style="margin-top:10px">
      <div class="row">
	         <div class="col-md-2">
                <div class="row form-group">
                    <input type="text" class="form-control data-input" id="product_no" name="product_no" placeholder="enter product" style="border-radius:50px 0 0 50px" required>
                    </div>
                </div>
			<div class="col-md-2">
				<div class="row form-group">
                    
                        <input type="number" class="form-control data-input" id="quantity" name="quantity" style="border-radius:0 50px 50px 0"  placeholder="Quantity" required>
                    </div>
                </div>
				 <div class="col-md-3">
					<div class="row form-group" id="results">
                    
                </div>
                </div>
			<div class="col-md-3">
               <div class="row form-group">
			        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" id="add" class="btn btn-primary" data-dismiss="modal"><span class="fas fa-save"></span> Save Product</button>
               	</div>
            </div>
			<div class="col-md-2">
				       <select class="form-control" name="mode" id="choose_customer">
					       <option> Choose Customer</option>
                           <option> Add Customer</option>
                           <?php while($row = $query->fetch_assoc()){
							   	echo"<option value=".$row['customer_no'].">".$row['customer_name']."</option>							 
							  ";
							}?>
                         </select>
                   
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
                        <input type="number" class="form-control" id="paid_amount" name="paid_amount" required>
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
                        <label class="control-label modal-label">Run:</label>
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

            <div class="col-md-3" >
                <div class="row form-group">
                     <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="enter phone" required>
                   </div>
                </div>
				<div hidden><input type="text" id="session_name" value="<?php echo $_SESSION["username"];?>"></div>
			 <div class="col-md-6" id="customer_results">
			    
			 </div>
		   <div class="col-md-3">
                <div class="row form-group">
				    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <button type="button" id="BtnOk" class="btn btn-lg btn-success" data-dismiss="modal"><span class="fas fa-plus"></span>Print</button>
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
<?php include "main_footer.php";include('add_modal.php');?>
<script>
	var total_amount =document.getElementById('total_amount').innerHTML;
	var paid_amount =document.getElementById('paid_amount').innerHTML;
	var balance="";
	let products_update={};
	var data={};
    let d=[];
          
       $(document).ready(function(){
         var $salesTotal=0;
		 var $report="";
		 
		  $('#sales_receipts').hide();
           $('#product_no').keyup(function(){
                console.log(9);
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
			console.log("mmkeerewrewr");
			var divToPrint=document.getElementById('sales_product');
			var clientinfo=document.getElementById('sales_date').value;
			var change=total_amount-paid_amount;
			var client=document.getElementById('choose_customer').value;
			console.log(change);
			var head1=document.getElementById('head1').value;
			var head2=document.getElementById('head2').value;
			var head3=document.getElementById('head3').value;
			var head4=document.getElementById('head4').value;
			var newWin=window.open('','Print-Window','width=400,height=400,top=500,left=500');
			newWin.document.open();
			newWin.document.write('<html><head><style>body{color:green;line-height:1.5;font-family:"Arial";}#head1{margin:10vh;}table,th,td{border:1px solid black;text-align:center;}</style></head><body   onload="window.print()">'+head1+"<br/>"+head2+"<br />"+ head3+"<br />"+ head4+"<br />"+clientinfo+"<br />"+divToPrint.innerHTML+"<br />"+"Customer Name:"+client +"</br>"+"Change:"+change+'</body></html>');
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
                          url:"classes/search_customer.php",
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
	    $('#BtnOk').click(function(){
				var sales = $('#sales').val();
				var sales = $('#sales').val();
				var sales = $('#sales').val();
				var sales_date = $('#sales_date').val();
				var total = $('#total_amount').val();
				var paid = $('#paid_amount').val();
				var phone = $('#c_phone').val();
				var vat = $('#vat').val();
				var customer = $('#choose_customer').val();
				//var session_name=$('#session_name').val();
				//console.log(session_name);
				if (balance>0)
				{
					//j();
				}
				else{
                if(sales!='')
                {
					//if (customer!="Add customer"||customer!="Choose customer")
                     $.ajax({
                          url:"classes/edit_sales.php",
                          method:"POST",
                          data:{sales:sales,total:total,sales_date:sales_date,paid:paid,phone:phone,vat:vat,customer:customer},
                          dataType:"Text",
                          success:function(data)
                          {  
						     update_stock(); 
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
        
	   });
//script to create receipt
//script to update stocks

function update_stock(){
var table = $("#dataTable tbody");
table.find('tr').each(function (i, el) {
        var $tds = $(this).find('td'),
            product_no = $tds.eq(1).text(),
            Quantity = $tds.eq(2).text();
        // do something with productId, product, Quantity
		  data={product_no:product_no,stock:stock};
		  d.push(data);
    });
//https://stackoverflow.com/questions/50226307/html-js-json-take-user-input-and-add-it-to-json-payload-as-an-json-object
console.log(JSON.stringify(d));
}
//end of the stock update
//script to update accounts......... ensure the folio  // is saved to the database

//script to edit sales...........

 </script>
   