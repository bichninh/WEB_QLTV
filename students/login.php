<?php
	session_start();
	include 'include2/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM students WHERE student_username = '$username'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
			//if(password_verify($password, $row['password'])){
				$_SESSION['students'] = $row['id'];
			//}
			//else{
				$_SESSION['error'] = 'Incorrect password';
			//}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>