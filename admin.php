<?php
session_start();
?>
<?php
	if(!isset($_SESSION['user'])){
		header('Location:index.php');
	}
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
<link href="css/admin.css" rel="stylesheet">

<script>
	function removenotification(){
		var ele = document.getElementById("notification");
		opacity = 1;
		id=setInterval(fade,40);
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


<body onload="removenotification()">
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
					<a href="#"><button class="btn btn-success btn-lg ">Hello <b> <?php echo $_SESSION['user']?></b></button></a>
				</li>
				<li>
					<a href="about.php"><button class="btn btn-warning btn-lg "><span class="glyphicon glyphicon-user"></span> <b>About</b></button></a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
<div class="col-md-10 col-md-offset-1">
	<ul class="nav nav-pills nav-justified">
  		<li class="active"><a data-toggle="tab" href="#ranksong">Change Rank </a></li>
  		<li><a data-toggle="tab" href="#removesong">Remove Song</a></li>
  		<li><a data-toggle="tab" href="#addsong">Add Song</a></li>
	</ul>

	<div class="tab-content">
  		<div id="ranksong" class="tab-pane fade in active">
    			<h3>Change Rank <span class="glyphicon glyphicon-upload"></span></h3>
    			<form method="post" action="rankscript.php">
    				<div class="form-group">
    					<label>Select Category :</label>
    					<select  name="category" class="form-control">
						<option  value="bollywood">Bollywood</option>
						<option  value="world">World</option>
						<option value="punjabi">Punjabi</option>
						<option value="telgu">Telgu</option>
						<option value="party">Party</option>
						<option value="romantic">Romantic</option>
						<option value="ghazal">Ghazals</option>
						<option value="other">Others</option>
					</select>
				</div>
				<div class="form-group">
					<label>Current Rank of Song :</label>
					<input type="text" name="rankcurrent" class="form-control">
				</div>
				<div class="form-group">
					<label>Expected Rank of Song :</label>
					<input type="text" name="rankexpect" class="form-control">
				</div>
				<div align="center"><button type="submit" class="btn btn-success btn-lg">Submit</button> <a class ="btn btn-danger btn-lg" href="logout.php">Logout</a></div>
    			</form>
  		</div>
  		<div id="removesong" class="tab-pane fade">
    			<h3>Remove Song <span class="glyphicon glyphicon-remove-sign"></span></h3>
    			<form method="post" action="removescript.php">
    			<div class="form-group">
    				<label>Category of Song :</label>
    				<select name="category" class="form-control">
					<option value="bollywood">Bollywood</option>
					<option value="world">World</option>
					<option value="punjabi">Punjabi</option>
					<option value="telgu">Telgu</option>
					<option value="party">Party</option>
					<option value="romantic">Romantic</option>
					<option value="ghazal">Ghazals</option>
					<option value="other">Others</option>
				</select>
    			</div>
    			<div class="form-group">
    				<label>Rank of Song :</label>
				<input type="text" name="ranking" class="form-control">
    			</div>
    			<div align="center"><button type="submit" class="btn btn-success btn-lg">Submit</button> <a class ="btn btn-danger btn-lg" href="logout.php">Logout</a></div>
    			</form>
  		</div>
  		<div id="addsong" class="tab-pane fade">
    			<h3>Add Song <span class="glyphicon glyphicon-ok-sign"></span></h3>
    			<form method = "post" action="addsongscript.php">
    			<div class="form-group">
    				<label>Category of Song :</label>
    				<select name="category" class="form-control">
					<option value="bollywood">Bollywood</option>
					<option value="world">World</option>
					<option value="punjabi">Punjabi</option>
					<option value="telgu">Telgu</option>
					<option value="party">Party</option>
					<option value="romantic">Romantic</option>
					<option value="ghazal">Ghazals</option>
					<option value="other">Others</option>
				</select>
    			</div>
    			<div class="form-group">
    				<label>Song Name :</label>
    				<input type="text" name="songname" class="form-control">
    			</div>
    			<div class="form-group">
    				<label>Movie / Album Name :</label>
    				<input type="text" name="moviename" class="form-control">
    			</div>
    			<div class="form-group">
    				<label>Song location link (https://dl.dropboxusercontent.com) :</label>
    				<input type="text" name="songloc" class="form-control">
    			</div>
    			<div class="form-group">
    				<label>Poster location link (Recommended 600px x 600px):</label>
    				<input type="text" name="posterloc" class="form-control">
    			</div>
    			<div align="center"><button type="submit" class="btn btn-success btn-lg">Submit</button> <a class ="btn btn-danger btn-lg" href="logout.php">Logout</a></div>
    			</form>
  		</div>
	</div>
	<br><br>
	<p align="center" id="notification"><?php 
	if(isset($_COOKIE["error"])){
	echo $_COOKIE["error"];}?></p>
</div>
	
</div>



<nav class="navbar navbar-inverse navbar-fixed-bottom text-center" id="bottomfooter">
	<h5><b>Made with <span class="glyphicon glyphicon-heart"></span> by Girish Kuniyal</b></h5>
</nav>
</body>

</html>
