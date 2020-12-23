<?php
	include 'include2/session.php';

	if(isset($_POST['signup'])){
	
		$student_username = $_POST['student_username'];
		$firstname = $_POST['firstname'];
		$lastname= $_POST['lastname'];
		$emaill = $_POST['emaill'];
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		$student_pass=$_POST['student_pass'];
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
		
		$sql = "INSERT INTO students (id, student_username ,student_pass,firstname,lastname, emaill, photo, created_on) VALUES ('$id','$student_username' ,'$student_pass','$firstname', '$lastname', '$emaill', '$filename', NOW())";
		$query3 = mysqli_query($conn, $sql);
		if($query3){
			$error = true;
			echo "
			<script>
			alert('successful');
			</script>
		";
		}
		else {
			echo "
			<script>
			alert('Unsuccessful');
			</script>
		";
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: login.php');
?>