<?php include_once $_SERVER['DOCUMENT_ROOT'] .
	'/includesPF/helpers.inc.php'; ?>
<!DOCTYPE html>
<!---->
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Fotos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Users Fotos shown in strips" />
        <meta name="keywords" content="Photos, Phamily, Fotos, photo_sharing" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/lightboxDemo.css" />
		<link rel="stylesheet" type="text/css" href="css/lightbox.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="abCss/normalize.css" />
		<link rel="stylesheet" type="text/css" href="abCss/demo.css" />
		<link rel="stylesheet" type="text/css" href="abCss/icons.css" />
		<link rel="stylesheet" type="text/css" href="abCss/style4.css" />
		<script src="script/modernizr.custom.js"></script>		
		<script type="text/javascript" src="script/modernizr.custom.52731.js"></script> 
		<!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {

		$("#slider").change(function() {
		  var slider_value = $("#slider-1").val();

			var images = $('.file-list img'); //caches the query when dom is ready
			var CELL_WIDTH = 5;
			var ASPECT = 1.5;
			var size = (CELL_WIDTH * slider_value / 10) + "%";
			images.animate({width: size, height: size / ASPECT }, 25); 
		});

		});
	</script>	
	</head>
	<body>
		<div id = "content"></div>			
		<div class="container">
			<div id = "newMemWelcome">
				<p><h1>Welcome to Phamily Fotos</h1></p>
				<p><h2>Please begin uploading your own Fotos</h2></p>
			</div>
		<div id = "formHolder">
		<form id = "uploadForm" action="imageUpload.php" method="post"
			 enctype="multipart/form-data">
			 <label class = "uploadText" for="file">Filename:</label>
			 <input class = "uploadText" type="file" name="file" id="file"><br>
			 <input class = "uploadText" type="submit" name="submit" value="Submit">
		 </form>
		</div> 
	
		  </div>
			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger" ><span>Menu</span></a>
				<ul>
					<li><a href="loadzaFotos.html"  class="bt-icon icon-zoom">Zoom</a></li>
					<li><a href="userFotos.php" class="bt-icon icon-refresh">Refresh</a></li>
					<li><a href="#" class="bt-icon icon-lock">Lock</a></li>
					<li><a href="#" class="bt-icon icon-speaker">Sound</a></li>
					<li><a href="index.html" class="bt-icon icon-star">Favorite</a></li>
				</ul>
			</nav>	
	</body>
	<script src="script/classie.js"></script>
	<script src="script/borderMenu.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="script/lightbox.js"></script>
</html>