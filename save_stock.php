<?php  
  include_once('connection_data.php');
   $datee=date('Y-m-d');
 if(isset($_POST["id"]))  
        {  
      //Fetching Values from URL
		$product_no=$_POST['product_no'];
		$quantity=$_POST['quantity'];
		$sales=$_POST['sales'];
	    $price=$_POST['price'];
		$id=$_POST['id'];
	
		//insert into sales products
       $query = mysqli_query($conn,"INSERT INTO stock_details(product_no, quantity, price, stock_date) VALUES ('$product_no','$quantity','$price','$$datee')");	
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
						<th>Action</th>
					</thead>
                <tbody>
						<?php
							$sales=$_POST['sales'];
							$sql= "SELECT stock_details.stock_detailsno as no, products.products_name as product,stock_details.quantity,stock_details.price, quantity*price as subtotal FROM products INNER JOIN stock_details ON products.product_no = stock_details.product_no   WHERE ='".$_POST["sales"]."' ";  
			              	//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['no']."</td>
									<td>".$row['product']."</td>
									<td>".$row['quantity']."</td>
									<td>".$row['price']."</td>
								    <td>".$row['subtotal']."</td>
								</tr>"
								;
								}
														
						?>
					 </tbody>
              </table>
			  <?php
		$result $query = $conn->query("SELECT stock_details.quantity as qty,stock_details.price as price sum(price*qty)as total FROM stock_details where sales_no=$sales"));
		while($row = $query->fetch_assoc()){
	?>
	<div class="pull-right">
		<div class="span">
			<div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo $rows['total']; ?></div>
		</div>
	</div>
	</div>
 		</div>	