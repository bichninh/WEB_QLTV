<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$student_username = $_POST['student_username'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$emaill = $_POST['emaill'];

		$sql = "UPDATE students SET student_username= '$student_username' ,firstname = '$firstname', lastname = '$lastname', emaill = '$emaill' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:student.php');

?>