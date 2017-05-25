<?php
setcookie("error","",time()+1800,"/");
$temp="";
$maxrow =null;

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
if(($_POST["rankcurrent"]=="") || ($_POST["rankexpect"]=="")){
	setcookie("error","Current and Expected Rank of Song is Required",time()+1800,"/");
	header("Location:admin.php");
	exit();
}
	require 'login_info1.php';

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		setcookie("error","Database Connection failed",time()+1800,"/");
		header("Location:admin.php");
	}
		$sql = 'select * from '.$tablename;
		if($result = $conn->query($sql)){
			$maxrow = $result->num_rows;
		}
		else{
			setcookie("error","Undermined max row number",time()+1800,"/");					
			$conn->close();	
			header("Location:admin.php");
		}
		if(($maxrow >= $_POST["rankexpect"]) && ($maxrow >= $_POST["rankcurrent"]) ){
			$sql = 'Update '.$tablename.' set rank = 50 where rank = '.$_POST["rankcurrent"];		
			if($conn->query($sql)){
				if($_POST["rankcurrent"] < $_POST["rankexpect"]){
					for($i=($_POST["rankcurrent"]+1); $i<= $_POST["rankexpect"];$i++){
						$sql= 'update '.$tablename.' set rank = '.($i-1).' where rank = '.$i;
						if($conn->query($sql)){}
						else{
							setcookie("error","Error in loop query",time()+1800,"/");					
							$conn->close();	
							header("Location:admin.php");		
						}
					}
					$sql = 'update '.$tablename.' set rank = '.$_POST["rankexpect"].' where rank=50';
					if($conn->query($sql)){
						setcookie("error","Rank Changed Succesfully",time()+1800,"/");					
						$conn->close();	
						header("Location:admin.php");
					}
					else{
						setcookie("error","Last Query Failed",time()+1800,"/");					
						$conn->close();	
						header("Location:admin.php");
					}
				}
				else{
					for($i=($_POST["rankcurrent"]-1); $i>= $_POST["rankexpect"];$i--){
						$sql= 'update '.$tablename.' set rank = '.($i+1).' where rank = '.$i;
						if($conn->query($sql)){}
						else{
							setcookie("error","Error in loop query",time()+1800,"/");					
							$conn->close();	
							header("Location:admin.php");		
						}
					}
					$sql = 'update '.$tablename.' set rank = '.$_POST["rankexpect"].' where rank=50';
					if($conn->query($sql)){
						setcookie("error","Rank Changed Succesfully",time()+1800,"/");					
						$conn->close();	
						header("Location:admin.php");
					}
					else{
						setcookie("error","Last Query Failed",time()+1800,"/");					
						$conn->close();	
						header("Location:admin.php");
					}
		
				}	
			}
			else{
				setcookie("error","Sql Query failed to save current rank",time()+1800,"/");					
				$conn->close();	
				header("Location:admin.php");
			}
		
		}
		else{
			setcookie("error","Please Enter valid rank",time()+1800,"/");					
			$conn->close();	
			header("Location:admin.php");
		}
?>
