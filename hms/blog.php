<?php	
	include 'connect.php';
	include 'function.php';
	include 'loggedheader.php';
	include 'loginchecker/clientMenu.php';
	include 'loginchecker/client.php';

	?>

	<h1>
		Blog
		<a class="green-buttons" href="postBlog.php"><img src="images/add.png">Post Blog</a>
	</h1>

	<!-- <div id="locDiv"></div> -->

	<?php

	$user = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
		if($result = $con->query($user)){
			while($row = $result->fetch_assoc()){
				$user = $_SESSION['username'];
			}
		}

	$query = "SELECT * FROM blog LEFT JOIN users ON blog.user_id = users.username ORDER BY blog.id desc";
	$response = mysqli_query($con,$query);

	if($response){
		while($row = mysqli_fetch_array($response)){
			$row[0];
			$user_id=$row['user_id'];
			$date=date("F d, Y",strtotime($row['datenow']));
			$about=$row['about'];
			$pic=$row['picture'];

			?>
			

			<div class="blog-single">
				<div class="title">
					<div class="image"><img src="images/<?php echo $row['profilePic'] ?>"></div>
					<?php echo $row['firstname'] . ' ' . $row['lastname']?>
					<div class="date">
						<?php 
						echo $date;

						if($user_id == $user){
							?>&nbsp<a class="red-buttons" href="deleteBlog.php?id=<?php echo $row[0]; ?>" style="color: white;text-decoration: none;">Delete This Post</a><?php
						}


						?>
					</div>
				</div>
				<div class="content">
					<?php echo $about; ?><br><br>
					<?php 
						if ($pic==NULL) {
						 	echo '';
						 }
						 else{
						 	?><img src="images/<?php echo $pic; ?>" max width="720"><br><?php
						 }

					?>
				</div>
			</div>
			<?php

		}

	}

?>
