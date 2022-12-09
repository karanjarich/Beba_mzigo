<?php
  include_once('connection_data.php');
  $sales=$_POST['sales'];
  
 if(isset($_POST["id"]))  
        {  
      //Fetching Values from URL
		$product_no=$_POST['product_no'];
		$quantity=$_POST['quantity'];
		$sales=$_POST['sales'];
	    $price=$_POST['price'];
		$id=$_POST['id'];
	
		//insert into sales products
       $query = mysqli_query($conn,"INSERT INTO sales_details(sales_no, product_no, quantity,price,  sales_detailsno) VALUES ('$sales','$product_no','$quantity','$price','$id')");	
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
							$total=0;
							
							$sql= "SELECT sales_details.sales_detailsno as no, products.products_name as product, sales_details.sales_no, sales_details.quantity as quantity ,sales_details.price as price, quantity*price as subtotal FROM products INNER JOIN sales_details ON products.product_no = sales_details.product_no   WHERE sales_details.sales_no ='".$_POST["sales"]."' ";  
			              	//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								//echo $total;
								echo 
								"<tr>
									<td>".$row['no']."</td>
									<td>".$row['product']."</td>
									<td>".$row['quantity']."</td>
									<td>".$row['price']."</td>
								    <td>".$row['subtotal']."</td>
									<td>
									   	<button id='edit_sales' class='btn btn-success btn-sm' value=".$row['no']."data-toggle='modal'><span class='glyphicon glyphicon-edit'>".$row['subtotal']."</span></button>
									</td>
								</tr>"
								;			
							?>
					 </tbody>
					 <?php }
 
			$sql= "SELECT sum(sales_details.quantity * sales_details.price)as Total FROM sales_details  WHERE sales_details.sales_no ='".$_POST["sales"]."' ";
			              	//use for MySQLi-OOP
				$query = $conn->query($sql);
				while($rows = $query->fetch_assoc())while($rows = $query->fetch_assoc()){
                    $outdata= $rows['Total'];
                }
                ?>
              </table>
            </div>

</div>
 <?php
 if(isset($_POST["sales_detailsno"]))
 {
      //$conn = mysqli_connect("localhost", "root", "", "empos");
      $output = '';
     	//insert into sales products
       $query = "  
           SELECT * FROM sales_details
           WHERE sales_detailsno LIKE '".$_POST["sales_detailsno"]."'
      ";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
				'. $row["selling_price"] .'
                    ';
           }
      }
      else
      {
           $output .= 'Not Found ';

      }

      echo $output;  
 }  
 ?>