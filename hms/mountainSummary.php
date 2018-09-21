
<?php  
  include 'loggedheader.php';
  include 'connect.php';
  include 'function.php';
  include 'loginchecker/adminMenu.php';
  include 'loginchecker/admin.php';

?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                 <h2 align="center">Reports</h2><br>
                &nbsp &nbspPicked Date To Hike<br>
                <div class="col-md-2">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-2">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-2">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>

                <div class="col-md-2">
                    <label style="float: right;">Total Hiked & Request</label>
                </div>

                <div class="col-md-1">
                    <select name="forma" onchange="location = this.value;" class="form-control">
                      <option></option>
                      <option value="manualgraph.php">Manual</option>
                      <option value="overallgraph.php">Overall</option>
                      
                      <option value="weeklygraph.php">This Week</option>
                      <option value="monthlygraph.php">This Month</option>
                      <option value="yearlygraph.php">This Year</option>
                    </select>
                </div>


                <div class="col-md-2">
                    <label style="float: right;">Reports By Mountain</label>
                </div>

                <div class="col-md-1">
                    <?php
                        $query="SELECT * FROM setspot";
                        $result=mysqli_query($con,$query);

                        if($result){
                            echo '<select class="form-control" name="forma" onchange="location = this.value;">';
                            echo '<option>    </option>';
                            echo '<option value="ApprovedReports.php">All</option>';
                            while($row=mysqli_fetch_array($result)){
                                $id = $row['id'];
                                $mountain = $row['mountain_name'];

                                ?>
                                
                                    <option value="mountainSummary.php?id=<?php echo $id; ?>"><?php echo $mountain; ?></option>
                                
                                <?php
                            }

                            echo '</select>';
                        }
                    ?>
                </div>

                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered" id="employee_data">
                           <thead>  
                               <tr>

            <th>ID</th>                    
            <th>Request By</th>
            <th>Date Requested</th>
            <th>Scheduled In Mountain</th>
            <th>Picked Date to Hike</th>
            <th>Date & Time Arrived</th>
            <th>Action</th>
            </tr>
                          </thead>  
                          <?php  
                          $queryApprove_show="SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Approved' AND setspot.id = " . $_GET['id'];
      $result_approve=mysqli_query($con,$queryApprove_show);
                          if($result_approve){
                            while($row = mysqli_fetch_array($result_approve)){

                              $id=$row[0];
    

            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $row['firstname'] . ' '.$row['middlename'].' ' . $row['lastname']; ?></td>
              <td><?php echo $row['datenow']; ?></td>
              <td><?php echo $row['mountain_name']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td><?php echo $row['arrive'].' / '.date("h i, A",strtotime($row['arriveTime'])); ?></td>
              <td><a class="btn btn-primary" href="attendanceReport.php?id=<?php echo $id; ?>" style="color: white;">View</a></td>
            </tr>

            <?php

        }
      }


                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>

 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  