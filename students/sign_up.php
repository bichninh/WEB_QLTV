<?php
  	session_start();
?>
<!DOCTYPE html>
<html>
<?php include 'include2/header.php'; ?>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <b>Library Management</b>
      </div>

      <div class="login-box-body">
         <p class="login-logo">SIGN UP</p>

         <form class="form-horizontal" method="POST" action="registion.php">
            <div class="form-group has-feedback">
               <label for="firstname" class="col-sm-3 control-label">Username</label>

               <input type="text" class="form-control" name="student_username" placeholder="Username">

            </div>
            <div class="form-group has-feedback">
               <label for="firstname" class="col-sm-3 control-label">FirstName</label>
               <input type="text" class="form-control" name="firstname" placeholder="  firstname">

            </div>
            <div class="form-group has-feedback">
               <label for="firstname" class="col-sm-3 control-label">LastName</label>
               <input type="text" class="form-control" name="lastname" placeholder=" lastname">

            </div>
            <div class="form-group has-feedback">
               <label for="firstname" class="col-sm-3 control-label"> Email</label>
               <input type="text" class="form-control" name="emaill" placeholder=" email">

            </div>

            <div class="form-group has-feedback">
               <label for="firstname" class="col-sm-3 control-label">Password</label>
               <input type="password" class="form-control" name="student_pass" placeholder=" Password">

            </div>
            <div class="form-group has-feedback">
               <label for="firstname" class="col-sm-3 control-label">Photo</label>
               <input type="file" name="photo" placeholder=" photo">

            </div>
            <div class="row">
               <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-flat" name="signup"><i class="fa fa-save"></i> Sign Up</button>
               </div>
               <?php
               if (isset($_SESSION['error'])) {
                  echo "
                  <br/>
                 <div class='callout callout-danger text-center mt20'>
                 
			  		<p>" . $_SESSION['error'] . "</p> 
			  	      </div>";
                  unset($_SESSION['error']);
               }
               ?>
            </div>
         </form>
      </div>

   </div>

   <?php include 'include2/scripts.php' ?>



</body>

</html>