<?php

	session_start();

	if(!isset($_SESSION['uid'])) {

		header("location:../login.php");

	}
	
	include('../header.php');
	include('../dbcon.php');

	$sid = $_GET['sid'];
	$qry = " SELECT * FROM `student` WHERE `id` = '$sid' ";
	$run = mysqli_query($con,$qry);
	$data = mysqli_fetch_assoc($run);


?>

<h3 style="float:left;"><a href="admindash.php">Back To Admin Dashbord</a></h3>
<h3 style="float: right; margin-right: 10px;"><a href="../logout.php">Logout</a></h3>

<div style="width:20%; margin-left:40%; margin-top: 10%; position: absolute;" >
	<legend>Add Student Data</legend>
<form method="post"  enctype="multipart/form-data">


	<label>Name</label>
	<input type="text" name="name" value="<?php echo $data['name'] ?>" class="form-control" required>

	<label>Roll No.</label>
	<input type="number" name="roll" value="<?php echo $data['roll'] ?>" class="form-control" required>

	<label>Standard</label>
	<input type="number" name="std" value="<?php echo $data['std'] ?>" class="form-control" required>

	<label>email</label>
	<input type="email" name="email" value="<?php echo $data['email'] ?>" class="form-control" required>

	<label>Image</label>
	<input type="file" name="image" class="form-control" required><br>

	<input type="submit" name="submit" value="submit" class="btn btn-success btn-sm">

	
</form>
</div>


<?php
	include('../footer.php');

	if(isset($_POST['submit'])) {

	$name = $_POST['name'];
	$roll = $_POST['roll'];
	$std = $_POST['std'];
	$email = $_POST['email'];
	$image_name = $_FILES['image']['name'];
	$temp_name = $_FILES['image']['tmp_name'];

	move_uploaded_file($temp_name, '../dataimg/'.$image_name);

	$query = " UPDATE `student` SET `name`='$name',`roll`='$roll',`std`='$std',`email`='$email',`image`='$image_name' WHERE `id` = '$sid' ";
	
	$run = mysqli_query($con,$query);
	
	if($run) {
		?>
				<script > alert('Data successfully updated'); </script>


		<?php
		header("Refresh:0");

	}
}



?>