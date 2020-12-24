<!-- Borrow -->
<div class="modal fade" id="borrow">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Borrow Books</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="book_borrow.php">
				<div class="form-group">
                    <label for=" student_id" class="col-sm-3 control-label">Students ID</label>

                    <div class="col-sm-9">
						
                      <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $user['id']; ?>">
                
                </div>
          	</div>
			  <div class="form-group">
                    <label for=" book_id" class="col-sm-3 control-label">Book ID</label>

                    <div class="col-sm-9">
						
                      <input type="text" class="form-control" id="book_id" name="book_id" require>
                
                </div>
          	</div>
                <div class="form-group">
                    <label for="date_borrow" class="col-sm-3 control-label">Date Borrow</label>

                    <div class="col-sm-9">
						<div class= "date">
                      <input type="text" class="form-control" id="date_borrow" name="date_borrow" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="borrow"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>
