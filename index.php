<?php session_start(); ?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title> Videotheek</title>
      
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link href="assets/css/animate-custom.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    
    
    
  </head>



  <body data-target="#navbar-main">
		<header class="clearfix">
			<?php echo $_SERVER['SERVER_ADDR'];
            include("header.php");?>
		</header>
		<div class="container">
			<?php include("redirect.php"); ?>
	  </div>

	

	<div><br><br><br><br><br><br><br><br><br><br><br><p></p></div>
  </body>
	  	
		<footer>
			<?php include("footer.php"); ?>
			<script src="assets/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
			<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/js/retina.js"></script>
			<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
			<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
			<script type="text/javascript" src="assets/js/jquery-func.js"></script>
		</footer>
</html>
