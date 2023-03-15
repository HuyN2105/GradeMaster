<?php

$dashboard_act = isset($dashboard_act) ? $dashboard_act : "";
$grade_act = isset($grade_act) ? $grade_act : "";
$chart_act = isset($chart_act) ? $chart_act : "";
$todo_act = isset($todo_act) ? $todo_act : "";

echo
    '
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href=""><span>Grade</span>Master</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://scontent.fdad1-3.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?_nc_cat=1&ccb=1-7&_nc_sid=7206a8&_nc_ohc=w7xD6OXY1WEAX9E95Kn&_nc_ht=scontent.fdad1-3.fna&oh=00_AfC79iKRZXe9ohEoCLjH1YX0srv4Wrv0HWNQsl2iRuAxXg&oe=643574F8" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">'.$_SESSION['username'].'</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class = "'.$dashboard_act.'"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class = "'.$grade_act.'"><a href="grade.php"><em class="fa fa-calendar">&nbsp;</em> Grade Manage</a></li>
			<li class="'.$chart_act.'"><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li class="'.$todo_act.'"><a href="todo.php"><em class="fa fa-clone">&nbsp;</em> Todo List</a></li>
			<li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
	';

?>