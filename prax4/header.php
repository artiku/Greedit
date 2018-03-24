<?php
	session_start();
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Griffin's Ravine</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<!-- Icon -->
		<link rel="icon" type="image/png" sizes="32x32" href="../griffin_icon(1).png">
		<!-- Custom fonts for this template -->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

		<!-- Custom css -->
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body>
		<!-- Navigation -->
		<?php 
			include 'login.php'; 
		?>
		<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		  <div class="container">
			<a class="navbar-brand" href="index.php">Griffin's Lair</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  Menu
			  <i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
			  <ul class="navbar-nav mr-auto">
				<li class="nav-item">
				  <a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="index.php">Trending</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="index.php">Fresh</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="index.php">Top</a>
				</li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			  <?php
				if (isset($_SESSION['user_nickname'])) {
					$user = $_SESSION['user_nickname'];
					echo '<li class="nav-item">
						  <a href="#" class="nav-link">
						  <i class="fa fa-user" aria-hidden="true"></i> Logged as '.$user.'</a>
						</li>
						<li class="nav-item">
						  <a href="newpost.php" class="nav-link">
						  <i class="fa fa-plus" aria-hidden="true"></i> New Post</a>
						</li>
						<li class="nav-item">
						  <a href="php/logout.php" class="nav-link">
						  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
						</li>';
				} else {
					echo '
						<li class="nav-item">
						  <a href="#" class="nav-link" role="button" data-toggle="modal" data-target="#signup-modal">
						  <i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a>
						</li>
						<li class="nav-item">
						  <a href="#" class="nav-link" role="button" data-toggle="modal" data-target="#login-modal">
						  <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
						</li>';
				}
				?>
			  </ul>
			</div>
		  </div>
		</nav>
		
		<!-- Page Header -->
		<header class="masthead" style="background-image: url('img/background-image.jpg')">
		  <div class="overlay"></div>
		  <div class="container">
			<div class="row">
			  <div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
				  <h1>Greedit</h1>
				  <span class="subheading">Under construction!</span>
				</div>
			  </div>
			</div>
		  </div>
		</header>
