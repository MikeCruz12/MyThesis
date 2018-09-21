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
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body> 
          <script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>

           <div class="container" id="print">  
           <h1 style="color: #0d9d9e;border-bottom: 1px solid #d8d8d8;margin-top: 20px;">Reports</h1>
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered" width="100%">  
                          <thead>  
                               <tr>

            <th>ID</th>                    
						<th>Request By</th>
						<th>Date Requested</th>
						<th>Scheduled In Mountain</th>
            <th>Picked Date to Hike</th>
						<th>Date Approved</th>
            <th>Action</th>
						</tr>';
                          </thead>  
                          <?php  
                          $queryApprove_show="SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Approved' AND done = 'done' ORDER BY datenow desc";
			$result_approve=mysqli_query($con,$queryApprove_show);
                          if($result_approve){
                        		while($row = mysqli_fetch_array($result_approve)){

                              $id=$row[0];
		

            ?>
            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $row['firstname'] . ' '.$row['middlename'].' ' . $row['lastname']; ?></td>
              <td><?php echo date("F d, Y",strtotime($row['datenow'])); ?></td>
              <td><?php echo $row['mountain_name']; ?></td>
              <td><?php echo date("F d, Y",strtotime($row['date'])); ?></td>
              <td><?php echo date("F d, Y",strtotime($row['dateConfirmed'])); ?></td>
              <td><a class="btn btn-primary" href="attendanceReport.php?id=<?php echo $id; ?>" style="color: white;">View</a></td>
            </tr>

            <?php

				}
			}


                          ?>  
                     </table>  
                </div>  

            
           </div>  
           <div class="container" style="padding-bottom: 10px;" align="center" >
            <br>
            <p><button class="btn btn-primary"  onclick="printContent('print')">Print Reports</button></p>
          </div>
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  