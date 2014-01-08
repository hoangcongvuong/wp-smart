<?php 
	$con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart') or die('die');
	$vmz = str_replace('<','&lt;',$_POST['content']);
	$vmz1 = str_replace('>','&gt;',$vmz);
	$mysqli = "INSERT INTO ".$_POST['table']."(label, content) VALUES ('".$_POST['label']."','".$vmz1."')";
	$a = mysqli_query($con, $mysqli) or die('die');
	if($a) echo 'Succsess'; else echo  'Error';
?>