<?php

	session_start();

	if (isset($_POST['submit'])) {
	include 'db_connect.php';
	include 'file_upload.php';

	if (!isset($_SESSION["user_nickname"])) {
		header("Location: ../index.php");
		exit();
	}


	$user = $_SESSION["user_nickname"];
	$title = mysqli_real_escape_string($con, $_POST['title']);
	$body = mysqli_real_escape_string($con, $_POST['body']);
	$datestamp = date("F j Y H:i:s");
	$picture;

	if (isset($_FILES["file_to_upload"])) {
		$file_to_upload = $_FILES["file_to_upload"];
		upload_my_file($file_to_upload["name"]);
		$picture = "http://dijkstra.cs.ttu.ee/~artbas/prax4/php/uploads/" . $file_to_upload["name"];
	}


	if (empty($title) || empty($body)) {
		header("Location: ../newpost.php?submited_post=title_or_body_empty");
	} else {

		$sql = "INSERT INTO `163940_posts`(`post_title`, `post_author`, `post_body`, `post_likes`, `post_dislikes`, 
		`post_datestamp`, `post_picture_url`) VALUES ('".$title."', '".$user."', '".$body."', 0, 0, '".$datestamp."', '".$picture."');";
		$result = mysqli_query($con, $sql);


		$sql = "SELECT * FROM 163940_posts WHERE post_title='".$title."' AND post_datestamp='".$datestamp."';";
		$fetched = mysqli_query($con, $sql);
		$post = mysqli_fetch_array($fetched);
		header("Location: ../post.php?id=".$post['post_id']);

		
	}

} else {
	header("Location: ../newpost.php");
}
?>