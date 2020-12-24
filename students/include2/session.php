<?php
	session_start();
	include 'include2/conn.php';

	if(!isset($_SESSION['students']) || trim($_SESSION['students']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM students WHERE id = '".$_SESSION['students']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>