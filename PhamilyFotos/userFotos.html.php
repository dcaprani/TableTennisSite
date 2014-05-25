<?php include_once $_SERVER['DOCUMENT_ROOT'] .
	'/includesPF/helpers.inc.php'; ?>
<!DOCTYPE html>
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
	</head>
	<body>
		<div id = "content"></div>			
		<div class="container">
			<div id = "welcome">
				<h1>Derek's Fotos</h1>
			</div>
						<header>
			
				<h1>Photo Booth Strips</h1>
				<h2><strong>Scroll with your mousewheel or finger</strong></h2>
				
				<div class="support-note"><!-- let's check browser support with modernizr -->
					<!--span class="no-cssanimations">CSS animations are not supported in your browser</span-->
					<span class="no-csstransforms">CSS transforms are not supported in your browser</span>
					<!--span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span-->
					<!--span class="no-csstransitions">CSS transitions are not supported in your browser</span-->
					<span class="no-generatedcontent">CSS generated content is not supported in your browser</span>
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				
			</header>
			
						<section id="main" class="main">
				
				<div class="pb-wrapper pb-wrapper-1">
					<div class="pb-scroll">
						<ul class="pb-strip">
							<?php foreach ($Fotos as $Foto): ?>
								<?php if ($Foto['albumId'] == 1): ?>
								<li><a href="images/large/<?php htmlout($Foto['FotoName']); ?>" rel="lightbox[album1]" title="Spring"><img src="images/small/<?php htmlout($Foto['FotoName']); ?>.jpg" /></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
						</ul>
					</div>
					<h3 class="pb-title">You only live once, but if you do it right, once is enough.</h3>
				</div>
				
				<div class="pb-wrapper pb-wrapper-2">
					<div class="pb-scroll">
						<ul class="pb-strip">
							<?php foreach ($Fotos as $Foto): ?>
								<?php if ($Foto['albumId'] == 2): ?>
								<li><a href="images/large/<?php htmlout($Foto['FotoName']); ?>.jpg" rel="lightbox[album2]" title="Spring"><img src="images/small/<?php htmlout($Foto['FotoName']); ?>.jpg" /></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
						
						</ul>
					</div>	
					<h3 class="pb-title">Morph's Magical Moments</h3>
				</div>
				
				<div class="pb-wrapper pb-wrapper-3">
					<div class="pb-scroll">
						<ul class="pb-strip">
							<?php foreach ($Fotos as $Foto): ?>
								<?php if ($Foto['albumId'] == 3): ?>
								<li><a href="images/large/<?php htmlout($Foto['FotoName']); ?>.jpg" rel="lightbox[album3]" title="Spring"><img src="images/small/<?php htmlout($Foto['FotoName']); ?>.jpg" /></a></li>
								<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
					<h3 class="pb-title">Holiday snaps & landscapes</h3>
				</div>
				
			</section>
        </div>
			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger" ><span>Menu</span></a>
				<ul>
					<li><a href="loadzaFotos.html"  class="bt-icon icon-zoom">Zoom</a></li>
					<li><a href="UserPhotos.html" class="bt-icon icon-refresh">Refresh</a></li>
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