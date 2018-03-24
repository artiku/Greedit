<?php

$dbServername = "localhost";
$dbUsername = "confidential";
$dbPassword = "confidential";
$dbName = "confidential";

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>