<?php  
  include 'connect.php';
  include 'function.php';
  include 'loginchecker/admin.php';

 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  

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
           <div class="container">
            <h3>Picked Date To Hike From <?php echo $firstname; if(isset($_POST['from_date'])){ echo $_POST['from_date'];}?>
            To <?php echo $firstname; if(isset($_POST['to_date'])){ echo $_POST['to_date'];}?></h3>
                     <table class="table table-bordered" id="employee_data">
                           <thead>  
                               <tr>

            <th>ID</th>                    
            <th>Request By</th>
            <th>Date Requested</th>
            <th>Scheduled In Mountain</th>
            <th>Picked Date to Hike</th>
            <th>Date Approved</th>
            <th>Action</th>
            </tr>
                          </thead>  
                          <?php  
                          $queryApprove_show="SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Approved' AND done = 'done' AND arriveStatus='Arrived' AND register.date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND setspot.id = " . $_GET['id'];
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
              <td><?php echo $row['dateConfirmed']; ?></td>
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
      $('#employee_data').DataTable();  
 });  
 </script>  
  <?php
      
}
 ?>

 