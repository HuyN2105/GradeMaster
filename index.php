<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>GradeMaster - Grade</title>
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
	$grade_act = "active";
	require("nav.php");
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="index.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Grade</li>
			</ol>
		</div><!--/.row-->
		
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Nhập Điểm</div>
					<div class="panel-body">
						<form action="/php/nhap_diem.php" method="post" >
							<div class="col-md-4">
								<div class="form-group">
									<label>Chọn Môn</label>
									<select name='mon' class="form-control">
										<?php

										require("./php/conn.php");
										$tohop_list = $conn->query("SELECT mon FROM tohop WHERE user_id = ".$_SESSION['id']);
										while($row = $tohop_list->fetch_assoc()){
											echo "<option value='".$row['mon']."'>".$row['mon']."</option>";
										}
										
										?>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Loại Điểm</label>
									<select name='ld' class="form-control">
										<option value="tx">Thường xuyên</option>
										<option value="gk">Giữa kỳ</option>
										<option value="ck">Cuối kỳ</option>
									</select>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label>Điểm</label>
									<input class="form-control" name='diem' placeholder="Điểm">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group" style="transform: translateY(75%);">
									<button type="submit" value="submit" name="submit" class="btn btn-primary">Xác nhận</button>
								</div>
							</div>
						</form>
					</div>
				</div><!-- /.panel-->
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Điểm Trung Bình Mỗi Môn Tổ Hợp</div>
					<div class="panel-body">
						<?php

						require("./php/conn.php");
						
						$tohop_list = $conn->query("SELECT `mon` FROM `tohop` WHERE `user_id` = ".$_SESSION['id']);
						$mon = [];
						$d = 0;
						while($row = $tohop_list->fetch_assoc()){
						    $monten[$d] = $row['mon'];
							$d++;
						} 
						$diemtb = [];
						$d = 0;
						for ($i = 0; $i < 3; $i++){
						    $t1 = 0;
						    $t2 = 0;
						    $mon = $conn->query('SELECT `diem`, `ld` FROM `tohop_data` WHERE `user_id` = '.$_SESSION['id'].' AND  LOWER(`ten mon`) = "'.strtolower($monten[$i]).'"');
						    while($row = $mon->fetch_assoc()){
						        if($row['ld'] == "tx"){
									$t1+=$row['diem'];
									$t2+=1;
								}
						        else if($row['ld']=="gk"){
									$t1+=($row['diem']*2);
									$t2+=2;
								}
						        else{
									$t1+=($row['diem']*3);
									$t2+=3;
								} 
						    }
						    $diemtb[$d] = round($t1/$t2, 2);
						    $d++;
						}
						?>
						<div>
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo $monten[0]; ?> </label>
									<p><?php echo $diemtb[0]; ?></p>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo $monten[1]; ?></label>
									<p><?php echo $diemtb[1]; ?></p>
									
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label><?php echo $monten[2]; ?></label>
									<p><?php echo $diemtb[2]; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Tổng quan điểm
						<nav style="width: 30vw; float: middle; display: inline-block; font-size: 20px; font-weight: bold; padding-left: 5%">
							<div style="color: rgb(125, 58, 193); width: 7.5vw; display:inline-flex; justify-content: center;"><?php echo $monten[0] ?></div>
							<div style="color: rgb(48, 164, 255); width: 7.5vw; display:inline-flex; justify-content: center;"><?php echo $monten[1] ?></div>
							<div style="color: rgb(20, 36, 89); width: 7.5vw; display:inline-flex; justify-content: center;"><?php echo $monten[2] ?></div>
						</nav>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div><!--/.main-->
	
	<script src="js/jquery-3.6.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
			fetch('../php/get_grade.php')
			.then(response => response.json())
			.then(data => {
				var max = data.max;
				var data1 = [];
				for (var i = 0; i < data.data1.length; i++) {
					data1.push(data.data1[i].diem);
				}
				var data2 = [];
				for (var i = 0; i < data.data2.length; i++) {
					data2.push(data.data2[i].diem);
				}
				var data3 = [];
				for (var i = 0; i < data.data3.length; i++) {
					data3.push(data.data3[i].diem);
				}

				var labe = [];
				for (var i = 0; i < max; i++) {
					labe[i] = "";
				}

				var chart1 = document.getElementById("line-chart").getContext("2d");
				window.myLine = new Chart(chart1).Line({
					labels : labe,
					datasets : [
						{
							label: "My First dataset",
							fillColor : "rgba(125, 58, 193,.2)",
							strokeColor : "rgba(125, 58, 193,1)",
							pointColor : "rgba(125, 58, 193,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(125, 58, 193,1)",
							data : data1
						},
						{
							label: "My Second dataset",
							fillColor : "rgba(48, 164, 255, 0.2)",
							strokeColor : "rgba(48, 164, 255, 1)",
							pointColor : "rgba(48, 164, 255, 1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(48, 164, 255, 1)",
							data : data2
						},
						{
							label: "My Third dataset",
							fillColor : "rgba(20, 36, 89, .2)",
							strokeColor : "rgba(20, 36, 89, 1)",
							pointColor : "rgba(20, 36, 89, 1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(20, 36, 89, 1)",
							data : data3
						}
					]

				}, {
					responsive: true,
					scaleLineColor: "rgba(0,0,0,.2)",
					scaleGridLineColor: "rgba(0,0,0,.05)",
					scaleFontColor: "#c5c7cc"
				});
			})
			.catch(error => console.error(error));

			
			
		};


	</script>
	
</body>
</html>