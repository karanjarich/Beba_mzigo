     <?php include'admin_nav.php';
     include'connection_data.php';
     include'bus_cus_filter.php';

    ?>

    <div id="content-wrapper">

      <div class="container">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary"><span class="fas fa-plus"></span> New</a>
               <button type="button" id="ok" class="btn btn-lg btn-primary" style="font-size:14px">Print <i class="fa fa-print"></i></button>

                </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <th>Product#</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </thead>
                <tbody>
                        <?php
                            include_once('connection_data.php');
                            $sql = "SELECT sales_details.sales_detailsno as no, products.products_name as product,products.product_no product_no, sales_details.sales_no, sales_details.quantity as quantity ,sales_details.price as price,sales_details.quantity*sales_details.price as subtotal FROM products INNER JOIN sales_details ON products.product_no = sales_details.product_no order by sales_no asc  ";
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo
                                "<tr>
                                    <td>".$row['product_no']."</td>
                                    <td>".$row['product']."</td>
                                    <td>".$row['quantity']."</td>
                                     <td>
                                      <a href='#edit_".$row['product_no']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
                                     <a href='#delete_".$row['product_no']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
                                    </td>
                                </tr>";
                                include('product_modal.php');
                                include('add_stock.php');
                            }

                        ?>
                     </tbody>
              </table>
            </div>
          </div>
            
         <div class="row form-group">
                      <div class="col-md-8">
                        <input type="hidden" class="form-control fc" name="head1" id="head1" value="<?php echo $businessname; ?>">
						<input type="hidden" class="form-control fc" name="head2" id="head2" value="Cash Sales" required>
						<input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $contact; ?>" required>
						<input type="hidden" class="form-control fc" name="head4" id="head4" value="<?php echo $email; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $businessRegistration; ?>" required>
                        <input type="hidden" class="form-control fc" name="head3" id="head3" value="<?php echo $pin; ?>" required>
				      </div>
                </div>
              </div>
          </div>
</div>
<?php include('add_products.php') ?>
      </div>
     <?php include "main_footer.php";?>
     <script>
    $(document).ready(function(){
           $('#search').click(function(){
                var datefrom = $('#datefrom').val();
                var dateto = $('#dateto').val();
                if(dateto != '' || datefrom != '')
                {
                     $.ajax({
                          url:"debt_proc.php",
                          method:"POST",
                          data:{dateto:dateto,datefrom:datefrom},
                          dataType:"Text",
                          success:function(data)
                          {
                             $('#results').html(data);

                          }
                     });
                }

           });
        function print_receipt()
        {
            var head1=document.getElementById('head1').value;
            var head2=document.getElementById('head2').value;
            var head3=document.getElementById('head3').value;
            var head4=document.getElementById('head4').value;
            var divToPrint = document.getElementById('dataTable');
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table,th,td {' +
                'border-collapse: collapse;'+
                'border:1px solid #000;' +
                'padding:0.5em;' +
                'color:#000;' +
                '}'
                +
                '#dataTable tr td:last-child,thead th:last-child {' +
                'display:none;'+
                '}' +
                '</style>';
            htmlToPrint += "<b>"+head1+"</br>"+"</br>"+head2+"</br>"+"</br>"+head3+"</br>"+"</br>"+head4+"</br>"+"</br>"+divToPrint.outerHTML;
            newWin = window.open("");
            newWin.document.write(htmlToPrint);
            newWin.print();
            newWin.close();
            setTimeout(function(){newWin.close();},1000);
        }
        $('#ok').click(function(){
              print_receipt();
        });
       });
 </script>