<?php
	include_once $_SERVER['DOCUMENT_ROOT'] .
	'/includesPF/magicquotes.inc.php';
	
	require_once $_SERVER['DOCUMENT_ROOT'] . '/includesPF/access.inc.php';
	
	if (!userIsLoggedIn())
	{
		include 'login.html.php';
		exit();
	}
	
	if (!userHasRole(1))
	{
		$error = 'Only Account Administrators may access this page.';
		include 'accessdenied.html.php';
		exit();
	}
	
	if (isset($_GET['add']))
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		
		$pagetitle = 'New Member';
		$action = 'addform';
		$name = '';
		$email = '';
		$id = '';
		$button = 'Sign up';
		
		// Build the list of Roles
		$sql = "SELECT id, Role FROM Role";
		$result = mysqli_query($link, $sql);
		if (!$result)
		{
			$error = 'Error fetching list of Roles.';
			include '../error.html.php';
			exit();
		}
		
		while ($row = mysqli_fetch_array($result))
		{
			$Roles[] = array(
			'id' => $row['id'],
			'Role' => $row['Role'],
			'selected' => FALSE);
		}
		//*************figure out how this will work**************
		include 'form.html.php';
		exit();
	}
	
	if (isset($_GET['joinform']))
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$sql = "INSERT INTO Member SET
		name='$name',
		email='$email'";
		
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error adding submitted Member.';
			include '../error.html.php';
			exit();
		}
		
		/***For development purposes assign all roles to new Members****/
				// Build the list of Roles
		$sql = "SELECT id, Role FROM Role";
		$result = mysqli_query($link, $sql);
		if (!$result)
		{
			$error = 'Error fetching list of Roles.';
			include '../error.html.php';
			exit();
		}
		
		while ($row = mysqli_fetch_array($result))
		{
			$Roles[] = array(
			'id' => $row['id'],
			'Role' => $row['Role'])
		}
		/****************************************************/
		
		$MemberId = mysqli_insert_id($link);
		
		if ($_POST['password'] != '')
		{
			$password = md5($_POST['password'] . 'ijdb');
			$password = mysqli_real_escape_string($link, $password);
			$sql = "UPDATE Member SET
			password = '$password'
			WHERE id = '$MemberId'";
			if (!mysqli_query($link, $sql))
			{
				$error = 'Error setting Member password.';
				include '../error.html.php';
				exit();
			}
		}
			/**if (isset($_POST['Roles']))
			{ temporarily commenting out if statement**/
				//foreach ($_POST['Roles'] as $Role) temporarily 
				foreach ($Roles as $Role)
			{
				$RoleId = $Role['id'];
				$sql = "INSERT INTO MemberRole SET
				MemberId='$MemberId',
				RoleId='$RoleId'";
				if (!mysqli_query($link, $sql))
				{
					$error = 'Error assigning selected Role to Member.';
					include '../error.html.php';
					exit();
				}
			}
		//} temporarily commenting out closing bracket of if statement
		//header('Location: .');
			// Display Fotos for current member
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		$result = mysqli_query($link, "SELECT * FROM Foto WHERE userId = '$MemberId'");
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
		include 'loadzaFotos.html.php';
		
		exit();
	}
	
	if (isset($_POST['action']) and $_POST['action'] == 'Edit')
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		$id = mysqli_real_escape_string($link, $_POST['id']);
		$sql = "SELECT id, name, email FROM Member WHERE id='$id'";
		$result = mysqli_query($link, $sql);
		if (!$result)
		{
			$error = 'Error fetching Member details.';
			include '../error.html.php';
			exit();
		}
		$row = mysqli_fetch_array($result);
		$pagetitle = 'Edit Member';
		$action = 'editform';
		$name = $row['name'];
		$email = $row['email'];
		$id = $row['id'];
		$button = 'Update Member';
		// Get list of Roles assigned to this Member
		$sql = "SELECT RoleId FROM MemberRole WHERE MemberId='$id'";
		$result = mysqli_query($link, $sql);
		if (!$result)
		{
			$error = 'Error fetching list of assigned Roles.';
			include '../error.html.php';
			exit();
		}
		$selectedRoles = array();
		while ($row = mysqli_fetch_array($result))
		{
			$selectedRoles[] = $row['RoleId'];
		}
		// Build the list of all Roles
		$sql = "SELECT id, description FROM Role";
		$result = mysqli_query($link, $sql);
		if (!$result)
		{
			$error = 'Error fetching list of Roles.';
			include '../error.html.php';
			exit();
		}
		while ($row = mysqli_fetch_array($result))
		{
			$Roles[] = array(
			'id' => $row['id'],
			'description' => $row['description'],
			'selected' => in_array($row['id'], $selectedRoles));
		}
		include 'form.html.php';
		exit();
	}
	if (isset($_GET['editform']))
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		$id = mysqli_real_escape_string($link, $_POST['id']);
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$sql = "UPDATE Member SET
		name='$name',
		email='$email'
		WHERE id='$id'";
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error updating submitted Member.';
			include '../error.html.php';
			exit();
		}
		if ($_POST['password'] != '')
		{
			$password = md5($_POST['password'] . 'ijdb');
			$password = mysqli_real_escape_string($link, $password);
			$sql = "UPDATE Member SET
			password = '$password'
			WHERE id = '$id'";
			if (!mysqli_query($link, $sql))
			{
				$error = 'Error setting Member password.';
				include '../error.html.php';
				exit();
			}
		}
		$sql = "DELETE FROM MemberRole WHERE MemberId='$id'";
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error removing obsolete Member Role entries.';
			include '../error.html.php';
			exit();
		}
		if (isset($_POST['Roles']))
		{
			foreach ($_POST['Roles'] as $Role)
			{
				$RoleId = mysqli_real_escape_string($link, $Role);
				$sql = "INSERT INTO MemberRole SET
				MemberId='$id',
				RoleId='$RoleId'";
				if (!mysqli_query($link, $sql))
				{
					$error = 'Error assigning selected Role to Member.';
					include '../error.html.php';
					exit();
				}
			}
		}
		header('Location: .');
		exit();
	}
	if (isset($_POST['action']) and $_POST['action'] == 'Delete')
	{
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		$id = mysqli_real_escape_string($link, $_POST['id']);
		// Delete Role assignments for this Member
		$sql = "DELETE FROM MemberRole WHERE MemberId='$id'";
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error removing Member from Roles.';
			include '../error.html.php';
			exit();
		}
		// Get jokes belonging to Member
		$sql = "SELECT id FROM joke WHERE MemberId='$id'";
		$result = mysqli_query($link, $sql);
		if (!$result)
		{
			$error = 'Error getting list of jokes to delete.';
			include '../error.html.php';
			exit();
		}
		// For each joke
		while ($row = mysqli_fetch_array($result))
		{
			$jokeId = $row[0];
			// Delete joke category entries
			$sql = "DELETE FROM jokecategory WHERE jokeid='$jokeId'";
			if (!mysqli_query($link, $sql))
			{
				$error = 'Error deleting category entries for joke.';
				include '../error.html.php';
				exit();
			}
		}
		// Delete jokes belonging to Member
		$sql = "DELETE FROM joke WHERE MemberId='$id'";
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error deleting jokes for Member.';
			include '../error.html.php';
			exit();
		}
		// Delete the Member
		$sql = "DELETE FROM Member WHERE id='$id'";
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error deleting Member.';
			include '../error.html.php';
			exit();
		}
		header('Location: .');
		exit();
	}
	// Display Fotos for currently logged in member
	if(
	$userId = getLoggedInUserId();
	echo 'User Id = " . &userId;
	include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
	$result = mysqli_query($link, "SELECT * FROM Foto WHERE id = '$userId'");
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
	include 'loadzaFotos.html.php';
?>