<?php
	
	require_once("database.php");
	$success = 0;
	
	$brand = "";
	if(isset($_POST["brand"])){
		$brand = $_POST["brand"];
	}
		
	$colour = 0;
	if(isset($_POST["colour"])){
		$colour = $_POST["colour"];
	}
		
	$remarks = "";
	if(isset($_POST["remarks"])){
		$remarks = $_POST["remarks"];
	}
	
	$connect = connectToDatabase("u663784695_print");
		
	$colourID = search($connect,"colour",$colour,"colour","colourID");
	
	$data = array($colourID,$brand,$remarks);
	
	$result = addInkRecord($connect,$data);	
	$num = mysqli_affected_rows($connect);
	if($num != 0){
		$success = 1;
	}
	
	closeConnection($connect);
	
	header("Location: backend.php?op=ins&rec=$paperName&suc=$success");
	die();

?>