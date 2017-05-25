<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" type="image/png" href="resources/icon1.png">
<title>Muzika : Music Store</title>

<!--jquery 3.1.1-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!--Bootstrap v3.3.7 css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--Latest minified bootstrap javascript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--Font for Muzika title-->
<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet"> 
<!--Core CSS-->
<link href="css/stylesheet.css" rel="stylesheet">
<link href="css/about.css" rel="stylesheet">

</head>


<body>
<div id="songloader" align="center">
	<img src="" id="songimage">
	<button type="button" class="close close-it" onclick="closesong()">&times;</button>
	<br><br>
	<div class="songcaption"><span id="songmovetitle"></span></div><br>
	<audio controls id="myaudio">
		<source type="audio/mp3" id="songsource" src=""></source>
		  Your browser does not support embedded audio players
	</audio>
</div>


<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid text-center">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#heads">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php"><img src="resources/acoustic-guitar.svg" style="height:100px; width:100px ;"></a><div id="muzika"><b>Muzika</b></div>
		</div>
		<div class="collapse navbar-collapse" id="heads">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<?php
					if(isset($_SESSION["user"])){
						echo '<a href="admin.php"><button class="btn btn-success btn-lg "><span class="glyphicon glyphicon-cog"></span> <b>Dashboard' ; 
					}
					else{
						echo '<a href="#"><button class="btn btn-warning btn-lg " data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> <b>Log in';	 
					}
					?>
				
					</b></button></a>
				</li>
				<li>
					<a href="about.php"><button class="btn btn-warning btn-lg "><span class="glyphicon glyphicon-user"></span> <b>About</b></button></a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container text-center">
	<div class="row" align="center">
		<div class="song-page-title">
			<?php echo $_COOKIE["option"]?> Songs
		</div>
	</div>
	<br><br>
	
<?php
require "login_info1.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM ".$_COOKIE['option']." order by rank";
$result = $conn->query($sql);
$row_cnt = $result->num_rows;

while($row = $result->fetch_assoc()) {	


	echo'<div class="row" onclick="opensong('.$row["rank"].')">
		<div class="col-sm-10 col-sm-offset-1 bg-row inner-element" onclick="changeplaycolor()">
			<div class="rank" id="rank'.$row["rank"].'">'.$row["rank"].'.</div>
			<img src="'.$row["songposter"].'"  class="song-img">
			<div class="song-title">'.$row["song"].'</div>
			<div class="song-movie">'.$row["film"].'</div>
			<div class="song-icon"><span class="glyphicon glyphicon-play"></div>
		</div>
	</div>';

}

	echo' <br><br>
</div>

<div class="modal fade" id="login-modal">
	<div class="modal-dialog">
		<div class="modal-content text-center"> 
			<div class="modal-header">
				<label id="login-label">Administrator login</label>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="modal-body-bg">
				<form method="post" action="testlogin.php" class="text-center" id="form">
					<div class="input-group">
						<span class="input-group-addon">
						<i class="glyphicon glyphicon-user"></i>
						</span>
					<input type="text" class="form-control" name="user" placeholder="girish@gmail.com">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon">
						<i class="glyphicon glyphicon-lock"></i>
						</span>
					<input type="password" name="pass" class="form-control" placeholder="**********">
					</div><br>
					<button type="submit" class="btn btn-success btn-lg">Login</button>
		</form>
			</div>
			
		</div>
	</div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-bottom text-center" id="bottomfooter">
	<h5><b>Made with <span class="glyphicon glyphicon-heart"></span> by Girish Kuniyal</b></h5>
</nav>
</body>
<script>
	function changeplaycolor(){
		document.getElementById("rank1").style.backgroundColor = " #e74c3c ";
	}
	
	function isPlaying(){
        	return document.getElementById("myaudio").currentTime > 0 && !document.getElementById("myaudio").paused&& !document.getElementById("myaudio").ended;
    	}
    	function animationfunc(){
    		id = setInterval(run,100);
    		function run(){
    			if(isPlaying()){
    				document.getElementById("songimage").style.animation = "heartbeat 1s infinite";	
    			}else{
    				document.getElementById("songimage").style.animation = "";
    			}
    		}
    	}
	var loaddiv = document.getElementById("songloader");
	var audiocontrol = document.getElementById("myaudio");
	var loadimage = document.getElementById("songimage");
	var loadsource = document.getElementById("songsource");
	var loadcaption = document.getElementById("songmovetitle");' ;
	for($s=1;$s<= $row_cnt; $s++ ){
	$sql = "select * from ".$_COOKIE["option"]." where rank =".$s;
	$result=$conn->query($sql);
	$row = $result->fetch_assoc();
	echo'
	var poster'.$row["rank"].' = "'.$row["songposter"].'" ;
	var title'.$row["rank"].' = "'.$row["song"].'";
	var movie'.$row["rank"].' = "'.$row["film"].'";
	var song'.$row["rank"].' = "'.$row["songlocation"].'";';
	}
	echo'
	function opensong(i){
		switch(i){';
		for($l=1;$l<= 20; $l++ ){
			echo'
			case '.$l.':
				loaddiv.style.display = "block";
				loadimage.src = poster'.$l.';
				loadsource.src = song'.$l.';
				loadcaption.innerHTML = title'.$l.'+"-"+movie'.$l.';
				audiocontrol.load();
				audiocontrol.play();
				break;';
		}
		echo'			
		}
		
		animationfunc();
	}
	function closesong(){
		loaddiv.style.display = "none";
		audiocontrol.pause();
		audiocontrol.currentTime = 0;
		loadsource.src = null;
	}';
	
$conn->close();
?>
	
</script>

</html>
