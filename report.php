<!-- Add New -->
<?php 
include_once('connection_data.php');
include_once('admin_nav.php');
$diff=null    ;
$total_sales =null;
$total_cost =null;

 $sql_sales = "SELECT sum(total_amount) as sales FROM sales";
	//use for MySQLi-OOP
	  $query = $conn->query($sql_sales);
  
  $sql = "SELECT * FROM payments";
	//use for MySQLi-OOP
	  $sql = $conn->query($sql);
   $costing = "SELECT sum(amount) as cost FROM payments";
    $cost = $conn->query($costing);
   while($row = $cost->fetch_assoc()){
        $total_cost=$row['cost'];
    }
$diff=$total_sales-$total_cost;													
?>
<form style="padding:5%">
        <div class="row form-group">
                    <div class="col-md-5 ">
                        <label class="control-label modal-label">Beginning</label>
                    </div>
                    <div class="col-md-6">
                         <input type="text" class="form-control" id="paid_amount" name="paid_amount" value="Start">
                    </div>
                </div>
         <div class="row form-group">
                    <div class="col-md-5 ">
                        <label class="control-label modal-label">End</label>
                    </div>
                    <div class="col-md-6">
                         <input type="text" class="form-control" id="paid_amount" name="paid_amount" value="End">
                    </div>
                </div>
       <?php while($row = $query->fetch_assoc()){
                              $total_sales=$row['sales'];
                                echo"
                    <div class=\"row form-group\">
                    <div class=\"col-md-5 .offset-md-1\">
                        <label class=\"control-label modal-label\">Total Sales:</label>
                    </div>
                    <div class=\"col-md-6\">
                         <input type=\"text\" class=\"form-control\" id=\"paid_amount\" name=\"paid_amount\" value=".$row['sales'].">
                    </div>
                </div>
				";
            }?>	
         <?php while($row = $sql->fetch_assoc()){
                                echo"
                    <div class=\"row form-group\">
                    <div class=\"col-md-5 col-md-offset-1\">
                        <label class=\"control-label modal-label\">".$row['paid'].":</label>
                    </div>
                    <div class=\"col-md-6\">
                         <input type=\"text\" class=\"form-control\" id=\"paid_amount\" name=\"paid_amount\" value=".$row['amount'].">
                    </div>
                </div>
                
				";
            }?>	
          
     <div class="row form-group">
                    <div class="col-md-5 ">
                        <label class="control-label modal-label">Margin</label>
                    </div>
                    <div class="col-md-6">
                         <input type="text" class="form-control" id="paid_amount" name="paid_amount" value="<?php echo $diff?>">
                    </div>
                </div>
</form>            
<?php include "main_footer.php";?>