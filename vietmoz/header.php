<!DOCTYPE html>
<html>
<head>
    
    
    <?php wp_head() ?>
    
	<base href="<?php echo bloginfo('stylesheet_directory').'/'?>" />
	
	<meta charset="utf-8" />

	<meta name="author" content="VietMoz" />
	<meta name="generator" content="Hoàng Công Vường" />
	<meta name="application-name" content="Thiết kế web VietMoz" />
	
	
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("stylesheet_url"); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo("stylesheet_directory").'/css/css.css'; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo bloginfo("stylesheet_directory").'/css/search.css'; ?>" />
	
	<script src="<?php echo bloginfo('stylesheet_directory').'/js/jquery.min.js' ?>"> </script>
	<script src="<?php echo bloginfo('stylesheet_directory').'/js/js.js' ?>"> </script>
</head>
<body>

<!-- FACEBOOK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<?php 
	$options = get_option('vmz-option');
?>


<div id="header">
    
</div><!-- END #header -->





	

