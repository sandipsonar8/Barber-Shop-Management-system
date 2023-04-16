<?php 
	session_start();
	$uid=$_SESSION['user'];
	require 'config.php';

	

	if(isset($_GET['bid'])){
		$bid = $_GET['bid'];
        $status="accepted";

		$stmt = "UPDATE booking SET status='$status' WHERE bid='$bid'";
        $d=mysqli_query($conn,$stmt);
        

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = '!!! Booking Accepted !!! ';
		header('location:acceptbooking.php');
	}


 ?>	  