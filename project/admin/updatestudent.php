<?php

	session_start();

	if(!isset($_SESSION['uid'])) {

		header("location:../login.php");

	}
	
	include('../header.php');

?>

<h3 style="float:left;"><a href="admindash.php">Back To Admin Dashbord</a></h3>
<h3 style="float: right; margin-right: 10px;"><a href="../logout.php">Logout</a></h3>

<div style="margin-left:28%; margin-top: 10%; position:absolute; ">
	<legend>Search student</legend>
	<form method='post'>
		<label>Standard</label>
		<input type="number" name="std" required>
		<label>Name</label>
		<input type="text" name="name" required>
		<input type="submit" name="submit" value="search" class="btn btn-primary btn-sm">
	</form>



<?php
	include('../footer.php');
	include('../dbcon.php');

	if(isset($_POST['submit'])) {

		$name = $_POST['name'];
		$std = $_POST['std'];

		$query = " SELECT * FROM `student` WHERE `std` = '$std' and `name` LIKE '%$name%' ";

		$run = mysqli_query($con,$query);

		if($run) {
			if(mysqli_num_rows($run)>0) {
			?>
				<br>
				<table class="table">
					<tr>
						<th>Sr.no.</th>
						<th>Name</th>
						<th>Roll no.</th>
						<th>Standard</th>
						<th>Email</th>
						<th>Image</th>
						<th></th>
					</tr>

					<?php
						$count = 0;
						while($data = mysqli_fetch_assoc($run)){
							$count++;
					?>
					<tr>
						<td><?php echo $count ?> </td>
						<td><?php echo $data['name'] ?> </td>
						<td><?php echo $data['roll'] ?> </td>
						<td><?php echo $data['std'] ?> </td>
						<td><?php echo $data['email'] ?> </td>
						<td><img src="../dataimg/<?php echo $data['image'] ?>" alt="no image" style="width:100px;height:100px;"></td>
						<td><a href="updateform.php?sid=<?php echo $data['id'] ?>">Edit</a></td>
					</tr>
				
				
			<?php
				}
			?>
			</table>
			</div>
			<?php
				
			}
			else{
				echo "<br><h3> No data found </h3>";
			}
		}
	}


?>