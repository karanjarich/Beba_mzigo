     <?php include'admin_nav.php';
     include'connection_data.php';
    /// include'bus_cus_filter.php';

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
                        <th>Booking No</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Phone</th>
                        <th>vehicleid</th>
                        <th>distance</th>
                        <th>Action</th>
                    </thead>
                <tbody>
                        <?php
                            include_once('connection_data.php');
                            $sql = "SELECT * FROM client_requests";
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                                echo
                                "<tr>
                                    <td>".$row['booking_id']."</td>
                                    <td>".$row['location']."</td>
                                    <td>".$row['destination']."</td>
                                    <td>".$row['phone_no']."</td>
                                    <td>".$row['vehicleid']."</td>
                                    <td>".$row['distance']."</td>
                                     <td>
                                     <a href='#stock_".$row['booking_id']."' class='btn btn-warning btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-plus'></span>Accept</a>
                                    </td>
                                </tr>";
                               // include('product_modal.php');
                                include('accept_bookings.php');
                            }

                        ?>
                     </tbody>
              </table>
            </div>
          </div>
               </div>
          </div>
</div>
<?php //include('add_products.php') ?>
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