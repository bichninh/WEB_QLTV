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
		$sql = "SELECT *from students ";
		$query1 = mysqli_query($conn, $sql);
		$count = 0;
		while($row = $query1->fetch_assoc()){
		
        if( $row['student_username'] == $student_username ){
			$count =$count +1;
		}
	}

	if($count == 0)
	{
		$sql1 = "INSERT INTO students (id, student_username ,firstname,lastname, emaill, photo, created_on) VALUES ('$id','$student_username' ,'$firstname', '$lastname', '$emaill', '$filename', NOW())";
			$query = mysqli_query($conn, $sql1);
			if($query){
				$error = true;
				$_SESSION['success'] = 'add student successful!';
			
			}
			else{
				
				$_SESSION['error'] = $conn->error;
			
			}
		
}
if($count !=0)   $_SESSION['error'] = 'student exited!';
	
	header('location: student.php');
}

	
?>
