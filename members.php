<?php
	
	session_start();
	require_once('base/config.php');

	if (!isset($_SESSION['loginhoicee'])) {
		header('location: login.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mambers</title>
	<link rel="stylesheet" href="css/style.css">
</head>
	
	<style>
		table {
			width: 80%;
			margin: 100px auto;
		}
	</style>

<body>
	

	<div class="table">
		<table border="1px">
			
			<tr>
				<th>Full Name</th>
				<th>Nick Name</th>
				<th>Age</th>
				<th>Father's Name</th>
				<th>Mother's Name</th>
				<th>Email</th>
				<th>Password</th>
			</tr>

			


			<?php
				$query = mysqli_query($database_connection, "SELECT * FROM student");

				while ($row = mysqli_fetch_assoc($query)) : ?>

				<tr>
					<td><?php echo $row['fullname']; ?></td>
					<td><?php echo $row['nickname']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<td><?php echo $row['fathername']; ?></td>
					<td><?php echo $row['mothername']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['password']; ?></td>
				</tr>	

			<?php endwhile; ?>

		</table>
	</div>


</body>
</html>