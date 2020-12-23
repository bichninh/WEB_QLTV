<?php 
	include 'include2/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT * FROM borrow LEFT JOIN books,students ON books.id=borrow.book_id AND students.id=borrow.student_id WHERE borrow.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>