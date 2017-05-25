<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="icon" type="image/png" href="resources/icon1.png">
<title>Muzika : Music Store</title>
<link href="https://fonts.googleapis.com/css?family=Clicker+Script" rel="stylesheet"> 
<link rel="stylesheet" href="css/loader.css">
<script>
	function removeloader(){
		var ele = document.getElementById("loader");
		opacity = 1;
		id=setInterval(fade,5);
		function fade(){
			if( opacity <= 0){
				clearInterval(id);
				ele.style.display = "none";
			}else{
			ele.style.opacity = opacity;
			opacity = opacity - 0.005;
			}
		}
	}
</script>
</head>


<body onload="removeloader()">
<!--loader division-->
<div id="loader" align="center">
	<img src="resources/loading-cylon-red.svg" width="500" height="25" id="loader-cylon"><br>
	<div id="loading-txt">
		<b>Muzika</b>
	</div><br>
	<img src="resources/loading-bubbles.svg" width="64" height="64" id="loader-bubble">
</div>
<!--loader ends-->


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

<div class="container">
	<div class="row">
		<div class="col-sm-3">
			<div class="thumbnail" id="thumb1">
			<a href="input/input1.php">
				<img src="resources/bollywood.jpg" alt="Bollywood image">
				<div class="caption text-center cat-caption">Bollywood Songs</div>
			</a>
			</div>
		</div>
		
		<div class="col-sm-3 bgblue"><div class="thumbnail" id="thumb2">
			<a href="input/input2.php">
				<img src="resources/world.jpg" alt="World image">
				<div class="caption text-center cat-caption">World Songs</div>
			</a>
			</div></div>
		
		<div class="col-sm-3 bgyellow"><div class="thumbnail" id="thumb3">
			<a href="input/input3.php">
				<img src="resources/punjabi.png" alt="Punjabi image">
				<div class="caption text-center cat-caption">Punjabi Songs</div>
			</a>
			</div></div>
		
		<div class="col-sm-3 bgblue"><div class="thumbnail" id="thumb4">
			<a href="input/input4.php">
				<img src="resources/telgu.jpg" alt="Telgu image">
				<div class="caption text-center cat-caption">Telgu Songs</div>
			</a>
			</div></div>
	</div>
	
	<div class="row">
		<div class="col-sm-3 bgblue"><div class="thumbnail" id="thumb5">
			<a href="input/input5.php">
				<img src="resources/party.jpg" alt="Party image">
				<div class="caption text-center cat-caption">Party Songs</div>
			</a>
			</div></div>
		
		<div class="col-sm-3 bgyellow"><div class="thumbnail" id="thumb6">
			<a href="input/input6.php">
				<img src="resources/romantic.jpg" alt="Romantic image">
				<div class="caption text-center cat-caption">Romantic Songs</div>
			</a>
			</div></div>
		
		<div class="col-sm-3 bgblue"><div class="thumbnail" id="thumb7">
			<a href="input/input7.php">
				<img src="resources/ghazal.jpg" alt="Ghazal image">
				<div class="caption text-center cat-caption">Ghazal Songs</div>
			</a>
			</div></div>
		
		<div class="col-sm-3 bgred"><div class="thumbnail" id="thumb8">
			<a href="input/input8.php">
				<img src="resources/other.jpg" alt="Other image">
				<div class="caption text-center cat-caption">Other Songs</div>
			</a>
			</div></div>
	</div>



</div>
<!--Login modal-->
<div class="modal fade" id="login-modal">
	<div class="modal-dialog">
		<div class="modal-content text-center"> 
			<div class="modal-header">
				<label id="login-label">Administrator login</label>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body" id="modal-body-bg">
				<form method="post" action="testlogin.php" class="text-center" id="form" >
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
					<button type="submit" class="btn btn-success btn-lg" >Login</button>
		</form>
			</div>
			
		</div>
	</div>
</div>
<!--End of login modal-->

<!--footer-->
<nav class="navbar navbar-inverse navbar-fixed-bottom text-center" id="bottomfooter">
	<h5><b>Made with <span class="glyphicon glyphicon-heart"></span> by Girish Kuniyal</b></h5>
</nav>

<!--jquery 3.1.1-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!--Bootstrap v3.3.7 css-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--Latest minified bootstrap javascript-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--Font for Muzika title-->

<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet"> 
<!--Core CSS-->
<link href="css/stylesheet.css" rel="stylesheet">
</body>

</html>
