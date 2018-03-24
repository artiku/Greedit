<?php

	session_start();

	if (isset($_POST['signin_submit'])) {
		
		include 'db_connect.php';

		$login_username = mysqli_real_escape_string($con, $_POST["login_username"]);
		$login_password = mysqli_real_escape_string($con, $_POST["login_password"]);
		
		if (empty($login_username) || empty($login_password)) {
			header("Location: ../index.php?login=field_empty");
		} else {
			$sql = "SELECT * from 163940_users WHERE `user_nickname`='".$login_username."';";
			
			$result = mysqli_query($con, $sql);
			$resultCheck = mysqli_num_rows($result);

			if ($resultCheck < 1) {
				header("Location: ../index.php?login=unregistered_user");
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					$hashed_passwork_verify = password_verify($login_password, $row['user_password']);
					if ($hashed_passwork_verify == false) {
						header("Location: ../index.php?login=wrong_password");
					} else if ($hashed_passwork_verify == true) {
						// Log in the user here.
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['user_nickname'] = $row['user_nickname'];
						$_SESSION['user_email'] = $row['user_email'];
						header("Location: ../index.php?login=logged_in");
					}
				}	
			}
		}
	 
	} else {
		header("Location: ../index.php?login=error");
	}

?>