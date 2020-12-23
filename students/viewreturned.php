<?php include 'include2/session.php'; ?>
<?php include 'include2/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'include2/navbar.php'; ?>
  <?php include 'include2/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Returns Books
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaction</li>
        <li class="active">Return</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-warning"></i> Error!</h4>
                <ul>
                <?php
                  foreach($_SESSION['error'] as $error){
                    echo "
                      <li>".$error."</li>
                    ";
                  }
                ?>
                </ul>
            </div>
          <?php
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
                  
                  
                  <th>Return Borrow</th>
                  
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *FROM returned LEFT JOIN students ON students.id=returned.student_id LEFT JOIN books ON books.id=returned.book_id WHERE students.id='".$_SESSION['students']."' ORDER BY date_return DESC ";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                     
                      
                      echo "
                        <tr>
                          <td class='hidden'></td>
                          <td>".$row['book_id']."</td>
                          <td>".$row['student_id']."</td>
                          <td>".$row['date_return']."</td>
                          
                         
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
    
  <?php include 'include2/footer.php'; ?>
  <?php include 'include2/borrow_modal.php'; ?>
</div>
<?php include 'include2/scripts.php'; ?>

</body>
</html>
