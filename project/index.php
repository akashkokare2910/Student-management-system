<?php
	include('header.php');
?>

	<h3 style="float: right; margin-right: 10px;"><a href="login.php">Admin Login</a></h3><br><br>
	<h1 align="center" class="jumbotron">Welcome to Student Management System</h1>

	<br>
	<div style="width:20%; margin-left: 30%;">
	<legend>Student Information</legend>
	<form method="post">

		<label>Standerd</label>
		<select name="std" class="form-control" required> 
			<option value="" disabled selected>select class</option>
			<option value="1">1st</option>
			<option value="2">2st</option>
			<option value="3">3st</option>
			<option value="4">4st</option>
			<option value="5">5st</option>
			<option value="6">6st</option>
			<option value="7">7st</option>
			<option value="8">8st</option>
			<option value="9">9st</option>
		</select>

		<label>Roll no.</label>
		<input type="number" name="roll" class="form-control" required><br>

		<input type="submit" name="submit" value="show info" class="btn btn-success btn-sm">
		
	</form>
	</div>

<?php
	include('footer.php');
	include('dbcon.php');

	if(isset($_POST['submit'])) {
		//isset functin is used to check is submit parameter set in post method 
		$roll = $_POST['roll'];
		$std = $_POST['std'];

		$query = " SELECT * FROM `student` WHERE `roll` = '$roll' and `std` = '$std' ";
		$run = mysqli_query($con,$query);
			//mysqli_query function performs a query against a database

		if(mysqli_num_rows($run) > 0) {
			//'mysqli_num_rows' this function is used to count number of rows got from query.
			$data = mysqli_fetch_assoc($run);
				//'mysqli_fetch_assoc' this function Fetch a result row as an associative array
				//Associative arrays are arrays that use named keys that you assign to them.
			?>
			<div style="width: 35%; margin-left:30%;">
				<br>
				<table class="table">
					<legend>Student details</legend>
						
					</thead>
					<tr>
						<td rowspan="4"><img src="dataimg/<?php echo $data['image'] ?>" style="width:200px;height:200px;"></td>
						<th>Name:</th>
						<td><?php echo $data['name']; ?></td>
					</tr>
					<tr>
						<th>Roll no. :</th>
						<td><?php echo $data['roll']; ?></td>
					</tr>
					<tr>
						<th>Standard:</th>
						<td><?php echo $data['std']; ?></td>
					</tr>
					<tr>
						<th>Email:</th>
						<td><?php echo $data['email']; ?></td>
					</tr>
				</table>
				<br><br>
			</div>
			<?php



		}
		else {
			echo "No Student Found.";
		}


	}


?>