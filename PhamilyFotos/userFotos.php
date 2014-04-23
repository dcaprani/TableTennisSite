<?php
	include_once $_SERVER['DOCUMENT_ROOT'] .
	'/includesPF/magicquotes.inc.php';
	
	require_once $_SERVER['DOCUMENT_ROOT'] . '/includesPF/access.inc.php';
	
	if (!userIsLoggedIn())
	{
		include '../login.html.php';
		exit();
	}
	
	if (!userHasRole('Account Administrator'))
	{
		$error = 'Only Account Administrators may access this page.';
		include '../accessdenied.html.php';
		exit();
	}
	
	// Display author list
	include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
	$result = mysqli_query($link, 'SELECT * FROM Foto');
	if (!$result)
	{
		$error = 'Error fetching Fotos from database!';
		include '../error.html.php';
		exit();
	}
	while ($row = mysqli_fetch_array($result))
	{
		$Fotos[] = array('id' => $row['id'], 'FotoName' => $row['FotoName'], 'Caption' => $row['Caption'], 'path' => $row['path'], 'userId' => $row['userId'], 'albumId' => $row['albumId']);
	}
	include 'userFotos.html.php';
	
?>