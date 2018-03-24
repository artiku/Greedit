<?php

	include 'db_connect.php';

	//echo " and input register_username: ";
	//echo $_REQUEST['register_username'];

	//$username = isset($_POST['register_username']) ? $_POST['register_username'] : null;
	
	//echo $username;
	if (isset($_POST['submit'])) {
		
		include 'db_connect.php';
		
		$register_username = mysqli_real_escape_string($con, $_POST['register_username']);
		$register_email = mysqli_real_escape_string($con, $_POST['register_email']);
		$register_password = mysqli_real_escape_string($con, $_POST['register_password']);
		
		if (empty($register_username) || empty($register_email) || empty(register_password)) {
			header("Location: ../index.php?signup=field_was_empty");
		}  else {
			if (!preg_match("/^[a-zA-Z0-9]*$/", $register_username) || !preg_match("/^[a-zA-Z0-9]*$/", $register_password)) {
				header("Location: ../index.php?signup=pass_or_user_incorrect");
			} else {
				if (!filter_var($register_email, FILTER_VALIDATE_EMAIL)) { 
					header("Location: ../index.php?signup=email_incorrect");
				} else {
					$sql = "SELECT * FROM 163940_users WHERE user_nickname='".$register_username."';";
					$result = mysqli_query($con, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						header("Location: ../index.php?signup=username_already_registered");
					} else {

						$hashed_password = password_hash($register_password, PASSWORD_DEFAULT);
						$sql = "INSERT INTO 163940_users (user_nickname, user_email, user_password) VALUES ('".$register_username."', '".$register_email."', '".$hashed_password."');";
						$result = mysqli_query($con, $sql);
						header("Location: ../index.php?signup=registered");
					}
				}
			}
		}
	} else {
		header("Location: ../index.php");
	}
?>