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
          <style> 
body {
  background-image:url("car.jpg");
  
}
</style>

      </head>  
<body>
<?php include'main_header.php'?>
	<div class="container-fluid">
        
         <div class="container" style="width:50%;margin-top:10vh">  
		  <h3 align="">Welcome To Beba Mzigo</h3><br /> 
			<form method="POST" action="car_registration.php">
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
					<div class="col-sm-2">
						<label class="control-label modal-label">Number Plate:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="regno" required>
					</div>
					<div class="col-sm-2">
						<label class="control-label modal-label">Model:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="model" required>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Car Type:</label>
					</div>
					<div class="col-sm-3">
						<select name="cabin" id="cabin">
                            <option value="Pick-Up">Pick-Up</option>
                            <option value="2-3 Tons Lorry">2-3 Tons Lorry</option>
                            <option value="4-5 Tons Lorry">4-5 Tons Lorry</option>
                            <option value="6-10 Tons Lorry">6-10 Tons Lorry</option>
                            <option value="12-15 Tons Lorry">12-15 Tons Lorry</option>
                            <option value="20 Ft Trailer">20 Ft Trailer</option>
                            <option value="40 Ft Trailer">40 Ft Trailer</option>
                      </select>
					</div>
                    <div class="col-sm-2">
						<label class="control-label modal-label">Location:</label>
					</div>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="location" required>
					</div>
				</div>
                 <div class="row form-group">
                    <div class="col-sm-3">
                    <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk">Sign Up</span> 
                        </button>
                    </div>
                    <div class="col-sm-9">
                        <label class="control-label modal-label">By clicking "Sign Up", you agree to Beba Mzigo's Terms of Use and acknowledge you have read the Privacy Policy. You also consent to receive calls or SMS messages,Thank you as enjoy our services</label>
					</div>
                    </div>
            </form> 
    </div>
    </div>	
</body>
</html>