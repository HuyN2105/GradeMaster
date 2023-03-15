<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino UI Elements</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
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
	$grade_act = "active";
	require("nav.php");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Forms</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">UI Elements</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Buttons</div>
					<div class="panel-body">
						<div class="col-md-12">
							<h5>Small</h5>
							<button type="button" class="btn btn-sm btn-primary">Primary</button>
							<button type="button" class="btn btn-sm btn-default">Default</button>
							<button type="button" class="btn btn-sm btn-success">Success</button>
							<button type="button" class="btn btn-sm btn-info">Info</button>
							<button type="button" class="btn btn-sm btn-warning">Warning</button>
							<button type="button" class="btn btn-sm btn-danger">Danger</button>
							<button type="button" class="btn btn-sm btn-link">Link</button>
							<br />
							<br />
							<h5>Medium</h5>
							<button type="button" class="btn btn-md btn-primary">Primary</button>
							<button type="button" class="btn btn-md btn-default">Default</button>
							<button type="button" class="btn btn-md btn-success">Success</button>
							<button type="button" class="btn btn-md btn-info">Info</button>
							<button type="button" class="btn btn-md btn-warning">Warning</button>
							<button type="button" class="btn btn-md btn-danger">Danger</button>
							<button type="button" class="btn btn-md btn-link">Link</button>
							<br />
							<br />
							<h5>Large</h5>
							<button type="button" class="btn btn-lg btn-primary">Primary</button>
							<button type="button" class="btn btn-lg btn-default">Default</button>
							<button type="button" class="btn btn-lg btn-success">Success</button>
							<button type="button" class="btn btn-lg btn-info">Info</button>
							<button type="button" class="btn btn-lg btn-warning">Warning</button>
							<button type="button" class="btn btn-lg btn-danger">Danger</button>
							<button type="button" class="btn btn-lg btn-link">Link</button>
							<br />
							<br />
						</div>
					</div>
				</div><!-- /.panel-->
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form role="form">
								<div class="form-group">
									<label>Text Input</label>
									<input class="form-control" placeholder="Placeholder">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control">
								</div>
								<div class="form-group checkbox">
									<label>
										<input type="checkbox">Remember me
									</label>
								</div>
								<div class="form-group">
									<label>File input</label>
									<input type="file">
									<p class="help-block">Example block-level help text here.</p>
								</div>
								<div class="form-group">
									<label>Text area</label>
									<textarea class="form-control" rows="3"></textarea>
								</div>
								<label>Validation</label>
								<div class="form-group has-success">
									<input class="form-control" placeholder="Success">
								</div>
								<div class="form-group has-warning">
									<input class="form-control" placeholder="Warning">
								</div>
								<div class="form-group has-error">
									<input class="form-control" placeholder="Error">
								</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Checkboxes</label>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 1
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 2
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 3
											</label>
										</div>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">Checkbox 4
											</label>
										</div>
									</div>
									<div class="form-group">
										<label>Radio Buttons</label>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio Button 1
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio Button 2
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 3
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio Button 4
											</label>
										</div>
									</div>
									<div class="form-group">
										<label>Selects</label>
										<select class="form-control">
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
											<option>Option 4</option>
										</select>
									</div>
									<div class="form-group">
										<label>Multiple Selects</label>
										<select multiple class="form-control">
											<option>Option 1</option>
											<option>Option 2</option>
											<option>Option 3</option>
											<option>Option 4</option>
										</select>
									</div>
									<button type="submit" class="btn btn-primary">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
								</div>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
