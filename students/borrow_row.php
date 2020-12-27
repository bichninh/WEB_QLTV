<?php 
	include 'include2/session.php';

	if(isset($_POST['id'])){
		$dk_id = $_POST['dk_id'];
		$sql = "SELECT * FROM dkborrow LEFT JOIN books,students ON books.id=dkborrow.book_id AND students.id=dkborrow.student_id WHERE dkborrow.id = '$dk_id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>