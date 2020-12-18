<?php 
	session_start();
	$con = mysqli_connect('127.0.0.1', 'root', '', 'project1');
	$queryy = mysqli_query($con, "SELECT * FROM universities WHERE id='{$_GET["id"]}'");
	$stroka = $queryy->fetch_assoc();
	$name = $stroka['name'];
	$query = mysqli_query($con, "INSERT INTO apllications (univ, user) 
	    VALUES ('{$name}', '{$_SESSION["id"]}')");
	header( 'Location: accountStudent.php');
 ?>