<?php
	include 'include2/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$username = $_POST['student_username'];
		$password = $_POST['student_pass'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$emaill=$_POST['emaill'];
		$photo = $_FILES['photo']['name'];
		if($curr_password==$user['student_pass']){
			if(!empty($photo)){
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $user['photo'];
			}

			if($password == $user['student_pass']){
				$password = $user['student_pass'];
			}
			

			$sql = "UPDATE students SET student_username = '$username', student_pass = '$password', firstname = '$firstname', lastname = '$lastname',emaill='$emaill' ,photo = '$filename' WHERE id = '".$user['id']."'";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Studnts profile updated successfully';
			}
			else{
				if($return == 'borrow.php' OR $return == 'return.php'){
					if(!isset($_SESSION['error'])){
						$_SESSION['error'] = array();
					}
					$_SESSION['error'][] = $conn->error;
				}
				else{
					$_SESSION['error'] = $conn->error;
				}
				
			}
			
		}
		
		else{
			if($return == 'borrow.php' OR $return == 'return.php'){
				if(!isset($_SESSION['error'])){
					$_SESSION['error'] = array();
				}
				$_SESSION['error'][] = 'Incorrect password';
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}

		}
	}
	else{
		if($return == 'borrow.php' OR $return == 'return.php'){
			if(!isset($_SESSION['error'])){
				$_SESSION['error'] = array();
			}
			$_SESSION['error'][] = 'Fill up required details first';
		}
		else{
			$_SESSION['error'] = 'Fill up required details first';
		}
		
	}

	header('location:'.$return);

?>