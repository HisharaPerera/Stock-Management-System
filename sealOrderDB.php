<?php
	
	require_once("database.php");
	$success = 0;

	$orderName="";
	if(isset($_POST["orderName"])){
		$orderName = $_POST["orderName"]; 
	}
	
	$handleType = 0;
	if(isset($_POST["handleType"])){
		$handleType = $_POST["handleType"];
	}
	
	$handle = 0;
	if($handleType == "Polymer"){
		$handle = 1;
	}else if($handleType == "Flash"){
		$handle = 2;
	}
	
	$quantity="";
	if(isset($_POST["quantity"])){
		$quantity = $_POST["quantity"]; 
	}
	
	$size = "";
	if(isset($_POST["handleSize"])){
		$size = $_POST["handleSize"];
	}
		
	$remarks = "";
	if(isset($_POST["remarks"])){
		$remarks = $_POST["remarks"];
	}
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	$connect = connectToDatabase("u663784695_print");
		
	$data = array($orderName,$handle,$quantity,$size,$remarks,$target_file);
	
	$result = addSealOrder($connect,$data);	
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

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "docx" ) {                                        
		echo "Sorry, only JPG, JPEG, PNG ,GIF ,PDF & DOCX files are allowed.";
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
	
	header("Location: backendClient.php?op=ins&rec=&suc=$success");
	die();

?>