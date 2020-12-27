<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$sql = "SELECT  from category where name = $name";
		$queryCheck = mysqli_query($conn, $sql);
		if(!isset($queryCheck)){
		$sql = "INSERT INTO category (name) VALUES ('$name')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Category added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else { $_SESSION['error'] = 'Category exited!';}
	}	

	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: category.php');

?>