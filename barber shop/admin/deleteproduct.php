<?php 
	session_start();
	$uid=$_SESSION['user'];
	require 'config.php';

	

	if(isset($_GET['remove'])){
		$id = $_GET['remove'];

		$stmt = $conn->prepare("DELETE FROM product WHERE pid=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();

		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Property Deleted ! ';
		header('location:products.php');
	}


 ?>	  