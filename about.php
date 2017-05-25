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
<style>
</style>
</head>


<body>
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
<div class="jumbotron text-center" id="aboutjumbo">
	<h2> Lets play music with Muzika </h2>
</div>
<div class="container-fluid" >
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4" id="about-block">
			<div id="about-title"><b>About</b></div><br><br>
			Muzika is online Music store where you can listen music online. It provide a simple and attractive User Interface and hence very easy to use. You can play Music from various categories provided by Muzika. This project is developed with love by Girish Kuniyal as Summer project and for more information you can contact me at girishchandrakuniyal at gmail dot com. 
		</div>
	</div>
	<div class="row text-center" id="imagerow">
		
			<div id="about-title2"><b>Developer</b></div><br><br>
			<a href="#">
				<div id="imagebox">
					<img src="resources/giri.jpg" id="image">
					<div id="img-title">Girish Kuniyal</div>
				</div>
			</a>
		
	</div>
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

</html>
