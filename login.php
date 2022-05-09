<?php
	session_start();
	require_once('base/functions.php');

	if (isset($_SESSION['loginhoicee'])) {
		header('location:profile.php');

		die();
	}

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		$error = array();

		if ($password == NULL) {
			$error['password'] = "Password Field is empty";
		}	
		
		
		if ($email == NULL) {
			$error['email'] = "Email Field is empty.";
		}

		elseif (email_exists()) {
			
			$pas_query = mysqli_query($database_connection, "SELECT password FROM student WHERE email = '$email'");
			$pas_rows = mysqli_fetch_assoc($pas_query);

			
			if ($password == $pas_rows['password']) {
				
				$_SESSION['loginhoicee'] = "ame login hoicee..";

				header('location: profile.php');
			}
			else {
				$error['password'] = "password doesn't match.";
 			}
		}else {
			$error['email'] = "email doesn't exists in database.";
		}



		
		
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log In</title>
</head>
	<style>
		form {
			width: 500px;
			margin: 50px auto;
			border: 2px solid grey;
			padding: 20px;
		}

		.error {
			color: red;
			font-size: italic;
		}
	</style>
<body>
	
	<form action="" method = "POST">
		<h2>Log In</h2>
		<input type="email" name= "email" placeholder ="Email"><br>
			<div class="error">
				<?php
					if (isset($error['email'])) {
						echo $error['email'];
					}
				?>
			</div>
		<br>
		<input type="password" name= "password" placeholder ="password"><br>
			<div class="error">	
				<?php
					if (isset($error['password'])) {
						echo $error['password'];
					}
				?>
			</div>
		<br>
		<input type="submit" name= "login" value= "Log In"><br><br>
		If you are not registered. Please <a href="register.php">register</a> first.
	</form>

</body>
</html>