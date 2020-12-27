<?php include 'include2/session.php'; ?>
<?php
  $catid = 0;
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE books.category_id = '.$catid;
  }

?>
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
        Book List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Books</li>
        <li class="active">Book List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
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
              
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <label>Category: </label>
                    <select class="form-control input-sm" id="select_category">
                      <option value="0">ALL</option>
                      <?php
                        $sql = "SELECT * FROM category";
                        $query = $conn->query($sql);
                        while($catrow = $query->fetch_assoc()){
                          $selected = ($catid == $catrow['id']) ? " selected" : "";
                          echo "
                            <option value='".$catrow['id']."' ".$selected.">".$catrow['name']."</option>
                          ";
                        }
                      ?>
                    </select>
                    
                  </div>
                </form>
              </div>
            </div>
            <hr>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Category</th>
                  <th>Book ID</th>
                  <th>ISBN</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Quality</th>
                  <th>Publisher</th>
                  
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT *, books.id AS bookid FROM books LEFT JOIN category ON category.id=books.category_id $where";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      
                      echo "
                        <tr>
                          <td>".$row['name']."</td>
                          <td>".$row['bookid']."</td>
                          <td>".$row['isbn']."</td>
                          <td>".$row['title']."</td>
                          <td>".$row['author']."</td>
                          <td>".$row['quality']."</td>
                          <td>".$row['publisher']."</td>
                          
                          <td>
                            <button class='btn btn-success btn-sm borrow btn-flat' data-id='".$row['bookid']."'><i class='fa fa-borrow'></i> Borrow </button>
                            
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
    
  <?php include 'include2/footer.php'; ?>
  <?php include 'include2/borrow_modal.php'; ?>
 

  
</div>
<?php include 'include2/scripts.php'; ?>
<script>
$(function(){
  $('#select_category').change(function(){
    var value = $(this).val();
    if(value == 0){
      window.location = 'book.php';
    }
    else{
      window.location = 'book.php?category='+value;
    }
  });

  $(document).on('click', '.borrow', function(e){
    e.preventDefault();
    $('#borrow').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
 
  
});


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'book_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.bookid').val(response.bookid);
      $('#edit_isbn').val(response.isbn);
      $('#edit_title').val(response.title);
      $('#catselect').val(response.category_id).html(response.name);
      $('#edit_author').val(response.author);
      $('#edit_publisher').val(response.publisher);
      $('#datepicker_edit').val(response.publish_date);
      $('#del_book').html(response.title);
    }
  });
  $.ajax({
    type: 'POST',
    url: 'borrow_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.dkborrowid').val(response.dkborrowid);
     
      $('#edit_1').val(response.student_id);
      $('#edit_2').val(response.book_id);
      $('#edit_date').val(response.date_borrow);
     
    }
  });
  $.ajax({
    type: 'POST',
    url: 'return_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.returnid').val(response.returnid);
     
      $('#catselect_1').val(response.student_id);
      $('#catselect_2').val(response.book_id);
      $('#edit_date').val(response.date_return);
     
    }
  });
  
}
</script>
</body>
</html>
