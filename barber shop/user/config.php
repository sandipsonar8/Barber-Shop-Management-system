<?php 
 $conn = new mysqli("localhost","root","","barbershop");
 if($conn->connect_error){
 	die("Connection Failed !".$conn->connect_error);
 	
 }
  ?>