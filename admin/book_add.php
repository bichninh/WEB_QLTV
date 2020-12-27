<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$quality= $_POST['quality'];
		$publisher = $_POST['publisher'];
		$pub_date = $_POST['pub_date'];
        $sql = "SELECT isbn from books where isbn = $isbn";
		$queryCheck = mysqli_query($conn, $sql);
		if(!isset($queryCheck)){
		$sql = "INSERT INTO books (isbn, category_id, title, author, quality,publisher, publish_date) VALUES ('$isbn', '$category', '$title', '$author', '$quality','$publisher', '$pub_date')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Book added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else {  	$_SESSION['error'] = 'Book exited!';  header('location: book.php'); }
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: book.php');

?>