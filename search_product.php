<?php
 //filter.php
 include_once"connection_data.php";
 if(isset($_POST["search"]))
 {
      //$conn = mysqli_connect("localhost", "root", "", "empos");
      $output = '';
      $query = "
           SELECT * FROM products
           WHERE product_no LIKE '".$_POST["search"]."'
      ";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
			   
			   $output.= '<div class="col-md-4">
                        <label class="control-label modal-label">Price</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control data-input" id="price" value="'. $row["price"] .'" name="Price">

                    </div
					<div class="col-md-8">
                        <input type="hidden" class="form-control data-input" id="buying" value="'. $row["buying"] .'" name="stock">
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" class="form-control data-input" id="stock" value="'. $row["units_in_stock"] .'" name="stock">
                    </div>
					<div class="col-md-8">
                        <input type="hidden" class="form-control data-input" id="ordered" value="'. $row["ordered"] .'" name="ordered">
                    </div>
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
