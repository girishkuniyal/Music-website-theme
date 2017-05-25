<?php
session_start();

require 'login_info2.php';
$datauser = $_POST["user"];
$datauser = trim($datauser);
$datauser = stripslashes($datauser);

$datapassword = $_POST["pass"];
$datapassword = trim($datapassword);
$datapassword = stripslashes($datapassword);
  
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("SELECT * FROM Admin where username=? && password=?");
$stmt->bind_param("ss", $username1, $password1);
$username1 = $datauser;
$password1 = $datapassword;
$stmt->execute();
$stmt->bind_result($id,$tempusername, $temppassword,$tempuser);

if ($stmt->fetch()){
	$_SESSION["user"] = $tempuser;
        $stmt->close();
        $conn->close();
	header('Location:admin.php');
}
else{
         $stmt->close();
         $conn->close();
	 header('Location:index.php');
}

?>