<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
	
		$student_username = $_POST['student_username'];
		$firstname = $_POST['firstname'];
		$lastname= $_POST['lastname'];
		$emaill = $_POST['emaill'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		//creating studentid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		
		$sql = "INSERT INTO students (id, student_username ,firstname,lastname, emaill, photo, created_on) VALUES ('$id','$student_username' ,'$firstname', '$lastname', '$emaill', '$filename', NOW())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Student added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: student.php');
?>