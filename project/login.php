<?php
	include("dbcon.php");
	session_start();

	if(isset($_SESSION['uid'])) {

		header("location:admin/admindash.php");

	}
	include('header.php');
?>
<h3 style="float: left;"><a href="./">Back To Home Page</a></h3>

	<div style="width:20%; margin-left: 40%; top:20%; position: absolute;">
		<h1>Admin Login</h1>
	<form method="post">

		<label>Username</label>
		<input type="text" name="uname" class="form-control">
		<label>Password</label>
		<input type="Password" name="passwd" class="form-control"><br>
		<input type="submit" name="submit" value="login" class="btn btn-primary btn-sm">
		
	</form>
	</div>


<?php

	include('footer.php');
?>

<?php

	if(isset($_POST['submit'])){

		$username = $_POST['uname'];
		$password = $_POST['passwd'];

		$query = "SELECT * FROM `admin` WHERE `username` = '$username' and `password` = '$password'";
		$run = mysqli_query($con,$query);

		if($run) {
			$data = mysqli_fetch_all($run);
			$_SESSION['uid'] = $data[0][0];
			$row = mysqli_num_rows($run);

			if($row < 1) {
				?>

				<script>alert("Username and password not matched");</script>

				<?php
			}
			else {
				header('location:admin/admindash.php');
			}
		}


	}


?>