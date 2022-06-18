<!doctype html>
<html lang="en">
<title></title>
<head>
	<?php include "./config/bootstrapInit.html" ?>
	<?php include "./css/navbar.css" ?>
	<?php
	//check if user is logged in
	session_start();
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
		header("Location: http://localhost/clinica-licenta/login.php");
		exit;
	}
	?>
</head>
<body>
	<?php include "./elements/navbar.php" ?>
	<div class="panel container-fluid mt-3">
		<div class="row form-group align-items-center">
			<div class="col" style="font-size: 18px;">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/clinica-licenta/setari.php"><i class="fa fa-user-circle"></i>&nbsp;Utilizatori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/clinica-licenta/setariRoluri.php"><i class="fa fa-users"></i>&nbsp;Roluri</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="http://localhost/clinica-licenta/setariListaActivitati.php"><i class="fa fa-tasks"></i>&nbsp;Lista activitati</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="panel-header row mb-1">
			<div class="container-fluid">
				<div class="row">
					<div class="col">
						<h3>Lista activitati</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row scroll-box-container mt-3">
			<div class="col px-0 scroll-box">
				<div class="container-fluid">
					<table class="table">
						<thead>
							<tr class="thead-dark">
								<th>Data activitate</th>
								<th>Utilizator</th>
								<th>Tip activitate</th>
								<th>Entitate</th>
								<th>Descriere</th>
							</tr>
						</thead>
						<tbody>
							<?php include "./php/getActivitiesAsTableRows.php" ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	
</script>
</html>