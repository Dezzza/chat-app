<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chat";

  $connection = mysqli_connect($hostname, $username, $password, $dbname);
   if (!$connection) {
     echo "Database connection failed" . mysqli_connect_error();
   }

   function redirect()
 {
	if (!isset($_SESSION['unique_id'])) {
		header('location:auth-login.php');
	 }
 }

 function deleteProvider($value)
 {
	global $result;
	echo $result[$value];
	

 }
 function delete()
 { global $connection;
	extract($_GET);
	if (isset($del)) {
	$user_del=mysqli_query($connection,"DELETE FROM `users` WHERE unique_id='$del'");
	session_destroy();
	header('location:login.php');
	}
 }
?>