<?php
	include 'loggedheader.php';
	include 'connect.php';
	include 'function.php';
	include 'loginchecker/adminMenu.php';
	include 'loginchecker/admin.php';
	date_default_timezone_set("Asia/Hong_Kong");

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
	<div class="container" style="width: 800px;">
		<h1 style="color: #0d9d9e;">Dashboard</h1>
		<?php

		$query = "SELECT * FROM setspot";
		$result = mysqli_query($con,$query);

		if($result){
		while($row = mysqli_fetch_array($result)){

			$mountain=$row['mountain_name'];
			$mountain_pic=$row['photo'];
			$mountain_address=$row['address'];
			$setspot_id=$row['id'];



			?>
						<br>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="panel " style="background-color: DarkTurquoise;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-5">
                                    <img src="images/<?php echo $mountain_pic; ?>" width="310" height="230">
                                </div>

                                <div class="col-xs-7">
                                	<br><br>
                                	<div class="huge" style="font-size: 30px; color: white; font-weight: bold;">
                                    	<?php
                                    	$today = date("Y-m-d");
								                                    	$select = "SELECT *,COUNT(sets) as total FROM hikerlist WHERE attendance='Present' AND sets='$setspot_id' AND finish='' AND hikerArrive=''";
									$response = mysqli_query($con,$select);

									if($response){
										while($row = mysqli_fetch_array($response)){
											echo 'Number of hikers: '. $total=$row['total'];

										}
									}
                                    	?>
                                    	<hr style="margin: 0">
                                    </div>

                                    <div class="huge" style="font-size: 30px; color: white; font-weight: bold;">
                                        <?php
                                                                        $select = "SELECT *,COUNT(done) as total FROM register WHERE done='done' AND setspot_id='$setspot_id' AND arriveStatus=''";
                                    $response = mysqli_query($con,$select);

                                    if($response){
                                        while($row = mysqli_fetch_array($response)){
                                            echo 'Number of Group: '. $total=$row['total'];

                                        }
                                    }
                                        ?>
                                        <hr style="margin: 0">
                                    </div>

                                    
                                    <div class="huge" style="font-size: 25px; color: white;">
                                    	<i>"<?php echo $mountain; ?><br><?php echo $mountain_address; ?>"</i>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                        <a href="details.php?id=<?php echo $setspot_id;?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
		</div>


			<?php



		}
	}

		?>

	</div>

</body>
</html>