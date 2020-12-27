<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Signup Borrow Books
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaction</li>
        <li class="active">List signup books</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo"
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
                
            </div>
            ";
          
          unset($_SESSION['error']);
        }

        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Book ID</th>
                  <th>Student ID</th>
                  
                  
                  <th>Date Borrow</th>
                  <th> Status</th>
                  <th> Tool</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *FROM dkborrow LEFT JOIN students ON students.id=dkborrow.student_id LEFT JOIN books ON books.id=dkborrow.book_id ORDER BY date_borrow DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      if($row['status1']== 1){
                        $status = '<span class="label label-danger">notaccessed</span>';
                      }
                      else{
                        $status = '<span class="label label-success">acessed</span>';
                      }
                      
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['book_id']."</td>
                          <td>".$row['student_id']."</td>
                          <td>".$row['date_borrow']."</td>
                          <td>".$status ."</td>
                          <td>
                          <button class='btn btn-success btn-sm Agree btn-flat' data-id='".$row['id']."'><i class='fa fa-Agree'></i> Agree </button>
                          </td>
                         
                        </tr>
                      ";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/dkbook_model.php'; ?>
  
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
 

  $(document).on('click', '.Agree', function(e){
    e.preventDefault();
    $('#Agree').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'dkbook_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('.borrowid').val(response.borrowid);
     
     $('#edit_1').val(response.student_id);
     $('#edit_2').val(response.book_id);
     $('#edit_date').val(response.date_borrow);
    
    }
  });
}


</script>
</body>
</html>
