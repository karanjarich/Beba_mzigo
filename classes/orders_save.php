<?php
  include_once('../connection_data.php');
  $sales=$_POST['sales'];
  

 if(isset($_POST["id"])) 
        {
      //Fetching Values from URL
        $product_no=$_POST['product_no'];
        $quantity=$_POST['quantity'];
        $sales=$_POST['sales'];
        $price=$_POST['price'];
        $id=$_POST['id'];
		$current_order=$_POST['current_order'];

        //insert into sales products
       $query = mysqli_query($conn,"INSERT INTO customers_orderdetails(product_no,price,unitsordered,customers_orderno) VALUES ('$product_no','$price','$quantity','$sales')");
        
       $sql = " UPDATE products SET units_ordered='$current_order' WHERE product_no='$product_no'";  
           	//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'cart upddated  successfully';
		}
			
		else{
			$_SESSION['error'] = 'Something went wrong in updating user';
		}
	}
	else{
		$_SESSION['error'] = 'Select user to edit first';
		}
    //  mysqli_close($conn);
    ?>
       <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>#</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
						</thead>
                <tbody>
                        <?php
                            $sales=$_POST['sales'];
                            $total=0;

                            $sql= "SELECT customers_orderdetails.customers_orderdetailsno as no, products.products_name as product, customers_orderdetails.customers_orderno, customers_orderdetails.unitsordered as qty,customers_orderdetails.price as price, customers_orderdetails.unitsordered*customers_orderdetails.price as subtotal FROM products INNER JOIN customers_orderdetails ON products.product_no = customers_orderdetails.product_no WHERE customers_orderdetails.customers_orderno ='".$_POST["sales"]."' ";
                          	//use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                //echo $total;
                                echo
                                "<tr>

                                    <td id='edit_sold'>".$row['no']."</td>
                                    <td>".$row['product']."</td>
                                    <td id='qty' contenteditable='true'>".$row['qty']."</td>
                                    <td>".$row['price']."</td>
                                    <td>".$row['subtotal']."</td>
									</tr>";
                            ?>
                     </tbody>
                     <?php }  
					   
										
				?>
               </table>
            </div>

</div>
<script>
$('#qty').blur(function(){
	           var qty = document.getElementById('qty').innerHTML;
               var sold =document.getElementById('edit_sold').innerHTML;
			  if(sold!= '')
                {
                     $.ajax({
                          url:"classes/edit_sales_details.php",
                          method:"POST",
                          data:{sold:sold,qty:qty},
                          dataType:"Text",
                          success:function(data)
                          {
                              ///call print receipt module
							   DisplayData();
							  // console.log(_qty);
							 // window.location.reload(true);
                          }
                     });
                }
               
           }); 
/// begin of display
    function DisplayData(){
        var sales = $("#sales").val();
        var total = $("#total_amount").val();
        $.ajax({
                          url:"classes/orders_save.php",
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
	//end of display function
   /// compute sales total
	    function testSum(){

                var sales = $('#sales').val();
                if(sales != '')
                {
                     $.ajax({
                          url:"classes/sum_orders.php",
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
</script>
