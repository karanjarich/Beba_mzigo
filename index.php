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
          <style>body{background-image:url("car.jpg");}</style>
      </head>  
<body>
<?php include'main_header.php'?>
		 <div class="container" style="width:30%;">  
		  <h3 align="">Welcome To Beba Mzigo</h3><br />  
				<form method="POST" action="login.php">
				Username: <input type="text" name="username" class="form-control" required>
				<div style="height: 10px;"></div>		
				Password: <input type="password" name="password" class="form-control" required> 
				<div style="height: 10px;"></div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                
				</form>
				<div style="height: 15px;"></div>
				<div style="color: red; font-size: 15px;">
					<center>
			<?php
				
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
<?php// include('script.php'); ?>
</body>
</html>