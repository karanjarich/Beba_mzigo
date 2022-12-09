<?php
	include('connection_data.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location: index.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		//$fpassword=md5($password);
		
		$query=mysqli_query($conn,"select * from users where username='$fusername' and password='$password'");
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Login Failed, Invalid Input!";
			header('location: index.php');
		}
		else{
			
			$row=mysqli_fetch_array($query);
			if ($row['userlevel']=="admin"){
				$_SESSION['username']=$row['username'];
				$_SESSION['userlevel']="chief";
				?>
				<script>
					window.alert('Login Success, Welcome Admin!');
					window.location.href='dashboard.php';
				</script>
				<?php
			}
			else{
				$_SESSION['username']=$row['username'];
				$_SESSION['userlevel']="junior";
				?>
				<script>
					window.alert('Login Success, Welcome ');
					window.location.href='dashboard.php';
				</script>
				<?php
			}
			
		}
		
		}
	}
?>