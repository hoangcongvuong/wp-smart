<?php 
	$con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart') or die('die');
	//This file create new table, create fields and rows of table
	$sqli = "CREATE TABLE ".$_POST['name']."(id INT PRIMARY KEY AUTO_INCREMENT ,label CHAR(50) NOT NULL,content TEXT)";
	if(mysqli_query($con, $sqli)) echo 'Added Table';
	else echo 'Error';
?>
