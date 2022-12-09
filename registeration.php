<?php
	session_start();
?>
<!DOCTYPE html>  
 <html>  
      <head>  
           <title> Beba Mzigo | Providing a world class Road Cargo system</title>  
					<!-- Custom fonts for this template-->
		  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

		  <!-- Page level plugin CSS-->
		  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

		  <!-- Custom styles for this template-->
		  <link href="css/sb-admin.css" rel="stylesheet">
          <style>body{ background-image:url("car.jpg");}</style>
      </head>  
<body>
<?php include'main_header.php'?>
	<div class="container-fluid">
        
         <div class="container" style="width:50%;margin-top:10vh">  
		  <h3 align="">Welcome To Beba Mzigo</h3><br /> 
			<form method="POST" action="save_user.php">
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">firstname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="firstname" required>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">lastname:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="lastname" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Mobile number:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="phone" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">password:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="password" required>
					</div>
				</div>
                <div class="row form-group">
                    <div class="col-sm-3">
                    <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk">Sign Up</span> 
                        </button>
                    </div>
                    <div class="col-sm-9">
						<label class="control-label modal-label"><a class="dropdown-item" href="index.php">Do you have an account?<span class="btn btn-success">Login</span></a></label>
					</div>
                    </div>
            </form> 
    </div>
    </div>	
</body>
</html>