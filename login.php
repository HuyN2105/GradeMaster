<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GradeMaster - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<?php

if(isset($_COOKIE['username']) && $_COOKIE['username']!==NULL){
	require('conn.php');
	session_start();
	$username = $_COOKIE['username'];
	if ($stmt = $conn->prepare('SELECT `password`, `id` FROM `grademaster_account` WHERE `username` = ?')) {
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0) {
			$stmt->bind_result($pass, $id);
			$stmt->fetch();
			if ($_COOKIE['password'] == $pass) {
				session_regenerate_id();
				$_SESSION['loggedin'] = true;
				$_SESSION['id'] = $id;
				echo "<script type='text/javascript'>window.location.href='index.php';</script>";
			}
		}
		$stmt->close();
	}
}

?>

<body>

	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sidebar-collapse" aria-expanded="true"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Grade</span>Master</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a href="/login.php">LOGIN</a></li>
					<li class="dropdown"><a href="https://docs.google.com/forms/d/e/1FAIpQLSfd9KC1Z-kbmN_GVTKq7QEk_PyYH-N0-p5AhKmRRcQ9gPzhUg/viewform?usp=pp_url">SIGN UP</a></li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div class="row" style="margin-top: 50vh; transform: translateY(-75%);">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form id="login-form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox">Remember Me
								</label>
							</div>
							<button class="btn btn-primary" name="submit" value="Submit">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
<script src="js/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function(){
  	$("#login-form").submit(function(event){
    	event.preventDefault();
    	var formData = $(this).serialize();
    	$.ajax({
    	  	url: "login_check.php",
    	  	method: "post",
    	  	data: formData,
			dataType: "json",
    	  	success: function(response){
				console.log(response);
    	  	 	if(response.success) {
        		  	alert("Login Successfully!"); 
        		  	window.location.href = "index.php";
        		} else {
        		  	alert("Wrong username or password!");
        		}
    	  	},
			error: function(jqXHR, textStatus, errorThrown) {
      		  	alert("Error: " + errorThrown);
      		}
    	});
  	});
});
</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
