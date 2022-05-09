<?php

	session_start();

	if (!isset($_SESSION['loginhoicee'])) {
		header('location: login.php');
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>my profile</title>
</head>
<body>
	<h1>Welcome Home</h1>

	see your member. <a href="members.php">click here</a>

		<br><br><br>

			<a href="logout.php">Logout</a>



</body>
</html>