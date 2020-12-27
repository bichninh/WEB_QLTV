<?php
	include 'include2/session.php';
	
	
	if(isset($_POST['borrow'])){
      $date_borrow= $_POST['date_borrow'];
	  $student_id= $_POST['student_id'];
	  $book_id=$_POST['book_id'];
	
	  $sql4="SELECT *FROM students where id= '".$_SESSION ['students']."'" ;
	  $query4 = $conn->query($sql4);
	  $row1 = $query4->fetch_assoc();
	  
	  $sql2= "SELECT *FROM books where id= $book_id" ;
	  $query1 = $conn->query($sql2);
	  while($row = $query1->fetch_assoc()){
	  if( $student_id == $row1['id']  ){
	 if($row['quality']>0 ){
 
    $sql = "INSERT INTO dkborrow (student_id, book_id, date_borrow, status1) VALUES ('$student_id', '$book_id', '$date_borrow',1)";
	$query3 = mysqli_query($conn, $sql);
	
	if($query3){
		$error = true;
		 $_SESSION['success'] = ' Borrowed successfully';
     	}
	else {
		$_SESSION['error'] = 'Error1';
	}
}

else{$_SESSION['error'] = 'Error! Quality semply!'; } }
else{$_SESSION['error'] = 'Error! Not ID! ' ;}
   

          

}

	}
	
else{
	$_SESSION['error'] = 'Error!';
}		
	
					

	
header('location:book.php');

?>