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
		$buying=$_POST['buying'];
		$current_stock=$_POST['current_stock'];
        $id=$_POST['id'];
		
        //insert into sales products
       $query = mysqli_query($conn,"INSERT INTO sales_details(sales_no, product_no, quantity,price,sales_detailsno,buying) VALUES ('$sales','$product_no','$quantity','$price','$id','$buying')");
        $sql =mysqli_query($conn,"UPDATE products SET units_in_stock='$current_stock' WHERE product_no='$product_no'");  
   	}
    //  mysqli_close($conn);
    ?>
        <div class="container">
        <!-- DataTables Example -->

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Product Code</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
				           		<th>Total</th>
                        </thead>
                <tbody>
                        <?php
                            $sales=$_POST['sales'];
                            $total=0;

                            $sql= "SELECT sales_details.sales_detailsno as no, products.products_name as product, sales_details.sales_no, sales_details.quantity as quantity ,sales_details.price as price,sales_details.quantity*sales_details.price as subtotal FROM products INNER JOIN sales_details ON products.product_no = sales_details.product_no   WHERE sales_details.sales_no ='".$_POST["sales"]."' ";
                          	//use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                $catch=$row['no'];
                                echo
                                "<tr>

                                    <td id='edit_sold'>".$row['no']."</td>
                                    <td>".$row['product']."</td>
                                    <td id='qty' contenteditable='true' onblur='myFunction(".$row['no'].",this)'>".$row['quantity']."</td>
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
 function myFunction(x,y) {
	  //var currentRow=$(this).closest("tr"); 
      var qty=$(y).text();
	  var sold=x;
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
							  //  alert(sold);
							 // window.location.reload(true);
                          }
                     });
                }
	}
 
/// begin of display
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
	//end of display function
	
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
</script>
