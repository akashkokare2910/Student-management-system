
<?php

	session_start();

	if(!isset($_SESSION['uid'])) {

		header("location:../login.php");

	}
	
	include('../header.php');

?>
<h3 style="float: left;"><a href="../">Back To Home Page</a></h3>
<h3 style="float: right; margin-right: 10px;"><a href="../logout.php">Logout</a></h3>
<h1 class="jumbotron" align="center">Welcome to Admin Page</h1>
<div style="margin-left: 30%;">
<table>
	<tr>
		<th>sr.</th>
		<th>Options</th>
	</tr>
	<tr>
		<td>1.</td>
		<td><a href="addstudent.php">Add student</a></td>
	</tr>
	<tr>
		<td>2.</td>
		<td><a href="deleteadmin.php">Delete Student</a></td>
	</tr>
	<tr>
		<td>3.</td>
		<td><a href="updatestudent.php">Update Student</a></td>
	</tr>
</table>
</div>

<?php

	include('../footer.php');
?>