<?php
	function userIsLoggedIn()
	{
		if(isset($_POST['action']) and $_POST['action'] == 'login')
		{
			if(!isset($_POST['username']) or $_POST['username'] == ''or
			!isset($_POST['password']) or $_POST['password'] == '')
			{
				$GLOBALS['loginError'] = 'Please fill in both fields';
				return FALSE;
			}
			$password = md5($_POST['password'] . 'ijdb');			
		
			if(databaseContainsMember($_POST['username'], $password))
			{
				session_start();
				$_SESSION['loggedIn'] = TRUE;
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $password;
				return TRUE;
			}
			else
			{
				session_start();
				unset($_SESSION['loggedIn']);
				unset($_SESSION['username']);
				unset($_SESSION['password']);
				$GLOBALS['loginError'] = 'The specified username address or password was incorrect.';
				return FALSE;
			}
		}
		
		if(isset($_POST['action']) and $_POST['action'] == 'logout')
		{
			session_start();
			unset($_SESSION['loggedIn']);
			unset($_SESSION['username']);
			unset($_SESSION['password']);
			header('Location: ' . $_POST['goto']);
			exit();
		}
		
		session_start();
		if(isset($_SESSION['loggedIn']))
		{
			return databaseContainsMember($_SESSION['username'],$_SESSION['password']);
		}
	}
	
	function databaseContainsMember($username, $password)
	{
		include 'db.inc.php';
		
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		
		$sql = "SELECT COUNT(*) FROM Member
				WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($link, $sql);
		if(!$result)
		{
			$error = 'Error searching for Member.';
			include 'error.html.php';
			exit();
		}
		$row = mysqli_fetch_array($result);
		
		if ($row[0] > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	 
	function userHasRole($role)
	{
		include 'db.inc.php';
		
		$username = mysqli_real_escape_string($link, $_SESSION['username']);
		$role = mysqli_real_escape_string($link, $role);
		
		$sql = "SELECT COUNT(*) FROM Member
			INNER JOIN MemberRole ON Member.id = Memberid
			INNER JOIN Role ON roleid = Role.id
			WHERE username = '$username' AND Role.id = '$role'";
		$result = mysqli_query($link, $sql);
		if(!result)
		{
			$error = 'Error searching for Member roles.';
			include 'error.html.php';
			exit();
		}
		$row = mysqli_fetch_array($result);
		
		if($row[0] > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
?>