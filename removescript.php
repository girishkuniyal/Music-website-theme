<?php

$temp=null;
$target1=null;
$target2=null;
$rowlast=null;
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
if($_POST["ranking"]==""){
	setcookie("error","Rank of Song must Required",time()+1800,"/");
	header("admin.php");
	exit();
}
	require 'login_info1.php';


/*

	$servername = "mysql9.000webhost.com";
	$username = "a1847819_user";
	$password = "want_1995";
*/
	$dbname = "id1716745_song";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		setcookie("error","Database Connection failed",time()+1800,"/");
		header("Location:admin.php");
	}
	
	$sql = 'Select * from '.$tablename.' where rank = '.$_POST["ranking"].';';
	if($result=$conn->query($sql)){
		$row = $result->fetch_assoc();
		$sql="select * from ".$tablename."";
		//count the total song
		if($result = $conn->query($sql)){
			$rowlast = $result->num_rows;
		}
		else{
			setcookie("error","Row count failed",time()+15,"/");
			$conn->close();	
			header("Location:admin.php");
		}
		
		$sql = "Update ".$tablename." set rank = 50 where rank = ".$_POST['ranking']."";
	
		if($conn->query($sql)){
		 	for($i = ($_POST["ranking"]+1);$i <= $rowlast; $i++ ){
		 		$sql = "Update ".$tablename." set rank = ".($i-1)." where rank = ".$i."";
		 		
		 		if($conn->query($sql)){}
		 		else{
		 			setcookie("error","Query Loop Execution failed",time()+1800,"/");
					
					$conn->close();	
					header("Location:admin.php");	
		 		}
		 	}
		 	$sql = "Delete from ".$tablename." where rank = 50";
		 	if($conn->query($sql)){
		 		setcookie("error","Song Remove Succesfully",time()+1800,"/");
				$conn->close();
				header("Location:admin.php");
		 	}
		}
		else{
			setcookie("error","Delete Execution failed",time()+1800,"/");
			header("Location:admin.php");
			$conn->close();
		}
	}
	else{
		setcookie("error","Query Execution failed",time()+1800,"/");
		header("Location:admin.php");
		$conn->close();
	}
	

?>
