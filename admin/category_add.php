<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		$sql = "SELECT *from category";
		
		$query1 = mysqli_query($conn, $sql);
		$count = 0;
		while($row = $query1->fetch_assoc()){
		
        if( $row['name'] == $name ){
			$count =$count +1;
		}
	}

	if($count == 0)
	{
		     $sql1 = "INSERT INTO category (name) VALUES ('$name')";
			$query = mysqli_query($conn, $sql1);
			if($query){
				$error = true;
				$_SESSION['success'] = 'add category successful!';
			
			}
			else{
				
				$_SESSION['error'] = $conn->error;
			
			}
		
}
if($count !=0)   $_SESSION['error'] = 'category exited!';
	
	header('location: category.php');
}
?>