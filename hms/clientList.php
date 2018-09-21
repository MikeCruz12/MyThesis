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
           <h1 style="color: #0d9d9e;border-bottom: 1px solid #d8d8d8;margin-top: 20px;">Clients<a class="green-buttons" href="insert.php" style="color: white;"><img src="images/add.png" />Add Client</a></h1>
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered" width="100%">  
                          <thead>  
                                <tr>
									<th>ID</th>
									<th>Firstname</th>
									<th>Middlename</th>
									<th>Lastname</th>
									<th>Gender</th>
									<th>Birthday</th>
									<th>Address</th>
									<th>Username</th>
									<th>Email</th>
									<th>Actions</th>
								</tr>';
                          </thead>  
                          <?php  
                         	$query = "SELECT * FROM users";

							$response = mysqli_query($con,$query);

							if($response){
								while($row = mysqli_fetch_array($response)){
			echo'<tr><td align="left">'.
			$row['id'].'</td><td align="left">'.
			$row['firstname'].'</td><td align="left">'.
			$row['middlename'].'</td><td align="left">'.
			$row['lastname'].'</td><td align="left">'.
			$row['gender'].'</td><td align="left">'.
			date("F d, Y",strtotime($row['bday'])).'</td><td align="left">'.
			$row['address'].'</td><td align="left">'.
			$row['username'].'</td><td align="left">'.
			$row['email'].'</td><td align="left">';
			

			
			?>
			
			<a class="yellow-buttons" href="update.php?id=<?php echo $row['id']; ?>" style="color: white;text-decoration: none;">Edit</a><br><br>
			<a class="red-buttons" href="delete.php?id=<?php echo $row['id']; ?>" style="color: white;text-decoration: none;">Delete</a>
			</form>

			
			<?php

			echo '</tr>';
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


