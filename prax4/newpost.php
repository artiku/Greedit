<?php
	include 'header.php';

	if (!isset($_SESSION["user_nickname"])) {
		header("Location: index.php");
		exit();
	}

	if (isset($_GET["submit_post"])) {
		echo "<script>alert('".$_GET["submit_post"]."');</script>";
	}
?>

 <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
			<h2>Create a new post:</h2>
			<form class="newpost-form" action="php/newpost.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="title" placeholder="Title">
				<input class="btn btn-default btn-lg" type="file" name="file_to_upload" id="file_to_upload">
				<textarea name="body" rows="8" cols="80" placeholder="Enter text here... 500 chars is the max length"  maxlength="500" id="textarea"></textarea>
				<p id='count' class='text-muted'>Characters left: 500 </p>
				<button class="btn btn-default btn-lg" type="submit" name="submit">Save</button>
			</form>
		</div>
	</div>
</div>

<script>
	document.getElementById('textarea').onkeyup = function () {
		document.getElementById('count').innerHTML = "Characters left: " + (500 - this.value.length);
	}
</script>

<?php
	include 'footer.php';
?>