<?php 
	$con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart') or die('die');
	$sqli = "DROP TABLE theme_options";
	if(mysqli_query($con, $sqli)) echo 'Dropped Table';
	else echo 'Error';
?>