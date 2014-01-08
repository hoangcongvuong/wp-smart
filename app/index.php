<?php  
	// $con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart');
	$con = mysqli_connect('localhost', 'root', 'congvuong', 'wp-smart') or die('die');
	
?>


<!DOCTYPE html>
<html>
<head>
	<title>Smart Wordpress</title>
	
	<meta charset="utf-8" />
	    
	<link rel="stylesheet" type="text/css" href="css/css.css" />
	
	<script src="js/jquery.min.js"></script>
	<script src="js/js.js"></script>
</head>
<body>
    <div id="wrap">
        <div id="opacity"></div>
    
                
        <div id="wrap-alert">
        	<div id="alert">
        
        	</div>
        </div>
        <div id="action">
        	<div id="wrap-add-table" class="">
        		<div class="action pointer" id="add-table">Add Table</div>
        	</div>
        	
        	<div id="wrap-add-content" class="">
        		<div class="action pointer" id="add-content">Add Content</div>
        	</div>
        	
        	<div id="wrap-get-content" class="">
        		<div class="action pointer" id="get-content">Get Content</div>
        	</div>
        	
        	<div id="wrap-create-themeoptions" class="">
        		<div class="action pointer" id="create-theme-options">Create Theme options</div>
        	</div>
        	
        	<div id="wrap-refresh-content" class="">
        		<div class="pointer action" id="refresh">Refresh</div>
        	</div>
        </div>
        
        <div class="clear"></div>
        
        <div id="popup">
        
        </div>

    </div>
</body>
</html>