<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/includesPF/db.inc.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/includesPF/magicquotes.inc.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/includesPF/access.inc.php';
		
		
		$username = mysqli_real_escape_string($link, $_POST['usernamesignup']);
		$email = mysqli_real_escape_string($link, $_POST['emailsignup']);
		$sql = "INSERT INTO Member SET
		username='$username',
		email='$email'";
		
		if (!mysqli_query($link, $sql))
		{
			$error = 'Error adding submitted Member.';
			include '../error.html.php';
			exit();
		}
		
		$MemberId = mysqli_insert_id($link);
		
		if ($_POST['passwordsignup'] != '')
		{
			$password = md5($_POST['passwordsignup'] . 'ijdb');
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
			'Role' => $row['Role']);
		}
		/****************************************************/
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
		if(!userRegistered($username, $password))
		{
			include 'login.html.php/#register';
			exit()
		}else
		{
			include'uploadFotos.html.php';
			exit();
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
		include 'uploadFotos.html.php';
		
		exit();
?>