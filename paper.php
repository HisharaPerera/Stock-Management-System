<?php
	
	require_once("database.php");
	$success = 0;
	
	$paperName = "";
	if(isset($_POST["paperName"])){
		$paperName = $_POST["paperName"];
	}
	
	$paperType = 0;
	if(isset($_POST["paperType"])){
		$paperType = $_POST["paperType"];
	}
	
	$paperSize = "";
	if(isset($_POST["paperSize"])){
		$paperSize = $_POST["paperSize"];
	}
	
	$density = 0;
	if(isset($_POST["density"])){
		$density = $_POST["density"];
	}
	
	$colour = 0;
	if(isset($_POST["colour"])){
		$colour = $_POST["colour"];
	}
	
	$description = "";
	if(isset($_POST["description"])){
		$description = $_POST["description"];
	}
	
	$remarks = "";
	if(isset($_POST["remarks"])){
		$remarks = $_POST["remarks"];
	}
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	$connect = connectToDatabase("u663784695_print");
	
	$paperTypeID = search($connect,"papertype",$paperType,"paperType","paperTypeID");
	$colourID = search($connect,"colour",$colour,"colour","colourID");
	
	$data = array($paperName,$paperTypeID,$paperSize,$density,$colourID,$description,$remarks,$target_file);
	
	$result = addPaperRecord($connect,$data);	
	$num = mysqli_affected_rows($connect);
	if($num != 0){
		$success = 1;
	}
	
	
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	/*if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}*/
	// Check file size
	/*if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}*/
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
		
	closeConnection($connect);
	
	header("Location: backend.php?op=ins&rec=$paperName&suc=$success");
	die();

?>