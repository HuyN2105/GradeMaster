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
					<div class="panel-heading">Nhập Điểm</div>
					<div class="panel-body">
						<form action="/php/nhap_diem.php" method="post" >
							<div class="col-md-4">
								<div class="form-group">
									<label>Chọn Môn</label>
									<select name='mon' class="form-control">
										<?php
										
										require("/php/conn.php");
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
									<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit Button</button>
								</div>
							</div>
						</form>
					</div>
				</div><!-- /.panel-->
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Điểm Trung Bình Mỗi Môn Tổ Hợp</div>
					<div class="panel-body">
						<?php

						require("/php/conn.php");
						
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
						        $t1+=$row['diem'];
						        if($row['ld'] == "tx") $t2+=1;
						        else if($row['ld']=="gk") $t2+=2;
						        else $t2+=3;
						    }
						    $diemtb[$d] = $t1/$t2;
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