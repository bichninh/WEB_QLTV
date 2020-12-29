<?php
	include 'includes/session.php';
	
	if(isset($_POST['Agree'])){
      $sql5= "SELECT *FROM  dkborrow where status1=1" ;
      $query5 = $conn->query($sql5);
      $row5 = $query5->fetch_assoc();
      if($query5){
		$student_id= $row5['student_id'];
		$book_id= $row5['book_id'];
		$dkborrow_id=$row5['dk_id'];

	$sql = "INSERT INTO borrow (student_id, book_id, date_borrow,status) VALUES ($student_id, $book_id, NOW(),1)";
	$query3 = mysqli_query($conn, $sql);
	
	if($query3){
	
		
	$sql1= "UPDATE books SET quality= quality-1 WHERE id= $book_id AND quality > 0 " ;
	$query= mysqli_query($conn, $sql1);
    $sql6= "UPDATE dkborrow SET status1= 0 Where dk_id  = $dkborrow_id " ;
	$query6= mysqli_query($conn, $sql6);
	
	if($query && $query6 ){
	  $error = true;
	  $_SESSION['success'] = ' Borrowed successfully';
     }
	 else {
		$_SESSION['error'] = 'Error1';
	}
	}
	else {
		$_SESSION['error'] = 'Error9';
	}

}
else{
	$_SESSION['error'] = 'Error4!';
}
	}
	
	
	
else{
	$_SESSION['error'] = 'Error3!';
}		
	
					

	
header('location:dkborrow.php');

?>