<?php
	include 'includes/session.php';
	
	
	if(isset($_POST['return'])){
    
	  $student_id= $_POST['student_id'];
	  $book_id=$_POST['book_id'];
	  $date_return= $_POST['date_return'];
	  $sql2="SELECT *FROM borrow";
	  $query1 = $conn->query($sql2);
	  while($row = $query1->fetch_assoc()){
	  if(($row['book_id']== $book_id) &&  ($row['student_id']== $student_id) && ($row['status']==1) && ($date_return >$row['date_borrow'] )){
      
    $sql = "INSERT INTO returned (student_id, book_id, date_return) VALUES ('$student_id', '$book_id', '$date_return')";
	$query3 = mysqli_query($conn, $sql);
	
	if($query3=true){
	$sql4="UPDATE borrow SET status =0 WHERE book_id= $book_id  AND student_id=$student_id" ;
	$query4= mysqli_query($conn, $sql4);
	$sql1= "UPDATE books SET quality= quality+1 WHERE id= $book_id " ;
	$query= mysqli_query($conn, $sql1);
    
	if($query = true && $query4=true ){
	  $error = true;
	  $_SESSION['success'] = ' Returned successfully';
     }
	 else {
		$_SESSION['error'] = 'Error!ko them vao books ';
	}
	}
	else {
		$_SESSION['error'] = 'Error! not connect!';
	}
	  
	  }
	  else{$_SESSION['error'] = 'Error! Not student and book!'; }




	}
}
					
else{
		$_SESSION['error'] = 'Error!not session';
	}		
		
header('location:return.php');

?>