<?php
	
	session_start();

	require_once('base/config.php');

		if (isset($_SESSION['loginhoicee'])) {
			header('location:profile.php');

			die();
		}


	if (isset($_POST['register'])) {
		
		$error = array();

	
		$fullName = $_POST['fullname'];
		$nickName = $_POST['nickname'];
		$age = $_POST['age'];
		$fatherName = $_POST['fathername'];
		$motherName = $_POST['mothername'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];



		// Full Name
		if ($fullName == NULL) {
			$error['fullname'] = "Full Name feld is blank";
		}

		// Nick Name
		if ($nickName == NULL) {
			$error['nickname'] = "Nick Name feld is blank";
		}

		// Age
		if ($age == NULL) {
			$error['age'] = "Age feld is blank";
		}

		// Fathers name
		if ($fatherName == NULL) {
			$error['fathername'] = "Father's Name feld is blank";
		}

		// Mother Name
		if ($motherName == NULL) {
			$error['mothername'] = "Mother's Name feld is blank";
		}

		// email
		if ($email == NULL) {
			$error['email'] = "email feld is blank";
		}

		
		// password
		if ($password == NULL) {
			$error['password'] = "Password feld is blank";
		}
		elseif (strlen($password) <= 8) {
			$error['password'] = "Password must be 8(eight) character";
		}


		// re-password
		if ($repassword == NULL) {
			$error['repassword'] = "Re-password feld is blank";
		}
		elseif ($repassword != $password) {
			$error['repassword'] = "Confirm password doesn't match! ";
		}

		// is email taken
		$query = mysqli_query($database_connection, "SELECT * FROM student WHERE email = '$email'");
		
		if (mysqli_num_rows($query) > 0) {
			$error['email'] = "Email already taken";
		}else {

			if (count($error) === 0) {

				$query = mysqli_query($database_connection, "INSERT INTO student (fullname, nickname, age, fathername, mothername, email , password ) VALUES ('$fullName', '$nickName', '$age','$fatherName', '$motherName', '$email', '$password' ) ");

				if ($query) {
					$success = "you have been registerd. please <a href='login.php'> log in </a>";
				}
				
			}
		}
	
		
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reginster Page</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="middle">
		<form action="" method="POST">
			<h1>Registration</h1>
			<!-- Input User Full Name -->
			<label for="fullname">Full Name :</label><br>
			<input type="text" name="fullname" id="fullname">	<br>
				<div class="error">
					<?php
						if (isset($error['fullname'])) {
							echo $error['fullname'];
						}
					?> 
				</div>
			<br>
			
			<!-- input user nick name -->
			<label for="nickname">Nick Name :</label><br>
			<input type="text" name="nickname" id="nickname"> <br>
				<div class="error">
					<?php
						if (isset($error['nickname'])) {
							echo $error['nickname'];
						}
					?> 
				</div>
			<br>

			<!-- input user age -->
			<label for="age">Age :</label><br>
			<input type="text" name="age" id="age"> <br>
				<div class="error">
					<?php
						if (isset($error['age'])) {
							echo $error['age'];
						}
					?> 
				</div>
			<br>

			<!-- input father's name -->
			<label for="fathername">Father's Name :</label><br>
			<input type="text" name="fathername" id="fathername"> <br>
				<div class="error">
					<?php
						if (isset($error['fathername'])) {
							echo $error['fathername'];
						}
					?> 
				</div>
			<br>

			<!-- input mother name -->
			<label for="mothername">Mother's Name :</label><br>
			<input type="text" name="mothername" id="mothername"> <br>
				<div class="error">
					<?php
						if (isset($error['mothername'])) {
							echo $error['mothername'];
						}
					?> 
				</div>
			<br>


			<!-- input email address -->
			<label for="email">Email Address :</label><br>
			<input type="email" name="email" id="email"> <br>
				<div class="error">
					<?php
						if (isset($error['email'])) {
							echo $error['email'];
						}
					?> 
				</div>
			<br>


			<!-- input password -->
			<label for="password">Password :</label><br>
			<input type="password" name="password" id="password"> <br>
				<div class="error">
					<?php
						if (isset($error['password'])) {
							echo $error['password'];
						}
					?> 
				</div>
			<br>

			<!-- input re-password -->
			<label for="repassword">Confirm Password :</label><br>
			<input type="password" name="repassword" id="repassword"> <br>
				<div class="error">
					<?php
						if (isset($error['repassword'])) {
							echo $error['repassword'];
						}
					?> 
				</div>
			<br>

			<!-- submit -->
			<input type="submit" value="Register" name="register">

		</form>

		<div class="success">
			<?php
				if (isset($success)) {
					echo $success;
				}
			?> 
		</div>

		<p>Already have an account? Please <a href="login.php">Log In.</a></p>
	</div>
</body>
</html>