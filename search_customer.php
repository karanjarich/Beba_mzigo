<?php
 //filter.php
 include_once"connection_data.php";
 if(isset($_POST["search"]))
 {
      //$conn = mysqli_connect("localhost", "root", "", "empos");
      $output = '';
      $query = "
           SELECT * FROM customers
           WHERE customer_no = '".$_POST["search"]."'
      ";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
			   
			   $output.= '
                    <div class="col-md-8">
                        <input type="text" class="form-control data-input" id="price" value="'. $row["customer_name"] .'" name="Price">

                    </div
					<div class="col-md-4">
                        <input type="hidden" class="form-control data-input" id="buying" value="'. $row["customer_location"] .'" name="stock">
                    </div>
                   
                ';
				
           }
      }
      else
      {
           $output.= '
                    <div class="col-md-12">
                        <input type="text" class="form-control data-input" id="cst_name" name="cst_name" placeholder="enter customer name"  >

                    </div
					                   
                ';

      }

      echo $output;
 }
  ?>
