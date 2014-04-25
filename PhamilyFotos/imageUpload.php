<?php
	//if(isset($_GET)(['addImage'))
	//{
		include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
		require_once $_SERVER['DOCUMENT_ROOT'] . '/includesPF/access.inc.php';
		
		$userId = getUserId();
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		// Set file type, name, size, temp_name variables
		$fileName = $_FILES["file"]["name"];
		$fileType = $_FILES["file"]["type"];
		$fileSize = $_FILES["file"]["size"];
		$fileTmpNme = $_FILES["file"]["tmp_name"];
		$fileName = $_FILES["file"]["name"];
		$fileError = $_FILES["file"]["error"];
		$filePath = "images/small/";
		
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		if((($fileType == "image/gif")
		||($fileType == "image/jpeg")
		||($fileType == "image/jpg")
		||($fileType == "image/pjpeg")
		||($fileType == "image/x-png")
		||($fileType == "image/png"))
		&& ($fileSize< 1000000)
		&& in_array($extension, $allowedExts))
		{
			if($fileError > 0)
			{
				echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			}
			else
			{
				echo "Upload: " . $fileName . "<br>";
				echo "Type: " . $fileType . "<br>";
				echo "Size: " . $fileSize . "<br>";
				echo "Temp file: " . $fileTmpNme . "<br>";
				
				if(file_exists($filePath . $fileName))
				{
					echo $fileName . " already exists. ";
				}
				else
				{
					if(move_uploaded_file($fileTmpNme,$filePath . $fileName))
					{
					echo "Stored in " . $filePath . $fileName;
					echo "Stored by User ID No.: " . $username;
					$sql = "INSERT INTO Foto ('id', 'FotoName', 'Caption', 'path', 'userId', 'albumId')
					VALUES (NULL, '$fileName', NULL, '$filePath', '$userId', NULL)";
						
					}
					else
					{
						echo "File not saved correctly ". $fileError;
					}
				}
			}
		}
		else
		{
			echo "Invalid file " . $fileSize;
		}
	//}
?>