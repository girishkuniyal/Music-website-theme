<?php
setcookie("error","",time()+1800,"/");
$temp="";
$lastrow = null;
if($_POST["category"]=="bollywood"){
	$tablename = "Bollywood";
}
elseif($_POST["category"]=="world"){
	$tablename = "World";
}
elseif($_POST["category"]=="punjabi"){
	$tablename = "Punjabi";
}
elseif($_POST["category"]=="telgu"){
	
	$tablename = "Telgu";
}
elseif($_POST["category"]=="romantic"){
	
	$tablename = "Romantic";
}
elseif($_POST["category"]=="party"){
	
	$tablename = "Party";
}
elseif($_POST["category"]=="ghazal"){
	
	$tablename = "Ghazal";
}
elseif($_POST["category"]=="other"){
	
	$tablename = "Other";
}
if($_POST["songname"]=="" || $_POST["moviename"]=="" ||$_POST["songloc"]==""||$_POST["posterloc"]==""){
	setcookie("error","Each field is Required",time()+1800,"/");
	header("Location:admin.php");
	exit();
}
if(pathinfo($_POST["songloc"], PATHINFO_EXTENSION)=='.mp3'){
	setcookie("error","Incorrect audio-format uploaded.mp3 required",time()+1800,"/");
	header("Location:admin.php");
	exit();
}

if(pathinfo($_POST["posterloc"], PATHINFO_EXTENSION)=='.jpg' || pathinfo($_POST["posterloc"], PATHINFO_EXTENSION)=='.jpeg' || pathinfo($_POST["posterloc"], PATHINFO_EXTENSION)=='.png' ){
	setcookie("error","Incorrect Image-format uploaded.",time()+1800,"/");
	header("Location:admin.php");
	exit();
}		

	
	require 'login_info1.php';


/*
	$servername = "mysql9.000webhost.com";
	$username = "a1847819_user";
	$password = "want_1995";   

	$dbname = "a1847819_song";

*/	
	$dbname = "id1716745_song";	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
    		$temp = "Database Connection failed.";
		setcookie("error",$temp,time()+1800);
	}
	if($_POST['songname']!="" && $_POST['moviename']!=""){
		$sqllast = "SELECT * FROM ".$tablename.";";
		;
		if ($resultnum = $conn->query($sqllast)) {
    			$lastrow =$resultnum->num_rows;
    			$lastrow = $lastrow+1;
    			if($lastrow>20){
    				setcookie("error","Memory space exceded. Remove some old songs",time()+1800,"/");
				header("Location:admin.php");
				exit();
    			}		
		}
		else{
			$temp = "Rank could not be determined";
			setcookie("error",$temp,time()+1800,"/");
		}
		
		
		$sql = 'INSERT INTO '.$tablename.'(rank,song,film,songlocation,songposter) VALUES ("'.$lastrow.'","'.trim($_POST['songname']).'","'. trim($_POST['moviename']).'","'.trim($_POST['songloc']).'","'.trim($_POST['posterloc']).'")';
	
		if ($conn->query($sql) === TRUE) {
    			$temp = "Song Added Succesfully";
			setcookie("error",$temp,time()+1800,"/");
		} else {
			
    			$temp = "Database Connect error.".$conn->error;
			setcookie("error",$temp,time()+1800,"/");
		}

	}
	

	
$conn->close();
header("Location:admin.php");

?>

