<?php
	require_once("config.php");
	
	function email_exists() {

		global $database_connection;
		global $email;

		$query = mysqli_query($database_connection, "SELECT * FROM student WHERE email = '$email'");

		if (mysqli_num_rows($query) == 1 ) {
			return true;
		}
	}



?>