<?php 
	session_start();
	require 'config.php';
	


	if(isset($_POST['user'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		
		if($user!="" AND $pass!=""){

			$stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
			$stmt->bind_param("ss",$user,$pass);
			$stmt->execute();
			$res = $stmt->get_result();
			$r = $res->fetch_assoc();
			

			if($r!=0){
				$uid="admin";
				$_SESSION['user']=$uid;

				if($_SESSION['user']!=""){

				echo '<div class="alert alert-success alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Login Sucessfull !!!</strong>
					
					</div>';
					?>
					<script>
					alert("Login Successfull");
					window.location.href = "admin-panel.php";
					</script>
					<?php
				}
			
			
		}
		else{

			echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Please Enter a vaild Username And Password </strong>
					</div>';	
		}

	}
	else{
		echo '<div class="alert alert-danger alert-dismissible mt-2">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Please Enter a vaild Username And Password </strong>
					</div>';	
	}

}
		

	

 ?>