<?php
 //filter.php
 include_once"connection_data.php";
 if(isset($_POST["search"]))
 {
      $output = '';
      $query = "
           SELECT `vehicleid` FROM `vehicle` WHERE location LIKE '".$_POST["located"]."' and cabin = '".$_POST["search"]."'
      ";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
			 	   $output.='				    
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
