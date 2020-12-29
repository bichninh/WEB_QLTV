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
		$sql = "SELECT *from books";
		
		$query1 = mysqli_query($conn, $sql);
		$count = 0;
		while($row = $query1->fetch_assoc()){
		
        if( $row['isbn'] == $isbn ){
			$count =$count +1;
		}
	}

	if($count == 0)
	{
			$sql1 = "INSERT INTO books (isbn, category_id, title, author, quality,publisher, publish_date) VALUES ('$isbn', '$category', '$title', '$author', '$quality','$publisher', '$pub_date')";
			$query = mysqli_query($conn, $sql1);
			if($query){
				$error = true;
				$_SESSION['success'] = 'add book successful!';
			
			}
			else{
				
				$_SESSION['error'] = $conn->error;
			
			}
		
}
if($count !=0)   $_SESSION['error'] = 'book exited!';
	
	header('location: book.php');
}
?>