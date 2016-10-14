<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<br>
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
    
    <script src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/modernizr.custom.js"></script>
    
  </head>



  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
		<header class="clearfix">
			<?php echo $_SERVER['SERVER_ADDR'];
            include("header.php");?>
		</header>
		<div class="container">
		
<?php
	require("./classes/VideoClass.php");
   

  $query = "SELECT film.id, film.naam, film.omschrijving, film.acteur, film.hoes ,film.genre, film.hoes, film.verhuurbaarAantal FROM film WHERE id= '".$_GET['id']."'";
    $film = VideoClass::find_by_sql($query);
  	
?>
                
                        <h1><?php echo $film[0]->getNaam(); ?></h1>
                        <p><?php echo $film[0]->getOmschrijving(); ?></p>
					<button type="submit" class="btn btn-default" ><a  href="huurpagina.php?id=<?php echo $film[0]->getId();?>">Huren</a></button>
		</div>		
		<footer>
			<?php include("footer.php"); ?>
		</footer>	

	

	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/retina.js"></script>
	<script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="assets/js/smoothscroll.js"></script>
	<script type="text/javascript" src="assets/js/jquery-func.js"></script>
  </body>
</html>

	  	

    

