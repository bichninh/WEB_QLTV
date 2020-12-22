<!-- Return-->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Return Books</b></h4>
          	</div>
          	<div class="modal-body">
            	<form class="form-horizontal" method="POST" action="book_return.php">
				<div class="form-group">
                    <label for=" student_id" class="col-sm-3 control-label">Students ID</label>

                    <div class="col-sm-9">
						
                      <input type="text" class="form-control" id="student_id" name="student_id" require>
                
                </div>
          	</div>
			  <div class="form-group">
                    <label for=" book_id" class="col-sm-3 control-label">Book ID</label>

                    <div class="col-sm-9">
						
                      <input type="text" class="form-control" id="book_id" name="book_id" require>
                
                </div>
          	</div>
                <div class="form-group">
                    <label for="date_return" class="col-sm-3 control-label">Date Return</label>

                    <div class="col-sm-9">
						<div class= "date">
                      <input type="text" class="form-control" id="date_return" name="date_return" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	<button type="submit" class="btn btn-primary btn-flat" name="return"><i class="fa fa-save"></i> Save</button>
            	</form>
          	</div>
        </div>
    </div>
</div>