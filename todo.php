<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Panels</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    echo("<script>location.href = '/login.php';</script>");
}
?>

<body>
<?php

$todo_act = "active";

require('nav.php'); # side nav

?>
		
	

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="margin-top: 5vh; margin-bottom: 5vh; ">
		<div class="row" style="margin: 0">
			<div class="panel-body">
				<ul class="todo-list">
					<?php
					require("todo_list.php");
					?>
				</ul>
			</div>
			<div class="panel-footer">
				<div class="input-group" style="width: 100%">
					<form method="post" action="todo_add.php" style="width: calc( 100% - 45px );" class="add-new-task">
						<input id="btn-input" type="text" name="new-task" class="form-control input-md" placeholder="Add new task" /><span class="input-group-btn" style="display: inherit;width: auto;">
						<button class="btn btn-primary btn-md" value="submit" name="submit" id="btn-todo">Add</button>
					</form>
				</span></div>
			</div>
		</div><!--/.row-->
	</div>


	<script src="js/jquery-3.6.4.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.todo_del').click(function(){
				$.post("todo_del.php", {delId :$(this).find('em').attr('value')}, function() {location.reload();});
			});
		});
	</script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
