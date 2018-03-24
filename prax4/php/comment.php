<?php

session_start();

if (isset($_POST['post_id'])) {
	$id = $_POST['post_id'];
} else {
	header("Location: ../index.php?submitt=here");
	exit();
}


if (isset($_POST['submit'])) {

	include 'db_connect.php';

	if (isset($_SESSION["user_nickname"])) {
		$author = $_SESSION["user_nickname"];
		$comment = mysqli_real_escape_string($con, $_POST['comment']);
		$datestamp = date("F j Y H:i:s");

		if (empty($comment)) {
			header("Location: ../post.php?id=".$id);
			exit();
		}

		$sql = "INSERT INTO `163940_comments`(`comment_author`, `comment_post`, `comment_body`, `comment_datestamp`) VALUES ('".$author."', ".$id.", '".$comment."', '".$datestamp."');";

		$result = mysqli_query($con, $sql);

		header("Location: ../post.php?id=".$id);

	} else {
		header("Location: ../post.php?id=".$id);
	}


} else {
	header("Location: ../index.php?submitt=nothere");
}