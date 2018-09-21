

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
           <div class="container">  
           <h1 style="color: #0d9d9e;border-bottom: 1px solid #d8d8d8;margin-top: 20px;">Disapproved Registration Reports</h1>
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered" width="100%">  
                          <thead>  
                               <tr>
						<th>Hiker</th>
						<th>Date Requested</th>
						<th>Scheduled In Mountain</th>
            <th>Picked Date to Hike</th>
						<th>Date Disapproved</th>
						</tr>';
                          </thead>  
                          <?php  
                          			$queryDisapprove_show="SELECT * FROM register LEFT JOIN setspot ON register.setspot_id = setspot.id LEFT JOIN users ON register.user_id = users.id WHERE status='Disapproved' ORDER BY datenow desc";
			$result_disapprove=mysqli_query($con,$queryDisapprove_show);

			if($result_disapprove){
				while($row = mysqli_fetch_array($result_disapprove)){
					echo '<tr>
						<td align="left">' . $row['firstname'] . ' '.$row['middlename'].' ' . $row['lastname'] . '</td>
						<td align="left">' . date("F d, Y",strtotime($row['datenow'])) . '</td>
						<td align="left">' . $row['mountain_name'] . '</td>
            <td align="left">' . date("F d, Y",strtotime($row['date'])) . '</td>
						<td align="left">' . date("F d, Y",strtotime($row['dateConfirmed'])) . '</td>
						</tr>';

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