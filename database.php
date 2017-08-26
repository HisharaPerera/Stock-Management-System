<?php
	//Connect to database
	function connectToDatabase($databaseName){
		$user = 'u663784695_hish';
		$pass = 'hish@123';
		$database = $databaseName;
		$connect = mysqli_connect('mysql.hostinger.in',$user,$pass) or die("Unable to connect");
		$select_db = mysqli_select_db($connect,$database) or die("Unable to connect to database");
		return $connect;
	}
	
	//Insert paper records to database
	function addPaperRecord($connect,$data){		
		$queryToInsert = mysqli_query($connect, "INSERT INTO paper(paperName,paperType,size,density,colour,description,remarks,image,availability) VALUES('$data[0]',$data[1],'$data[2]',$data[3],$data[4],'$data[5]','$data[6]','$data[7]','Yes')");
	}
	
	//Insert ink records to database
	function addInkRecord($connect,$data){		
		$queryToInsert = mysqli_query($connect, "INSERT INTO ink(colourID,brand,remarks,availability) VALUES($data[0],'$data[1]','$data[2]','Yes')");
	}
	
	//Insert handle records to database
	function addHandleRecord($connect,$data){		
		$queryToInsert = mysqli_query($connect, "INSERT INTO handle(handleType,size,availability,remarks,image) VALUES($data[0],'$data[1]','Yes','$data[2]','$data[3]')");
	}
	
	//Insert paper type and colour records to database
	function addRecord($connect,$table,$field,$data){		
		$queryToInsert = mysqli_query($connect, "INSERT INTO $table($field) VALUES('$data')");
	}
	
	//Search a certain field with given value
	function search($connect,$table,$value,$searchField,$returnField){
		$query = "SELECT $returnField FROM $table WHERE $searchField='$value'";
		$result = mysqli_query($connect,$query);
		if($result != null){
			$row = $result->fetch_row();
			return $row[0];
		}else{
			return null;
		}		
	}

	//Update a field with the given value
	function update($connect,$table,$upadetValue,$searchValue,$searchField,$updateField){
		$query = "UPDATE $table SET $updateField='$upadetValue' WHERE $searchField=$searchValue";
		$result = mysqli_query($connect,$query);
	}
	
	//Delete a record with paper name given
	function delete($connect,$table,$searchValue,$searchField){
		$query = "DELETE FROM $table WHERE $searchField=$searchValue";
		$result = mysqli_query($connect,$query);
	}

	//Search a key word
	function searchKeyword($connect,$table,$searchField,$keyword,$returnField){
		$query = "SELECT $returnField FROM $table WHERE $searchField LIKE '%$keyword%'";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Load paper details
	function viewPaperDetails($connect){
		$query = "SELECT paperID,paperName,papertype.paperType,size,density,colour.colour,description,remarks FROM paper,papertype,colour WHERE papertype.paperTypeID=paper.paperType AND colour.colourID=paper.colour";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Load ink details
	function viewInkDetails($connect){
		$query = "SELECT inkID,brand,colour,remarks,availability FROM ink,colour WHERE colour.colourID=ink.colourID";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Load ink details
	function viewHandleDetails($connect){
		$query = "SELECT handleID,handletype.handleType,size,remarks,availability FROM handle,handletype WHERE handletype.handleTypeID=handle.handleType";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Load paper details of selected keyword
	function viewAll($connect,$keyID,$searchField){
		$query = "SELECT paperName,papertype.paperType,size,density,colour.colour,description,remarks,image,available FROM paper,papertype,colour WHERE papertype.paperTypeID=paper.paperType AND colour.colourID=paper.colour AND $searchField=$keyID";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Load ink details of selected keyword
	function viewAllInk($connect,$keyID,$searchField){
		$query = "SELECT brand,colour,remarks,availability FROM ink,colour WHERE colour.colourID=ink.colourID AND $searchField=$keyID";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Load handle details of selected keyword
	function viewAllHandle($connect,$keyID,$searchField){
		$query = "SELECT handletype.handleType,size,remarks,availability,image FROM handle,handletype WHERE handle.handleType=handleType.handleTypeID AND $searchField=$keyID";
		$result = mysqli_query($connect,$query);
		return $result;
	}
	
	//Close database connection
	function closeConnection($connect){
		$connect->close();
		//echo "Connection to database closed";
	}		
	
?>